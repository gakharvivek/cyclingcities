<?php
Class features_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getfeatures() {
      $query = $this->db->select('*,(select brand_name from brand where brand_id=features.brand_id) as brand_name,(select name from model where model_id=features.model_id) as model_name')->from('features')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
 public function getbrand() {
      $query = $this->db->select('*')->from('brand')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getbrandname($id) {
      $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['brand_name'];
      } else {
        return array();
      }
    }
    
  public function getmodel($id='') {
      $this->db->select('*');
      $this->db->from('model');
      if($id!=''){
        $this->db->where('brand_id',$id);
      }
      $query=  $this->db->get();
      
      $result = $query->result_array();
     // echo '<pre>'; print_r($result); exit;
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getmodelname($id) {
      $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }

    
    
     function edit($id) {
      $this->db->select('*')->from('features');
      $this->db->where('id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
    function update($data,$where) {
      $this->db->where('id',$where);
      $result = $this->db->update('features', $data);
      return $result;
    }

	function delete($id){

		$this->db->WHERE('id',$id);
		$this->db->DELETE('features');
	}
}
?>