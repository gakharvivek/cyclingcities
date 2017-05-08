<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class personal_profile extends Front_Controller {

	function __construct()
    {
        parent::__construct();	

		$userid=$this->session->userdata('fuserid');
		if (!isset($userid) || $userid < 1)
		{
			redirect(site_url('dashboard'),'refresh');
		}
		else
		{
			
		}
    }


	function index()
	{
		$data['main'] = 'view_profile';
		$data['websitepagename'] = 'edit_profile';
		$data['editprofile'] = $this->editprofile_model->geteditprofile();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function view_profile()
	{
		$data['main'] = 'view_profile';
		$data['websitepagename'] = 'edit_profile';
		$data['editprofile'] = $this->editprofile_model->geteditprofile();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	
	function edit_profile()
	{
		$data= array();
		if (count($_POST) > 0) 
		  {
		  		if($this->input->post('fname')){
		  			$data['firstname'] = $this->input->post('fname');
		  		}
		  		if($this->input->post('lname')){
		  			$data['lastname'] = $this->input->post('lname');
		  		}
		  		if($this->input->post('dob')){
		  			$data['dob'] = $this->input->post('dob');
		  		}
		  		if($this->input->post('area')){
		  			$data['area'] = $this->input->post('area');
		  		}
		  		if($this->input->post('occu')){
		  			$data['occu'] = $this->input->post('occu');
		  		}
		  		if($this->input->post('owncycle')){
		  			$data['owncycle'] = $this->input->post('owncycle');
		  		}
		  		if($this->input->post('gender')){
		  			$data['gender'] = $this->input->post('gender');
		  		}
		  		
		  		if($this->input->post('marital')){
		  			$data['marital'] = $this->input->post('marital');
		  		}
		  		
		  		if($this->input->post('stateid')){
		  			$data['state'] = $this->input->post('stateid');
		  		}
		  		if($this->input->post('cityid')){
		  			$data['city'] = $this->input->post('cityid');
		  		}
		  		if($this->input->post('country')){
		  			$data['country'] = $this->input->post('country');
		  		}
		  		
		  		if($this->input->post('pincode')){
		  			$data['pincode'] = $this->input->post('pincode');
		  		}
		  		
		  		if($this->input->post('marital')){
		  			$data['marital'] = $this->input->post('marital');
		  		}
		  		
		  		if($this->input->post('user_type')){
		  			$data['user_type'] = $this->input->post('user_type');
		  		}
		  		
		  		if($this->input->post('club_member')){
		  			$data['club_member'] = $this->input->post('club_member');
		  		}
		  		
		  		if($this->input->post('typeofcyclinst')){
		  			$data['typeofcyclinst'] = $this->input->post('typeofcyclinst');
		  			$data['typeofcyclinst']= implode(",",$data['typeofcyclinst']);
		  		}
		  	/*
			 $data = array(
				//'id' =>  $id,
				'firstname' => $this->input->post('fname'),
				'lastname' => $this->input->post('lname'),
				'dob' => $this->input->post('dob'),
				'area' => $this->input->post('area'),
				'occu' => $this->input->post('occu'),
				'owncycle' => $this->input->post('owncycle'),
				'gender' => $this->input->post('gender'),
				'marital' => $this->input->post('marital'),
				'pincode' => $this->input->post('pincode'),
				'user_type' => $this->input->post('user_type'),
				'club_member' => $this->input->post('club_member'),
				'typeofcyclinst' => $this->input->post('typeofcyclinst'),
				//'member_since' => $this->input->post('member_since'),
				//'password' => $this->hash($this->input->post('password'))
		);*/
        
				$result = $this->editprofile_model->update($data);
                $this->session->set_flashdata("success", "profile Edited Sucessfully");
				redirect("personal_profile/view_profile");

		  }

		$data['main'] = 'edit_profile';
		$data['websitepagename'] = 'edit_profile';
		$data['editprofile'] = $this->editprofile_model->geteditprofile();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	function update_picture(){
		log_message('debug',"files>>>>>".print_r($_FILES,true));
		if( isset( $_FILES['pic']['name'] ) && ( $_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL)  )
		{
				
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
				$response = array("status"=>false,"message"=>$error['warning']);
				echo json_encode($response);
				return ;
			}else{
				$upload_data = $this->upload->data();
				$data['pic'] = $upload_data['file_name'];
				if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
					unlink(FCPATH.'/upload/user/'.$_POST['pic_old']);
				}
				$result = $this->editprofile_model->update($data);
				$response = array("status"=>true,"message"=>"Profile image has been changed successfully.");
				echo json_encode($response);
			}
		}else{
			$response = array("status"=>false,"message"=>"Please choose any picture.");
			echo json_encode($response);
			return ;
		}
	}
	
	function update_password(){
		$data= array();
		if (count($_POST) > 0){
			/***password updation after matchings ***/
			if($this->input->post('oldpassword') &&  $this->input->post('password') &&  $this->input->post('confirmpassword') ){
				$entered_password = $this->input->post('oldpassword');
				$entered_password = hash('sha512', $entered_password . config_item('encryption_key'));
				$user = $this->editprofile_model->edit($this->input->post('editid'));
				if($entered_password <> $user['password']) {
					$response =  array('status' => false,'message' => "the old password is incorrect. Please enter correct old password and try again");
					echo json_encode($response);
					return ;
				}
				
				if( $this->input->post('password') == $this->input->post('confirmpassword') ) {
					$data['password'] = $this->input->post('password');
					$data['password'] = hash('sha512', $data['password'] . config_item('encryption_key'));
					$result = $this->editprofile_model->update($data);
					$response =  array('status' => true,'message'=>'Your password has been updated successfully.');
					echo json_encode($response);
				}
			}
		}
		else {
			echo "no value";
		}
	}
	function refer_tofriend()
	{
		$data['main'] = 'refer_tofriend';
		$data['websitepagename'] = 'refer_tofriend';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	 public function sendinvitation() {

		 if (count($_POST) > 0) {
		  $this->sendinvitationmail();
		  redirect(site_url('personal_profile/refer_tofriend'),'refresh');
        }
	 }

	 function sendinvitationmail()
	 {
		$id=$this->session->userdata('fuserid');

		$Q = $this->db->query('SELECT * FROM users_front where id="'.$id.'"');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$useremail = $row['email'];
			}
		}

		$u=$useremail;
		$msg=$_POST['msg'];
		$inviteemail=$_POST['inviteemail'];

		$user= $this->user_fm->getUserData($u);
        if(count($user)>0)
		{
			$bodydata['msg']=$msg;
			$bodydata['email']=$email = $user[0]['email'];
			$from = $email;
			$name = "";
			$to=$inviteemail;
			$cc = $this->config->item('toemailid');
			$subject = "Cycling Cities Invitaiton";
			$attach = "";
			$body = $this->load->view('email_templates/sendinvitationmail',$bodydata,true);
			$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		}
	 }


	function settings()
	{
		$data['main'] = 'settings';
		$data['websitepagename'] = 'settings';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function sendfacebook()
	{
		$data['main'] = 'sendfacebook';
		$data['websitepagename'] = 'sendfacebook';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
}