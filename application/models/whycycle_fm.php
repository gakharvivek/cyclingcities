<?php
class whycycle_fm extends CI_Model
{

	function getallwhycycle()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from whycycle order by id asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function Getbindimagesname($value)
	{
		$data = array();
		$Q = $this->db->select('* from whycycle where id="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
}?>