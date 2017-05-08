<?php 
  class intern_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getintern(){
      $query = $this->db->select('*')->from('intern')->get();
      $result = $query->result_array();
      
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
    
    function edit($id){
      $this->db->select('*')->from('intern');
      $this->db->where('intern_id',$id);
      $result= $this->db->get();
      return $result->row_array();
    }
  
    function update($data,$where){
      $this->db->where('intern_id',$where);
      $result = $this->db->update('intern',$data);
      return $result;
    } 

	function delete($id){

		$Q = $this->db->QUERY('SELECT pic FROM intern WHERE intern_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['pic']!="" || $data['pic']!=NULL){
			unlink(FCPATH.'/upload/intern/'.$data['pic']);
		}
		$this->db->WHERE('intern_id',$id);
		$this->db->DELETE('intern');
	}
}?>