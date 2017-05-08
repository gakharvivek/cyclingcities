<?php
class user_front extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {
	  $this->data['result'] = $this->user_front_model->getuserdata();
		$this->data['title'] = "Manage User Front";
		$this->data['main'] = 'admin/adminfiles/user_front/index';
		$this->data['webpagename'] = 'user_front';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

}

?>