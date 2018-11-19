<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasukadmin extends CI_Controller {
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


            
            $this->load->model("dokumen_model");
            $this->load->model("workflow_model");




            $data["distinct"] = $this->dokumen_model->get_dokumen_distinct_suratmasuk_uniq();


            $this->load->view("suratmasukadmin/index",$data);
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



            $this->load->view("suratmasukadmin/detailsurat",$data);
        }
    }

}