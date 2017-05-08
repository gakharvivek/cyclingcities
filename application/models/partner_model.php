<?php
Class partner_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getpartner() {
      $query = $this->db->select('*')->from('partner')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

   public  function edit($id) {
      $this->db->select('*')->from('partner');
      $this->db->where('p_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }

   public function update($data,$where) {
      $this->db->where('p_id',$where);
      $result = $this->db->update('partner', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT logo FROM partner WHERE p_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['logo']!="" || $data['logo']!=NULL){
			unlink(FCPATH.'/upload/logo/'.$data['logo']);
		}
		$this->db->WHERE('p_id',$id);
		$this->db->DELETE('partner');
	}
    
    }
?>