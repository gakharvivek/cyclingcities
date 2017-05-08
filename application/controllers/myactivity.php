<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class myactivity extends Front_Controller {

	function __construct()
    {
        parent::__construct();	

		$userid=$this->session->userdata('fuserid');
		if (!isset($userid) || $userid < 1)
		{
			redirect(site_url('dashboard'),'refresh');
		}
		else
		{
			
		}
    }


	function index()
	{
		$data['main'] = 'mycycle';
		$data['websitepagename'] = 'mycycle';
		$data['mycycle1'] = $this->mycycle1_model->getmycycle1();
		$data['b_name'] = $this->mycycle1_model->getbrand();
        $data['m_name'] = $this->mycycle1_model->getmodel();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function mycycle()
	{
		$data['main'] = 'mycycle';
		$data['websitepagename'] = 'mycycle';
		$data['mycycle1'] = $this->mycycle1_model->getmycycle1();
		$data['b_name'] = $this->mycycle1_model->getbrand();
        $data['m_name'] = $this->mycycle1_model->getmodel();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function mycycle_edit($cycle_id)
	{
		 if (count($_POST) > 0) 
		  {
			 $data = array(
				'brand_id' => $this->input->post('b_name'),
				'model_id' => $this->input->post('m_name'),
				'cycle_type' => $this->input->post('cycle_type'),
				'purchase_year' => $this->input->post('purchase_year'),
				'add_info' => $this->input->post('add_info'),
			);

			if($_FILES['cycle_pics']['name']!="" || $_FILES['cycle_pics']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/cycle_pics/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('cycle_pics')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('myactivity/mycycle_edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['cycle_pics'] = $upload_data['file_name'];

						   if($_POST['cycle_pics_old']!="" || $_POST['cycle_pics_old']!=NULL){
								unlink(FCPATH.'/upload/cycle_pics/'.$_POST['cycle_pics_old']);
						   }
					   }
				}

			if($_FILES['cycle_pics1']['name']!="" || $_FILES['cycle_pics1']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('myactivity/mycycle_edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['cycle_pics1'] = $upload_data['file_name'];

					   if($_POST['cycle_pics_old1']!="" || $_POST['cycle_pics_old1']!=NULL){
							unlink(FCPATH.'/upload/cycle_pics/'.$_POST['cycle_pics_old1']);
					   }
				   }
			}

			if($_FILES['cycle_pics2']['name']!="" || $_FILES['cycle_pics2']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('myactivity/mycycle_edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['cycle_pics2'] = $upload_data['file_name'];

					   if($_POST['cycle_pics_old2']!="" || $_POST['cycle_pics_old2']!=NULL){
							unlink(FCPATH.'/upload/cycle_pics/'.$_POST['cycle_pics_old2']);
					   }
				   }
			}

			if($_FILES['cycle_pics3']['name']!="" || $_FILES['cycle_pics3']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics3')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('myactivity/mycycle_edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['cycle_pics3'] = $upload_data['file_name'];

					   if($_POST['cycle_pics_old3']!="" || $_POST['cycle_pics_old3']!=NULL){
							unlink(FCPATH.'/upload/cycle_pics/'.$_POST['cycle_pics_old3']);
					   }
				   }
			}

				$result = $this->mycycle_individualedit_model->update($data,$this->input->post('editid'));
				redirect("myactivity/mycycle");

		  }

		$data['main'] = 'mycycle_edit';
		$data['websitepagename'] = 'mycycle';
		$data['result'] = $this->mycycle_individualedit_model->getindividual();
		$data['b_name'] = $this->mycycle_individualedit_model->getbrand();
        $data['m_name'] = $this->mycycle_individualedit_model->getmodel();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function mycycle_detail()
	{
		$data['main'] = 'mycycle_detail';
		$data['websitepagename'] = 'mycycle';
		$data['result'] = $this->mycycle_individualedit_model->getindividual();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	
	
	function myquotations()
	{
		$data['main'] = 'myquotations';
		$data['websitepagename'] = 'myquotations';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function myquotations_detail()
	{
		$data['main'] = 'myquotations_detail';
		$data['websitepagename'] = 'myquotations_detail';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function mylisting()
	{
		$data['main'] = 'mylisting';
		$data['websitepagename'] = 'mylisting';
		$data['my_listing'] = $this->myactivity_model->getmy_listing();
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function mydiscount()
	{
		$data['main'] = 'mydiscount';
		$data['websitepagename'] = 'mydiscount';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function myroutes()
	{
		$data['main'] = 'myroutes';
		$data['websitepagename'] = 'myroutes';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
	function myrides()
	{
		$data['main'] = 'myrides';
		$data['websitepagename'] = 'myrides';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public
        function aj_model() {

      $mod = $this->mycycle1_model->getmodel($_POST['id']);
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

	public function doupload() 
	{
          if (count($_POST) > 0) 
			{
			  $fuserid=$this->session->userdata('fuserid');
			   $data = array(
					  'user_id' => $this->input->post('user_id'),
					  'cycle_type' => $this->input->post('cycle_type'),
					  'brand_id' => $this->input->post('brand'),
					  'model_id' => $this->input->post('model'),
					  'purchase_year' => $this->input->post('purchase_year'),
					  'add_info' => $this->input->post('add_info'),
				  );

			  if($_FILES['cycle_pics']['name']!="" || $_FILES['cycle_pics']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['cycle_pics'] = $upload_data['file_name'];
				   }
				}

			  if($_FILES['cycle_pics1']['name']!="" || $_FILES['cycle_pics1']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics1')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['cycle_pics1'] = $upload_data['file_name'];
				   }
				}

			   if($_FILES['cycle_pics2']['name']!="" || $_FILES['cycle_pics2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics2')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['cycle_pics2'] = $upload_data['file_name'];
				   }
				}


			   if($_FILES['cycle_pics3']['name']!="" || $_FILES['cycle_pics3']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/cycle_pics/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pics3')){

					   
						$error = array('warning' =>  $this->upload->display_errors());
						//print_r($error);
					   //die;
						$this->session->set_flashdata('error',$error);
						//$this->load->view('try_cycle', $error);
				   }
				   else
				   {
					   $upload_data = $this->upload->data();
					   $data['cycle_pics3'] = $upload_data['file_name'];
				   }
				}


				  $this->db->insert('my_cycle', $data);
				  $this->session->set_flashdata("success", "Add Sucessfully");
				  redirect('myactivity/mycycle');
            }
    }
	
}