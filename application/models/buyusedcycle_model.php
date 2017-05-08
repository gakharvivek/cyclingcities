<?php
Class buyusedcycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
//    public function getcycle(){
//        $this->db->select('*');
//        $this->db->from('posturcycle');
//        $result = $this->db->get();
//        return $result->result_array();
//        if (count($result) > 0) {
//          return $result;
//        } else {
//          return array();
//        }
//    }
            public function record_count() {
        return $this->db->count_all("posturcycle");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("posturcycle");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function record_count_usedcycle($searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories) 
	{
		if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("posturcycle.selling_price <='".$maxprice."' and  posturcycle.selling_price >='".$minprice."'");
		 }

		if($searchmodel!="")
		{
			$this->db->WHERE("model IN (select model_id from model where name like '%".$searchmodel."%')");
		}

		if($framesize !='')
		 {
			$this->db->WHERE("posturcycle.frame_size like '%".$framesize."%'");
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
					$brandsq[]="posturcycle.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR posturcycle.brand_id ='".$brand[0]."'";
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
					$accessoriessq[]="posturcycle.accessories ='".$accessories[0]."'";
				   }
				   else
				   {
					$accessoriessq[]="OR posturcycle.accessories ='".$accessories[0]."'";
				   }
				   $accessories = array('');
				}
				$accessoriesSQL=implode(" ", $accessoriessq);
				$this->db->where("(".$accessoriesSQL.")");
			 }

		//---------------------------------------------------------------------------------------
         $this->db->where("posturcycle.active",'1');
		$Q =  $this->db->get("posturcycle");

		return $Q->num_rows();
       // return $this->db->count_all("posturcycle");
    }

	public function fetch_buyusedcycle($limit, $start,$sorting,$searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories) {
      
        if($minprice !='' && $maxprice!='')
		 {
			$this->db->WHERE("posturcycle.selling_price <='".$maxprice."' and  posturcycle.selling_price >='".$minprice."'");
		 }

        if($searchmodel!="")
		{
			$this->db->WHERE("model IN (select model_id from model where name like '%".$searchmodel."%')");
		}

		if($framesize !='')
		 {
			$this->db->WHERE("posturcycle.frame_size like '%".$framesize."%'");
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
					$brandsq[]="posturcycle.brand_id ='".$brand[0]."'";
				   }
				   else
				   {
					$brandsq[]="OR posturcycle.brand_id ='".$brand[0]."'";
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
					$accessoriessq[]="posturcycle.accessories ='".$accessories[0]."'";
				   }
				   else
				   {
					$accessoriessq[]="OR posturcycle.accessories ='".$accessories[0]."'";
				   }
				   $accessories = array('');
				}
				$accessoriesSQL=implode(" ", $accessoriessq);
				$this->db->where("(".$accessoriesSQL.")");
			 }

		//---------------------------------------------------------------------------------------

		$this->db->where("posturcycle.active",'1');
		$this->db->limit($limit, $start);

		if($sorting=='desc')
		{
			$this->db->order_by("selling_price", 'desc');
		}
		else
		{
			$this->db->order_by("selling_price", 'asc');
		}
        
        $query = $this->db->get("posturcycle");

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
         $this->db->select('*');
         $this->db->from('brand');
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
    public function filter($brand_id,$price,$price1,$gender,$type) {
      //echo $brand_id ;exit;
//            echo $price ;
//            echo $price1 ;
   if($brand_id==Null){
     $brand_id="";
   }
     else{
       $brand_id="'b.brand_id'=$brand_id";
   }
   if($price1==Null OR $price1==Null ){
     $price="";
   }
     else{
       $price='a.selling_price BETWEEN $price AND $price1';
   }
   if($gender==Null){
     $gender="";
   }
     else{
       $gender="'b.gender'= $gender";
   }
   if($type==Null){
     $type="";
   }
     else{
       $type="'b.cycle_type'= $type";
   }
//   if($brand==Null){
//     $brand='';
//   }
//     else{
//       $brand="where('b.brand_id',$brand_id);";
//   }
//   if($brand==Null){
//     $brand='';
//   }
//     else{
//       $brand="where('b.brand_id',$brand_id);";
//   }
         $this->db->select('a.*,b.*');
         $this->db->from('posturcycle a');
         $this->db->join('features b','a.model_id=b.model_id');
         $this->db->where($brand_id,$price,$type,$gender);
        // $this->db->where('b.noofgear',$gear);
       //  $this->db->where('b.frame_size',$frame);
         $query=$this->db->get();
         
        $result= $query->result_array();
//         echo "<pre>";
 //       print_r($result);exit;
        if (count($result) > 0) {
             return $result;
             
            // print_r($result);exit;
        } else {
            return $result;
        }
    }


//    public function filter($brand_id,$price,$price1,$gender,$type) {
//         $this->db->select('a.*,b.*');
//         $this->db->from('posturcycle a');
//         $this->db->join('features b','a.model_id=b.model_id');
//         $this->db->where($brand_id,$price,$type,$gender);
//       $this->db->where('b.noofgear',$gear);
//        $this->db->where('b.frame_size',$frame);
//         $query=$this->db->get();
//         
//        $result= $query->result();
////         echo "<pre>";
////         print_r($result);exit;
//        if (count($result) > 0) {
//             return $result;
//             
//            // print_r($result);exit;
//        } else {
//            return $result;
//        }
//    }

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

	 public function getallaccessories() {
      $this->db->select('accessories');
      $this->db->from('posturcycle');
	  $this->db->group_by('accessories');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

	function getallpricebyid()
	{
		$data = array();
        $this->db->query('SET SQL_BIG_SELECTS=1'); 
		$this->db->select('MIN(posturcycle.selling_price) as minprice,MAX(posturcycle.selling_price) as maxprice');
		$this->db->from('posturcycle');
		$this->db->order_by('posturcycle.id','desc');

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