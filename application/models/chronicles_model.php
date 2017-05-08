<?php
Class chronicles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getchronicles() {
        $query = $this->db->select('*')->from('chronicles')->get();
        $result = $query->result_array();
      
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    public function insert($data) {
      $this->db->insert('chronicles', $data);
        return $this->db->insert_id();
    }
    public function edit($id) {
        $this->db->select('*')->from('chronicles');
        $this->db->where('chronicles_id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }
    public function update($data,$where) {
        $this->db->where('chronicles_id',$where);
        $result = $this->db->update('chronicles', $data);
        return $result;
    }
    
    public function getcate() {
      $query = $this->db->select('*')->from('ch_category')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getcatename($id) {
      $query = $this->db->select('cate_name')->from('ch_category')->where('cate_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['cate_name'];
      } else {
        return array();
      }
    }
    
      /* CATEGORY MODULE */
    
     function editcate($id) {
      $this->db->select('*')->from('ch_category');
      $this->db->where('cate_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }
    
     function updatecate($data,$where) {
      $this->db->where('cate_id',$where);
      $result = $this->db->update('ch_category', $data);
      return $result;
    }
    
    public function getstate() {
        $query = $this->db->select('id,name')->from('states')->where('country_id',101)->get();
       $result = $query->result_array();
       
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getcityById($id){
               $this->db->select('*')->from('cities');
       if($id!=''){
          $this->db->where('state_id', $id);
       }
      $result = $this->db->get();
      return $result->result_array();
    }
     public function getcity($id) {
        $query = $this->db->select('name')->from('cities')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT chronicles_image,chronicles_image1,chronicles_image2,chronicles_image3,chronicles_image4 FROM chronicles WHERE chronicles_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['chronicles_image']!="" || $data['chronicles_image']!=NULL){
			unlink(FCPATH.'/upload/chronicles/'.$data['chronicles_image']);
		}

		if($data['chronicles_image1']!="" || $data['chronicles_image1']!=NULL){
			unlink(FCPATH.'/upload/chronicles/'.$data['chronicles_image1']);
		}

		if($data['chronicles_image2']!="" || $data['chronicles_image2']!=NULL){
			unlink(FCPATH.'/upload/chronicles/'.$data['chronicles_image2']);
		}

		if($data['chronicles_image3']!="" || $data['chronicles_image3']!=NULL){
			unlink(FCPATH.'/upload/chronicles/'.$data['chronicles_image3']);
		}

		if($data['chronicles_image4']!="" || $data['chronicles_image4']!=NULL){
			unlink(FCPATH.'/upload/chronicles/'.$data['chronicles_image4']);
		}
		$this->db->WHERE('chronicles_id',$id);
		$this->db->DELETE('chronicles');
	}

//        {
//        $query = $this->db->select('id,name')->from('cities')->where('state_id', $id)->get();
//        return $query->result();
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        } else {
//            return array();
//        }
//    }

     public function getusername($id) {
        $query = $this->db->select('name')->from('users')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }

    
}
?>