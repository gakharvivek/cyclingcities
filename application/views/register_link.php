<!--Inner Content-->
<?php 
if (!session_id()) {
	session_start();
}
if($this->facebook->is_authenticated()){
	// Get user facebook profile details
	$user_profile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
}else{
	$user_profile = array();
}

//echo "<pre>";
//print_r($user_profile);
//echo "</pre>";
$Q = $this->db->query('select * from users_front where fbuserid="'.$fbid.'" AND email="'.$user_profile['email'].'"');

if($Q->num_rows() > 0)
{
	$this->session->set_flashdata('message','Welcome to Cycling City.');
	redirect('dashboard','refresh');
}
?>
<style>

</style>
<script type="text/javascript">
	$().ready(function() {
		$("#registerform").validate();
		$("#forgotform").validate();
		$("#formuserlogin").validate();
	});

  
function removevalidate()
{
	    var cityid = $('#cityid').val();
		var educationinterest = $('#educationinterest').val();
		var expectedyear = $('#expectedyear').val();
		var preferredcountryid = $('#preferredcountryid').val();
		var knowaboutus = $('#knowaboutus').val();

		if (cityid != '') 
		{
			$("#cityid").removeClass('errorClass');
		}
		else if (educationinterest != '') 
		{
			$(".bootrap_tage").removeClass('errorClass');
		}
		else if (expectedyear != '') 
		{
			$("#expectedyear").removeClass('errorClass');
		}
		else if (preferredcountryid != '') 
		{
			$("#preferredcountryid").removeClass('errorClass');
		}
		else if (knowaboutus != '') 
		{
			$("#knowaboutus").removeClass('errorClass');
		}
		else 
		{
			$("#cityid").addClass('errorClass');
			$(".bootrap_tage").addClass('errorClass');
			$("#expectedyear").addClass('errorClass');
			$("#preferredcountryid").addClass('errorClass');
			$("#knowaboutus").addClass('errorClass');
		}
	
}


  function validateregisterform()
  {
     var flag=false;

	// if($("#registerform").valid())
		//{
		    var cityid = $('#cityid').val();
			var educationinterest = $('#educationinterest').val();
			var expectedyear = $('#expectedyear').val();
			var preferredcountryid = $('#preferredcountryid').val();
			var knowaboutus = $('#knowaboutus').val();
			if (cityid != '' && educationinterest != '' && expectedyear != '' && preferredcountryid != '' && preferredcountryid != null && knowaboutus!='') 
			{
				$("#cityid").removeClass('errorClass');
				$(".bootrap_tage").removeClass('errorClass');
				$("#expectedyear").removeClass('errorClass');
				$("#preferredcountryid").removeClass('errorClass');
				$("#knowaboutus").removeClass('errorClass');

				//var value = $('#email').val();
				var value = $('#registeremail').val();

				if(value!="")
				 {
				   var flag=false;
				   //alert(value);

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
							  // return flag;
						  }
						  else
						  {
							 // alert('123');

							   var flag=false;
							   document.getElementById('Usernameerror').style.display="";
							   document.getElementById('email').style.border="1px solid red";
							   var verificationby="This email is already registered with Cycling Cities. If it's yours, <a href='<?=site_url('user/login')?>'><b>log in now</b></a>.";
							   $('#Usernameerror').html(verificationby);
							   //return flag;

						  }
				 }
				 else
				 {
					 var flag=false;
				 }
			}
			else 
			{
				if(cityid == "")
				{
					$("#cityid").addClass('errorClass');
				}
				if(educationinterest == "")
				{
					$(".bootrap_tage").addClass('errorClass');
				}
				if(expectedyear == "")
				{
					$("#expectedyear").addClass('errorClass');
				}
				if(preferredcountryid == null || preferredcountryid == "")
				{
					$("#preferredcountryid").addClass('errorClass');
				}
				if(knowaboutus == "")
				{
					$("#knowaboutus").addClass('errorClass');
				}
				
				var flag=false;
			}
		//}
		//else
		//{
		//	var flag=false;
		//}

		return flag;
  }

</script>
<div class="inner_contant_area">
 <section class="register_page">
	 <div class="container">
     <div class="maxwidth900">
	   <div class="row">
	      <div class="alert alert-info col-md-12 col-sm-12 col-xs-12 padding_div0px">
				 Your Facebook account is not linked with cycling city.
		  </div>
		  <div class="col-md-4 col-sm-5 col-xs-12 padding_div0px">
			<div class="login_content inquiry_form">

				<div class="alert alert-info sentlink" style="display:none; width=100%">
					The email verification link has been sent to your E-mail.
				</div>

				<div class="alert alert-info activated" style="display:none;">
				   Your Email is already activated.
				</div>

				<div class="alert alert-danger notfindrecord" style="display:none;">
					We can not find this username in our record.
				</div>

			  <div class="login_block" id="verifyform" style="display:none;">
				<?php echo form_open('user/verify','name="form2" id="form2" enctype="multipart/form-data"'); ?>

					<h1>Email Verification<span></span></h1>
					<div class="form-group">
					  <input type="text" name="verifyemail" id="verifyemail" class="form-control required" placeholder="Username"/>
					</div>
					 <input type="button" class="btn btn-default" value="Verify" name="btnsubmit" onClick="verificationemaillink()" />
					 <input name="btnsubmit" type="button" onclick="goBacklogin();" class="submit pull-right" value="Login" />
				<? echo form_close(); ?>
			  </div>

			  <div class="login_block" id="login">
				<?
					if ($this->session->flashdata('loginerror'))
					{
						echo "<div class='error2'>".$this->session->flashdata('loginerror')."</div><br/>";
					}

					if ($this->session->flashdata('infomsg'))
					{
						echo "<div class='info2'>".$this->session->flashdata('infomsg')."</div><br/>";
					}
				?>
				<div class="alert alert-info loginalert" style="display:none;">
				   You have not verified your username yet. Please verify.
				</div>

				<div class="alert alert-info loginerror" style="display:none;">
					Incorrect Username/Password combination.
				</div>

				<div class="alert alert-info forgotloginerror" style="display:none;">
					You have entered a wrong username.
				</div>

				<div class="alert alert-info forgotlink" style="display:none; width=100%">
					A link has been sent to your registered email address to reset your password.
				</div>

				<?php	echo form_open('user/loginFbMap', 'name="formuserlogin" id="formuserlogin" enctype="multipart/form-data"'); ?>
                           <h1>Link With Facebook<span></span></h1>
						    <div class="form-group">
							  <input type="text" name="username" id="username" class="form-control required" placeholder="Email" />
							</div>
							<div class="form-group">
							  <input type="password" name="password" id="password" class="form-control required" placeholder="Password" />
							</div>
							<input type="hidden" name="fbuserid_login" id="fbuserid_login" value="<?=$fbid?>">

						<div class="clearfix"></div>
						<a  href="javascript:void(0);" class="forgot_password forgot_password_logo" onclick="hide();">Forgot Password?</a>
						<a href="javascript:void(0);" title="Login with Facebook" onclick="loginFbMap();" class="pull-right fb_connect_btn">Login with Facebook</a> 
				<?php echo form_close(); ?>
			  </div>

			  <div class="clearfix"></div>
			  <div class="forgotpasword_block" id="forgotp" style="display: none">
				  <h1>Forgot Password<span></span></h1>
				   <form id="forgotform" name="forgotform" method="post" style="margin:0px; padding:0px; width:auto;">
					   <div class="form-group">
							<!-- <input type="text" class="form-control" name="fusername" id="fusername" placeholder="Email Address" /> -->
							<input type="text" name="txtforgotUsername" class="form-control required" id="txtforgotUsername" placeholder="Username" value="" onkeypress="return loginUserPressforgot(event)" />
					   </div>
						<input type="button" id="btnforgot" name="btnforgot" value="Submit" class="submit pull-left" onClick="loginUserforgot()" >
						<input type="button" value="Cancel" id="cancel" onclick="fhide();" class="cancel pull-right" />
				  <? echo form_close(); ?>
				  <div class="clearfix"></div>
			  </div>
		    </div>
		  </div>
		  <div class="col-md-8 col-sm-7 col-xs-12 padding_div0px">
			<div class="grey_box">
			  <div class="col-md-12 col-sm-12 col-xs-12 paddmobilenone" >
				<div class="row inquiry_form registerformmain">

				  <? if($this->session->flashdata('error')!="")
						{
							 echo "<div class='error2'>".$this->session->flashdata('error')."</div><br/>";
						}
					if($this->session->flashdata('message')!="")
						{
							 echo "<div class='success2'>".$this->session->flashdata('message')."</div><br/>";
						}?>

				  <? echo form_open('user/register','name="registerform" id="registerform" onsubmit="return validateregisterform();" enctype="multipart/form-data"');  ?>
					
					  <div class="col-md-6 col-sm-12 col-xs-12" id="studentfname">
						<div class="form-group">
						  <input type="text" class="form-control required" placeholder="First Name" name="fname" id="fname" maxlength="200" />
						</div>
					  </div>
					  <div class="col-md-6 col-sm-12 col-xs-12" id="studentlname">
						<div class="form-group">
						  <input type="text" class="form-control required" placeholder="Last Name" name="lname" id="lname" maxlength="200" />
						</div>
					  </div>

					  <div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						  <input type="text" class="form-control digits codewith required" placeholder="+" name="country_code" id="country_code" maxlength="4" />
						  <input type="text" class="form-control digits w205 required" placeholder="Phone" name="contactno" id="contactno" maxlength="10" minlength="10" />
						</div>
					  </div>

					  <div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						  <input type="text" name="registeremail" id="registeremail" class="form-control required email" maxlength="200"  placeholder="Email"/>
						  <label  id="Usernameerror" style="display:none; font-size:12px!important; color:#ff0000; float:none;"></label >
						</div>
					  </div>

					  <!-- <div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						  <input type="text" name="email" id="email" class="form-control required" maxlength="200"  placeholder="Username"/>
						  <label  id="Usernameerror" style="display:none; font-size:12px!important; color:#ff0000; float:none;"></label >
						</div>
					  </div> -->

					  <div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						  <input type="password" name="password" id="regpassword" class="form-control required" minlength='5' placeholder="Password"/>
						</div>
					  </div>
					  <div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						   <input type="password" name="cpassword" id="cpassword" class="form-control required" compareTo="password" minlength='5' onblur="comparepsw();" onchange="comparepsw();" placeholder="Confirm Password"/>
						</div>
					  </div>
					  
					  <div class="clear"></div>

					  
					  <!-- <div class="col-md-6 col-sm-12 col-xs-12 white_select" id="studentcountry">
						<div class="form-group">
							  <select name="countryid" id="countryid" class='myval required'>
								  <option value='15'>India</option>
							  </select>
						</div>
					  </div>
					  <div class="col-md-6 col-sm-12 col-xs-12 white_select" id="studentstate">
					    <? $statename=$this->myaccount_fm->getallstateofindia();?>
						<div class="form-group"><span id="divstate">
							  <select name="stateid" id="stateid" class='myval required' onchange="bindcity(this.value);">
								  <option value=''>Current state</option>
								  <? foreach($statename as $list)
									  {?>
										<option value='<?=$list['id']?>'><?=$list['statename']?></option>
									<?}?>
							  </select>
						</span></div>
					  </div>
					  <div class="col-md-6 col-sm-12 col-xs-12 white_select" id="studentcity">
						<div class="form-group"><span id="divcity">
						  <select name="cityid" id="cityid" class="myval required">
							  <option Value="" >Current city</option>
						  </select>
						</span></div>
					  </div>

					  <div class="col-md-6 col-sm-12 col-xs-12" id="studentzip">
						<div class="form-group">
						  <input type="text" class="form-control required" name="zip" id="zip" placeholder="Current Zip/Postal" maxlength="8" />
						</div>
					  </div> -->

					  
			
					  
					  <div class="col-md-12 col-sm-12 col-xs-12">
						<input type="submit" name="Register" value="Register" class="submit pull-right" />
					  </div>
					</div>
				  <? echo form_close(); ?>
			  </div>
			</div>
		  </div>
	   </div>
	 </div>
     </div>
 </section>
 <div class="clearfix"></div>
</div>
<!--End Inner Content-->

<script>
	function hide() {

		$("#forgotp").show();
		$("#login").hide();

	}

	function fhide()
	{
		$("#login").show();
		$("#forgotp").hide();
		$(".notfindrecord").hide();
		$(".activated").hide();
		$(".sentlink").hide();
		$(".loginalert").hide();
		$(".forgotloginerror").hide();
	}

	function comparepsw()
	{
		//alert(145);
	  var newpassword = jQuery('#regpassword').val();
	   var comparepassword = jQuery('#cpassword').val();

	   //alert(newpassword);
	   //alert(comparepassword);
	   if(newpassword == comparepassword)
		{
		   $('#cpassword').css('border', 'solid 1px #c9c9c9');
		}
	   else
		{
		 jQuery('#cpassword').val('');
		 $('#cpassword').css('border', 'solid 1px red');
		 return false;
	   }
	}

	function loaddata(value)
	{
		$('#btnsubmit').on('click', function()
		{
			 $("#form21").valid();
		});

		if ($('#form21').valid())
		{
			$.ajax
			({
			   type:"POST",
			   url:'<?=site_url('user/verifyusername')?>',
			   data: "valuee="+encodeURIComponent(value),
			   success: function(data)
				{
				   alert("done");
					/*if(data==1)
					{
						$("#fail").show();
						$("#succ").hide();
					}
					if(data==0)
					{
						$("#succ").show();
						$("#fail").hide();
						$('#email').val('');
					}*/
				}
		 })
		}
	}

	function loginUserPressforgot(event) {
		if (event.keyCode == 13) {
			if ($('#forgotform').valid())
			{
				var form = $('#forgotform');
				$.ajax({
					type : "POST",
					url : "<?php echo site_url('user/verifyemail')?>",
					data: form.serialize(),
					success : function(data) {
						if (data == 2)
						 {
							$("#forgotp").hide();
							$("#login").show();
							$(".forgotloginerror").hide();
							$(".loginalert").show();
							$(".forgotlink").hide();
						 }
						else if (data == 3)
						 {
							$("#forgotp").hide();
							$("#login").show();
							$(".forgotloginerror").show();
							$(".loginalert").hide();
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
							$("#loginform").show();
							$(".forgotlink").show();
							$(".forgotloginerror").hide();
							$(".loginalert").hide();
							$('#forgotform').hide();
						 }

					}
				});
			}
		}
	}

	function loginUserforgot(url, forgotpasswordurl) {

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
						$("#forgotp").hide();
						$("#login").show();
						$(".forgotloginerror").hide();
						$(".loginalert").show();
						$(".forgotlink").hide();
					 }
					else if (data == 3)
					 {
						$("#forgotp").hide();
						$("#login").show();
						$("#txtforgotUsername").val('');
						$(".forgotloginerror").show();
						$(".loginalert").hide();
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
						$("#forgotp").hide();
						$("#login").show();
						$(".forgotlink").show();
						$(".forgotloginerror").hide();
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
		$("#login").hide();
		$("#verifyform").show();
	}

	function goBacklogin() {
		$("#verifyform").hide();
		$("#login").show();
		$(".notfindrecord").hide();
		$(".activated").hide();
		$(".sentlink").hide();
		$(".loginalert").hide();
		$(".info2").hide();
	}
</script>


<script>
	function loginFbMap()
	{
		if($('#formuserlogin').valid())
		{
			$('#formuserlogin').submit();
		}
	}
</script>