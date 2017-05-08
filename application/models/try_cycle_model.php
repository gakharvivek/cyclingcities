<? class try_cycle_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    public function gettry_cycle(){
      $query = $this->db->select('*')->from('try_cycle');
      $result = $this->db->get();
       return $result->result_array();
      if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
    public function insert($data){
         $this->db->insert('try_cycle', $data);
          return $this->db->insert_id();
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
     public function getmycycle() {
       if ($this->session->userdata('status') == 1){
          $a=$this->session->all_userdata();
        // print_r($a); exit;
        
       $this->db->select('a.*, b.*');
       $this->db->from('my_cycle a');
       $this->db->join('model b', 'a.model_id = b.model_id','left');
           
       $this->db->where('a.user_id',$a['user_id']);
       
       $this->db->group_by('a.model_id'); 
       $query = $this->db->get();
       $data=$query->result_array();
     if (count($data) > 0) {
        return $data;
       // print_r($query);
      } else {
        return array();
      }
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
        $this->db->where('brand_id',$id);
      }
      else{
        $this->db->where('brand_id',0);
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
    public function model($id) {
         $this->db->select('*');
         $this->db->from('try_cycle');
         $this->db->where('model',$id);
        
         $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
        //  print_r($result); exit;
            return $result;
        } else {
            return array();
        }
   } 
 public function getmodelname($id) {
      $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
      $result = $query->result_array();
      if (count($result) > 0) {
        return $result[0]['name'];
      } else {
        return array();
      }
    }
	 public function gettry_cycledetail($id)
	 {
      $this->db->select('*,(select firstname from users_front where id=try_cycle.user_id) firstname,(select lastname from users_front where id=try_cycle.user_id) lastname,(select email from users_front where id=try_cycle.user_id) email,(select phone from users_front where id=try_cycle.user_id) phone,(select whatsapp from users_front where id=try_cycle.user_id) whatsapp')->from('try_cycle');
      $this->db->where('id',$id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
     }
      public function getcycle_features($model_id)
	  {
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
	  public function getbrandnamedetail($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->brand_name;
        } else {
            return array();
        }
    }
    public function getmodelnamedetail($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
        } else {
            return array();
        }
    }  
}?>