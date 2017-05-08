<?php
class User_M extends CI_Model
{
	
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	public $rules = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'username', 
			'rules' => 'trim|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim'
		)
	);

	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		
		$this->db->select('*,(select role_name from tbl_role where id=users.role_id)as role_name');
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password', $this->hash($this->input->post('password')));
		$this->db->limit(1);
		$Q = $this->db->get('users');

		if ($Q->num_rows() > 0)
		{
			$user = $Q->row_array();
			// Log in user
			$data = array(
				'name' => $user["name"],
				'username' => $user["username"],
				'id' => $user["id"],
				'Userid' => $user["id"],
				'pic' => $user["pic"],
				'role_id' => $user["role_id"],
				'role_name' => $user["role_name"],
				'loggedin' => TRUE,
			);	
			$this->session->set_userdata($data);

			$u = $this->input->post('username');
			$pw = $this->input->post('password');
		
			$chklogin = $this->input->post('chklogin');
		
			if(isset($chklogin) && ($chklogin) == "yes")
				{
					setcookie("cookchk", $chklogin, time()+60*60*24*100, "/");
					setcookie("cookname", $u, time()+60*60*24*100, "/");
					setcookie("cookpass", $pw, time()+60*60*24*100, "/");
				}
				else
				{
					setcookie("cookchk","", time() - 3600, "/");
					setcookie("cookname", "", time() - 3600, "/");
					setcookie("cookpass", "", time() - 3600, "/");				
				}
		}
	}
	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');

	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

	function updatepassword()
	{  
		
		$oldpassword=$_POST['txtoldpassword'];
		$password=$_POST['txtPassword'];
		if($password!="")
		{
			$Q = $this->db->query("SELECT * FROM users where password ='".$this->hash($this->input->post('txtoldpassword'))."' and id='".$this->session->userdata('id')."'");

			if ($Q->num_rows() > 0)
			{
				$data = array( 
					'password' => $this->hash($_POST['txtPassword'])
				);
				$this->db->where('id', $this->session->userdata('id'));
				$this->db->update('users',$data); 

				
				return "true";
			}
			else
			{
				return "false";
			}
		}
	}

	function newCheckUser(){

		$this->db->SELECT('id');
		$this->db->FROM('users');
		$this->db->WHERE('username',$_POST['username']);
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// -------------------- Create Code --------------------------------

	function create(){

		$data = array(
						'name' => $this->input->post('name'),
						'gender' => $this->input->post('gender'),
						'age' => $this->input->post('age'),
						'username' => $this->input->post('username'),
						'password' => $this->hash($_POST['password']),
						'pwd_txt' => $this->input->post('password'),
						'role_id' => $this->input->post('apply_for'),
						'state' => $this->input->post('state'),
						'city' => $this->input->post('city'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'occu' => $this->input->post('occu'),
						'bio_of' => $this->input->post('bio_of'),
						//'interest_area' => $this->input->post('interest_area'),
						//'pic' => $filename,
						//'cyclist' => $this->input->post('cyclist'),
						//'whatsapp' => $this->input->post('whatsapp'),
						//'why_cc' => $this->input->post('why_cc'),
						//'resume' => $filename1,
						'created' => date('Y-m-d')
					);


		if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL){

		   $config['upload_path'] = './upload/user/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('pic')){
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',$error);
				redirect('admins/user/index','refresh');
		   }else{
			   $upload_data = $this->upload->data();
			   $data['pic'] = $upload_data['file_name'];
		   }
		}

		$this->db->INSERT('users',$data);
	}

	function edit()
	{
		$data = array(
                'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'age' => $this->input->post('age'),
                //'username' => $this->input->post('username'),
                //'password' => md5($this->input->post('password')),
                //'pwd_txt' => $this->input->post('pwd_txt'),
                'role_id' => $this->input->post('apply_for'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'occu' => $this->input->post('occu'),
				// 'interest_area' => $this->input->post('interest_area'),
				// 'cyclist' => $this->input->post('cyclist'),
				// 'whatsapp' => $this->input->post('whatsapp'),
				// 'why_cc' => $this->input->post('why_cc'),
                'bio_of' => $this->input->post('bio_of'),
                //'pic' => $filename,   
				//'resume' => $filename1,
                //'created' => date('Y-m-d')
            );

		if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL){

		   $config['upload_path'] = './upload/user/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('pic')){
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',$error);
				redirect('admins/user/edit/'.$_POST['userid'],'refresh');
		   }else{
			   $upload_data = $this->upload->data();
			   $data['pic'] = $upload_data['file_name'];

			   if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
					unlink(FCPATH.'/upload/user/'.$_POST['pic_old']);
			   }
		   }
		}

		$this->db->WHERE('id',$_POST['userid']);
		$this->db->UPDATE('users',$data);
		
	}

}