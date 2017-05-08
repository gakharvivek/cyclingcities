<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class chronicles extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index($post_by=0,$tags='')
	{
        $data['post_by']=$post_by;
		$data['tags']=$tags;
		$data['main'] = 'chronicles';
		$data['websitepagename'] = 'chronicles';
		$data['cities'] = $this->chronicles_front_model->getcity();
		$data['ch_category'] = $this->chronicles_front_model->getchroniclescategory();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function ajaxchronicles_list($page=0)
	{
		$post_by=0;
		if(isset($_REQUEST["post_by"]))
		{	 
			$post_by= $_REQUEST["post_by"];	
		}	
		$data['post_by'] = $post_by;

		$tags='';
		if(isset($_REQUEST["tags"]))
		{	 
			$tags= $_REQUEST["tags"];	
		}	
		$data['tags'] = $tags;

	    $sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		$cate_id='';
		if(isset($_REQUEST["cate_id"]))
		{	 
			$cate_id= $_REQUEST["cate_id"];	
		}	
		$data['cate_id'] = $cate_id;

		$searchbycity='';
		if(isset($_REQUEST["searchbycity"]))
		{	 
			$searchbycity= $_REQUEST["searchbycity"];	
		}	
		$data['searchbycity'] = $searchbycity;

	    $config['total_rows']= $this->chronicles_front_model->record_count($cate_id,$searchbycity,$post_by,$tags);
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
		$config['per_page'] = 6;				
		
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);	
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->chronicles_front_model->fetch_chronicles($config["per_page"],$page,$cate_id,$sorting,$searchbycity,$post_by,$tags);

		//count($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		//echo $data["pagination_link"];
		// die;
		$output['body'] = $this->load->view('ajaxchronicles_list', $data, true);

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

	 public function chronicles_detail($id=0) 
	 {
		$data['main'] = 'cycling_chronicles_subpage';
		$data['websitepagename'] = 'chronicles';
		$data['chronicles_sub'] = $this->chronicles_sub_model->getchronicles_sub();
        $data['user'] = $this->chronicles_sub_model->getusedata();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
      }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */