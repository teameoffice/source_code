<?php 
class Jenissurat_model extends CI_Model{

  public function get_jenissurat_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('jenissurat');
        $this->db->where('flag_del',0);
        $q = $this->db->get();
        return $q->result();
    }

   
}
 ?>