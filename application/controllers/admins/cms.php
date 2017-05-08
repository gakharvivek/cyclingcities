<?php
class cms extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->data['result'] = $this->cms_model->getcms();
		$this->data['title'] = "Manage cms";
		$this->data['main'] = 'admin/adminfiles/cms/index';
		$this->data['webpagename'] = 'cms';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
             );

                if($_FILES['image1']['name']!="" || $_FILES['image1']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/cms/';
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
							redirect('admins/cms/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image1'] = $upload_data['file_name'];

						   if($_POST['image1_old']!="" || $_POST['image1_old']!=NULL){
								unlink(FCPATH.'/upload/cms/'.$_POST['image1_old']);
						   }
					   }
				}

			$result = $this->cms_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/cms/index');
		}
		else
		{
			$data['title'] = "Edit cms";	
			$data['main'] = 'admin/adminfiles/cms/edit';
			$data['result'] = $this->cms_model->edit($id);
			$data['webpagename'] = 'cms';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }
}

?>