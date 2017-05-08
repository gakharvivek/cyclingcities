<style>
#tabs { 
    padding: 0px; 
    background: none; 
    border-width: 0px; 
} 
#tabs .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px; 
} 
#tabs .ui-tabs-panel { 
    background: #fff; 
    border-width: 0px 1px 1px 1px; 
}

.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
 background: #cc3333;
}
.password {
	margin: 2% 0 ;
}
#profile-picture .profilepic {
	margin :0 0 2% 0px;
	/*overflow: visible;*/
}
#profile-picture label {
	display: inline-block;
	width:250px;
    position: relative;
    top: -70px;
    cursor: pointer;
    background: #000;
    opacity: 0.7;
}

#profile-picture label > img {
	margin:0 0 0 5px;
	display: inline-block;
}
#profile-picture label > span {
	font-size: 23px;
    color: #cc0000;
    position: relative;
    top: 17px;
}
#profile-password input[type="password"] {
    font-size: 13px;
    text-transform: uppercase;
    padding: 7px;
}

.styled-select {
   background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
   display: inline-grid;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 240px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

.response-success, .response-error {
    margin: 10px 0px;
    padding:12px;
    border:1px solid;
 
}
.response-success {
    color: #4F8A10;
    background-color: #DFF2BF;
}

.response-error {
    color: #D8000C;
    background-color: #FFBABA;
}

</style>
<div class="comingsoonpage martop64">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
		    	<h1>My <span class="redcolor">Profile</span></h1>
		        <h2><span class="redcolor">Sampe text</span> to how to go ahead in choosing the cycle, <br/>
				sampe text <span class="redcolor"> & choose the cycles by</span></h2>
		    </div>
		</div>
		<div id="tabs">
			<ul>
			 <li><a href="#profile-picture">Profile Picture</a></li>
			 <li><a href="#profile-info">Profile Info</a></li>
			 <li><a href="#profile-password">Profile Password</a></li>
			 </ul>
			 <!-- edit the profile picture tab starts -->
			 <div id="profile-picture">
			 <div id="response-pic-message"></div>
			 	<form action="<?php echo site_url('personal_profile/update_picture');?>" name="edit_profile_picture_form" id="edit_profile_picture_form" method="post" enctype="multipart/form-data">
			 		<div class="row">
						<div class="col-md-12">
							<div class="profilepage fntcentury martop15">
								<div class="profilepic">
			   						<? if($editprofile['pic']!='')
											{?>
					   							<img src="<?php echo site_url('upload/user'); ?>/<?php echo $editprofile['pic']; ?>" class="img-responsive"/> 
				  							<?}
				  							else
											{?>
					   							<img src="<? echo site_url('assets/images/img_profile.jpg');?>" alt=""/>
				  							<?}?>
				   						<input type="file" id="file" name="pic"/>
				   						<input type="hidden" name="pic_old" value="<?php echo $editprofile['pic']; ?>" />
								</div>
								<label for="file">
        								<img src="<? echo site_url('assets/images/upload3.png');?>" height=48; width=48;/> <span>Add a Photo</span>
    							</label>
							</div>
						</div>
					</div>
					<div class="submit">
						<input type="hidden" class="margin-leftli formfields" name="editid" value="<?php echo $editprofile['id'] ?>" />
						<button type="submit" class="btn btn-dangeredit btn-login ">Submit</button>
					</div>
			 	</form>
			 </div>
			 <!-- edit the profile picture tab ends -->
			 <!-- edit the profile information tab starts -->
			 <div id="profile-info">
			 	<form action="<?php echo site_url('personal_profile/edit_profile');?>" name="edit_profile_info_form" id="edit_profile_info_form" method="post" enctype="multipart/form-data">
			 		<div class="row">
						<div class="col-md-12">
			 				<div class="editprofile brdrtop">
					 			<table class="table table-bordered brdrleftzero brdrrightzero">
									<tr>
										<td class="wd100"><span class="redcolor tttl">Name</span> <input type="text" name="fname" id="fname" class="required" value="<?php echo $editprofile['firstname']; ?>" placeholder="FIRST NAME"/> <input type="text" name="lname" id="lname" class="required" value="<?php echo $editprofile['lastname']; ?>" placeholder="Last NAME"/></td>
										<td><span class="redcolor tttl">Gender</span>  <input id="radio1" type="radio" name="gender" id="gendermale" class="required" value="Male" <?php echo ($editprofile['gender']=='Male')?'checked':'' ?>><label for="gendermale">Male</label>  <input id="radio1" type="radio" name="gender"  id="genderfemale" class="required" value="Female" <?php echo ($editprofile['gender']=='Female')?'checked':'' ?>><label for="genderfemale">Female</label> <input id="radio1" type="radio" name="gender"  id="genderother" class="required" value="Other" <?php echo ($editprofile['gender']=='Other')?'checked':'' ?>><label for="genderother">Other</label></td>
									</tr>
									<tr>
										<td><span class="redcolor tttl">Birth Date</span> <input type="text" name="dob" id="dob" class="required" value="<?php echo $editprofile['dob'] ?>" placeholder="MM/DD/YY"/></td>
										<td>
											<span class="redcolor tttl">Marital Status</span>
											<div class="styled-select slate">
												<select name="marital" class="required">
													<option value="Single" <?php echo ($editprofile['marital']=='Single')?'selected':'' ?>> Single </option>
													<option value="Married" <?php echo ($editprofile['marital']=='Married')?'selected':'' ?>> Married </option>
													<option value="Divorced" <?php echo ($editprofile['marital']=='Divorced')?'selected':'' ?>> Divorced </option>
													<option value="Other" <?php echo ($editprofile['marital']=='Other')?'selected':'' ?>> Other </option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="redcolor tttl">Location</span>
											<div class="styled-select slate" style="width:285px; margin-right: 30px;">
												<select style="width:300px;" name="country">
													<option value="india" <?php echo ($editprofile['country']=='india')?'selected':'' ?> >India</option>
												</select>
											</div>
											<!-- getting list of states -->
											<? $statename=$this->myaccount_fm->getallindiastate();?>
											<div class="styled-select slate" style="width:285px; margin-right: 30px;">
												<select style="width:300px;" name="stateid" id="stateid" onchange="bindcity(this.value);">
													 <option Value="" >Select State</option>
								  					<? foreach($statename as $list)
										  				{?>
															<option value='<?=$list['id']?>'><?=$list['name']?></option>
														<?}?>
												</select>
											</div>
											<div class="styled-select slate" style="width:285px; margin-right: 30px;">
												<select name="cityid" id="cityid" style="width:300px;">
													<option Value="" >Select City</option>
												</select>
											</div>
										</td>
									</tr>
									 <tr>
										<td><span class="redcolor tttl">AREA</span> <input type="text" name="area" value="<?php echo $editprofile['area'] ?>" class="required" placeholder="RAOPURA"/></td>
										<td><span class="redcolor tttl">PINCODE</span> <input type="text" name="pincode" value="<?php echo $editprofile['pincode'] ?>" class="required"placeholder="390012"/></td>
									</tr>
									 <tr>
										<td><span class="redcolor tttl">OCCUPATION</span> 
											<div class="styled-select slate">
												<select name="occu" id="occu" class="required">
											  		<option Value="" >Select</option>
					                          		<option Value="Student" <?php echo ($editprofile['occu']=='Student')?'selected':'' ?> >Student</option>
					                          		<option Value="Professional" <?php echo ($editprofile['occu']=='Professional')?'selected':'' ?> >Professional</option>
					                          		<option Value="SelfEmployed" <?php echo ($editprofile['occu']=='SelfEmployed')?'selected':'' ?> >Self Employed</option>
					                          		<option Value="Freelancer" <?php echo ($editprofile['occu']=='Freelance')?'selected':'' ?> >Freelancer</option>
					                          		<option Value="Other" <?php echo ($editprofile['occu']=='Other')?'selected':'' ?> >Other</option>
										  		</select>
										  	</div>
								      </td>
										<td><span class="redcolor tttl">USER TYPE</span> <input id="user_type1" type="radio" name="user_type" value="Individual" <?php echo ($editprofile['user_type']=='Individual')?'checked':'' ?> class="required"><label for="user_type1">INDIVIDUAL</label>  <input id="user_type2" type="radio"name="user_type" value="Dealer" <?php echo ($editprofile['user_type']=='Dealer')?'checked':'' ?> class="required"><label for="user_type2">DEALER</label></td>
									</tr>
									 <tr>
										<td><span class="redcolor tttl">OWNS A  CYCLE</span> <input id="owncycle1" type="radio" name="owncycle" value="yes" <?php echo ($editprofile['owncycle']=='yes')?'checked':'' ?> class="required"><label for="owncycle1">YES</label>  <input id="owncycle2" type="radio" name="owncycle" value="no" <?php echo ($editprofile['owncycle']=='no')?'checked':'' ?> class="required"><label for="owncycle2">No</label></td>
										<td>
										<span class="redcolor tttl">MEMBER OF CYCLING CLUB ON</span>
											<?php if($editprofile['city']== 1068){?>
											<div class="styled-select slate">
											<select id="club_member" name="club_member">
												<option value="Vadodara Cycling Club And YHAI" <?php echo ($editprofile['club_member']=='Vadodara Cycling Club And YHAI')?'selected':'' ?>> Vadodara Cycling Club And YHAI </option>
										  		<option value="The Cycling Club of Baroda" <?php echo ($editprofile['club_member']=='The Cycling Club of Baroda')?'selected':'' ?>> The Cycling Club of Baroda </option>
										  		<option value="Baroda Cyclist Club" <?php echo ($editprofile['club_member']=='Baroda Cyclist Club')?'selected':'' ?>> Baroda Cyclist Club </option>
										  	</select>
										  	</div>
											<?php }elseif ($editprofile['city']== 716 || $editprofile['city']== 10324){ ?>
										     <div class="styled-select slate">
												<select id="club_member" name="club_member">
												<option value="Delhi Cyclist Club" <?php echo ($editprofile['club_member']=='Delhi Cyclist Club')?'selected':'' ?>> Delhi Cyclist Club </option>
										  		<option value="North Delhi Cyclists" <?php echo ($editprofile['club_member']=='North Delhi Cyclists')?'selected':'' ?>> North Delhi Cyclists </option>
										  		<option value="West Delhi Cyclists" <?php echo ($editprofile['club_member']=='West Delhi Cyclists')?'selected':'' ?>> West Delhi Cyclists </option>
										  		</select>
										  	 </div>
											<?php }else{?>
												<input type="text" name="club_member" value="<?php echo $editprofile['club_member'] ?>" class="required" placeholder=""/>	
											<?php }?>
											
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<span class="redcolor tttl">TYPE OF CYCLING</span> 
											   <input id="typeofcyclinst1" type="checkbox" name="typeofcyclinst[]" <?php if($editprofile['typeofcyclinst']=='Commuting') echo 'checked'; ?> value="Commuting"><label for="typeofcyclinst1">Commuting</label>
											   <input id="typeofcyclinst2" type="checkbox" name="typeofcyclinst[]" <?php if($editprofile['typeofcyclinst']=='Leisure') echo 'checked'; ?> value="Leisure"><label for="typeofcyclinst2">Leisure</label>
											   <input id="typeofcyclinst3" type="checkbox" name="typeofcyclinst[]" <?php if ($editprofile['typeofcyclinst']=='Endurance') echo 'checked'; ?> value="Endurance" ><label for="typeofcyclinst3">Endurance</label>
											   <input id="typeofcyclinst4" type="checkbox" name="typeofcyclinst[]" <?php if ($editprofile['typeofcyclinst']=='Adventure') echo 'checked'; ?> value="Adventure" ><label for="typeofcyclinst4">Adventure</label>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php $creat=$editprofile['created']; ?>
											<span class="blackcolor">Member of cycling cities in science</span> <span class="redcolor tttl"><?php echo date('d M Y', strtotime($creat)); ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="text-center">
											<span class="newssubscribe redcolor"><input id="newslwtter" type="checkbox" name="newslwtter" value="1"><label for="newslwtter">subcribe to our newsletter</label></span>
										</td>
									</tr>
									
								</table>
							</div>
						</div>		
			 		</div>
			 		<center>
						<input type="hidden" class="margin-leftli formfields" name="editid" value="<?php echo $editprofile['id'] ?>" />
						<button type="submit" class="btn btn-dangeredit btn-login ">Submit</button>
					</center>
			 	</form>
			 </div>
			 <!-- edit the profile information tab ends -->
			 <!-- edit the profile password tab starts -->
			 <div id="profile-password">
			   <div id="response-message"></div>
			 	<form action="<?php echo site_url('personal_profile/update_password');?>" name="edit_profile_password_form" id="edit_profile_password_form" method="post" enctype="multipart/form-data">
			 		<div class="row">
						<div class="col-md-12">
							<div class="password"><span class="redcolor tttl">Old Password:</span> <input type="password" name="oldpassword" id="oldpassword" placeholder="Old Password"/></div>
							<div class="password">
							<span class="redcolor tttl">New Password:</span> <input type="password" name="password" id="password" placeholder="New Password"/> 
							</div>
							<div class="password">
								<span class="redcolor tttl">Confirm Password:</span> <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password"/>
							</div>
						</div>
					</div>
					<div class="submit">
						<input type="hidden" class="margin-leftli formfields" name="editid" value="<?php echo $editprofile['id'] ?>" />
						<button type="submit" class="btn btn-dangeredit btn-login ">Submit</button>
					</div>	
			 	</form>
			</div><!-- edit the profile password tab ends -->
		</div><!-- tabs container ends -->
	</div>
</div>
<script>
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

$(function() {
	/** on page load filling the pre-selected state and city **/
    var state = "<?php echo $editprofile['state'] ?>";
    var cityvalue = "<?php echo $editprofile['city']?>";
    var city = "<?php echo $this->myaccount_fm->GetcityNameById( $editprofile['city'] ) ; ?>";
    if(state) {
    	document.getElementById("stateid").value = state;
    }
    if(cityvalue){
    	document.getElementById("cityid").innerHTML = "<option value="+cityvalue+">"+city+"</option>";
    }
	/** validating all the forms **/
    $("#edit_profile_picture_form").validate();
	$("#edit_profile_info_form").validate();
	$("#edit_profile_password_form").validate({
		rules: {
			oldpassword:"required",
	    	password: "required",
	        confirmpassword: {
	        	equalTo: "#password"
	        }
	      },
	      messages: {
	         password: " Enter Password",
	         confirmpassword: " Enter Confirm Password Same as Password"
	      }
	});
});

/** submit the password change form and do the updation after validation**/
$("#edit_profile_password_form").submit(function(e){ 
    e.preventDefault();
    var tdata= $("#edit_profile_password_form").serializeArray();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('personal_profile/update_password')?>",
        data: tdata, 
        success:function(tdata)
        {
            var tdata = $.parseJSON(tdata);
            if( tdata.status) {
                $('#response-message').removeClass("response-error").addClass("response-success").html(tdata.message).slideDown("slow");
                var redirect = "<?php echo site_url('personal_profile/view_profile') ?>";
                window.location.replace(redirect);
            }else{
            	  $('#response-message').removeClass("response-success").addClass("response-error").html(tdata.message).fadeIn("slow");
            }
            
        }
    });
});

/** submit the password change form and do the updation after validation**/
$("#edit_profile_picture_form").submit(function(e){ 
    e.preventDefault();
    $.ajax({
    	url: "<?php echo site_url('personal_profile/update_picture');?>",
    	data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        type: "POST", 
        success:function(tdata)
        {
            var tdata = $.parseJSON(tdata);
            if( tdata.status) {
                $('#response-pic-message').removeClass("response-error").addClass("response-success").html(tdata.message).slideDown("slow");
                var redirect = "<?php echo site_url('personal_profile/view_profile') ?>";
                window.location.replace(redirect);
            }else{
            	  $('#response-pic-message').removeClass("response-success").addClass("response-error").html(tdata.message).fadeIn("slow");
            }
            
        }
    });
});
</script>