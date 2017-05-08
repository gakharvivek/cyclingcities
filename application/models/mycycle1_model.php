<?php
Class mycycle1_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getmycycle1() {
      $fuserid=$this->session->userdata('fuserid');
        $query = $this->db->select('*')->from('my_cycle')->where('user_id',$fuserid);
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    //Insert 

    public function insert($data) {
        $this->db->insert('my_cycle', $data);
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
    public function getbrandname($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['brand_name'];
        } else {
            return array();
        }
    }

    public function getmodel($id = '') {
        $this->db->select('*');
        $this->db->from('model');
        if ($id != '') {
            $this->db->where('brand_id', $id);
        }
        else{
        $this->db->where('brand_id',0);
      }
        $query = $this->db->get();

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
}?>