<?php
Class whycycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getwhycycle() {
      $query = $this->db->select('*')->from('whycycle')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('whycycle');
      $this->db->where('id',$id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('id',$where);
      $result = $this->db->update('whycycle', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT image1,image2,image3 FROM whycycle WHERE id="'.$id.'"');
		$data = $Q->row_array();

		if($data['image1']!="" || $data['image1']!=NULL){
			unlink(FCPATH.'/upload/whycycle/'.$data['image1']);
		}

		if($data['image2']!="" || $data['image2']!=NULL){
			unlink(FCPATH.'/upload/whycycle/'.$data['image2']);
		}

		if($data['image3']!="" || $data['image3']!=NULL){
			unlink(FCPATH.'/upload/whycycle/'.$data['image3']);
		}

		$this->db->WHERE('id',$id);
		$this->db->DELETE('whycycle');
	}

    
  }

?>