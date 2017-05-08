<?php
class user extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
	{
	    $this->data['result'] = $this->user_model->getuserdata();
		$this->data['title'] = "Manage Users";
		$this->data['main'] = 'admin/adminfiles/user/index';
		$this->data['webpagename'] = 'users';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() 
	{
		if(isset($_POST['name']))
		{
				$flag1 = $this->user_m->newCheckUser();
				if($flag1 == 0)
				{
					$this->user_m->create();
					$this->sendMailbyadmin();
					$this->session->set_flashdata('message','Add Sucessfully');
					redirect('admins/user/index','refresh');
				
				}
				else
				{
					$this->session->set_flashdata('error','Account already exist !');
					redirect('admins/user/add','refresh');
				}
				
		}
        
		$this->data['apply_for']=$this->shop_model->getallapply_for();
		$this->data['st']=$this->shop_model->getallstate();
		$this->data['title'] = "Add User";
		$this->data['main'] = 'admin/adminfiles/user/add';
		$this->data['webpagename'] = 'users';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	function sendMailbyadmin()
	{
		$from = $this->config->item('fromemailid');
		$name = $_POST['name'];
		$to = $_POST['email'];
		$cc = "";
		$subject = "Account Information";
		$bodydata = "";
		$body = $this->load->view('admin/email_templates/registrationbyadmin',$bodydata,true);
		$attach = "";
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}

    /*  EDIT Function  */

	function edit($id=0){

		if($this->input->post('userid'))
		{
			$this->user_m->edit();
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/user/index','refresh');
		}
		else
		{
			$data['title'] = "Edit User";	
			$data['main'] = 'admin/adminfiles/user/edit';
			$data['result'] = $this->user_model->edit($id);
			$data['apply_for']=$this->shop_model->getallapply_for();
			$data['city']=$this->shop_model->getallcitiesbyid($data['result']['state']);
		    $data['st']=$this->shop_model->getallstate();
			$data['webpagename'] = 'university';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}  
	}

    public function edit_old() {
        $id = $this->uri->segment(3);
        // echo $id; exit;

        if (count($_POST) > 0) {
            //   echo '<pre>' ;  print_r($_FILES); exit;
           $config['upload_path'] = './upload/user/';
            $config['allowed_types'] = 'gif|jpg|png';
            $filename = $_FILES['pic']['name'];
            //print_r($filename); exit;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("pic")) {
                    $error = array('error' => $this->upload->display_errors());
                    $filename = $this->input->post('pic_old');
                   $this->load->view('user/index', $error);
                } else {
                    $data2 = array('upload_data' => $this->upload->data());
                   $this->load->view('user/index', $data2);
                }
            if (!$this->upload->do_upload("pic")) {
                $error = array('error' => $this->upload->display_errors());
                $filename = $this->input->post('pic_old');
                 //    echo '<pre>'; print_r($error); exit;
                $this->load->view('user/index', $error);
            } else {
                $data2 = array('upload_data' => $this->upload->data());
                //print_r($data2); exit;
                $this->load->view('user/index', $data2);
            }
            
//           $config['upload_path'] = './upload/resume/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $filename1 = $_FILES['resume']['name'];
//            //print_r($filename); exit;
//            $this->load->library('upload');
//            $this->upload->initialize($config);
//            if (!$this->upload->do_upload("resume")) {
//                    $error = array('error' => $this->upload->display_errors());
//                    $filename1 = $this->input->post('resume_old');
//                   $this->load->view('user/index', $error);
//                } else {
//                    $data2 = array('upload_data' => $this->upload->data());
//                   $this->load->view('user/index', $data2);
//                }
//            if (!$this->upload->do_upload("resume")) {
//                $error = array('error' => $this->upload->display_errors());
//                $filename1 = $this->input->post('resume_old');
//                 //    echo '<pre>'; print_r($error); exit;
//                $this->load->view('user/index', $error);
//            } else {
//                $data2 = array('upload_data' => $this->upload->data());
//                //print_r($data2); exit;
//                $this->load->view('user/index', $data2);
//            }


//            if (!empty($_FILES['pic']['name'])) {
//                $config['upload_path'] = './upload/user/';
//                $config['allowed_types'] = 'gif|jpg|png';
//                // $config['max_size']	= '100';
//                // $config['max_width']  = '1024';
//                //  $config['max_height']  = '768';
//                $filename = $_FILES['pic']['name'];
//                //    echo '<pre>'; print_r($config); 
//                $this->load->library('upload');
//                $this->upload->initialize($config);
//                if (!$this->upload->do_upload("pic")) {
//                    $error = array('error' => $this->upload->display_errors());
//                    //     echo '<pre>'; print_r($error); exit;
//                    $this->load->view('team/index', $error);
//                } else {
//                    $data2 = array('upload_data' => $this->upload->data());
//
//                    $this->load->view('team/index', $data2);
//                }
//            } else {
//                $filename = $this->input->post('pic_old');
//            }
//            
//            if (!empty($_FILES['resume']['name'])) {
//                $config['upload_path'] = './upload/resume/';
//                $config['allowed_types'] = 'pdf|docx|doc';
//                // $config['max_size']	= '100';
//                // $config['max_width']  = '1024';
//                //  $config['max_height']  = '768';
//                $filename1 = $_FILES['resume']['name'];
//                //    echo '<pre>'; print_r($config); 
//                $this->load->library('upload');
//                $this->upload->initialize($config);
//                if (!$this->upload->do_upload("resume")) {
//                    $error = array('error' => $this->upload->display_errors());
//                    //     echo '<pre>'; print_r($error); exit;
//                    $this->load->view('team/index', $error);
//                } else {
//                    $data2 = array('upload_data' => $this->upload->data());
//
//                    $this->load->view('team/index', $data2);
//                }
//            } else {
//                $filename = $this->input->post('resume_old');
//            }

           // echo $filename[0];die;

            $data = array(
                 'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'age' => $this->input->post('age'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'pwd_txt' => $this->input->post('pwd_txt'),
                'apply_for' => $this->input->post('apply_for'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'occu' => $this->input->post('occu'),
//                'interest_area' => $this->input->post('interest_area'),
//                'cyclist' => $this->input->post('cyclist'),
//                'whatsapp' => $this->input->post('whatsapp'),
//                'why_cc' => $this->input->post('why_cc'),
                //'bio_of' => $this->input->post('bio_of'),
                //'pic' => $filename,
				   'pic' => $filename,
//                'resume' => $filename1,
                'created' => date('Y-m-d')
            );
            if (!empty($_POST['password'])) {
                $data['password'] = md5($this->input->post('password'));
                $data['pwd_txt'] = $this->input->post('password');
            }

            //   print_r($data); exit;
            $result = $this->user_model->update($data, $this->input->post('userid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            if (isset($_POST['profile']) && $_POST['profile'] == 1) {
                redirect('profile/index');
            } else {
                redirect('user/index');
            }
        }

        $result = $this->user_model->edit($id);
        //  print_r($result);
        if ($result) {
            $data['st']=$this->shop_model->getallstate();
            $data['result'] = $result;
            $this->load->view('user/edit', $data);
        }
    }

    /*  DELETE Function  */

    public function remove($id) {
        $this->user_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/user/index');
    }
    
     public function aj_city() {

        $sub = $this->shop_model->getallcities($_POST['id']);
       #echo '<pre>';print_r($sub);exit;
        $html = '';
        //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
        $html.='<option value=""> Select City</option>';
        foreach ($sub as $row) {
            if (isset($_POST['ct_id']) && $_POST['ct_id'] == $row['id']) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

}

?>