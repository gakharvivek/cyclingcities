<?php $this->load->view('header1'); ?>
<?php
//print_r($tomorrow['ride_poster']); exit;
//echo '<pre>'; print_r($result['article_desc']); exit;
?>

<div class="container">
  <div class="modal-content-vivek">
    <?php echo form_open('home/login_process'); ?>
    <div class="modal-body gallery-bg text-white pl-pr">
      <h1 class="text-center fontbold">PLEASE LOGIN</h1>
      <h4 class="text-center">TO USE OUR SERVICES</h4>
      <div class="col-md-6 ml16">
        <div class="fbpopup pl23">
        <img src="<?php echo base_url(); ?>assets/images/fbpopup.png"/>LOG IN WITH <span class="fontbold">FACEBOOK</span></div>
        </div>
        <div class="col-md-6 ml15">
          <div class="gpluspopup pl23 p1t10"><img src="<?php echo base_url(); ?>assets/images/gpluspopup.png"/>&nbsp;&nbsp;LOG IN WITH <span class="fontbold">GOOGLE</span></div>
          <div>&nbsp;</div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="text-center">OR <span class="fontbold">LOGIN WITH EMAIL</span></div>
        <div>&nbsp;</div>
        <hr class="hr1">
        <div class="col-md-6 email-form">
          <label class="pl23 ">EMAIL</label>
		  <input type="email" name="email" placeholder="Email" class="login" <?if(isset($_COOKIE['cookchk']) && $_COOKIE['cookuname']!=""){?>value="<?=$_COOKIE['cookuname']?>"<?}?>>
        </div>
        <div class="col-md-6 pass-form">
          <label class="pl23">PASSWORD</label>
		  <input type="password" name="password" placeholder="Password" class="login" <?if(isset($_COOKIE['cookchk']) && $_COOKIE['cookpass']!=""){?>value="<?=$_COOKIE['cookpass']?>"<?}?>>
        </div>
        <div class="clearfix">&nbsp;</div>
        <hr class="hr1 mtt10">
        <div>&nbsp;</div>
        <div style="list-style: none;" class="text-center"><input type="checkbox" id="remember_me" name="remember_me" value="yes" <?if(isset($_COOKIE['cookchk']) && $_COOKIE['cookchk']=="yes"){?>checked<?}?>/>&nbsp;<label>REMEMBER ME</label> </div>
        <div>&nbsp;</div>
        <div class="text-center"><button type="submit" class="btn btn-login btn-lg fontbold">LOGIN</button></div>
        <hr class="hr1 margin-topform">
        <div class="text-center"><div><span class="fontbold">FORGOT</span> YOUR PASSWORD ?</div>
          <div data-toggle="modal" data-target="#myModal2">DON’T HAVE ACCOUNTTT ? <a href="#" class="fontbold">PLEASE SIGN UP</a></div></div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>