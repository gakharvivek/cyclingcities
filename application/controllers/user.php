<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }

	public function index()
	{
	}

	public function CheckVerification()
	{
		$userid=$this->session->userdata('fuserid');
		if (!isset($userid) || $userid < 1)
		{
			//redirect('admin/login','refresh');
		}
		else
		{
			redirect(site_url('dashboard'),'refresh');
		}
	}

	public function university_registration()
	{
		$data['main'] = 'university_registration';
		$data['websitepagename'] = 'register';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	public function CheckLoginVerification()
	{
		$userid=$this->session->userdata('fuserid');

		if (!isset($userid) || $userid < 1)
		{
			redirect(site_url('dashboard'),'refresh');
		}
		else
		{
			
		}
	}

	function login()
	{
		$this->CheckVerification();
    	$this->user_fm->loggedin() == FALSE || redirect('dashboard');
		$data['main'] = 'register';
		$data['websitepagename'] = 'register';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function register()
	{
		$this->CheckVerification();
		$data['main'] = 'register';
		$data['websitepagename'] = 'register';
		if(isset($_POST['Register'])) 
		{
			$roleid = $_POST['roleid'];

			if($roleid==1)
			 {
			   $RegistrationsId=$this->user_fm->adduniversity();
			   $this->registeruniversitymail($RegistrationsId);

			   $this->session->set_flashdata('message', 'Your registration has been completed successfully. Please verify your email address.');
				redirect('user/university_registration','refresh');
			 }
			
			if($roleid==2)
			{
			   $RegistrationsId=$this->user_fm->adduser();
			   $this->registermail($RegistrationsId);

			   $this->session->set_flashdata('message', 'Your registration has been completed successfully. Please verify your email address.');
				redirect('user/login','refresh');
			}
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function registerfrontuser()
	{
		$email=trim($_POST['email']);
		
		$RegistrationsId=$this->user_fm->adduser();

		if($RegistrationsId!=0)
		{
			$this->registermail($RegistrationsId);
			echo $RegistrationsId;
		}
		else
		{
			echo $RegistrationsId;
		}	
	}

	function registermail($id)
	{
		$Q = $this->db->query('SELECT * FROM users_front where id="'.$id.'"');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$userid = md5($row['id']);
			}
		}
		$u=$_POST['email'];

		$user= $this->user_fm->getUserData($u);
        if(count($user)>0)
		{
			$bodydata['userid']=$userid;
			$bodydata['password']=$password=$_POST['password'];
			$bodydata['fname']=$fname=ucfirst($user[0]["firstname"]);
			$bodydata['lname']=$lname=ucfirst($user[0]["lastname"]);
			$bodydata['username']=$username = $user[0]['username'];
			$bodydata['email']=$email = $user[0]['email'];
			$from = $this->config->item('fromemailid');
			$name = $fname." ".$lname;
			$to=$email;
			$cc = '';
			$subject = "Account Information.";
			$attach = "";
			$body = $this->load->view('email_templates/registermail',$bodydata,true);
			$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		}
	}

	function thankyou($id)
	{
		$data['userid'] =$id;
		$data['main'] = 'thankyou';
		$data['websitepagename'] ='thankyou';
		$this->load->vars($data);
		$this->load->view('thankyou');
	}

	function autologin($id)
	{	
		$data['Userdata'] = $userdata=$this->user_fm->getautologinDatabyid($id);
		//$u=$userdata["username"];
		$u=$userdata["email"];
		$pw = $userdata["password"];
		$this->user_fm->verifyUser($u,$pw);
		if($this->session->userdata('fuserid') > 0)
		{
			//echo '456';
			//die;
			$this->session->set_flashdata('login','yes');
			$sessionpageurl = $this->session->userdata('sessionpageurl');
			if($sessionpageurl!=null || $sessionpageurl!="")
			{
				redirect($sessionpageurl,'refresh');
			}
			else
			{
				if($this->input->post('txtpreviouspage')!="")
				{
					redirect($this->input->post('txtpreviouspage'),'refresh');
				}
				redirect('dashboard','refresh');
			}			
		}
		else
		{
			//echo '123';
			//die;
			$this->session->set_flashdata('login','no');
			redirect('user/login','refresh');
		}
		$this->load->vars($this->data);
	}

	function verify()
	{
	  	if ($this->input->post('username'))
		{	
			$u = $this->input->post('username');
			$password = $this->input->post('password');
			$pw =$this->user_fm->hash($password);
            
			$roleid =0;
			$Q = $this->db->query('SELECT roleid FROM tbl_user where username="'.$u.'"');
			if ($Q->num_rows() > 0)
			{
				foreach ($Q->result_array() as $row)
				{
					$roleid = $row['roleid'];
				}
			}
			if($roleid==1)
			{
				$this->user_fm->verifyuniversity($u,$pw);
			}
			else
			{
				$this->user_fm->verifyUser($u,$pw);
			}
			if($this->session->userdata('fuserid') > 0)
			{   
				$this->session->set_flashdata('login','yes');
				$sessionpageurl = $this->session->userdata('sessionpageurl');
				if($sessionpageurl!=null || $sessionpageurl!="")
				{
					redirect($sessionpageurl,'refresh');
				}
				else
				{
					if($this->input->post('txtpreviouspage')!="")
					{
						redirect($this->input->post('txtpreviouspage'),'refresh');
					}
					elseif(isset($_POST['current_uri']))
					{
						redirect($_POST['current_uri'],'refresh');
					}
					else{
						redirect('dashboard','refresh');
					}
				}			
			}
			else
			{
				$this->session->set_flashdata('login','no');
				redirect('user/login','refresh');
			}
		}
		else
		{
			
			redirect('user/login','refresh');
		}
		
		$this->load->vars($this->data);
	}

	function verifypopup()
	{
	  	if ($this->input->post('username'))
		{	
			$u = $this->input->post('username');
			$password = $this->input->post('password');
			$pw =$this->user_fm->hash($password);
            $return=$this->user_fm->verifyUserpopup($u,$pw);
			if($this->session->userdata('fuserid') > 0)
			{   
				$this->session->set_flashdata('login','yes');
				if($this->input->post('txtpreviouspage')!="")
				{
					echo 4;
				}
				else
				{
					echo 3;
				}
			}
			else
			{
				$this->session->set_flashdata('login','no');
				echo $return;
			}
		}
		else
		{
			echo 0;
		}
	}

	public function logout(){
		$fuserid=$this->session->userdata('fuserid');
	   	$this->user_fm->logout();
		$this->session->set_flashdata('login','no');
		redirect('','refresh');
    }

	function forgot_password()
	{
		$this->CheckVerification();
		$data['main'] = 'forgot_password';
		$data['websitepagename'] = 'forgot_password';
		$this->load->vars($data);
		//$this->load->view('forgot_password');
		$this->load->view('template/innermaster');
	}

	function verifyusername()
	{
		if ($this->input->post('username'))
		{
			$u = $this->input->post('username');
			$flag= $this->user_fm->verifyUserName($u);

			if($flag=="false")
			{
				$this->session->set_flashdata('message', 'Username not found. Please try again!');
				redirect('user/forgot_password','refresh');
			}
			else
			{
				$this->user_fm->passwordmail($u);
				$this->session->set_flashdata('message','true');
				redirect('user/forgot_password','refresh');
			}
		}
		$this->data['main'] = 'user/forgotpassword';
	}

	public function order_history($page=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'order_history';
		$data['websitepagename'] = 'order_history';

		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = site_url('user/order_history');
		$config["total_rows"] = $this->user_fm->getAllOrdersCount();

		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data["totalpage"]=$config['per_page'];
		$data["totalrows"]=$config['total_rows'];

		$data["pagination"]=$this->pagination->create_links();

		$start = $this->pagination->cur_page * $this->pagination->per_page;
		$end = $start + $this->pagination->per_page;
		$total = $this->pagination->total_rows;

		$data['orderdata'] = $this->user_fm->getAllOrders($config["per_page"], $page);

		$data['start'] = $start;
		$data['end']= $end;
		$data['total'] = $total;

		$offset = ($page) ? $page : 0 ; 
		$first_record = $offset + 1; 
		$last_record = $page + count($data['orderdata']); 
		$total_count = $config["total_rows"]; 

		$data['range'] = "Items ".$first_record." to ".$last_record." of ".$total_count." total";

		
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function orderdetail($uuid)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'orderdetail';
		if ($uuid!='')
		{
			$data['orders'] = $this->cart_fm->getordersByUuid($uuid);
			$data['ordersdetail'] = $this->cart_fm->getorderitemUuId($uuid);
			//$this->mcart->ordermail($ordid);
			$data['websitepagename'] = 'orderdetail';
		}
		else
		{
			redirect(site_url('user/order_history'),'refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function mailchangepassword($userid=0)
	{
		$data['userid']=$userid;
		$data['main'] = 'mailchangepassword';
		$data['websitepagename'] = 'mailchangepassword';
	    if($this->input->post('submit'))
		{   
			
			$id=$this->input->post('userid');
            $data['Userdata'] = $userdata=$this->user_fm->getUserDatabyid1($id);

			$u=$userdata["email"];
			$password = $this->input->post('password');
			$pw =$this->user_fm->hash($password);

			$this->user_fm->emailupdatepassword($id);
            $this->user_fm->confirmationemail($u,$password);
			
            
			if(isset($_POST['chklogin']) && ($_POST['chklogin']) == "yes")
			{

				setcookie("cookchk1", $_POST['chklogin'], time()+60*60*24*100, "/");
				setcookie("cookname1", $u, time()+60*60*24*100, "/");
				setcookie("cookpass1", $pw1, time()+60*60*24*100, "/");
			}
			else
			{
				setcookie("cookchk1","", time() - 3600, "/");
				setcookie("cookname1", "", time() - 3600, "/");
				setcookie("cookpass1", "", time() - 3600, "/");

			}

			$this->user_fm->verifyUser($u,$pw);

			if($this->session->userdata('fuserid') > 0)
			{
				$this->session->set_flashdata('login','yes');
				$sessionpageurl = $this->session->userdata('sessionpageurl');
				if($sessionpageurl!=null || $sessionpageurl!="")
				{
					redirect($sessionpageurl,'refresh');
				}
				else
				{
					if($this->input->post('txtpreviouspage')!="")
					{
						redirect($this->input->post('txtpreviouspage'),'refresh');
					}

					redirect('dashboard','refresh');
				}			
			}
			else
			{
				$this->session->set_flashdata('login','no');
				redirect('user/login','refresh');
			}

		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function EmailVerification($userid)
	{
		$this->CheckVerification();
		$this->user_fm->updateemailverifyflag($userid);
		$this->autologinemail($userid);
	}

	function autologinemail($id)
	{
            
            $data['Userdata'] = $userdata=$this->user_fm->getautologinemailDatabyid($id);
		    $u=$userdata["username"];
			$pw = $userdata["password"];
			
			if(isset($_POST['chklogin']) && ($_POST['chklogin']) == "yes")
			{

				setcookie("cookchk1", $_POST['chklogin'], time()+60*60*24*100, "/");
				setcookie("cookname1", $u, time()+60*60*24*100, "/");
				setcookie("cookpass1", $pw, time()+60*60*24*100, "/");
			}
			else
			{
				setcookie("cookchk1","", time() - 3600, "/");
				setcookie("cookname1", "", time() - 3600, "/");
				setcookie("cookpass1", "", time() - 3600, "/");

			}

			$this->user_fm->verifyUser($u,$pw);

			if($this->session->userdata('fuserid') > 0)
			{
				$this->session->set_flashdata('login','yes');
				$sessionpageurl = $this->session->userdata('sessionpageurl');
				if($sessionpageurl!=null || $sessionpageurl!="")
				{
					redirect($sessionpageurl,'refresh');
				}
				else
				{
					if($this->input->post('txtpreviouspage')!="")
					{
						redirect($this->input->post('txtpreviouspage'),'refresh');
					}

					redirect('dashboard','refresh');
				}			
			}
			else
			{
				$this->session->set_flashdata('login','no');
				//redirect('user/login','refresh');
				redirect('dashboard','refresh');
			}

	}

	function checkcaptchacode()
	{         
		$key = substr($this->session->userdata('ResultStr'),0,8);
		$captchacode=$_REQUEST['code'];
			
		if($captchacode!=$key)
		{ 
			$value= "false";
			echo $value;
		}
		else
		{
			$value= "true";
			echo $value;
		}

	}

	function checkusername()
	{  
        $email=trim($_REQUEST['email']);
		//echo $candidateemail; 

		$data['checkusername'] = $checkusername = $this->user_fm->checkvalidateusernamebyemail(urldecode($email));

		echo $checkusername;
		//exit();

	}

	function autologinregistration($id)
	{
            
            $data['Userdata'] = $userdata=$this->user_fm->getautologinregistrationDatabyid($id);


		    $u=$userdata["email"];
			$pw = $userdata["password"];
			
			if(isset($_POST['chklogin']) && ($_POST['chklogin']) == "yes")
			{

				setcookie("cookchk1", $_POST['chklogin'], time()+60*60*24*100, "/");
				setcookie("cookname1", $u, time()+60*60*24*100, "/");
				setcookie("cookpass1", $pw, time()+60*60*24*100, "/");
			}
			else
			{
				setcookie("cookchk1","", time() - 3600, "/");
				setcookie("cookname1", "", time() - 3600, "/");
				setcookie("cookpass1", "", time() - 3600, "/");

			}


			$this->user_fm->verifyUser($u,$pw);

			if($this->session->userdata('fuserid') > 0)
			{
				$this->session->set_flashdata('login','yes');
				redirect('myaccount/personalprofile','refresh');
			}
			else
			{
				$this->session->set_flashdata('login','no');
				redirect('user/login','refresh');
			}
	}

	function resendverification()
    {
		$flag=1;
        $check=$this->user_fm->checkEmailExists();		
        if($check==1)
        {
            $active=$this->user_fm->checkEmailActive();          
            if($active==0)
            {       
				$this->resendconfirmationmail();
                echo $flag;				
            }
            else
            {
				$flag=2;
                echo $flag;
             
            }
        }
        else
        {
			$flag=3;
            echo $flag;          
        }
    }

	
	function resendconfirmationmail()
	{
		$Q = $this->db->query('SELECT * FROM users_front where username="' .$_POST['verifyemail']. '"');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$userid = md5($row['id']);
				$FirstName = $row['firstname'];
				$LastName = $row['lastname'];
				$email = $row['email'];
			}
		}

		//echo $uuid;
		$Q->free_result();

		$bodydata['userid']=$userid;
		$bodydata['fname']=$fname=ucfirst($FirstName);
		$bodydata['lname']=$lname=ucfirst($LastName);
		$bodydata['email']=$email;
		$from = $this->config->item('fromemailid');
		$name = $fname." ".$lname;
		$to=$email;
		$cc = '';
		$subject = "Email Verification.";
		$attach = "";
		$body = $this->load->view('email_templates/resendconfirmationmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}

	function verifyemail() 
	{
		$flag=$this->user_fm->verifyUseremail();
		echo $flag;
    }

	function verifyloginUseremail() 
	{
		$flag=$this->user_fm->verifyloginUseremail();
		echo $flag;
    }

	function sendforgotpasswordlink() 
	{
		$txtforgotUsername=trim($_POST['txtforgotUsername']);
		$this->sendforgotpasswordmail();	
    }

	function sendforgotpasswordmail()
	{
        $Q = $this->db->query('SELECT id,firstname,lastname,email from users_front where username="' .$_POST['txtforgotUsername']. '"');
        if ($Q->num_rows() > 0)
        {
            foreach ($Q->result_array() as $row)
            {
				$userid = md5($row['id']);
                $emailaddress = $row['email'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $id = $row['id'];
            }
        }

        $Q->free_result();

        $email = $emailaddress;
        
		$bodydata['userid']=$userid;
		$bodydata['fname']=ucfirst($fname);
		$bodydata['lname']=ucfirst($lname);
		$bodydata['email']=$email;
		$from = $this->config->item('fromemailid');
		$name = $fname." ".$lname;
		$to=$email;
		$cc = '';
		$subject = "Cycling City Forgot Password Link";
		$attach = "";
		$body = $this->load->view('email_templates/sendforgotpasswordmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
    }

	function resetpassword($uuid=0) 
	{
		$data['uuid']=$uuid;
		if($this->input->post('btnsubmit'))
        {
            $this->user_fm->EditforgotPassword();
            $this->session->set_flashdata('message','Your password has been changed successfully.');
            redirect('user/resetpassword/'.$_POST['uuid'],'refresh');
        }
        else
        {
			$data['main'] = 'resetpassword';
			$data['websitepagename'] = 'resetpassword';
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
    }

	function register_link($fbid)
	{
		$data['websitepagename'] = 'register_link';
		$data['main'] = 'register_link';
		$data['fbid'] = $fbid;
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function loginFbMap()
	{
		$this->user_fm->loginFbMap();
	}

	public function addride() 
	{
       if (count($_POST) > 0) 
		{
            $data = array(
				'category' => $this->input->post('rtype'),
                'ride_title' => $this->input->post('ride_title'),
                'ride_start_point' => $this->input->post('ride_start_point'),
                'rtype' => $this->input->post('rtype'),
                'ride_end_point' => $this->input->post('ride_end_point'),
                'ride_organizer' => $this->input->post('ride_organizer'),
                'ride_date' => date('Y-m-d', strtotime($this->input->post('ride_date'))),
                'ride_time' => $this->input->post('ride_time'),
                //'ride_story_title' => $this->input->post('ride_story_title'),
                //'ride_story' => $this->input->post('ride_story'),
                'ride_distance' => $this->input->post('ride_distance'),
                'ride_Active' => $this->input->post('ride_Active'),
                //'no_of_rider' => $this->input->post('no_of_rider'),
                 'not_cyclist'=>$this->input->post('not_cyclist'),
                'add_info'=>$this->input->post('add_info'),
                //'map_image' => $filename,
                //'ride_poster' => $filename1
            );
            
               if($_FILES['map_image']['name']!="" || $_FILES['map_image']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/ride/map/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('map_image')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('dashboard','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['map_image'] = $upload_data['file_name'];
				   }
				}

		    if($_FILES['ride_poster']['name']!="" || $_FILES['ride_poster']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/ride/poster/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('ride_poster')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('dashboard','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['ride_poster'] = $upload_data['file_name'];
				   }
				}

			$this->ride_model->insert($data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('dashboard','refresh');
        }
    }
}