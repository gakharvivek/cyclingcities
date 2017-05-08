<?php
class profile extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {

	  $this->data['result'] = $this->profile_model->getuserdata($this->session->userdata('Userid'));
		$this->data['title'] = "Manage Profile";
		$this->data['main'] = 'admin/adminfiles/profile/index';
		$this->data['webpagename'] = 'profile';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

   /* public function add() {

      if (count($_POST) > 0) {
        $data = array(
            'pro_name' => $this->input->post('pro_name'),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('age'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'type' => $this->input->post('type'),
            'occu' => $this->input->post('occu'),
            'skill' => $this->input->post('skill')
        );

        $this->db->insert('profile', $data);
        $this->session->set_flashdata("success", "Add Sucessfully");
        redirect('profile/index');
      }
    }*/

    public function edit() {
     //  $id = $this->uri->segment(3);
       
      $id=$_POST['userid'];
      $result = $this->profile_model->edit($id);
     // print_r($result);
      if ($result) {
        $data['result'] = $result;
        $this->load->view('profile/profile_edit', $data);
      }
    }

    function update() {
   //   $this->load->helper('url');
      $data = $this->input->post();
	//   print_r($data);
      $result = $this->profile_model->update($data);
      //print_r($result);
      redirect('profile/index');
    }

    public function remove($id) {
      $this->load->helper('url');
      $this->db->delete('users', array('id' => $id));
      $this->session->set_flashdata("success", " Removed Sucessfully.");
      redirect('profile/index');
    }

}

?>


