<?php 
class Disposisi_model extends CI_Model{


    function get_disposisi($id_dokumen){
        $q = $this->db->query("select * from disposisi where  id_dokumen = '".$id_dokumen."' 
        	and flag_del = 0
        	limit 1");
        return $q->row();
    }



}
 ?>