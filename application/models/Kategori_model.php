<?php 
class Kategori_model extends CI_Model{

  public function get_kategori_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('kategori');
        $this->db->where('flag_del',0);
        $q = $this->db->get();
        return $q->result();
    }

 public function get_kategori_by_id($id){
        $q = $this->db->query("select * from kategori where  id = '".$id."' limit 1");
        return $q->row();
    }
   
}
 ?>