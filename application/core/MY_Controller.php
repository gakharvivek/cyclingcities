<?php
class MY_Controller extends CI_Controller {
	
	public $data = array();
		function __construct() {
			parent::__construct();
			$this->data['errors'] = array();
			//$this->data['site_name'] = config_item('site_name');
			
			/*
			$this->db->select('*,(select asset_name from tbl_assets where asset_id=tbl_assets_language.asset_id) as constant_name');
			$lang_id=1;
			if($this->session->userdata('lang_id'))
			{
				$lang_id=$this->session->userdata('lang_id');
			}
			$this->db->where('lang_id',$lang_id);
			$Q =  $this->db->get('tbl_assets_language');
			if ($Q->num_rows() > 0)
			{
				foreach ($Q->result_array() as $row)
				{
					define($row['constant_name'], $row['asset_name'] );
				}
			}*/
		}
}