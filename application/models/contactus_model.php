<?php 
  class contactus_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
    public function getcontact(){
      $query = $this->db->select('*')->from('contactus')->get();
      $result = $query->result_array();
      
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
    
 /*   function edit($id){
      $this->db->select('*')->from('contactus');
      $this->db->where('contact_id',$id);
      $result= $this->db->get();
      return $result->row_array();
    }
  
    function update($data,$where){
      $this->db->where('contact_id',$where);
      $result = $this->db->update('contactus',$data);
      return $result;
    } 
 */
    
    public function getcountry() {
        $query = $this->db->select('*')->from('countries')->get();
        $result = $query->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    
    public function getcountryById($id) {
        $query = $this->db->select('name')->from('countries')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }
    
    public function getstateById($id) {
        $query = $this->db->select('name')->from('states')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
            return $result[0]->name;
        } else {
            return;
        }
    }

    public function getcityById($id) {
        $query = $this->db->select('name')->from('cities')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
            return $result[0]->name;
        } else {
            return;
        }
    }
    

    public function getstate() {
        $query = $this->db->select('*')->from('states')->get();
        $result = $query->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getcity() {
        $query = $this->db->select('*')->from('cities')->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
}?>