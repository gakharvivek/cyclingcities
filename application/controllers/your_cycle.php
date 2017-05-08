<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class your_cycle extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'buycycle_usedcycle';
		$data['websitepagename'] = 'buycycle_usedcycle';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function buy_usedcycle()
	{
		if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle','refresh');
		}
		else
		{
			$data['main'] = 'buy_usedcycle';
			$data['websitepagename'] = 'buy_usedcycle';
			$data['brand'] = $this->buyusedcycle_model->getbrand();
			$data["modeltype"] = $this->buyusedcycle_model->getmodeltype();
			$data['accessories'] = $this->buyusedcycle_model->getallaccessories();
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
	}

	function ajaxbuy_usedcycle($page=0)
	{
		$sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		if (isset($_REQUEST["minprice"]))
		{
			$minprice = str_replace('Rs.', '', $_POST["minprice"]);

		} else {
			$minprice = "";
		}
		$data['minprice'] = $minprice;

		//echo $minprice;
		//die;
		if (isset($_REQUEST["maxprice"])) {
			$maxprice = str_replace('Rs.', '', $_POST["maxprice"]);
		} else {
			$maxprice = "";
		}
		$data['maxprice'] = $maxprice;

		$framesize='';
		if(isset($_REQUEST["framesize"]))
		{	 
			$framesize= $_REQUEST["framesize"];	
		}	
		$data['framesize'] = $framesize;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

		$checkmodeltype ='';
		if (isset($_POST["checkmodeltype"])) 
		{
			$checkmodeltype = $_POST["checkmodeltype"];
			if (isset($_POST["checkmodeltype"])) {
				$checkmodeltype = str_replace('"', '', $_POST["checkmodeltype"]);
			}
		}

		$checkaccessories ='';
		if (isset($_POST["checkaccessories"])) 
		{
			$checkaccessories = $_POST["checkaccessories"];
			if (isset($_POST["checkaccessories"])) {
				$checkaccessories = str_replace('"', '', $_POST["checkaccessories"]);
			}
		}

	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "buy_usedcycle/ajaxbuy_usedcycle";
	    $config['total_rows']= $this->buyusedcycle_model->record_count_usedcycle($searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories);
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li  style='display:none'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li style='display:none'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;				
		
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->buyusedcycle_model->fetch_buyusedcycle($config["per_page"],$page,$sorting,$searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories);

		//count($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		//echo $data["pagination_link"];
		// die;
		$output['body'] = $this->load->view('ajaxbuy_usedcycle', $data, true);

		  $output['pagination_link']=$data["pagination_link"].'
			<script>
					$(document).ready(function() {
						$(".resfooter > ul li a").on("click",function(e){
							e.preventDefault();
							GetAjaxList($(this).attr("href"));			
						});
					});
			</script>';

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}

	public function usedcycledetail() 
	{
		if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle','refresh');
		}
		else
		{
			$data['main'] = 'buyused_cycledetail';
			$data['websitepagename'] = 'your_cycle';
			$data['buyusedcycle_sub'] = $this->buyusedcycle_sub_model->getcycle();
			$data['features'] = $this->buyusedcycle_sub_model->getcycle_features();
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
     
    }

	function where_to_buy()
	{
		$data['main'] = 'where_to_buy';
		$data['websitepagename'] = 'where_to_buy';
		 $data["brand"] = $this->try_cycle_list_model->getbrand();
		 $data['cities'] = $this->where_buy_page_model->getallcity();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function ajaxwhere_to_buy_list()
	{
		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		$searchcity='';
		if(isset($_REQUEST["searchcity"]))
		{	 
			$searchcity= $_REQUEST["searchcity"];	
		}	
		$data['searchcity'] = $searchcity;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

	   
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $data['total_rows']= $this->where_buy_page_model->record_count($searchmodel,$searchcity,$checkbrand);
		$data['results'] = $this->where_buy_page_model->fetch_where_to_buy($searchmodel,$searchcity,$checkbrand);

		//count($data['results']);
		//die;
		
		$output['body'] = $this->load->view('ajaxwhere_to_buy_list', $data, true);
		$output['total_rows'] = $data['total_rows'];

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}
	
	function try_cycle()
	{
		$data['main'] = 'try_cycle';
		$data['websitepagename'] = 'try_cycle';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function add_try_cycle() 
	{

		if(isset($_POST['accessories']))
		{
			$accessories ="";
			foreach($_POST['accessories'] as $row)
			{
				$accessories .= $row.",";
			}
		}

		$height=$_POST['height']." ".$_POST['heightunit'];
		$weight=$_POST['weight']." ".$_POST['weightunit'];



            $data = array(
				//  'id' => $this->input->post('id'),
				'user_id' => $this->input->post('user_id'),
				'brand' => $this->input->post('brand'),
				'model' => $this->input->post('model'),
				'purchase_year' => $this->input->post('purchase_year'),
				'frame_size' => $this->input->post('frame_size'),
				'accessories' => $accessories,
				'rent_price' => $this->input->post('rent_price'),
				'height' => $height,
				'weight' => $weight,
				'information' => $this->input->post('information'),
				'post_date' => $this->input->post('post_date'),
				'sell_date' => $this->input->post('sell_date'),
				//'img2' => $filename1
            );
			
            
               if($_FILES['img2']['name']!="" || $_FILES['img2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/try_cycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('img2')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['img2'] = $upload_data['file_name'];
				   }
				}

			$this->db->insert('try_cycle', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('your_cycle/try_cycle');
    }

	public function aj_try() 
	{
      $getmodel = $this->try_cycle_model->model($this->input->post('id'));
      $html = '';
      $html.='<li>
				<span class="ttle1">Brand</span>
				<span class="ttltext">
				   <select name="brand" id="brand" class="myval brand required">
					<option value="' . $getmodel["brand"] . '">' . $this->try_cycle_model->getbrandname($getmodel['brand']) . '</option>
				   </select>
				</span>
				<div class="clear"></div>
			  </li>
				<li>
					<span class="ttle1">Model</span>
					<span class="ttltext">
					   <select name="model" id="model" class="myval model required">
                        <option value="' . $getmodel["model"] . '">' . $this->try_cycle_model->getbrandname($getmodel["model"]) . '</option>
                      </select>
					</span>
					<div class="clear"></div>
				</li>
				<li>
					<span class="ttle1">Purchase Year</span>
					<span class="ttltext"><input type="text" name="purchase_year" id="purchase_year" class="" value="' . $getmodel["purchase_year"] . '" readonly/></span>
					<div class="clear"></div>
				</li>
				 <li>
					<span class="ttle1">Frame size</span>
					<span class="ttltext"><input type="text" name="frame_size" id="frame_size" value="' . $getmodel["frame_size"] . '" class="" readonly/></span>
					<div class="clear"></div>
				</li>';

      echo $html;
      // exit;
    }

	public function aj_model() 
	{

      $mod = $this->try_cycle_model->getmodel($_POST['id']);
      $html='<option value=""> Select Model</option>';
      foreach ($mod as $row) {
        if (isset($_POST['m_id']) && $_POST['m_id'] == $row['model_id']) {
          $selected = "selected";
        } else {
          $selected = '';
        }
        $html.='<option value="'.$row['model_id'].'" '.$selected.'>'.$row['name'].'</option>';
      }

      echo $html;
      //exit;
    }

	function try_cyclelist()
	{
		if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/try_cycle','refresh');
		}
		else
		{
			$data['main'] = 'try_cyclelist';
			$data['websitepagename'] = 'try_cycle';
			$data["brand"] = $this->try_cycle_list_model->getbrand();
			$data["modeltype"] = $this->try_cycle_list_model->getmodeltype();
			$data['accessories'] = $this->try_cycle_list_model->getallaccessories();
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
	}

	function ajaxtry_cycle_list($page=0)
	{
		$sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		if (isset($_REQUEST["minprice"]))
		{
			$minprice = str_replace('Rs.', '', $_POST["minprice"]);

		} else {
			$minprice = "";
		}
		$data['minprice'] = $minprice;

		//echo $minprice;
		//die;
		if (isset($_REQUEST["maxprice"])) {
			$maxprice = str_replace('Rs.', '', $_POST["maxprice"]);
		} else {
			$maxprice = "";
		}
		$data['maxprice'] = $maxprice;

		$framesize='';
		if(isset($_REQUEST["framesize"]))
		{	 
			$framesize= $_REQUEST["framesize"];	
		}	
		$data['framesize'] = $framesize;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

		$checkmodeltype ='';
		if (isset($_POST["checkmodeltype"])) 
		{
			$checkmodeltype = $_POST["checkmodeltype"];
			if (isset($_POST["checkmodeltype"])) {
				$checkmodeltype = str_replace('"', '', $_POST["checkmodeltype"]);
			}
		}

		$checkaccessories ='';
		if (isset($_POST["checkaccessories"])) 
		{
			$checkaccessories = $_POST["checkaccessories"];
			if (isset($_POST["checkaccessories"])) {
				$checkaccessories = str_replace('"', '', $_POST["checkaccessories"]);
			}
		}

	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $config['total_rows']= $this->try_cycle_list_model->record_count($searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories);
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li  style='display:none'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li style='display:none'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;				
		
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->try_cycle_list_model->fetch_trycycle($config["per_page"],$page,$sorting,$searchmodel,$minprice,$maxprice,$framesize,$checkbrand,$checkmodeltype,$checkaccessories);

		//count($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		//echo $data["pagination_link"];
		// die;
		$output['body'] = $this->load->view('ajaxtry_cycle_list', $data, true);

		  $output['pagination_link']=$data["pagination_link"].'
			<script>
					$(document).ready(function() {
						$(".resfooter > ul li a").on("click",function(e){
							e.preventDefault();
							GetAjaxList($(this).attr("href"));			
						});
					});
			</script>';

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}
	function try_cycledetail($id=0,$model_id=0)
	{
		if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/try_cycle','refresh');
		}
		else
		{
			$data['main'] = 'try_cycledetail';
			$data['websitepagename'] = 'try_cycle';
			$data['try_cycle_list_sub'] = $this->try_cycle_model->gettry_cycledetail($id);
			$data['features'] = $this->try_cycle_model->getcycle_features($model_id);
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
		
	}
	
	function which_cycle()
	{
		$data['brand'] = $this->which_cycle_model->getbranddata();
		$data['main'] = 'which_cycle';
		$data['websitepagename'] = 'which_cycle';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function whichcycletype($type='') {

       if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/which_cycle','refresh');
		}
		else
		{
			$data['main'] = 'which_cycle_type';
			$data['websitepagename'] = 'which_cycle_type';
			$data['type'] =$type;
			$data['brand'] = $this->which_cycle_type_model->getbrand();
			$data["modeltype"] = $this->which_cycle_type_model->getmodeltype();
			//$data['which_cycle_type'] = $this->which_cycle_type_model->getwhich_cycle_type();
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
        
    }

	function ajaxwhich_cycle_type($type="",$page=0)
	{
		$data['type'] =$type;
		$sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		if (isset($_REQUEST["minprice"]))
		{
			$minprice = str_replace('Rs.', '', $_POST["minprice"]);

		} else {
			$minprice = "";
		}
		$data['minprice'] = $minprice;

		//echo $minprice;
		//die;
		if (isset($_REQUEST["maxprice"])) {
			$maxprice = str_replace('Rs.', '', $_POST["maxprice"]);
		} else {
			$maxprice = "";
		}
		$data['maxprice'] = $maxprice;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $config['total_rows']= $this->which_cycle_type_model->record_count($searchmodel,$minprice,$maxprice,$checkbrand);
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li  style='display:none'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li style='display:none'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;				
		
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
      
		$data['results'] = $this->which_cycle_type_model->fetch_type($config["per_page"],$page,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand);

		//print_r($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		$output['datacount'] =$config['total_rows'];
		$output['body'] = $this->load->view('ajaxwhich_cycle_type', $data, true);

		  $output['pagination_link']=$data["pagination_link"].'
			<script>
					$(document).ready(function() {
						$(".resfooter > ul li a").on("click",function(e){
							e.preventDefault();
							GetAjaxList($(this).attr("href"),"'.$type.'");	
						});
					});
			</script>';

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}

	public function which_cycle_sub() {
       
	   if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/which_cycle','refresh');
		}
		else
		{
			   $data['main'] = 'which_cycle_detail';
			   $data['websitepagename'] = 'which_cycle_sub';
			   $data['which_cycle_sub'] = $this->which_cycle_sub_model->getwhich_cycle_sub();
			   $data['features'] = $this->which_cycle_sub_model->getcycle_features();
			   $this->load->vars($data);
			   $this->load->view('template/innermaster');
		}
	   
    }


	function compare_cycle()
	{
		if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/which_cycle','refresh');
		}
		else
		{
			   /*$data['id1'] = $this->uri->segment(3);
				$data['id2'] = $this->uri->segment(4);
				$data['id3'] = $this->uri->segment(5);*/
				$data['main'] = 'compare_cycle';
				$data['websitepagename'] = 'compare_cycle';
				$data['compare1'] = $this->comparecycle_model->compare1();
				$data['features1'] = $this->comparecycle_model->features1();
				$data['compare2'] = $this->comparecycle_model->compare2();
				$data['features2'] = $this->comparecycle_model->features2();
				$data['compare3'] = $this->comparecycle_model->compare3();
				$data['features3'] = $this->comparecycle_model->features3();
				$data['b_name'] = $this->comparecycle_model->getbrand();
				$data['m_name'] = $this->comparecycle_model->getmodel();
				$data["modeltype"] = $this->comparecycle_model->getmodeltype();

				$this->load->vars($data);
				$this->load->view('template/innermaster');
		}
		
	}

	public function which_cycle_brand($brandid=0) {
       
	   if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/which_cycle','refresh');
		}
		else
		{
			   $data['main'] = 'which_cycle_brand';
				$data['websitepagename'] = 'your_cycle';
				$data['brandid'] =$brandid;
				$data['brand'] = $this->which_cycle_type_model->getbrand();
				$this->load->vars($data);
				$this->load->view('template/innermaster');
		}
        
    }

	function ajaxwhich_cycle_brand($brandid=0,$page=0)
	{
		$data['brandid'] =$brandid;
		$sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		if (isset($_REQUEST["minprice"]))
		{
			$minprice = str_replace('Rs.', '', $_POST["minprice"]);

		} else {
			$minprice = "";
		}
		$data['minprice'] = $minprice;

		//echo $minprice;
		//die;
		if (isset($_REQUEST["maxprice"])) {
			$maxprice = str_replace('Rs.', '', $_POST["maxprice"]);
		} else {
			$maxprice = "";
		}
		$data['maxprice'] = $maxprice;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $config['total_rows']= $this->which_cycle_type_model->record_count_brand($searchmodel,$minprice,$maxprice,$checkbrand);
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li  style='display:none'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li style='display:none'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;				
		
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
      
		$data['results'] = $this->which_cycle_type_model->fetch_brand($config["per_page"],$page,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand);

		//print_r($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		$output['datacount'] =$config['total_rows'];
		$output['body'] = $this->load->view('ajaxwhich_cycle_brand', $data, true);
		

		  $output['pagination_link']=$data["pagination_link"].'
			<script>
					$(document).ready(function() {
						$(".resfooter > ul li a").on("click",function(e){
							e.preventDefault();
							GetAjaxList($(this).attr("href"),"'.$brandid.'");	
						});
					});
			</script>';

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}

	public function which_cycle_price($getminprice=0,$getmaxprice=0) {

        if($this->user_fm->loggedin() == FALSE)
		{
			redirect('your_cycle/which_cycle','refresh');
		}
		else
		{
			$data['main'] = 'which_cycle_price';
			$data['websitepagename'] = 'your_cycle';
			$data['getminprice'] =$getminprice;
			$data['getmaxprice'] =$getmaxprice;
			$data['brand'] = $this->which_cycle_type_model->getbrand();
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
        
    }

	function ajaxwhich_cycle_price($getminprice=0,$getmaxprice=0,$page=0)
	{
		$data['getminprice'] =$getminprice;
		$data['getmaxprice'] =$getmaxprice;
		$sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$searchmodel='';
		if(isset($_REQUEST["searchmodel"]))
		{	 
			$searchmodel= $_REQUEST["searchmodel"];	
		}	
		$data['searchmodel'] = $searchmodel;

		if (isset($_REQUEST["minprice"]))
		{
			$minprice = str_replace('Rs.', '', $_POST["minprice"]);

		} else {
			$minprice = "";
		}
		$data['minprice'] = $minprice;

		//echo $minprice;
		//die;
		if (isset($_REQUEST["maxprice"])) {
			$maxprice = str_replace('Rs.', '', $_POST["maxprice"]);
		} else {
			$maxprice = "";
		}
		$data['maxprice'] = $maxprice;

		$checkbrand ='';
		if (isset($_POST["checkbrand"])) 
		{
			$checkbrand = $_POST["checkbrand"];
			if (isset($_POST["checkbrand"])) {
				$checkbrand = str_replace('"', '', $_POST["checkbrand"]);
			}
		}

	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $config['total_rows']= $this->which_cycle_type_model->record_count_price($searchmodel,$minprice,$maxprice,$checkbrand);
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li  style='display:none'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li style='display:none'><span>";
		$config["cur_tag_close"] = "</span></li>";
		$config["prev_tag_open"] = "<li class='btn_prev'>";
		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='btn_next'>";
		$config["next_tag_close"] = "</li>";
		$config['per_page'] = 9;				
		
		$config["uri_segment"] = 5;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
      
		$data['results'] = $this->which_cycle_type_model->fetch_price($config["per_page"],$page,$sorting,$searchmodel,$minprice,$maxprice,$checkbrand);

		//print_r($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		$output['datacount'] =$config['total_rows'];
		$output['body'] = $this->load->view('ajaxwhich_cycle_price', $data, true);

		  $output['pagination_link']=$data["pagination_link"].'
			<script>
					$(document).ready(function() {
						$(".resfooter > ul li a").on("click",function(e){
							e.preventDefault();
							GetAjaxList($(this).attr("href"),"'.$getminprice.'","'.$getmaxprice.'");	
						});
					});
			</script>';

		$this->output->set_content_type('application/json')->set_output(json_encode($output));		
	}

	function submitshopinquiry()
	{
		if($this->input->post('offeremail')!='')
		{	
			$this->sendinquiry();
			$this->session->set_flashdata('message1','Thank you for your inquiry. We will get back to you soon.');	
			redirect('your_cycle/where_to_buy','refresh');
		}
	}

	function sendinquiry()
	{
		$shop_id=$_POST['shop_id'];
		$shopdetails = $this->where_buy_page_model->getshopdetails($shop_id);
		$bodydata['email']=$email = $_POST['offeremail'];
		$bodydata['shopemail']=$shopemail = $shopdetails['email'];
		$from=$email;
		$name = "";
		$to = $shopemail;
		$cc = '';
		$subject = "Inquiry From Cycling City website";
		$attach = "";
		$body = $this->load->view('email_templates/sendshopinquiry',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
		
	}


	function know_your_cycle()
	{
		$data['main'] = 'know_your_cycle';
		$data['websitepagename'] = 'know_your_cycle';
		$data['accessories'] = $this->know_your_cycle_model->getknowlimit();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function why_cycle($value="1")
	{
        $data['value'] = $value;
		$data['main'] = 'why_cycle';
		$data['websitepagename'] = 'why_cycle';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	function tryaccessories()
	{
		$data['main'] = 'tryaccessories';
		$data['websitepagename'] = 'tryaccessories';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	function try_accessories_detail()
	{
		$data['main'] = 'try_accessories_detail';
		$data['websitepagename'] = 'try_accessories_detail';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	
	
	function buy_usedaccessories()
	{
		$data['main'] = 'buy_usedaccessories';
		$data['websitepagename'] = 'buy_usedaccessories';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function accessories_detail()
	{
		$data['main'] = 'accessories_detail';
		$data['websitepagename'] = 'accessories_detail';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function aj_model_compare() {

      $mod = $this->comparecycle_model->getmodel($_POST['id']);
      $html = '';
      //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
      $html.='<option value=""> Select Model</option>';
      foreach ($mod as $row) {
        if (isset($_POST['m_id']) && $_POST['m_id'] == $row['model_id']) {
          $selected = "selected";
        } else {
          $selected = '';
        }
        $html.='<option value="' . $row['model_id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
      }
      $html.="</select>";

      echo $html;
      exit;
    } 

	public function sendquotation() 
	{
      $useremail = $this->session->all_userdata();
      //$shop = $this->which_cycle_sub_model->getwhere_buy_page();
   
      if (isset($_POST['sms']))   
		 {
			
			  $html = '';
			  $html.= 'Hello Please open below url and fill the quotation form.<br />';
			  $html.= 'http://192.168.202.190/cc_front/myquotation_form<br />';
			  
			  $to = $useremail('email');
			  $from = $useremail('email');
			  $subject = 'Cycling Cities Quotation';
			  $headers = 'From: admin@cyclingcities.in' . "\r\n" .
				  'Reply-To: admin@cyclingcities.in' . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();
			  
			  mail($to, $from, $subject, $html, $headers);

			  $this->load->view('invite_friend');
        }
    }

	public function add_sell_cycle() 
	{
		$data = array(
            'brand_id' => $this->input->post('brand_id'),
            'model_id' => $this->input->post('model_id'),
            'user_id' => $this->input->post('user_id'),
            'purchase_year' => $this->input->post('purchase_year'),
            'frame_size' => $this->input->post('frame_size'),
            'accessories' => $this->input->post('accessories'),
            'selling_price' => $this->input->post('selling_price'),
            'information' => $this->input->post('information'),
            //'post_date' => $this->input->post('post_date'),
            'post_date' => date('Y-m-d'),
            //'img2' => $filename,
        );
       
            
               if($_FILES['img2']['name']!="" || $_FILES['img2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/buysell/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('img2')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['img2'] = $upload_data['file_name'];
				   }
				}

			$this->db->insert('posturcycle', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('your_cycle');
    }

	public function aj_model_buysell() {

        $mod = $this->buysell_model->getmodel($_POST['id']);
        $html = '';
        //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
        $html.='<option value=""> Select Model</option>';
        foreach ($mod as $row) {
            if (isset($_POST['m_id']) && $_POST['m_id'] == $row['model_id']) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row['model_id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

	public function aj_sell() 
	{
		  $getmodel = $this->buysell_model->model($this->input->post('id'));
		  $html = '';
		  $html.='<li>
					<span class="ttle1">Brand</span>
					<span class="ttltext">
					   <select name="brand_id" id="brand_id" class="myval brand_id required">
						<option value="' . $getmodel["brand_id"] . '">' . $this->buysell_model->getbrandname($getmodel['brand_id']) . '</option>
					   </select>
					</span>
					<div class="clear"></div>
				  </li>
					<li>
						<span class="ttle1">Model</span>
						<span class="ttltext">
						   <select name="model_id" id="model_id" class="myval model_id required">
							<option value="' . $getmodel["model_id"] . '">' . $this->buysell_model->getbrandname($getmodel["model_id"]) . '</option>
						  </select>
						</span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Purchase Year</span>
						<span class="ttltext"><input type="text" name="purchase_year" id="purchase_year" class="" value="' . $getmodel["purchase_year"] . '" readonly/></span>
						<div class="clear"></div>
					</li>
					 <li>
						<span class="ttle1">Frame size</span>
						<span class="ttltext"><input type="text" name="frame_size" id="frame_size" value="' . $getmodel["frame_size"] . '" class="" readonly/></span>
						<div class="clear"></div>
					</li>';

		  echo $html;
    }

	// ------------------------------------------------------------------------------------------

	function bindimages($value)
		{   
			$data['imagesname'] = $imagesname = $this->whycycle_fm->Getbindimagesname($value);
			echo "";
			if (count($data['imagesname'])>0)
			{
				foreach ($data['imagesname'] as $key => $list)
				  {
						if($list['image1']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image1']?>" alt="" /></div>
					  <?}

						if($list['image2']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image2']?>" alt="" /></div>
					  <?}

						if($list['image3']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image3']?>" alt="" /></div>
					  <?}

						if($list['image4']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image4']?>" alt="" /></div>
					  <?}

						if($list['image5']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image5']?>" alt="" /></div>
					  <?}

						if($list['image6']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image6']?>" alt="" /></div>
					  <?}

						if($list['image7']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image7']?>" alt="" /></div>
					  <?}

						if($list['image8']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image8']?>" alt="" /></div>
					  <?}

						if($list['image9']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image9']?>" alt="" /></div>
					  <?}

						if($list['image10']!='')
						{?>
							 <div><img class="img-responsive" src="<?php echo site_url('upload/whycycle'); ?>/<?=$list['image10']?>" alt="" /></div>
					  <?}
				  }
			}
		}
}