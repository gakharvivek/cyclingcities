<?php
Class editprofile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function geteditprofile(){
       $userid=$this->session->userdata('fuserid');

		$data = array();
		$Q = $this->db->query('SELECT * FROM users_front where id ="'.$userid.'"');

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		} 
		$Q->free_result();    
		return $data;      
    }
    
     function edit($id) {
     // $a=$this->session->all_userdata();
      $this->db->select('*')->from('users_front');
        if($id!=''){
            $this->db->where('id',$id);
        }
        $query=$this->db->get();
        $result=$query->row_array();
//      echo '<pre>';  print_r($result);exit;
        return $result;
    }

    function update($data) {
        $userid=$this->session->userdata('fuserid');
       //print_r($data); exit;
        $this->db->where('id', $userid);
        $result = $this->db->update('users_front', $data);
        return $result;
    }
    
}
?>