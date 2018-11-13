<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
	
    function index(){
		if(_is_user_login($this)){
            $data = array();

             $id_user = _get_current_user_id($this);

            $this->load->model("dokumen_model");
            $this->load->model("workflow_model");




            $data["dokumen"] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk($id_user);

            $this->load->view("suratmasuk/index",$data);
        }
    }


    function delete($id){
        $data = array();
            $this->load->model("dokumen_model");
           $data_dokumen = $this->dokumen_model->get_dokumen_by_id($id);
           if($data_dokumen){
                $this->db->query("update dokumen set flag_del = 1 where id = '".$data_dokumen->id."'");
                echo  '<script>alert("Data berhasil dihapus...");window.location = "'.site_url().'/suratmasuk/";</script>
                                ';
           }
    }


    function kirim_surat_masuk($uniqid_doc){
        if(_is_user_login($this)){
            $data = array();

            $id_user = _get_current_user_id($this);

            //$this->load->model("workflow_model");
            $this->load->model('dokumen_model');
            $this->load->model('workflowpersonel_model');
            $this->load->model('personel_model');
           
            $uniqid_doc = $uniqid_doc;
           // cek lagi user_id dan workflow
            $doc = array();
            $doc['dokumen'] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk_and_uniqid($uniqid_doc);
            if(!empty($doc['dokumen'])){
                $id_workflow = $doc['dokumen']->id_workflow;
                $id_user = $doc['dokumen']->id_user;

                // cek personel
                $pers = array();
                $pers['personel'] = $this->personel_model->get_personel_by_id_user($id_user);


                if(!empty($pers['personel'])){
                    $id_personel = $pers['personel']->id;
                    // cek workflow ada tidak
                    $workper = array();
                    $workper['workflow_personel'] = $this->workflowpersonel_model->get_workflow_personel($id_workflow,$id_personel);


                    if(!empty($workper['workflow_personel'])){

                        $urutan = $workper['workflow_personel']->urutan;
                        $id_work = $workper['workflow_personel']->id_workflow;
                        $id_table = $workper['workflow_personel']->id;

                        // cek punya urutan surat lagi apa enggak

                        $urutan_lanjut = $urutan + 1;
                        $id_table_lanjut = $id_table + 1;



                        $wokper_lanjut = array();

                        $wokper_lanjut['workflow_personel'] = $this->workflowpersonel_model->get_workflow_personel_lanjut($id_work,$id_table_lanjut,$urutan_lanjut);

                        if(!empty($wokper_lanjut['workflow_personel'])){

                            $id_person = $wokper_lanjut['workflow_personel']->id_personel;

                            // cek user id untuk di input ke table dokumen

                            $getpersonel = array();

                            $getpersonel['personel'] = $this->personel_model->get_personel_by_id($id_person);

                            if(!empty($getpersonel['personel'])){

                                $id_user_getpersonel = $getpersonel['personel']->id_user;

                                $this->load->model("common_model");
                                $this->common_model->data_insert("dokumen",
                                    array(
                                    "id_kategori"=>$doc['dokumen']->id_kategori,
                                    "id_workflow"=>$doc['dokumen']->id_workflow,
                                    "jenissurat"=>$doc['dokumen']->jenissurat,
                                    "id_user"=>$id_user_getpersonel,
                                    "nama_dokumen"=>$doc['dokumen']->nama_dokumen,
                                    "deskripsi"=>$doc['dokumen']->deskripsi,
                                    "content_type"=>$doc['dokumen']->content_type,
                                    "file_name"=>$doc['dokumen']->file_name,
                                    "file_path"=>$doc['dokumen']->file_path,
                                    "modifikasi"=>'Menunggu Persetujuan',
                                    "tanggal_dokumen"=>$doc['dokumen']->tanggal_dokumen,
                                    "no_dokumen"=>$doc['dokumen']->no_dokumen,
                                    "uniqid_doc"=>$doc['dokumen']->uniqid_doc,
                                    "date_created"=>date("Y-m-d H:i:sa"),
                                    "flag_del"=>0));



                                     // update status surat user itu sendiri menjadi Terkirim

                                    $update_doc = array(
                                    "modifikasi"=>'Terkirim',
                                    "date_updated"=>date("Y-m-d H:i:sa"));

                                    $kondisi_array = array(
                                    'uniqid_doc' => $uniqid_doc,
                                    'id_user' => $id_user);

                                    $this->load->model("common_model");
                                    $this->common_model->data_update("dokumen",$update_doc,$kondisi_array);


                            }




                        }


                        // cek bawahan dan update statusnya

                        $urutan_bawah = $urutan - 1;
                        $id_table_bawah = $id_table - 1;

                        $wokper_bawah = array();
                        $wokper_bawah['workflow_personel'] = $this->workflowpersonel_model->get_workflow_personel_bawah($id_work,$id_table_bawah,$urutan_bawah);


                      

                        if(!empty($wokper_bawah['workflow_personel'])){

                             
                            $id_person_bawah = $wokper_bawah['workflow_personel']->id_personel;

                            $getpersonel_bawah = array();

                            $getpersonel_bawah['personel'] = $this->personel_model->get_personel_by_id($id_person_bawah);


                            if(!empty($getpersonel_bawah['personel'])){

                                $id_user_getpersonel_bawah = $getpersonel_bawah['personel']->id_user;

                                //update modifikasi

                                $uniqid_doc;
                                $id_user_getpersonel_bawah;
                                $id_work;

                                $modifikasi = "disetujui oleh ". $getpersonel_bawah['personel']->nama;


                                $update_array = array(
                                "modifikasi"=>$modifikasi,
                                "date_updated"=>date("Y-m-d H:i:sa"));

                                $condition_array = array(
                                    'uniqid_doc' => $uniqid_doc,
                                    'id_workflow' => $id_work,
                                    'id_user' => $id_user_getpersonel_bawah);

                                $this->load->model("common_model");
                                $this->common_model->data_update("dokumen",$update_array,$condition_array);


                                $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Berhasil', 'success')
                                            </script>";


                            }


                        }


                       






                    }


                }
                

            }


            // $data["error"] =  "<script type='text/javascript'>
            //                                         swal('Sukses!', 'Berhasil', 'success')
            //                                 </script>";
            
            // $data["dokumen"] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk($id_user);

            // $this->load->view("suratmasuk/index",$data);

            $this->index();

        }
    }


    function disposisi($uniqid_doc){


        if(_is_user_login($this)){
            $data = array();
            $data['uniqid_doc'] = $uniqid_doc;

            $id_user = _get_current_user_id($this);

            $this->load->model("dokumen_model");
            $this->load->model("kategori_model");
            $this->load->model("diteruskankepada_model");
            $this->load->model("disposisi_model");



            if($_POST){
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('no_agd', 'No Agd', 'trim|required');
                $this->form_validation->set_rules('terima_dari', 'Terima Dari', 'trim|required');
                $this->form_validation->set_rules('no_surat', 'No Surat', 'trim|required');
                $this->form_validation->set_rules('klasifikasi', 'Kategori', 'trim|required');
                $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
                $this->form_validation->set_rules('id_diteruskan_kepada', 'Diteruskan kepada', 'trim|required');
                $this->form_validation->set_rules('tanggal_terusan', 'Tanggal', 'trim|required');
                $this->form_validation->set_rules('disposisi_kapus', 'Disposisi Kapus', 'trim|required');
                $this->form_validation->set_rules('catatan_penyelesaian', 'Catatan Penyelesaian', 'trim|required');


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


                    
                }else{
                        
                        $no_agd = $this->input->post("no_agd");
                        $terima_dari = $this->input->post("terima_dari");
                        $no_surat = $this->input->post("no_surat");
                        $klasifikasi = $this->input->post("klasifikasi");
                        $id_diteruskan_kepada = $this->input->post("id_diteruskan_kepada");
                        $perihal = $this->input->post("perihal");
                        $tanggal_terusan = $this->input->post("tanggal_terusan");
                        $disposisi_kapus = $this->input->post("disposisi_kapus");
                        $catatan_penyelesaian = $this->input->post("catatan_penyelesaian");


                        // get id dokumen
                        $doc = array();
                        $doc['dokumen'] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk_and_uniqid($uniqid_doc);
                        $id_dokumen = $doc['dokumen']->id;

                        // end
                        

                        $this->load->model("common_model");
                        $this->common_model->data_insert("disposisi",
                                array(
                                "no_agd"=>$no_agd,
                                "terima_dari"=>$terima_dari,
                                "no_surat"=>$no_surat,
                                "klasifikasi"=>$klasifikasi,
                                "id_diteruskan_kepada"=>$id_diteruskan_kepada,
                                "perihal"=>$perihal,
                                "tanggal_terusan"=>$tanggal_terusan,
                                "disposisi_kapus"=>$disposisi_kapus,
                                "catatan_penyelesaian"=>$catatan_penyelesaian,
                                "flag_del"=>0,
                                "id_dokumen"=>$id_dokumen,
                                "date_created"=>date("Y-m-d H:i:sa")));

                            $data["error"] =  "<script type='text/javascript'>
                                                    swal('Sukses!', 'Data berhasil disimpan', 'success')
                                            </script>";
                        
                }
            }


            $data["dokumen"] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk($id_user);
            $data["kategori"] = $this->kategori_model->get_kategori_filter_by_flag_del();
            $data["diteruskan_kepada"] = $this->diteruskankepada_model->get_diteruskankepada();


            

            // get id dokumen
            $doc = array();
            $doc['dokumen'] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk_and_uniqid($uniqid_doc);
            $id_dokumen = $doc['dokumen']->id;

            // end
            $data['disposisi'] = $this->disposisi_model->get_disposisi($id_dokumen);


           

            $this->load->view("suratmasuk/disposisi",$data);

        }

    }

    function detailsurat($id){
        if(_is_user_login($this)){
            $data = array();

             $id_user = _get_current_user_id($this);

            $this->load->model("dokumen_model");
            $this->load->model("kategori_model");
            $this->load->model("workflow_model");




            $data["dokumen"] = $this->dokumen_model->get_dokumen_by_id($id);

            $data["kategori"] = $this->kategori_model->get_kategori_by_id($data["dokumen"]->id_kategori);

            $data["workflow"] = $this->workflow_model->get_workflow_by_id($data["dokumen"]->id_workflow);



            $this->load->view("suratmasuk/detailsurat",$data);
        }
    }

}