<?php
Class knowurcycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getknowurcycle() {
      $query = $this->db->select('*')->from('knowurcycle')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('knowurcycle');
      $this->db->where('id',$id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('id',$where);
      $result = $this->db->update('knowurcycle', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT image1,image2,image3 FROM knowurcycle WHERE id="'.$id.'"');
		$data = $Q->row_array();

		if($data['image1']!="" || $data['image1']!=NULL){
			unlink(FCPATH.'/upload/knowurcycle/'.$data['image1']);
		}

		if($data['image2']!="" || $data['image2']!=NULL){
			unlink(FCPATH.'/upload/knowurcycle/'.$data['image2']);
		}

		if($data['image3']!="" || $data['image3']!=NULL){
			unlink(FCPATH.'/upload/knowurcycle/'.$data['image3']);
		}

		$this->db->WHERE('id',$id);
		$this->db->DELETE('knowurcycle');
	}

    
  }

?>