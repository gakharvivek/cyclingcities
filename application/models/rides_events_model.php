<?php
Class rides_events_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getrides_events() {
        $id = $this->uri->segment(4);
        $cate = $this->uri->segment(3);
        $query = $this->db->select('*')->from('rides');
        $this->db->where('ride_id', $id);
        $this->db->where('category', $cate);
        $result = $this->db->get();
      
        return $result->row_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function record_count() {
      $cate = $this->uri->segment(3);
      $this->db->select('*')->from('rides');
        $this->db->where('category', $cate);
        $query = $this->db->get();
        $result = $query->result_array();
      //  return $this->db->count_all("rides");
         return count($result);
    }

    public function fetch_rides($limit,$start) {
        $id = $this->uri->segment(3);
        $cate = $this->uri->segment(4);
         $this->db->limit($limit, $start);
        $this->db->select('*')->from('rides');
        $this->db->where('ride_id', $id);
        $this->db->where('category',$cate);
        $query = $this->db->get();
       $result = $query->row_array();
     // echo '<pre>';  print_r($result); exit;
      
        if ($query->num_rows() > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


    public function insert($data) {

        $this->db->insert('rides', $data);
        return $this->db->insert_id();
    }

    public function edit($id) {

        $this->db->select('*')->from('rides');
        $this->db->where('ride_id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update($data, $where) {
        $this->db->where('ride_id', $where);
        $result = $this->db->update('rides', $data);
        return $result;
    }
}?>