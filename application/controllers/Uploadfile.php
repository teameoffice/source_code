<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadfile extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
        date_default_timezone_set('Asia/Jakarta');       
    }
	public function index(){
		if(_is_user_login($this)){
            $data = array();
            $this->load->model("kategori_model");
            $this->load->model("workflow_model");
            $this->load->model("jenissurat_model");

            $id_user = _get_current_user_id($this);

            
            if($_POST){
                $this->load->library('form_validation');
                

                $this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
                $this->form_validation->set_rules('id_workflow', 'Alur Surat', 'trim|required');
                $this->form_validation->set_rules('jenissurat', 'Jenis Surat', 'trim|required');
                $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'trim|required');
                $this->form_validation->set_rules('no_dokumen', 'No Dokumen', 'trim|required');
                $this->form_validation->set_rules('tanggal_dokumen', 'Tanggal', 'trim|required');


                if (empty($_FILES['file']['name']))
                {
                    $this->form_validation->set_rules('file', 'Dokumen', 'required');
                }

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


                    
                }else{
                        

                        $id_kategori = $this->input->post("id_kategori");
                        
                        $id_workflow = $this->input->post("id_workflow");

                        $jenissurat = $this->input->post("jenissurat");
                        $nama_dokumen = $this->input->post("nama_dokumen");
                        $deskripsi = $this->input->post("deskripsi");
                        
                        $no_dokumen = $this->input->post("no_dokumen");
                        $tanggal_dokumen = $this->input->post("tanggal_dokumen");
                        
                        $file_name="";
                        $config['upload_path'] = './images/';
                        $config['allowed_types'] = '*';
                        $this->load->library('upload', $config);



                        if($_FILES['file']['size'] > 0)
                                if ( ! $this->upload->do_upload('file'))
                                {
                                    $error = array('error' => $this->upload->display_errors());
                        
                                    $this->load->view('uploadfile/index', $error);
                                }
                                  else
                                {
                                    @$file_data = $this->upload->data();
                                    @$file_name = @$file_data["file_name"];
                                    @$file_type = @$file_data["file_type"];
                                    @$file_path = @$file_data["file_path"];
                                    
                                //  $nama_file["file"] = $file_name;
                                }


                        if(empty($file_data)){

                                $data["error"] =  "<script type='text/javascript'>
                                                    swal({   
                                                            title: '',   
                                                            text: 'File harus dipilih',   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                        });
                                            </script>";

                                // $this->load->view("uploadfile/index",$data);


                        } else {



                        
                        $today= date('Ymd');
                        $uniqid_doc =  uniqid($today.'_');
                         


                            $this->load->model("common_model");
                            $this->common_model->data_insert("dokumen",
                                array(
                                "id_kategori"=>$id_kategori,
                                "id_workflow"=>$id_workflow,
                                "jenissurat"=>$jenissurat,
                                "id_user"=>$id_user,
                                "nama_dokumen"=>$nama_dokumen,
                                "deskripsi"=>$deskripsi,
                                "content_type"=>$file_type,
                                "file_name"=>$file_name,
                                "file_path"=>$file_path,
                                "modifikasi"=>'Menunggu Persetujuan',
                                "tanggal_dokumen"=>$tanggal_dokumen,
                                "no_dokumen"=>$no_dokumen,
                                "uniqid_doc"=>$uniqid_doc,
                                "date_created"=>date("Y-m-d H:i:sa"),
                                "date_updated"=>date("Y-m-d H:i:sa"),
                                "flag_del"=>0));

                            
                            // simpan ke table ke dua 

                            // $id_dokumen = $this->db->insert_id(); 

                            // $this->load->model("common_model");
                            // $this->common_model->data_insert("dokumen_approval",
                            //     array(
                            //     "id_user"=>$id_user,
                            //     "id_dokumen"=>$id_dokumen,
                            //     "approved_by"=>'Menunggu Persetujuan',
                            //     "uniqid_doc"=>$uniqid_doc,
                            //     "date_created"=>date("Y-m-d H:i:sa"),
                            //     "date_updated"=>date("Y-m-d H:i:sa"),
                            //     "flag_del"=>0));


                                 $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";



                        }

                        
                }
            }
            




            $data["kategori"] = $this->kategori_model->get_kategori_filter_by_flag_del();
            $data["workflow"] = $this->workflow_model->get_workflow_filter_by_flag_del();
            $data["jenissurat"] = $this->jenissurat_model->get_jenissurat_filter_by_flag_del();

            

            $this->load->view("uploadfile/index",$data);
        }
    }


}