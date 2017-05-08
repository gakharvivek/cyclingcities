<?php

  Class gallery_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getgallery() {
      $query = $this->db->select('*')->from('gallery')->get();
      $result = $query->result_array();
    
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

     function edit($id) {
      $this->db->select('*')->from('gallery');
      $this->db->where('gallery_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }

    function update($data,$where) {
      $this->db->where('gallery_id',$where);
      $result = $this->db->update('gallery', $data);
      return $result;
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT gallery_img FROM gallery WHERE gallery_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['gallery_img']!="" || $data['gallery_img']!=NULL){
			unlink(FCPATH.'/upload/gallery/'.$data['gallery_img']);
		}

		$this->db->WHERE('gallery_id',$id);
		$this->db->DELETE('gallery');
	}

	 public function record_count() {
         
		 $this->db->select('*');
        $this->db->from('gallery');
        $query = $this->db->get();
        $result = $query->result_array();
//        return $result;
  //        print_r($result);exit;
       return count($result);
    }

	public function fetch_gallery($limit,$start,$sorting) 
	{
		$this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('gallery');

		if($sorting=='newest')
		{
			$this->db->order_by("gallery_id", 'desc');
		}
		else
		{
			$this->db->order_by("gallery_id", 'asc');
		}

        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            
            }
            return $data;
        }
        return false;
   }

    
  }
  
?>