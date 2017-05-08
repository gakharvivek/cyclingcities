<?php
Class where_buy_page_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getwhere_buy_page(){
        $query = $this->db->select('*')->from('shop');
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
        public function update_retrive($id)
    {
        $this->db->where('shop_id',$id);/* I have to select multiple userid but how?*/
        $this->db->from('shop');
        $query = $this->db->get();
        return $query->result();
    }
     public function getbrand() {
         $this->db->select('brand_name');
         $this->db->from('brand');
         $result = $this->db->get();
         return $result->result_array();
        if (count($result) > 0) {
             return $result;
        } else {
           return array();
        }
    }
    public function filter($bid) {
      foreach ($bid as $b)
        
   print_r($b); exit;
       $query = $this->db->select('*')->from('shop');
        $result = $this->db->get();
    }
    
    public function getbrandname($bid) {
      foreach($bid as $b){
      $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $b)->get();
      $result = $query->result_array();
      }
      if (count($result) > 0) {
        return $result[0]['brand_name'];
      
      } else {
        return array();
      }
    }

	public function record_count($searchmodel,$searchcity,$checkbrand) 
	{
		if($searchmodel!="")
		{
			$this->db->WHERE("shop_name like '%".$searchmodel."%'");
		}

		if($searchcity!="")
		{
			$this->db->WHERE("city = ".$searchcity."");
		}

		//--------------------------- Code for Brand filter -----------------------------

		  if($checkbrand != '')
			 {
				 $brandsq=array();
				 for($k=0;$k<count($checkbrand);$k++)
				 {
				   $brand = array();
				   $brand = explode(',',$checkbrand[$k]);

				   if($k==0)
				   {
					$brandsq[]="shop.brand like '%".$brand[0]."%'";
				   }
				   else
				   {
					$brandsq[]="OR shop.brand like '%".$brand[0]."%'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		$Q =  $this->db->get("shop");

		return $Q->num_rows();
       // return $this->db->count_all("try_cycle");
    }

	public function fetch_where_to_buy($searchmodel,$searchcity,$checkbrand) {
      
        
        if($searchmodel!="")
		{
			$this->db->WHERE("shop_name like '%".$searchmodel."%'");
		}

		if($searchcity!="")
		{
			$this->db->WHERE("city = ".$searchcity."");
		}

		
		//--------------------------- Code for Brand filter -----------------------------

		  if($checkbrand != '')
			 {
				 $brandsq=array();
				 for($k=0;$k<count($checkbrand);$k++)
				 {
				   $brand = array();
				   $brand = explode(',',$checkbrand[$k]);

				   if($k==0)
				   {
					$brandsq[]="shop.brand like '%".$brand[0]."%'";
				   }
				   else
				   {
					$brandsq[]="OR shop.brand like '%".$brand[0]."%'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		
	    $this->db->order_by("shop_id", 'desc');
		
        $query = $this->db->get("shop");

		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function getallcity() {
      $this->db->select('city,(select name from cities where id=shop.city) as name');
      $this->db->from('shop');
	  $this->db->group_by('city');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

   public function getshopdetails($shop_id)
	 {
      $this->db->select('*')->from('shop');
      $this->db->where('shop_id',$shop_id);
        $result = $this->db->get();
        return $result->row_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
     }
}?>