<?php
class post_cycle extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

		$this->data['result'] = $this->post_cycle_model->getpost_cycle();
		$this->data['title'] = "Manage Post Cycle";
		$this->data['main'] = 'admin/adminfiles/post_cycle/index';
		$this->data['webpagename'] = 'post_cycle';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }
   

    /*  ADD Function  */

    public function add() {

		if (count($_POST) > 0) {

			$f=$this->input->post('features');
            $feature=array('features'=>implode(",", $f));
        
            $data = array(
               // 'post_cycle_id' => $this->input->post('post_cycle_id'),
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'phn' => $this->input->post('phn'),
                'email' => $this->input->post('email'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'brand_id' => $this->input->post('brand_name'),
                'cycle_type' => $this->input->post('cycle_type'),
                'model' => $this->input->post('model'),
                'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'features' => $feature['features'],
                'reservation' => $this->input->post('reservation'),
                'rent' => $this->input->post('rent'),
                'rent_per_day' => $this->input->post('rent_per_day'),
                'posting_type' => $this->input->post('posting_type'),
                'remarks' => $this->input->post('remarks'),
                'whats_app' => $this->input->post('whats_app'),
                //'cycle_pic' => $filename
            );

			
            
               if($_FILES['cycle_pic']['name']!="" || $_FILES['cycle_pic']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/post_cycle/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('cycle_pic')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/post_cycle/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['cycle_pic'] = $upload_data['file_name'];
				   }
				}

			$this->db->insert('post_cycle', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/post_cycle/index');
        }

		$data['title'] = "Add Post Cycle";
		$data['main'] = 'admin/adminfiles/post_cycle/add';
		$data['brand_name']= $this->post_cycle_model->getbrand();
        $data['country'] = $this->post_cycle_model->getcountry();
        $data['whatsapp'] = $this->post_cycle_model->getwhatsapp();
		$data['webpagename'] = 'post_cycle';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */

    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$f=$this->input->post('features');
			$feature=array('features'=>implode(",", $f));
			$data = array(
			   // 'post_cycle_id' => $this->input->post('post_cycle_id'),
				'name' => $this->input->post('name'),
				'phn' => $this->input->post('phn'),
				'email' => $this->input->post('email'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'brand_id' => $this->input->post('brand_name'),
				'cycle_type' => $this->input->post('cycle_type'),
				'model' => $this->input->post('model'),
				'height' => $this->input->post('height'),
				'weight' => $this->input->post('weight'),
				'features' => $feature['features'],
				'reservation' => $this->input->post('reservation'),
				'rent' => $this->input->post('rent'),
				'rent_per_day' => $this->input->post('rent_per_day'),
				'posting_type' => $this->input->post('posting_type'),
				'remarks' => $this->input->post('remarks'),
				'whats_app' => $this->input->post('whats_app'),
				//'cycle_pic' => $filename
			);
			 

                if($_FILES['cycle_pic']['name']!="" || $_FILES['cycle_pic']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/post_cycle/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('cycle_pic')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/post_cycle/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['cycle_pic'] = $upload_data['file_name'];

						   if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
								unlink(FCPATH.'/upload/post_cycle/'.$_POST['pic_old']);
						   }
					   }
				}

			$result = $this->post_cycle_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/post_cycle/index');
		}
		else
		{
			$data['title'] = "Edit Post Cycle";	
			$data['main'] = 'admin/adminfiles/post_cycle/edit';
			$data['result'] = $this->post_cycle_model->edit($id);
			$data['brand_name']= $this->post_cycle_model->getbrand();
            $data['firstname']= $this->post_cycle_model->getuser();
            $data['country'] = $this->post_cycle_model->getcountry();
			$data['webpagename'] = 'post_cycle';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }
    
	public function sell_list() {

	    //$this->data['result'] = $this->post_cycle_model->getpost_cycle();
		$this->data['result'] = $this->post_cycle_model->getsell_cycle();
		$this->data['title'] = "Manage Post Sell Cycle";
		$this->data['main'] = 'admin/adminfiles/post_cycle/post_sell_list';
		$this->data['webpagename'] = 'post_sell_list';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function sell_cycle_detail($id=0) {

	    //$this->data['result'] = $this->post_cycle_model->getpost_cycle();
		$this->data['result'] = $this->post_cycle_model->getsell_cyclebyid($id);
		$this->data['title'] = "Post Sell Cycle Details";
		$this->data['main'] = 'admin/adminfiles/post_cycle/post_sell_details';
		$this->data['webpagename'] = 'post_sell_details';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	function changestatus()
	{
		if($this->input->post('btn_approve'))
		{
		   $this->post_cycle_model->updateRequestDetails();
		   $this->approvalmail();
		   $this->session->set_flashdata('message','Updated Successfully.');
		   redirect('admins/post_cycle/sell_list','refresh');
		}
		if($this->input->post('btn_reject'))
		{
			$id=$this->input->post('id');
			redirect('admins/post_cycle/rejectsellcycle/'.$id,'refresh');
		}
	}

	function rejectsellcycle($id)
	{
		$data['id'] = $id;
		$data['title'] = "Post Sell Cycle Details";
		$data['main'] = 'admin/adminfiles/post_cycle/reject_sell_cycle';
		$data['webpagename'] = 'post_sell_details';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
	}

	function rejectstatus()
	{
		if($this->input->post('btn_reject'))
		{
			$this->post_cycle_model->updateRequestDetails();

			if($this->input->post('btn_reject'))
			{
				$this->rejsectedmail();
				$this->session->set_flashdata('message','Updated Successfully.');
			    redirect('admins/post_cycle/sell_list','refresh');
			}
		}
	}


	function approvalmail()
	{
		$id=$_POST['id'];
		$sellcycledetail = $this->post_cycle_model->getsell_cyclebyid($id);
        
		$name='';
		if(count($this->post_cycle_model->getusername($sellcycledetail[0]['user_id'])))
		{
		  $name= $this->post_cycle_model->getusername($sellcycledetail[0]['user_id']); 
		}

		$email='';
		if(count($this->post_cycle_model->getuseremail($sellcycledetail[0]['user_id'])))
		{
		  $email= $this->post_cycle_model->getuseremail($sellcycledetail[0]['user_id']); 
		}

		$bodydata['name']=ucwords($name);
		$email = $email;
		$from = $this->config->item('fromemailid');
		$to=$email;
		$cc = '';
		$subject = "Request Approval.";
		$attach = "";
		$body = $this->load->view('admin/email_templates/approvalmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}

   function rejsectedmail()
	{
		$id=$_POST['id'];
		$sellcycledetail = $this->post_cycle_model->getsell_cyclebyid($id);
        
		$name='';
		if(count($this->post_cycle_model->getusername($sellcycledetail[0]['user_id'])))
		{
		  $name= $this->post_cycle_model->getusername($sellcycledetail[0]['user_id']); 
		}

		$email='';
		if(count($this->post_cycle_model->getuseremail($sellcycledetail[0]['user_id'])))
		{
		  $email= $this->post_cycle_model->getuseremail($sellcycledetail[0]['user_id']); 
		}

		$bodydata['name']=ucwords($name);
		$email = $email;
		$bodydata['remark']=$_POST['remark'];
		$from = $this->config->item('fromemailid');
		$to=$email;
		$cc = '';
		$subject = "Request Rejection.";
		$attach = "";
		$body = $this->load->view('admin/email_templates/rejsectedmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}
	

    public function try_list() {
	    $this->data['result'] = $this->post_cycle_model->gettry_cycle();
		$this->data['title'] = "Manage Post Try Cycle";
		$this->data['main'] = 'admin/adminfiles/post_cycle/post_try_list';
		$this->data['webpagename'] = 'post_try_list';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	public function try_cycle_detail($id=0) {

	    //$this->data['result'] = $this->post_cycle_model->getpost_cycle();
		$this->data['result'] = $this->post_cycle_model->gettry_cyclebyid($id);
		$this->data['title'] = "Post Try Cycle Details";
		$this->data['main'] = 'admin/adminfiles/post_cycle/post_try_details';
		$this->data['webpagename'] = 'post_try_details';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

	function changetrycyclestatus()
	{
		if($this->input->post('btn_approve'))
		{
		   $this->post_cycle_model->updatetrycycleRequestDetails();
		   $this->trycycleapprovalmail();
		   $this->session->set_flashdata('message','Updated Successfully.');
		   redirect('admins/post_cycle/try_list','refresh');
		}
		if($this->input->post('btn_reject'))
		{
			$id=$this->input->post('id');
			redirect('admins/post_cycle/rejecttrycycle/'.$id,'refresh');
		}
	}

	function rejecttrycycle($id)
	{
		$data['id'] = $id;
		$data['title'] = "Post Try Cycle Details";
		$data['main'] = 'admin/adminfiles/post_cycle/reject_try_cycle';
		$data['webpagename'] = 'post_try_details';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
	}

	function rejecttrycyclestatus()
	{
		if($this->input->post('btn_reject'))
		{
			$this->post_cycle_model->updatetrycycleRequestDetails();

			if($this->input->post('btn_reject'))
			{
				$this->trycyclerejsectedmail();
				$this->session->set_flashdata('message','Updated Successfully.');
			    redirect('admins/post_cycle/try_list','refresh');
			}
		}
	}


	function trycycleapprovalmail()
	{
		$id=$_POST['id'];
		$trycycledetail = $this->post_cycle_model->gettry_cyclebyid($id);
        
		$name='';
		if(count($this->post_cycle_model->getusername($trycycledetail[0]['user_id'])))
		{
		  $name= $this->post_cycle_model->getusername($trycycledetail[0]['user_id']); 
		}

		$email='';
		if(count($this->post_cycle_model->getuseremail($trycycledetail[0]['user_id'])))
		{
		  $email= $this->post_cycle_model->getuseremail($trycycledetail[0]['user_id']); 
		}

		$bodydata['name']=ucwords($name);
		$email = $email;
		$from = $this->config->item('fromemailid');
		$to=$email;
		$cc = '';
		$subject = "Request Approval.";
		$attach = "";
		$body = $this->load->view('admin/email_templates/approvalmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}

   function trycyclerejsectedmail()
	{
		$id=$_POST['id'];
		$trycycledetail = $this->post_cycle_model->gettry_cyclebyid($id);
        
		$name='';
		if(count($this->post_cycle_model->getusername($trycycledetail[0]['user_id'])))
		{
		  $name= $this->post_cycle_model->getusername($trycycledetail[0]['user_id']); 
		}

		$email='';
		if(count($this->post_cycle_model->getuseremail($trycycledetail[0]['user_id'])))
		{
		  $email= $this->post_cycle_model->getuseremail($trycycledetail[0]['user_id']); 
		}

		$bodydata['name']=ucwords($name);
		$email = $email;
		$bodydata['remark']=$_POST['remark'];
		$from = $this->config->item('fromemailid');
		$to=$email;
		$cc = '';
		$subject = "Request Rejection.";
		$attach = "";
		$body = $this->load->view('admin/email_templates/rejsectedmail',$bodydata,true);
		$this->utilities_m->sendMail($from,$name,$to,$cc,$subject,$body,$attach);
	}

    /*  DELETE Function  */

    public function remove($id) {

		$this->post_cycle_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/post_cycle/index');
    }

     public function aj_state() {
        $state = $this->post_cycle_model->getstateById($_POST['id']);
        
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

        $city = $this->post_cycle_model->getcityById($_POST['id']);
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
    
    public function aj_model() {

        $mod = $this->post_cycle_model->getmodel($_POST['id']);
        $html = '';
        //$html.='<select name="StateId" id="StateId" class="span6 StateId" required>';
        $html.='<option value=""> Select Model</option>';
        foreach ($mod as $row) {
            if (isset($_POST['m_id']) && $_POST['m_id'] == $row['model_id']) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row->model_id . '" ' . $selected . '  >' . $row->name . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }
}

?>