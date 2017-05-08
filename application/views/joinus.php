<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>  Join  <span class="redcolor">Us </span>?</h1>
         <h2 class="caps"><span class="redcolor">Urban Cycling</span> is becoming a reality with our constant efforts. <br/>
			<span class="redcolor">Join the Movement</span> to support us part time or full time.</h2>
    </div>
  </div> 
  <div class="row">
  	<div class="col-md-12">
    	<div class="cyclebox">
        	<div class="boxmainbox redboxmain ">
            <a href="#" data-toggle="modal" data-target="#myvolunteerModal">
            	JOIN AS<br/>
                <span>VOLUNTEER</span></a>
            </div>
            <div class="boxmainbox blackboxmain" style="margin-left:-25px;">
             <a href="#" data-toggle="modal" data-target="#myinte
rnModal">	JOIN AS<br/>
              <span>INTERN</span></a>
            </div>
            
        </div>
        <!---------------------------- pricebox------------------------------------>
       
        
        
    </div>
  </div>
  
</div>



</div>


<!-- Modal -->
<div id="myvolunteerModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body padzero joinustable">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>

	  <form action="<?php echo site_url('joinus/add'); ?>" name="volunteer_form" id="volunteer_form" method="post" enctype="multipart/form-data"> 
		  <div class="row">
		   <div class="col-md-12">
		   <table class="table">
			<tr>
				<td width="33%" class="brdrbottm brdrright">
				    <input type="hidden" name="volunteeruser_type" value="VOLUNTEER" readonly/>
					<label>Name</label> <span><input type="text" name="volunteername" class="required"/></span>
				</td>
				<td width="33%" class="brdrbottm brdrright">
					<label>Apply for</label> 
					<span class="selectbox">
						<select name="volunteerapply_for" class="myval required">
						  <option value="parttime">PART TIME</option>
						  <option value="fulltime">FULL TIME</option>
						</select>
					</span>
				</td>
				<td width="33%" class="brdrbottm">Why Do You Want to Join <br/> <strong>Cycling cities?</strong></td>
			</tr>
			<tr>
				<td class="brdrbottm brdrright"><label>Gender</label>  
				  <span>
				      <input id="gendermale" type="radio" name="volunteergender" value="male" class="required"><label for="gendermale">Male</label> 
					  <input id="genderfemale" type="radio" name="volunteergender" value="female" class="required"><label for="genderfemale">Female</label>
				  </span>
				</td>
				<td  class="brdrbottm brdrright"><label>Are You A Cyclist? </label> 
				   <span style="width:200px;">
				      <input id="iscyclistyes" type="radio" name="volunteeriscyclist" value="yes" class="required"><label for="iscyclistyes">Yes</label> 
					  <input id="iscyclistno" type="radio" name="volunteeriscyclist" value="no" class="required"><label for="iscyclistno">No</label>
				   </span>
				</td>
				<td rowspan="2"  class="brdrbottm"><textarea class="required" placeholder="Max 100 words" name="volunteerwhy_cc"></textarea></td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>Age</label> <input type="text" name="volunteerage" class="required digits"/></td>
				<td  class="brdrbottm brdrright"><label>Phone No</label> <input type="text" name="volunteerphone" class="required digits"/></td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>State</label>
				   <? $statename=$this->myaccount_fm->getallindiastate();?>
				   <span class="selectbox">
				      <select name="volunteerstateid" id="volunteerstateid" class="myval required" onchange="bindvolunteercity(this.value);">
						  <option Value="" >Select State</option>
						  <? foreach($statename as $list)
							  {?>
								<option value='<?=$list['id']?>'><?=$list['name']?></option>
							<?}?>
					   </select>
				   </span>
				</td>
				<td  class="brdrbottm brdrright" ><input id="volunteerwatsupcheckbox" type="checkbox" name="volunteerwatsupcheckbox" class="required"><label for="volunteerwatsupcheckbox"  class="terms_policy">&nbsp;</label>Tick If Available On What's App</td>
				<td  class="brdrbottm brdrright btn_upload">Upload Resume
				 <span class="input-group-btn">
				 
				 <span class="btn btn-primary btn-file">Browse..
				  <input type="file" name="volunteerresume" id="volunteerresume" class="required">
				  </span> </span> 
				  </td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>City</label> 
				   <span class="selectbox">
				      <select name="volunteercityid" id="volunteercityid" class="myval required">
						  <option Value="" >Select City</option>
					  </select>
				   </span>
				</td>
				<td  class="brdrbottm brdrright"><label>Occupation</label>  
                   <span class="selectbox">
				      <select name="volunteeroccu" id="volunteeroccu" class="myval required">
						  <option Value="" >Select</option>
                          <option Value="Student" >Student</option>
                          <option Value="Professional" >Professional</option>
                          <option Value="Self Employed" >Self Employed</option>
                          <option Value="Freelancer" >Freelancer</option>
                          <option Value="Other" >Other</option>
					  </select>
				   </span>
                </td>
				<td class="fnt11 brdrbottm popup_link"><input id="volunteerterms_policy" type="checkbox" name="volunteerterms_policy" class="required"><label for="volunteerterms_policy"  class="terms_policy">&nbsp;</label>By clicking "submit" you agree to our
				<a href="<? echo site_url('termsofservice');?>" target="_blank">Terms & Conditions</a> and <a href="<? echo site_url('privacypolicy');?>" target="_blank">Privacy Policy</a></td>
			</tr>
			<tr>
				<td class="brdrright"><label>Email</label> <span><input type="text" name="volunteeremail" class="required email"/></span></td>
                <td  class="brdrbottm brdrright"><label>Area of Interest</label>  
                   <span class="selectbox">
				      <select name="volunteerinterest_area" id="volunteerinterest_area" class="myval required">
						  <option Value="" >Select</option>
                          <option Value="Graphic Designing" >Graphic Designing</option>
                          <option Value="Creative Writing" >Creative Writing</option>
                          <option Value="Social Media Marketing" >Social Media Marketing</option>
                          <option Value="Operations" >Operations</option>
                          <option Value="Marketing & Sales" >Marketing & Sales</option>
                          <option Value="Business Development" >Business Development</option>
                          <option Value="Event Management" >Event Management</option>
                          <option Value="Cycle Expert" >Cycle Expert</option>
                          <option Value="Urban Planner" >Urban Planner</option>
                          <option Value="Consultant" >Consultant</option>
                          <option Value="Other" >Other</option>
					  </select>
				   </span>
                </td>
				<td class="fnt11 pad0aligncenter" ><input type="submit" value="Submit" class="btn btn-default btnredsubmit"/></td>
			</tr>
		   </table>
		   </div>
		   
		   </div>
		  </div>
	  </form>
    </div>

  </div>
</div>


<div id="myinternModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body padzero joinustable">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>

	  <form action="<?php echo site_url('joinus/addintern'); ?>" name="intern_form" id="intern_form" method="post" enctype="multipart/form-data"> 
		  <div class="row">
		   <div class="col-md-12">
		   <table class="table">
			<tr>
				<td width="33%" class="brdrbottm brdrright">
				    <input type="hidden" name="internuser_type" value="INTERN" readonly/>
					<label>Name</label> <span><input type="text" name="internname" class="required"/></span>
				</td>
				<td width="33%" class="brdrbottm brdrright">
					<label>Apply for</label> 
					<span class="selectbox">
						<select name="internapply_for" class="myval required">
						  <option value="parttime">PART TIME</option>
						  <option value="fulltime">FULL TIME</option>
						</select>
					</span>
				</td>
				<td width="33%" class="brdrbottm">Why Do You Want to Join <br/> <strong>Cycling cities?</strong></td>
			</tr>
			<tr>
				<td class="brdrbottm brdrright"><label>Gender</label>  
				  <span>
				      <input id="gendermale" type="radio" name="interngender" value="male" class="required"><label for="gendermale">Male</label> 
					  <input id="genderfemale" type="radio" name="interngender" value="female" class="required"><label for="genderfemale">Female</label>
				  </span>
				</td>
				<td  class="brdrbottm brdrright"><label>Are You A Cyclist? </label> 
				   <span style="width:200px;">
				      <input id="iscyclistyes" type="radio" name="interniscyclist" value="yes" class="required"><label for="iscyclistyes">Yes</label> 
					  <input id="iscyclistno" type="radio" name="interniscyclist" value="no" class="required"><label for="iscyclistno">No</label>
				   </span>
				</td>
				<td rowspan="2"  class="brdrbottm"><textarea class="required" placeholder="Max 100 words" name="internwhy_cc"></textarea></td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>Age</label> <input type="text" name="internage" class="required digits"/></td>
				<td  class="brdrbottm brdrright"><label>Phone No</label> <input type="text" name="internphone" class="required digits"/></td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>State</label>
				   <? $statename=$this->myaccount_fm->getallindiastate();?>
				   <span class="selectbox">
				      <select name="internstateid" id="internstateid" class="myval required" onchange="bindinterncity(this.value);">
						  <option Value="" >Select State</option>
						  <? foreach($statename as $list)
							  {?>
								<option value='<?=$list['id']?>'><?=$list['name']?></option>
							<?}?>
					   </select>
				   </span>
				</td>
				<td  class="brdrbottm brdrright" ><input id="internwatsupcheckbox" type="checkbox" name="internwatsupcheckbox" class="required"><label for="internwatsupcheckbox"  class="terms_policy">&nbsp;</label>Tick If Available On What's App</td>
				  <td  class="brdrbottm brdrright btn_upload">Upload Resume
				 <span class="input-group-btn">
				 
				 <span class="btn btn-primary btn-file">Browse..
				  <input type="file" name="internresume" id="internresume" class="required">
				  </span> </span> 
				  </td>
			</tr>
			<tr>
				<td  class="brdrbottm brdrright"><label>City</label> 
				   <span class="selectbox">
				      <select name="interncityid" id="interncityid" class="myval required">
						  <option Value="" >Select City</option>
					  </select>
				   </span>
				</td>
				<td  class="brdrbottm brdrright"><label>Occupation</label>  
                   <span class="selectbox">
				      <select name="volunteeroccu" id="volunteeroccu" class="myval required">
						  <option Value="" >Select</option>
                          <option Value="Student" >Student</option>
                          <option Value="Professional" >Professional</option>
                          <option Value="Self Employed" >Self Employed</option>
                          <option Value="Freelancer" >Freelancer</option>
                          <option Value="Other" >Other</option>
					  </select>
				   </span>
                </td>
				<td class="fnt11 brdrbottm popup_link"><input id="internterms_policy" type="checkbox" name="internterms_policy" class="required"><label for="internterms_policy"  class="terms_policy">&nbsp;</label>By clicking "submit" you agree to our
				<a href="<? echo site_url('termsofservice');?>" target="_blank">Terms & Conditions</a> and <a href="<? echo site_url('privacypolicy');?>" target="_blank">Privacy Policy</a></td>
			</tr>
			<tr>
				<td class="brdrright"><label>Email</label> <span><input type="text" name="internemail" class="required email"/></span></td>
				<td  class="brdrbottm brdrright"><label>Area of Interest</label>  
                   <span class="selectbox">
				      <select name="volunteerinterest_area" id="volunteerinterest_area" class="myval required">
						  <option Value="" >Select</option>
                          <option Value="Graphic Designing" >Graphic Designing</option>
                          <option Value="Creative Writing" >Creative Writing</option>
                          <option Value="Social Media Marketing" >Social Media Marketing</option>
                          <option Value="Operations" >Operations</option>
                          <option Value="Marketing & Sales" >Marketing & Sales</option>
                          <option Value="Business Development" >Business Development</option>
                          <option Value="Event Management" >Event Management</option>
                          <option Value="Cycle Expert" >Cycle Expert</option>
                          <option Value="Urban Planner" >Urban Planner</option>
                          <option Value="Consultant" >Consultant</option>
                          <option Value="Other" >Other</option>
					  </select>
				   </span>
                </td>
				<td class="fnt11 pad0aligncenter" ><input type="submit" value="Submit" class="btn btn-default btnredsubmit"/></td>
			</tr>
		   </table>
		   </div>
		   
		   </div>
		  </div>
	  </form>
    </div>

  </div>
</div>

<script>
   $().ready(function() {
		$("#volunteer_form").validate();
		$("#intern_form").validate();
	});

   function bindvolunteercity(value)
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
						document.getElementById("volunteercityid").innerHTML="";
						document.getElementById("volunteercityid").innerHTML=xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET","<?=site_url('myaccount/bindcity')?>/"+value,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById("volunteercityid").innerHTML='';
				document.getElementById("volunteercityid").innerHTML='<option value="">Select City</option>';
			}
	  }

   function bindinterncity(value)
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
						document.getElementById("interncityid").innerHTML="";
						document.getElementById("interncityid").innerHTML=xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET","<?=site_url('myaccount/bindcity')?>/"+value,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById("interncityid").innerHTML='';
				document.getElementById("interncityid").innerHTML='<option value="">Select City</option>';
			}
	  }
</script>
