<?php
class gallery extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->data['result'] = $this->gallery_model->getgallery();
		$this->data['title'] = "Manage Gallery";
		$this->data['main'] = 'admin/adminfiles/gallery/index';
		$this->data['webpagename'] = 'gallery';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'gallery_title' => $this->input->post('gallery_title'),
                'gallery_desc' => $this->input->post('gallery_desc'),
                'gtype' => $this->input->post('gtype'),
                //'gallery_img' => $filename,
                'gallery_fb' => $this->input->post('gallery_fb'),
                'gallery_twit' => $this->input->post('gallery_twit'),
                'gallery_gplus' => $this->input->post('gallery_gplus'),
                'gallery_wp' => $this->input->post('gallery_wp'),
                'gallery_email' => $this->input->post('gallery_email')
            );

            if($this->input->post('gtype')=='image'){
               if($_FILES['gallery_img']['name']!="" || $_FILES['gallery_img']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/gallery/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('gallery_img')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/gallery/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['gallery_img'] = $upload_data['file_name'];
				   }
				}
            }
            if($this->input->post('gtype')=='video'){
                $data['youtube_link']= $this->input->post('youtube_link');
            }

			$this->db->insert('gallery', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/gallery/index');
        }

		$data['title'] = "Add Gallery";
		$data['main'] = 'admin/adminfiles/gallery/add';
		$data['webpagename'] = 'gallery';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
                'gallery_title' => $this->input->post('gallery_title'),
                'gallery_desc' => $this->input->post('gallery_desc'),
                //'gallery_img' => $filename,
                'gtype' => $this->input->post('gtype'),
                //'youtube_link' => $this->input->post('youtube_link'),
                'gallery_fb' => $this->input->post('gallery_fb'),
                'gallery_twit' => $this->input->post('gallery_twit'),
                'gallery_gplus' => $this->input->post('gallery_gplus'),
                'gallery_wp' => $this->input->post('gallery_wp'),
                'gallery_email' => $this->input->post('gallery_email')
            );

		    if($this->input->post('gtype')=='image'){
                if($_FILES['gallery_img']['name']!="" || $_FILES['gallery_img']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/gallery/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('gallery_img')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/gallery/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['gallery_img'] = $upload_data['file_name'];

						   if($_POST['image_old']!="" || $_POST['image_old']!=NULL){
								unlink(FCPATH.'/upload/gallery/'.$_POST['image_old']);
						   }
					   }
				}
            }
            if($this->input->post('gtype')=='video'){
                $data['youtube_link']= $this->input->post('youtube_link');
            }

			$result = $this->gallery_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/gallery/index');
		}
		else
		{
			$data['title'] = "Edit Gallery";	
			$data['main'] = 'admin/adminfiles/gallery/edit';
			$data['result'] = $this->gallery_model->edit($id);
			$data['webpagename'] = 'gallery';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */
    public function remove($id) {
		$this->gallery_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/gallery/index');
    }

}

?>