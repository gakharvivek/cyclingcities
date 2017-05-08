<?php
 Class mycycle_individualedit_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getindividual() {
        $id = $this->uri->segment(3);
        $query = $this->db->select('*')->from('my_cycle');
        $this->db->where('cycle_id', $id);
        $result = $this->db->get();
        return $result->row_array();
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
   //echo $id; exit;
      $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }
    
     function edit($id) {
     //  echo $id; exit;
      //$a=$this->session->all_userdata();
      $this->db->select('*');
        $this->db->from('my_cycle');
        if($id!=''){
            $this->db->where('cycle_id', $id);
        }
         $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$id) {
     // $a=$this->session->all_userdata();
        $this->db->where('cycle_id', $id);
        $result = $this->db->update('my_cycle', $data);
        return $result;
    }


}?>