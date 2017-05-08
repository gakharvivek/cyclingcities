<script type="text/javascript">
	$().ready(function() {
		$("#contactus_form").validate();
	});

	function bindcontactstate(value)
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
						document.getElementById("contactstateid").innerHTML="";
						document.getElementById("contactstateid").innerHTML=xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET","<?=site_url('myaccount/bindstate')?>/"+value,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById("contactstateid").innerHTML='';
				document.getElementById("contactstateid").innerHTML='<option value="">Select State</option>';
			}
	  }

  function bindcontactcity(value)
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
					document.getElementById("contactcityid").innerHTML="";
					document.getElementById("contactcityid").innerHTML=xmlhttp.responseText;
				}
			}

			xmlhttp.open("GET","<?=site_url('myaccount/bindcity')?>/"+value,true);
			xmlhttp.send();
		}
		else
		{
			document.getElementById("contactcityid").innerHTML='';
			document.getElementById("contactcityid").innerHTML='<option value="">Select City</option>';
		}
  }
</script>
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Contact <span class="redcolor">Us</span></h1>
        <h2 class="uppercase">IF YOU WOULD LIKE TO<span class="redcolor">GET IN TOUGH</span>  WITH US,<br/>PLEASE <span class="redcolor">FIND BELOW</span> OUR CONTACT DETAILS</h2>
        
		<?php echo form_open('contactus/','name="contactus_form" id="contactus_form" enctype="multipart/form-data"');?>
              <? if ($this->session->flashdata('error'))
			 {
				echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
			 }

		  if ($this->session->flashdata('message1'))
			 {
				echo "<div class='success2'>".$this->session->flashdata('message1')."</div>";
			 }	  ?>
			<div class="contactformform">
				<div class="indiamap"><img src="<? echo site_url('assets/images/map_india.png');?>" alt="" class="img-responsive"/></div>
				<div class="formarea contactpage">
				<div class="textformamin">
					<div class="formgroup col-md-6 col-sm-6 padrightzero brdrright" >
					<input type="text" class="form-control required" name="contactfname" id="contactfname" placeholder="FIRST NAME" />
					</div>
					<div class="formgroup col-md-6 col-sm-6 padleftzero">
					<input type="text" class="form-control required" name="contactlname" id="contactlname" placeholder="LAST NAME" />
					</div>
					</div>
					<div class="textformamin">
					<div class="formgroup col-md-6 col-sm-6 padrightzero brdrright" >
					<input type="text" class="form-control required email" name="contactemail" id="contactemail" placeholder="Email" />
					</div>
					<div class="formgroup col-md-6 col-sm-6 padleftzero">
					<input type="text" class="form-control required digits" minlength="10" maxlength="10" name="contactphone" id="contactphone" placeholder="PHONE" />
					</div>
					</div>
					<div class="textformamin">
					<div class="formgroup col-md-3 col-sm-4 padrightzero brdrright locationdrop brdrbottom" >
						<? $countryname=$this->myaccount_fm->getallcountryname();?>
						   <select name="contactcountryid" id="contactcountryid" class='myval required' onchange="bindcontactstate(this.value);">
						          <option value=''>Select Country</option>
								  <? foreach($countryname as $list)
									  {?>
										<option value='<?=$list['id']?>' <?if($list['id']==101){?>selected<?}?>><?=$list['name']?></option>
									<?}?>
						   </select>
					</div>
					<div class="formgroup col-md-3 col-sm-4 padleftzero padrightzero brdrright locationdrop brdrbottom">
					<? $statename=$this->myaccount_fm->getallindiastate();?>
						<select name="contactstateid" id="contactstateid" class="myval" onchange="bindcontactcity(this.value);">
							  <option Value="" >Select State</option>
							  <? foreach($statename as $list)
									  {?>
										<option value='<?=$list['id']?>'><?=$list['name']?></option>
									<?}?>
						</select>
					</div>
					 <div class="formgroup col-md-5 col-sm-4 padleftzero locationdrop brdrbottom">
					   <span class="wid70">
					      <select name="contactcityid" id="contactcityid" class="myval">
							  <option Value="" >Select City</option>
						  </select>
					   </span>
					</div>    
					</div>
					<div class="textformamin marbtmzero ">
					<div class="formgroup col-md-12 col-sm-12 brdrbottom padbtm15" >
					<textarea class="form-control" placeholder="Message" name="message" id="message"></textarea>
					</div>
				   
					</div>
					<div class="invitebutton2">
					<div class="formgroup col-md-12 col-sm-12" >
					<input type="submit" value="Submit" class="redbutton"/>
					</div>
				   
					</div>
				</div>	
				<div class="clear"></div>
				<div class="addressbox">
					<h1>REGISTERED OFFICE</h1>
					<p>A/01, COMPLEX, CROSS ROAD,<br/>CITY, STATE - 390001.</p>
					<h1>CALL US</h1>
					<p>+91 265 1236598,<br/>+91 989 896 1234</p>
					<h1>EMAIL US</h1>
					<a href="mailto:admin@cyclingcities.com" class="fnt20">admin@cyclingcities.com</a>
				</div>
			</div>
	    <? echo form_close(); ?>


    </div>
  </div>
</div>
</div>