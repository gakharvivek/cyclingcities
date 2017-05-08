<?php
class myactivity_model extends CI_Model
{

	public function getmy_listing(){
        $fuserid=$this->session->userdata('fuserid');
        $query = $this->db->select('*')->from('posturcycle')->where('user_id',$fuserid)->order_by('post_date','desc');
//        $query = $this->db->select('*')->from('posturcycle');
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    
    
    public function getmodelname($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }  
}?>