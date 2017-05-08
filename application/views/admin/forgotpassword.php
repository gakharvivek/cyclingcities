<? include ($_SERVER['DOCUMENT_ROOT']."/admin/config.php"); ?>
<? include ($ADMIN_INC_PATH."/common.php"); ?>
 <? include('/../class.phpmailer.php');?> 
 
 <? 
 if(!empty($_REQUEST['title']))
 {
 
 	 
 	$selectmail = "select * from config where id=1"; 
	
	$res=   mysql_query($selectmail,$conn);
	$rw = mysql_fetch_array($res);

	$logindata = "select * from login where id='1'";
	$data=   mysql_query($logindata,$conn); 
	$rows=mysql_fetch_array($data);
	$pwd=$rows['password1'];
	$uname=$rows['username'];
	 
    if($_REQUEST['title']==$rows['username'])
	{
		$flag=1;
		
		
	}
	else 
	{
		//$flag=2;
		header("location:forgotpassword.php?flag=2");
	}
 
 if($flag==1)
 { 
 			 $mailbody="<table width=100% border=0 cellspacing=2 cellpadding=2>
						  <tr bgcolor=#3399FF align=left>
							<td height=33 colspan=2 align=center><strong><font color='#fff'>Account Details</font> </strong></td>
						  </tr>
						  <tr align=left>
							<td width=49% align=left><strong>Username</strong></td>
							<td width=51%  align=left>".$uname."</td>
						  </tr>
						  <tr align=left>
							<td align=left><strong>Password</strong></td>
							<td align=left>". $pwd."</td>
						  </tr>  
						  <tr bgcolor=#3399FF align=left>
							<td align=left> </td>
							<td align=left> </td>
						  </tr>  
						  </table>"; 
				 		//echo $mailbody;exit();
						 
						$to = $row['email'];
						$subject = 'Account Details';
						$mail = new PHPMailer(); // defaults to using php "mail()"
						$mail->From = $rw['frm']; //Sender address 
						$mail->FromName = MeghTechnologies;
						$HTML = true;
						//$mail->AddCC($rw['tocc']);
						//$mail->AddCC('accounts@ppmcorporate.com.au');
						//if($rw['isauthenticated']=="1")
						//{
								$mail->IsSMTP();
								$mail->SMTPAuth   = true;                  // enable SMTP authentication
								$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
								$mail->Host       = $rw['mailserver'];      // sets GMAIL as the SMTP server
								$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
								
								$mail->AddAddress($to); //The address you are sending mail to 
								//$mail->AddAttachment($imgname);
								$mail->Subject = $subject; //Subject of the mail 
								$mail->Body = $mailbody; //Body of the message
								//$mail->SMTPDebug  = 2;
								$mail->ContentType = "text/html";
								$mail->Username =$rw['username']; //valid email id of the domain 
								$mail->Password = $rw['pwd']; //password for abc@xyz
						//}	 
						$mail->IsHTML($HTML);
						$mail->Body = $mailbody;
						$mail->AddAddress($to);
						$mail->Subject = $subject;
					 
					   if(!$mail->Send()) 
					   { 
						    echo "Mailer Error: " . $mail->ErrorInfo;
					   }  
					   else
					   {
					   		 header("location:forgotpassword.php?flag=1");
					   }
							  	 
					}
		}
 					
 ?>
 
<script>
 
$().ready(function() {
 $("#form1").validate();
}); 

</script> 
<style type="text/css">
label.error {color: red; display:block; font-size:10px;}
</style>
 
<form name="form1" method="post" id="form1" action="forgotpassword.php">

<table width="968" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="containergraybgtop"></td>
        </tr>
        <tr>
          <td class="containergraybgcenter containerlogo">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><img src="/admin/images/img_logo_login.png" /></td>
                     
			</tr>
           </table>
          </td>
        </tr> 
         <tr>
            <td class="containerbgtop"></td>
          </tr>
        <tr>
          <td class="containerbgcenter breadcrumb">
           <? include ($ADMIN_INC_PATH."breadcrumb.php"); ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 15px 0px 0px;">
              <tr>
              <td valign="top"> 
                <? //include ($ADMIN_INC_PATH."sidemenu.php"); ?>
              </td>
              <td valign="top">
              					  <table width="691" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                  <td class="addusertopbg"></td>
                                </tr>
                                <tr>
                                 <td class="addusercenterbg"><h1>Forgot Password</h1> 
								 <?  
										$SelectStmt = "select * from login where id='1'";
									  	$result=   mysql_query($SelectStmt,$conn);
									 	if (!mysql_query($SelectStmt,$conn))
									 	{
											die('Error: ' . mysql_error());
										}
 									    $row = mysql_fetch_assoc($result);
							     ?>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="form">
                                     <?
						if(isset($Del) || $_REQUEST['flag'])
						{
							if($Del == 'TRUE' || $_REQUEST['flag']=='1') 
							{
							?>
                                          <tr bgcolor="#FF0000">
                                    <td class="warning" align="center">
                                    <div class="tick" align="left">Ensure that you can receive messages at your email address.</div>
                                    </td>
                                  </tr>
                                  
                          <?php 
							}			  
						}
						 ?>
                               <tr>
                                    <td> Enter your Username :*</td>
                                </tr>
                                <tr>
                                       <td>
                                  <input type="text" name="title" size="50" class="required " value="<? //echo $row['email'];?>"  />																																									</td>
                                    
                                </tr>
                                <? if($_REQUEST['flag']==2) {?>
                         <tr >
                          <td>
 							<div style="width:425px; color:#ffffff;background-color:#ab2929;">
                             <img src="/images/02_dashboard_03.png" style="margin: -5px 0; text-align:center; padding:0 0 2px 5px;" />  Your Username is invalid .&nbsp;Kindly enter your correct username.
                            </div>
                          </td>
                        </tr>
                       <? } ?>
 					  <tr>
                             <td>&nbsp;</td>
                     </tr>
                     <tr>
                      <td> 
						<input type="image" name="Submit" value="Submit" class="tboxnews" src=" /admin/images/btn_submit.png" >
                        &nbsp;<a href="index.php"><img src="/admin/images/btn_cancel.png" onclick="javaecript: history.go(-1)">
                                           </a> </input>                                            
                    </td>
                     </tr>
           </table>
         </td>
                    </tr>
                    <tr>
                      <td class="adduserbottombg"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            </td>
        </tr>
        <tr>
          <td class="containerbgbottom"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <? include ($ADMIN_INC_PATH."footer.php"); ?>
  </tr>
</table>
</form>
<script type="text/javascript">
function formCallback(result, form) {
	window.status = "valiation callback for form '" + form.id + "': result = " + result;
}
var valid = new Validation('form1', {immediate : true, onFormValidate : formCallback});
</script>
</body>
</html>
