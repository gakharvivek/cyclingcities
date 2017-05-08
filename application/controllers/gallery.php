<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gallery extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'gallery';
		$data['websitepagename'] = 'gallery';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function ajaxgallery_list($page=0)
	{
	    $sorting='';
		if(isset($_REQUEST["sorting"]))
		{	 
			$sorting= $_REQUEST["sorting"];	
		}	
		$data['sorting'] = $sorting;

		
	    $config['total_rows']= $this->gallery_model->record_count();
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

		$data['results'] = $this->gallery_model->fetch_gallery($config["per_page"],$page,$sorting);

		//count($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		//echo $data["pagination_link"];
		// die;
		$output['body'] = $this->load->view('ajaxgallery_list', $data, true);

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
}