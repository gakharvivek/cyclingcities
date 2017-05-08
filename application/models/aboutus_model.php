<?php 
  class aboutus_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
   /* public function getteam(){
      $query = $this->db->select('*')->from('team')->get();
      $result = $query->result_array();
      
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }*/
    
    public function getteam() {
        $this->db->distinct('pic');
        $this->db->select('*');
        $this->db->from('team');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function getpartner() {
        //$this->db->distinct('pic');
        $this->db->select('*');
        $this->db->from('partner');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function getaboutus1() {
        $a="ABOUT CYCLING CITIES"; 
        $query = $this->db->select('*')->from('article');
        $this->db->where('article_name', $a);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    public function getaboutus2() {
        $a="OUR STRATEGY"; 
        $query = $this->db->select('*')->from('article');
        $this->db->where('article_name', $a);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    public function getaboutus3() {
        $a="OUR TEAM"; 
        $query = $this->db->select('*')->from('article');
        $this->db->where('article_name', $a);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    public function getaboutus4() {
        $a="about us4"; 
        $query = $this->db->select('*')->from('article');
        $this->db->where('article_name', $a);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
}?>