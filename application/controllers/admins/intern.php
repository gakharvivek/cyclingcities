<?php
class intern extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

	    $this->data['result'] = $this->intern_model->getintern();
		$this->data['title'] = "Manage Intern";
		$this->data['main'] = 'admin/adminfiles/intern/index';
		$this->data['webpagename'] = 'intern';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    public function add() {

		if (count($_POST) > 0) {

			$data = array(
            //  'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'dept' => $this->input->post('dept'),
            'dept' => $this->input->post('dept'),
            'intern_desc' => $this->input->post('intern_desc'),
            //'pic' => $filename
            );


			if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/intern/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('pic')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/intern/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['pic'] = $upload_data['file_name'];
			   }
			}

			

			$this->db->insert('intern', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/intern/index');
        }

		
		$data['title'] = "Add Intern";
		$data['main'] = 'admin/adminfiles/intern/add';
		$data['webpagename'] = 'intern';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

	 public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
            //  'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'dept' => $this->input->post('dept'),
            'dept' => $this->input->post('dept'),
            'intern_desc' => $this->input->post('intern_desc'),
            //'pic' => $filename
            );
			if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/intern/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('pic')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/intern/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['pic'] = $upload_data['file_name'];

					   if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
							unlink(FCPATH.'/upload/intern/'.$_POST['pic_old']);
					   }
				   }
			}

			$result = $this->intern_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/intern/index');
		}
		else
		{
			$data['title'] = "Edit Intern";	
			$data['main'] = 'admin/adminfiles/intern/edit';
			$data['result'] = $this->intern_model->edit($id);
			$data['webpagename'] = 'intern';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }

    public function remove($id) {

		$this->intern_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/intern/index');
    }

}

?>