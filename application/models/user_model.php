<?php
class user_model extends CI_Model
{
	function __construct ()
	{
		parent::__construct();
	}

  // Insert registration data in database

    public function registration($data) {

  // Query to check whether username already exist or not
        $condition = "users =" . "'" . $data['users'] . "'";
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

    public function check_user($id){
    $this->db->select('*');
	$this->db->from('users');
    $this->db->where('username', $id);
    $result = $this->db->get();
    return count($result->row_array());
 }
 
// Read data using username and password

    function verifyUser($u,$pw)
	{
		$this->load->helper('cookie');
		$this->db->select('*');
		$query = $this->db->get('users');
		$this->db->where('username',($u));
		$this->db->where('password', ($pw));
		$this->db->limit(1);

		$Q = $this->db->get('users');

		if ($Q->num_rows() > 0)
		{
			$row = $Q->row_array();
			$data = array(
				'name' => $row["name"],
				'username' => $row["username"],
				'Userid' => $row["id"],
				'pic' => $row["pic"],
				'Role' => $row["apply_for"],
				'is_login' => TRUE,
			);	
			$this->session->set_userdata($data);
		}
		else 
		{
			$this->session->set_userdata('Userid',0);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
	}

    public function login($data) {
      
        $condition = "Username =" . "'" . $data['username'] . "' AND " . "Password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        //$this->db->limit(1);
        $query = $this->db->get();
        $result =  $query->result();
        
        return $result;
        /*if ($result == 1) {
            return 1;
        } else {
            return 0;
        }*/
    }

	public function logout ()
	{
		$this->session->sess_destroy();
	}

// Read data from database to show data in admin page
    public function user_information($username) {

        $condition = "username =" . "'" . $username . "'";
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

   public function check_email($id){
    $this->db->select('*');
	$this->db->from('users');
    $this->db->where('email', $id);
    $result = $this->db->get();
    return $result->row_array();
 }

 public function check_username($id){
    $this->db->select('id');
	$this->db->from('users');
    $this->db->where('username', $id);
    $result = $this->db->get();
    return $result->row_array();
 }
 
 public function getuserdata() {
      $query = $this->db->select('*,(select role_name from tbl_role where id=users.role_id)as role_name')->from('users')->get();
      $result = $query->result_array();
      
      if (count($result) > 0) 
	  {
        return $result;
      } 
	  else 
	  {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('users');
      $this->db->where('id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
//      print_r($data);
      $this->db->where('id',$where);
      $result = $this->db->update('users', $data);
//      print_r($result); exit;
      return $result;
    }

	function get_user_permission($rolename) // data goes to main navi
	{
		 $query = $this->db->select('*')->from('tbl_module_rights')->where('role', LTRIM($rolename))->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
	}

	function delete($id){

		$Q = $this->db->QUERY('SELECT pic FROM users WHERE id="'.$id.'"');
		$data = $Q->row_array();

		if($data['pic']!="" || $data['pic']!=NULL){
			unlink(FCPATH.'/upload/user/'.$data['pic']);
		}
		$this->db->WHERE('id',$id);
		$this->db->DELETE('users');
	}
  }
?>