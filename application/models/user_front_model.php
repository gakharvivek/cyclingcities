<?php
Class user_front_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getuserdata() {
      $query = $this->db->select('*')->from('users_front')->get();
      $result = $query->result_array();
//      echo '<pre>'; print_r($result); exit;
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

	public function getactiveuserdata() {
      $query = $this->db->select('*')->from('users_front')->where('activated',1)->get();
      $result = $query->result_array();
//      echo '<pre>'; print_r($result); exit;
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

	public function getinactiveuserdata() {
      $query = $this->db->select('*')->from('users_front')->where('activated',0)->get();
      $result = $query->result_array();
//      echo '<pre>'; print_r($result); exit;
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
}?>