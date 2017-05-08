<!--Inner Content-->
<script type="text/javascript">
	$().ready(function() {
		$("#resetpsw").validate();
	});
</script>

<div class="container">
  <div class="modal-content">
    <?php echo form_open('user/resetpassword', 'name="resetpsw" id="resetpsw" enctype="multipart/form-data" onsubmit="comparepsw();"'); ?>
    <div class="modal-body gallery-bg text-white pl-pr">
        <div class="clearfix">&nbsp;</div>
        <div class="text-center"><span class="fontbold">Reset Password</span></div>
        <div>&nbsp;</div>
        <hr class="hr1">
		<? if ($this->session->flashdata('error'))
			 {
				echo "<div class='alert alert-info'>".$this->session->flashdata('error')."</div>";
			 }

		  if ($this->session->flashdata('message'))
			 {
				echo "<div class='alert alert-success'>".$this->session->flashdata('message')."</div>";
			 }?>
        <div class="col-md-6 email-form">
		  <input type="password" name="password" class="login required" id="regpassword" placeholder="Type New Password" minlength="6">
        </div>
        <div class="col-md-6 pass-form">
		  <input type="password" name="cpassword" class="login required" id="cpassword" placeholder="Re-type Password" minlength="6" compareTo="password" onblur="comparepsw();"">
        </div>
        <div class="clearfix">&nbsp;</div>
        <hr class="hr1 mtt10">
        <div>&nbsp;</div>
        <div class="text-center">
		   <input type="hidden" name="uuid" class="form-control required" id="uuid" value="<?=$uuid?>">
		   <input type="submit" id="btnsubmit" name="btnsubmit" value="Save" class="btnaddcycle">
        <hr class="hr1 margin-topform">
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
function comparepsw()
{
	//alert(145);
  var newpassword = jQuery('#regpassword').val();
   var comparepassword = jQuery('#cpassword').val();
   
   //alert(newpassword);
   //alert(comparepassword);
   if(newpassword == comparepassword)
	{
	   //$('#cpassword').css('border', 'solid 1px #c9c9c9');
	}
   else
	{
     jQuery('#cpassword').val('');
	 //$('#cpassword').css('border', 'solid 1px red');
	 return false;
   }
}
 </script>
<!--End Inner Content--> 