<?php 
class Workflowpersonel_model extends CI_Model{

    function data_insert($table,$insert_array){
        $this->db->insert($table,$insert_array);
        $id = $this->db->insert_id();
        return $id;
    }
   
}
 ?>