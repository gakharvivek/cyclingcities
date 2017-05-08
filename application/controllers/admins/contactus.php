<?php
class contactus extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {

	  $this->data['result'] = $this->contactus_model->getcontact();
		$this->data['title'] = "Manage Contactus";
		$this->data['main'] = 'admin/adminfiles/contactus/index';
		$this->data['webpagename'] = 'contactus';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }
/*
    public function add() {

      if (count($_POST) > 0) {
       
        $data = array(
            //  'id' => $this->input->post('id'),
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phn' => $this->input->post('phn'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'inq' => $this->input->post('inq')
        );
        $this->db->insert('contactus', $data);
        $this->session->set_flashdata("success", "Add Sucessfully");
        redirect('contactus/index');
      }
      $data['country'] = $this->contactus_model->getcountry();
      $this->load->view('contactus/add',$data);
    }

    public function edit() {
      $id = $this->uri->segment(3);

      if (count($_POST) > 0) {

        $data = array(
            //    'id' => $this->input->post('id'),
           'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phn' => $this->input->post('phn'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'inq' => $this->input->post('inq')
        );

        $result = $this->contactus_model->update($data, $this->input->post('editid'));
        $this->session->set_flashdata("success", "Add Sucessfully");
        redirect('contactus/index');
      }
      $result = $this->contactus_model->edit($id);

      if ($result) {
        $data['result'] = $result;
        $data['country'] = $this->contactus_model->getcountry();
        $this->load->view('contactus/edit', $data);
      }
    }
*/
    public function remove($id) {
      $this->db->delete('contactus', array('contact_id' => $id));
      //      $this->db->delete('shop', array('shop_id' => $id));
      $this->session->set_flashdata("success", " Removed Sucessfully.");
      redirect('contactus/index');
    }

    
    public function aj_state() {
        $state = $this->contactus_model->getstateById($_POST['id']);
        
        //echo '<pre>';print_r($state);exit;
        $html = '';
        //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
        $html.='<option value=""> Select State</option>';
        foreach ($state as $row) {
          
           if (isset($_POST['stateId']) && $_POST['stateId'] == $row->id) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row->id . '" ' . $selected . ' >' . $row->name . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

    public function aj_city() {

        $city = $this->contactus_model->getcityById($_POST['id']);
        #echo '<pre>';print_r($publisher);exit;
        $html = '';
        //$html.='<select name="CityId" id="CityId" class="span6" required>';
        $html.='<option value=""> Select City</option>';
        foreach ($city as $row) {
            if (isset($_POST['cityId']) && $_POST['cityId'] ==  $row->id) {
                $selected = "selected";
            } else {
                $selected ='';
            }
            $html.='<option value="' . $row->id . '" ' . $selected . '>' . $row->name . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

}

?>