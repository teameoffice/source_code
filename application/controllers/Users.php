<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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
            $this->load->model("users_model");
            $data["users"] = $this->users_model->get_users_filter_by_flag_del();
            $this->load->view("users/index",$data);
        }
    }
    public function add_user(){
        if(_is_user_login($this)){
            $data["error"] = "";
            $this->load->model("users_model");
            if($_POST){
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('user_name', 'Username', 'trim|required|is_unique[users.user_name]');
                $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
                $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
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
                        
                        $user_name = $this->input->post("user_name");
                        
                        $user_password = $this->input->post("user_password");
                        
                        $user_type = $this->input->post("user_type");
                        
                        
                        $status = ($this->input->post("status")=="on")? 1 : 0;
                        
                            $this->load->model("common_model");
                            $this->common_model->data_insert("users",
                                array(
                                "user_name"=>$user_name,
                                "user_password"=>md5($user_password),
                                "user_type_id"=>$user_type,
                                "user_status"=>$status,
                                "date_created"=>date("Y-m-d H:i:sa")));

                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            $data["user_types"] = $this->users_model->get_user_type();
            $this->load->view("users/add_user",$data);
        }
    }
    public function edit_user($user_id){
        if(_is_user_login($this)){
            $data = array();
            $this->load->model("users_model");
            $data["user_types"] = $this->users_model->get_user_type();
            $user = $this->users_model->get_user_by_id($user_id);
            $data["user"] = $user;
            if($_POST){
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
                $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
                $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
                
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
                        
                        $user_type = $this->input->post("user_type");
                        $user_name = $this->input->post("user_name");
                        $status = ($this->input->post("status")=="on")? 1 : 0;
                        
                        $update_array = array(
                                "user_name"=>$user_name,
                                "user_type_id"=>$user_type,
                                "user_status"=>$status,
                                "date_updated"=>date("Y-m-d H:i:sa"));
                        $user_password = $this->input->post("user_password");
                        if($user->user_password != $user_password){
                            
                        $update_array["user_password"]= md5($user_password);
                        
                        }
                        
                            $this->load->model("common_model");
                            $this->common_model->data_update("users",$update_array,array("user_id"=>$user_id)
                                );
                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            
            $this->load->view("users/edit_user",$data);
        }
    }
function delete_user($user_id){
        $data = array();
            $this->load->model("users_model");
            $user  = $this->users_model->get_user_by_id($user_id);
           if($user){
                $this->db->query("update users set flag_del = 1 where user_id = '".$user->user_id."'");
                redirect("users");
           }
    }

 function change_password(){
        if(_is_frontend_user_login($this)){
            $this->load->model("users_model");
                $user_data  = $this->users_model->get_user_by_id(_get_current_user_id($this));
                $data["user_data"] = $user_data;
            if($_POST){
                $this->load->model("users_model");
           
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('c_password', 'Current Password', 'trim|required');
                $this->form_validation->set_rules('n_password', 'New Password', 'trim|required');
                $this->form_validation->set_rules('r_password', 'Re Password', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) {
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
        		}else {
                    if($user_data->user_password == md5($this->input->post("c_password"))){
                        $n_password = $this->input->post("n_password");
                        $r_password = $this->input->post("r_password");
                        
                        if($n_password == $r_password){
                            $this->load->model("common_model");
                            $resid = $this->common_model->data_update("users",
                                array("user_password"=>md5($n_password)),array("user_id"=>_get_current_user_id($this)));
                           
    
                            $data["error"] = "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        }
                        
                    }else{
                        $data["error"] = "<script type='text/javascript'>
                                                    swal({   
                                                            title: '',   
                                                            text: 'Password tidak cocok',   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                    });
                                         </script>";

                    }         
                        
                }
            }    
               
                $this->load->view("users/change_password",$data);

        }
    }   
 
  
}