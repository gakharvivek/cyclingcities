<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class privacypolicy extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'privacypolicy';
		$data['websitepagename'] = 'privacypolicy';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
}