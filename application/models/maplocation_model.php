<?php
Class maplocation_model extends CI_Model {

     public function __construct() {
        parent::__construct();
    }

    public function getmaplocation() {
        $query = $this->db->select('*')->from('maplocation')->get();
        $result = $query->result_array();
      
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    public function insert($data) {
        
        $this->db->insert('maplocation', $data);
        return $this->db->insert_id();
    }
    public function edit($id) {
        
        $this->db->select('*')->from('maplocation');
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update($data,$where) {
        $this->db->where('id',$where);
        $result = $this->db->update('maplocation', $data);
        return $result;
    }

	function delete($id){

		$this->db->WHERE('id',$id);
		$this->db->DELETE('maplocation');
	}
}?>