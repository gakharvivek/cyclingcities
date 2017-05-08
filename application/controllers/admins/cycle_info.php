<?php
class cycle_info extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function brand() 
	{
        $this->data['result'] = $this->cycle_info_model->getbrand();
		$this->data['title'] = "Manage Brand";
		$this->data['main'] = 'admin/adminfiles/cycle_info/brand';
		$this->data['webpagename'] = 'brand';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function addbrand() {

		if (count($_POST) > 0) {

			$data = array(
                'brand_name' => $this->input->post('brand_name'),
                //'logo' => $filename,
                'brand_desc'=>$this->input->post('brand_desc')
                );


			if($_FILES['logo']['name']!="" || $_FILES['logo']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/logo/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('logo')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/cycle_info/brand','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['logo'] = $upload_data['file_name'];
			   }
			}

            $this->db->insert('brand', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/cycle_info/brand','refresh');
        }

		$data['title'] = "Add Brand";
		$data['main'] = 'admin/adminfiles/cycle_info/addbrand';
		$data['webpagename'] = 'brand';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function editbrand($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'brand_name' => $this->input->post('brand_name'),
                //'logo' => $filename,
                'brand_desc'=>$this->input->post('brand_desc')
            );

			if($_FILES['logo']['name']!="" || $_FILES['logo']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/logo/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('logo')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/cycle_info/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['logo'] = $upload_data['file_name'];

					   if($_POST['logo_old']!="" || $_POST['logo_old']!=NULL){
							unlink(FCPATH.'/upload/logo/'.$_POST['logo_old']);
					   }
				   }
			}

			$result = $this->cycle_info_model->updatebrand($data, $this->input->post('editid'));
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/cycle_info/brand','refresh');
		}
		else
		{
			$data['title'] = "Edit Brand";	
			$data['main'] = 'admin/adminfiles/cycle_info/editbrand';
			$data['result'] = $this->cycle_info_model->editbrand($id);
			$data['webpagename'] = 'brand';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
        }
    }

    /*  DELETE Function  */
    public function removebrand($id) {

		$this->cycle_info_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/cycle_info/brand');
    }

//Model

    public function model() {
        
		$this->data['result'] = $this->cycle_info_model->getmodel();
		$this->data['title'] = "Manage Model";
		$this->data['main'] = 'admin/adminfiles/cycle_info/model';
		$this->data['webpagename'] = 'model';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function addmodel() {

		if (count($_POST) > 0) {

			$data = array(
                'brand_id' => $this->input->post('brand_name'),
                'name' => $this->input->post('name'),
                'cycle_type' => $this->input->post('cycle_type'),
                'price' => $this->input->post('price'),
                'm_desc' => $this->input->post('m_desc'),
                //'img1' => $filename
                );

			if($_FILES['img1']['name']!="" || $_FILES['img1']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/model/';
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
					redirect('admins/cycle_info/model','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['img1'] = $upload_data['file_name'];
			   }
			}

            $this->db->insert('model', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/cycle_info/model','refresh');
        }

		$data['title'] = "Add Model";
		$data['main'] = 'admin/adminfiles/cycle_info/addmodel';
		$data['brand_name'] = $this->cycle_info_model->getbrand();
		$data['webpagename'] = 'model';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function editmodel($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'brand_id' => $this->input->post('brand_id'),
                'name' => $this->input->post('name'),
                'cycle_type' => $this->input->post('cycle_type'),
                'price' => $this->input->post('price'),
                'm_desc' => $this->input->post('m_desc')
                //'img1' => $filename1
            );

			if($_FILES['img1']['name']!="" || $_FILES['img1']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/model/';
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
						redirect('admins/cycle_info/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['img1'] = $upload_data['file_name'];

					   if($_POST['img1_old']!="" || $_POST['img1_old']!=NULL){
							unlink(FCPATH.'/upload/model/'.$_POST['img1_old']);
					   }
				   }
			}
            
			$result = $this->cycle_info_model->updatemodel($data, $this->input->post('editid'));
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/cycle_info/model','refresh');
		}
		else
		{
			$data['title'] = "Edit Model";	
			$data['main'] = 'admin/adminfiles/cycle_info/editmodel';
			$data['result'] = $this->cycle_info_model->editmodel($id);
			$data['brand_name'] = $this->cycle_info_model->getbrand();
			$data['webpagename'] = 'model';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
        }
    }

    /*  DELETE Function  */
    public function removemodel($id) {

		$this->cycle_info_model->deletemodel($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/cycle_info/model');
    }

}

?>