<?
if (!session_id()) {
	session_start();
}
$login_url = $this->facebook->login_url();
if($this->facebook->is_authenticated()){
	// Get user facebook profile details
	$user_profile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
}
if(isset($user_profile) && count($user_profile)>0)
{
	log_message('debug',"values of session>>>>>>>".print_r($user_profile,true));
	log_message('debug',"sesssion".$_SESSION['fbuserid']);
	$fbid=$user_profile["id"];
	
	if (!isset($_SESSION['fbuserid']) || $_SESSION['fbuserid'] < 1)
		{
			log_message('debug',"inside query check");
			$Q2 = $this->db->query("select * from users_front where fbuserid='".$fbid."'");
			if ($Q2->num_rows() > 0)
			{
				$user = $Q2->row_array();
				$data = array(
					            'fbuserid' => $fbid,
								'fusername' => $user["username"],
								'fuserid' => $user["id"],
								'frontloggedin' => TRUE,
								'fname' => $user["firstname"],
								'lname' => $user["lastname"],
					            'fb_profile'=>$user_profile['picture']['data']['url']
							  );
				
				$this->session->set_userdata($data);
				log_message('debug',print_r($_SESSION,true));
			 ?>
				<script>
					//window.onload = function(){
					//window.opener.location.reload(true);
					//window.close();
					//}();
			   </script>
          <? //redirect('/','refresh');
          			
			 }
			else
			{			
				$vivek = $this->user_fm->addfacebookuser($user_profile);
				log_message('debug', print_r($vivek,true));
				redirect('personal_profile/edit_profile','refresh');
				
			}
	}else {
		$Q2 = $this->db->query("select * from users_front where fbuserid='".$_SESSION['fbuserid']."'");
		if ($Q2->num_rows() > 0)
		{
			$user = $Q2->row_array();
			$data = array(
			'fbuserid' => $fbid,
			'fusername' => $user["username"],
			'fuserid' => $user["id"],
			'frontloggedin' => TRUE,
			'fname' => $user["firstname"],
			'lname' => $user["lastname"],
			'fb_profile'=>$user_profile['picture']['data']['url']
			);

		$this->session->set_userdata($data);
		redirect('/','refresh');
		}
	}
}
?>

<?      
    require_once(APPPATH.'libraries/Google/autoload.php');
	$redirect_uri="http://localhost/cyclingcitynew/";
	$client = new Google_Client();
	$client->setClientId('630722179662-hrapl624hvm6stp3985thih52r4hdmmm.apps.googleusercontent.com');
	$client->setClientSecret('cIrf1vgkqn1URqVF_lR8CBHg');
	$client->setRedirectUri($redirect_uri);
	$client->addScope("email");
	$client->addScope("profile");
	$service = new Google_Service_Oauth2($client);

	if (isset($_GET['code'])) {
	  $client->authenticate($_GET['code']);
	  $_SESSION['access_token'] = $client->getAccessToken();
	  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
	  exit;
	}
    
	$authUrl= '';
	if (isset($_SESSION['access_token']) && $_SESSION['access_token']) 
	{
		 $client->setAccessToken($_SESSION['access_token']);
	} 
	else 
	{
		$authUrl= $client->createAuthUrl();
	}
?>
<div class="container">
  <div class="row">
    <div class="col-md-2 col-sm-6"><h2>NAVIGATE</h2>
    	<ul>
      			<li><a href="<? echo site_url('');?>" <? if($websitepagename=='' || $websitepagename=='index'){?> class="active"<? }?>>Home</a></li>
                <li><a href="<? echo site_url('aboutus');?>" <? if($websitepagename=='aboutus'){?> class="active"<? }?>>About Us</a></li>
                <li><a href="<? echo site_url('your_cycle');?>" <? if($websitepagename=='why_cycle' || $websitepagename=='know_your_cycle' || $websitepagename=='which_cycle' || $websitepagename=='try_cycle' || $websitepagename=='buycycle_usedcycle' || $websitepagename=='where_to_buy' ){?> class="active"<? }?>>Your Cycle</a></li>
                <li><a href="<? echo site_url('chronicles');?>"<? if($websitepagename=='chronicles' ){?> class="active"<? }?>>Cycling Cronicles</a></li>
                <li><a href="<? echo site_url('gallery');?>" <? if($websitepagename=='gallery' ){?> class="active"<? }?>>Gallery</a></li>
                <li><a href="<? echo site_url('contactus');?>" <? if($websitepagename=='contactus'){?> class="active"<? }?>>Contact Us</a></li>               
        </ul>
    </div>
    
     <div class="col-md-4 col-sm-6"><h2>Heading</h2>
    	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
    </div>
    <div class="col-md-2 col-sm-6"><h2 class="text-right marbtm10">CAll Us</h2>
    <span class="phonenum text-right">+91 265 1236598, <br/>+91 989 896 1234</span>
    <h2 class="text-right marbtm10">EMAIL US</h2>
    <span class="emailbtm"><a href="mailto:admin@cyclingcities.com">admin@cyclingcities.com</a></span>
    
    </div>
     <div class="col-md-3 col-sm-6"><h2 class="text-right marbtm10">REGISTERED OFFICE</h2>
    	<p class="address">A/01, COMPLEX, CROSS ROAD,<br/>
CITY, STATE - 390001.</p>
<div class="socialicons">
<a href="#" class="facebook"></a>
<a href="#" class="twitter"></a>
<a href="#" class="gplus"></a>
<a href="#" class="youtube"></a>
</div>
    </div>
    
  </div>
  
</div>

<script type="text/javascript">
	$().ready(function() {
		$("#registerform").validate();
		$("#form21").validate();
		$("#forgotform").validate();
		$("#rideform").validate();
		$("#feedback_form").validate();
		$("#newsletter_form").validate();
		
	});

	function validateregisterform()
    {
		if($("#registerform").valid())
		{
			var value = $('#email').val();

			if(value!="")
			 {
				var ans = $.ajax({
					url: "<?=site_url('user/checkusername')?>",
					data : {email: value},
					async: false
					}).responseText;
					var flag=ans;
					if(flag)
					  {
						 // alert(456);
						 document.getElementById('Usernameerror').style.display="none";
						 document.getElementById('email').style.border="0px";

						 var form=$("#registerform");

						 $.ajax({
							type : "POST",
							url : "<?php echo site_url('user/registerfrontuser')?>",
							//data : 'email=' + email + '&password=' + password,
							data: form.serialize(),
							success : function(data) {

							  //alert(data);
							  if(data!=0)
							  {
								 // alert(456);
								 $('#registerform')[0].reset();
								 $("#countryid").select2("val", "");
								 $("#stateid").select2("val", "");
								 $("#cityid").select2("val", "");
								 document.getElementById('Usernameerror').style.display="none";
								 document.getElementById('email').style.border="0px";
								 document.getElementById('registersucess').style.display="";
								  // return flag;
							  }
							  else
							  {
								 // alert('123');
								   document.getElementById('Usernameerror').style.display="";
								   document.getElementById('email').style.border="1px solid red";
								   var verificationby="This username is already registered with Cycling City.";
								   $('#Usernameerror').html(verificationby);
							  }
							}
						});	
					  }
					  else
					  {
						 // alert('123');
						   document.getElementById('Usernameerror').style.display="";
						   document.getElementById('email').style.border="1px solid red";
						   var verificationby="This username is already registered with Cycling City.";
						   $('#Usernameerror').html(verificationby);
						   //return flag;

					  }
			 }
			 else
			 {
				 var flag=false;
			 }
		}
    }

  function bindstate(value)
	  {
		  //alert(value);
		  if(value!="")
			{
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("stateid").innerHTML="";
						document.getElementById("stateid").innerHTML=xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET","<?=site_url('myaccount/bindstate')?>/"+value,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById("stateid").innerHTML='';
				document.getElementById("stateid").innerHTML='<option value="">Select State</option>';
			}
	  }

  function bindcity(value)
  {
	  //alert(value);
	  if(value!="")
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("cityid").innerHTML="";
					document.getElementById("cityid").innerHTML=xmlhttp.responseText;
				}
			}

			xmlhttp.open("GET","<?=site_url('myaccount/bindcity')?>/"+value,true);
			xmlhttp.send();
		}
		else
		{
			document.getElementById("cityid").innerHTML='';
			document.getElementById("cityid").innerHTML='<option value="">Select City</option>';
		}
  }


   function validateloginform() 
   {
	if ($('#form21').valid()) 
	{
		var form = $('#form21');
		$.ajax({
			type : "POST",
			url : "<?php echo  '../user/verifyloginUseremail'; ?>",
			//data : 'email=' + email + '&password=' + password,
			data: form.serialize(),
			success : function(data) {
				//alert("from verify user email   "+data);
				if (data == 2)
				 {
					//$("#forgotp").hide();
					//$("#login").show();
					$(".loginerror").hide();
					$(".loginalert").show();
					//$(".forgotlink").hide();
				 }
				else if (data == 3)
				 {
					//$("#forgotp").hide();
					//$("#login").show();
					$("#username").val('');
					$(".loginerror").show();
					$(".loginalert").hide();
					//$(".forgotlink").hide();
				 }
				else
				 {
					$.ajax({
							type : "POST",
							url : "<?php echo '../user/verifypopup'; ?>",
							//data : 'email=' + email + '&password=' + password,
							data: form.serialize(),
							success : function(data) {

								//alert("from popup"+data);
								if (data == 0)
				                {
									$(".loginerror").hide();
					                $(".loginalert").show();
								}

								if (data == 1)
				                {
									$("#username").val('');
									$("#password").val('');
									$(".loginerror").show();
									$(".loginalert").hide();
								}

								if (data == 2)
				                {
									window.location.href = "<?=site_url('dashboard');?>";
								}

								if (data == 3)
				                {
									window.location.href = "<?=site_url('dashboard');?>";
								}

								if (data == 4)
				                {
									var preurl=$('#txtpreviouspage').val();
									//alert(preurl);
									window.location.href = preurl;
								}
							}
						});
					//$("#forgotp").hide();
					//$("#login").show();
					//$(".forgotlink").show();
					$(".loginerror").hide();
					$(".loginalert").hide();
				 }

			}
		});
	}
   }

	function verificationemaillink()
	{
			if ($('#form2').valid())
			{
				var form = $('#form2');
				$.ajax({
					type : "POST",
					url : "<?php echo site_url('user/resendverification')?>",
					data: form.serialize(),
					success : function(data)
					{
						 if (data == 1)
						 {
							$(".sentlink").show();
							$(".activated").hide();
							$(".notfindrecord").hide();
						 }
						else if (data == 2)
						 {
							$(".activated").show();
							$(".sentlink").hide();
							$(".notfindrecord").hide();
						 }
						 else if (data == 3)
						 {
							$(".notfindrecord").show();
							$(".activated").hide();
							$(".sentlink").hide();
						 }
					}
				});
			}
	}

	function verifyshow()
	{
		$(".alert").hide();
		$("#login").hide();
		$("#verifyform").show();
	}

	function goBacklogin() 
	{
		$("#verifyform").hide();
		$("#login").show();
		$(".alert").hide();
	}

	function loginUserforgot() 
	{

		if ($('#forgotform').valid()) {
			//var email = $("#txtUsername").val();
			//var password = $("#txtPassword").val();
			var form = $('#forgotform');
			$.ajax({
				type : "POST",
				url : "<?php echo site_url('user/verifyemail')?>",
				//data : 'email=' + email + '&password=' + password,
				data: form.serialize(),
				success : function(data) {
					//alert(data);
					if (data == 2)
					 {
						$(".forgotloginalert").show();
					 }
					else if (data == 3)
					 {
						$(".forgotloginalert").hide();
						$("#txtforgotUsername").val('');
						$(".forgotloginerror").show();
						$(".forgotlink").hide();
					 }
					else
					 {
						$.ajax({
								type : "POST",
								url : "<?php echo site_url('user/sendforgotpasswordlink')?>",
								//data : 'email=' + email + '&password=' + password,
								data: form.serialize(),
								success : function(data) {
								}
							});
						
						$(".forgotlink").show();
						$(".forgotloginerror").hide();
						$(".forgotloginalert").hide();
					 }

				}
			});
		}
	}

	function loginUserPressforgot(event) 
	{
		if (event.keyCode == 13) {
			if ($('#forgotform').valid()) 
			{
				//var email = $("#txtUsername").val();
				//var password = $("#txtPassword").val();
				var form = $('#forgotform');
				$.ajax({
					type : "POST",
					url : "<?php echo site_url('user/verifyemail')?>",
					//data : 'email=' + email + '&password=' + password,
					data: form.serialize(),
					success : function(data) {
						//alert(data);
						if (data == 2)
						 {
							$(".forgotloginalert").show();
						 }
						else if (data == 3)
						 {
							$(".forgotloginalert").hide();
							$("#txtforgotUsername").val('');
							$(".forgotloginerror").show();
							$(".forgotlink").hide();
						 }
						else
						 {
							$.ajax({
									type : "POST",
									url : "<?php echo site_url('user/sendforgotpasswordlink')?>",
									//data : 'email=' + email + '&password=' + password,
									data: form.serialize(),
									success : function(data) {
									}
								});
							
							$(".forgotlink").show();
							$(".forgotloginerror").hide();
							$(".forgotloginalert").hide();
						 }

					}
				});
			}
		}
	}
</script>


<!-------------------------------------------------- login singup newsletter fwpassword----------------------------------->


<!-- Modal -->
<div id="myModallogin" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:600px;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body padbtm0 loginpopup">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
      <div class="row">
       <h1><strong>PLEASE LOGIN</strong>
TO USE OUR SERVICIES</h1>
<div class="facebookgplus">
	<a href='<?php echo $login_url;?>' class="facebook sociallinkspage">LOG IN WITH <strong>FACEBOOK</strong></a><a href="<?php echo $authUrl ?>" class="googleplus sociallinkspage">LOG IN WITH <strong>GOOGLE</strong></a>
</div>
<div class="orlogin">OR <strong>LOGIN WITH EMAIL</strong></div>
       <div> 

         <div id="login">
		      <div class="alert alert-info loginalert" style="display:none;">
		          You have not verified your email address yet. <a href="javascript:void(0);" onclick="verifyshow();">Click Here</a> to send verification link.
			  </div>
			  <div class="alert alert-info loginerror" style="display:none;">
				Your attempt to enter was not successful. Please try again.
			  </div>
			 <?php echo form_open('user/verify','name="form21" id="form21" enctype="multipart/form-data"'); ?>
				   <div class="popupcontent fntcentury mycycleii">
					<ul>
						 <li>
							<span class="wd50 verline_line"><input type="text" name="username" id="username" class="required" placeholder="Email" /></span>
							<span class="wd50"><input type="password" name="password" id="password" class="required" placeholder="Password" /></span>
							<?$page="";
							   if(isset($_SERVER["HTTP_REFERER"]))
								{	
								  $page=$_SERVER["HTTP_REFERER"];
								}
							?>
							<input type="hidden" name="txtpreviouspage" id="txtpreviouspage" value="<?=$_SERVER['REQUEST_URI'];?>" />
							<div class="clear"></div>
						</li>
						<li class="text-center pad15">
							 <!--  <input id="checkbox2" type="checkbox" name="checkbox" value="2"><label for="checkbox2">REMEMBER ME</label> -->
							  <span class="btnsubmitbox"><input type="button" value="Sign In" class="btnaddcycle" onclick="validateloginform();"/></span>
						</li>
						<li class="backnone">
						<span class="forgotpass">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#myModalforgot"><strong>FORGOT</strong> YOUR PASSWORD ?</a>
						<a href="javascript:void(0)" data-toggle="modal" data-target="#myModalsignup">DON'T HAVE ACCOUNT ? <strong>PLEASE SIGN UP</strong></a>
						</span>
						</li>
					</ul>
				   </div>
			 <? echo form_close(); ?>
		 </div>

		 <div id="verifyform" style="display:none;">
		        <div class="alert alert-info sentlink" style="display:none; width=100%">
					The email verification link has been sent to your E-mail.
				</div>

				<div class="alert alert-info activated" style="display:none;">
				   Your Email is already activated.
				</div>

				<div class="alert alert-danger notfindrecord" style="display:none;">
					We can not find this username in our record.
				</div>

				<?php echo form_open('user/verify','name="form2" id="form2" enctype="multipart/form-data"'); ?>
				   <div class="popupcontent fntcentury mycycleii">
					<ul>
						 <li>
						    <span class="wd50"><input type="text" name="verifyemail" id="verifyemail" class="required" placeholder="Username"/></span>
							<div class="clear"></div>
						</li>
						<li class="text-center pad15">
							 <span class="btnsubmitbox"><input type="button" value="Verify" class="btnaddcycle" onclick="verificationemaillink();"/></span>
					         <span class="btnsubmitbox"><input type="button" value="Login" class="btnaddcycle" onclick="goBacklogin();"/></span>
						</li>
						<li class="backnone"></li>
					</ul>
				   </div>
				<? echo form_close(); ?>
			  </div>
       </div>
       </div>
      </div>
      
    </div>

  </div>
</div>

<!-- Sign Up -->
<div id="myModalsignup" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:600px;">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-body padbtm0 loginpopup">
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		   <h1><strong>PLEASE SIGN UP</strong>TO USE OUR SERVICIES</h1>
			<div class="fnt16 text-center marbtm15"><u>WHY YOU SHOULD SIGN UP WITH US ?</u></div>
			<div class="facebookgplus">
				<a href="#" class="facebook sociallinkspage">LOG IN WITH <strong>FACEBOOK</strong></a><a href="#" class="googleplus sociallinkspage">LOG IN WITH <strong>GOOGLE</strong></a>
			</div>

		   <div class="orlogin">OR <strong>SIGN UP WITH EMAIL</strong></div>
		   <div>
		      
			<div class='error2' id="registererror" style="display:none;">Username already exists. Please enter a different Username</div>
			<div class='success2' id="registersucess" style="display:none;">Your registration has been completed successfully. Please verify your email address.</div>
		      <? echo form_open('user/register','name="registerform" id="registerform" enctype="multipart/form-data"');?>
			   <div class="popupcontent fntcentury mycycleii">
				<ul>
					<li>
						<span class="wd32 hrback verline_line">
						   <? $countryname=$this->myaccount_fm->getallcountryname();?>
						   <select name="countryid" id="countryid" class='myval required' onchange="bindstate(this.value);">
						          <option value=''>Select Country</option>
								  <? foreach($countryname as $list)
									  {?>
										<option value='<?=$list['id']?>' <?if($list['id']==101){?>selected<?}?>><?=$list['name']?></option>
									<?}?>
						   </select>
						</span>
						<span class="wd32 hrback verline_line">
						   <? $statename=$this->myaccount_fm->getallindiastate();?>
							<select name="stateid" id="stateid" class="myval" onchange="bindcity(this.value);">
								  <option Value="" >Select State</option>
								  <? foreach($statename as $list)
										  {?>
											<option value='<?=$list['id']?>'><?=$list['name']?></option>
										<?}?>
							</select>
						</span>
						<span class="wd32">
						   <select name="cityid" id="cityid" class="myval">
							  <option Value="" >Select City</option>
						  </select>
						</span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="wd50 verline_line"><input type="text" class="required" placeholder="First Name" name="fname" id="fname" maxlength="200" /></span>
						<span class="wd50 padleft15"><input type="text" class="required" placeholder="Last Name" name="lname" id="lname" maxlength="200" /></span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="wd50 verline_line">
						     <input type="text" name="email" id="email" class="email required" maxlength="200"  placeholder="Email"/>
							 <label  id="Usernameerror" style="display:none; font-size:12px!important; color:#ff0000; float:none;"></label >
						</span>
						<span class="wd50 "><input type="password" name="password" id="regpassword" class="required" minlength='5' placeholder="Password"/></span>
						<div class="clear"></div>
					</li>
					<li class="pad15">
						<span class="fnt11 blockdiv bold_link">By sign up for Cycling Cities, you agree to the <a href="<? echo site_url('termsofservice');?>">Terms of Service</a>.<br/>View our <a href="<? echo site_url('privacypolicy');?>">Privacy Policy</a>.</span>
					</li>           
					<li class="backnone padbtmnone">
					 <span class="btnsubmitbox" style="margin-top:25px;"><input type="button" value="Sign Up" class="btnaddcycle" onclick="validateregisterform();"/></span>
					</li>
				</ul>
			   </div>
			  <? echo form_close(); ?>
		   </div>
		  </div>
	  </div>
    </div>
  </div>
</div>

<!-- Add rides -->
<div id="myModaladdrides" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg"  style="max-width:850px;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body padbtm0 loginpopup">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
      <div class="row">
	  <? echo form_open('user/addride','name="rideform" id="rideform" enctype="multipart/form-data"');?>
		  <div>
		   <div class="popupcontent fntcentury mycycleii">
			<ul>
				<li>
				    <span class="wd40 verline_line btmbrdr2" >
					    <span class="ttle2" style="margin-top:12px;">RIDE TYPE</span>
						<span class="ttltext">
						  <select name="rtype" id="rtype" class="myval required">
							<option value="">Select</option>
							<option value="ride">Ride</option>
							<option value="event">Event</option>
						  </select>
						</span>
					</span>
					<span class="wd60 padleft15"><span class="ttle2" style="margin-top:12px;">ORGANIZED BY</span>
					<span class="ttltext"><input type="text" name="ride_organizer" id="ride_organizer" ></span></span>
					<div class="clear"></div>
				</li>

				<li>
					<span class="wd40 verline_line btmbrdr2">
						<span class="ttle2" style="margin-top:12px;">RIDE Title</span>
						<span class="ttltext">
						  <input type="text" name="ride_title" id="ride_title" class="required"/>
						</span>					
					</span>
					<span class="wd60 padleft15"><span class="ttle2" style="width:65%; margin-top:12px;">IF YOU ARE NOT A CYCLING CLUB, SPECIFY</span>
					<span class="ttltext" style="width:32%"><input type="text" name="not_cyclist" id="not_cyclist" placeholder="Write Text Here"/></span></span>
					<div class="clear"></div>
				</li>

				<li>
					<span class="wd40 verline_line btmbrdr2">
					    <span class="ttle2" style="margin-top:12px;">DATE</span>
						<span class="ttltext">
						  <input type="text" name="ride_date" id="ride_date" class="required"/>
						</span>	
					</span>
					<span class="wd60 padleft15"><span class="ttle2" style="width:65%; margin-top:12px;">TIME</span>
					<span class="ttltext" style="width:32%"><input type="text" name="ride_time" id="ride_time" class=""/></span></span>
					<div class="clear"></div>
				</li> 
					
				 <li class="addleadli42">
				 <span  class="btmbrdr" style="width:100%; display:inline-block;">
					<span class="hrback verline_line" style="width:100%; display:inline-block;"><span class="ttle2" style="margin-top:12px;">STARTING POINT</span><span class="ttltext"><input type="text" name="ride_start_point" id="ride_start_point" class="required"/></span></span>              
					</span>
				   <span  class="btmbrdr" style="width:100%; display:inline-block;">
					<span class="hrback verline_line" style="width:100%; display:inline-block;"><span class="ttle2" style="margin-top:12px;">END POINT</span><span class="ttltext"><input type="text" name="ride_end_point" id="ride_end_point" class="required"/></span></span>              
					</span>
				</li>
				<li class="addleadli50">
					<span class="hrback ">
					<textarea name="add_info" id="add_info" class="textareabox" placeholder="ADDITIONAL INFORMATION"></textarea>
					</span>
					
					<div class="clear"></div>
				</li>
				  <div class="clear"></div>
				<li><span class="wd40 verline_line btmbrdr2" ><span class="ttle2" style="margin-top:12px;">TOTAL DISTANCE</span>
					<span class="ttltext"><input type="text" name="ride_distance" id="ride_distance" /></span></span>
					<span class="wd60 padleft15">
					<table border="0" cellpadding="0" cellspacing="0" class="uploadfile" width="100%">
						<tr>
							<td class="verline_line"> <span class="input-group-btn"><span class="btn btn-primary btn-file">UPLOAD POSTER
							<input type="file"  name="ride_poster" id="ride_poster" />
				  
				  </span> </span></td>
							<td> <span class="input-group-btn"><span class="btn btn-primary btn-file">UPLOAD MAP IMAGE
				  <input type="file"  name="map_image" id="map_image"/>
				  <input type="hidden" name="ride_Active" value="1" />
				  </span> </span></td>
						</tr>
					</table>
					</span>
					<div class="clear"></div>
					</li>
				
						   
				<li class="backnone padbtmnone">
			   <span class="btnsubmitbox" style="margin-top:25px;"><input type="submit" value="Add Lead" class="btnaddcycle pull-right"/></span>
				</li>
			</ul>
		   </div>
		   </div>
		   </div>
		  </div>
	  </form>
      
    </div>

  </div>
</div>

<!-- Forgot Password -->
<div id="myModalforgot" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:600px;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body forgo padbtm0 forgotpassword loginpopup">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
      <div class="row">
       <h1><strong>Fotgot Password</strong></h1>
	<div class="fnt22 text-center marbtm15 redcolor pad35" >Forgot your password? Enter the email address of your account to reset your password,otherwise you can tyr again.</div>
       <div>
	            <div class="alert alert-info forgotloginalert" style="display:none;">
		          You have not verified your email address yet.
			    </div>
	            <div class="alert alert-info forgotloginerror" style="display:none;">
					You have entered a wrong username.
				</div>

				<div class="alert alert-info forgotlink" style="display:none; width=100%">
					A link has been sent to your registered email address to reset your password.
				</div>
	     <form id="forgotform" name="forgotform" method="post" style="margin:0px; padding:0px; width:auto;">
		   <div class="popupcontent fntcentury mycycleii">
			<ul>
				<li>
				<input type="text" name="txtforgotUsername" class="forgetpass required" id="txtforgotUsername" placeholder="EMAIL" value="" onkeypress="return loginUserPressforgot(event)" /> <input type="button" id="btnforgot" name="btnforgot" value="SEND" class="btnaddcycle" onClick="loginUserforgot()" >
				</li>
			</ul>
		   </div>
		 </form>
       </div>
       </div>
      </div>
      
    </div>

  </div>
</div>

<!-- Feedback model -->
<div id="myModalfeedback" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:450px;">
    <!-- Modal content-->
	<form action="<?php echo site_url('dashboard/sendfeedback');?>" name="feedback_form" id="feedback_form" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-body padbtm0 buyandseellpopup">
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		   <div class="col-md-12">
			   <div class="popupcontent fntcentury mycycleii">
				<h2>FEEDBACK</h2>
				<h5 class="text-center">Please share with us your experience about our services.We would like to hear about</h5>
                <h5 class="text-center"><span class="middle-heading1">problems, feature improvisations and general comments.</span></h5>
				<ul>
					<li>
					<textarea class="blacktextarea required" name="add_info" id="add_info" placeholder="Write your feedback here..."></textarea>
						<div class="clear"></div>
					</li>
					<li style="margin:0px; padding:0px; background:none;">
					<?$userid=$this->session->userdata('fuserid');?>
					<input type="hidden" name="user_id" id="user_id" value="<?=$userid?>" />
					<input type='hidden' name="post_date" value="<?php echo date('m/d/y'); ?>"/>
                    <input type="submit" value="Submit" class="btnaddcycle"/>
					</li>
				</ul>
			   </div>
		   </div>
		  </div>
      </div>
    </div>
    </form>
  </div>
</div>


<!-- News Letter 
<div id="mynewslettermodel" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:600px;">
    <div class="modal-content">
      <form action="<?php echo site_url('dashboard/sendnewsletter');?>" name="newsletter_form" id="newsletter_form" method="post" enctype="multipart/form-data">
		  <div class="modal-body forgo padbtm0 forgotpassword newsletter loginpopup"  style="min-height:550px;">
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		   <h1><strong>NEWSLETTER</strong></h1>
			<div class="fnt22 text-center marbtm15 redcolor pad35" >Sign up to receive the coupon 10% off for your first purchase via email and get informations.</div>
		   <div>
		   <div class="popupcontent fntcentury mycycleii">
			<ul>
				<li>
				<input type="text" name="newsletteremail" placeholder="EMAIL" class="forgetpass required"/> <input type="submit" name="btn_submit" value="SUBSCRIBE" class="btnaddcycle"/>
				</li>
			</ul>
			<span class="fnt15">Questions ? E-mail us at <a href="mailto:info@cyclingcities.in" class="redcolor"><strong>info@cyclingcities.in</strong></a></span>
		   </div>
		   </div>
		   </div>
		  </div>
	  <?php echo form_close(); ?>
      
    </div>

  </div>
</div>-->


<script type="text/javascript">
    $('input#ride_date').datepicker({
    });
  </script>
  <script type="text/javascript">
    $('#ride_time').wickedpicker({now: '8:16', twentyFour: false, title:
              'My Timepicker', showSeconds: true});
    //    $('.timepicker-24').wickedpicker({twentyFour: true});
  </script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1802727696618639',
	  //appId      : '1713078095682379',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
	function popup(url) {
		newwindow=window.open(url,'name','height=400,width=300');
		if (window.focus) {
			newwindow.focus()}
			return false; 
	}

	/*window.onload = function(){
		window.opener.location.reload(true);
		window.close();
	}(); */
</script>