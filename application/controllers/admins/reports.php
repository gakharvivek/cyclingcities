<?php
class reports extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() 
	{
	    $this->session->unset_userdata('startdate');
	    $this->session->unset_userdata('enddate');
	   
		$this->data['result'] = $this->reports_model->getuserdata();
		$this->data['title'] = "User Registrations";
		$this->data['main'] = 'admin/adminfiles/reports/userregistrations';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function searchresult() 
	{
	   if(isset($_POST['btnsubmit'])) 
		{
			$this->data['result'] = $this->reports_model->getuserdata();
		}
		else
		{
			$this->data['result'] = $this->reports_model->getuserdata();
		}
	  
		$this->data['title'] = "User Registrations";
		$this->data['main'] = 'admin/adminfiles/reports/userregistrations';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	 public function trycycledata() 
	{
	    $this->session->unset_userdata('startdate');
	    $this->session->unset_userdata('enddate');
	   
	    $this->data['result'] = $this->reports_model->gettry_cycle();
		$this->data['title'] = "Try Cycle Data";
		$this->data['main'] = 'admin/adminfiles/reports/trycycledata';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function searchtrycycledata() 
	{
	   if(isset($_POST['btnsubmit'])) 
		{
			 $this->data['result'] = $this->reports_model->gettry_cycle();
		}
		else
		{
			 $this->data['result'] = $this->reports_model->gettry_cycle();
		}
	  
		$this->data['title'] = "Try Cycle Data";
		$this->data['main'] = 'admin/adminfiles/reports/trycycledata';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function sellcycledata() 
	{
	    $this->session->unset_userdata('startdate');
	    $this->session->unset_userdata('enddate');
	   
	    $this->data['result'] = $this->reports_model->getsell_cycle();
		$this->data['title'] = "Sell Cycle Data";
		$this->data['main'] = 'admin/adminfiles/reports/sellcycledata';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function searchsellcycledata() 
	{
	   if(isset($_POST['btnsubmit'])) 
		{
			 $this->data['result'] = $this->reports_model->getsell_cycle();
		}
		else
		{
			 $this->data['result'] = $this->reports_model->getsell_cycle();
		}
	  
		$this->data['title'] = "Sell Cycle Data";
		$this->data['main'] = 'admin/adminfiles/reports/sellcycledata';
		$this->data['webpagename'] = 'reports';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

}

?>