<?php
class admin extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }


    public function index()
	{
		$dashboard = 'admins/dashboard';
    	$this->user_m->loggedin() == FALSE || redirect($dashboard);
    	
    	$rules = $this->user_m->rules;
    	$this->form_validation->set_rules($rules);
        
    	if ($this->form_validation->run() == TRUE) {
		
    		// We can login and redirect
    		if ($this->user_m->login() == TRUE) {
				//redirect($dashboard);
    		}
    		else {
    			$this->session->set_flashdata('error', 'That username/password combination does not exist');
    			redirect('admin', 'refresh');
    		}
    	}
        $this->load->view('admin/index');
    }

    public function logout(){
    	$this->user_m->logout();
    	redirect('admin');
    }

	 public function forget_pass()
	 {
        
        if($this->input->post('username'))
		{
			$user = $this->user_model->check_username($_POST['username']);
			//print_r($user);exit;
			if(count($user)>0){
			 
				$this->sendforgotpasswordmail();
				$this->session->set_flashdata('message1','Password has been send to your email id.');	
				redirect('admin/','refresh');
			
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid username.');
    			redirect('admin/forget_pass', 'refresh');
			}
        }
         $this->load->view('admin/forget_view');
      }

	  function sendforgotpasswordmail()
		{

			$Q = $this->db->query('SELECT id,name,email,username,pwd_txt from users where username="' .$_POST['username']. '"');
			if ($Q->num_rows() > 0)
			{
				foreach ($Q->result_array() as $row)
				{
					$username = $row['username'];
					$password = $row['pwd_txt'];
					$emailaddress = $row['email'];
					$name = $row['name'];
					$id = $row['id'];
				}
			}

			$Q->free_result();

			$email = $emailaddress;
			
			$bodydata['username']=$username;
			$bodydata['password']=$password;
			$bodydata['name']=ucfirst($name);
			$bodydata['email']=$email;
			$from = $this->config->item('fromemailid');
			$name = $name;
			$to=$email;
			$cc = '';
			$subject = "Cycling City Admin Forgot Password Link";
			$attach = "";
			$body = $this->load->view('admin/email_templates/sendforgotpasswordmail',$bodydata,true);
			$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		}
}