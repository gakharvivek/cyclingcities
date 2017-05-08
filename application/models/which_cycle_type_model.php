<?php
Class which_cycle_type_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	 public function record_count($searchmodel,$minprice,$maxprice,$checkbrand) 
	{
		$type = $this->uri->segment(3);

		if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		$this->db->where('cycle_type like "%'.$type.'%"'); 
		$Q =  $this->db->get("model");
		return $Q->num_rows();
       // return $this->db->count_all("try_cycle");
    }
       public function record_count_old($searchmodel,$minprice,$maxprice,$checkbrand) 
		{
         //if($this->uri->segment(2)=='which_cycle_type'){
			$type = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('model');
			$this->db->where('cycle_type like "%'.$type.'%"'); 
			$query = $this->db->get();
			 $result = $query->result_array(); 
         
        }
//         if($this->uri->segment(2)=='which_cycle_brand'){
//       $brand = $this->uri->segment(3);
//        $this->db->select('*');
//        $this->db->from('model')->where('brand_id',$brand);
//        $query = $this->db->get();
//        $result = $query->result_array(); 
//         
//         }
//         if($this->uri->segment(2)=='which_cycle_price'){
//        $price = $this->uri->segment(3);
//        $price1 = $this->uri->segment(4);
//        $this->db->select('*');
//        $this->db->from('model');
//        $this->db->where("price BETWEEN $price AND $price1");
//        $query = $this->db->get();
//        $result = $query->result_array();
//         
//         }
////        return $this->db->count_all("model");
//    }

    public function fetch_type($limit,$start,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand) 
	{
		$type = $this->uri->segment(3);
		if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------
 
        
		$this->db->where('cycle_type like "%'.$type.'%"');
        $this->db->limit($limit, $start);

		if($sorting=='desc')
		{
			$this->db->order_by("model.price", 'desc');
		}
		else
		{
			$this->db->order_by("model.price", 'asc');
		}

        $query = $this->db->get("model");
		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

        public function record_count1() {
        
        $brand = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('model')->where('brand_id',$brand);
        $query = $this->db->get();
        $result = $query->result_array();
//        return $this->db->count_all("model");
    }

	public function record_count_brand($searchmodel,$minprice,$maxprice,$checkbrand) {
        
		$brandid = $this->uri->segment(3);

		if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }
			else
		     {
				$this->db->where('brand_id',$brandid);
		     }

		//---------------------------------------------------------------------------------------

		
		$Q =  $this->db->get("model");
		return $Q->num_rows();
    }


    public function fetch_brand($limit, $start,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand) {

		 $brandid = $this->uri->segment(3);
		if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }
		   else
		     {
				$this->db->where('brand_id',$brandid);
		     }

		//---------------------------------------------------------------------------------------
 
        
		//$this->db->where('brand_id',$brandid);
        $this->db->limit($limit, $start);

		if($sorting=='desc')
		{
			$this->db->order_by("model.price", 'desc');
		}
		else
		{
			$this->db->order_by("model.price", 'asc');
		}

        $query = $this->db->get("model");
		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

        public function record_count2() {
        $price = $this->uri->segment(3);
        $price1 = $this->uri->segment(4);
        $this->db->select('*');
        $this->db->from('model');
        $this->db->where("price BETWEEN $price AND $price1");
        $query = $this->db->get();
        $result = $query->result_array();
//        return $this->db->count_all("model");
    }

	 public function record_count_price($searchmodel,$minprice,$maxprice,$checkbrand) {
        $price = $this->uri->segment(3);
        $price1 = $this->uri->segment(4);

		if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
		 }
	    else
		 {
			$this->db->where("model.price BETWEEN $price AND $price1");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }
			

		//---------------------------------------------------------------------------------------

		
		$Q =  $this->db->get("model");
		return $Q->num_rows();
    }

    public function fetch_price($limit, $start,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand) {
         $price = $this->uri->segment(3);
         $price1 = $this->uri->segment(4);

		 if($searchmodel!="")
		{
			$this->db->WHERE("name like '%".$searchmodel."%'");
		}

		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("model.price <='".$maxprice."' and  model.price >='".$minprice."'");
		 }
		else
		 {
			$this->db->where("model.price BETWEEN $price AND $price1");
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
					$brandsq[]="model.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR model.brand_id ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }
		   

		//---------------------------------------------------------------------------------------
 
        
		//$this->db->where('brand_id',$brandid);
        $this->db->limit($limit, $start);

		if($sorting=='desc')
		{
			$this->db->order_by("model.price", 'desc');
		}
		else
		{
			$this->db->order_by("model.price", 'asc');
		}

        $query = $this->db->get("model");
		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function getbrandname($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->brand_name;
        } else {
            return;
        }
    }
         public function getbrand() {
         $this->db->select('brand_id,brand_name');
         $this->db->from('brand');
         $result = $this->db->get();
         return $result->result_array();
        if (count($result) > 0) {
             return $result;
        } else {
           return array();
        }
    }
    
       public function getwhich_cycle_type(){
        $type = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('model');
        $this->db->where('cycle_type like "%'.$type.'%"');
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
   
       public function getwhich_cycle_brand(){
        $brand = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('model');
        $this->db->where('brand_id',$brand);
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }
  
    public function getwhich_cycle_price(){
        $price = $this->uri->segment(3);
        $price1 = $this->uri->segment(4);
        $this->db->select('*');
        $this->db->from('model');
        $this->db->where("price BETWEEN $price AND $price1");
        $result = $this->db->get();
        return $result->result_array();
        if (count($result) > 0) {
          return $result;
        } else {
          return array();
        }
    }

	function getallpricebyid()
	{
		$data = array();
        $this->db->query('SET SQL_BIG_SELECTS=1'); 
		$this->db->select('MIN(model.price) as minprice,MAX(model.price) as maxprice');
		$this->db->from('model');
		$this->db->order_by('model.model_id','desc');

		$this->db->distinct();

		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data= $row;
			}
		}
		//print_r($data);die;
		//echo $this->db->last_query();die;
		$Q->free_result();
		return $data; 
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

	function getallpricebymodelid($type)
	{
		$data = array();
        $this->db->query('SET SQL_BIG_SELECTS=1'); 
		$this->db->select('MIN(model.price) as minprice,MAX(model.price) as maxprice');
		$this->db->from('model');
		//$this->db->where('cycle_type like "%'.$type.'%"'); 
		$this->db->order_by('model.model_id','desc');

		$this->db->distinct();

		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data= $row;
			}
		}
		//print_r($data);die;
		//echo $this->db->last_query();die;
		$Q->free_result();
		return $data; 
	}
}?>