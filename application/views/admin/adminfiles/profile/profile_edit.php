
<?php  $this->load->view('header'); 

//$profile = $this->profile_model->getprofile();
?>
<div class="row-fluid">
  
	
    <div class="col-md-3"></div>
              <div class="box col-md-6">
                <div class="box-header with-border">Edit Profile </div>
                <div class="box-body with-border">
                 
                    <!-- text input -->
                    <div class="form-group ">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="text" class="form-control" name="gender" value="<?php echo $result['gender'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control datepicker" name="bdate" value="<?php echo date('m/d/Y', strtotime($result['dob']));?>"/>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" class="form-control" name="role" value="<?php echo $result['role'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>State</label>
                      <input type="text" class="form-control" name="state" value="<?php echo $result['state'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" value="<?php echo $result['city'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <input type="text" class="form-control" name="type" value="<?php echo $result['type'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Occupation</label>
                      <input type="text" class="form-control" name="occu" value="<?php echo $result['occu'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Skill</label>
                      <input type="text" class="form-control" name="skill" value="<?php echo $result['skill'] ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Pic.</label>
                      <input type="text" class="form-control" name="pic" value="<?php echo $result['pic'] ?>"/>
                    </div>
                    
                    <div class="">
                      
                      <!--input type="submit" class="btn btn-group btn-primary"  value="Update" /-->
                       <a href='<?php echo base_url();?>user/edit/<?php echo $result['id'] ?>' class="btn btn-group btn-primary"> Edit Profile</a>
					   <a href="<?php echo base_url();?>profile/index" type="reset" class="btn">Cancel</a>
                    </div>
                 
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




<li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php echo base_url(); ?>user/index"><i class="fa fa-circle-o"></i> Manage User</a></li>
                <li><a href="<?php echo base_url(); ?>user/add"><i class="fa fa-circle-o"></i> Add User</a></li>
              </ul>
            </li>