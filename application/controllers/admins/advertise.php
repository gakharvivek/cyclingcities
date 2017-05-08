<?php
class advertise extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
		$this->data['result'] = $this->advertise_model->getadv();
		$this->data['title'] = "Manage Advertise";
		$this->data['main'] = 'admin/adminfiles/advertise/index';
		$this->data['webpagename'] = 'advertise';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'ad_name' => $this->input->post('ad_name'),
                'ad_type' => $this->input->post('ad_type'),
                'ad_position' => $this->input->post('ad_position'),
                'uptime' => date('Y-m-d', strtotime($this->input->post('uptime'))),
                'downtime' => date('Y-m-d', strtotime($this->input->post('downtime'))),
                'active' => $this->input->post('active')
            );

			$this->db->insert('advertise', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/advertise/index');
        }

		
		$data['title'] = "Add Advertise";
		$data['main'] = 'admin/adminfiles/advertise/add';
		$data['webpagename'] = 'advertise';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'ad_name' => $this->input->post('ad_name'),
                'ad_type' => $this->input->post('ad_type'),
                'ad_position' => $this->input->post('ad_position'),
                'uptime' => date('Y-m-d', strtotime($this->input->post('uptime'))),
                'downtime' => date('Y-m-d', strtotime($this->input->post('downtime'))),
                'active' => $this->input->post('active')
            );

			$result = $this->advertise_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/advertise/index');
		}
		else
		{
			$data['title'] = "Edit Advertise";	
			$data['main'] = 'admin/adminfiles/advertise/edit';
			$data['result'] = $this->advertise_model->edit($id);
			$data['webpagename'] = 'advertise';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */
    public function remove($id) {
		$this->advertise_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/advertise/index');
    }

}

?>