<?php
Class cycle_info_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 /*public function getarticle() {
      $query = $this->db->select('*')->from('article')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }*/
    
 public function getbrand() {
      $query = $this->db->select('*')->from('brand')->get();
      $result = $query->result_array();
    //  print_r($result);exit;
      if (count($result) > 0) {
      
        return $result;
      } else {
        //  echo $result; exit;
        return array();
      }
    }
   
 public function getbrandname($id) {
      $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
    //  echo $query; exit;
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['brand_name'];
      } else {
        return array();
      }
    }
    
  public function getmodel() {
      $query = $this->db->select('*,(select brand_name from brand where brand_id=model.brand_id) as brand_name')->from('model')->get();
	 // echo $this->db->last_query();
	 // die;
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getmodelname($id) {
      $query = $this->db->select('model_name')->from('model')->where('model_id', $id)->get();
      
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['model_name'];
      } else {
        return array();
      }
    }

    /* ARTICLE MODULE */
    
/*    function edit($id) {
      $this->db->select('*')->from('article');
      $this->db->where('article_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
    function update($data,$where) {
      $this->db->where('article_id',$where);
      $result = $this->db->update('article', $data);
      return $result;
    }
    */
     /* Brand MODULE */
    
     function editbrand($id) {
      $this->db->select('*')->from('brand');
      $this->db->where('brand_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
     function updatebrand($data,$where) {
      $this->db->where('brand_id',$where);
      $result = $this->db->update('brand', $data);
      return $result;
    }
    
      /* Model MODULE */
    
    function editmodel($id) {
      $this->db->select('*')->from('model');
      $this->db->where('model_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
    function updatemodel($data,$where) {
      $this->db->where('model_id',$where);
      $result = $this->db->update('model', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT logo FROM brand WHERE brand_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['logo']!="" || $data['logo']!=NULL){
			unlink(FCPATH.'/upload/logo/'.$data['logo']);
		}

		$this->db->WHERE('brand_id',$id);
		$this->db->DELETE('brand');
	}

	function deletemodel($id){

		$Q = $this->db->QUERY('SELECT img1 FROM model WHERE model_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['img1']!="" || $data['img1']!=NULL){
			unlink(FCPATH.'/upload/model/'.$data['img1']);
		}

		$this->db->WHERE('model_id',$id);
		$this->db->DELETE('model');
	}

  }

?>