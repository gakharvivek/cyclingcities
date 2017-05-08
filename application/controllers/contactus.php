<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class contactus extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }

function x()
{
echo "xx contact";
}
	function index()
	{
		$data['main'] = 'contactus';
		$data['websitepagename'] = 'contactus';
		if($this->input->post('contactemail')!='')
			{	
				$this->contactMail();
				$this->session->set_flashdata('message1','Thank you for your inquiry. We will get back to you soon.');	
				redirect('contactus/','refresh');
			}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function contactMail()
	{

		$countrydata=$this->user_fm->getcountrydata($_POST['contactcountryid']);
		$statedata=$this->user_fm->getstatedata($_POST['contactstateid']);
		$citydata=$this->user_fm->getcitydata($_POST['contactcityid']);

		//$u=$userdata["username"];
		$countryname=$countrydata["name"];
		$statename=$statedata["name"];
		$cityname=$citydata["name"];

		$bodydata['fname']=ucfirst($_POST['contactfname']);
		$bodydata['lname']=ucfirst($_POST['contactlname']);
		$bodydata['email']=$email = $_POST['contactemail'];
		$bodydata['phone']=$_POST['contactphone'];
		$bodydata['countryname']=$countryname;
		$bodydata['statename']=$statename;
		$bodydata['cityname']=$cityname;
		$bodydata['messagedata']=$_POST['message'];
		$from=$email;
		$name = ucfirst($_POST['contactfname'])." ".ucfirst($_POST['contactlname']);
		$to = $this->config->item('toemailid');
		$cc = '';
		$subject = "Inquiry/Feedback from website.";
		$attach = "";
		$body = $this->load->view('email_templates/contactMail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		
	}
}