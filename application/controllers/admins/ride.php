<?php
class ride extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {

	    $this->data['result'] = $this->ride_model->getrides();
		$this->data['title'] = "Manage Ride";
		$this->data['main'] = 'admin/adminfiles/ride/index';
		$this->data['webpagename'] = 'ride';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

            $data = array(
				'category' => $this->input->post('rtype'),
                'ride_title' => $this->input->post('ride_title'),
                'ride_start_point' => $this->input->post('ride_start_point'),
                'rtype' => $this->input->post('rtype'),
                'ride_end_point' => $this->input->post('ride_end_point'),
                'ride_organizer' => $this->input->post('ride_organizer'),
                'ride_date' => date('Y-m-d', strtotime($this->input->post('ride_date'))),
                'ride_time' => $this->input->post('ride_time'),
                'ride_story_title' => $this->input->post('ride_story_title'),
                'ride_story' => $this->input->post('ride_story'),
                'ride_distance' => $this->input->post('ride_distance'),
                'ride_Active' => $this->input->post('ride_Active'),
                'no_of_rider' => $this->input->post('no_of_rider'),
                 'not_cyclist'=>$this->input->post('not_cyclist'),
                'add_info'=>$this->input->post('add_info'),
                //'map_image' => $filename,
                //'ride_poster' => $filename1
            );

			
            
               if($_FILES['map_image']['name']!="" || $_FILES['map_image']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/ride/map/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('map_image')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/ride/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['map_image'] = $upload_data['file_name'];
				   }
				}

		    if($_FILES['ride_poster']['name']!="" || $_FILES['ride_poster']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/ride/poster/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('ride_poster')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/ride/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['ride_poster'] = $upload_data['file_name'];
				   }
				}

			$this->ride_model->insert($data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/ride/index');
        }

		$data['title'] = "Add Ride";
		$data['main'] = 'admin/adminfiles/ride/add';
		$data['webpagename'] = 'ride';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
				'category' => $this->input->post('rtype'),
                'ride_title' => $this->input->post('ride_title'),
                'ride_start_point' => $this->input->post('ride_start_point'),
                'rtype' => $this->input->post('rtype'),
                'ride_end_point' => $this->input->post('ride_end_point'),
                'ride_organizer' => $this->input->post('ride_organizer'),
                'ride_date' => date('Y-m-d', strtotime($this->input->post('ride_date'))),
                'ride_time' => $this->input->post('ride_time'),
                'ride_story_title' => $this->input->post('ride_story_title'),
                'ride_story' => $this->input->post('ride_story'),
                'ride_distance' => $this->input->post('ride_distance'),
                'ride_Active' => $this->input->post('ride_Active'),
                'no_of_rider' => $this->input->post('no_of_rider'),
                 'not_cyclist'=>$this->input->post('not_cyclist'),
                'add_info'=>$this->input->post('add_info'),
                //'map_image' => $filename,
                //'ride_poster' => $filename1
            );
			 

                if($_FILES['map_image']['name']!="" || $_FILES['map_image']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/ride/map/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('map_image')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/ride/edit/'.$_POST['ride_id'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['map_image'] = $upload_data['file_name'];

						   if($_POST['map_image_old1']!="" || $_POST['map_image_old1']!=NULL){
								unlink(FCPATH.'/upload/ride/'.$_POST['map_image_old1']);
						   }
					   }
				}

				if($_FILES['ride_poster']['name']!="" || $_FILES['ride_poster']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/ride/poster/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('ride_poster')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/ride/edit/'.$_POST['ride_id'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['ride_poster'] = $upload_data['file_name'];

						   if($_POST['ride_poster_old1']!="" || $_POST['ride_poster_old1']!=NULL){
								unlink(FCPATH.'/upload/ride/'.$_POST['ride_poster_old1']);
						   }
					   }
				}

			$result = $this->ride_model->update($data, $this->input->post('ride_id'));
            $this->session->set_flashdata("success", "Update Sucessfully");
            redirect('admins/ride/index');
		}
		else
		{
			$data['title'] = "Edit Ride";	
			$data['main'] = 'admin/adminfiles/ride/edit';
			$data['result'] = $this->ride_model->edit($id);
			$data['webpagename'] = 'ride';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }

    /*  DELETE Function  */

    public function remove($id) {

		$this->ride_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/ride/index');
    }
}

?>