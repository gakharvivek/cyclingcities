<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }

function t()
{
	echo CI_VERSION;
}
	function index()
	{
		$data['main'] = 'index';
		$data['websitepagename'] = 'index';
		$data['article'] = $this->home_model->getarticle();
		$data['chronicles'] = $this->home_model->getchronicles();
		$data['maploc'] = $this->home_model->getmaploction();
		$data['rides'] = $this->home_model->getrides();
        $data['events'] = $this->home_model->getevents();
        $data['all'] = $this->home_model->getall();
        $data['tomorrow'] = $this->home_model->gettomorrow();
        $data['week'] = $this->home_model->getweek();
		$data['cyclingclub'] = $this->home_model->getcyclingclub();
		$data['testimonial'] = $this->home_model->gettestimonial();
		$this->load->vars($data);
		$this->load->view('template/homemaster');
	}

	function getdesc()
	{
		$maploction = $this->home_model->getmapdesc($_POST['id']);
        $html = '';
        if (isset($maploction))
		{
          $html.=$maploction[0]['maploction_desc'];
        }
        echo $html;
        exit;
	}

	 public function sendfeedback() {
      $userid=$this->session->userdata('fuserid');
      if (count($_POST) > 0) {
		  $this->feedbackmail();
		  redirect(site_url('dashboard'),'refresh');
        }
    }

	function feedbackmail()
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
		$feedback=$_POST['add_info'];

		$user= $this->user_fm->getUserData($u);
        if(count($user)>0)
		{
			$bodydata['feedback']=$feedback;
			$bodydata['fname']=$fname=ucfirst($user[0]["firstname"]);
			$bodydata['lname']=$lname=ucfirst($user[0]["lastname"]);
			$bodydata['email']=$email = $user[0]['email'];
			$from = $email;
			$name = $fname." ".$lname;
			$to=$this->config->item('toemailid');
			$cc = '';
			$subject = "Cycling Cities Feedback";
			$attach = "";
			$body = $this->load->view('email_templates/feedbackmail',$bodydata,true);
			$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		}
	}

	 public function sendnewsletter() {

      if (count($_POST) > 0) {
		  $this->sendnewslettermail();
		  redirect(site_url('dashboard'),'refresh');
        }
    }

	function sendnewslettermail()
	{
		    $bodydata['email']=$email = $_POST['newsletteremail'];
			$from = $this->config->item('toemailid');
			$name = "";
			$to=$email;
			$cc = '';
			$subject = "Cycling Cities Subscribe";
			$attach = "";
			$body = $this->load->view('email_templates/sendnewslettermail',$bodydata,true);
			$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}
}