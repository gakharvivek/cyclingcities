<?php
class dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        
		$this->data['result'] = $this->user_front_model->getuserdata();
		$this->data['activeuser'] = $this->user_front_model->getactiveuserdata();
		$this->data['inactiveuser'] = $this->user_front_model->getinactiveuserdata();
		$this->data['title'] = "Manage Dashboard";
		$this->data['main'] = 'admin/main';
		$this->data['webpagename'] = 'main';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster'); 
    }

	public function changepassword()
	{
		$data['main'] = 'admin/change_password';
		$data['webpagename'] = '';
		$this->load->vars($data);
		$this->load->view('admin/template/popupmaster');
	}

	public function updatepassword()
	{
		$this->load->helper('cookie');
		$data['main'] = 'admin/change_password';

		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');

		//$this->load->model('madmin');
		$flag= $this->user_m->updatepassword();	
		if($flag=="false")
		{
			$this->session->set_flashdata('passmessage','false');
		}
		else
		{
			$this->session->set_flashdata('passmessage','true');
		}
		redirect('/admins/dashboard/changepassword','refresh');
	}

}