<?php 
  
  class cms_fm extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
   function getcmsbyid($id)
	{
		$data = array();
		$Q = $this->db->select('* from cms where id='.$id.'');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		} 

		$Q->free_result();  
		
		return $data; 
	}
}?>