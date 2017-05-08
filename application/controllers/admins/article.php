<?php
class article extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
	{
		$this->data['result'] = $this->article_model->getarticle();
		$this->data['title'] = "Manage Article";
		$this->data['main'] = 'admin/adminfiles/article/index';
		$this->data['webpagename'] = 'article';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */

    public function add() {

        if (count($_POST) > 0) {

			$data = array(
                'cate_id' => $this->input->post('cate_name'),
                'sub_id' => $this->input->post('sub_name'),
                'article_name' => $this->input->post('article_name'),
                'article_type' => $this->input->post('article_type'),
                'article_desc' => $this->input->post('article_desc'),
                //'article_image' => $filename,
                'pub_date' => date('Y-m-d', strtotime($this->input->post('pub_date'))),
                'create_date' => date('Y-m-d', strtotime($this->input->post('create_date')))
            );

			if($_FILES['article_image']['name']!="" || $_FILES['article_image']['name']!=NULL)
			{
			   $config['upload_path'] = './upload/article/';
			   $config['allowed_types'] = 'gif|jpg|png|jpeg';
			   $config['max_size'] = '20000';
			   $config['max_height'] ='';
			   $config['max_width'] = '';
			   $config['file_name'] = time();

			   $this->load->library('upload');
			   $this->upload->initialize($config);  

			   if(!$this->upload->do_upload('article_image')){
					$error = array('warning' =>  $this->upload->display_errors());
					$this->session->set_flashdata('error',$error);
					redirect('admins/article/index','refresh');
			   }else{
				   $upload_data = $this->upload->data();
				   $data['article_image'] = $upload_data['file_name'];
			   }
			}

            $this->db->insert('article', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/article/index','refresh');
        }

		$this->data['cat_name'] = $this->article_model->getcate();
		$this->data['sub_name'] = $this->article_model->getsub();
		$this->data['title'] = "Add Article";
		$this->data['main'] = 'admin/adminfiles/article/addarticle';
		$this->data['webpagename'] = 'article';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function edit($id=0) {

		if (count($_POST) > 0)
		{
			$data = array(
					'cate_id' => $this->input->post('cate_name'),
					'sub_id' => $this->input->post('sub_name'),
					'article_name' => $this->input->post('article_name'),
					'article_type' => $this->input->post('article_type'),
					'article_desc' => $this->input->post('article_desc'),
					//'article_image' => $filename,
					'pub_date' => date('Y-m-d', strtotime($this->input->post('pub_date'))),
					'create_date' => date('Y-m-d', strtotime($this->input->post('create_date')))
				);

			if($_FILES['article_image']['name']!="" || $_FILES['article_image']['name']!=NULL)
			{
				   $config['upload_path'] = './upload/article/';
				   $config['allowed_types'] = 'gif|jpg|png|jpeg';
				   $config['max_size'] = '20000';
				   $config['max_height'] ='';
				   $config['max_width'] = '';
				   $config['file_name'] = time();

				   $this->load->library('upload');
				   $this->upload->initialize($config);  

				   if(!$this->upload->do_upload('article_image')){
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',$error);
						redirect('admins/article/edit/'.$_POST['editid'],'refresh');
				   }else{
					   $upload_data = $this->upload->data();
					   $data['article_image'] = $upload_data['file_name'];

					   if($_POST['pic_old']!="" || $_POST['pic_old']!=NULL){
							unlink(FCPATH.'/upload/article/'.$_POST['pic_old']);
					   }
				   }
			}

			$result = $this->article_model->update($data, $this->input->post('editid'));
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('admins/article/index','refresh');
		}
		else
		{
			$data['title'] = "Edit Article";	
			$data['main'] = 'admin/adminfiles/article/editarticle';
			$data['result'] = $this->article_model->edit($id);
			$data['cat_name'] = $this->article_model->getcate();
            $data['sub_name'] = $this->article_model->getsub();
			$data['webpagename'] = 'article';
			$this->load->vars($data);
			$this->load->view('admin/template/innermaster');   
		}
    }

    /*  DELETE Function  */
    public function remove($id) {
		$this->article_model->delete($id);
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/article/index');
    }

//CATEGORY
    public function category() {
		$this->data['result'] = $this->article_model->getcate();
		$this->data['title'] = "Manage Category";
		$this->data['main'] = 'admin/adminfiles/article/category';
		$this->data['webpagename'] = 'category';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD CATEGORY  */
    public function addcate() {

		if(count($_POST) > 0)
			{
				$flag1 = $this->article_model->newCheckcate();
				if($flag1 == 0)
				{
					$this->article_model->createcategory();
					$this->session->set_flashdata('message','Add Sucessfully');
					redirect('admins/article/category','refresh');
				}
				else
				{
					$this->session->set_flashdata('error','Category already exist !');
					redirect('admins/article/addcate','refresh');
				}
					
			}


			$this->data['title'] = "Add Category";
			$this->data['main'] = 'admin/adminfiles/article/addcategory';
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
            $result = $this->article_model->updatecate($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/article/category');
        }

		$data['title'] = "Edit Category";	
		$data['main'] = 'admin/adminfiles/article/editcategory';
		$data['result'] =$this->article_model->editcate($id);
		$data['webpagename'] = 'category';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster'); 
    }

    /*  DELETE Function  */
    public function removecate($id) {
        $this->db->delete('category', array('cate_id' => $id));
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/article/category');
    }

//SUBCATEGORY
    public function subcategory() {

		$this->data['result'] = $this->article_model->getsub();
		$this->data['title'] = "Manage Subcategory";
		$this->data['main'] = 'admin/adminfiles/article/subcategory';
		$this->data['webpagename'] = 'subcategory';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  ADD Function  */
    public function addsub() {
        if (count($_POST) > 0) {
            $data = array(
                'cate_id' => $this->input->post('cate_name'),
                'sub_name' => $this->input->post('sub_name'),
                'sub_desc' => $this->input->post('sub_desc')
            );

            $this->db->insert('subcategory', $data);
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/article/subcategory');
        }
        
		$this->data['cat_name']= $this->article_model->getcate();
		$this->data['title'] = "Add SubCategory";
		$this->data['main'] = 'admin/adminfiles/article/addsubcategory';
		$this->data['webpagename'] = 'subcategory';
		$this->load->vars($this->data);
		$this->load->view('admin/template/innermaster');
    }

    /*  EDIT Function  */
    public function editsub($id=0) {

        if (count($_POST) > 0) {
            $data = array(
                'cate_id' => $this->input->post('cate_name'),
                'sub_name' => $this->input->post('sub_name'),
                'sub_desc' => $this->input->post('sub_desc')
            );
            $result = $this->article_model->updatesub($data, $this->input->post('editid'));
            $this->session->set_flashdata("success", "Add Sucessfully");
            redirect('admins/article/subcategory');
        }

		$data['title'] = "Edit SubCategory";	
		$data['main'] = 'admin/adminfiles/article/editsubcategory';
		$data['result'] =$this->article_model->editsub($id);
		$data['cat_name'] = $this->article_model->getcate();
		$data['webpagename'] = 'subcategory';
		$this->load->vars($data);
		$this->load->view('admin/template/innermaster'); 
    }

    /*  DELETE Function  */
    public function removesub($id) {
        $this->db->delete('subcategory', array('sub_id' => $id));
        $this->session->set_flashdata("success", " Removed Sucessfully.");
        redirect('admins/article/subcategory');
    }

    public function aj_sub() {
        $sub = $this->article_model->getsub($_POST['id']);
        $html = '';
        $html.='<option value=""> Select Subcategory</option>';
        foreach ($sub as $row) {
            if (isset($_POST['cate_id']) && $_POST['cate_id'] == $row['sub_id']) {
                $selected = "selected";
            } else {
                $selected = '';
            }
            $html.='<option value="' . $row['sub_id'] . '" ' . $selected . '>' . $row['sub_name'] . '</option>';
        }
        $html.="</select>";

        echo $html;
        exit;
    }

}

?>
