<?php
Class buysell_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function getbuysell(){
      $query = $this->db->select('*')->from('posturcycle');
        $result = $this->db->get();
      return $result->result_array();
      
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
    public function insert($data){
         $this->db->insert('posturcycle', $data);
          return $this->db->insert_id();
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
    public function getmycycle() {
       $this->db->select('a.*, b.*');
       $this->db->from('my_cycle a');
       $this->db->join('model b', 'a.model_id = b.model_id','left'); 
       $this->db->group_by('a.model_id'); 
       $query = $this->db->get();
       $data=$query->result_array();
     // print_r($query);
     // return $query->result();
     if (count($data) > 0) {
        return $data;
       // print_r($query);
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
      else{
        $this->db->where('brand_id',0);
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
  public function model($id1) 
	{
        // $mid1 = $this->uri->segment(3);
         //$mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('posturcycle');
         $this->db->where('model_id',$id1);
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
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
}?>