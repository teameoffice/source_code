<?php 
class Workflowpersonel_model extends CI_Model{

    function data_insert($table,$insert_array){
        $this->db->insert($table,$insert_array);
        $id = $this->db->insert_id();
        return $id;
    }


    function get_workflow_personel($id_workflow,$id_personel){
		$q = $this->db->query("select * from workflow_personel 
            where  id_workflow = '".$id_workflow."'
            and id_personel = '".$id_personel."'
            and flag_del = 0 limit 1");
        return $q->row();  
    }


    function get_workflow_personel_lanjut($id_work,$id_table_lanjut,$urutan_lanjut){
        $q = $this->db->query("select * from workflow_personel 
            where  id = '".$id_table_lanjut."'
            and id_workflow = '".$id_work."'
            and urutan = '".$urutan_lanjut."'
            and flag_del = 0
            limit 1");
        return $q->row();
    }


    function get_workflow_personel_bawah($id_work,$id_table_bawah,$urutan_bawah){
        $q = $this->db->query("select * from workflow_personel 
            where  id = '".$id_table_bawah."'
            and id_workflow = '".$id_work."'
            and urutan = '".$urutan_bawah."'
            and flag_del = 0
            limit 1");
        return $q->row();
    }

    function get_workflow_personel_count($id_workflow){
        $q = $this->db->query("select count(urutan) as jumlahurutan from workflow_personel 
            where  id_workflow = '".$id_workflow."'
            and flag_del = 0
            limit 1");
        return $q->row();
    }


    function get_workflow_personel_by_id_workflow($id_workflow){
        $q = $this->db->query("select count(urutan) as jumlahurutan from workflow_personel 
            where  id_workflow = '".$id_workflow."'
            and flag_del = 0
            limit 1");
        return $q->row();
    }

}
 ?>