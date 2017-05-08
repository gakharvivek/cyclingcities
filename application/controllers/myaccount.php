<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class myaccount extends Front_Controller {

	function __construct()
    {
        parent::__construct();	
    }

	
	public function index()
	{
		$this->CheckLoginVerification();
		$data['main'] = 'myaccount';
		$data['websitepagename'] = 'myaccount';
		$this->load->vars($data);
		$this->load->view('myaccount');
	}

	public function myprofile()
	{
		$this->CheckLoginVerification();
		$data['main'] = 'myprofile';
		$data['websitepagename'] = 'myprofile';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	
	public function myproducts($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'myproducts';
		$data['websitepagename'] = 'myproducts';

		$config['base_url'] = site_url('myaccount/myproducts');
		$config["total_rows"] = $this->myaccount_fm->countbindproductvalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["productvalue"]=$productvalue = $this->myaccount_fm->Getbindproductvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function mywebinars($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'mywebinars';
		$data['websitepagename'] = 'mywebinars';

		$config['base_url'] = site_url('myaccount/mywebinars');
		$config["total_rows"] = $this->myaccount_fm->countbindwebinarvalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["webinarvalue"]=$webinarvalue = $this->myaccount_fm->Getbindwebinarvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function detailwebinar($id=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'detailwebinar';
		$data['websitepagename'] = 'detailwebinar';
		$data['detailwebinar'] = $this->myaccount_fm->getwebinardetailbyId($id);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function addproduct()
	{
		$fuserid=$this->session->userdata('fuserid');

        $flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to add products, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/myproducts','refresh');
		}

		$data['main'] = 'addproduct';
		$data['websitepagename'] = 'addproduct';
		if(isset($_POST['btnsubmit'])) 
		{
			$productid=$this->myaccount_fm->addproducts($fuserid);
			$productkeyword=$this->input->post('productname');
			$this->myaccount_fm->deleteproductkeyword($productid);
			$this->myaccount_fm->addproductkeyword($productkeyword,$productid);
			$this->session->set_flashdata('message','Product added successfully.');
			redirect('myaccount/myproducts','refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function editproduct($productid=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data['main'] = 'editproduct';
		$data['websitepagename'] = 'editproduct';
		$data['productid'] = $productid;

		$flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to edit products, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/myproducts','refresh');
		}

		if(isset($_POST['btnsubmit'])) 
		{
			$productid=$this->input->post('productid');
			$this->myaccount_fm->updateproducts($productid);
			$productkeyword=$this->input->post('productname');
			$this->myaccount_fm->deleteproductkeyword($productid);
			$this->myaccount_fm->addproductkeyword($productkeyword,$productid);
			$this->session->set_flashdata('message','Product updated successfully.');
			redirect('myaccount/myproducts','refresh');
		}
		$data['productdetail']= $this->myaccount_fm->Getbindproductdetail($productid);
		$data['productkeywords'] = $this->myaccount_fm->Getbindproductkeywords($productid);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function productimage($productid=0)
	{
		
		$data['main'] = 'productimage';
		$data['websitepagename'] = 'productimage';
		$data['productid'] = $productid;
		if(isset($_POST['btnsubmit'])) 
		{
			$pid=$_POST['productid'];
			$this->myaccount_fm->addproductimage($pid);
			$this->session->set_flashdata('message','Product Image added successfully.');
			redirect('myaccount/productimage/'.$pid,'refresh');
		}
		$data['productdetail']= $this->myaccount_fm->Getbindproductdetail($productid);
		$data['productkeywords'] = $this->myaccount_fm->Getbindproductkeywords($productid);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function removeproductimage($id=0,$productid=0)
	{
		$this->myaccount_fm->removeproductimage($id);
		redirect('myaccount/productimage/'.$productid,'refresh'); 
	}

	public function deleteproduct($productid)
	{
		$this->myaccount_fm->deleteproduct($productid);
		$this->session->set_flashdata('message','Product deleted successful.');
		redirect('myaccount/myproducts','refresh');
	}

	public function myservices($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'myservices';
		$data['websitepagename'] = 'myservices';

		$config['base_url'] = site_url('myaccount/myservices');
		$config["total_rows"] = $this->myaccount_fm->countbindservicesvalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["servicevalue"]=$servicevalue = $this->myaccount_fm->Getbindservicesvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function addservice()
	{
		$fuserid=$this->session->userdata('fuserid');

        $flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to add services, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/myservices','refresh');
		}

		$data['main'] = 'addservice';
		$data['websitepagename'] = 'addservice';
		if(isset($_POST['btnsubmit'])) 
		{
			$this->myaccount_fm->addnewservices($fuserid);
			$this->session->set_flashdata('message','Product added successfully.');
			redirect('myaccount/myservices','refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function editservice($serviceid=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data['main'] = 'editservice';
		$data['websitepagename'] = 'editservice';
		$data['serviceid'] = $serviceid;

		$flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to edit services, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/myservices','refresh');
		}

		if(isset($_POST['btnsubmit'])) 
		{
			$this->myaccount_fm->updateservices();
			$this->session->set_flashdata('message','Product updated successfully.');
			redirect('myaccount/myservices','refresh');
		}
		$data['servicedetail']= $this->myaccount_fm->Getbindservicedetail($serviceid);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function deleteservice($serviceid)
	{
		$this->myaccount_fm->deletenewservice($serviceid);
		$this->session->set_flashdata('message','Product deleted successful.');
		redirect('myaccount/myservices','refresh');
	}





	public function mytradeleads($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'mytradeleads';
		$data['websitepagename'] = 'mytradeleads';

		$config['base_url'] = site_url('myaccount/mytradeleads');
		$config["total_rows"] = $this->myaccount_fm->countbindtradeleadvalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["tradeleadvalue"]=$tradeleadvalue = $this->myaccount_fm->Getbindtradeleadvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function addtradelead()
	{
		$fuserid=$this->session->userdata('fuserid');

		$flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to add tradelead, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/mytradeleads','refresh');
		}

		$data['main'] = 'addtradelead';
		$data['websitepagename'] = 'addtradelead';
		if(isset($_POST['btnsubmit'])) 
		{
			$this->myaccount_fm->addtradelead($fuserid);
			$this->myaccount_fm->sendmailforapproval($fuserid);
			$this->session->set_flashdata('message','Trade Lead added successfully.');
			redirect('myaccount/mytradeleads','refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function edittradelead($tradeid=0)
	{
		$data['main'] = 'edittradelead';
		$data['websitepagename'] = 'edittradelead';
		$data['tradeid'] = $tradeid;

		$fuserid=$this->session->userdata('fuserid');
		$flag=$this->myaccount_fm->Checkusercompanyprofile($fuserid);

		//echo $flag;
		//die;

		if($flag=="true")
		{
			$url=site_url("myaccount/companyprofile");
			//echo $url;
			//die;
            $this->session->set_flashdata('info','In order to edit tradelead, you have to fill company profile. <a href="'.$url.'">[Click here]</a> to update your company profile.');
			redirect('myaccount/mytradeleads','refresh');
		}

		if(isset($_POST['btnsubmit'])) 
		{
			$tradeid=$this->input->post('tradeid');
			$this->myaccount_fm->updatetradelead($tradeid);
			$this->myaccount_fm->sendmailforapproval($fuserid);
			$this->session->set_flashdata('message','Product updated successfully.');
			redirect('myaccount/mytradeleads','refresh');
		}
		$data['tradeleaddetail']= $this->myaccount_fm->Getbindtradeleaddetailbyid($tradeid);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function deletetradelead($tradeid)
	{
		$this->myaccount_fm->deletetradelead($tradeid);
		$this->session->set_flashdata('message','Trade Lead deleted successful.');
		redirect('myaccount/mytradeleads','refresh');
	}


	
	public function CheckLoginVerification()
	{
		$userid=$this->session->userdata('fuserid');

		if (!isset($userid) || $userid < 1)
		{
			redirect(site_url('user/login'),'refresh');
		}
		else
		{
				
		}
	}

	public function serviceproviderpaymentbtoa()
	{
	    $this->CheckLoginVerification();
		$data['main'] = 'serviceproviderpaymentbtoa';
		$data['websitepagename'] = 'serviceproviderpaymentbtoa';
		$data['serviceproviderpackage'] = $this->myaccount_fm->getserviceproviderpackage();
		$fuserid=$this->session->userdata('fuserid');
		$data['Userdata'] = $userdata=$this->myaccount_fm->getuserDatabyid($fuserid);
		$this->load->vars($data);
		$this->load->view('template/staticmaster');
	}

	function personalprofile()
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');

		//echo $fuserid;
		//die;

		$data['Userdata'] = $userdata=$this->myaccount_fm->getuserDatabyid($fuserid);
		
		$data['main'] = 'personalprofile';
		$data['websitepagename'] = 'personalprofile';
		if(isset($_POST['btnsubmit'])) 
		{
           if($_POST['roleid']==1)
			{
			  $this->myaccount_fm->udateuniversitypersonalprofile($fuserid);
			  $this->session->set_flashdata('message','Your personal profile has been updated successfully.');
			  redirect('myaccount/universityprofile','refresh');
			}
		   else
			{
			   $this->myaccount_fm->udatepersonalprofile($fuserid);
			   $this->session->set_flashdata('message','Your personal profile has been updated successfully.');
			   redirect('myaccount/studentprofile','refresh');
			}
						
			
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	
	}

	function checkusername()
	{  
        $email=trim($_REQUEST['email']);
		//echo $candidateemail; 

		$fuserid=$this->session->userdata('fuserid');

		$data['checkusername'] = $checkusername = $this->myaccount_fm->checkvalidateusername(urldecode($email),$fuserid);

		echo $checkusername;
		//exit();

	}

	function universityprofile($fuserid=0)
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');

		$data['Userdata'] = $userdata=$this->myaccount_fm->getuserDatabyid($fuserid);
		$data['similar_uni'] = $this->myaccount_fm->getAllUniversities($fuserid);
		$data['university_sim_uni'] = $this->myaccount_fm->getAllUniversitySimUni($fuserid);
		$data['main'] = 'universityprofile';
		$data['websitepagename'] = 'universityprofile';
		if(isset($_POST['btnsubmit'])) 
		{
			$this->myaccount_fm->udateuniversityprofile($fuserid);
			$this->session->set_flashdata('message','University Profile updated successfully.');
			redirect('myaccount/universityprofile','refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function educationpreferences()
	{
		$this->CheckLoginVerification();
		$fuserid=$this->session->userdata('fuserid');
		if(isset($_POST['btnsubmit'])) 
		{
		   $this->myaccount_fm->udateeducationpreferences($fuserid);
		   $this->session->set_flashdata('message','Your Education Preferences has been updated successfully.');
		   redirect('myaccount/studentprofile','refresh');
		}
	}

	function studentprofile($fuserid=0)
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');

		$data['Userdata'] = $userdata=$this->myaccount_fm->getuserDatabyid($fuserid);
		
		$data['main'] = 'studentprofile';
		$data['websitepagename'] = 'studentprofile';
		if(isset($_POST['btnsubmit'])) 
		{
			$this->myaccount_fm->udatestudentprofile($fuserid);
			$this->session->set_flashdata('message','Student Profile updated successfully.');
			redirect('myaccount/studentprofile','refresh');
		}
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function myfavourite($page=0)
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');
		$data['main'] = 'myfavourite';
		$data['websitepagename'] = 'myfavourite';

		$config['base_url'] = site_url('myaccount/myfavourite');
		$config["total_rows"] = $this->myaccount_fm->countbindfavourite();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a>";
		$config["cur_tag_close"] = "</a></li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 1;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["favourite"]=$favourite = $this->myaccount_fm->Getbindfavourite($config["per_page"], $page);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	// --------------------------------- Delete university favourite----------------------------------------

	function deletefavourite($id){
        $favourite = $this->myaccount_fm->detailfavourite($id);

		if(count($favourite))
		{
			$fuserid=$this->session->userdata('fuserid');
			$userid=$favourite['userid'];
				if($fuserid!=$userid)
				{
				   $this->session->set_flashdata('error','You can not delete another user favourite list !');
				   redirect('myaccount/myfavourite','refresh');
				}
			$this->myaccount_fm->deletefavourite($id);
			$this->session->set_flashdata('message','Favourite list deleted successful.');
			redirect('myaccount/myfavourite','refresh');
		}
		else
		{
			redirect('error_page','refresh');
		}

		
	}

// ------------------------------------------------------------------------------------------

	public function myinquiry($page=0)
	{
		$this->CheckLoginVerification();
        $userrole=$this->session->userdata('userrole');
		$fuserid=$this->session->userdata('fuserid');
		$data['main'] = 'myinquiry';
		$data['websitepagename'] = 'myinquiry';

		$config['base_url'] = site_url('myaccount/myinquiry');

		if($userrole==1)
		{
		  $config["total_rows"] = $this->myaccount_fm->countbinduniversityinquiry();
		}
		else
		{
		  $config["total_rows"] = $this->myaccount_fm->countbindinquiry();
		}
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 1;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		if($userrole==1)
		{
		  $data["inquiry"]=$inquiry = $this->myaccount_fm->Getbinduniversityinquiry($config["per_page"], $page);
		}
		else
		{
		  $data["inquiry"]=$inquiry = $this->myaccount_fm->Getbindinquiry($config["per_page"], $page);
		}

		
  
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	// ------------------------------------- Inquiry detail ------------------------------------

	public function detailinquiry($id=0)
	{
		$this->CheckLoginVerification();
        $fuserid=$this->session->userdata('fuserid');

		$flag1=$this->myaccount_fm->Checkuserinquiry($fuserid,$id);

		if($flag1=="true")
		{
			$data['main'] = 'detailinquiry';
			$data['websitepagename'] = 'detailinquiry';
			$data['inquiry'] = $this->myaccount_fm->getinquirybyId($id);
			$university_id=$data['inquiry']['university_id'];
			$user_id=$data['inquiry']['user_id'];
			$applycourse=$data['inquiry']['courseid'];
			$applylocation=$data['inquiry']['locationid'];


			$data['universitydetail']=$this->university_fm->getuniversitydetails($university_id);
			$data['userdetail']=$this->university_fm->getuserdetail($user_id);
			$data['coursedetail']=$this->university_fm->getcoursedetail($applycourse);
		    $data['locationdetail']=$this->university_fm->getlocationdetail($applylocation);
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
		else
		{
			$this->session->set_flashdata('info','In order to show inquiry details, you can not show other user inquiry details.');
			redirect('myaccount/myinquiry','refresh');
		}
	}
	
  // ------------------------------------------------------------------------------------------

  // --------------------------------- Delete user inquiry----------------------------------------

	function deleteinquiry($id){
        $inquiry = $this->myaccount_fm->detailinquiry($id);

		if(count($inquiry))
		{
			$fuserid=$this->session->userdata('fuserid');

			$userrole=$this->session->userdata('userrole');

			if($userrole==1)
			{
				$userid=$inquiry['uniid'];
			}
			else
			{
				$userid=$inquiry['user_id'];
			}
			
			if($fuserid!=$userid)
			{
			   $this->session->set_flashdata('error','You can not delete another user inquiry !');
			   redirect('myaccount/myinquiry','refresh');
			}
			$this->myaccount_fm->deleteinquiry($id);
			$this->session->set_flashdata('message','Inquiry deleted successful.');
			redirect('myaccount/myinquiry','refresh');
		}
		else
		{
			redirect('error_page','refresh');
		}
	}

// ------------------------------------------------------------------------------------------

	function bindstate($value)
		{   
			$data['statename'] = $statename = $this->myaccount_fm->GetbindstateName($value);
			echo "<option Value=''>Select State</option>";
					if (count($data['statename'])>0)
					{ 
						foreach ($data['statename'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['name']?></option>
						<?}
					}
		}


  function bindcity($value)
		{   
			$data['cityname'] = $cityname = $this->myaccount_fm->GetbindcityName($value);
			
			echo "<option Value=''>Select City</option>";
					if (count($data['cityname'])>0)
					{ 
						foreach ($data['cityname'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['name']?></option>
						<?}
					}
		}

    function bindfirstcategory($value)
		{   
			$data['firstcategory'] = $firstcategory = $this->myaccount_fm->Getbindfirstcategory($value);
			echo "<option Value=''>Select First Level Category</option>";
					if (count($data['firstcategory'])>0)
					{ 
						foreach ($data['firstcategory'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['name']?></option>
						<?}
					}
		}

   function bindsecondcategory($value)
		{   
	        $data['secondcategory'] = $secondcategory = $this->myaccount_fm->Getbindsecondcategory($value);
			echo "<option Value=''>Select Second Level Category</option>";
					if (count($data['secondcategory'])>0)
					{ 
						foreach ($data['secondcategory'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['name']?></option>
						<?}
					}
		}


	public function myenquiries()
	{
       
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'myenquiries';
		$data['websitepagename'] = 'myenquiries';
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function productsenquiries($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'productsenquiries';
		$data['websitepagename'] = 'productsenquiries';
       
	   
		$config['base_url'] = site_url('myaccount/productsenquiries');
		$config["total_rows"] = $this->myaccount_fm->countbindproductsenquiries();
		
		
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$data["pagination"]=$this->pagination->create_links();
		 
        $data["productsenquiries"]=$productsenquiries = $this->myaccount_fm->Getbindproductsenquiries($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function productenquirydetail($id=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'productenquirydetail';
		$data['websitepagename'] = 'productenquirydetail';
		$data['enquiry'] = $this->myaccount_fm->getenquirybyId($id);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function suppliersenquiries($page=0)
	{
 
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'suppliersenquiries';
		$data['websitepagename'] = 'suppliersenquiries';
       
	  
		$config['base_url'] = site_url('myaccount/suppliersenquiries');
		$config["total_rows"] = $this->myaccount_fm->countbindsuppliresenquiries();
		
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		
		$data["pagination"]=$this->pagination->create_links();

 
		$data["suppliresenquiries"]=$suppliresenquiries = $this->myaccount_fm->Getbindsuppliresenquiries($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function supplierenquirydetail($id=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'supplierenquirydetail';
		$data['websitepagename'] = 'supplierenquirydetail';
		$data['enquiry'] = $this->myaccount_fm->getsuppliersenquirybyId($id);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function myfeaturedproducts($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'myfeaturedproducts';
		$data['websitepagename'] = 'myfeaturedproducts';

		    $config['base_url'] = site_url('myaccount/myfeaturedproducts');
		    $config["total_rows"] = $this->myaccount_fm->countbindfeaturedproductvalue();
			$config["full_tag_open"] = "<ul>";
			$config["full_tag_close"] = "</ul>";
			$config["num_tag_open"] = "<li>";
			$config["num_tag_close"] = "</li>";
			$config["cur_tag_open"] = "<li class='selected'>";
			$config["cur_tag_close"] = "</li>";
			$config["prev_tag_open"] = "<li class='prev'>";

			$config["prev_tag_close"] = "</li>";
			$config["next_tag_open"] = "<li class='next'>";
			$config["next_tag_close"] = "</li>";
			$config["first_link"] = "<li>&lsaquo; First";
			$config["first_link"] = "</li>";
			$config["last_link"] = "<li>Last &rsaquo;";
			$config["last_link"] = "</li>";	

			$config['per_page'] = 5;
			
			$config['uri_segment'] = 3;
			
			$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["productvalue"]=$productvalue = $this->myaccount_fm->Getbindfeaturedproductvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}
       function change_password()
	{
		$this->CheckLoginVerification();
		$this->data['main'] = 'change_password';
		$this->data['websitepagename'] = 'change_password';
		$this->load->vars($this->data);
		$this->load->view('template/innermaster');
	}

	function updatepassword()
	{
		$this->CheckLoginVerification();
		$this->data['main'] = 'change_password';
		$this->data['websitepagename'] = 'change_password';
		$this->load->vars($this->data);
		$this->load->view('template/innermaster');
		$flag= $this->myaccount_fm->updatepassword();
		//echo $flag;die;
		if($flag=="false")
		{
			$this->session->set_flashdata('passmessage','false');
		}
		else
		{
			//print_R($_POST);die;
			//$this->myaccount_fm->updatepasswordmail();
			$this->session->set_flashdata('passmessage','true');
		}
		redirect('myaccount/change_password','refresh');
	}

	function updatestudentpassword()
	{
		$this->CheckLoginVerification();
		if(isset($_POST['btnsubmit'])) 
		{
		   $flag= $this->myaccount_fm->updatepassword();
			//echo $flag;die;
			if($flag=="false")
			{
				$this->session->set_flashdata('passmessage','false');
			}
			else
			{
				//print_R($_POST);die;
				//$this->myaccount_fm->updatepasswordmail();
				$this->session->set_flashdata('passmessage','true');
			}
		   redirect('myaccount/studentprofile#parentHorizontalTab2','refresh');
		}

	}

	function bindeducation($value)
		{   
			$data['education'] = $education = $this->myaccount_fm->Getbindeducation($value);
			
			echo "<select name='educationid' id='educationid' class='form-control myval'>
					<option Value=''>Select your education</option>";
					if (count($data['education'])>0)
					{ 
						foreach ($data['education'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['education']?></option>
						<?}
					}
			echo "</select>";
		}

	public function buyleadsenquiries($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'buyleadsenquiries';
		$data['websitepagename'] = 'buyleadsenquiries';
       
	    $type="Buy";
		$config['base_url'] = site_url('myaccount/buyleadsenquiries');
		$config["total_rows"] = $this->myaccount_fm->countbindtradeleadsenquiries($type);
		
		
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$data["pagination"]=$this->pagination->create_links();
		 
        $data["buyleadsenquiries"]=$buyleadsenquiries = $this->myaccount_fm->Getbindtradeleadsenquiries($type,$config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function buyleadsenquiriesdetail($id=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'buyleadsenquiriesdetail';
		$data['websitepagename'] = 'buyleadsenquiriesdetail';
		$type="Buy";
		$data['enquiry'] = $this->myaccount_fm->gettradeleadsenquirybyId($id,$type);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function sellleadsenquiries($page=0)
	{
		$fuserid=$this->session->userdata('fuserid');
		$this->CheckLoginVerification();
		$data['main'] = 'sellleadsenquiries';
		$data['websitepagename'] = 'sellleadsenquiries';
       
	    $type="Sell";
		$config['base_url'] = site_url('myaccount/sellleadsenquiries');
		$config["total_rows"] = $this->myaccount_fm->countbindtradeleadsenquiries($type);
		
		
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 5;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$data["pagination"]=$this->pagination->create_links();
		 
        $data["sellleadsenquiries"]=$sellleadsenquiries = $this->myaccount_fm->Getbindtradeleadsenquiries($type,$config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	public function sellleadsenquiriesdetail($id=0)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'sellleadsenquiriesdetail';
		$data['websitepagename'] = 'sellleadsenquiriesdetail';
		$type="Sell";
		$data['enquiry'] = $this->myaccount_fm->gettradeleadsenquirybyId($id,$type);
		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	function bindamount($value)
		{   
			$data['amount'] = $amount = $this->myaccount_fm->Getbindamount($value);

			echo '<div class="col-md-6"><div class="form-group"><label>Amount<span></span></label></br>';
			      if (count($data['amount'])>0)
					{?>
					   <?=$amount['price']?> USD <input type="hidden" class="form-control required" name="chargetotal" value="<?=$amount['price']?>"><input type="hidden" class="form-control required" name="packageid" value="<?=$amount['id']?>">
				  <?}
			echo '</div></div>';
		}

   public function paymentdetail($transaction_id,$hiduserid,$credit_card_type,$packageid)
	{
	    $this->CheckLoginVerification();
		$data['transaction_id'] = $transaction_id;
		$data['hiduserid'] = $hiduserid;
		$data['credit_card_type'] = $credit_card_type;
		$data['packageid'] = $packageid;

		//$data['main'] = 'serviceproviderpaymentdetail';
		//$data['websitepagename'] = 'serviceproviderpaymentdetail';
		//$this->load->vars($data);
		$this->load->view('serviceproviderpaymentdetail',$data);
	}

	public function success()
	{
		$this->CheckLoginVerification();
		//echo "123";
		//die;
		$userid=$_POST["hiduserid"];
		$trackingnumber=$_POST["hidtid"];
		$hidpaymentmethod=$_POST["hidpaymentmethod"];
		$hidpackageid=$_POST["hidpackageid"];
		//$data['main'] = 'serviceprovidersuccess';

		if ($userid>0)
		{
			$this->myaccount_fm->updatepayment($userid,$trackingnumber,$hidpaymentmethod,$hidpackageid);
			$data['websitepagename'] = 'serviceproviderreciept';
			$data['registrationdetail'] = $this->myaccount_fm->getregistrationdetailId($userid);

			//print_r($data['trainingregistrationdetail']);
			//die;
			$data['uuid']=$uuid= $data['registrationdetail']['uuid'];

			$this->session->set_flashdata('message','Thanks for registration.');
			$this->myaccount_fm->ordermail($uuid);
			$this->myaccount_fm->newordermail($uuid);
			redirect('myaccount/receipt/'.$uuid,'refresh');
	
		}
		else
		{
			redirect('myaccount/personalprofile','refresh');
		}
		
		$this->load->vars($data);
		$this->load->view('template/staticmaster');
	}


	public function receipt($uuid)
	{
		$this->CheckLoginVerification();
		$data['main'] = 'serviceproviderreceipt';
		$data['websitepagename'] = 'serviceproviderreceipt';
		if ($uuid!="")
		{
			$orders=$data['orders'] = $this->myaccount_fm->getregistrationByUuid($uuid);
			$data['packagedetail'] = $this->myaccount_fm->GetpackageByid($orders['packageid']);
		}
		else
		{
			redirect('myaccount/serviceproviderpaymentbtoa','refresh');
		}

		$this->load->vars($data);
		$this->load->view('template/staticmaster');
	}

// ----------------------------- upload image brfore crop -----------------------------------

	function upload_image(){
		$this->myaccount_fm->upload_image();
		$imgData = array(
			'crop' => 0
		);
		$this->session->set_userdata($imgData);
	}

	function upload_profilephoto(){
		$this->myaccount_fm->upload_profilephoto();
		$imgData = array(
			'crop' => 0
		);
		$this->session->set_userdata($imgData);
	}

	function upload_editprofilephoto(){
		$file = $this->myaccount_fm->upload_editprofilephoto();
		echo $file;
	}

// ------------------------------------------------------------------------------------------

// --------------------------- open crop image page after upload ----------------------------

	function openCropPage($file_name=""){
		$data['file_name'] = $file_name;
		$this->load->vars($data);
		$this->load->view('cropgallery'); 
	}

	function openCropprofilephotoPage($file_name=""){
		$data['file_name'] = $file_name;
		$this->load->vars($data);
		$this->load->view('cropprofilephoto'); 
	}

	function openeditCropprofilephotoPage($file_name=""){
		$data['file_name'] = $file_name;
		$this->load->vars($data);
		$this->load->view('editcropprofilephoto'); 
	}

// ------------------------------------------------------------------------------------------

// -------------------------------- Crop University's Profile Picture -----------------------------

	function crop() {

		if($this->input->post('x',TRUE)) {

			$X = $this->input->post('x');
			$Y = $this->input->post('y');
			$W = $this->input->post('w');
			$H = $this->input->post('h');
			$source = FCPATH.'userfiles/university_logo/'.$_POST['filename'];    
			$filename = $_POST['filename'];
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $source;
			$config['new_image'] = $source;
			$config['quality'] = '100%';
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $W;
			$config['height'] = $H;
			$config['x_axis'] = $X;
			$config['y_axis'] = $Y;
	 
			$this->load->library('image_lib', $config);
			$this->image_lib->clear();
			$this->image_lib->initialize($config); 
	 
			if (!$this->image_lib->crop()){
				echo $this->image_lib->display_errors();
			}
			$imgData = array(
				'crop' => 1,
			);
			$this->session->set_userdata($imgData);
		}
	}

	function cropprofilephoto() {

		if($this->input->post('x',TRUE)) {

			$X = $this->input->post('x');
			$Y = $this->input->post('y');
			$W = $this->input->post('w');
			$H = $this->input->post('h');
			$source = FCPATH.'userfiles/profilephoto/'.$_POST['filename'];    
			$filename = $_POST['filename'];
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $source;
			$config['new_image'] = $source;
			$config['quality'] = '100%';
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $W;
			$config['height'] = $H;
			$config['x_axis'] = $X;
			$config['y_axis'] = $Y;
	 
			$this->load->library('image_lib', $config);
			$this->image_lib->clear();
			$this->image_lib->initialize($config); 
	 
			if (!$this->image_lib->crop()){
				echo $this->image_lib->display_errors();
			}
			$imgData = array(
				'crop' => 1,
			);
			$this->session->set_userdata($imgData);
		}
	}

	function removewithoutcropphoto()
	{
		$source = FCPATH.'userfiles/profilephoto/withoutcrop/'; 
		$files = glob($source.'*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
			unlink($file); // delete file
		}
	}

	/*function editcropprofilephoto() {

		if($this->input->post('x',TRUE)) {

			$X = $this->input->post('x');
			$Y = $this->input->post('y');
			$W = $this->input->post('w');
			$H = $this->input->post('h');
			$source = FCPATH.'userfiles/profilephoto/withoutcrop/'.$_POST['filename']; 
			$newsource = FCPATH.'userfiles/profilephoto/'.$_POST['filename']; 
			$filename = $_POST['filename'];
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $source;
			$config['new_image'] = $newsource;
			$config['quality'] = '100%';
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $W;
			$config['height'] = $H;
			$config['x_axis'] = $X;
			$config['y_axis'] = $Y;
	 
			$this->load->library('image_lib', $config);
			$this->image_lib->clear();
			$this->image_lib->initialize($config); 
	 
			if (!$this->image_lib->crop()){
				unlink(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['filename']);
				echo $this->image_lib->display_errors();
			}
			else
			{
				unlink(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['filename']);

                $fuserid=$this->session->userdata('fuserid');
				$userdata=$this->myaccount_fm->getuserprofilephotobyid($fuserid);

				if($userdata['profilephoto']!="" || $userdata['profilephoto']!=NULL)
				{
					$old_image = $userdata['profilephoto'];
					unlink(FCPATH.'/userfiles/profilephoto/'.$old_image);
				}

			    $data1['profilephoto'] = $_POST['filename'];

				$this->db->where('userid', $fuserid);
				$this->db->update('tbl_registration',$data1);
			}

			$imgData = array(
				'crop' => 1,
			);
			$this->session->set_userdata($imgData);
		}
	}*/

	function editcropprofilephoto()
	{	
		if($this->input->post('x') >= 0)
		{
			$X = $this->input->post('x');
			$Y = $this->input->post('y');
			$W = $this->input->post('w');
			$H = $this->input->post('h');
			$source = FCPATH.'userfiles/profilephoto/withoutcrop/'.$_POST['filename'];
			$source1 = FCPATH.'userfiles/profilephoto/'.$_POST['filename'];
			$filename = $_POST['filename'];

			$config['image_library'] = 'gd2';
			$config['source_image'] = $source;
			$config['new_image'] = $source1;
			$config['quality'] = '100%';
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $W;
			$config['height'] = $H;
			$config['x_axis'] = $X;
			$config['y_axis'] = $Y;

			$this->load->library('image_lib', $config);
			$this->image_lib->clear();
			$this->image_lib->initialize($config);

			if (!$this->image_lib->crop()){
				echo $this->image_lib->display_errors();
			}
			else
			{
				$fuserid=$this->session->userdata('fuserid');
				$userdata=$this->myaccount_fm->getuserprofilephotobyid($fuserid);

				if($userdata['profilephoto']!="" || $userdata['profilephoto']!=NULL)
				{
					$old_image = $userdata['profilephoto'];
					unlink(FCPATH.'/userfiles/profilephoto/'.$old_image);
				}
				unlink(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['filename']);

			    $data1['profilephoto'] = $_POST['filename'];

				$this->db->where('userid', $fuserid);
				$this->db->update('tbl_registration',$data1);

				echo $_POST['filename'];
			}
		}
	}

	function removeimage()
	{
		if(isset($_POST['old_image']) && $_POST['old_image']!="")
		{
			UNLINK(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['old_image']);
		}
		echo 0;
	}

// ------------------------------------------------------------------------------------------

// --------------------------- check if image is cropped or not -----------------------------
	
	function isImageCrop(){
		if($this->session->userdata('crop')==1){
			echo 1;
		}else{
			UNLINK(FCPATH.'/userfiles/university_logo/'.$_POST['image_name']);
			echo 0;
		}
	}

	function isImageprofilephotoCrop(){
		if($this->session->userdata('crop')==1){
			echo 1;
		}else{
			UNLINK(FCPATH.'/userfiles/profilephoto/'.$_POST['image_name']);
			echo 0;
		}
	}

// ------------------------------------------------------------------------------------------


	public function mycourses($page=0)
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');
		$id=$this->session->userdata('fuuid');
		$data['universityid'] =$id;
		$data['pop_count'] = $this->myaccount_fm->get_tot_pop_count($id);
		$data['main'] = 'mycourses';
		$data['websitepagename'] = 'mycourses';

		$config['base_url'] = site_url('myaccount/mycourses');
		$config["total_rows"] = $this->myaccount_fm->countbindcoursevalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 10;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["coursevalue"]=$coursevalue = $this->myaccount_fm->Getbindcoursevalue($config["per_page"], $page);
		$data['alleligibility'] = $this->myaccount_fm->get_all_eligibility();

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}


// ------------------------------------- University course Date ------------------------------------
function coursestartdate($id=0)
	{
		$data['main'] = 'coursestartdate';
		$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($id);
		$data['intakes'] = $this->myaccount_fm->course_intakes($id);
		$data['websitepagename'] = 'mycourses';
		$this->load->vars($data);
		$this->load->view('admin/template/popupmaster');
	}

 function changecoursestartdate()
	{
		
		if($this->input->post('startdate'))
		{
			$this->myaccount_fm->upadatecoursedate();
			//redirect('admins/university/manageuniversitycourses/'.$_POST['universityid'],'refresh');
		}
	}

// ------------------------------------- Bind Course ----------------------------
    function bindcourse($value)
	{   
		$data['coursename'] = $coursename = $this->myaccount_fm->getallcourses($value);
		echo "<option Value=''>Select Course</option>";
				if (count($data['coursename'])>0)
				{ 
					foreach ($data['coursename'] as $key => $list)
					{?>
						<option Value="<?=$list['id']?>" ><?=$list['title']?></option>
					<?}
				}
	}

	// ------------------------------------- Bind Currencytype ----------------------------
    function bindcurrencytype($value)
	{   
		$data['currencytype'] = $currencytype = $this->myaccount_fm->getcurrencytype($value);
		echo "(In ";
				if (count($data['currencytype'])>0)
				{
					echo $currencytype['currencytype'].")";
			    }
	}

  // ------------------------------------------------------------------------------------------



	function getEligibilityValues()
	{
		$check = $this->myaccount_fm->checkEligibility();

		if(strcasecmp($check['title'],"other")==0)
		{
			echo "other";
		}
		else
		{
			$values = $this->myaccount_fm->getEligibilityValues();
		
			$data = "<option value=''>Select</option>";
			foreach($values as $row)
			{
				$data .= "<option value=".$row['id'].">".$row['value']."</option>";
			}
			echo $data;
		}
	}

// ------------------------------------------------------------------------------------------

// --------------------------------- Create New university Course------------------------------------

	function createuniversitycourse(){
		if(isset($_POST['universityid']))
		{
			$flag = $this->myaccount_fm->newCheckUniversitycourse();
			if(count($flag)<count($_POST['locationid']))
			{
				$this->myaccount_fm->createuniversitycourse($flag);
				//$this->university_sendMailbyadmin();
				$this->session->set_flashdata('message','Transaction Successful !');
				redirect('myaccount/mycourses','refresh');
			
			}
			elseif(count($flag)==count($_POST['locationid']))
			{
				$this->session->set_flashdata('error','Course already exist !');
				redirect('myaccount/mycourses','refresh');
			}
		}
	}

// ------------------------------------------------------------------------------------------

// --------------------------------- Edit University course -----------------------------------------

	function edituniversitycourse($id=0){

       
		if($this->input->post('id'))
		{
			$this->myaccount_fm->edituniversitycourse();
			$this->session->set_flashdata('message','Transaction Successful.');
			redirect('myaccount/mycourses','refresh');
		}
		else
		{
			$data['title'] = "Edit university course";	
			$data['main'] = 'updateuniversitycourse';
			$uni_uuid = $this->session->userdata('fuuid');
			$data['pop_count'] = $this->myaccount_fm->get_tot_pop_count($uni_uuid);
			$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($id);
			$data['eligibility'] = $this->myaccount_fm->course_eligibility($id);
			$data['process'] = $this->myaccount_fm->course_process($id);
			$data['subjects'] = $this->myaccount_fm->course_subjects($id);

			$fuuid=$this->session->userdata('fuuid');
			$universityid=$data['universitycourse']['universityid'];

			if($fuuid!=$universityid)
			{
			   $this->session->set_flashdata('error','You can not update another university course !');
               redirect('myaccount/mycourses','refresh');
			}

			$data['websitepagename'] = 'mycourses';	
			$this->load->vars($data);
			$this->load->view('template/innermaster'); 
		}  
	}
// ------------------------------------------------------------------------------------------

// --------------------------------- Delete university course----------------------------------------

	function deleteuniversitycourse($id){
        $universitycourse = $this->myaccount_fm->detailuniversitycourse($id);

		$fuuid=$this->session->userdata('fuuid');
		$universityid=$universitycourse['universityid'];
			if($fuuid!=$universityid)
			{
			   $this->session->set_flashdata('error','You can not delete another university course !');
               redirect('myaccount/mycourses','refresh');
			}
		$this->myaccount_fm->deleteuniversitycourse($id);
		$this->session->set_flashdata('message','University Course deleted successful.');
		redirect('myaccount/mycourses','refresh');
	}

// ------------------------------------------------------------------------------------------

// ------------------------------------- university course detail ------------------------------------

	function detailuniversitycourse($id){
		$data['title'] = "University course Detail";	
		$data['main'] = 'detailuniversitycourse';
		$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($id);
		$data['intakes'] = $this->myaccount_fm->course_intakes($id);
		$data['eligibility'] = $this->myaccount_fm->course_eligibility($id);
		$data['process'] = $this->myaccount_fm->course_process($id);
		$data['subjects'] = $this->myaccount_fm->course_subjects($id);

		$fuuid=$this->session->userdata('fuuid');
		$universityid=$data['universitycourse']['universityid'];

		if($fuuid!=$universityid)
		{
		   $this->session->set_flashdata('error','You can not show another university course details!');
		   redirect('myaccount/mycourses','refresh');
		}
		$data['websitepagename'] = 'mycourses';	
		$this->load->vars($data);
		$this->load->view('template/innermaster'); 
	}

// ------------------------------------------------------------------------------------------

// ------------------------------------- Manage university course  fees detail ----------------------------
	function manageuniversitycoursesfees($id=0,$page=0)
		{
			$this->CheckLoginVerification();

			$fuserid=$this->session->userdata('fuserid');
			$fuuid=$this->session->userdata('fuuid');
			$data['uni_courseid'] =$uni_courseid=$id;
			$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($id);

			$universityid=$data['universitycourse']['universityid'];
			if($fuuid!=$universityid)
			{
			   $this->session->set_flashdata('error','You can not add another university course fees!');
			   redirect('myaccount/mycourses','refresh');
			}

			$config['base_url'] = site_url('myaccount/manageuniversitycoursesfees')."/".$uni_courseid;
			$config["total_rows"] = $this->myaccount_fm->countbindcoursefeesvalue($uni_courseid);
			$config["full_tag_open"] = "<ul>";
			$config["full_tag_close"] = "</ul>";
			$config["num_tag_open"] = "<li>";
			$config["num_tag_close"] = "</li>";
			$config["cur_tag_open"] = "<li class='selected'>";
			$config["cur_tag_close"] = "</li>";
			$config["prev_tag_open"] = "<li class='prev'>";

			$config["prev_tag_close"] = "</li>";
			$config["next_tag_open"] = "<li class='next'>";
			$config["next_tag_close"] = "</li>";
			$config["first_link"] = "<li>&lsaquo; First";
			$config["first_link"] = "</li>";
			$config["last_link"] = "<li>Last &rsaquo;";
			$config["last_link"] = "</li>";	

			$config['per_page'] = 10;
			
			$config['uri_segment'] = 4;
			
			$this->pagination->initialize($config);

			$data["pagination"]=$this->pagination->create_links();

			$data["coursefeesvalue"]=$coursefeesvalue = $this->myaccount_fm->Getbindcoursefeesvalue($uni_courseid,$config["per_page"], $page);

            $data['title'] = "Manage University Courses Fees";
			$data['main'] = 'manageuniversitycoursesfees';
			$data['websitepagename'] = 'mycourses';
			$this->load->vars($data);
			$this->load->view('template/innermaster');
		}
// ------------------------------------------------------------------------------------------

// --------------------------------- Create New university Course fees------------------------------------

	function createuniversitycoursefees(){
		if(isset($_POST['uni_courseid']))
		{
			$flag = $this->myaccount_fm->newCheckUniversitycoursefeestitle();
			if($flag == 0)
			{
				$this->myaccount_fm->createuniversitycoursefees();
				//$this->university_sendMailbyadmin();
				$this->session->set_flashdata('message','Transaction Successful !');
				redirect('myaccount/manageuniversitycoursesfees/'.$_POST['uni_courseid'],'refresh');
			
			}
			else
			{
				$this->session->set_flashdata('error','Title already exist !');
				redirect('myaccount/manageuniversitycoursesfees/'.$_POST['uni_courseid'],'refresh');
			
			}
			
		}
	}

// ------------------------------------------------------------------------------------------

	function checkunique()
		{
			$flag=$this->myaccount_fm->checkunique();
			echo $flag;
		
		}

// --------------------------------- Edit University course Fees-----------------------------------------

	function edituniversitycoursefees($id=0){

		if($this->input->post('id'))
		{
			$flag=$this->myaccount_fm->checkuniquebyid();
			if($flag == "")
			{
				$this->myaccount_fm->edituniversitycoursefees();
			    $this->session->set_flashdata('message','Transaction Successful.');
			    redirect('myaccount/manageuniversitycoursesfees/'.$_POST['uni_courseid'],'refresh');
			}
			else
			{
				$this->session->set_flashdata('error','This Title is already exists.');
				redirect('myaccount/edituniversitycoursefees/'.$this->input->post('id'),'refresh');
			}	
		}
		else
		{
			$data['title'] = "Edit university course fees";	
			$data['main'] = 'updateuniversitycoursefees';
			$data['universitycoursefeestitle']=$universitycoursefeestitle= $this->myaccount_fm->detailuniversitycoursefees($id);
			$data['feesstructure'] = $this->myaccount_fm->course_feesstructure($id);

			if(count($universitycoursefeestitle))
			{
				$fuuid=$this->session->userdata('fuuid');
				$uni_courseid=$universitycoursefeestitle['uni_courseid'];
				$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($uni_courseid);

				$universityid=$data['universitycourse']['universityid'];
				if($fuuid!=$universityid)
				{
				   $this->session->set_flashdata('error','You can not edit another university course fees!');
				   redirect('myaccount/manageuniversitycoursesfees/'.$universityid,'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error','You can not edit another university course fees!');
				redirect('myaccount/mycourses/','refresh');
			}
			
			$data['websitepagename'] = 'mycourses';
			$this->load->vars($data);
			$this->load->view('template/innermaster');   
		}  
	}
// ------------------------------------------------------------------------------------------

function checkuniquebyid()
	{
		$flag=$this->myaccount_fm->checkuniquebyid();
		echo $flag;
	}

// ------------------------------------- university course Fees detail ------------------------------------

	function detailuniversitycoursefees($id){
		$data['title'] = "University course fees Detail";	
		$data['main'] = 'detailuniversitycoursefees';
		$data['universitycoursefeestitle'] =$universitycoursefeestitle= $this->myaccount_fm->detailuniversitycoursefees($id);
		$data['feesstructure'] = $this->myaccount_fm->course_feesstructure($id);

		if(count($universitycoursefeestitle))
			{
				$fuuid=$this->session->userdata('fuuid');
				$uni_courseid=$universitycoursefeestitle['uni_courseid'];
				$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($uni_courseid);

				$universityid=$data['universitycourse']['universityid'];
				if($fuuid!=$universityid)
				{
				   $this->session->set_flashdata('error','You can not show another university course fees!');
				   redirect('myaccount/manageuniversitycoursesfees/'.$universityid,'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error','You can not show another university course fees!');
				redirect('myaccount/mycourses/','refresh');
			}

		$data['websitepagename'] = 'mycourses';
		$this->load->vars($data);
		$this->load->view('template/innermaster');   
	}

// ------------------------------------------------------------------------------------------

// --------------------------------- Delete university course fees----------------------------------------

	function deleteuniversitycoursefees($id){
        $universitycoursefees = $this->myaccount_fm->detailuniversitycoursefees($id);

		if(count($universitycoursefees))
			{
				$fuuid=$this->session->userdata('fuuid');
				$uni_courseid=$universitycoursefees['uni_courseid'];
				$data['universitycourse'] = $this->myaccount_fm->detailuniversitycourse($uni_courseid);

				$universityid=$data['universitycourse']['universityid'];
				if($fuuid!=$universityid)
				{
				   $this->session->set_flashdata('error','You can not delete another university course fees!');
				   redirect('myaccount/manageuniversitycoursesfees/'.$universityid,'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error','You can not delete another university course fees!');
				redirect('myaccount/mycourses/','refresh');
			}
		$this->myaccount_fm->deleteuniversitycoursefees($id);
		$this->session->set_flashdata('message','University Course Fees deleted successful.');
		redirect('myaccount/manageuniversitycoursesfees/'.$universitycoursefees['uni_courseid'],'refresh');
	}

// ------------------------------------------------------------------------------------------

// ----------------------------My Locations Start---------------------------------------------------------


	public function mylocations($page=0)
	{
		$this->CheckLoginVerification();

		$fuserid=$this->session->userdata('fuserid');
		$id=$this->session->userdata('fuuid');
		$data['universityid'] =$id;

		$data['main'] = 'mylocations';
		$data['websitepagename'] = 'mylocations';

		$config['base_url'] = site_url('myaccount/mylocations');
		$config["total_rows"] = $this->myaccount_fm->countbindlocationvalue();
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='selected'>";
		$config["cur_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='prev'>";

		$config["prev_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li class='next'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
		$config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";

		$config['per_page'] = 10;
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

        $data["pagination"]=$this->pagination->create_links();

		$data["locationvalue"]=$locationvalue = $this->myaccount_fm->Getbindlocationvalue($config["per_page"], $page);

		$this->load->vars($data);
		$this->load->view('template/innermaster');
	}

	// ---------------------------- check duplicate campus name for add --------------------------------
	
	function check_campusname()
	{
		$flag = $this->myaccount_fm->check_campusname();
		echo $flag;
	}

    // --------------------------------- Create New university Location ------------------------------------

	function createuniversitylocation(){
		if(isset($_POST['universityid']))
		{
			$flag = $this->myaccount_fm->newCheckUniversitylocation();
			if($flag == 0)
			{
				$this->myaccount_fm->createuniversitylocation();
				//$this->university_sendMailbyadmin();
				$this->session->set_flashdata('message','Transaction Successful !');
				redirect('myaccount/mylocations','refresh');
			
			}
			else
			{
				$this->session->set_flashdata('error','Combination of this location is already exist !');
				redirect('admins/mylocations','refresh');
			
			}
			
		}
	}

	// ------------------------------------------------------------------------------------------

	// --------------------------------- Edit University Location -----------------------------------------

		function edituniversitylocation($id=0){

		   $data['universitylocation']=$universitylocation= $this->myaccount_fm->detailuniversitylocation($id);

		   if(count($universitylocation))
			{
			   if($this->input->post('id'))
				{
					$this->myaccount_fm->edituniversitylocation();
					$this->session->set_flashdata('message','Transaction Successful.');
					redirect('myaccount/mylocations','refresh');
				}
				else
				{
					$data['title'] = "Edit university location";	
					$data['main'] = 'updateuniversitylocation';

					$fuuid=$this->session->userdata('fuuid');
					$universityid=$data['universitylocation']['universityid'];

					if($fuuid!=$universityid)
					{
					   $this->session->set_flashdata('error','You can not update another university location !');
					   redirect('myaccount/mylocations','refresh');
					}

					$data['websitepagename'] = 'mylocations';	
					$this->load->vars($data);
					$this->load->view('template/innermaster'); 
				}  
			}
			else
			{
				$this->session->set_flashdata('error','You can not update another university location !');
			    redirect('myaccount/mylocations','refresh');
			}
			
		}
	// ------------------------------------------------------------------------------------------

	// --------------------------------- Delete university location----------------------------------------

	function deleteuniversitylocation($id){
        $universitylocation = $this->myaccount_fm->detailuniversitylocation($id);
        if(count($universitylocation))
		{
			$fuuid=$this->session->userdata('fuuid');
			$universityid=$universitylocation['universityid'];
			$locationid=$universitylocation['id'];
				if($fuuid!=$universityid)
				{
				   $this->session->set_flashdata('error','You can not delete another university location !');
				   redirect('myaccount/mylocations','refresh');
				}
			$this->myaccount_fm->deleteuniversitylocation($locationid);
			$this->session->set_flashdata('message','University Location deleted successful.');
			redirect('myaccount/mylocations','refresh');
		}
		else
		{
			$this->session->set_flashdata('error','You can not delete another university location !');
			redirect('myaccount/mylocations','refresh');
		}
	}

    // ------------------------------------------------------------------------------------------

	// ------------------------------------- university Location detail ------------------------------------

	function detailuniversitylocation($id){

		$data['universitylocation']=$universitylocation= $this->myaccount_fm->detailuniversitylocation($id);

		   if(count($universitylocation))
			{
				$data['title'] = "University Location Detail";	
				$data['main'] = 'detailuniversitylocation';

				$fuuid=$this->session->userdata('fuuid');
				$universityid=$data['universitylocation']['universityid'];

				if($fuuid!=$universityid)
				{
				   $this->session->set_flashdata('error','You can not show another university location details!');
				   redirect('myaccount/mylocations','refresh');
				}
				$data['websitepagename'] = 'mylocations';	
				$this->load->vars($data);
				$this->load->view('template/innermaster'); 
			}
		  else
			{
				$this->session->set_flashdata('error','You can not show another university location details!');
			    redirect('myaccount/mylocations','refresh');
			}
	}

    // ------------------------------------------------------------------------------------------

	// ---------------------------- check duplicate campus name for edit --------------------------------

		function check_campusname_edit()
		{
			$flag = $this->myaccount_fm->check_campusname_edit();
			echo $flag;
		}

	// ------------------------------------------------------------------------------------------

	// ------------------------------------- Bind Eligibility List ----------------------------

	function bind_eligibility()
	{
		$data = $this->myaccount_fm->get_all_eligibility();

		$msg = "<option value=''>Select</option>";
		if(count($data))
		{
			foreach($data as $dataList)
			{
				$msg .= "<option value='".$dataList['id']."'>".$dataList['title']."</option>";
			}
		}
		echo $msg;
	}

   // --------------------------------------------------------------------------------------------------

   function binddesiredcourse($value)
		{   
			$data['desiredcourse'] = $desiredcourse = $this->myaccount_fm->GetbinddesiredcourseName($value);
			
			echo "<option Value=''>Desired Course</option>";
					if (count($data['desiredcourse'])>0)
					{ 
						foreach ($data['desiredcourse'] as $key => $list)
						{?>
							<option Value="<?=$list['id']?>" ><?=$list['title']?></option>
						<?}
					}
		}
}