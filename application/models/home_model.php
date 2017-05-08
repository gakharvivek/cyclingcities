<?php
 Class home_model extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function getarticle() {
      $art_name = 'HOW CYCLING CITIES WORKS?';
      $query = $this->db->select('*')->from('article');
      $this->db->where('article_name', $art_name);
      $result = $this->db->get();
      return $result->row_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

    public function getcyclingclub() {
      $art_name = 'RISE OF CYCLING CLUBS';
      $query = $this->db->select('*')->from('article');
      $this->db->where('article_name', $art_name);
      $result = $this->db->get();
      return $result->row_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

    public function getchronicles() {
      $this->db->distinct('chronicles_image');
      $this->db->select('*');
      $this->db->from('chronicles');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function getall() {
      //$this->db->limit(3);
      $this->db->distinct('ride_title', 'map_image', 'ride_poster');
      $this->db->select('*');
      $this->db->from('rides');
	  $this->db->where('ride_active', 1);
      $this->db->order_by('ride_date', 'asc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function getrides() {
      $cate = 'ride';
      //$this->db->limit(3);
      $this->db->distinct('ride_title', 'map_image', 'ride_poster');
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->where('category', $cate);
	  $this->db->where('ride_active', 1);
      $this->db->order_by('ride_date', 'asc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function getevents() {
      $cate = 'event';
      //$this->db->limit(3);
      $this->db->distinct('ride_title', 'map_image', 'ride_poster');
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->where('category', $cate);
	   $this->db->where('ride_active', 1);
      $this->db->order_by('ride_date', 'asc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function gettomorrow() {
      //$tomorrow = strtotime("+1 day", $date);
      $this->load->helper('date');
      $tomorrow = date("Y-m-d", strtotime("tomorrow"));
      //$this->db->limit(3);
      //  echo $tomorrow; exit;
      //   $this->db->distinct('ride_title','map_image','ride_poster');
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->where('ride_date', $tomorrow);
	   $this->db->where('ride_active', 1);
      $query = $this->db->get();
      $result = $query->result_array();
      //print_r($result['ride_poster']);exit;
      return $result;
    }

    public function getweek() {
      $this->load->helper('date');
      $week = date("W");
      //$this->db->limit(3);
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->where('WEEK(ride_date)', $week);
	   $this->db->where('ride_active', 1);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function insertride($data) {

      $this->db->insert('rides', $data);
      return $this->db->insert_id();
    }

    public function gettestimonial() {
      $this->db->distinct('testimonial_text');
      $this->db->select('*');
      $this->db->from('testimonial');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function getmaploction() {
      $this->db->select('*');
      $this->db->from('maplocation');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function getmapdesc($id) {
      $this->db->select('maploction_desc');
      $this->db->from('maplocation');
      $this->db->where('id', $id);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function registration_insert($data) {

// Query to check whether email already exist or not
      $condition = "email =" . "'" . $data['email'] . "'";
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 0) {

// Query to insert data in database
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
          return true;
        }
      } else {
        return false;
      }
    }

// Read data using username and password
    public function login($data) {

      $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
        return true;
      } else {
        return false;
      }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

      $condition = "email =" . "'" . $username . "'";
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function check_email($id) {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('email', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
}?>