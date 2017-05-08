<?php
class Knowurcycle extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->data['result'] = $this->knowurcycle_model->getknowurcycle();
		$this->data['title'] = "Manage Knowurcycle";
		$this->data['main'] = 'admin/adminfiles/knowurcycle/index';
		$this->data['webpagename'] = 'Knowurcycle';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                //'image1' => $filename1,
                //'image2' => $filename2,
                //'image3' => $filename3
            );

            
               if($_FILES['image1']['name']!="" || $_FILES['image1']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/knowurcycle/';
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
						redirect('admins/knowurcycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image1'] = $upload_data['file_name'];
				   }
				}

				 if($_FILES['image2']['name']!="" || $_FILES['image2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/knowurcycle/';
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
						redirect('admins/knowurcycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image2'] = $upload_data['file_name'];
				   }
				}

				 if($_FILES['image3']['name']!="" || $_FILES['image3']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/knowurcycle/';
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
						redirect('admins/knowurcycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['image3'] = $upload_data['file_name'];
				   }
				}

			$this->db->insert('knowurcycle', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/knowurcycle');
        }

		$data['title'] = "Add Knowurcycle";
		$data['main'] = 'admin/adminfiles/knowurcycle/add';
		$data['webpagename'] = 'knowurcycle';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');

    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                //'image1' => $filename1,
                //'image2' => $filename2,
                //'image3' => $filename3
            );

                if($_FILES['image1']['name']!="" || $_FILES['image1']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/knowurcycle/';
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
							redirect('admins/knowurcycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image1'] = $upload_data['file_name'];

						   if($_POST['image1_old']!="" || $_POST['image1_old']!=NULL){
								unlink(FCPATH.'/upload/knowurcycle/'.$_POST['image1_old']);
						   }
					   }
				}

				if($_FILES['image2']['name']!="" || $_FILES['image2']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/knowurcycle/';
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
							redirect('admins/knowurcycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image2'] = $upload_data['file_name'];

						   if($_POST['image2_old']!="" || $_POST['image2_old']!=NULL){
								unlink(FCPATH.'/upload/knowurcycle/'.$_POST['image2_old']);
						   }
					   }
				}

				if($_FILES['image3']['name']!="" || $_FILES['image3']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/knowurcycle/';
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
							redirect('admins/knowurcycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['image3'] = $upload_data['file_name'];

						   if($_POST['image3_old']!="" || $_POST['image3_old']!=NULL){
								unlink(FCPATH.'/upload/knowurcycle/'.$_POST['image3_old']);
						   }
					   }
				}

			$result = $this->knowurcycle_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/knowurcycle/index');
		}
		else
		{
			$data['title'] = "Edit Knowurcycle";	
			$data['main'] = 'admin/adminfiles/knowurcycle/edit';
			$data['result'] = $this->knowurcycle_model->edit($id);
			$data['webpagename'] = 'knowurcycle';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */

    public function remove($id) {
		$this->knowurcycle_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/knowurcycle/index');
    }
}

?>