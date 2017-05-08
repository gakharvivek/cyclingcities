<?php
Class testimonial_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function gettestimonials() {
        $query = $this->db->select('*')->from('testimonial')->get();
        $result = $query->result_array();
      
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    public function insert($data) {
        
        $this->db->insert('testimonial', $data);
        return $this->db->insert_id();
    }
    public function edit($id) {
        
        $this->db->select('*')->from('testimonial');
        $this->db->where('testimonial_id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update($data,$where) {
        $this->db->where('testimonial_id',$where);
        $result = $this->db->update('testimonial', $data);
        return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT testimonial_image FROM testimonial WHERE testimonial_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['testimonial_image']!="" || $data['testimonial_image']!=NULL){
			unlink(FCPATH.'/upload/testimonial/'.$data['testimonial_image']);
		}

		$this->db->WHERE('testimonial_id',$id);
		$this->db->DELETE('testimonial');
	}

}

?>