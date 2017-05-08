<?php
Class reports_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getuserdata() 
	{
		$this->db->SELECT("uf.*");
		$this->db->FROM("users_front uf");

		$sessionfilterData = array(
			'startdate' => '',
			'enddate' => '',
		);
	
		if(isset($_POST['startdate']) && $_POST['startdate']!="")
		{
			$startdate=date('Y-m-d',strtotime($_POST['startdate']));
			$this->db->WHERE("uf.created >=",$startdate);
			$sessionfilterData['startdate'] = $_POST['startdate'];
		}
		else
		{
			$currentdate=date('Y-m-d');
			$this->db->WHERE("uf.created =",$currentdate);
            $startdate=date('m/d/Y');
			$sessionfilterData['startdate'] = $startdate;
		}

		if(isset($_POST['enddate']) && $_POST['enddate']!="")
		{
			$enddate=date('Y-m-d',strtotime($_POST['enddate']));
			$this->db->WHERE("uf.created <=",$enddate);
			$sessionfilterData['enddate'] = $_POST['enddate'];
		}

		$this->db->order_by('uf.id','desc');
		
		$this->db->distinct();
		//echo $this->db->last_query();die;

		
				
		$Q = $this->db->GET();
		//echo $this->db->last_query();die;
		$this->session->set_userdata($sessionfilterData);
		return $Q->result_array();
    }

	 public function gettry_cycle() {

		 $this->db->SELECT("tc.*");
		$this->db->FROM("try_cycle tc");

		$sessionfilterData = array(
			'startdate' => '',
			'enddate' => '',
		);
	
		if(isset($_POST['startdate']) && $_POST['startdate']!="")
		{
			$startdate=date('Y-m-d',strtotime($_POST['startdate']));
			$this->db->WHERE("tc.post_date >=",$startdate);
			$sessionfilterData['startdate'] = $_POST['startdate'];
		}
		else
		{
			$currentdate=date('Y-m-d');
			$this->db->WHERE("tc.post_date =",$currentdate);
            $startdate=date('m/d/Y');
			$sessionfilterData['startdate'] = $startdate;
		}

		if(isset($_POST['enddate']) && $_POST['enddate']!="")
		{
			$enddate=date('Y-m-d',strtotime($_POST['enddate']));
			$this->db->WHERE("tc.post_date <=",$enddate);
			$sessionfilterData['enddate'] = $_POST['enddate'];
		}

		$this->db->order_by('tc.id','desc');
		
		$this->db->distinct();
		//echo $this->db->last_query();die;

		
				
		$Q = $this->db->GET();
		//echo $this->db->last_query();die;
		$this->session->set_userdata($sessionfilterData);
		return $Q->result_array();
    }

	public function getsell_cycle() {

		 $this->db->SELECT("puc.*");
		$this->db->FROM("posturcycle puc");

		$sessionfilterData = array(
			'startdate' => '',
			'enddate' => '',
		);
	
		if(isset($_POST['startdate']) && $_POST['startdate']!="")
		{
			$startdate=date('Y-m-d',strtotime($_POST['startdate']));
			$this->db->WHERE("puc.post_date >=",$startdate);
			$sessionfilterData['startdate'] = $_POST['startdate'];
		}
		else
		{
			$currentdate=date('Y-m-d');
			$this->db->WHERE("puc.post_date =",$currentdate);
            $startdate=date('m/d/Y');
			$sessionfilterData['startdate'] = $startdate;
		}

		if(isset($_POST['enddate']) && $_POST['enddate']!="")
		{
			$enddate=date('Y-m-d',strtotime($_POST['enddate']));
			$this->db->WHERE("puc.post_date <=",$enddate);
			$sessionfilterData['enddate'] = $_POST['enddate'];
		}

		$this->db->order_by('puc.id','desc');
		
		$this->db->distinct();
		//echo $this->db->last_query();die;

		
				
		$Q = $this->db->GET();
		//echo $this->db->last_query();die;
		$this->session->set_userdata($sessionfilterData);
		return $Q->result_array();
    }
}?>