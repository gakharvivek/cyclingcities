<?php
class Admin_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		//$this->data['meta_title'] = 'My awesome CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('pagination');
		$this->load->model('user_m');
		$this->load->model('user_model');
		$this->load->model('shop_model');
		$this->load->model('article_model');
		$this->load->model('accessories_model');
		$this->load->model('chronicles_model');
		$this->load->model('cycle_info_model');
		$this->load->model('features_model');
		$this->load->model('gallery_model');
		$this->load->model('testimonial_model');
		$this->load->model('team_model');
		$this->load->model('knowurcycle_model');
		$this->load->model('whycycle_model');
		$this->load->model('post_cycle_model');
		$this->load->model('ride_model');
		$this->load->model('join_us_model');
		$this->load->model('advertise_model');
		$this->load->model('maplocation_model');
		$this->load->model('intern_model');
		$this->load->model('partner_model');
		$this->load->model('contactus_model');
		$this->load->model('user_front_model');
		$this->load->model('profile_model');
		$this->load->model('cms_model');
		$this->load->model('reports_model');
		$this->load->model('ajaxdata_m');
		$this->load->model('utilities_m');

		
	   
	   $exception_uris = array(
			'/admin', 
			'/admin/logout',
			'admin', 
			'admin/logout',
	        'admin/forget_pass',
			'/admin/forget_pass'
		);
		//echo uri_string();
		//die;
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin');
			}
		}
	
	}
}