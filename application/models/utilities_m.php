<?php
class utilities_m extends CI_Model
{
	function sendMail($from,$name,$to,$cc,$subject,$body,$attach)
	{
		//$to="kunal1990patel@gmail.com";
		//$cc="kunal1990patel@gmail.com";
		require_once('PHPMailerAutoload.php');
		$mail = new PHPMailer();
		//------Authentication Start
			/*$mail->IsSMTP();
			$mail->SMTPAuth   = TRUE;
			//$mail->SMTPSecure = "ssl";
			$mail->Host       = "hostname";    
			$mail->Port       = 25;                 
			$mail->Username   = "email address";
			$mail->Password   = "password";*/
		//------Authentication End


		//------Gmail Authentication Start
			$mail->IsSMTP();
			$mail->SMTPAuth   = TRUE;
			//$mail->SMTPSecure = "ssl";
			$mail->Host       = "mail.cyclingcities.in";    // sets GMAIL as the SMTP server
			$mail->Port       = 25;                 // set the SMTP port for the GMAIL server
			//$mail->Username   = "kunal@meghtechnologies.com";  // GMAIL username
			//$mail->Password   = "princepatel";
			$mail->Username   = "info@cyclingcities.in";  // GMAIL username
			$mail->Password   = "cannotaccess";
		//------Gmail Authentication End

		//------No Authentication Start
			/*$mail->Host       = "localhost";    // sets GMAIL as the SMTP server
			$mail->Port       = 25;                 // set the SMTP port for the GMAIL server*/
		//------No Authentication End


		$mail->SetFrom($from,$name);
		$mail->Subject = $subject;
		//$emailtop = site_url('assets/images/email_top.jpg');
		//$emailbottom = site_url('assets/images/email_bottom.jpg');
		//$mail->AddEmbeddedImage($emailtop, 'email_top', 'attachment', 'base64', 'image/jpeg');
		//$mail->AddEmbeddedImage($emailbottom, 'email_bottom', 'attachment', 'base64', 'image/jpeg');
		$mail->MsgHTML($body);
		$mail->isHTML(true);
		if($attach!="")
		{	
			 $mail->AddAttachment($attach);
		}

		// For multiple CC 
		/*$email_cc = array(
			   'hardik@meghtechnologies.com',
               'bhavesh@meghtechnologies.com',
			   'parth@meghtechnologies.com',
			   'yagnesh@meghtechnologies.com',
			   'nidhiatodaria@meghtechnologies.com',
          );

		foreach($email_cc as $email)
		{
		   $mail->AddCC($email);
		}*/

		// For single CC
		//$mail->AddCC($email);

		$mail->AddAddress($to);
		
		if(!$mail->Send()) {
		  log_message("debug","Mailer Error:".$mail->ErrorInfo);
		  echo "Mailer Error: " . $mail->ErrorInfo;
		 // die;
		}
		else{
		}
	}


	function attachment($path)
	{
		if($_FILES['resume']['name'] != "")
			 {	
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'pdf|doc|docx';
					$config['max_size'] = "";
					$config['remove_spaces'] = true;
					$config['overwrite'] = false;
					$config['encrypt_name'] = false;
					$this->load->library('upload');
					$this->upload->initialize($config); 	
								
					if (!$this->upload->do_upload('resume'))
					{
						$flag1=false;
						$error = array('warning' =>  $this->upload->display_errors());
						$this->session->set_flashdata('error',($error[warning]));					
						redirect('career','refresh');				
					}
					else
					{
						$image = $this->upload->data();
					
						$attach = FCPATH.$path.$image['file_name'];	

						return $attach;
					}
			 }
			 else
			 {
				 return '';
			 }
	}
}
?>