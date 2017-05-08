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
	<style>
	.failure{ margin:0px!important;}
	</style>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Cycling</b>Cities</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Forgot Password</p>
		 <?php if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div></br>";
				} ?>
		<?php echo form_open_multipart('index.php/admin/forget_pass','name="form1" id="form1" enctype="multipart/form-data"'); ?>
          <div class="form-group has-feedback">
            <input type="username" class="form-control required" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback" ></span>
          </div>
     
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"  >Send Email</button>
            </div><!-- /.col -->
          </div>
        </form>
 </div><!-- /.form-box -->
    </div><!-- /.register-box -->
  </body>
</html>
