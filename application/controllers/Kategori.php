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

            $this->load->view("kategori/index",$data);
        }
    }


    public function add_kategori()
    {
        if(_is_user_login($this)){
            $data = array();

            $this->load->view("kategori/add_kategori",$data);
        }
    }
}