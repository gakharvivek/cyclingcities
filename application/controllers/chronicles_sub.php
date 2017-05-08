<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class chronicles_sub extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('chronicles_sub_model');
      $this->load->library("pagination");
    }

    public function chronicles_sub() {
    //  $id= $this->chronicles_sub_model->getchronicles_sub($this->uri->segment(3));
    //  $c_id=($id['chronicles_id']); 
        $config = array();
        
        $config["base_url"] = base_url() . "chronicles_sub/chronicles_sub/";
        $config["total_rows"] = $this->chronicles_sub_model->record_count();
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
        $config['prev_link']='previous';
        $config['next_link']='next';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->chronicles_sub_model->fetch_countries($config["per_page"], $page);
       
        $data["links"] = $this->pagination->create_links();   
        $data['chronicles_sub'] = $this->chronicles_sub_model->getchronicles_sub();
        $data['user'] = $this->chronicles_sub_model->getusedata();
     // echo '<pre>';print_r($data); exit;
      $this->load->view('chronicles_sub', $data);
    }
  }
?>
