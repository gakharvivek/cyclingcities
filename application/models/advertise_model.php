<?php
Class advertise_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getadv() {
      $query = $this->db->select('*')->from('advertise')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('advertise');
      $this->db->where('ad_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('ad_id',$where);
      $result = $this->db->update('advertise', $data);
      return $result;
    }

	function delete($id){

		$this->db->WHERE('ad_id',$id);
		$this->db->DELETE('advertise');
	}
}?>