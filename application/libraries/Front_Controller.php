<?php
class Front_Controller extends CI_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('facebook');
		$this->load->helper('cookie');
		$this->load->library('pagination');
		$this->load->model('home_model');
		$this->load->model('aboutus_model');
		$this->load->model('news_model');
		$this->load->model('know_your_cycle_model');
		$this->load->model('where_buy_page_model');
		$this->load->model('try_cycle_model');
		$this->load->model('try_cycle_list_model');
		$this->load->model('which_cycle_type_model');
		$this->load->model('comparecycle_model');
		$this->load->model('which_cycle_model');
		$this->load->model('which_cycle_sub_model');
		$this->load->model('buysell_model');
		$this->load->model('buyusedcycle_model');
		$this->load->model('buyusedcycle_sub_model');
		$this->load->model('ride_model');
		$this->load->model('chronicles_front_model');
		$this->load->model('chronicles_sub_model');
		$this->load->model('rides_events_model');
		$this->load->model('myactivity_model');
		$this->load->model('mycycle1_model');
		$this->load->model('mycycle_individualedit_model');
		$this->load->model('editprofile_model');
		$this->load->model('gallery_model');
		$this->load->model('cms_fm');
		$this->load->model('user_fm');
		$this->load->model('myaccount_fm');
		$this->load->model('whycycle_fm');
		$this->load->model('utilities_m');
		
	}
}