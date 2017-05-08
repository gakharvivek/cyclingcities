
<?php  $this->load->view('header'); 

$profile = $this->profile_model->getprofile();
?>
<div class="row-fluid">
  
    <div class="col-md-3"></div>
              <div class="box col-md-6">
                <div class="box-header with-border"> Profile List</div>
                <div class="box-body with-border">
                <form action="<?php echo base_url();?>profile/edit" method="post">  
				  <input type="hidden" name="id" value="<?php  echo $result->id; ?>"/>
                    <!-- text input -->
                    <div class="form-group  ">
                        <label>Name : </label>
                      <label  name="name" class="pro form-control" ><?php echo $result->name; ?></label>
                       </div>                   
                    </div>
                    <div class="form-group ">
                      <label>Gender : </label>
                      <label  name="gender" class="pro form-control"><?php echo $result->gender; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Birth Date : </label>
                    <label  name="bdate" class="pro form-control"><?php echo $result->bdate; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Role : </label>
                      <label  name="role" class="pro form-control" ><?php echo $result->role; ?> </label>
                    </div>
                  
                    <div class="form-group" >
                      <label>State : </label>
                      <label  name="state" class="pro form-control"><?php echo $result->state; ?></label>
                    </div>
                    <div class="form-group">
                      <label>City : </label>
                      <label  name="city" class="pro form-control"><?php echo $result->city; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Email : </label>
                      <label  name="email" class="pro form-control"><?php echo $result->email; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Phone : </label>
                       <label  name="phone" class="pro form-control"><?php echo $result->phone;?></label>
                    </div>
                    <div class="form-group">
                      <label>Type : </label>
                       <label  name="type" class="pro form-control"><?php echo $result->type ?></label>
                    </div>
                    <div class="form-group">
                      <label>Occupation : </label>
                      <label  name="occu" class="pro form-control"><?php echo $result->occu ?></label>
                    </div>
                    <div class="form-group">
                      <label>Skill : </label>
                      <label  name="skill" class="pro form-control"><?php echo $result->skill ?></label>
                    </div>
                    <div class="form-group">
                      <label>Pic. : </label>
                      <label  name="pic" class="pro form-control"><?php echo $result->pic ?></label>
                    </div>
                    
                    <div class="form-group">
                      <!--<a href="edit" class="btn btn-group btn-primary" >Edit Profile</a>-->
					  <input type="submit" value="Edit Profile">
					  <a href="<?php echo site_url('admins/user');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
				</form>	
                </div>
	</div>
	
	 <div class="col-md-3"></div>

</div>
<div class="clearfix"></div>
<style>
  .box{
    width:500px;
    
  }
</style>
<script src="<?php echo base_url() ?>assets/js/country-list.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.js" type="text/javascript"></script>

<script>

	jQuery(document).ready(function () {
			FormValidation.init();
	});


	$(function () {
			$(".datepicker").datepicker();
			$(".uniform_on").uniform();
			$(".chzn-select").chosen();
			$('.textarea').wysihtml5();

			$('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
							var $total = navigation.find('li').length;
							var $current = index + 1;
							var $percent = ($current / $total) * 100;
							$('#rootwizard').find('.bar').css({width: $percent + '%'});
							// If it's the last tab then hide the last button and show the finish instead
							if ($current >= $total) {
									$('#rootwizard').find('.pager .next').hide();
									$('#rootwizard').find('.pager .finish').show();
									$('#rootwizard').find('.pager .finish').removeClass('disabled');
							} else {
									$('#rootwizard').find('.pager .next').show();
									$('#rootwizard').find('.pager .finish').hide();
							}
					}});
			$('#rootwizard .finish').click(function () {
					alert('Finished!, Starting over!');
					$('#rootwizard').find("a[href*='tab1']").trigger('click');
			});
	});


</script>
<script type="text/javascript">

  function CheckAll(mychk)
  {
    for (i = 0; i < mychk.length; i++)
      mychk[i].checked = true;
  }

  function UnCheckAll(mychk)
  {
    for (i = 0; i < mychk.length; i++)
      mychk[i].checked = false;
  }

</script>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


<?php $this->load->view('footer');?>