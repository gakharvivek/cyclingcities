<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class aboutus extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'aboutus';
		$data['websitepagename'] = 'aboutus';
		$data['team'] = $this->aboutus_model->getteam();
        $data['partner'] = $this->aboutus_model->getpartner();
        $data['about1'] = $this->aboutus_model->getaboutus1();
        //echo '<pre>';print_r($data);exit;
        $data['about2'] = $this->aboutus_model->getaboutus2();
        $data['about3'] = $this->aboutus_model->getaboutus3();
        //$data['about4'] = $this->aboutus_model->getaboutus4();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
}