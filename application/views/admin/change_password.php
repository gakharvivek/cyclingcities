
<script type="text/javascript">
function TxtReset()
{
	document.forms[0].reset();
}
$().ready(function() {
	$("#formchang1").validate();
});
</script>

<div id="breadCrumbs">
	<ul>
		<li class="breadCrumbLast" title="Attribute"><a href="#"><strong>Change Password</strong></a></li>
	</ul>
</div>


<div id="main">
<?
$flag=$this->session->flashdata('passmessage');
$passmessage="";
if($flag!="")
{
	if($flag!="true")
	{
		$passmessage= "Password incorrect or New Password invalid.";
	}
	else
	{
		$passmessage= "Password has been changed successfully.";
	}
}
?>

<?php echo form_open('admins/dashboard/updatepassword','name="formchang" id="formchang" enctype="multipart/form-data"'); ?>
        <div id="globalTabContent">
            <ul class="tabs-nav">
                <li class="tabs-selected"><a href="#tab-1"><span><strong>Change Password</strong></span></a></li>
            </ul>
            <div id="tab-1" class="tabs-container">
                <div class="curveTop">
                </div>
                <div class="globalContainer">
                    <div id="ctl00_ContentPlaceHolder1_PanGrid" class="PanGrid">
					 <?
					if($flag!="true")
					{
					?>
					<?
					if($flag!="")
					{
						echo "<div class='clear'><br/></div><div class='failure'>".$passmessage."</div></div>";
					}	
					?>
						<table cellpadding="5" cellspacing="0" border="0" width="100%" class="tblDisplay widthPc">
							<tr class="odd">
								<td width="130px" >Current Password <span class="highlight">*</span></td>
								<td > 
									<input name="txtoldpassword" type="password" class="required" minlength="5" />
								</td>
							</tr>
							<tr class="odd">
								
								<td>New Password <span class="highlight">*</span></td>
								<td><input name="txtPassword" type="password" class="required" minlength="5" id="txtPassword" /></td>
							</tr>
							<tr class="odd">
								<td>Confirm Password <span class="highlight">*</span></td>
								<td><input name="txtcPassword" class="required" id="txtcPassword" type="password" minlength="5"  compareTo="txtPassword" /></td>
							</tr>
							<tr class="odd">
								<td>&nbsp;</td>
								<td>
									<input type="image" src="<?php echo site_url('assets/admin/images/save.gif');?>" />
									<a href="javascript:TxtReset();" id="reset"><img src='<?php echo site_url('assets/admin/images/reset.gif');?>' /></a>
								</td>
							</tr>
						</table>
				<?}
				else
				{
					?><div class='clear'><br/></div>
					<div class='pansucess'>
					<?
					echo $passmessage;
					?>
					</div>
					<?
				}
				?>
               <div>
			</div>                  
		    </div>
                </div>
            </div>
            <div class="curveBottom">
                <img height="8" width="8" src="/assets/img/bl.jpg" alt="" class="curveCorner" />
            </div>
        </div>
		<? echo form_close(); ?>
    </div>


<script type="text/javascript">
 $().ready(function() 
 {	
	 $('#formchang').validate({	  
	 rules:
	  {
		 txtPassword: 'required',
		 txtcPassword: 
			 {	 
			   required: true,
			   equalTo: '#txtPassword'	
			 }  
			}});
 });
 </script>