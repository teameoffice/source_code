<?php 
class Workflow_model extends CI_Model{

  public function get_workflow_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('workflow');
        $this->db->where('flag_del',0);
        //$this->db->where_not_in('id',_get_current_user_id($this));
        $q = $this->db->get();
        return $q->result();
        // print_r($q);
        // die();
    }

 public function get_workflow_by_id($id){
        $q = $this->db->query("select * from workflow where  id = '".$id."' limit 1");
        return $q->row();
    }
   
}
 ?>