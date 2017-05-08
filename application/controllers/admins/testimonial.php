<?php
class testimonial extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
		$this->data['result'] = $this->testimonial_model->gettestimonials();
		$this->data['title'] = "Manage Testimonial";
		$this->data['main'] = 'admin/adminfiles/testimonial/index';
		$this->data['webpagename'] = 'testimonial';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'publisher_name' => $this->input->post('publisher_name'),
                'position' => $this->input->post('position'),
                'company' => $this->input->post('company'),
                'testimonial_text' => $this->input->post('testimonial_text'),
                'testimonial_active' => $this->input->post('testimonial_active'),
                //'testimonial_image' => $filename,
            );

            
               if($_FILES['testimonial_image']['name']!="" || $_FILES['testimonial_image']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/testimonial/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('testimonial_image')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/testimonial/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['testimonial_image'] = $upload_data['file_name'];
				   }
				}
            $this->testimonial_model->insert($data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/testimonial/index');
        }

		$data['title'] = "Add Testimonial";
		$data['main'] = 'admin/adminfiles/testimonial/add';
		$data['webpagename'] = 'testimonial';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');

    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
                'publisher_name' => $this->input->post('publisher_name'),
                'position' => $this->input->post('position'),
                'company' => $this->input->post('company'),
                'testimonial_text' => $this->input->post('testimonial_text'),
                'testimonial_active' => $this->input->post('testimonial_active'),
                //'testimonial_image' => $filename,
            );

                if($_FILES['testimonial_image']['name']!="" || $_FILES['testimonial_image']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/testimonial/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('testimonial_image')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/testimonial/edit/'.$_POST['testimonial_id'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['testimonial_image'] = $upload_data['file_name'];

						   if($_POST['testimonial_image_old1']!="" || $_POST['testimonial_image_old1']!=NULL){
								unlink(FCPATH.'/upload/testimonial/'.$_POST['testimonial_image_old1']);
						   }
					   }
				}

			$result = $this->testimonial_model->update($data, $this->input->post('testimonial_id'));
            $this->session->set_flashdata("success", "Update Sucessfully");
            redirect('admins/testimonial/index');
		}
		else
		{
			$data['title'] = "Edit Testimonial";	
			$data['main'] = 'admin/adminfiles/testimonial/edit';
			$data['result'] = $this->testimonial_model->edit($id);
			$data['webpagename'] = 'testimonial';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */
    public function remove($id) {

		$this->testimonial_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/testimonial/index');
    }

}

?>