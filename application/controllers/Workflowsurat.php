<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workflowsurat extends CI_Controller {
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



            $this->load->view("workflowsurat/index",$data);
        }
    }

public function add_alur_surat(){

        if(_is_user_login($this)){
            $data = array();

            $this->load->model("workflow_model");
            $this->load->model("personel_model");
            $this->load->model("workflowpersonel_model");
            if($_POST){


                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('id_workflow', 'Alur belum dipilih', 'trim|required');
                $this->form_validation->set_rules('urutan[]', 'Urutan', 'trim|required');
                $this->form_validation->set_rules('id_personel[]', 'Nama Personil', 'trim|required');
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
                        $id_personel = $this->input->post("id_personel");
                        $jumlah_data = count($id_personel);
                    
                        for ($x = 0; $x < $jumlah_data; $x++) {
                            
                              $data[] = array(
                                "id_workflow"=>$_POST['id_workflow'],
                                "urutan"=>$_POST['urutan'][$x],
                                "id_personel"=>$_POST['id_personel'][$x],
                                "date_created"=>date("Y-m-d H:i:sa"),
                                "flag_del" => 0 );

                              $this->workflowpersonel_model->data_insert("workflow_personel",$data[$x]);

                        } 

                        


                        $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }
            
            $data["personil"] = $this->personel_model->get_personel_filter_by_flag_del();
            $data["workflow"] = $this->workflow_model->get_workflow_filter_by_flag_del();

            $this->load->view("workflowsurat/add_alur_surat",$data);
        }
 
    }
}