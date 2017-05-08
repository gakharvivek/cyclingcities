<?php
Class which_cycle_sub_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getwhich_cycle_sub(){
        $model_id = $this->uri->segment(3);
      $this->db->select('*')->from('model');
      $this->db->where('model_id',$model_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    public function getcycle_features(){
       $model_id = $this->uri->segment(3);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$model_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    
     public function getbrandname($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->brand_name;
        } else {
            return;
        }
    }
    public function getmodelname($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }
    
    public function getwhere_buy_page(){
        $query = $this->db->select('email')->from('shop')->get();
        return $query->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
}
?>