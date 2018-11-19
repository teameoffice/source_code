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


    function get_dokumen_by_flag_and_jenissurat_masuk($id_user){

        $this->db->select();
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Masuk');
        $this->db->where('id_user',$id_user);
        $q = $this->db->get();
        return $q->result();

    }

    function get_dokumen_by_flag_and_jenissurat_keluar($id_user){

        $this->db->select();
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Keluar');
        $this->db->where('id_user',$id_user);
        $q = $this->db->get();
        return $q->result();

    }




    function get_dokumen_by_flag_and_jenissurat_masuk_and_uniqid($uniqid_doc){
        $q = $this->db->query("select * from dokumen 
            where  uniqid_doc = '".$uniqid_doc."'
            and flag_del = 0
            and jenissurat = 'Surat Masuk' order by id desc limit 1");
        return $q->row();
    }
   
    function get_dokumen_by_flag_and_jenissurat_keluar_and_uniqid($uniqid_doc){
        $q = $this->db->query("select * from dokumen 
            where  uniqid_doc = '".$uniqid_doc."'
            and flag_del = 0
            and jenissurat = 'Surat Keluar' order by id desc limit 1");
        return $q->row();
    }

    function get_dokumen_distinct_suratmasuk_uniq(){

        $this->db->distinct();
        $this->db->select('uniqid_doc');
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Masuk');
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        return $q->result();

    }

    function get_dokumen_distinct_suratkeluar_uniq(){

        $this->db->distinct();
        $this->db->select('uniqid_doc');
        $this->db->from('dokumen');
        $this->db->where('flag_del',0);
        $this->db->where('jenissurat','Surat Keluar');
        $this->db->order_by('id', 'desc');
        $q = $this->db->get();
        return $q->result();

    }

}
 ?>