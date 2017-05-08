<?php
class maplocation extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {

		$this->data['result'] = $this->maplocation_model->getmaplocation();
		$this->data['title'] = "Manage Maplocation";
		$this->data['main'] = 'admin/adminfiles/maplocation/index';
		$this->data['webpagename'] = 'maplocation';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'maploction_title' => $this->input->post('maploction_title'),
                'maploction_desc' => $this->input->post('maploction_desc'),
                'maploction_city' => $this->input->post('maploction_city'),
                'maploction_active' => $this->input->post('maploction_active')
            );

			$last_id = $this->maplocation_model->insert($data);
            if($last_id>0){
                $this->session->set_flashdata("success", "Add Sucessfully.");
                redirect('admins/maplocation/index');
            }else{
                $this->session->set_flashdata("error", "There is some error.");
                redirect('admins/maplocation/index');
            }
        }

		
		$data['title'] = "Add Maplocation";
		$data['main'] = 'admin/adminfiles/maplocation/add';
		$data['webpagename'] = 'maplocation';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'maploction_title' => $this->input->post('maploction_title'),
                'maploction_desc' => $this->input->post('maploction_desc'),
                'maploction_city' => $this->input->post('maploction_city'),
                'maploction_active' => $this->input->post('maploction_active')
            );

			$result = $this->maplocation_model->update($data, $this->input->post('mapid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/maplocation/index');
		}
		else
		{
			$data['title'] = "Edit Maplocation";	
			$data['main'] = 'admin/adminfiles/maplocation/edit';
			$data['result'] = $this->maplocation_model->edit($id);
			$data['webpagename'] = 'maplocation';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }

    /*  DELETE Function  */

    public function remove($id) {

		$this->maplocation_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/maplocation/index');
    }


}

?>