<?php 
class Diteruskankepada_model extends CI_Model{


    function get_diteruskankepada(){
        $this->db->select();
        $this->db->from('diteruskan_kepada');
        $this->db->where('flag_del',0);
        $q = $this->db->get();
        return $q->result();
    }



}
 ?>