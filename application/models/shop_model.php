<?php
Class shop_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function getshop() {
      $query = $this->db->select('*,(select name from cities where id=shop.city) as cityname')->from('shop')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }

   public  function edit($id) {
      $this->db->select('*')->from('shop');
      $this->db->where('shop_id', $id);
      $result = $this->db->get();
      return $result->row_array();
    }

   public function update($data,$where) {
      $this->db->where('shop_id',$where);
      $result = $this->db->update('shop', $data);
      return $result;
    }
    
   public function getallstate(){
       $this->db->select('*')->from('states')->where('country_id',101);
       $query = $this->db->get();
       $result = $query->result_array();
       return $result;
    }

   public function getallapply_for(){
       $this->db->select('*')->from('tbl_role');
       $query = $this->db->get();
       $result = $query->result_array();
       return $result;
    }
    
    public function getstatename($id){
      $query = $this->db->select('name')->from('states')->where('id', $id)->get();
     // print_r($query); exit;
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }
   public function getallcities($id=''){
       $this->db->select('*')->from('cities');
       if($id!=''){
          $this->db->where('state_id', $id);
       }
      $result = $this->db->get();
      return $result->result_array();
    }
    public function getcityname($id){
      $query = $this->db->select('name')->from('cities')->where('id', $id)->get();
      //print_r($query); exit;
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }

	public function getallcitiesbyid($id){
       $this->db->select('*')->from('cities');
       if($id!=''){
          $this->db->where('state_id', $id);
       }
      $result = $this->db->get();
      return $result->result_array();
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT shop_img,shop_img1,shop_img2,shop_offer,shop_offer1,shop_offer2,shop_offer3,shop_offer4,shop_offer5 FROM shop WHERE shop_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['shop_img']!="" || $data['shop_img']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_img']);
		}

		if($data['shop_img1']!="" || $data['shop_img1']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_img1']);
		}

		if($data['shop_img2']!="" || $data['shop_img2']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_img2']);
		}

		if($data['shop_offer']!="" || $data['shop_offer']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer']);
		}

		if($data['shop_offer1']!="" || $data['shop_offer1']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer1']);
		}

		if($data['shop_offer2']!="" || $data['shop_offer2']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer2']);
		}

		if($data['shop_offer3']!="" || $data['shop_offer3']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer3']);
		}

		if($data['shop_offer4']!="" || $data['shop_offer4']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer4']);
		}

		if($data['shop_offer5']!="" || $data['shop_offer5']!=NULL){
			unlink(FCPATH.'/upload/shop_img/'.$data['shop_offer5']);
		}


		$this->db->WHERE('shop_id',$id);
		$this->db->DELETE('shop');
	}
 }
?>
