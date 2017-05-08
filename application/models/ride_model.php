<?php
Class ride_model extends CI_Model {
    
	public function __construct() {
        parent::__construct();
    }

    public function getrides() {
        $query = $this->db->select('*')->from('rides')->get();
        $result = $query->result_array();
      
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    public function insert($data) {
        
        $this->db->insert('rides', $data);
        return $this->db->insert_id();
    }
    public function edit($id) {
        
        $this->db->select('*')->from('rides');
        $this->db->where('ride_id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update($data,$where) {
        $this->db->where('ride_id',$where);
        $result = $this->db->update('rides', $data);
        return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT map_image,ride_poster FROM rides WHERE ride_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['map_image']!="" || $data['map_image']!=NULL){
			unlink(FCPATH.'/upload/ride/map/'.$data['map_image']);
		}

		if($data['ride_poster']!="" || $data['ride_poster']!=NULL){
			unlink(FCPATH.'/upload/ride/poster/'.$data['ride_poster']);
		}


		$this->db->WHERE('ride_id',$id);
		$this->db->DELETE('rides');
	}
}

?>