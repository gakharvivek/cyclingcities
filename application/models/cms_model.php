<?php
Class cms_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getcms() {
      $query = $this->db->select('*')->from('cms')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('cms');
      $this->db->where('id',$id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('id',$where);
      $result = $this->db->update('cms', $data);
      return $result;
    }
}?>