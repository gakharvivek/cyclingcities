<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class rides_events extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'rides_events';
		$data['websitepagename'] = 'rides_events';
		$data['rides'] = $this->home_model->getrides();
        $data['events'] = $this->home_model->getevents();
        $data['all'] = $this->home_model->getall();
        $data['tomorrow'] = $this->home_model->gettomorrow();
        $data['week'] = $this->home_model->getweek();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function rides_events_details($type='',$id=0)
	{
		$data['main'] = 'rides_events_details';
		$data['websitepagename'] = 'rides_events';
		$data['rides_events'] = $this->rides_events_model->getrides_events();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
}