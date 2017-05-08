<?php 
  
  class news_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
  
//    public function getnews() {
//        // $n='news';
//        $this->db->select('*');
//        $this->db->from('article');
//       // $this->db->where('article_type',$n);
//        $query = $this->db->get();
//        $result = $query->result_array();
//        return $result;
//    }
    
      public function getall() {
        $this->db->distinct('article_name', 'article_image', 'pub_date');
        $this->db->select('*');
        $this->db->from('article');
        $query = $this->db->get();
       // print_r(array($query));
        $result = $query->result_array();
        return $result;
    }
      public function getnewest() {
       $this->load->helper('date');
      $week = date("W");
      $this->db->select('*');
      $this->db->from('article');
      $this->db->where('WEEK(pub_date)', $week);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function record_count() {
      $n='news';
        $this->db->select('*');
        $this->db->from('article');
        $this->db->where('article_type',$n);
        $query = $this->db->get();
        $result = $query->result_array();
//        return $result;
  //        print_r($result);exit;
       return count($result);
 //    return $result->num_rows;
    }

    public function fetch_news($limit, $start) {
        $this->db->limit($limit, $start);
         $n='news';
        $this->db->select('*');
        $this->db->from('article');
        $this->db->where('article_type',$n);
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            
            }
            return $data;
        }
        return false;
   }

   public function getnews_details($id){
        $query = $this->db->select('*')->from('article');
         $this->db->where('article_id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
  }
   ?>