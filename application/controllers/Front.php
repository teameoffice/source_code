<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
    function dashboard(){
        if(_is_user_login($this)){
            $data = array();
            $this->load->view("front/dashboard",$data);
        }
    }

    function profile(){
        if(_is_user_login($this)){
            $data = array();

            $id_user = _get_current_user_id($this);

            $this->load->model("personel_model");            
            $data['personel'] = $this->personel_model->get_personel_by_id_user($id_user);


            $this->load->view("front/profile",$data);
        }
    }
    

	
}
?>