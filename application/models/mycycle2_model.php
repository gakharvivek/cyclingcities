<?php
Class mycycle2_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getmycycle2(){
        $query = $this->db->select('*')->from('my_cycle');
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
}?>