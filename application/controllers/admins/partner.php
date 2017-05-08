<?php
class partner extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

	    $this->data['result'] = $this->partner_model->getpartner();
		$this->data['title'] = "Manage Partner";
		$this->data['main'] = 'admin/adminfiles/partner/index';
		$this->data['webpagename'] = 'partner';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function add() {

		if (count($_POST) > 0) {

			$data = array(
            //  'id' => $this->input->post('id'),
            'p_name' => $this->input->post('p_name'),
           // 'logo' => $filename,
            'url' => $this->input->post('url'),
            'detail' => $this->input->post('detail')
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
					redirect('admins/partner/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['logo'] = $upload_data['file_name'];
			   }
			}

			

			$this->db->insert('partner', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/partner/index');
        }

		
		$data['title'] = "Add Partner";
		$data['main'] = 'admin/adminfiles/partner/add';
		$data['webpagename'] = 'partner';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

	public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
            'p_name' => $this->input->post('p_name'),
            //'logo' => $filename,
            'url' => $this->input->post('url'),
            'detail' => $this->input->post('detail')
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
						redirect('admins/partner/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['logo'] = $upload_data['file_name'];

					   if($_POST['logo_old']!="" || $_POST['logo_old']!=NULL){
							unlink(FCPATH.'/upload/logo/'.$_POST['logo_old']);
					   }
				   }
			}

			$result = $this->partner_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/partner/index');
		}
		else
		{
			$data['title'] = "Edit Intern";	
			$data['main'] = 'admin/adminfiles/partner/edit';
			$data['result'] = $this->partner_model->edit($id);
			$data['webpagename'] = 'partner';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }

    public function remove($id) {

	  $this->partner_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/partner/index');
    }

}

?>