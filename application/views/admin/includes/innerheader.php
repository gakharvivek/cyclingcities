<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CyclingCities </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/bootstrap/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/dist/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/dist/css/skins/_all-skins.min.css');?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/iCheck/flat/blue.css');?>">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/morris/morris.css');?>">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/datepicker/datepicker3.css');?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css');?>">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.css');?>">

		<link rel="stylesheet" href="<?php echo site_url('assets/admin/plugins/datatables/dataTables.bootstrap.css');?>"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo site_url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
		<script src="<?php echo site_url('assets/admin/bootstrap/js/bootstrap.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/admin/plugins/jQuery/jquery.validate.js');?>"></script>

    </head>
	<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url('admins/dashboard/index');?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>C</b>C</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Cycling</b>Cities</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('upload/user');?>/<?php echo $this->session->userdata('pic'); ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('upload/user');?>/<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $this->session->userdata('name'); ?> - <?php echo $this->session->userdata('role_name'); ?>
                                          <!--<small>Member since Sep. 2014</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url('admins/profile');?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('index.php/admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <!-- <li>
                               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                             </li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('upload/user');?>/<?php echo $this->session->userdata('pic'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('name'); ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

					 <? 
					    //$this->load->model('user_model');
					    $role_id = $this->session->userdata('role_id');
					    $user_per = $this->user_model->get_user_permission($role_id);
					 ?>
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <a href="<?php echo site_url('admins/dashboard/index');?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                            </a>

                        </li>
						<?
							foreach($user_per as $row)
							   {
									    if($row['mod_id']==12)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/user');?>"><i class="fa fa-circle-o"></i> Manage User</a></li>
													<li><a href="<?php echo site_url('admins/user/add');?>"><i class="fa fa-circle-o"></i> Add User</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==1)
										{?>

										    <li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Article</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/article');?>"><i class="fa fa-circle-o"></i> Manage Article</a></li>
													<li><a href="<?php echo site_url('admins/article/add');?>"><i class="fa fa-circle-o"></i> Add Article</a></li>
													<li><a href="<?php echo site_url('admins/article/category');?>"><i class="fa fa-circle-o"></i> Manage Category</a></li>
													<li><a href="<?php echo site_url('admins/article/addcate');?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
													<li><a href="<?php echo site_url('admins/article/subcategory');?>"><i class="fa fa-circle-o"></i> Manage Subcategory</a></li>
													<li><a href="<?php echo site_url('admins/article/addsub');?>"><i class="fa fa-circle-o"></i> Add Subcategory</a></li>
												</ul>
											</li>	
									  <?}

									    if($row['mod_id']==13)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Join Us</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/join_us');?>"><i class="fa fa-circle-o"></i>Join Us List</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==3)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Cycle Information</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/cycle_info/brand');?>"><i class="fa fa-circle-o"></i> Manage Brand</a></li>
													<li><a href="<?php echo site_url('admins/cycle_info/addbrand');?>"><i class="fa fa-circle-o"></i> Add Brand</a></li>
													<li><a href="<?php echo site_url('admins/cycle_info/model');?>"><i class="fa fa-circle-o"></i> Manage Model</a></li>
													<li><a href="<?php echo site_url('admins/cycle_info/addmodel');?>"><i class="fa fa-circle-o"></i> Add Model</a></li>
													<li><a href="<?php echo site_url('admins/features');?>"><i class="fa fa-circle-o"></i> Manage Features</a></li>
													<li><a href="<?php echo site_url('admins/features/add');?>"><i class="fa fa-circle-o"></i> Add Features</a></li>
													<li><a href="<?php echo site_url('admins/accessories');?>"><i class="fa fa-circle-o"></i> Manage Accessories</a></li>
													<li><a href="<?php echo site_url('admins/accessories/add');?>"><i class="fa fa-circle-o"></i> Add Accessories</a></li>
													<!-- <li><a href="<?php echo base_url(); ?>parts/index"><i class="fa fa-circle-o"></i> Manage Parts</a></li>
													<li><a href="<?php echo base_url(); ?>parts/add"><i class="fa fa-circle-o"></i> Add Parts</a></li>-->
												</ul>
											</li>
									  <?}

										if($row['mod_id']==14)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Advertise</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/advertise');?>"><i class="fa fa-circle-o"></i> Manage Advertise</a></li>
													<li><a href="<?php echo site_url('admins/advertise/add');?>"><i class="fa fa-circle-o"></i> Add Advertise</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==10)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Shop</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/shop');?>"><i class="fa fa-circle-o"></i> Manage Shop</a></li>
													<li><a href="<?php echo site_url('admins/shop/add');?>"><i class="fa fa-circle-o"></i> Add Shop </a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==6)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Team</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/team');?>"><i class="fa fa-circle-o"></i> Manage Team</a></li>
													<li><a href="<?php echo site_url('admins/team/add');?>"><i class="fa fa-circle-o"></i> Add Team Member </a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==15)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Map Location</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/maplocation');?>"><i class="fa fa-circle-o"></i> Manage Map Location</a></li>
													<li><a href="<?php echo site_url('admins/maplocation/add');?>"><i class="fa fa-circle-o"></i> Add Map Location </a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==9)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Rides</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/ride');?>"><i class="fa fa-circle-o"></i> Manage Ride</a></li>
													<li><a href="<?php echo site_url('admins/ride/add');?>"><i class="fa fa-circle-o"></i> Add Ride </a></li>
												</ul>
											</li>
								      <?}

										if($row['mod_id']==8)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Post Cycle</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/post_cycle/sell_list');?>"><i class="fa fa-circle-o"></i>Manage Sell Cycle List</a></li>
													<li><a href="<?php echo site_url('admins/post_cycle/try_list');?>"><i class="fa fa-circle-o"></i>Manage Try Cycle List</a></li>
													<li><a href="<?php echo site_url('admins/post_cycle/index');?>"><i class="fa fa-circle-o"></i> Manage Post Cycle</a></li>
													<li><a href="<?php echo site_url('admins/post_cycle/add');?>"><i class="fa fa-circle-o"></i> Add Post Cycle </a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==2)
										{?>
										    <li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Cycle Chronicles</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/chronicles');?>"><i class="fa fa-circle-o"></i> Manage Chronicles</a></li>
													<li><a href="<?php echo site_url('admins/chronicles/add');?>"><i class="fa fa-circle-o"></i> Add Chronicles </a></li>
													<li><a href="<?php echo site_url('admins/chronicles/category');?>"><i class="fa fa-circle-o"></i> Manage Chronicles Category</a></li>
													<li><a href="<?php echo site_url('admins/chronicles/addcate');?>"><i class="fa fa-circle-o"></i> Add Chronicles Category</a></li>
												</ul>
											</li>
											
									  <?}

									  if($row['mod_id']==16)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Intern</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/intern');?>"><i class="fa fa-circle-o"></i> Manage Intern</a></li>
													<li><a href="<?php echo site_url('admins/intern/add');?>"><i class="fa fa-circle-o"></i> Add Intern </a></li>
												</ul>
											</li>
									  <?}

									  if($row['mod_id']==17)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Partner</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/partner');?>"><i class="fa fa-circle-o"></i> Manage partner</a></li>
													<li><a href="<?php echo site_url('admins/partner/add');?>"><i class="fa fa-circle-o"></i> Add partner </a></li>
												</ul>
											</li>
									  <?}
										

										if($row['mod_id']==4)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Gallery</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/gallery');?>"><i class="fa fa-circle-o"></i> Manage Gallery</a></li>
													<li><a href="<?php echo site_url('admins/gallery/add');?>"><i class="fa fa-circle-o"></i> Add Gallery </a></li>
												</ul>
											</li>
									  <?}
										
										if($row['mod_id']==5)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Testimonial</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/testimonial');?>"><i class="fa fa-circle-o"></i> Manage Testimonial</a></li>
													<li><a href="<?php echo site_url('admins/testimonial/add');?>"><i class="fa fa-circle-o"></i> Add Testimonial </a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==7)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Know Cycle</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/knowurcycle');?>"><i class="fa fa-circle-o"></i> Manage Know Cycle</a></li>
													<li><a href="<?php echo site_url('admins/knowurcycle/add');?>"><i class="fa fa-circle-o"></i> Add Know Cycle </a></li>
												</ul>
											</li>
										<?}

										if($row['mod_id']==21)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Why Cycle</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/whycycle');?>"><i class="fa fa-circle-o"></i> Manage Why Cycle</a></li>
													<li><a href="<?php echo site_url('admins/whycycle/add');?>"><i class="fa fa-circle-o"></i> Add Why Cycle </a></li>
												</ul>
											</li>
										<?}

										
										if($row['mod_id']==18)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Contact Us</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/contactus');?>"><i class="fa fa-circle-o"></i> Manage Contact</a></li>
													<!--<li><a href="<?php //echo base_url(); ?>contactus/add"><i class="fa fa-circle-o"></i> Add Contact </a></li>-->
												</ul>
											</li>
									  <?}

										if($row['mod_id']==19)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>User Front List</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/user_front');?>"><i class="fa fa-circle-o"></i>User Front</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==20)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>CMS</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/cms');?>"><i class="fa fa-circle-o"></i>Manage CMS</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==22)
										{?>
											<li class=" treeview">
												<a href="#">
													<i class="fa fa-dashboard"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
												</a>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/reports');?>"><i class="fa fa-circle-o"></i>User Registrations</a></li>
												</ul>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/reports/trycycledata');?>"><i class="fa fa-circle-o"></i>Try Cycle Data</a></li>
												</ul>
												<ul class="treeview-menu">
													<li><a href="<?php echo site_url('admins/reports/sellcycledata');?>"><i class="fa fa-circle-o"></i>Sell Cycle Data</a></li>
												</ul>
											</li>
									  <?}

										if($row['mod_id']==11)
										{?>
											
										<?}		
										
							   }
						?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> Control panel</h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">