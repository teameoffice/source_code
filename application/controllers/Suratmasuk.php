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

            $this->load->view("suratmasuk/index",$data);
        }
    }

}