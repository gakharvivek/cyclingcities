<script type="text/javascript">
	$().ready(function() {
		$("#invite_form").validate();
	});
</script>
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Find &amp; Invited <span class="redcolor">Friend</span></h1>
        <h2 class="caps"><span class="redcolor">Making your Friend</span> equal partner in crime is what you should do!. <br/>
			<span class="redcolor">Invite your Friends</span> to India's growing Cycling community.</h2>
<div class="inviteform">
<div class="gmaillinks">
	<a href="javascript:void(0);" onclick="InviteF();" class="facebook">FACEBOOK</a> <a href="#" class="redcolor brdrleft">Gmail</a>
    <a href="#" class="redcolor brdrleft">Email</a>
    <span class="invites">My Invites  <span class="redcolor">15</span></span>
</div>
     <form action="<?php echo site_url('personal_profile/sendinvitation');?>" name="invite_form" id="invite_form" method="post" enctype="multipart/form-data">
		<div class="gmaillinks">
			<span class="pad12"><input type="text" id="inviteemail" name="inviteemail" class="required email" placeholder="EMAIL ADDRESSES (SEPARATED BY COMMAS)"/></span>
		</div>
		<div class="gmaillinks">
			<span class="pad12">MESSAGE</span>
			<textarea class="messgearea" name="msg" id="message" class="required"></textarea>
		</div>
		<div class="invitebutton">
			<input type="submit" value="Send" class="blackbutton"/>
			<input type="button" value="Reset" onclick="myFunction()" class="redbutton"/>
		</div>
	 </form>

	
</div>
    </div>
  </div>
</div>
</div>

<script>
function myFunction() {
    document.getElementById("invite_form").reset();
	//$('#invite_form').val('');
	//$('#message').val('');
}
</script> 
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
  appId:'870798359712751',
  cookie:true,
  status:true,
  xfbml:true
  });

  function InviteF()
  {
  FB.ui({
  method: 'apprequests',
  message: 'Welcome to Cycling Cities',
  });
  }

</script>