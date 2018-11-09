<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow extends CI_Controller {
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
            $this->load->model("workflow_model");
            $data["workflow"] = $this->workflow_model->get_workflow_filter_by_flag_del();

            $this->load->view("workflow/index",$data);
        }
    }


public function add_workflow(){
           
        if(_is_user_login($this)){
        
            $data["error"] = "";
            $this->load->model("workflow_model");

            if($_POST){
               
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama_workflow', 'Nama Workflow', 'trim|required');
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
                        
                        $nama_workflow = $this->input->post("nama_workflow");
                        $deskripsi = $this->input->post("deskripsi");
                        
                      //  print_r($nama_workflow);die();
                   
                        
                            $this->load->model("common_model");
                            $this->common_model->data_insert("workflow",
                                array(
                                "nama_workflow"=>$nama_workflow,
                                "deskripsi"=>$deskripsi,
                                "date_created"=>date("Y-m-d H:i:sa"),
                                "date_updated"=>date("Y-m-d H:i:sa"),
                                "flag_del"=>0));
                            echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/workflow/";</script>
                                ';


                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            
           // print_r($data["user"]);die();
            $this->load->view("workflow/add_workflow");
        }
    }


public function edit_workflow($id_workflow){
    
        if(_is_user_login($this)){
            $data = array();
            $this->load->model("workflow_model");            
            $workflow = $this->workflow_model->get_workflow_by_id($id_workflow);                  
            $data["workflow"] = $workflow;
            //print_r($data["user"]);die();
            if($_POST){
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama_workflow', 'Nama Workflow', 'trim|required');
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
                        
                       $nama_workflow = $this->input->post("nama_workflow");
                       $deskripsi = $this->input->post("deskripsi");
                       // print_r(date("Y-m-d H:i:s"));die();
                        $update_array = array(
                                "nama_workflow"=>$nama_workflow,
                                "deskripsi"=>$deskripsi,                    
                                "date_updated"=>date("Y-m-d H:i:s"));
                       // print_r($update_array);print_r($user_id); die();
                       echo  '<script>alert("Data berhasil disimpan...");window.location = "'.site_url().'/workflow/";</script>
                                ';
                        
                            $this->load->model("common_model");
                            $this->common_model->data_update("workflow",$update_array,array("id"=>$id_workflow)
                                );
                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            
            $this->load->view("workflow/edit_workflow",$data);
        }
    }

     function delete_workflow($id_workflow){
        $data = array();
            $this->load->model("workflow_model");
           $workflow = $this->workflow_model->get_workflow_by_id($id_workflow);
           if($workflow){
                $this->db->query("update workflow set flag_del = 1 where id = '".$workflow->id."'");
                echo  '<script>alert("Data berhasil dihapus...");window.location = "'.site_url().'/workflow/";</script>
                                ';
           }
    }

}