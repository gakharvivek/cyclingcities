<?php
Class buyusedcycle_sub_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getcycle() {
        $id = $this->uri->segment(3);
        $this->db->select('*,(select firstname from users_front where id=posturcycle.user_id) firstname,(select lastname from users_front where id=posturcycle.user_id) lastname,(select email from users_front where id=posturcycle.user_id) email,(select phone from users_front where id=posturcycle.user_id) phone,(select whatsapp from users_front where id=posturcycle.user_id) whatsapp')->from('posturcycle');
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getcycle_features() {
        $model_id = $this->uri->segment(4);
        // echo $model_id; exit;
        $this->db->select('*')->from('features');
        $this->db->where('model_id', $model_id);
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
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0]->brand_name;
        } else {
            return;
        }
    }

    public function getmodelname($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0]->name;
        } else {
            return;
        }
    }

}?>