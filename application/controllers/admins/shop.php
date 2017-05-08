<?php
class shop extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

   public function index() {

	   $this->data['result'] = $this->shop_model->getshop();
		$this->data['title'] = "Manage shop";
		$this->data['main'] = 'admin/adminfiles/shop/index';
		$this->data['webpagename'] = 'shop';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function add() {

		if (count($_POST) > 0) {

            $data = array(
                'shop_name' => $this->input->post('shop_name'),
                'address' => $this->input->post('address'),
                'owner' => $this->input->post('owner'),     
                'email' => $this->input->post('email'),
                'time' => $this->input->post('time'),
                'website' => $this->input->post('website'),
                'phone1' => $this->input->post('phone1'),
                'phone2' => $this->input->post('phone2'),  
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'o_order' => $this->input->post('o_order'),
                'h_delivery' => $this->input->post('h_delivery'),
                'service_repair' => $this->input->post('service_repair'),
                 'brand' => $this->input->post('brand'),
                'price_low' => $this->input->post('price_low'),
                'price_high' => $this->input->post('price_high'),
                //'shop_img' => $filename,
                //'shop_img1' => $filename1,
                //'shop_img2' => $filename2,
                //'shop_offer' => $filename3,
                //'shop_offer1' => $filename4,
                //'shop_offer2' => $filename5,
                //'shop_offer3' => $filename6,
                //'shop_offer4' => $filename7,
                //'shop_offer5' => $filename8,
            );

			
            
               if($_FILES['shop_img']['name']!="" || $_FILES['shop_img']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_img')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_img'] = $upload_data['file_name'];
				   }
				}

		    if($_FILES['shop_img1']['name']!="" || $_FILES['shop_img1']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_img1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_img1'] = $upload_data['file_name'];
				   }
				}

			  if($_FILES['shop_img2']['name']!="" || $_FILES['shop_img2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_img2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_img2'] = $upload_data['file_name'];
				   }
				}

			  if($_FILES['shop_offer']['name']!="" || $_FILES['shop_offer']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer'] = $upload_data['file_name'];
				   }
				}
			  if($_FILES['shop_offer1']['name']!="" || $_FILES['shop_offer1']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer1')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer1'] = $upload_data['file_name'];
				   }
				}

			  if($_FILES['shop_offer2']['name']!="" || $_FILES['shop_offer2']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer2')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer2'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['shop_offer3']['name']!="" || $_FILES['shop_offer3']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer3')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer3'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['shop_offer4']['name']!="" || $_FILES['shop_offer4']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer4')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer4'] = $upload_data['file_name'];
				   }
				}

				if($_FILES['shop_offer5']['name']!="" || $_FILES['shop_offer5']['name']!=NULL)
				{
				   $config['upload_path'] = './upload/shop_img/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('shop_offer5')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/shop/index','refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['shop_offer5'] = $upload_data['file_name'];
				   }
				}


			$this->db->insert('shop', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/shop/index');
        }

		$data['title'] = "Add Shop";
		$data['main'] = 'admin/adminfiles/shop/add';
		$data['st']=$this->shop_model->getallstate();
		$data['webpagename'] = 'shop';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster');
    } 

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
                'shop_name' => $this->input->post('shop_name'),
                'address' => $this->input->post('address'),
                'owner' => $this->input->post('owner'),     
                'email' => $this->input->post('email'),
                'time' => $this->input->post('time'),
                'website' => $this->input->post('website'),
                'phone1' => $this->input->post('phone1'),
                'phone2' => $this->input->post('phone2'),  
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'o_order' => $this->input->post('o_order'),
                'service_repair' => $this->input->post('service_repair'),
                'h_delivery' => $this->input->post('h_delivery'),
                'brand' => $this->input->post('brand'),
                'price_low' => $this->input->post('price_low'),
                'price_high' => $this->input->post('price_high'),
                //'shop_img' => $filename,
                //'shop_img1' => $filename1,
                //'shop_img2' => $filename2,
                //'shop_offer' => $filename3,
                //'shop_offer1' => $filename4,
                //'shop_offer2' => $filename5,
                //'shop_offer3' => $filename6,
                //'shop_offer4' => $filename7,
                //'shop_offer5' => $filename8,
            );
			 

                if($_FILES['shop_img']['name']!="" || $_FILES['shop_img']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_img')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_img'] = $upload_data['file_name'];

						   if($_POST['image_old']!="" || $_POST['image_old']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old']);
						   }
					   }
				}

				if($_FILES['shop_img1']['name']!="" || $_FILES['shop_img1']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_img1')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_img1'] = $upload_data['file_name'];

						   if($_POST['image_old1']!="" || $_POST['image_old1']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old1']);
						   }
					   }
				}

				if($_FILES['shop_img2']['name']!="" || $_FILES['shop_img2']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_img2')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_img2'] = $upload_data['file_name'];

						   if($_POST['image_old2']!="" || $_POST['image_old2']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old2']);
						   }
					   }
				}

				if($_FILES['shop_offer']['name']!="" || $_FILES['shop_offer']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer'] = $upload_data['file_name'];

						   if($_POST['image_old3']!="" || $_POST['image_old3']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old3']);
						   }
					   }
				}

				if($_FILES['shop_offer1']['name']!="" || $_FILES['shop_offer1']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer1')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer1'] = $upload_data['file_name'];

						   if($_POST['image_old4']!="" || $_POST['image_old4']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old4']);
						   }
					   }
				}

				if($_FILES['shop_offer2']['name']!="" || $_FILES['shop_offer2']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer2')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer2'] = $upload_data['file_name'];

						   if($_POST['image_old5']!="" || $_POST['image_old5']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old5']);
						   }
					   }
				}

				if($_FILES['shop_offer3']['name']!="" || $_FILES['shop_offer3']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer3')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer3'] = $upload_data['file_name'];

						   if($_POST['image_old6']!="" || $_POST['image_old6']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old6']);
						   }
					   }
				}

				if($_FILES['shop_offer4']['name']!="" || $_FILES['shop_offer4']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer4')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer4'] = $upload_data['file_name'];

						   if($_POST['image_old7']!="" || $_POST['image_old7']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old7']);
						   }
					   }
				}

				if($_FILES['shop_offer5']['name']!="" || $_FILES['shop_offer5']['name']!=NULL)
				{
					   $config['upload_path'] = './upload/shop_img/';
					   $config['allowed_types'] = 'gif|jpg|png|jpeg';
					   $config['max_size'] = '20000';
					   $config['max_height'] ='';
					   $config['max_width'] = '';
					   $config['file_name'] = time();

					   $this->load->library('upload');
					   $this->upload->initialize($config);  

					   if(!$this->upload->do_upload('shop_offer5')){
							$error = array('warning' =>  $this->upload->display_errors());
							$this->session->set_flashdata('error',$error);
							redirect('admins/shop/edit/'.$_POST['editid'],'refresh');
					   }else{
						   $upload_data = $this->upload->data();
						   $data['shop_offer5'] = $upload_data['file_name'];

						   if($_POST['image_old8']!="" || $_POST['image_old8']!=NULL){
								unlink(FCPATH.'/upload/shop_img/'.$_POST['image_old8']);
						   }
					   }
				}

            $result = $this->shop_model->update($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Update Sucessfully");
            redirect('admins/shop/index');
		}
		else
		{
			$data['title'] = "Edit Shop";	
			$data['main'] = 'admin/adminfiles/shop/edit';
			$data['result'] = $this->shop_model->edit($id);
			$data['st']=$this->shop_model->getallstate();
			$data['webpagename'] = 'shop';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		} 
    }
  /*  DELETE Function  */
    public function remove($id) {

		$this->shop_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/shop/index');
    }
    
    public function aj_city() {
        $sub = $this->shop_model->getallcities($_POST['id']);
        $html = '';
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