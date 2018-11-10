<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
	function index()
	{
		if(_is_user_login($this)){
             $id_user = _get_current_user_id($this);

            $this->load->model("dokumen_model");




            $data["dokumen"] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_keluar();

            $this->load->view("suratkeluar/index",$data);
        }
    }

    function delete($id){
        $data = array();
            $this->load->model("dokumen_model");
           $data_dokumen = $this->dokumen_model->get_dokumen_by_id($id);
           if($data_dokumen){
                $this->db->query("update dokumen set flag_del = 1 where id = '".$data_dokumen->id."'");
                echo  '<script>alert("Data berhasil dihapus...");window.location = "'.site_url().'/suratkeluar/";</script>
                                ';
           }
    }

}