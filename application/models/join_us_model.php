<?php
Class join_us_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getjoin_us() {
      $query = $this->db->select('*')->from('join_us')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
  }

?>