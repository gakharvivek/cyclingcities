<?php
class team extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {
	  $this->data['result'] = $this->team_model->getteam();
		$this->data['title'] = "Manage Team";
		$this->data['main'] = 'admin/adminfiles/team/index';
		$this->data['webpagename'] = 'team';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    public function add() {

	  if (count($_POST) > 0) {

			$data = array(
            //  'id' => $this->input->post('id'),
            'f_name' => $this->input->post('f_name'),
            'l_name' => $this->input->post('l_name'),
            'desig' => $this->input->post('desig'),
            'info' => $this->input->post('info'),
            'city' => $this->input->post('city'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'facebook' => $this->input->post('facebook'),
            'tweeter' => $this->input->post('tweeter'),
            'linkedin' => $this->input->post('linkedin'),
            //'pic' => $filename
        );

            
               if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/team/';
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
						redirect('admins/team/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['pic'] = $upload_data['file_name'];
				   }
				}
            $this->db->insert('team', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/team/index');
        }

		$data['title'] = "Add Team";
		$data['main'] = 'admin/adminfiles/team/add';
		$data['webpagename'] = 'team';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			 $data = array(
				//    'id' => $this->input->post('id'),
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'desig' => $this->input->post('desig'),
				'info' => $this->input->post('info'),
				'city' => $this->input->post('city'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'facebook' => $this->input->post('facebook'),
				'tweeter' => $this->input->post('tweeter'),
				'linkedin' => $this->input->post('linkedin'),
				//'pic' => $filename
			);

                if($_FILES['pic']['name']!="" || $_FILES['pic']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/team/';
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
							redirect('admins/team/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['pic'] = $upload_data['file_name'];

						   if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
								unlink(FCPATH.'/upload/team/'.$_POST['pic_old']);
						   }
					   }
				}

			 $result = $this->team_model->update($data, $this->input->post('editid'));
             $this->session->set_flashdata("success", "Add Sucessfully");
             redirect('admins/team/index');
		}
		else
		{
			$data['title'] = "Edit Team";	
			$data['main'] = 'admin/adminfiles/team/edit';
			$data['result'] = $this->team_model->edit($id);
			$data['webpagename'] = 'team';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    public function remove($id) {

		$this->team_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/team/index');
    }
}

?>