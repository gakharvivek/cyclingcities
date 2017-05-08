<div class="row">
    <div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-yellow">
		<div class="inner">
		  <h3><?=count($result);?></h3>
		  <p>User Registrations</p>
		</div>
		<div class="icon">
		  <i class="ion ion-person-add"></i>
		</div>
		<a href="<?php echo site_url('admins/user_front');?>" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-green">
		<div class="inner">
		  <h3><?=count($activeuser);?></h3>
		  <p>Active Users</p>
		</div>
		<div class="icon">
		  <i class="ion ion-person-add"></i>
		</div>
		<a href="<?php echo site_url('admins/user_front');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->

	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-red">
		<div class="inner">
		  <h3><?=count($inactiveuser);?></h3>
		  <p>Inactive Users</p>
		</div>
		<div class="icon">
		  <i class="ion ion-person-add"></i>
		</div>
		<a href="<?php echo site_url('admins/user_front');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
	
	
</div><!-- /.row -->
<!-- Main row -->