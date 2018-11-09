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
	public function index()
	{
		if(_is_user_login($this)){
            $data = array();

             $id_user = _get_current_user_id($this);

            $this->load->model("dokumen_model");




            $data["dokumen"] = $this->dokumen_model->get_dokumen_by_flag_and_jenissurat_masuk();

            $this->load->view("suratmasuk/index",$data);
        }
    }

}