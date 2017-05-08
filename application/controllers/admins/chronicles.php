<?php
class chronicles extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {

	    $this->data['result'] = $this->chronicles_model->getchronicles();
		$this->data['title'] = "Manage Chronicles";
		$this->data['main'] = 'admin/adminfiles/chronicles/index';
		$this->data['webpagename'] = 'chronicles';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {
		log_message('debug',"values form post>>".print_r($_POST,true));
		if (count($_POST) > 0) {

			$data = array(
                'chronicles_title' => $this->input->post('chronicles_title'),
                'ch_category' => $this->input->post('ch_category'),
                'post_by' => $this->input->post('post_by'),
                'story_of' => $this->input->post('story_of'),
//                'bio_of' => $this->input->post('bio_of'),
                'chronicles_date' => date('Y-m-d', strtotime($this->input->post('chronicles_date'))),
                'chronicles_desc' => $this->input->post('chronicles_desc'),
                'chronicles_tag' => $this->input->post('chronicles_tag'),
                //'chronicles_category' => $this->input->post('chronicles_category'),
               // 'chronicles_location' => $this->input->post('chronicles_location'),
                'chronicles_active' => $this->input->post('chronicles_active'),
              
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                //'chronicles_image' => $filename,
                //'chronicles_image1' => $filename1,
                //'chronicles_image2' => $filename2,
                //'chronicles_image3' => $filename3,
                //'chronicles_image4' => $filename4
            );
			
			log_message('debug',"value before extrating image>>>>".print_r($data,true));


			if($_FILES['chronicles_image']['name']!="" || $_FILES['chronicles_image']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/chronicles/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('chronicles_image')){
					$error = array('warning' =>  $this->upload->display_errors());
					log_message("error","errorcomoing".print_r($error,true));
					$this->session->set_flashdata('error',$error);
					//redirect('admins/chronicles/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['chronicles_image'] = $upload_data['file_name'];
			   }
			}
			
			log_message('debug',"value after first image>>>>".print_r($data['chronicles_image'],true));

			if($_FILES['chronicles_image1']['name']!="" || $_FILES['chronicles_image1']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/chronicles/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('chronicles_image1')){
					$error = array('warning' =>  $this->upload->display_errors());
					log_message("error","errorcomoing image2".print_r($error,true));
					$this->session->set_flashdata('error',$error);
					redirect('admins/chronicles/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['chronicles_image1'] = $upload_data['file_name'];
			   }
			}

			if($_FILES['chronicles_image2']['name']!="" || $_FILES['chronicles_image2']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/chronicles/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('chronicles_image2')){
					$error = array('warning' =>  $this->upload->display_errors());
					log_message("error","errorcomoing image3".print_r($error,true));
					$this->session->set_flashdata('error',$error);
					redirect('admins/chronicles/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['chronicles_image2'] = $upload_data['file_name'];
			   }
			}

			if($_FILES['chronicles_image3']['name']!="" || $_FILES['chronicles_image3']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/chronicles/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('chronicles_image3')){
					$error = array('warning' =>  $this->upload->display_errors());
					log_message("error","errorcomoing image4".print_r($error,true));
					$this->session->set_flashdata('error',$error);
					redirect('admins/chronicles/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['chronicles_image3'] = $upload_data['file_name'];
			   }
			}

			if($_FILES['chronicles_image4']['name']!="" || $_FILES['chronicles_image4']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/chronicles/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('chronicles_image4')){
					$error = array('warning' =>  $this->upload->display_errors());
					log_message("error","errorcomoing image5".print_r($error,true));
					$this->session->set_flashdata('error',$error);
					redirect('admins/chronicles/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['chronicles_image4'] = $upload_data['file_name'];
			   }
			}
            log_message('bebug',"data going to inset".print_r($data));
            $this->chronicles_model->insert($data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            //redirect('admins/chronicles/index','refresh');
        }

		$data['state'] = $this->chronicles_model->getstate();
        $data['cate'] = $this->chronicles_model->getcate();
		$data['title'] = "Add Chronicles";
		$data['main'] = 'admin/adminfiles/chronicles/add';
		$data['webpagename'] = 'chronicles';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');

    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'chronicles_title' => $this->input->post('chronicles_title'),
                'ch_category' => $this->input->post('ch_category'),
				//'post_by' => $this->input->post('post_by'),
                'story_of' => $this->input->post('story_of'),
				//'bio_of' => $this->input->post('bio_of'),
                'chronicles_date' => date('Y-m-d', strtotime($this->input->post('chronicles_date'))),
                'chronicles_desc' => $this->input->post('chronicles_desc'),
                // 'chronicles_category' => $this->input->post('chronicles_category'),
                'chronicles_tag' => $this->input->post('chronicles_tag'),
                //  'chronicles_location' => $this->input->post('chronicles_location'),
                'chronicles_active' => $this->input->post('chronicles_active'),
				'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                
                //'chronicles_image' => $filename,
                //'chronicles_image1' => $filename1,
                //'chronicles_image2' => $filename2,
                //'chronicles_image3' => $filename3,
                //'chronicles_image4' => $filename4,
            );

			if($_FILES['chronicles_image']['name']!="" || $_FILES['chronicles_image']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/chronicles/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('chronicles_image')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/chronicles/edit/'.$_POST['chronicles_id'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['chronicles_image'] = $upload_data['file_name'];

					   if($_POST['chronicles_image_old']!="" || $_POST['chronicles_image_old']!=NULL){
							unlink(FCPATH.'/upload/chronicles/'.$_POST['chronicles_image_old']);
					   }
				   }
			}

			if($_FILES['chronicles_image1']['name']!="" || $_FILES['chronicles_image1']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/chronicles/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('chronicles_image1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/chronicles/edit/'.$_POST['chronicles_id'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['chronicles_image1'] = $upload_data['file_name'];

					   if($_POST['chronicles_image_old1']!="" || $_POST['chronicles_image_old1']!=NULL){
							unlink(FCPATH.'/upload/chronicles/'.$_POST['chronicles_image_old1']);
					   }
				   }
			}

			if($_FILES['chronicles_image2']['name']!="" || $_FILES['chronicles_image2']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/chronicles/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('chronicles_image2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/chronicles/edit/'.$_POST['chronicles_id'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['chronicles_image2'] = $upload_data['file_name'];

					   if($_POST['chronicles_image_old2']!="" || $_POST['chronicles_image_old2']!=NULL){
							unlink(FCPATH.'/upload/chronicles/'.$_POST['chronicles_image_old2']);
					   }
				   }
			}

			if($_FILES['chronicles_image3']['name']!="" || $_FILES['chronicles_image3']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/chronicles/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('chronicles_image3')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/chronicles/edit/'.$_POST['chronicles_id'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['chronicles_image3'] = $upload_data['file_name'];

					   if($_POST['chronicles_image_old3']!="" || $_POST['chronicles_image_old3']!=NULL){
							unlink(FCPATH.'/upload/chronicles/'.$_POST['chronicles_image_old3']);
					   }
				   }
			}

			if($_FILES['chronicles_image4']['name']!="" || $_FILES['chronicles_image4']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/chronicles/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('chronicles_image4')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/chronicles/edit/'.$_POST['chronicles_id'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['chronicles_image4'] = $upload_data['file_name'];

					   if($_POST['chronicles_image_old4']!="" || $_POST['chronicles_image_old4']!=NULL){
							unlink(FCPATH.'/upload/chronicles/'.$_POST['chronicles_image_old4']);
					   }
				   }
			}

			$result = $this->chronicles_model->update($data, $this->input->post('chronicles_id'));
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/chronicles/index','refresh');
		}
		else
		{
			$data['title'] = "Edit Chronicles";	
			$data['main'] = 'admin/adminfiles/chronicles/edit';
			$data['result'] = $this->chronicles_model->edit($id);
			$data['state'] = $this->chronicles_model->getstate();
            $data['cate'] = $this->chronicles_model->getcate();
			$data['webpagename'] = 'chronicles';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}  
    }

    /*  DELETE Function  */
    public function remove($id) {

		$this->chronicles_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/chronicles/index');
    }
    
    //CATEGORY
    public function category() {
		$this->data['result'] = $this->chronicles_model->getcate();
		$this->data['title'] = "Manage Category";
		$this->data['main'] = 'admin/adminfiles/chronicles/category';
		$this->data['webpagename'] = 'category';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD CATEGORY  */
    public function addcate() {

		if(count($_POST) > 0)
			{
			   $data = array(
                'cate_name' => $this->input->post('cate_name'),
                'cate_desc' => $this->input->post('cate_desc')
				);

				$this->db->insert('ch_category', $data);
				$this->session->set_flashdata("success", "Add Sucessfully");
				redirect('admins/chronicles/category');
			}


			$this->data['title'] = "Add Category";
			$this->data['main'] = 'admin/adminfiles/chronicles/addcategory';
			$this->data['webpagename'] = 'category';
			$this->load->vars($this->data);
			$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function editcate($id=0) {

		if (count($_POST) > 0) {

			$data = array(
                'cate_name' => $this->input->post('cate_name'),
                'cate_desc' => $this->input->post('cate_desc')
            );
            $result = $this->chronicles_model->updatecate($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/chronicles/category');   
        }

		$data['title'] = "Edit Category";	
		$data['main'] = 'admin/adminfiles/chronicles/editcategory';
		$data['result'] =$this->chronicles_model->editcate($id);
		$data['webpagename'] = 'category';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    }

    /*  DELETE Function  */
    public function removecate($id) {

		$this->db->delete('ch_category', array('cate_id' => $id));
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/chronicles/category');
    }
    

    public function aj_city() {

        $city = $this->chronicles_model->getcityById($_POST['id']);
        $html = '';
        $html.='<option value=""> Select City</option>';
        foreach ($city as $row) {
            if (isset($_POST['ct_id']) && $_POST['ct_id'] ==  $row['id']) {
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