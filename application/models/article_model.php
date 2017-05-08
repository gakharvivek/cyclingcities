<?php
Class article_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getarticle() {
      $query = $this->db->select('*')->from('article')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
 public function getcate() {
      $query = $this->db->select('*')->from('category')->order_by('cate_id','desc')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getcatename($id) {
      $query = $this->db->select('cate_name')->from('category')->where('cate_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['cate_name'];
      } else {
        return array();
      }
    }
    
  public function getsub($id='') {
    
      $this->db->select('*');
      $this->db->from('subcategory');
      if($id!=''){
        $this->db->where('cate_id',$id);
      }
   $query=  $this->db->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getsubname($id) {
      $query = $this->db->select('sub_name')->from('subcategory')->where('sub_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['sub_name'];
      } else {
        return array();
      }
    }

    /* ARTICLE MODULE */
    
     function edit($id) {
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
    
     /* CATEGORY MODULE */
    
     function editcate($id) {
      $this->db->select('*')->from('category');
      $this->db->where('cate_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
     function updatecate($data,$where) {
      $this->db->where('cate_id',$where);
      $result = $this->db->update('category', $data);
      return $result;
    }
    
      /* SUB CATEGORY MODULE */
    
    function editsub($id) {
      $this->db->select('*')->from('subcategory');
      $this->db->where('sub_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
    function updatesub($data,$where) {
      $this->db->where('sub_id',$where);
      $result = $this->db->update('subcategory', $data);
      return $result;
    }

	function newCheckcate(){

		$this->db->SELECT('cate_id');
		$this->db->FROM('category');
		$this->db->WHERE('cate_name',$_POST['cate_name']);
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	function createcategory(){

		$data = array(
						'cate_name' => $this->input->post('cate_name'),
						'cate_desc' => $this->input->post('cate_desc')
					 );

		$this->db->insert('category', $data);
	}

	function delete($id){

		$Q = $this->db->QUERY('SELECT article_image FROM article WHERE article_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['article_image']!="" || $data['article_image']!=NULL){
			unlink(FCPATH.'/upload/article/'.$data['article_image']);
		}
		$this->db->WHERE('article_id',$id);
		$this->db->DELETE('article');
	}


  }

?>