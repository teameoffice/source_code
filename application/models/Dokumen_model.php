<?php 
class Dokumen_model extends CI_Model{

  public function get_dokumen_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $q = $this->db->get();
        return $q->result();
    }

 public function get_dokumen_by_id($id){
        $q = $this->db->query("select * from dokumen where  id = '".$id."' limit 1");
        return $q->row();
    }


    function get_dokumen_by_flag_and_jenissurat_masuk(){

        $this->db->select();
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Masuk');
        $q = $this->db->get();
        return $q->result();

    }

    function get_dokumen_by_flag_and_jenissurat_keluar(){

        $this->db->select();
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Keluar');
        $q = $this->db->get();
        return $q->result();

    }
   
}
 ?>