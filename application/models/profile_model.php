<?php
Class profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public
			 function getprofile() {
				 $query = $this->db->select('*')->from('users')->get();
				 return $query->result();
				 // print_r($query); exit;
				 // $query = $this->db->get_where('tbl_publisher',array('status'=>'Enable'));

				 if ($query->num_rows() > 0) {
						 return $query->result();
				 }
				 else {
						 return array();
				 }
		 }

		 function edit($id) {
				 $this->db->select('*')->from('users');
				 $this->db->where('id', $id);
				 $result = $this->db->get();
				 return $result->row_array();
		 }

		 function update($data) {
				 $id = $data['id'];
				 unset($data['submit']);
				 $this->db->where('id', $id);
				 $result = $this->db->update('users', $data);
				 //$result = $this->db->update(tbl_marketers, $data);
				 return $result;
		 }
		
		public function getuserdata($id) {
				 $query = $this->db->select('*,(select name from states where id=users.state)as statename,(select name from cities where id=users.city)as cityname')->from('users')->where('id',$id)->get();
				 $result =  $query->result();
				 // print_r($query); exit;
				 // $query = $this->db->get_where('tbl_publisher',array('status'=>'Enable'));

				 if (count($result) > 0) {
						 return $result[0];
				 }
				 else {
						 return array();
				 }
		 }
}?>