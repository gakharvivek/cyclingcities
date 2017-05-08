<?php
class accessories extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
	{
		$this->data['result'] = $this->accessories_model->getacc();
		$this->data['title'] = "Manage Accessories";
		$this->data['main'] = 'admin/adminfiles/accessories/index';
		$this->data['webpagename'] = 'accessories';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {
		if (count($_POST) > 0) {

			$data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'brand' => $this->input->post('brand'),
                'model' => $this->input->post('model'),
                'purchase_year' => $this->input->post('purchase_year'),
                //'img1' => $filename,
                //'img2' => $filename1,
                //'img3' => $filename2,
                'description' => $this->input->post('description')
            );


			if($_FILES['img1']['name']!="" || $_FILES['img1']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/accessory/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('img1')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/accessories/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['img1'] = $upload_data['file_name'];
			   }
			}

			if($_FILES['img2']['name']!="" || $_FILES['img2']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/accessory/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('img2')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/accessories/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['img2'] = $upload_data['file_name'];
			   }
			}

			if($_FILES['img3']['name']!="" || $_FILES['img3']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/accessory/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('img3')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/accessories/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['img3'] = $upload_data['file_name'];
			   }
			}

			$this->db->insert('accessories', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/accessories/index');
        }

		
		$data['title'] = "Add Accessories";
		$data['main'] = 'admin/adminfiles/accessories/add';
		$data['webpagename'] = 'accessories';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'brand' => $this->input->post('brand'),
                'model' => $this->input->post('model'),
                'purchase_year' => $this->input->post('purchase_year'),
                //'img1' => $filename,
                //'img2' => $filename1,
                //'img3' => $filename2,
                'description' => $this->input->post('description')
            );

			if($_FILES['img1']['name']!="" || $_FILES['img1']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/accessory/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('img1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/accessories/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['img1'] = $upload_data['file_name'];

					   if($_POST['image_old']!="" || $_POST['image_old']!=NULL){
							unlink(FCPATH.'/upload/accessory/'.$_POST['image_old']);
					   }
				   }
			}

			if($_FILES['img2']['name']!="" || $_FILES['img2']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/accessory/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('img2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/accessories/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['img2'] = $upload_data['file_name'];

					   if($_POST['image_old1']!="" || $_POST['image_old1']!=NULL){
							unlink(FCPATH.'/upload/accessory/'.$_POST['image_old1']);
					   }
				   }
			}

			if($_FILES['img3']['name']!="" || $_FILES['img3']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/accessory/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('img3')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/accessories/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['img3'] = $upload_data['file_name'];

					   if($_POST['image_old2']!="" || $_POST['image_old2']!=NULL){
							unlink(FCPATH.'/upload/accessory/'.$_POST['image_old2']);
					   }
				   }
			}

			$result = $this->accessories_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/accessories/index');
		}
		else
		{
			$data['title'] = "Edit Accessories";	
			$data['main'] = 'admin/adminfiles/accessories/edit';
			$data['result'] = $this->accessories_model->edit($id);
			$data['webpagename'] = 'accessories';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }

    /*  DELETE Function  */
    public function remove($id) {

		$this->accessories_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/accessories/index');
    }

}

?>