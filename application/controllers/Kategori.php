<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
        date_default_timezone_set('Asia/Jakarta');       
    }
	public function index()
	{
		if(_is_user_login($this)){
            $data = array();
            $this->load->model("kategori_model");
            $data["kategori"] = $this->kategori_model->get_kategori_filter_by_flag_del();

            $this->load->view("kategori/index",$data);
        }
    }

    public function add_kategori(){
           
        if(_is_user_login($this)){
        
            $data["error"] = "";
            $this->load->model("kategori_model");

            if($_POST){
               
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
                if ($this->form_validation->run() == FALSE) 
                {
                  
                $error_array = $this->form_validation->error_string();
                $error_json = json_encode(strip_tags($error_array));
                $error_clean = str_replace(['"', '"'], '', $error_json);

                
               
                    $data["error"] =  "<script type='text/javascript'>
                                                    var teks = ' ".$error_clean."';
                                                    swal({   
                                                            title: '',   
                                                            text: teks,   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                        });
                                            </script>";


                    
                } else
               {
                        
                        $nama_kategori = $this->input->post("nama_kategori");
                        $deskripsi = $this->input->post("deskripsi");
                        
                      //  print_r($nama_kategori);die();
                   
                        
                            $this->load->model("common_model");
                            $this->common_model->data_insert("kategori",
                                array(
                                "nama_kategori"=>$nama_kategori,
                                "deskripsi"=>$deskripsi,
                                "date_created"=>date("Y-m-d H:i:sa"),
                                "date_updated"=>date("Y-m-d H:i:sa"),
                                "flag_del"=>0));
                            echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/kategori/";</script>
                                ';


                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            
           // print_r($data["user"]);die();
            $this->load->view("kategori/add_kategori");
        }
    }

    public function edit_kategori($id_kategori){
    
        if(_is_user_login($this)){
            $data = array();
            $this->load->model("kategori_model");            
            $kategori = $this->kategori_model->get_kategori_by_id($id_kategori);                  
            $data["kategori"] = $kategori;
            //print_r($data["user"]);die();
            if($_POST){
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'trim|required');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

                if ($this->form_validation->run() == FALSE) 
                {
                  
                $error_array = $this->form_validation->error_string();
                $error_json = json_encode(strip_tags($error_array));
                $error_clean = str_replace(['"', '"'], '', $error_json);

                
               
                    $data["error"] =  "<script type='text/javascript'>
                                                    var teks = ' ".$error_clean."';
                                                    swal({   
                                                            title: '',   
                                                            text: teks,   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                        });
                                            </script>";
                    
               }else
                {
                        
                       $nama_kategori = $this->input->post("nama_kategori");
                       $deskripsi = $this->input->post("deskripsi");
                       // print_r(date("Y-m-d H:i:s"));die();
                        $update_array = array(
                                "nama_kategori"=>$nama_kategori,
                                "deskripsi"=>$deskripsi,                    
                                "date_updated"=>date("Y-m-d H:i:s"));
                       // print_r($update_array);print_r($user_id); die();
                       echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/kategori/";</script>
                                ';
                        
                            $this->load->model("common_model");
                            $this->common_model->data_update("kategori",$update_array,array("id"=>$id_kategori)
                                );
                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            
            $this->load->view("kategori/edit_kategori",$data);
        }
    }

    function delete_kategori($id_kategori){
        $data = array();
            $this->load->model("kategori_model");
           $kategori = $this->kategori_model->get_kategori_by_id($id_kategori);
           if($kategori){
                $this->db->query("update kategori set flag_del = 1 where id = '".$kategori->id."'");
                echo  '<script>alert("Data berhasil dihapus...");window.location = "'.site_url().'/kategori/";</script>
                                ';
           }
    }
}