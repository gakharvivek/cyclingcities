<?php
class features extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

  // Features
    public function index() {
        
		$this->data['result'] = $this->features_model->getfeatures();
		$this->data['title'] = "Manage Features";
		$this->data['main'] = 'admin/adminfiles/features/index';
		$this->data['webpagename'] = 'features';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

			$data = array(
                'brand_id' => $this->input->post('brand_name'),
                'model_id' => $this->input->post('model_name'),
                'frontbreak' => $this->input->post('br'),
              //  'rearbreak' => $this->input->post('gears'),
              //  'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'gender' => $this->input->post('gender'),
                'framesize' => $this->input->post('framesize'),
                'framebuild' => $this->input->post('framebuild'),
                'transmission' => $this->input->post('transmission'),
                'noof_gear' => $this->input->post('noof_gear'),
                'shiftertype' => $this->input->post('shiftertype'),
                'front_wheel_size' => $this->input->post('front_wheel_size'),
                'suspension' => $this->input->post('suspension'),
              //  'rear_wheel_size' => $this->input->post('rear_wheel_size'),
                'rating' => $this->input->post('rating')
            );

            $this->db->insert('features', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/features/index','refresh');
        }

		$data['title'] = "Add Features";
		$data['main'] = 'admin/adminfiles/features/add';
		$data['b_name'] = $this->features_model->getbrand();
        $data['m_name'] = $this->features_model->getmodel();
		$data['webpagename'] = 'features';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'brand_id' => $this->input->post('b_name'),
                'model_id' => $this->input->post('m_name'),
                'frontbreak' => $this->input->post('br'),
              //  'rearbreak' => $this->input->post('gears'),
              //  'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'gender' => $this->input->post('gender'),
                'framesize' => $this->input->post('framesize'),
                'framebuild' => $this->input->post('framebuild'),
                'transmission' => $this->input->post('transmission'),
                'noof_gear' => $this->input->post('noof_gear'),
                'shiftertype' => $this->input->post('shiftertype'),
                'front_wheel_size' => $this->input->post('front_wheel_size'),
                'suspension' => $this->input->post('suspension'),
              //  'rear_wheel_size' => $this->input->post('rear_wheel_size'),
                'rating' => $this->input->post('rating')
            );

			$result = $this->features_model->update($data, $this->input->post('editid'));
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/features/index','refresh');
		}
		else
		{
			$data['title'] = "Edit Features";	
			$data['main'] = 'admin/adminfiles/features/edit';
			$data['result'] = $this->features_model->edit($id);
			$data['b_name'] = $this->features_model->getbrand();
            $data['m_name'] = $this->features_model->getmodel();
			$data['webpagename'] = 'features';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
        }
    }

    /*  DELETE Function  */

    public function remove($id) {

		$this->features_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/features/index');
    }

    public function aj_model() {

        $mod = $this->features_model->getmodel($_POST['id']);
        $html = '';
        //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
        $html.='<option value=""> Select Model</option>';
        foreach ($mod as $row) {
            if (isset($_POST['m_id']) && $_POST['m_id'] == $row['model_id']) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row['model_id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

}

?>