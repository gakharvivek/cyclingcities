<?php
class whycycle extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->data['result'] = $this->whycycle_model->getwhycycle();
		$this->data['title'] = "Manage whycycle";
		$this->data['main'] = 'admin/adminfiles/whycycle/index';
		$this->data['webpagename'] = 'whycycle';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'title' => $this->input->post('title'),
                //'description' => $this->input->post('description'),
                //'image1' => $filename1,
                //'image2' => $filename2,
                //'image3' => $filename3
            );

            
               if($_FILES['image1']['name']!="" || $_FILES['image1']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image1'] = $upload_data['file_name'];
				   }
				}

				 if($_FILES['image2']['name']!="" || $_FILES['image2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image2'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image3']['name']!="" || $_FILES['image3']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image3')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image3'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image4']['name']!="" || $_FILES['image4']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image4')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image4'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image5']['name']!="" || $_FILES['image5']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image5')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image5'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image6']['name']!="" || $_FILES['image6']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image6')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image6'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image7']['name']!="" || $_FILES['image7']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image7')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image7'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image8']['name']!="" || $_FILES['image8']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image8')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image8'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image9']['name']!="" || $_FILES['image9']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image9')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image9'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['image10']['name']!="" || $_FILES['image10']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/whycycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('image10')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/whycycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image10'] = $upload_data['file_name'];
				   }
				}

			$this->db->insert('whycycle', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/whycycle');
        }

		$data['title'] = "Add whycycle";
		$data['main'] = 'admin/adminfiles/whycycle/add';
		$data['webpagename'] = 'whycycle';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');

    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
                'title' => $this->input->post('title'),
                //'description' => $this->input->post('description'),
                //'image1' => $filename1,
                //'image2' => $filename2,
                //'image3' => $filename3
            );

                if($_FILES['image1']['name']!="" || $_FILES['image1']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image1')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image1'] = $upload_data['file_name'];

						   if($_POST['image1_old']!="" || $_POST['image1_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image1_old']);
						   }
					   }
				}

				if($_FILES['image2']['name']!="" || $_FILES['image2']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image2')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image2'] = $upload_data['file_name'];

						   if($_POST['image2_old']!="" || $_POST['image2_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image2_old']);
						   }
					   }
				}

				if($_FILES['image3']['name']!="" || $_FILES['image3']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image3')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image3'] = $upload_data['file_name'];

						   if($_POST['image3_old']!="" || $_POST['image3_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image3_old']);
						   }
					   }
				}

				if($_FILES['image4']['name']!="" || $_FILES['image4']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image4')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image4'] = $upload_data['file_name'];

						   if($_POST['image4_old']!="" || $_POST['image4_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image4_old']);
						   }
					   }
				}

				if($_FILES['image5']['name']!="" || $_FILES['image5']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image5')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image5'] = $upload_data['file_name'];

						   if($_POST['image5_old']!="" || $_POST['image5_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image5_old']);
						   }
					   }
				}

				if($_FILES['image6']['name']!="" || $_FILES['image6']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image6')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image6'] = $upload_data['file_name'];

						   if($_POST['image6_old']!="" || $_POST['image6_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image6_old']);
						   }
					   }
				}

				if($_FILES['image7']['name']!="" || $_FILES['image7']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image7')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image7'] = $upload_data['file_name'];

						   if($_POST['image7_old']!="" || $_POST['image7_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image7_old']);
						   }
					   }
				}

				if($_FILES['image8']['name']!="" || $_FILES['image8']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image8')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image8'] = $upload_data['file_name'];

						   if($_POST['image8_old']!="" || $_POST['image8_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image8_old']);
						   }
					   }
				}

				if($_FILES['image9']['name']!="" || $_FILES['image9']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image9')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image9'] = $upload_data['file_name'];

						   if($_POST['image9_old']!="" || $_POST['image9_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image9_old']);
						   }
					   }
				}

				if($_FILES['image10']['name']!="" || $_FILES['image10']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/whycycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('image10')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/whycycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image10'] = $upload_data['file_name'];

						   if($_POST['image10_old']!="" || $_POST['image10_old']!=NULL){
								unlink(FCPATH.'/upload/whycycle/'.$_POST['image10_old']);
						   }
					   }
				}

			$result = $this->whycycle_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/whycycle/index');
		}
		else
		{
			$data['title'] = "Edit whycycle";	
			$data['main'] = 'admin/adminfiles/whycycle/edit';
			$data['result'] = $this->whycycle_model->edit($id);
			$data['webpagename'] = 'whycycle';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */

    public function remove($id) {
		$this->whycycle_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/whycycle/index');
    }
}

?>