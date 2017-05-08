<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class joinus extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }


	function index()
	{
		$data['main'] = 'joinus';
		$data['websitepagename'] = 'joinus';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	 public function add() {

      if (count($_POST) > 0) {

        if ($_FILES['volunteerresume']['name'] != '') {
          $filename = $_FILES['volunteerresume']['name'];
          $config['upload_path'] = './upload/resume/';
          $config['file_name'] = $filename;
          //$config['overwrite'] = False;
          $config["allowed_types"] = 'doc|docx|pdf';
          #$config["max_size"] = 2048000;
          #$config["max_width"] = 1024;
          #$config["max_height"] = 768;

          $this->load->library('upload');
          $this->upload->initialize($config);

          //var_dump($this->upload->do_upload('resume'));exit;
          if (!$this->upload->do_upload('volunteerresume')) {
            $this->data['error'] = $this->upload->display_errors();
          } else {
            // success                                      
          }
        } else {
          $filename = '';
        }
        $data = array(
            //  'id' => $this->input->post('id'),
            'user_type' => $this->input->post('volunteeruser_type'),
            'name' => $this->input->post('volunteername'),
            'gender' => $this->input->post('volunteergender'),
            'age' => $this->input->post('volunteerage'),
            'state' => $this->input->post('volunteerstateid'),
            'city' => $this->input->post('volunteercityid'),
            'email' => $this->input->post('volunteeremail'),
            'apply_for' => $this->input->post('volunteerapply_for'),
          //  'cyclist' => $this->input->post('cyclist'),
            'phone' => $this->input->post('volunteerphone'),
            //'whatsapp' => $this->input->post('whatsapp'),
            'occu' => $this->input->post('volunteeroccu'),
            'interest_area' => $this->input->post('volunteerinterest_area'),
            'why_cc' => $this->input->post('volunteerwhy_cc'),
            'resume' => $filename,
            //'active' => $this->input->post('active'),
        );
        $this->db->insert('join_us', $data);
        $this->session->set_flashdata("success", "Add Sucessfully");
        redirect('joinus');
      }
    }

	public function addintern() {

      if (count($_POST) > 0) {

        if ($_FILES['internresume']['name'] != '') {
          $filename = $_FILES['internresume']['name'];
          $config['upload_path'] = './upload/resume/';
          $config['file_name'] = $filename;
          //$config['overwrite'] = False;
          $config["allowed_types"] = 'doc|docx|pdf';
          #$config["max_size"] = 2048000;
          #$config["max_width"] = 1024;
          #$config["max_height"] = 768;

          $this->load->library('upload');
          $this->upload->initialize($config);

          //var_dump($this->upload->do_upload('resume'));exit;
          if (!$this->upload->do_upload('internresume')) {
            $this->data['error'] = $this->upload->display_errors();
          } else {
            // success                                      
          }
        } else {
          $filename = '';
        }
        $data = array(
            //  'id' => $this->input->post('id'),
            'user_type' => $this->input->post('internuser_type'),
            'name' => $this->input->post('internname'),
            'gender' => $this->input->post('interngender'),
            'age' => $this->input->post('internage'),
            'state' => $this->input->post('internstateid'),
            'city' => $this->input->post('interncityid'),
            'email' => $this->input->post('internemail'),
            'apply_for' => $this->input->post('internapply_for'),
          //  'cyclist' => $this->input->post('cyclist'),
            'phone' => $this->input->post('internphone'),
            //'whatsapp' => $this->input->post('whatsapp'),
            'occu' => $this->input->post('internoccu'),
            'interest_area' => $this->input->post('interninterest_area'),
            'why_cc' => $this->input->post('internwhy_cc'),
            'resume' => $filename,
            //'active' => $this->input->post('active'),
        );
        $this->db->insert('join_us', $data);
        $this->session->set_flashdata("success", "Add Sucessfully");
        redirect('joinus');
      }
    }	
}