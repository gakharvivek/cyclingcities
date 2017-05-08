<?php
class ajaxdata_m extends CI_Model
{
	function getAJAXData($aColumns,$sTable,$sQuery)
	{	
		$rResult = $this->db->query( $sQuery );
		$output = array(
			"aaData" => array()
		);
		foreach ($rResult->result_array() as $aRow)
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{		
				$row[] = $aRow[ $aColumns[$i] ];
			}
			$output['aaData'][] = $row;
		}
		return $output;
	}	
}


?>