<?php
Class try_cycle_list_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
//    public function gettry_list(){
//        $this->db->select('*');
//        $this->db->from('try_cycle');
//        $result = $this->db->get();
//        return $result->result_array();
//        if (count($result) > 0) {
//          return $result;
//        } else {
//          return array();
//        }
//    }

     public function getallaccessories() {
      $this->db->select('accessories');
      $this->db->from('try_cycle');
	  $this->db->group_by('accessories');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function record_count($searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories) 
	{
		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("try_cycle.rent_price <='".$maxprice."' and  try_cycle.rent_price >='".$minprice."'");
		 }

		if($searchmodel!="")
		{
			$this->db->WHERE("model IN (select model_id from model where name like '%".$searchmodel."%')");
		}

		if($framesize !='')
		 {
			$this->db->WHERE("try_cycle.frame_size like '%".$framesize."%'");
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
					$brandsq[]="try_cycle.brand ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR try_cycle.brand ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		//--------------------------- Code for Modeltype filter -----------------------------

			if($checkmodeltype!="")
			{
				$modeltypesq=array();
					 for($k=0;$k<count($checkmodeltype);$k++)
					 {
					   $modeltype = array();
					   $modeltype = explode(',',$checkmodeltype[$k]);

					   if($k==0)
					   {
						$modeltypesq[]="model IN (select model_id from model where cycle_type = '".$modeltype[0]."')";
					   }
					   else
					   {
						$modeltypesq[]="OR model IN (select model_id from model where cycle_type = '".$modeltype[0]."')";
					   }
					   $modeltype = array('');
					}
					$modeltypeSQL=implode(" ", $modeltypesq);
					$this->db->where("(".$modeltypeSQL.")");
			}

		//---------------------------------------------------------------------------------------

		//--------------------------- Code for accessories filter -----------------------------

		  if($checkaccessories != '')
			 {
				 $accessoriessq=array();
				 for($k=0;$k<count($checkaccessories);$k++)
				 {
				   $accessories = array();
				   $accessories = explode(',',$checkaccessories[$k]);

				   if($k==0)
				   {
					$accessoriessq[]="try_cycle.accessories ='".$accessories[0]."'";
				   }
				   else
				   {
					$accessoriessq[]="OR try_cycle.accessories ='".$accessories[0]."'";
				   }
				   $accessories = array('');
				}
				$accessoriesSQL=implode(" ", $accessoriessq);
				$this->db->where("(".$accessoriesSQL.")");
			 }

		//---------------------------------------------------------------------------------------
        
		$this->db->where("try_cycle.active",'1');
		$Q =  $this->db->get("try_cycle");

		return $Q->num_rows();
       // return $this->db->count_all("try_cycle");
    }

    public function fetch_trycycle($limit, $start,$sorting,$searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories) {
      
        if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("try_cycle.rent_price <='".$maxprice."' and  try_cycle.rent_price >='".$minprice."'");
		 }

        if($searchmodel!="")
		{
			$this->db->WHERE("model IN (select model_id from model where name like '%".$searchmodel."%')");
		}

		if($framesize !='')
		 {
			$this->db->WHERE("try_cycle.frame_size like '%".$framesize."%'");
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
					$brandsq[]="try_cycle.brand ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR try_cycle.brand ='".$brand[0]."'";
				   }
				   $brand = array('');
				}
				$brandSQL=implode(" ", $brandsq);
				$this->db->where("(".$brandSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		//--------------------------- Code for Modeltype filter -----------------------------

			if($checkmodeltype!="")
			{
				$modeltypesq=array();
					 for($k=0;$k<count($checkmodeltype);$k++)
					 {
					   $modeltype = array();
					   $modeltype = explode(',',$checkmodeltype[$k]);

					   if($k==0)
					   {
						$modeltypesq[]="model IN (select model_id from model where cycle_type = '".$modeltype[0]."')";
					   }
					   else
					   {
						$modeltypesq[]="OR model IN (select model_id from model where cycle_type = '".$modeltype[0]."')";
					   }
					   $modeltype = array('');
					}
					$modeltypeSQL=implode(" ", $modeltypesq);
					$this->db->where("(".$modeltypeSQL.")");
			}

		//---------------------------------------------------------------------------------------

		//--------------------------- Code for accessories filter -----------------------------

		  if($checkaccessories != '')
			 {
				 $accessoriessq=array();
				 for($k=0;$k<count($checkaccessories);$k++)
				 {
				   $accessories = array();
				   $accessories = explode(',',$checkaccessories[$k]);

				   if($k==0)
				   {
					$accessoriessq[]="try_cycle.accessories ='".$accessories[0]."'";
				   }
				   else
				   {
					$accessoriessq[]="OR try_cycle.accessories ='".$accessories[0]."'";
				   }
				   $accessories = array('');
				}
				$accessoriesSQL=implode(" ", $accessoriessq);
				$this->db->where("(".$accessoriesSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		$this->db->where("try_cycle.active",'1');

		$this->db->limit($limit, $start);

		if($sorting=='desc')
		{
			$this->db->order_by("rent_price", 'desc');
		}
		else
		{
			$this->db->order_by("rent_price", 'asc');
		}
        
		
        $query = $this->db->get("try_cycle");

		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    public function gettrybrandname($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->brand_name;
        } else {
            return;
        }
    }
    public function gettrymodelname($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result= $query->result();
        if (count($result) > 0) {
             return $result[0]->name;
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
        public function gettry_gender(){
        $type = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('features');
        $this->db->where('gender',$type);
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
		$this->db->select('MIN(try_cycle.rent_price) as minprice,MAX(try_cycle.rent_price) as maxprice');
		$this->db->from('try_cycle');
		$this->db->order_by('try_cycle.id','desc');

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
}?>