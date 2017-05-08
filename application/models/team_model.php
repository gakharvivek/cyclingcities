<?php 
  class team_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
    public function getteam(){
      $query = $this->db->select('*')->from('team')->get();
      $result = $query->result_array();
      
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
    
    function edit($id){
      $this->db->select('*')->from('team');
      $this->db->where('id',$id);
      $result= $this->db->get();
      return $result->row_array();
    }
  
    function update($data,$where){
      $this->db->where('id',$where);
      $result = $this->db->update('team',$data);
      return $result;
    }
	
	function delete($id){

		$Q = $this->db->QUERY('SELECT pic FROM team WHERE id="'.$id.'"');
		$data = $Q->row_array();

		if($data['pic']!="" || $data['pic']!=NULL){
			unlink(FCPATH.'/upload/team/'.$data['pic']);
		}

		$this->db->WHERE('id',$id);
		$this->db->DELETE('team');
	}
  }
  ?>