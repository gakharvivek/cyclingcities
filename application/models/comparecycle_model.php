<?php
Class comparecycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    

    public function compare1() {
         $mid1 = $this->uri->segment(3);
         //$mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$mid1);
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
            return $result;
        } else {
            return array();
        }
   }
   
   
        public function features1(){
       $model_id = $this->uri->segment(3);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$model_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
     public function comp1($id1) {
        // $mid1 = $this->uri->segment(3);
         //$mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$id1);
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
            return $result;
        } else {
            return array();
        }
   }
        public function feature1($id){
      // $model_id = $this->uri->segment(3);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
      public function feature2($id){
      // $model_id = $this->uri->segment(3);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
      public function feature3($id){
      // $model_id = $this->uri->segment(3);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
         public function comp2($id2) {
        // $mid1 = $this->uri->segment(3);
         //$mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$id2);
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
            return $result;
        } else {
            return array();
        }
   }
   
        public function compare2() {
      
         $mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$mid2);
     
          $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
      //    print_r($result);
            return $result;
        } else {
        return array();
        
        }
   }
   
      public function features2(){
       $model_id = $this->uri->segment(4);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$model_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
         public function comp3($id3) {
        // $mid1 = $this->uri->segment(3);
         //$mid2 = $this->uri->segment(4);
        // $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$id3);
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
            return $result;
        } else {
            return array();
        }
   }
   
    public function compare3() {
       
      $mid3 = $this->uri->segment(5);
         $this->db->select('*');
         $this->db->from('model');
         $this->db->where('model_id',$mid3);
     
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result);exit;
            return $result;
        } else {
            return array();
        }
   }
 public function features3(){
       $model_id = $this->uri->segment(5);
      // echo $model_id; exit;
      $this->db->select('*')->from('features');
      $this->db->where('model_id',$model_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    
   public function getbrand() {
      $query = $this->db->select('*')->from('brand')->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getbrandname($id) {
      $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['brand_name'];
      } else {
        return array();
      }
    }
    
  public function getmodel($id='') {
      $this->db->select('*');
      $this->db->from('model');
      if($id!=''){
        $this->db->where('model_id',$id);
      }
      $query=  $this->db->get();
      
      $result = $query->result_array();
     // echo '<pre>'; print_r($result); exit;
      if (count($result) > 0) {
        return $result;
      } else {
        return array();
      }
    }
    
 public function getmodelname($id) {
   //echo $id; exit;
      $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }

	public function getmodeltype() 
	{
         $this->db->select('cycle_type');
         $this->db->from('model');
		 $this->db->group_by('cycle_type');
         $result = $this->db->get();
         return $result->result_array();
        if (count($result) > 0) {
             return $result;
        } else {
           return array();
        }
    }
  
}?>