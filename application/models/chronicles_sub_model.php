<?php
Class chronicles_sub_model extends CI_Model {

    public function __construct() {
        parent::__construct();
       // $this->load->database();
    }
    
    public function getchronicles_sub(){
         $id = $this->uri->segment(3);
        $query = $this->db->select('*')->from('chronicles');
         $this->db->where('chronicles_id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    
  //   public function getusedata(){
       
//     }
    
    public function getusedata(){
        $this->db->select('a.*');
        $this->db->from('users a');
         $this->db->join('chronicles b', 'a.id = b.post_by'); 
        $result = $this->db->get();
       
        $data= $result->row_array();
//        echo '<pre>'; print_r($data); exit;
        if (count($data) > 0) {
        
          return $data;
        } else {
          return array();
        }
    }
  
     public function record_count() {
        return $this->db->count_all("chronicles");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("chronicles");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
?>