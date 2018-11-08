<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personil extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
	public function index()
	{
		if(_is_user_login($this)){
            $data = array();
            $this->load->model("personel_model");
            $data["personel"] = $this->personel_model->get_personel_filter_by_flag_del();
            // print_r($data["personel"]);
            // die();
            $this->load->view("personil/index",$data);
        }
    }

    public function add_personel(){
           
        if(_is_user_login($this)){
        
            $data["error"] = "";
            $this->load->model("personel_model");

            if($_POST){
               
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
                $this->form_validation->set_rules('korps', 'Korps', 'trim|required');
                $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
               // $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('matra', 'Matra', 'trim|required');
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
                $this->form_validation->set_rules('kesatuan', 'Kesatuan', 'trim|required');
                $this->form_validation->set_rules('id_user', 'Id User', 'trim|required');
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
                        
                        $nama = $this->input->post("nama");
                        
                        $pangkat = $this->input->post("pangkat");
                        
                        $korps = $this->input->post("korps");

                        $jenis_kelamin = $this->input->post("jenis_kelamin");
                        
                        $tanggal_lahir = $this->input->post("tanggal_lahir");
                      //  print_r($tanggal_lahir);die();
                        
                        $matra = $this->input->post("matra");

                        $jabatan = $this->input->post("jabatan");
                        
                        $kesatuan = $this->input->post("kesatuan");
                        
                        $id_user = $this->input->post("id_user");
                        
                        
                   
                        
                            $this->load->model("common_model");
                            $this->common_model->data_insert("personel",
                                array(
                                "nama"=>$nama,
                                "pangkat"=>$pangkat,
                                "korps"=>$korps,
                                "jenis_kelamin"=>$jenis_kelamin,
                                "tanggal_lahir"=>$tanggal_lahir,
                                "matra"=>$matra,
                                "jabatan"=>$jabatan,
                                "kesatuan"=>$kesatuan,
                                "id_user"=>$id_user,
                                "date_created"=>date("Y-m-d H:i:sa"),
                                "flag_del"=>0));
                            echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/personil/";</script>
                                ';


                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            $data["user"] = $this->personel_model->get_user()->result();
           // print_r($data["user"]);die();
            $this->load->view("personil/add_personel",$data);
        }
    }

    public function edit_personel($user_id){
        if(_is_user_login($this)){
            $data = array();
            $this->load->model("personel_model");            
            $user = $this->personel_model->get_personel_by_id($user_id);
             $data["username"] = $this->personel_model->get_user()->result();          
            $data["user"] = $user;
            //print_r($data["user"]);die();
            if($_POST){
               //  $this->load->library('form_validation');
                
               //  $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
               //  $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
               //  $this->form_validation->set_rules('korps', 'Korps', 'trim|required');
               //  $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
               // // $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
               //  $this->form_validation->set_rules('matra', 'Matra', 'trim|required');
               //  $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
               //  $this->form_validation->set_rules('kesatuan', 'Kesatuan', 'trim|required');
               //  $this->form_validation->set_rules('id_user', 'Id User', 'trim|required');
                
                // if ($this->form_validation->run() == FALSE) 
                // {
                  
                // $error_array = $this->form_validation->error_string();
                // $error_json = json_encode(strip_tags($error_array));
                // $error_clean = str_replace(['"', '"'], '', $error_json);

                
               
                //     $data["error"] =  "<script type='text/javascript'>
                //                                     var teks = ' ".$error_clean."';
                //                                     swal({   
                //                                             title: '',   
                //                                             text: teks,   
                //                                             type: 'warning',   
                //                                             showCancelButton: false,   
                //                                             confirmButtonColor: '#DD6B55',   
                //                                             confirmButtonText: 'OK', 
                //                                             closeOnConfirm: false 
                //                                         });
                //                             </script>";
                    
               // }else
                //{
                        
                       $nama = $this->input->post("nama");
                        
                        $pangkat = $this->input->post("pangkat");
                        
                        $korps = $this->input->post("korps");

                        $jenis_kelamin = $this->input->post("jenis_kelamin");
                        
                        $tanggal_lahir = $this->input->post("tanggal_lahir");
                      //  print_r($tanggal_lahir);die();
                        
                        $matra = $this->input->post("matra");

                        $jabatan = $this->input->post("jabatan");
                        
                        $kesatuan = $this->input->post("kesatuan");
                        
                        $id_user = $this->input->post("id_user");
                        //print_r($id_user);die();
                        $update_array = array(
                                "nama"=>$nama,
                                "pangkat"=>$pangkat,
                                "korps"=>$korps,
                                "jenis_kelamin"=>$jenis_kelamin,
                                "tanggal_lahir"=>$tanggal_lahir,
                                "matra"=>$matra,
                                "jabatan"=>$jabatan,
                                "kesatuan"=>$kesatuan,
                                "id_user"=>$id_user,                               
                                "date_updated"=>date("Y-m-d H:i:sa"));
                       // print_r($update_array);print_r($user_id); die();
                       echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/personil/";</script>
                                ';
                        
                            $this->load->model("common_model");
                            $this->common_model->data_update("personel",$update_array,array("id"=>$user_id)
                                );
                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
               // }
            }
            
            
            $this->load->view("personil/edit_personel",$data);
        }
    }

    function delete_personel($user_id){
        $data = array();
            $this->load->model("personel_model");
           $user = $this->personel_model->get_personel_by_id($user_id);
           if($user){
                $this->db->query("update personel set flag_del = 1 where id = '".$user->id."'");
                echo  '<script>alert("Data berhasil dihapus...");window.location = "'.site_url().'/personil/";</script>
                                ';
           }
    }

}