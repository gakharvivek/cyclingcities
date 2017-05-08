<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class termsofservice extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'termsofservice';
		$data['websitepagename'] = 'termsofservice';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
}