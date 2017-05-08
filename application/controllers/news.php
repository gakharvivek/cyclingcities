<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class news extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'news';
		$data['websitepagename'] = 'news';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function ajaxnews_list($page=0)
	{
	   // echo $page;
		//die;
	    //$config["base_url"] = base_url() . "try_cycle_list/ajaxtry_cycle_list";
	    $config['total_rows']= $this->news_model->record_count();
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

		$data['results'] = $this->news_model->fetch_news($config["per_page"],$page);

		//count($data['results']);
		//die;
		
		$data["pagination_link"]= $this->pagination->create_links();
		//echo $data["pagination_link"];
		// die;
		$output['body'] = $this->load->view('ajaxnews_list', $data, true);

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
	
	function news_detail($id=0)
	{
		$data['main'] = 'news_detail';
		$data['websitepagename'] = 'news_detail';
		$data['news_detail'] = $this->news_model->getnews_details($id);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}	
}