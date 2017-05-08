<?php
Class chronicles_front_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function getchroniclescategory() {
      $this->db->select('*');
      $this->db->from('ch_category');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

     public function record_count($cate_id,$searchbycity,$post_by,$tags) {
         
		if($cate_id!="")
		{
			$this->db->WHERE("ch_category = '".$cate_id."'");
		}

		if($searchbycity!="")
		{
			$this->db->WHERE("city = '".$searchbycity."'");
		}

		if($post_by!=0)
		{
			$this->db->WHERE("post_by = '".$post_by."'");
		}

		if($tags!="")
		{
			$this->db->WHERE("chronicles_tag like '%".$tags."%'");
		}

		 $this->db->select('*');
        $this->db->from('chronicles');
        $query = $this->db->get();
        $result = $query->result_array();
//        return $result;
  //        print_r($result);exit;
       return count($result);
    }

    public function fetch_chronicles($limit, $start,$cate_id,$sorting,$searchbycity,$post_by,$tags) 
	{
		if($cate_id!="")
		{
			$this->db->WHERE("ch_category = '".$cate_id."'");
		}

		if($searchbycity!="")
		{
			$this->db->WHERE("city = '".$searchbycity."'");
		}

		if($post_by!=0)
		{
			$this->db->WHERE("post_by = '".$post_by."'");
		}

		if($tags!="")
		{
			$this->db->WHERE("chronicles_tag like '%".$tags."%'");
		}

		$this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('chronicles');

		if($sorting=='newest')
		{
			$this->db->order_by("chronicles_date", 'desc');
		}
		else
		{
			$this->db->order_by("chronicles_id", 'asc');
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
   public function getcityById($id) {
        $query = $this->db->select('name')->from('cities')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }

   public function getstateById($id) {
        $query = $this->db->select('name')->from('states')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }

       public function getcity() {
      $this->db->distinct('city');
      $this->db->select('city');
      $this->db->from('chronicles');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcooks() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'cooks');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcitylist($city='') {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('city', $city);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcitizens() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'citizens');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcelebrities() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'celebrities');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcorporate() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'corporate');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcampuses() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'campuses');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getclubs() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'clubs');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcrusaders() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'crusaders');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getroutes() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'routes');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function getcafes() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'cafes');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function gettrips() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'trips');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
       public function gettips() {
      $this->db->select('*');
      $this->db->from('chronicles');
      $this->db->where('ch_category', 'tips');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

	public function getusername($id) {
        $query = $this->db->select('name')->from('users')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return;
        }
    }

	public function getuserpic($id) {
        $query = $this->db->select('pic')->from('users')->where('id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->pic;
        } else {
            return;
        }
    }
}?>