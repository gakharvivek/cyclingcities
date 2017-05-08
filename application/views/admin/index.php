<!-- <script>
window.location.replace("<? //echo site_url();?>");
</script>  -->
<?php $this->load->view('admin/includes/header');?>
<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

	<script type="text/javascript">
		$().ready(function() {
			$("#form1").validate();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		  $("#username").focus();
		});
	</script>
	<?	
		$name_value="";
		$pass_value="";
		$chk_value="";

		if(isset($_COOKIE['cookchk']) && ($_COOKIE['cookchk']) == "yes")
		{
			$name_value=($_COOKIE['cookname']);
			$pass_value=($_COOKIE['cookpass']);
			$chk_value=($_COOKIE['cookchk']);
		}
		?>

	<style>
	.failure{ margin:0px!important;}
	</style>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Cycling</b>Cities</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
		    <?php if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				} ?>
		<?php echo form_open_multipart('index.php/admin','name="form1" id="form1" enctype="multipart/form-data"'); ?>
	        <?
			if ($this->session->flashdata('message')){
				echo "<div class='failure'>".$this->session->flashdata('message')."</div>";
			}
			?>

			<?
			if ($this->session->flashdata('message1')){
				echo "<div class='success'>".$this->session->flashdata('message1')."</div>";
			}
			?>

		  <div class="form-group has-feedback">
				<?
					if (isset($warning))
					{
					echo $warning;
					}
				?>
          </div>
			
          <div class="form-group has-feedback">
		    <?php 
				$udata = array('name'=>'username','id'=>'username','value'=>$name_value,'placeholder'=>'Username','class'=>'form-control required',  'size'=>25, 'autocomplete'=>'off');
				echo form_input($udata);
			?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
		    <?php 
				$pdata = array('name'=>'password','id'=>'password','value'=>$pass_value,'placeholder'=>'Password','class'=>'form-control required','size'=>25);
				echo form_password($pdata);
			?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
               <a href="<?php echo site_url('admin/forget_pass'); ?>">I forgot my password</a><br>
               <!-- <a href="<?php echo site_url('admin/registration'); ?>" class="text-center">Register a new membership</a> -->

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
       
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>