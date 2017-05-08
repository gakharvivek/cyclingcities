<?php
class join_us extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {
	   $this->data['join_us'] = $this->join_us_model->getjoin_us();
		$this->data['title'] = "Manage Join Us";
		$this->data['main'] = 'admin/adminfiles/join_us/index';
		$this->data['webpagename'] = 'join_us';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }
}

?>