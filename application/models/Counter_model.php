<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Counter_model extends CI_Model {
    
  function get_counter_value() {
   $this->db->insert_id('count');
   $query = $this->db->get('27_counter');
   return $query->result();
  }  
  function update_counter_value($one_count) {
    $data = array(
         'count' => $one_count
    );
    $this->db->where('counter_id', 1);
    $this->db->update('27_counter', $data);
  }  
  public function online_class(){
    $this->db->select('online_class.*, 1_create_class.class_name, 2_create_group.group_name, 7_create_subject.subject_name, 3_create_section.section_name');
    $this->db->from('online_class');
    $this->db->join('1_create_class','online_class.class_id = 1_create_class.record_id');
    $this->db->join('2_create_group','online_class.group_id = 2_create_group.record_id');
    $this->db->join('7_create_subject','online_class.subject_id = 7_create_subject.record_id');
    $this->db->join('3_create_section','online_class.section_id = 3_create_section.record_id');
    $this->db->order_by('online_class.record_id','desc');
    $query = $this->db->get();
    return $query->result();
  } 
}
?>
