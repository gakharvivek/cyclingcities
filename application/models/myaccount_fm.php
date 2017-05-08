<?php
class myaccount_fm extends CI_Model
{

	function getallcountryname()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from countries order by name asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function getallindiastate()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from states where country_id="101" order by name asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function getallstatename()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from states order by name asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function GetbindstateName($value)
	{
		$data = array();
		$Q = $this->db->select('* from states where country_id="'.$value.'" order by name asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function GetbindcityName($value)
	{
		$data = array();
		$Q = $this->db->select('* from cities where state_id="'.$value.'" order by name asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	
	function GetstateNameById($value)
	{
		$Q = $this->db->query('select name from states where id="'.$value.'"');
		$data = $Q->row_array();
		$data = $data['name'];
		return $data;

	}
	
	function GetcityNameById($value)
	{
		$Q = $this->db->query('select name from cities where id="'.$value.'"');
		$data = $Q->row_array();
		$data = $data['name'];
		return $data;
	}


	function get_tot_pop_count($uni_uuid)
	{
		$Q = $this->db->query("SELECT COUNT(id)as tot_pop FROM tbl_university_courses WHERE universityid='".$uni_uuid."' AND ispopular=1");
		$data = $Q->row_array();
		$data = $data['tot_pop'];
		return $data;
	}

	function checkEligibilityById($id)
	{
		$Q = $this->db->query("SELECT title FROM tbl_eligibilitymaster WHERE id=".$id."");
		return $Q->row_array();
	}

	function getEligibilityValuesById($id)
	{
		$Q = $this->db->query("SELECT * FROM tbl_eligibility_values WHERE eligibility_id=".$id."");
		return $Q->result_array();
	}

	function getuserDatabyid($id)
	{
		$data = array();

		$roleid =0;
		$Q = $this->db->query('SELECT roleid FROM tbl_user where id="'.$id.'"');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$roleid = $row['roleid'];
			}
		}

		if($roleid==1)
		{
			$Q = $this->db->query('SELECT *,(select roleid from tbl_user where id=tbl_university_registration.userid)as roleid FROM tbl_university_registration where userid="'.$id.'"');
		}
		else
		{
			$Q = $this->db->query('SELECT *,(select countryname from tbl_countrymaster where id=tbl_registration.preferredcountryid)as countryname,(select title from tbl_streammaster where id=tbl_registration.educationinterest)as streamname,(select title from tbl_coursesmaster where id=tbl_registration.desiredcourse)as coursename,(select roleid from tbl_user where id=tbl_registration.userid)as roleid FROM tbl_registration where userid="'.$id.'"');
		}

	  if ($Q->num_rows() > 0)
	  {
	   $data = $Q->row_array();
	  }
	  $Q->free_result();
	  return $data;
    }

	function checkvalidateusername($email,$fuserid)
	{
		$data = array();
		$Q = $this->db->query('SELECT email FROM tbl_registration where email="'.$email.'" and userid !="'.$fuserid.'"');
		if ($Q->num_rows() > 0)
		{
			return "false";
		}
		else
		{
			return "true";
		}
	}

	function udateuniversitypersonalprofile($fuserid)
	{
		$data = array(
					'roleid' => $_POST['roleid'],
				);

		$this->db->where('id', $fuserid);
		$this->db->update('tbl_user',$data);


        if($_POST['country_code']!='')
		{
			$contactno = $_POST['country_code'].'-'.$_POST['contactno'];
		}
		else
		{
			$contactno = $_POST['contactno'];
		}

		$data1 = array(
			   'name' => $_POST['name'],
			   'universityname' => $_POST['universityname'],
			   'email' => $_POST['email'],
			   'phone' => $contactno,
			   //'city' => $_POST['cityid'],
			   //'state' => $_POST['stateid'],
			   //'country' => $_POST['countryid'],
			   //'zipcode' => $_POST['userzipcode']
		  );

		$this->db->where('userid', $fuserid);
		$this->db->update('tbl_university_registration',$data1);

	}

	function udatepersonalprofile($fuserid)
	{
		$data = array(
					'roleid' => $_POST['roleid'],
				);

		$this->db->where('id', $fuserid);
		$this->db->update('tbl_user',$data);



		$birthdate=implode("-", array_reverse(explode("/", $_POST['dob'])));

        if($_POST['country_code']!='')
		{
			$contactno = $_POST['country_code'].'-'.$_POST['contactno'];
		}
		else
		{
			$contactno = $_POST['contactno'];
		}

		//$educationinterest = $_POST['educationinterest'];
		//$desiredcourse = $_POST['desiredcourse'];

		$data1 = array(
			   'fname' => $_POST['fname'],
			   'lname' => $_POST['lname'],
			   'email' => $_POST['email'],
			   'contactno' => $contactno,
			   'birthdate' => $birthdate,
			   //'gender' => $_POST['gender'],
		       //'educationinterest' => $educationinterest,
			   //'desiredcourse' => $desiredcourse,
			   'usercity' => $_POST['cityid'],
			   'userstate' => $_POST['stateid'],
			   'usercountry' => $_POST['countryid'],
			   'userzipcode' => $_POST['userzipcode'],
			   'lastpassedcourse' => ($_POST['lastpassedcourse']),
			   'address' => ($_POST['address'])
		  );


		if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			$old_image = $_POST['old_image'];
		}else{
			$old_image = "";
		}

	    if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			$data1['profilephoto'] = $_POST['old_image'];
			if($_POST['profilephoto1']!='')
			{
				unlink(FCPATH.'/userfiles/profilephoto/'.$_POST['profilephoto1']);
			}
			
		}

		$this->db->where('userid', $fuserid);
		$this->db->update('tbl_registration',$data1);

	}

	function udateeducationpreferences($fuserid)
	{
		
		$educationinterest = $_POST['educationinterest'];
		$desiredcourse = $_POST['desiredcourse'];
		$preferredcountryid = $_POST['preferredcountryid'];
		$expectedyear = $_POST['expectedyear'];

		$data1 = array(
			   
		       'educationinterest' => $educationinterest,
			   'desiredcourse' => $desiredcourse,
			   'preferredcountryid' => $preferredcountryid,
			   'expectedyear' => $expectedyear
			 
		  );

		$this->db->where('userid', $fuserid);
		$this->db->update('tbl_registration',$data1);

	}

	function udateuniversityprofile($fuserid)
	{
		if($_POST['about_university']!="" || $_POST['about_university']!=NULL){
			$about_university = $_POST['about_university'];
		}else{
			$about_university = "";
		}

		if($_POST['website']!="" || $_POST['website']!=NULL){
			$website = $_POST['website'];
		}else{
			$website = "";
		}


		if($_POST['international_students']!='')
		{
			$international_students = $_POST['international_students'];
		}
		else
		{
			$international_students = 0;
		}

		if($_POST['indian_students']!='')
		{
			$indian_students = $_POST['indian_students'];
		}
		else
		{
			$indian_students = 0;
		}

		if($_POST['university_rank']!='')
		{
			$university_rank = $_POST['university_rank'];
		}
		else
		{
			$university_rank = 0;
		}

		$established_year = implode("-", array_reverse(explode("/", $_POST['established_year'])));

		$data = array(
			'name' => $_POST['name'],
			'universityname' => $_POST['universityname'],
			'website' => $website,
			'type'	=> $_POST['type'],
			'size' => $_POST['size'],
			'international_students' => $international_students,
			'indian_students' => $indian_students,
			'established_year' => $established_year,
			'refund_policy' => $_POST['refund_policy'],
			'source_link' => $_POST['source_link'],
			'applicationfees' => $_POST['applicationfees'],
			'university_remark'	=> $_POST['university_remark'],
			'university_rank'	=> $university_rank,
			'about_university'	=> $_POST['about_university'],
			'research_citation' => $_POST['research_citation'],
			'notable_alumni'	=> $_POST['notable_alumni'],
			'times_ranking'		=> $_POST['times_ranking'],
			'qs_ranking'		=> $_POST['qs_ranking']
		);

		if($_FILES['university_logo']['name']!="" || $_FILES['university_logo']['name']!=NULL){

		   $config['upload_path'] = './userfiles/university_logo/large/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('university_logo')){
				$error = array('warning' =>  $this->upload->display_errors());
				echo $error;
		   }else{
			   $upload_data = $this->upload->data();

			   $resize_conf = array
			   (
					'source_image'  => $upload_data['full_path'], 
					'new_image'		=> realpath('userfiles/university_logo').'/'.$upload_data['file_name'],
					'width'         => 262,
					'height'        => 196,
					'master_dim'=>'width'
				);

				$this->load->library('image_lib', $resize_conf);
				$this->image_lib->clear();	
				$this->image_lib->initialize($resize_conf);
				
				if ( ! $this->image_lib->resize())
				{
				   echo $error['resize'][] = $this->image_lib->display_errors();
				}
				else
				{
					$data['university_logo'] = $upload_data['file_name'];
					UNLINK(FCPATH.'/userfiles/university_logo/large/'.$upload_data['file_name']);

					if(isset($_POST['university_logo1']) && $_POST['university_logo1']!="")
					{
						UNLINK(FCPATH.'/userfiles/university_logo/'.$_POST['university_logo1']);
					}
				}
		   }
		}

		if($_FILES['cover_pic']['name']!="" || $_FILES['cover_pic']['name']!=NULL){

		   $config['upload_path'] = './userfiles/university_cover/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('cover_pic')){
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',$error);
				redirect('admins/university/edit/'.$_POST['id'],'refresh');
		   }else{
			   $upload_data = $this->upload->data();
			   $data['cover_pic'] = $upload_data['file_name'];

			   if($_POST['cover_pic1']!="" || $_POST['cover_pic1']!=NULL){
					unlink(FCPATH.'/userfiles/university_cover/'.$_POST['cover_pic1']);
			   }
		   }
		}

		if($_FILES['university_brochure']['name']!="" || $_FILES['university_brochure']['name']!=NULL){

		   $config['upload_path'] = './userfiles/university_brochure/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('university_brochure')){
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',$error);
				redirect('admins/university/index','refresh');
		   }else{
			   $upload_data = $this->upload->data();
			   $data['university_brochure'] = $upload_data['file_name'];
			   if($_POST['university_brochure1']!="" || $_POST['university_brochure1']!=null){
					unlink(FCPATH.'/userfiles/university_brochure/'.$_POST['university_brochure1']);
			   }
		   }
		}

		$slugconfig = array(
			'table' => 'tbl_university_registration',
			'id' => 'id',
			'field' => 'slug',
			'title' => 'universityname',
			'replacement' => 'dash' // Either dash or underscore
		);
		$this->load->library('slug',$slugconfig);
		$data['slug'] = $this->slug->create_uri($_POST['universityname'],$_POST['id']);

		$this->db->where('userid', $fuserid);
		$this->db->update('tbl_university_registration',$data);
		
		$this->db->WHERE('university_id',$_POST['id']);
		$this->db->DELETE('tbl_university_faculties');
		
		foreach($_POST['faculties'] as $facultyList)
		{
			$facData = array(
				'university_id' => $_POST['id'],
				'faculty_id'	=> $facultyList
			);

			$this->db->INSERT('tbl_university_faculties',$facData);
		}

		$this->db->WHERE('university_id',$_POST['id']);
		$this->db->DELETE('tbl_university_recognition');

		if(count($_POST['recognition']) > 0)
		{
			foreach($_POST['recognition'] as $recognitionRow)
			{
				$Q = $this->db->query("SELECT id FROM tbl_university_recognition WHERE recognition='".$recognitionRow."' and university_id='".$_POST['id']."'");
				$count = $Q->num_rows();

				if($count == 0)
				{
					$recogData = array(
						'university_id'	=> $_POST['id'],
						'recognition'	=> $recognitionRow
					);
					$this->db->INSERT("tbl_university_recognition",$recogData);
				}
			}
		}

		
	}

	function getAllUniversities($fuserid)
	{
		if($fuserid==0)
		{
			$Q = $this->db->query("SELECT id,universityname FROM tbl_university_registration WHERE isblock=0 AND userstatus=1");
		}
		else
		{
			$Q = $this->db->query("SELECT id,universityname FROM tbl_university_registration WHERE isblock=0 AND userstatus=1 AND userid!='".$fuserid."'");
		}
		return $Q->result_array();
	}

	function getAllUniversitySimUni($fuserid)
	{
		$Q = $this->db->query("SELECT * FROM tbl_similar_university WHERE university_id = (SELECT id FROM tbl_university_registration WHERE userid='".$fuserid."')");
		return $Q->result_array();
	}

	function udatestudentprofile($fuserid)
	{
		
		$data = array(
			'fname' => ($_POST['fname']),
			'lname' => ($_POST['lname']),
			'address' => ($_POST['address']),
			'lastpassedcourse' => ($_POST['lastpassedcourse']),
			'intrestedcourse' => ($_POST['intrestedcourse']),
			'preferredcountryid' => ($_POST['preferredcountryid'])
		);

		if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			$old_image = $_POST['old_image'];
		}else{
			$old_image = "";
		}

	    if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			$data['profilephoto'] = $_POST['old_image'];
			if($_POST['profilephoto1']!='')
			{
				unlink(FCPATH.'/userfiles/profilephoto/'.$_POST['profilephoto1']);
			}
			
		}

			
		$this->db->where('userid', $fuserid);
		$this->db->update('tbl_registration',$data);
	    
	}

	function DeleteImages($imagename)
	{
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/companylogo/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH.'/userfiles/companylogo/small/'.$imagename);
		}
	}

	function DeleteproductImages($imagename)
	{
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/productimage/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH.'/userfiles/productimage/small/'.$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/productimage/medium/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/productimage/large/".$imagename);
		}
	}

	function DeleteproductImagestable($imagename)
	{
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH.'/userfiles/moreproductimage/small/'.$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/medium/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/large/".$imagename);
		}
	}

	function DeletetradeImages($imagename)
	{
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/tradeimage/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH.'/userfiles/tradeimage/small/'.$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/tradeimage/medium/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/tradeimage/large/".$imagename);
		}
	}


	function Getbindcategorydata()
	{
		$data = array();
		$Q = $this->db->select('id, name,(select name from tbl_categorymaster as ca1 where ca1.id IN (select cat from tbl_categorymaster where ca1.id=ca.cat))as name1,(select name from tbl_categorymaster as ca1 where ca1.id IN (select cat from tbl_categorymaster where id=ca.cat))as name2 from tbl_categorymaster as ca where isactive=1 and (rightextent - leftextent = "1") order by id desc');


		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function getallcountry()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_countrymaster where universitycountry=1 order by countryname asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}



	

	function addservices($services,$fuserid)
	{
		$cnt=count($services);
       // echo $cnt;
		//exit();
		for ($i = 0; $i < $cnt; $i++)
		{
			if($services[$i]!='')
			{
				$data = array(
					'userid' => $fuserid,
			        'services' => $services[$i]
				);
				$this->db->insert('tbl_companyservices', $data);
			}
		}
	}

	function Getbindservices($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_companyservices where userid="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function deleteservices($fuserid)
	{
		$this->db->where('userid', $fuserid);
		$this->db->delete('tbl_companyservices');
	}

	function addcontactperson($firstname,$lastname,$contactemail,$contactdetail,$designation,$fuserid)
	{
		$cnt=count($firstname);
       // echo $cnt;
		//exit();
		for ($i = 0; $i < $cnt; $i++)
		{
			if($firstname[$i]!='')
			{
				$data = array(
					'userid' => $fuserid,
			        'firstname' => $firstname[$i],
			        'lastname' => $lastname[$i],
			        'contactemail' => $contactemail[$i],
			        'contactdetail' => $contactdetail[$i],
			        'designation' => $designation[$i]
				);
				$this->db->insert('tbl_companycontactperson', $data);
			}
		}
	}

	function deletecontactperson($fuserid)
	{
		$this->db->where('userid', $fuserid);
		$this->db->delete('tbl_companycontactperson');
	}

	function Getbindcontactperson($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_companycontactperson where userid="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbindproductname($id)
	{
		$data = array();
		$Q = $this->db->select('* FROM tbl_companyproductsmaster where userid="'.$id.'" order by id asc ');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function addproductname($productname,$fuserid)
	{
		$cnt=count($productname);

		for ($i = 0; $i < $cnt; $i++)
		{
			if(trim($productname[$i])!='')
			{
				$data = array(
					'userid' => $fuserid,
			        'productname' => ($productname[$i])
				);
				$this->db->insert('tbl_companyproductsmaster', $data);
			}
		}
	}

	function deleteproductname($fuserid)
	 {
	  $this->db->where('userid', $fuserid);
	  $this->db->delete('tbl_companyproductsmaster');
	 }

	function addproducts($fuserid)
	{
		if (isset($_POST['isfeatured']) =='on')
		{
			$isfeatured = 1;
		}
		else
		{
			$isfeatured = 0;
		}

		if (isset($_POST['isnew']) =='on')
		{
			$isnew = 1;
		}
		else
		{
			$isnew = 0;
		}

		if(isset($_POST['secondcategoryid']) && $_POST['secondcategoryid']!='')
		{

			$categoryid=$_POST['secondcategoryid'];
		}
		else
		{
			if(isset($_POST['firstcategoryid']) && $_POST['firstcategoryid']!='')
			{

				$categoryid=$_POST['firstcategoryid'];
			}
			else
			{

				$categoryid=$_POST['categoryid'];
			}
		}

		$inserteddate=date('Y-m-d');
		$data = array(
			'categoryid' => $categoryid,
			'productname' => ($_POST['mainproductname']),
			'productcode' => ($_POST['productcode']),
			'productdetail' => ($_POST['productdetail']),
			'productfeatures' => ($_POST['productfeatures']),
			'isfeatured' => ($isfeatured),
			'isnew' => ($isnew),
			'inserteddate' => ($inserteddate),
			'userid' => $fuserid
		);

		$flag1=true;
		$errormsg = array();

		if($_FILES['productimage']['name'] != "")
		{
			$config['upload_path'] = './userfiles/productimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('productimage'))
			{
				$flag1=false;
				$errormsg =array('warning' => $this->upload->display_errors(),'id' => '');
				$this->session->set_flashdata('error','The file type you are attempting to upload for exhibitions image is not allowed.');
			    redirect('myaccount/addproduct/');
			}
			else
			{
				$image = $this->upload->data();
				$imgdir = $_SERVER ["DOCUMENT_ROOT"];
				list($width,$height)=getimagesize(FCPATH."/userfiles/productimage/".$image['file_name']);
                 //echo $width;
				 //exit();
				if($width>=100)
				{
				    $flag1 = true;
					if ($image['file_name'])
					{
					   $data['productimage'] = $image['file_name'];
					}

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/productimage/small/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 183;
					$config['height'] = 176;//84;
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/productimage/medium/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 300;
					$config['height'] =300;//276;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/productimage/large/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 500;
					$config['height'] = 200;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config
				}
				else
				{
					$flag1 = false;
					if($image['file_name']!="")
					{
						if (file_exists(FCPATH."/userfiles/productimage/".$image['file_name']))
						{
							unlink(FCPATH."/userfiles/productimage/".$image['file_name']);
						}
						//unlink(FCPATH.'/userfiles/productimage/small/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/productimage/medium/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/productimage/large/'.$image['file_name']);
					}

					$this->session->set_flashdata('error','Image Size greater than or equal to 100px.');
					redirect('myaccount/addproduct/');
				}
			}
		}

        if($flag1==true)
		{
		  $this->db->insert('tbl_companyproducts', $data);
		  $productid=$this->db->insert_id();
		  return $productid;

		}
	}

	function deleteproductkeyword($productid)
	 {
	  $this->db->where('productid', $productid);
	  $this->db->delete('tbl_productkeywords');
	 }

	 function addproductkeyword($productkeyword,$productid)
	{
		$cnt=count($productkeyword);

		for ($i = 0; $i < $cnt; $i++)
		{
			if(trim($productkeyword[$i])!='')
			{
				$data = array(
					'productid' => $productid,
			        'keywords' => ($productkeyword[$i])
				);
				$this->db->insert('tbl_productkeywords', $data);
			}
		}
	}

	function updateproducts($productid)
	{
		if (isset($_POST['isfeatured']) =='on')
		{
			$isfeatured = 1;
		}
		else
		{
			$isfeatured = 0;
		}

		if (isset($_POST['isnew']) =='on')
		{
			$isnew = 1;
		}
		else
		{
			$isnew = 0;
		}

		if(isset($_POST['secondcategoryid']) && $_POST['secondcategoryid']!='')
		{

			$categoryid=$_POST['secondcategoryid'];
		}
		else
		{
			if(isset($_POST['firstcategoryid']) && $_POST['firstcategoryid']!='')
			{

				$categoryid=$_POST['firstcategoryid'];
			}
			else
			{

				$categoryid=$_POST['categoryid'];
			}
		}

		$data = array(
			'categoryid' => ($categoryid),
			'productname' => ($_POST['mainproductname']),
			'productcode' => ($_POST['productcode']),
			'productdetail' => ($_POST['productdetail']),
			'productfeatures' => ($_POST['productfeatures']),
			'isfeatured' => ($isfeatured),
			'isnew' => ($isnew)
		);

		$productimage = $_FILES['productimage']['name'];
		$flag1 = true;

		if($_FILES['productimage']['name'] !='')
		{
			$config['upload_path'] = './userfiles/productimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('productimage'))
			{
				$flag1=false;
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',($error[warning]));
				redirect('myaccount/editproduct/'.$productid);
			}
			else
			{
				$image = $this->upload->data();
				$imgdir = $_SERVER ["DOCUMENT_ROOT"];
				list($width,$height)=getimagesize(FCPATH."/userfiles/productimage/".$image['file_name']);

			 if($width>=100)
			  {
				if ($image['file_name'])
				{
				   $data['productimage'] = $image['file_name'];
				}

				$this->load->helper('file');
				$options = array('id' =>$productid);
				$Q = $this->db->get_where('tbl_companyproducts',$options);
				if ($Q->num_rows() > 0)
				{
					foreach ($Q->result_array() as $row)
					{
						if($productimage != $row['productimage'])
						{
							$this->DeleteproductImages($row['productimage']);
						}
					}
				}

				$flag1=true;

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
				$config['new_image'] = './userfiles/productimage/small/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 183;
				$config['height'] = 176;
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
				$config['new_image'] = './userfiles/productimage/medium/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 300;
				$config['height'] = 300;
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/productimage/'.$data['productimage'];
				$config['new_image'] = './userfiles/productimage/large/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 500;
				$config['height'] = 200;
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config
			  }

		    else
				{
					$flag1 = false;
					if($image['file_name']!="")
					{
					unlink(FCPATH."/userfiles/productimage/".$image['file_name']);
					//unlink(FCPATH.'/userfiles/productimage/small/'.$image['file_name']);
					//unlink(FCPATH.'/userfiles/productimage/medium/'.$image['file_name']);
					//unlink(FCPATH.'/userfiles/productimage/large/'.$image['file_name']);
					}

					$this->session->set_flashdata('error','Image Size greater than or equal to 100px.');
					redirect('myaccount/editproduct/'.$productid);
				}

			}
		}

	    if($flag1==true)
		 {
			$this->db->where('id', $productid);
		    $this->db->update('tbl_companyproducts',$data);
	     }


	}

	function deleteproduct($productid)
	{
	    $data = array();
		$options = array('id' =>$productid);
		$Q = $this->db->get_where('tbl_companyproducts',$options,1);

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$imagename = $row["productimage"];
			}
		}
		if($imagename != "")
		{
			$this->DeleteproductImages($imagename);
		}

		$options1 = array('pid' =>$productid);
		$Q1 = $this->db->get_where('tbl_productimage',$options1,1);

		if ($Q1->num_rows() > 0)
		{
			foreach ($Q1->result_array() as $row1)
			{
				$imagename1 = $row1["productimage"];
			}
		}
		if($imagename1 != "")
		{
			$this->DeleteproductImagestable($imagename1);
		}

	  $this->db->query('delete from tbl_productkeywords where productid= "'.$productid.'"');
	  $this->db->query('delete from tbl_productimage where pid= "'.$productid.'"');
	  $this->db->query('delete from tbl_companyproducts where id= "'.$productid.'"');

	}



	function addtradelead($fuserid)
	{
		$inserteddate=date('Y-m-d');
		$enddate= date('Y-m-d', strtotime("+".$_POST['validdays']." days"));

		if(isset($_POST['secondcategoryid']) && $_POST['secondcategoryid']!='')
		{

			$categoryid=$_POST['secondcategoryid'];
		}
		else
		{
			if(isset($_POST['firstcategoryid']) && $_POST['firstcategoryid']!='')
			{

				$categoryid=$_POST['firstcategoryid'];
			}
			else
			{

				$categoryid=$_POST['categoryid'];
			}
		}

		$data = array(
			'categoryid' => $categoryid,
			'title' => ($_POST['title']),
			'description' => ($_POST['description']),
			'validdays' => ($_POST['validdays']),
			'tradetype' => ($_POST['tradetype']),
			'inserteddate' => ($inserteddate),
			'userid' => $fuserid,
			'enddate' => $enddate
		);

		$flag1=true;
		$errormsg = array();

		if($_FILES['tradeimage']['name'] != "")
		{
			$config['upload_path'] = './userfiles/tradeimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('tradeimage'))
			{
				$flag1=false;
				$errormsg =array('warning' => $this->upload->display_errors(),'id' => '');
				$this->session->set_flashdata('error','The file type you are attempting to upload for exhibitions image is not allowed.');
			    redirect('myaccount/addtradelead/');
			}
			else
			{
				$image = $this->upload->data();
				$imgdir = $_SERVER ["DOCUMENT_ROOT"];
				list($width,$height)=getimagesize(FCPATH."/userfiles/tradeimage/".$image['file_name']);
                 //echo $width;
				 //exit();
				if($width>=100)
				{
				    $flag1 = true;
					if ($image['file_name'])
					{
					   $data['tradeimage'] = $image['file_name'];
					}
					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
					$config['new_image'] = './userfiles/tradeimage/small/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 136;
					$config['height'] = 100;//84;
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
					$config['new_image'] = './userfiles/tradeimage/medium/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 300;
					$config['height'] =300;//276;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
					$config['new_image'] = './userfiles/tradeimage/large/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 500;
					$config['height'] = 200;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config
				}
				else
				{
					$flag1 = false;
					if($image['file_name']!="")
					{
						if (file_exists(FCPATH."/userfiles/tradeimage/".$image['file_name']))
						{
							unlink(FCPATH."/userfiles/tradeimage/".$image['file_name']);
						}
						//unlink(FCPATH.'/userfiles/tradeimage/small/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/tradeimage/medium/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/tradeimage/large/'.$image['file_name']);
					}

					$this->session->set_flashdata('error','Image Size greater than or equal to 100px.');
					redirect('myaccount/addtradelead/');
				}
			}
		}

        if($flag1==true)
		{
		  $this->db->insert('tbl_mytradeleads', $data);

		}
	}

	function updatetradelead($tradeid)
	{
		if(isset($_POST['secondcategoryid']) && $_POST['secondcategoryid']!='')
		{

			$categoryid=$_POST['secondcategoryid'];
		}
		else
		{
			if(isset($_POST['firstcategoryid']) && $_POST['firstcategoryid']!='')
			{

				$categoryid=$_POST['firstcategoryid'];
			}
			else
			{

				$categoryid=$_POST['categoryid'];
			}
		}

		$data = array(
			'categoryid' => $categoryid,
			'title' => ($_POST['title']),
			'description' => ($_POST['description']),
			//'validdays' => ($_POST['validdays']),
			'tradetype' => ($_POST['tradetype']),
			'status' => 0
		);

		$tradeimage = $_FILES['tradeimage']['name'];
		$flag1 = true;

		if($_FILES['tradeimage']['name'] !='')
		{
			$config['upload_path'] = './userfiles/tradeimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('tradeimage'))
			{
				$flag1=false;
				$error = array('warning' =>  $this->upload->display_errors());
				$this->session->set_flashdata('error',($error[warning]));
				redirect('myaccount/edittradelead/'.$tradeid);
			}
			else
			{
				$image = $this->upload->data();
				$imgdir = $_SERVER ["DOCUMENT_ROOT"];
				list($width,$height)=getimagesize(FCPATH."/userfiles/tradeimage/".$image['file_name']);

			 if($width>=100)
			  {
				if ($image['file_name'])
				{
				   $data['tradeimage'] = $image['file_name'];
				}

				$this->load->helper('file');
				$options = array('id' =>$tradeid);
				$Q = $this->db->get_where('tbl_mytradeleads',$options);
				if ($Q->num_rows() > 0)
				{
					foreach ($Q->result_array() as $row)
					{
						if($tradeimage != $row['tradeimage'])
						{
							$this->DeletetradeImages($row['tradeimage']);
						}
					}
				}

				$flag1=true;

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
				$config['new_image'] = './userfiles/tradeimage/small/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 136;
				$config['height'] = 100;
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
				$config['new_image'] = './userfiles/tradeimage/medium/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 300;
				$config['height'] = 300;
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config

				$config['image_library'] = 'gd2';
				$config['source_image'] = './userfiles/tradeimage/'.$data['tradeimage'];
				$config['new_image'] = './userfiles/tradeimage/large/';
				$config['maintain_ratio'] = TRUE;
				$config['overwrite'] = false;
				$config['width'] = 500;
				$config['height'] = 200;
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->load->library('image_lib', $config); //load library
				$this->image_lib->resize(); //do whatever specified in config
			  }

		    else
				{
					$flag1 = false;
					if($image['file_name']!="")
					{
					unlink(FCPATH."/userfiles/tradeimage/".$image['file_name']);
					//unlink(FCPATH.'/userfiles/tradeimage/small/'.$image['file_name']);
					//unlink(FCPATH.'/userfiles/tradeimage/medium/'.$image['file_name']);
					//unlink(FCPATH.'/userfiles/tradeimage/large/'.$image['file_name']);
					}

					$this->session->set_flashdata('error','Image Size greater than or equal to 100px.');
					redirect('myaccount/edittradelead/'.$tradeid);
				}

			}
		}

	    if($flag1==true)
		 {
			$this->db->where('id', $tradeid);
		    $this->db->update('tbl_mytradeleads',$data);
	     }


	}

	function deletetradelead($tradeid)
	{
	  $data = array();
		$options = array('id' =>$tradeid);
		$Q = $this->db->get_where('tbl_mytradeleads',$options,1);

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$imagename = $row["tradeimage"];
			}
		}
		if($imagename != "")
		{
			$this->DeletetradeImages($imagename);
		}

	  $this->db->query('delete from tbl_mytradeleads where id= "'.$tradeid.'"');
	}

	function countbindcoursevalue()
	 {
		$fuuid=$this->session->userdata('fuuid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_university_courses where universityid="'.$fuuid.'"  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindcoursevalue($limit, $start)
	{
		$fuuid=$this->session->userdata('fuuid');
		$data = array();
		$Q = $this->db->select('id,coursedurationtype,amount,amounttype,(select campus_name from tbl_university_location where id=rc.locationid)as campus_name,(select title from tbl_streammaster where id IN (select streamid from tbl_coursesmaster where id=rc.courseid)) as stream,(select title from tbl_coursesmaster where id =rc.courseid) as coursename,courseduration from tbl_university_courses rc where universityid="'.$fuuid.'" order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindfavourite()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_addtofav where userid="'.$fuserid.'"  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindfavourite($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('*,(select universityname from tbl_university_registration where uuid=tbl_addtofav.universityid)as universityname,(select title from tbl_coursesmaster where id in(select courseid from tbl_university_courses where courseuuid=tbl_addtofav.courseuuid))as coursename from tbl_addtofav where userid="'.$fuserid.'" order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindinquiry()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_applynow where user_id="'.$fuserid.'"  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function countbinduniversityinquiry()
	 {
		$fuserid=$this->session->userdata('fuserid');

		//echo $fuserid;
		//die;
		$data = array();
		$Q = $this->db->select('id FROM tbl_applynow where university_id IN (select uuid from tbl_university_registration where userid="'.$fuserid.'")  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindinquiry($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('*,(select universityname from tbl_university_registration where uuid=tbl_applynow.university_id)as universityname,(select title from tbl_coursesmaster where id in(select courseid from tbl_university_courses where courseid=tbl_applynow.courseid and locationid=tbl_applynow.locationid))as coursename from tbl_applynow where user_id="'.$fuserid.'" order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbinduniversityinquiry($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('*,(select concat(fname," ",lname) from tbl_registration where userid=tbl_applynow.user_id)as studentname,(select email from tbl_registration where userid=tbl_applynow.user_id)as studentemail,(select contactno from tbl_registration where userid=tbl_applynow.user_id)as studentcontactnumber,(select title from tbl_coursesmaster where id in(select courseid from tbl_university_courses where courseid=tbl_applynow.courseid and locationid=tbl_applynow.locationid))as coursename from tbl_applynow where university_id IN (select uuid from tbl_university_registration where userid="'.$fuserid.'") order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Checkuserinquiry($fuserid,$inquiryid)
	{
		$data = array();

		$userrole=$this->session->userdata('userrole');

		if($userrole==1)
		{
			$Q = $this->db->query('SELECT id FROM tbl_applynow where id='.$inquiryid.' and university_id IN (select uuid from tbl_university_registration where userid="'.$fuserid.'")');
		}
		else
		{
			$Q = $this->db->query('SELECT id FROM tbl_applynow where id='.$inquiryid.' and user_id='.$fuserid.'');
		}
		
		if ($Q->num_rows() > 0)
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}

	function getinquirybyId($id)
	{
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_applynow where id ="'.$id.'"');

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}



	function countbindproductvalue()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_companyproducts where userid='.$fuserid.'  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindproductvalue($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id, productname from tbl_companyproducts where userid='.$fuserid.' order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindservicesvalue()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_companyservices where userid='.$fuserid.'  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindservicesvalue($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id, services from tbl_companyservices where userid='.$fuserid.' order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbindproductdetail($productid)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_companyproducts where id='.$productid.' order by id desc');

		$Q = $this->db->get();

		//echo $this->db->last_query();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function Getbindproductkeywords($productid)
	{
		$data = array();
		$Q = $this->db->select('* FROM tbl_productkeywords where productid="'.$productid.'" order by id asc ');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbindtradeleaddetail($productid)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_mytradeleads order by id desc');

		$Q = $this->db->get();

		//echo $this->db->last_query();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function Getbindtradeleaddetailbyid($tradeid)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_mytradeleads where id='.$tradeid.' order by id desc');

		$Q = $this->db->get();

		//echo $this->db->last_query();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function countbindtradeleadvalue()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_mytradeleads where userid='.$fuserid.'  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindtradeleadvalue($limit, $start)
	{
		$Q = $this->db->limit($limit, $start);
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id, title, status,tradetype,enddate from tbl_mytradeleads where userid='.$fuserid.' order by id desc');


		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function addproductimage($pid)
	{
		$data = array(
			'pid' => $pid
		);

		$flag1=true;
		$errormsg = array();

		if($_FILES['productimage']['name'] != "")
		{
			$config['upload_path'] = './userfiles/moreproductimage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('productimage'))
			{
				$flag1=false;
				$errormsg =array('warning' => $this->upload->display_errors(),'id' => '');
				$this->session->set_flashdata('error','The file type you are attempting to upload for exhibitions image is not allowed.');
			    redirect('myaccount/productimage/'.$pid);
			}
			else
			{
				$image = $this->upload->data();
				$imgdir = $_SERVER ["DOCUMENT_ROOT"];
				list($width,$height)=getimagesize(FCPATH."/userfiles/moreproductimage/".$image['file_name']);
                 //echo $width;
				 //exit();
				if($width>=100)
				{
				    $flag1 = true;
					if ($image['file_name'])
					{
					   $data['productimage'] = $image['file_name'];
					}

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/moreproductimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/moreproductimage/small/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 183;
					$config['height'] = 183;//84;
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/moreproductimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/moreproductimage/medium/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 300;
					$config['height'] =300;//276;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config

					$config['image_library'] = 'gd2';
					$config['source_image'] = './userfiles/moreproductimage/'.$data['productimage'];
					$config['new_image'] = './userfiles/moreproductimage/large/';
					$config['maintain_ratio'] = TRUE;
					$config['overwrite'] = false;
					$config['width'] = 500;
					$config['height'] = 200;
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->load->library('image_lib', $config); //load library
					$this->image_lib->resize(); //do whatever specified in config
				}
				else
				{
					$flag1 = false;
					if($image['file_name']!="")
					{
						if (file_exists(FCPATH."/userfiles/moreproductimage/".$image['file_name']))
						{
							unlink(FCPATH."/userfiles/moreproductimage/".$image['file_name']);
						}
						//unlink(FCPATH.'/userfiles/moreproductimage/small/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/moreproductimage/medium/'.$image['file_name']);
						//unlink(FCPATH.'/userfiles/moreproductimage/large/'.$image['file_name']);
					}

					$this->session->set_flashdata('error','Image Size greater than or equal to 100px.');
					redirect('myaccount/productimage/'.$pid);
				}
			}
		}

        if($flag1==true)
		{
		  $this->db->insert('tbl_productimage', $data);
		}
	}

	function removeproductimage($id)
	{
	  $data = array();
		$options = array('id' =>$id);
		$Q = $this->db->get_where('tbl_productimage',$options,1);

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$imagename = $row["productimage"];
			}
		}
		if($imagename != "")
		{
			$this->DeletemoreproductImages($imagename);
		}


	  $this->db->query('delete from tbl_productimage where id= "'.$id.'"');

	}

	function DeletemoreproductImages($imagename)
	{
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH.'/userfiles/moreproductimage/small/'.$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/medium/".$imagename);
		}
		if($imagename != "")
		{
			unlink(FCPATH."/userfiles/moreproductimage/large/".$imagename);
		}
	}

	function Checkusercompanyprofile($fuserid)
	{
		$data = array();
		$Q = $this->db->query('SELECT userid FROM tbl_registration where userid ='.$fuserid.' and companyname!=""');
		if ($Q->num_rows() > 0)
		{
			//echo "123";
			//die;
			return "false";
		}
		else
		{
			//echo "456";
			//die;
			return "true";
		}
	}

	function Checkuserpersonalprofile($fuserid)
	{
		$data = array();
		$Q = $this->db->query('SELECT userid FROM tbl_registration where userid ='.$fuserid.' and currentlypost="entrepreneur"');
		if ($Q->num_rows() > 0)
		{
			//echo "123";
			//die;
			return "false";
		}
		else
		{
			//echo "456";
			//die;
			return "true";
		}
	}

	function countbindmyenquiries()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_enquiry where productid IN (select id from tbl_companyproducts where userid='.$fuserid.')  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindmyenquiries()
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id,salutation,fullname,email,stdcode,mobileno,enquirydate,(select productname from tbl_companyproducts where id=tbl_enquiry.productid) as productname from tbl_enquiry where productid IN (select id from tbl_companyproducts where userid='.$fuserid.') order by id desc');

		//$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindmysuppliresenquiries()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_suppliersenquiry where userid='.$fuserid.'  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindmysuppliresenquiries()
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id,salutation,fullname,email,stdcode,mobileno,enquirydate from tbl_suppliersenquiry where userid='.$fuserid.' order by id desc');

		//$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function getenquirybyId($id)
	{
		$data = array();
		$Q = $this->db->query('SELECT *,(select productname from tbl_companyproducts where id=tbl_enquiry.productid)as productname FROM tbl_enquiry where id ="'.$id.'"');

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	function getsuppliersenquirybyId($id)
	{
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_suppliersenquiry where id ="'.$id.'"');

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	function countbindfeaturedproductvalue()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_companyproducts where userid='.$fuserid.' and isfeatured=1  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindfeaturedproductvalue($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id, productname,productcode,productimage from tbl_companyproducts where userid='.$fuserid.' and isfeatured=1 order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function updatepassword()
	{
		$oldpassword=$_POST['txtoldpassword'];
		$password=$_POST['txtPassword'];
		if($password!="")
		{
			$Q = $this->db->query("SELECT * FROM tbl_user where password ='".$this->hash($this->input->post('txtoldpassword'))."' and id='".$this->session->userdata('fuserid')."'");

			if ($Q->num_rows() > 0)
			{
				$data = array(
					'password' => $this->hash($_POST['txtPassword']),
				);
				$this->db->where('id', $this->session->userdata('fuserid'));
				$this->db->update('tbl_user',$data);

				$data = array(
					'password' => $this->hash($_POST['txtPassword']),
				);

				$userrole=$this->session->userdata('userrole');

				if($userrole==1)
				{
					$this->db->where('userid', $this->session->userdata('fuserid'));
				    $this->db->update('tbl_university_registration',$data);
				}
				else
				{
					//echo "123";
					//die;
				  $this->db->where('userid', $this->session->userdata('fuserid'));
				  $this->db->update('tbl_registration',$data);
				}
				return "true";
			}
			else
			{
				return "false";
			}
		}
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}


	function updatepasswordmail()
	{


			$Q = $this->db->query("SELECT * FROM tbl_registration where id='".$this->session->userdata('fuserid')."'");
			$data = $Q->row_array();
			//print_R($data);die;

			$data['username']='';
			$fname=ucfirst($data["fname"]);
			$lname=ucfirst($data["lname"]);
			$password = $_POST['txtPassword'];
			$username = $data['email'];

			$address = $data['email'];
		    $from = $this->config->item('fromemailid');
			$subject = "Account Information.";
			$message = "<table cellpadding='0' cellspacing='0' border='' width='600px'>

						<tr>
						<td style='border:1px solid #0194E2; border-bottom:none;'>
							<img src='".site_url('assets/images/emailtop.jpg')."'>
						</td>
						</tr>

						<tr>
							<td style='border-left:1px solid #0194E2; border-right:1px solid #0194E2; min-height:500px;'>
								<table cellpadding='0' cellspacing='0' border=0 width='598px' align='center' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
									<tr align=left>
										<td>
											<table cellpadding='0' cellspacing='0' border=0 width='598px' style= 'font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
												<tr><td height=40 colspan=2>&nbsp;&nbsp;&nbsp; Dear $fname $lname, </td></tr>

												<tr><td height=20>&nbsp;&nbsp;&nbsp; Your user name is <b>$username</b>.</td></tr>
												<tr><td height=20>&nbsp;&nbsp;&nbsp; Your password is <b>$password</b>.</td></tr>

												<tr><td height=20>&nbsp;&nbsp;&nbsp; Remember never share this password with anyone.</td></tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
										&nbsp;</td>
									</tr>
									<tr>
										<td align='right' style='padding:0px 10px;'>
										Best regards,<br>
										COZ CLUB Team</td>
									</tr>
									<tr>
										<td>
										&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>

						<tr>
						<td style='border:1px solid #0194E2; border-bottom:none;'>
							<img src='".site_url('assets/images/emailbtm.jpg')."'>
						</td>
						</tr>

					</table>";

		//echo $message;
		//exit();

		$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'smtp_host'=>'localhost',
				'smtp_port'=>'25',
				'wordwrap' => TRUE
			);


			$this->load->library('email',$config);
			$this->email->from($from);
			$this->email->to($address);
			$this->email->subject($subject);
			$this->email->message($message);

			if($this->email->send())
			{
				echo '';
			}
			else
			{

			}
		}

	function getalleducationlevel()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_educationlevelmaster order by id asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function Getbindeducation($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_educationmaster where educationlevelid="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindproductsenquiries()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_enquiry where productid IN (select id from tbl_companyproducts where userid='.$fuserid.')  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindproductsenquiries($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id,salutation,fullname,email,stdcode,mobileno,enquirydate,(select productname from tbl_companyproducts where id=tbl_enquiry.productid) as productname from tbl_enquiry where productid IN (select id from tbl_companyproducts where userid='.$fuserid.') order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

  function countbindsuppliresenquiries()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_suppliersenquiry where userid='.$fuserid.'  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

  function Getbindsuppliresenquiries($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id,salutation,fullname,email,stdcode,mobileno,enquirydate from tbl_suppliersenquiry where userid='.$fuserid.' order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function countbindtradeleadsenquiries($type)
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_tradeleadsenquiry where tradeid IN (select id from tbl_mytradeleads where userid='.$fuserid.') and tradetype="'.$type.'" order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindtradeleadsenquiries($type, $limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id,salutation,fullname,email,stdcode,mobileno,enquirydate,(select title from tbl_mytradeleads where id=tbl_tradeleadsenquiry.tradeid) as title from tbl_tradeleadsenquiry where tradeid IN (select id from tbl_mytradeleads where userid='.$fuserid.') and tradetype="'.$type.'" order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function gettradeleadsenquirybyId($id,$type)
	{
		$data = array();
		$Q = $this->db->query('SELECT *,(select title from tbl_mytradeleads where id=tbl_tradeleadsenquiry.tradeid) as title FROM tbl_tradeleadsenquiry where id ="'.$id.'" and tradetype="'.$type.'"');

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	function gettradeleaddetailbyid($id)
	{
		$data = array();
		$Q = $this->db->query('SELECT *,(select fname from tbl_registration where id=tbl_mytradeleads.userid)as fname,(select lname from tbl_registration where id=tbl_mytradeleads.userid)as lname, (select email from tbl_registration where id=tbl_mytradeleads.userid)as email FROM tbl_mytradeleads where id="'.$id.'"');

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		$Q->free_result();

		return $data;
	}

	function sendmailforapproval($id)
	{
		$tradelead= $this->gettradeleaddetailbyid($id);

		if(count($tradelead)>0)
		{
			$tradeleadid = $id;
			$fname=ucfirst($tradelead[0]["fname"]);
			$lname=ucfirst($tradelead[0]["lname"]);
			$from = $tradelead[0]['email'];

			$to = 'admin@cozclub.com';

			$subject = "Trade Lead for approval.";
			$message ="<table cellpadding='0' cellspacing='0' width='598px'>
					<tr>
					<td>
					<img src='".site_url('assets/images/emailtop.jpg')."'>
					</td>
					</tr>
					<tr>
					<td style='border-left:1px #b2b2b2 solid; border-right:1px #b2b2b2 solid;'>
					<table cellpadding='5' cellspacing='0' width='596' align='center' style='font-family: Arial'>
					<tr><td>&nbsp;</td></tr>

					<tr>
					<td style='padding:0px 20px 10px;'>
					<span>Trade Lead request no. <b>$tradeleadid</b> has been submitted by $fname $lname for approval.</span><br/>
					</td>
					</tr>
					<tr>
					<td>
					&nbsp;</td>
					</tr>
					<tr>
					<td align='left' style='padding:0px 20px; font-size:15px;'>
					Best regards,<br>
					$fname $lname.</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					</table>
					</td>
					</tr>
					<tr>
					<td>
					<img src='".site_url('assets/images/emailbtm.jpg')."'>
					</td>
					</tr>
					</table>";

			//echo $message;
			//exit();

			$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'smtp_host'=>'localhost',
					'smtp_port'=>'25',
					'wordwrap' => TRUE
				);


				$this->load->library('email',$config);
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);

				if($this->email->send())
				{
					echo '';
				}
				else
				{

				}
		}
	}

	function addnewservices($fuserid)
	{
		$data = array(
			'services' => ($_POST['service']),
			'userid' => $fuserid
		);
		  $this->db->insert('tbl_companyservices', $data);
		  $serviceid=$this->db->insert_id();
		  return $serviceid;

	}

	function deletenewservice($serviceid)
	{
	  $this->db->query('delete from tbl_companyservices where id= "'.$serviceid.'"');
	}

	function Getbindservicedetail($serviceid)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_companyservices where id='.$serviceid.' order by id desc');

		$Q = $this->db->get();

		//echo $this->db->last_query();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function updateservices()
	{
		$data = array(
			'services' => ($_POST['service'])
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('tbl_companyservices',$data);


	}

	function Getbindcategorydatabyrole($newuserrole)
	{
		$data = array();
        $Q = $this->db->select("node.id, node.name as Category FROM tbl_categorymaster  node WHERE cat=0 order by sortorder asc");
		
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbindfirstcategory($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_categorymaster where cat="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getbindsecondcategory($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_categorymaster where cat="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function Getcatbycategory($categoryid)
	{
		$data = array();
		$Q = $this->db->select('cat from tbl_categorymaster where id='.$categoryid.'');

		$Q = $this->db->get();

		//echo $this->db->last_query();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function getserviceproviderpackage()
	{
		$data = array();

		$Q = $this->db->select('* from tbl_serviceproviderpackage order by id desc');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		$Q->free_result();

		return $data;
	}

	function Getbindamount($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_serviceproviderpackage where id="'.$value.'" order by id asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		  {
		   $data = $Q->row_array();
		  }
		$Q->free_result();
		return $data;
	}

	function updatepayment($userid,$paymentid,$pmethod,$packageid)
	{
		$Quuid = $this->db->query("SELECT uuid() as id");
		if ($Quuid->num_rows() > 0)
		{
			$datauuid = $Quuid->row_array();
			$uuid=$datauuid["id"];
		}

		$paymentdate=date("Y-m-d H:i:s");
		$enddate= date('Y-m-d', strtotime("30 days"));

		$data = array(
				'paymentid' => $paymentid,
				'paymentmethod' => $pmethod,
				'paymentstatus' => 1,
			    'paymentdate' => $paymentdate,
			    'enddate' => $enddate,
			    'packageid' => $packageid,
			    'uuid' => $uuid
			);
		$this->db->where('userid', $userid);
		$this->db->update('tbl_registration',$data);
	}

	function getregistrationdetailId($userid)
	{
		$data = array();
		$options = array('userid' =>$userid);
		$Q = $this->db->get_where('tbl_registration',$options,1);

		if ($Q->num_rows() > 0)
		{
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	function getregistrationByUuid($uuid)
	{
		$data = array();
		$options = array('uuid' =>$uuid);
		$Q = $this->db->get_where('tbl_registration',$options,1);

		if ($Q->num_rows() > 0)
		{
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	function GetpackageByid($id)
	{
		$data = array();
		$Q = $this->db->select('* FROM tbl_serviceproviderpackage where id ="'.$id.'"');
		$Q =  $this->db->get();

		if ($Q->num_rows() > 0)
		{
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}


	function ordermail($uuid)
	{
		$orders= $this->getregistrationByUuid($uuid);
		$packagedetail=$this->GetpackageByid($orders['packageid']);
		$address = $orders['email'];
		$from = 'admin@cozclub.com';
		$subject = "Thanks for your payment!";
		$message = "<table cellpadding='0' cellspacing='0' width='598px'>
					<tr>
						<td>
							<img src='".site_url('assets/images/emailtop.jpg')."'>
						</td>
					</tr>
					<tr>
						<td style='border-left:1px solid #b2b2b2; border-right:1px solid #b2b2b2; min-height:500px;'>
							<table cellpadding='10' cellspacing='5' width='594px' align='center' style='font-family: Arial'>

								<tr>
									<td>Dear ".ucfirst($orders['fname'])." ".ucfirst($orders['lname'])." ,</td>
								</tr>

								<tr>
									<td>
									     Thank you for registration as service provider. Please find your transaction details
										<br />
										<br />

									</td>
								</tr>

								<tr>
								  <td colspan='2'>
									  <TABLE cellpadding='5' cellspacing='1' border='0' width='100%' style='border:1px solid #cccccc;'>
										  <TR>
											<TD>Name : ".ucfirst($orders['fname'])." ".ucfirst($orders['lname'])."</TD>
											<TD>Payment Date : ".date('d F Y',strtotime($orders["paymentdate"]))."</TD>
										  </TR>
										  <TR>
											<TD>Email : ".$orders['email']."</TD>
											<TD></TD>
										  </TR>
									  </TABLE>
								  </td>
								</tr>

                                <tr>
									<td style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#5e168f; font-weight:bold; margin-bottom:0px; padding-bottom:0px;'>
									Payment Details
									</td>
								</tr>
								<tr>
									<td>
										<table cellpadding='5' cellspacing='1' border='0' width='100%' style='border:1px solid #cccccc; font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
											<tr bgcolor='#e5e5e5'>
												<td width='33%' valign='top'>Reg #</td>
												<td width='33%' valign='top'>Serviceprovider Type</td>";
												if($orders['paymentid']!="")
												{
												$message .="<td width='33%' valign='top'>Payment Transaction No</td>";
												}
												$message .="<td width='33%' valign='top'>Paid Amount</td>
											</tr>
											<tr>
												<td>	".$orders['userid']."</td>
												<td>	" .ucwords($packagedetail['title'])."</td>";

												if($orders['paymentid']!="")
												{
												$message .="<td>	" .$orders['paymentid']."</td>";
												}

												$message .="<td>	" .$packagedetail['price']." USD</td>";

												$message .="</tr>
										</table>
									</td>
								</tr>

								<tr>
									<td>
									     Note : This is an automatically generated email so please do not reply
										<br />

									</td>
								</tr>

								<tr>
									<td>
									Please check carefully the details of your payment.<br/>
								    Thank you!<br/>
									COZ CLUB.<br/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
						   <img src='".site_url('assets/images/emailbtm.jpg')."'>
						</td>
					</tr>
				</table>";

				$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'smtp_host'=>'localhost',
				/*'smtp_user'=>'megh.staging@gmail.com',
				'smtp_pass'=>'Pepsi123@',*/
				'smtp_port'=>'25',
				'wordwrap' => TRUE
			);

			//echo $message;
     		//exit();

			$this->load->library('email',$config);
			$this->email->from($from,'COZ CLUB');
			$this->email->to($address);
			$this->email->subject($subject);
			$this->email->message($message);

			//return $message;

			if($this->email->send())
			{
				echo '';
			}
			else
			{
				//show_error($this->email->print_debugger());
				//exit();
			}
	}


	function newordermail($uuid)
	{

		$orders= $this->getregistrationByUuid($uuid);
		$packagedetail=$this->GetpackageByid($orders['packageid']);
		$address = $orders['email'];
		$from = 'admin@cozclub.com';
		$subject = "New registration has been placed for Webinar.";
		$message = "<table cellpadding='0' cellspacing='0' width='598px'>
					<tr>
						<td>
							<img src='".site_url('assets/images/emailtop.jpg')."'>
						</td>
					</tr>
					<tr>
						<td style='border-left:1px solid #b2b2b2; border-right:1px solid #b2b2b2; min-height:500px;'>
							<table cellpadding='10' cellspacing='5' width='594px' align='center' style='font-family: Arial'>

								<tr>
									<td>Dear ".ucfirst($orders['fname'])." ".ucfirst($orders['lname'])." ,</td>
								</tr>

								<tr>
									<td>
									     Thank you for registration as service provider. Please find your transaction details
										<br />
										<br />

									</td>
								</tr>

								<tr>
								  <td colspan='2'>
									  <TABLE cellpadding='5' cellspacing='1' border='0' width='100%' style='border:1px solid #cccccc;'>
										  <TR>
											<TD>Name : ".ucfirst($orders['fname'])." ".ucfirst($orders['lname'])."</TD>
											<TD>Payment Date : ".date('d F Y',strtotime($orders["paymentdate"]))."</TD>
										  </TR>
										  <TR>
											<TD>Email : ".$orders['email']."</TD>
											<TD></TD>
										  </TR>
									  </TABLE>
								  </td>
								</tr>

                                <tr>
									<td style='font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#5e168f; font-weight:bold; margin-bottom:0px; padding-bottom:0px;'>
									Payment Details
									</td>
								</tr>
								<tr>
									<td>
										<table cellpadding='5' cellspacing='1' border='0' width='100%' style='border:1px solid #cccccc; font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
											<tr bgcolor='#e5e5e5'>
												<td width='33%' valign='top'>Reg #</td>
												<td width='33%' valign='top'>Serviceprovider Type</td>";
												if($orders['paymentid']!="")
												{
												$message .="<td width='33%' valign='top'>Payment Transaction No</td>";
												}
												$message .="<td width='33%' valign='top'>Paid Amount</td>
											</tr>
											<tr>
												<td>	".$orders['userid']."</td>
												<td>	" .ucwords($packagedetail['title'])."</td>";

												if($orders['paymentid']!="")
												{
												$message .="<td>	" .$orders['paymentid']."</td>";
												}

												$message .="<td>	" .$packagedetail['price']." USD</td>";

												$message .="</tr>
										</table>
									</td>
								</tr>

								<tr>
									<td>
									     Note : This is an automatically generated email so please do not reply
										<br />

									</td>
								</tr>

								<tr>
									<td>
									Please check carefully the details of your payment.<br/>
								    Thank you!<br/>
									COZ CLUB.<br/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
						   <img src='".site_url('assets/images/emailbtm.jpg')."'>
						</td>
					</tr>
				</table>";

				$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'smtp_host'=>'localhost',
				/*'smtp_user'=>'megh.staging@gmail.com',
				'smtp_pass'=>'Pepsi123@',*/
				'smtp_port'=>'25',
				'wordwrap' => TRUE
			);

          // echo $message;
          // exit();

			$this->load->library('email',$config);
			$this->email->from($from);
			//$this->email->to($address);
			$this->email->to("admin@cozclub.com");
			$this->email->subject($subject);
			$this->email->message($message);
			//$this->email->cc("ruslana.golunova@ishin-g.com");
		    //$this->email->cc("miyuki.tsuda@ishin-g.com");

			//return $message;

			if($this->email->send())
			{
				echo '';
			}
			else
			{
				//show_error($this->email->print_debugger());
				//exit();
			}
	}

	function countbindwebinarvalue()
	 {
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_webinarsregister where userid='.$fuserid.' and registrantkey!=""');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindwebinarvalue($limit, $start)
	{
		$fuserid=$this->session->userdata('fuserid');
		$data = array();
		$Q = $this->db->select('id, trainingguid,joinUrl,(select title from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as title,(select posteddate from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as webinardate from tbl_webinarsregister where userid='.$fuserid.' and registrantkey!="" order by webinardate asc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function getwebinardetailbyId($id)
	{
		$data = array();
		$Q = $this->db->query('SELECT *,(select title from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as title,(select posteddate from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as webinardate,(select description from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as description,(select priceforrestofindia from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as priceforrestofindia,(select priceforindia from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as priceforindia,(select modules from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as modules,(select starttime from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as starttime,(select endtime from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as endtime,(select coachname from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as coachname,(select timezone from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as timezone,(select isfree from tbl_webinarmaster where trainingid=tbl_webinarsregister.trainingid) as webinarisfree FROM tbl_webinarsregister where trainingguid ="'.$id.'"');

		//echo $this->db->last_query();
		//die;

		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	//-----------------------Image Processing-------------------------

	public function upload_image(){
       
		if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			unlink(FCPATH.'/userfiles/university_logo/'.$_POST['old_image']);
		}

		if($_FILES['image']!="" || $_FILES['image']!=NULL){

		   $config['upload_path'] = './userfiles/university_logo/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('image')){
				$error = array('warning' =>  $this->upload->display_errors());
				echo $error;
		   }else{
			   $upload_data = $this->upload->data();
			   $data['file_name'] = $upload_data['file_name'];
			   
			   echo $data['file_name'];
		   }
		}
	}

	public function upload_profilephoto(){
       
		if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			unlink(FCPATH.'/userfiles/profilephoto/'.$_POST['old_image']);
		}

		if($_FILES['image']!="" || $_FILES['image']!=NULL){

		   $config['upload_path'] = './userfiles/profilephoto/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('image')){
				$error = array('warning' =>  $this->upload->display_errors());
				echo $error;
		   }else{
			   $upload_data = $this->upload->data();
			   $data['file_name'] = $upload_data['file_name'];
			   
			   echo $data['file_name'];
		   }
		}
	}

	/*public function upload_editprofilephoto(){
       
		if($_POST['old_image']!="" || $_POST['old_image']!=NULL){
			unlink(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['old_image']);
		}

		if($_FILES['image']!="" || $_FILES['image']!=NULL){

		   $config['upload_path'] = './userfiles/profilephoto/withoutcrop/';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);  

		   if(!$this->upload->do_upload('image')){
				$error = array('warning' =>  $this->upload->display_errors());
				echo $error;
		   }else{
			   $upload_data = $this->upload->data();
			   $data['file_name'] = $upload_data['file_name'];
			   
			   return $data['file_name'];
		   }
		}
	}*/

	public function upload_editprofilephoto()
	{
		if(isset($_POST['old_image']) && $_POST['old_image']!="")
		{
			unlink(FCPATH.'/userfiles/profilephoto/withoutcrop/'.$_POST['old_image']);
		}

		if($_FILES['image']!="" || $_FILES['image']!=NULL)
		{
		   $config['upload_path'] = './userfiles/profilephoto/original';
		   $config['allowed_types'] = 'gif|jpg|png|jpeg';
		   $config['max_size'] = '20000';
		   $config['max_height'] ='';
		   $config['max_width'] = '';
		   $config['file_name'] = time();

		   $this->load->library('upload');
		   $this->upload->initialize($config);

		   if(!$this->upload->do_upload('image')){
				$error = array('warning' =>  $this->upload->display_errors());
				echo $error;
		   }else{
			   $upload_data = $this->upload->data();
			   $data['file_name'] = $upload_data['file_name'];

			   $resize_conf = array
			   (
					'source_image'  => $upload_data['full_path'],
					'new_image'=>realpath('userfiles/profilephoto/medium').'/'.$upload_data['file_name'],
					'width'         => 400,
					'height'        => 400,
					'master_dim'=>'width'
				);

				$this->load->library('image_lib', $resize_conf);
				$this->image_lib->clear();
				$this->image_lib->initialize($resize_conf);

				if ( ! $this->image_lib->resize())
				{
				   echo $error['resize'][] = $this->image_lib->display_errors();
				}
				else
				{
					$data['file_name'] = $upload_data['file_name'];
					UNLINK(FCPATH.'/userfiles/profilephoto/original/'.$data['file_name']);

					list($width,$height)=getimagesize(FCPATH.'/userfiles/profilephoto/medium/'.$data['file_name']);

					if($height < 400)
					{
						$resize_conf = array
					    (
							'source_image'  => realpath('userfiles/profilephoto/medium').'/'.$upload_data['file_name'],
							'new_image' => realpath('userfiles/profilephoto/withoutcrop').'/'.$upload_data['file_name'],
							'width'         => 400,
							'height'        => 400,
							'master_dim'=>'height'
						);

						$this->load->library('image_lib', $resize_conf);
						$this->image_lib->clear();
						$this->image_lib->initialize($resize_conf);

						if(!$this->image_lib->resize())
						{
						   $error['resize'][] = $this->image_lib->display_errors();
						}
						else
						{
							UNLINK(FCPATH.'/userfiles/profilephoto/medium/'.$data['file_name']);
						}
					}
					else
					{
						$src = FCPATH."/userfiles/profilephoto/medium/".$data['file_name'];
						$dest = FCPATH."/userfiles/profilephoto/withoutcrop/".$data['file_name'];
						copy($src,$dest);
						UNLINK(FCPATH.'/userfiles/profilephoto/medium/'.$data['file_name']);
					}
				}

			   return $data['file_name'];
		   }
		}
	}

	function detailuniversitycourse($id){
		$data = array();
		$this->db->SELECT('*,(SELECT title FROM tbl_level WHERE id=tbl_university_courses.level_id)as level,(select campus_name from tbl_university_location where id=tbl_university_courses.locationid)as campus_name,(select title from tbl_streammaster where id IN (select streamid from tbl_coursesmaster where id=tbl_university_courses.courseid)) as stream,(select title from tbl_coursesmaster where id =tbl_university_courses.courseid) as course,(select currencytype from tbl_countrymaster where id IN (select country from tbl_university_location where id=tbl_university_courses.locationid)) as currencytype');

		//$this->db->SELECT('*,(SELECT title FROM tbl_level WHERE id=tbl_university_courses.level_id)as level,(SELECT campus_name FROM tbl_university_location WHERE id=locationid)as campus_name,(select title from tbl_streammaster where id IN (select streamid from tbl_coursesmaster where id=tbl_university_courses.courseid)) as stream,(select title from tbl_coursesmaster where id =tbl_university_courses.courseid) as course,(select sum(totalfees) from tbl_university_courses_fees_title where uni_courseid=tbl_university_courses.id) as totalfees,(select currencytype from tbl_countrymaster where id IN (select country from tbl_university_location where id=tbl_university_courses.locationid)) as currencytype,(select countryname from tbl_countrymaster where id IN (select country from tbl_university_location where id=tbl_university_courses.locationid)) as countryname,(select statename from tbl_statemaster where id IN (select state from tbl_university_location where id=tbl_university_courses.locationid)) as statename,(select cityname from tbl_citymaster where id IN (select city from tbl_university_location where id=tbl_university_courses.locationid)) as cityname');
		$this->db->FROM('tbl_university_courses');
		$this->db->WHERE('id',$id);
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}

	function detailfavourite($id){
		$data = array();
		$this->db->SELECT('*');
		$this->db->FROM('tbl_addtofav');
		$this->db->WHERE('id',$id);
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}

	function detailinquiry($id){
		$data = array();
		$this->db->SELECT('*,(select userid from tbl_university_registration where uuid=tbl_applynow.university_id) as uniid');
		$this->db->FROM('tbl_applynow');
		$this->db->WHERE('id',$id);
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}


	function deletefavourite($id){

		$this->db->WHERE('id',$id);
		$this->db->DELETE('tbl_addtofav');
	}

	function deleteinquiry($id){

		$this->db->WHERE('id',$id);
		$this->db->DELETE('tbl_applynow');
	}

	function upadatecoursedate()
	{

		/*$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'])));
		$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'])));

		$data = array(
			'startdate'=>$startdate,
			'application_enddate'=>$enddate
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('tbl_university_courses',$data);*/

		$this->db->WHERE('courseid',$_POST['id']);
		$this->db->DELETE('tbl_course_intakes');

		$tot_row = $_POST['totrow'];

		for($i = 0 ; $i <= $tot_row ; $i++)
		{
			if(isset($_POST['startdate'][$i]))
			{
				$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'][$i])));
		        $enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'][$i])));

				$Q = $this->db->query("SELECT id FROM tbl_course_intakes WHERE courseid=".$_POST['id']." AND startdate='".$startdate."'");
				$count = $Q->num_rows();
  
				if($count == 0)
				{
					$intakes = array(
						'courseid' => $_POST['id'],
						'startdate' => $startdate,
						'application_enddate' => $enddate
					);

					$this->db->INSERT('tbl_course_intakes',$intakes);
				}
			}
		}
	}

	function getallstream()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_streammaster order by sortorder asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function getLevels()
	{
		$Q = $this->db->query("SELECT * FROM tbl_level ORDER BY id ASC");
		return $Q->result_array();
	}

	function getallcourses($streamid)
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_coursesmaster where streamid='.$streamid.' order by sortorder asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function getcurrencytype($locationid)
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_countrymaster where id in(select country from tbl_university_location where id="'.$locationid.'")');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}


  function newCheckUniversitycourse()
	{
		$data = array();

		$locationid = array();

		foreach($_POST['locationid'] as $row)
		{
			$this->db->SELECT('locationid');
			$this->db->FROM('tbl_university_courses');
			$this->db->WHERE('locationid',$row);
			$this->db->WHERE('courseid',$_POST['courseid']);
			$this->db->WHERE('universityid',$_POST['universityid']);
			$Q = $this->db->GET();

			if($Q->num_rows() > 0)
			{
				$data = $Q->row_array();
				$locationid[] = $data['locationid'];
			}
		}
		return $locationid;
	}

  function newCheckUniversitycourse_old()
	{
		$this->db->SELECT('id');
		$this->db->FROM('tbl_university_courses');
		$this->db->WHERE('courseid',$_POST['courseid']);
		$this->db->WHERE('universityid',$_POST['universityid']);
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

 // -------------------- Create university course Code --------------------------------

    function createuniversitycourse($flag)
	{
		//$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'])));
		//$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'])));

		$uni_couseid = array();

		if(isset($_POST['ispopular']) && $_POST['ispopular']==1)
		{
			$ispopular = 1;
		}
		else
		{
			$ispopular = 0;
		}
		
		if(count($flag)==0)
		{
			foreach($_POST['locationid'] as $locationList)
			{	
				$charid = strtoupper(md5(uniqid(rand(), true)));
				$hyphen = chr(45);// "-"
				$uuid = substr($charid, 0, 8).$hyphen
						.substr($charid, 8, 4).$hyphen
						.substr($charid,12, 4).$hyphen
						.substr($charid,16, 4).$hyphen
						.substr($charid,20,12);
				$data = array(
					'locationid' => $locationList,
					'courseid' => $_POST['courseid'],
					'universityid' => $_POST['universityid'],
					'courseduration' => $_POST['courseduration'],
					'coursedurationtype' => $_POST['coursedurationtype'],
					'amount' => $_POST['amount'],
					'amounttype' => $_POST['amounttype'],
					'level_id' => $_POST['levelid'],
					'description' => $_POST['description'],
					'subjects' => $_POST['subjects'],
					'credit' => $_POST['credit'],
					'mode' => $_POST['mode'],
					'distancelearning' => $_POST['distancelearning'],
					//'startdate'=>$startdate,
			        //'application_enddate'=>$enddate,
					'ispopular' => $ispopular,
					'courseuuid' => $uuid
				);

				$this->db->INSERT('tbl_university_courses',$data);
				$uni_courseid[] = $this->db->insert_id();
			}
		}
		else
		{
			$rResult = array_diff($_POST['locationid'],$flag);
			foreach($rResult as $locationList)
			{	
				$charid = strtoupper(md5(uniqid(rand(), true)));
				$hyphen = chr(45);// "-"
				$uuid = substr($charid, 0, 8).$hyphen
						.substr($charid, 8, 4).$hyphen
						.substr($charid,12, 4).$hyphen
						.substr($charid,16, 4).$hyphen
						.substr($charid,20,12);
				$data = array(
					'locationid' => $locationList,
					'courseid' => $_POST['courseid'],
					'universityid' => $_POST['universityid'],
					'courseduration' => $_POST['courseduration'],
					'coursedurationtype' => $_POST['coursedurationtype'],
					'amount' => $_POST['amount'],
					'amounttype' => $_POST['amounttype'],
					'level_id' => $_POST['levelid'],
					'description' => $_POST['description'],
					'subjects' => $_POST['subjects'],
					'credit' => $_POST['credit'],
					'mode' => $_POST['mode'],
					'distancelearning' => $_POST['distancelearning'],
					//'startdate'=>$startdate,
			        //'application_enddate'=>$enddate,
					'ispopular' => $ispopular,
					'courseuuid' => $uuid
				);

				$this->db->INSERT('tbl_university_courses',$data);
				$uni_courseid[] = $this->db->insert_id();
			}
		}


		$tot_row = $_POST['totrow'];
		$totcourseintakerow = $_POST['totcourseintakerow'];
		
		foreach($uni_courseid as $row)
		{
			for($j = 0 ; $j <= $totcourseintakerow ; $j++)
			{
				if(isset($_POST['startdate'][$j]))
				{
					$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'][$j])));
					$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'][$j])));

					$Q = $this->db->query("SELECT id FROM tbl_course_intakes WHERE courseid=".$row." AND startdate='".$startdate."'");
					$count = $Q->num_rows();
					if($count == 0)
					{
						$intakes = array(
							'courseid' => $row,
							'startdate' => $startdate,
							'application_enddate' => $enddate
						);

						$this->db->INSERT('tbl_course_intakes',$intakes);
					}
				}
			}

			for($i = 0 ; $i <= $tot_row ; $i++)
			{
				if(isset($_POST['eligibility_id'][$i]))
				{
					if($_POST['eligibility_id'][$i]!=7)
					{
						$Q = $this->db->query("SELECT id FROM tbl_university_course_eligibility WHERE uni_courseid=".$row." AND eligibility_id=".$_POST['eligibility_id'][$i]."");
					    $count = $Q->num_rows();
					}
					else
					{
						$count = 0;
					}
					if($count == 0)
					{
						$eligibility = array(
							'uni_courseid' => $row,
							'eligibility_id' => $_POST['eligibility_id'][$i],
							'eligibility' => $_POST['eligibility'][$i]
						);

						$this->db->INSERT('tbl_university_course_eligibility',$eligibility);
					}
				}
			}

			foreach($_POST['process'] as $row1)
			{
				$Qprocess = $this->db->query("SELECT id FROM tbl_university_course_process WHERE uni_courseid=".$row." AND process=".$row1."");
			    $countprocess = $Qprocess->num_rows();

				if($countprocess == 0)
				 {
					$process = array(
						'uni_courseid' => $row,
						'process' => $row1
					);
					$this->db->INSERT('tbl_university_course_process',$process);
				 }
			}

			/*foreach($_POST['subjects'] as $row2)
			{
				$Qsubjects = $this->db->query("SELECT id FROM tbl_university_course_subjects WHERE uni_courseid=".$row." AND subjects='".$row2."'");
			    $countsubjects = $Qsubjects->num_rows();

				if($countsubjects == 0)
				 {
					$subjects = array(
						'uni_courseid' => $row,
						'subjects' => $row2
					);
					$this->db->INSERT('tbl_university_course_subjects',$subjects);
				 }
			}*/
		}
	}

	function createuniversitycourse_old()
	{
		$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'])));
		$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'])));

		$data = array(
			'courseid' => $_POST['courseid'],
			'universityid' => $_POST['universityid'],
			'courseduration' => $_POST['courseduration'],
			'startdate'=>$startdate,
			'application_enddate'=>$enddate
		);

		$this->db->INSERT('tbl_university_courses',$data);
		$uni_courseid = $this->db->insert_id();

		foreach($_POST['eligibility'] as $row)
		{
			$eligibility = array(
				'uni_courseid' => $uni_courseid,
				'eligibility' => $row
			);
			$this->db->INSERT('tbl_university_course_eligibility',$eligibility);
		}

		foreach($_POST['process'] as $row1)
		{
			$process = array(
				'uni_courseid' => $uni_courseid,
				'process' => $row1
			);
			$this->db->INSERT('tbl_university_course_process',$process);
		}
	}

	function course_eligibility($id){
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_university_course_eligibility WHERE uni_courseid="'.$id.'"');
		if($Q->num_rows > 0){
			$data = $Q->result_array();
		}
		return $data;
	}

	function course_process($id){
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_university_course_process WHERE uni_courseid="'.$id.'"');
		if($Q->num_rows > 0){
			$data = $Q->result_array();
		}
		return $data;
	}

	function course_subjects($id){
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_university_course_subjects WHERE uni_courseid="'.$id.'"');
		if($Q->num_rows > 0){
			$data = $Q->result_array();
		}
		return $data;
	}

  // -------------------- Edit universitycourse Code ---------------------------

    function edituniversitycourse()
	{
		$uni_courseid=$_POST['id'];

		//$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'])));
		//$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'])));

		if(isset($_POST['ispopular']) && $_POST['ispopular']==1)
		{
			$ispopular = 1;
		}
		else
		{
			$ispopular = 0;
		}

		$data = array(
			'courseduration' => $_POST['courseduration'],
			'coursedurationtype' => $_POST['coursedurationtype'],
			'amount' => $_POST['amount'],
			'amounttype' => $_POST['amounttype'],
			'level_id' => $_POST['levelid'],
			'description' => $_POST['description'],
			'subjects' => $_POST['subjects'],
			'credit' => $_POST['credit'],
			'mode' => $_POST['mode'],
			'distancelearning' => $_POST['distancelearning'],
			//'startdate'=>$startdate,
			//'application_enddate'=>$enddate,
			'ispopular' => $ispopular
		);

		$this->db->WHERE('id',$_POST['id']);
		$this->db->UPDATE('tbl_university_courses',$data);

		$this->db->WHERE('uni_courseid',$_POST['id']);
		$this->db->DELETE('tbl_university_course_eligibility');

		$this->db->WHERE('uni_courseid',$_POST['id']);
		$this->db->DELETE('tbl_university_course_process');

		$this->db->WHERE('uni_courseid',$_POST['id']);
		$this->db->DELETE('tbl_university_course_subjects');

		$this->db->WHERE('courseid',$_POST['id']);
		$this->db->DELETE('tbl_course_intakes');

    
		$tot_row = $_POST['totrow'];

		for($i = 0 ; $i <= $tot_row ; $i++)
		{
			if(isset($_POST['eligibility_id'][$i]))
			{
				if($_POST['eligibility_id'][$i]!=7)
				{
					$Q = $this->db->query("SELECT id FROM tbl_university_course_eligibility WHERE uni_courseid=".$uni_courseid." AND eligibility_id=".$_POST['eligibility_id'][$i]."");
					$count = $Q->num_rows();
				}
				else
				{
					$count = 0;
				}

				if($count == 0)
				{
					$eligibility = array(
						'uni_courseid' => $uni_courseid,
						'eligibility_id' => $_POST['eligibility_id'][$i],
						'eligibility' => $_POST['eligibility'][$i]
					);

					$this->db->INSERT('tbl_university_course_eligibility',$eligibility);
				}
			}
		}

		foreach($_POST['process'] as $row1)
			{
				$Qprocess = $this->db->query("SELECT id FROM tbl_university_course_process WHERE uni_courseid=".$uni_courseid." AND process='".$row1."'");
			    $countprocess = $Qprocess->num_rows();

				if($countprocess == 0)
				 {
					$process = array(
						'uni_courseid' => $uni_courseid,
						'process' => $row1
					);
					$this->db->INSERT('tbl_university_course_process',$process);
				 }
			}

		/*foreach($_POST['subjects'] as $row2)
			{
				$Qsubjects = $this->db->query("SELECT id FROM tbl_university_course_subjects WHERE uni_courseid=".$uni_courseid." AND subjects='".$row2."'");
			    $countsubjects = $Qsubjects->num_rows();

				if($countsubjects == 0)
				 {
					$subjects = array(
						'uni_courseid' => $uni_courseid,
						'subjects' => $row2
					);
					$this->db->INSERT('tbl_university_course_subjects',$subjects);
				 }
			}*/
	}

	function edituniversitycourse_old()
	{
		$uni_courseid=$_POST['id'];

		$startdate=implode("-", array_reverse(explode("/", $_POST['startdate'])));
		$enddate=implode("-", array_reverse(explode("/", $_POST['application_enddate'])));

		$data = array(
			'courseduration' => $_POST['courseduration'],
			'startdate'=>$startdate,
			'application_enddate'=>$enddate
		);

		$this->db->WHERE('id',$_POST['id']);
		$this->db->UPDATE('tbl_university_courses',$data);

		$this->db->WHERE('uni_courseid',$_POST['id']);
		$this->db->DELETE('tbl_university_course_eligibility');

		$this->db->WHERE('uni_courseid',$_POST['id']);
		$this->db->DELETE('tbl_university_course_process');

		foreach($_POST['eligibility'] as $row)
		{
			$eligibility = array(
				'uni_courseid' => $uni_courseid,
				'eligibility' => $row
			);
			$this->db->INSERT('tbl_university_course_eligibility',$eligibility);
		}

		foreach($_POST['process'] as $row1)
		{
			$process = array(
				'uni_courseid' => $uni_courseid,
				'process' => $row1
			);
			$this->db->INSERT('tbl_university_course_process',$process);
		}
	}

   // -------------------- Delete University Course Code ---------------------------

	function deleteuniversitycourse($id){

		$this->db->WHERE('uni_courseid',$id);
		$this->db->DELETE('tbl_university_course_eligibility');

		$this->db->WHERE('uni_courseid',$id);
		$this->db->DELETE('tbl_university_course_process');

		$this->db->WHERE('uni_courseid',$id);
		$this->db->DELETE('tbl_university_course_subjects');

		$this->db->WHERE('courseid',$id);
		$this->db->DELETE('tbl_course_intakes');

		$data = array();
		$Q = $this->db->QUERY('SELECT id FROM tbl_university_courses_fees_title WHERE uni_courseid="'.$id.'"');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				if($row['id']!="" || $row['id']!=NULL)
				{
					$this->db->WHERE('feestitleid',$row['id']);
					$this->db->DELETE('tbl_university_course_fees');
				}
			}
		}

		$this->db->WHERE('uni_courseid',$id);
		$this->db->DELETE('tbl_university_courses_fees_title');

		$this->db->WHERE('id',$id);
		$this->db->DELETE('tbl_university_courses');
	}

	function countbindcoursefeesvalue($uni_courseid)
	 {
		$data = array();
		$Q = $this->db->select('id FROM tbl_university_courses_fees_title  where uni_courseid="'.$uni_courseid.'"  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindcoursefeesvalue($uni_courseid,$limit, $start)
	{
		$data = array();
		$Q = $this->db->select('cf.id,cf.title,cf.totalfees,(select title from tbl_coursesmaster where id IN(select courseid from tbl_university_courses where id=cf.uni_courseid)) as course from tbl_university_courses_fees_title cf where cf.uni_courseid="'.$uni_courseid.'" order by id desc');

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function checkunique()
	{
		$Q = $this->db->query('SELECT title FROM tbl_university_courses_fees_title where title="'.$this->input->post('title').'" and uni_courseid="'.$this->input->post('uni_courseid').'"');

		if ($Q->num_rows() > 0)
		{
			return true; 
		} 
		else
		{
			return false; 
		}
	}

	function newCheckUniversitycoursefeestitle()
	{
		$this->db->SELECT('id');
		$this->db->FROM('tbl_university_courses_fees_title');
		$this->db->WHERE('title',$_POST['title']);
		$this->db->WHERE('uni_courseid',$_POST['uni_courseid']);
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// -------------------- Create university course Fees Code --------------------------------

	function createuniversitycoursefees()
	{
		$data = array(
			'title' => $_POST['title'],
			'uni_courseid' => $_POST['uni_courseid'],
			'totalfees' => $_POST['totalfees']

		);

		$this->db->INSERT('tbl_university_courses_fees_title',$data);
		$feestitleid = $this->db->insert_id();

		$count  = $_POST['totrow1'];

		for($i = 0 ; $i <= $count ; $i++) 
			{
				if(isset($_POST['feestitle'][$i])) 
				{
					$this->db->SELECT('id');
					$this->db->FROM('tbl_university_course_fees');
					$this->db->WHERE('feestitle',$_POST['feestitle'][$i]);
					$this->db->WHERE('feestitleid',$feestitleid);
					$Q = $this->db->GET();
					$numrow=$Q->num_rows();

					if($numrow==0)
					{
						$fees = array(
						'feestitleid' => $feestitleid,
						'feestitle' => $_POST['feestitle'][$i],
						'feesamount' => $_POST['amount1'][$i]
						);
					   $this->db->INSERT('tbl_university_course_fees',$fees);
					}
				}
			}
	}

	// -------------------- Edit universitycourse fees Code ---------------------------
	function edituniversitycoursefees()
	{
		$feestitleid=$_POST['id'];

		$data = array(
			'title' => $_POST['title'],
			'totalfees' => $_POST['totalfees']

		);

		$this->db->WHERE('id',$_POST['id']);
		$this->db->UPDATE('tbl_university_courses_fees_title',$data);

		$this->db->WHERE('feestitleid',$feestitleid);
		$this->db->DELETE('tbl_university_course_fees');


		//$count=count($_POST['feestitle']);
		$count  = $_POST['totrow1'];

		for($i = 0 ; $i <= $count ; $i++) 
			{
				if(isset($_POST['feestitle'][$i])) 
				{
					$this->db->SELECT('id');
					$this->db->FROM('tbl_university_course_fees');
					$this->db->WHERE('feestitle',$_POST['feestitle'][$i]);
					$this->db->WHERE('feestitleid',$feestitleid);
					$Q = $this->db->GET();
					$numrow=$Q->num_rows();

					if($numrow==0)
					{
						$fees = array(
						'feestitleid' => $feestitleid,
						'feestitle' => $_POST['feestitle'][$i],
						'feesamount' => $_POST['amount1'][$i]
						);
					   $this->db->INSERT('tbl_university_course_fees',$fees);
					}
				}
			}
	}

	function detailuniversitycoursefees($id){
		$data = array();
		$this->db->SELECT('*');
		$this->db->FROM('tbl_university_courses_fees_title');
		$this->db->WHERE('id',$id);
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}

	function course_feesstructure($id){
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_university_course_fees WHERE feestitleid="'.$id.'"');
		if($Q->num_rows > 0){
			$data = $Q->result_array();
		}
		return $data;
	}

	function checkuniquebyid()
	{
		$Q = $this->db->query('SELECT title FROM tbl_university_courses_fees_title where title="'.$this->input->post('title').'" and id!="'.$_POST['id'].'" and uni_courseid="'.$this->input->post('uni_courseid').'"');

		if ($Q->num_rows() > 0)
		{
			return true; 
		} 
		else
		{
			return false; 
		}
	}

	// -------------------- Delete University Course Code ---------------------------

	function deleteuniversitycoursefees($id){

		$this->db->WHERE('feestitleid',$id);
		$this->db->DELETE('tbl_university_course_fees');

		$this->db->WHERE('id',$id);
		$this->db->DELETE('tbl_university_courses_fees_title');
	}

	function getAllStreams()
	{
		$Q = $this->db->query("SELECT id,title FROM tbl_streammaster WHERE isactive=1 ORDER BY sortorder ASC");
		return $Q->result_array();
	}

	function getUniversityStreams($id)
	{
		$Q = $this->db->query("SELECT * FROM tbl_university_faculties WHERE university_id = (SELECT id FROM tbl_university_registration WHERE uuid='".$id."')");

		return $Q->result_array();
	}

	function getUniversityRecognition($id)
	{
		$Q = $this->db->query("SELECT * FROM tbl_university_recognition WHERE university_id = (SELECT id FROM tbl_university_registration WHERE uuid='".$id."')");

		return $Q->result_array();
	}

	function countbindlocationvalue()
	 {
		$fuuid=$this->session->userdata('fuuid');
		$data = array();
		$Q = $this->db->select('id FROM tbl_university_location where universityid="'.$fuuid.'"  order by id desc');

		$Q =  $this->db->get();

		return $Q->num_rows();
	}

	function Getbindlocationvalue($limit, $start)
	{
		$fuuid=$this->session->userdata('fuuid');

		$data = array();
		$Q = $this->db->select("id,campus_name,locationuuid,(select universityname from tbl_university_registration where uuid=tbl_university_location.universityid) as universityname,(select countryname from tbl_countrymaster where id=tbl_university_location.country) as countryname,(select statename from tbl_statemaster where id=tbl_university_location.state) as statename,(select cityname from tbl_citymaster where id=tbl_university_location.city) as cityname FROM tbl_university_location where universityid='".$fuuid."' order by id desc");

		$Q = $this->db->limit($limit, $start);
		$Q = $this->db->get();

		//echo $this->db->last_query();


		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function check_campusname()
	{
		$Q = $this->db->query("SELECT id FROM tbl_university_location WHERE campus_name='".$_POST['campus_name']."'");
		return $Q->num_rows();
	}

	function check_campusname_edit()
	{
		$Q = $this->db->query("SELECT id FROM tbl_university_location WHERE campus_name='".$_POST['campus_name']."' AND id!='".$_POST['id']."'");
		return $Q->num_rows();
	}

	function newCheckUniversitylocation()
	{
		$this->db->SELECT('id');
		$this->db->FROM('tbl_university_location');
		$this->db->WHERE('country',$_POST['countryid']);
		$this->db->WHERE('state',$_POST['stateid']);
		$this->db->WHERE('city',$_POST['cityid']);
		$this->db->WHERE('universityid',$_POST['universityid']);
		$Q = $this->db->GET();
		return $Q->num_rows();
	}

	// -------------------- Create university location Code --------------------------------

	function createuniversitylocation(){

		if($_POST['other_information']!="" || $_POST['other_information']!=NULL){
			$other_information = $_POST['other_information'];
		}else{
			$other_information = "";
		}

		if($_POST['website']!="" || $_POST['website']!=NULL){
			$website = $_POST['website'];
		}else{
			$website = "";
		}

		if($_POST['countrycode']!='')
		{
			$phone = $_POST['countrycode'].'-'.$_POST['phone'];
		}
		else
		{
			$phone = $_POST['phone'];
		}

		if(isset($_POST['ismain']) && $_POST['ismain']==1)
		{
			$this->db->query("UPDATE tbl_university_location SET ismain=0 WHERE universityid = (SELECT uuid FROM tbl_university_registration WHERE userid=".$this->session->userdata('fuserid').")");
			$ismain = 1;
		}
		else
		{
			$ismain = 0;
		}

		$currentdate=date("Y-m-d H:i:s");

		$locationQuuid = $this->db->query("SELECT uuid() as id");

		if ($locationQuuid->num_rows() > 0)
		{
			$datauuid = $locationQuuid->row_array();
			$locationuuid=$datauuid["id"];
		}

		$data = array(
			'campus_name' => $_POST['campus_name'],
			'name' => $_POST['name'],
			'address' => $_POST['address'],
			'email' => $_POST['email'],
			'phone' => $phone,
			'insertdate' => date('Y-m-d'),
			'universityid' => $_POST['universityid'],
			'other_information' => $other_information,
			'website' => $website,
			'country' => $_POST['countryid'],
			'state' => $_POST['stateid'],
			'city' => $_POST['cityid'],
			'zipcode' => $_POST['zipcode'],
			'event_title' => $_POST['event_title'],
			'locationuuid' => $locationuuid,
			'latitude'	=> $_POST['latitude'],
			'longitude' => $_POST['longitude'],
			'ismain'	=> $ismain
			//'opening_time' => $_POST['opening_time'],
			//'closing_time' => $_POST['closing_time'],
			//'action_date' => $currentdate,
			//'userstatus' => 1
			
		);

		$this->db->INSERT('tbl_university_location',$data);
	}

	function detailuniversitylocation($id){
		$data = array();
		$this->db->SELECT('*,(select universityname from tbl_university_registration where uuid=tbl_university_location.universityid) as universityname,(select countryname from tbl_countrymaster where id=tbl_university_location.country) as countryname,(select statename from tbl_statemaster where id=tbl_university_location.state) as statename,(select cityname from tbl_citymaster where id=tbl_university_location.city) as cityname');
		$this->db->FROM('tbl_university_location');
		$this->db->WHERE('locationuuid',$id);
		$Q = $this->db->GET();
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}
		$Q->free_result();  
		return $data; 
	}

	// -------------------- Edit universitylocation Code ---------------------------
	function edituniversitylocation()
	{
		if($_POST['other_information']!="" || $_POST['other_information']!=NULL){
			$other_information = $_POST['other_information'];
		}else{
			$other_information = "";
		}

		if($_POST['website']!="" || $_POST['website']!=NULL){
			$website = $_POST['website'];
		}else{
			$website = "";
		}

		if($_POST['countrycode']!='')
		{
			$phone = $_POST['countrycode'].'-'.$_POST['phone'];
		}
		else
		{
			$phone = $_POST['phone'];
		}

		if(isset($_POST['ismain']) && $_POST['ismain']==1)
		{
			$this->db->query("UPDATE tbl_university_location SET ismain=0 WHERE id=".$_POST['id']."");
			$ismain = 1;
		}
		else
		{
			$ismain = 0;
		}

		$data = array(
			'campus_name' => $_POST['campus_name'],
			'name' => $_POST['name'],
			'address' => $_POST['address'],
			'email' => $_POST['email'],
			'phone' => $phone,
			'other_information' => $other_information,
			'website' => $website,
			'event_title' => $_POST['event_title'],
			'latitude'	=> $_POST['latitude'],
			'longitude'	=> $_POST['longitude'],
			'ismain'	=> $ismain,
		);

		$this->db->WHERE('id',$_POST['id']);
		$this->db->UPDATE('tbl_university_location',$data);
	}

	// -------------------- Delete University Location Code ---------------------------

	function deleteuniversitylocation($id){

		// Delete University course all data start.....
       
		$datacourse = array();
        $Qcourse = $this->db->QUERY('SELECT id FROM tbl_university_courses WHERE locationid="'.$id.'"');
		if ($Qcourse->num_rows() > 0)
		{
			foreach ($Qcourse->result_array() as $rowcourse)
			{
				if($rowcourse['id']!="" || $rowcourse['id']!=NULL)
				{
					$this->db->WHERE('uni_courseid',$rowcourse['id']);
					$this->db->DELETE('tbl_university_course_eligibility');

					$this->db->WHERE('uni_courseid',$rowcourse['id']);
					$this->db->DELETE('tbl_university_course_process');

					$this->db->WHERE('uni_courseid',$rowcourse['id']);
		            $this->db->DELETE('tbl_university_course_subjects');

					$this->db->WHERE('courseid',$rowcourse['id']);
		            $this->db->DELETE('tbl_course_intakes');

					$datacourses_fees = array();
					$Qcourses_fees = $this->db->QUERY('SELECT id FROM tbl_university_courses_fees_title WHERE uni_courseid="'.$rowcourse['id'].'"');
					if ($Qcourses_fees->num_rows() > 0)
					{
						foreach ($Qcourses_fees->result_array() as $rowcourses_fees)
						{
							if($rowcourses_fees['id']!="" || $rowcourses_fees['id']!=NULL)
							{
								$this->db->WHERE('feestitleid',$rowcourses_fees['id']);
								$this->db->DELETE('tbl_university_course_fees');
							}
						}
					}

					$this->db->WHERE('uni_courseid',$rowcourse['id']);
					$this->db->DELETE('tbl_university_courses_fees_title');
				}
			}
		}

		$this->db->WHERE('locationid',$id);
		$this->db->DELETE('tbl_university_courses');


		$this->db->WHERE('id',$id);
		$this->db->DELETE('tbl_university_location');	
	}

	function get_campus_location($id)
	{
		$Q = $this->db->query("SELECT id,campus_name FROM tbl_university_location WHERE universityid='".$id."'");
		return $Q->result_array();
	}

	function get_all_eligibility()
	{
		$Q = $this->db->query("SELECT * FROM tbl_eligibilitymaster");
		return $Q->result_array();
	}

	function checkEligibility()
	{
		$Q = $this->db->query("SELECT title FROM tbl_eligibilitymaster WHERE id=".$_POST['id']."");
		return $Q->row_array();
	}

	function getEligibilityValues()
	{
		$Q = $this->db->query("SELECT * FROM tbl_eligibility_values WHERE eligibility_id=".$_POST['id']."");
		return $Q->result_array();
	}

	function getallstateofindia()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_statemaster where countryid=15 order by statename asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function getalleducationinterest()
	{
		$data = array();

		$Q = $this->db->query('SELECT * from tbl_streammaster order by title asc');

		//echo $this->db->last_query();die;
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		//print_r($data);die;
		$Q->free_result();
		return $data;
	}

	function GetbinddesiredcourseName($value)
	{
		$data = array();
		$Q = $this->db->select('* from tbl_coursesmaster where streamid="'.$value.'" order by title asc');

		$Q = $this->db->get();

		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function getuserprofilephotobyid($id)
	{
		$data = array();
		
		$Q = $this->db->query('SELECT profilephoto FROM tbl_registration where userid="'.$id.'"');
		
	  if ($Q->num_rows() > 0)
	  {
	   $data = $Q->row_array();
	  }
	  $Q->free_result();
	  return $data;
    }

	function course_intakes($id){
		$data = array();
		$Q = $this->db->query('SELECT * FROM tbl_course_intakes WHERE courseid="'.$id.'"');
		if($Q->num_rows > 0){
			$data = $Q->result_array();
		}
		return $data;
	}



}?>