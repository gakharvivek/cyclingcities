<?php
Class know_your_cycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getknow(){
        $query = $this->db->select('*')->from('accessories');
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }

	public function getknowlimit(){
        $query = $this->db->select('*')->from('accessories');
		$this->db->limit(9);
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
//        public function update_retrive($id)
//    {
//        $this->db->where('id',$id);/* I have to select multiple userid but how?*/
//        $this->db->from('accessories');
//        $query = $this->db->get();
//        return $query->result();
//    }
}?>