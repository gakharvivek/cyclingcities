<?php
Class accessories_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getacc() {
      $query = $this->db->select('*')->from('accessories')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('accessories');
      $this->db->where('id',$id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('id',$where);
      $result = $this->db->update('accessories', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT img1,img2,img3 FROM accessories WHERE id="'.$id.'"');
		$data = $Q->row_array();

		if($data['img1']!="" || $data['img1']!=NULL){
			unlink(FCPATH.'/upload/accessory/'.$data['img1']);
		}

		if($data['img2']!="" || $data['img2']!=NULL){
			unlink(FCPATH.'/upload/accessory/'.$data['img2']);
		}

		if($data['img3']!="" || $data['img3']!=NULL){
			unlink(FCPATH.'/upload/accessory/'.$data['img3']);
		}

		$this->db->WHERE('id',$id);
		$this->db->DELETE('accessories');
	}

    
  }

?>