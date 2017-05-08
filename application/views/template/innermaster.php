<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<title>CTC Cycle</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=1024, initial-scale=1, minimum-scale: 1, maximum-scale: 1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

<link rel="shortcut icon" href="favicon.ico">
<!-- *************** Online Css Strat *************** -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- *************** Online Css End *************** -->
<!-- *************** Offline Css Strat *************** -->
<link href="<? echo site_url('assets/css/bootstrap/bootstrap.css');?>" rel="stylesheet">
<link rel="stylesheet" href="<? echo site_url('assets/css/bootstrap/font-awesome.css');?>">

<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap-datepicker.css'); ?>"  type="text/css"/>
<link rel="stylesheet" href="<?php echo site_url('assets/css/wickedpicker.min.css'); ?>"  type="text/css"/>
<!-- *************** Offline Css End *************** -->
<link href="<? echo site_url('assets/css/plugins.css');?>" rel="stylesheet" type="text/css" />
<link href="<? echo site_url('assets/css/style.css');?>" rel="stylesheet" type="text/css" />
<link href="<? echo site_url('assets/css/easy-responsive-tabs.css')?>" rel="stylesheet" type="text/css" />
<link href="<? echo site_url('assets/css/index.css')?>" rel="stylesheet" type="text/css" />
<!--  <link rel="stylesheet" href="<?php echo site_url('assets/css/jquery-ui.css'); ?>"  type="text/css"/> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<script src="<? echo site_url('assets/js/jquery.min.js');?>"></script>
<script src="<? echo site_url('assets/js/bootstrap/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/admin/plugins/jQuery/jquery.validate.js');?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-datepicker.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo site_url('assets/js/wickedpicker.js'); ?>"></script>
<!-- <script>
window.location.replace("<? echo site_url();?>");
</script>  -->
<script>
 $(function() {
 $( "#tabs" ).tabs();
 });
 </script>
</head>
<body>
 

<!-- =========== Header Area Strat =========== -->
<div class="headermain">
<?php $this->load->view('includes/header');?>

</div>
<!-- =========== Header Area End =========== --> 


<!-- =========== Navigation Area Strat =========== -->
<?php $this->load->view('includes/navigation');?>

<!-- =========== Home Content Area Strat =========== -->
 <?php $this->load->view($main);?>
<!-- =========== Home Content Area End =========== --> 
<!-- =========== Footer Area Strat =========== -->
<div class="footermain">
<?php $this->load->view('includes/footer');?>
</div>



<!-- Modal -->





<!----- thanks you message popup ----->

<!-- =========== Footer Content Area End =========== --> 
<!-- *************** Offline Js Strat *************** -->
<script src="<? echo site_url('assets/js/bootstrap/ie10-viewport-bug-workaround.js');?>"></script>
<script src="<?php echo site_url('assets/js/jquery-ui.js'); ?>"></script>
<!--[if lt IE 9]>
      <script src="js/bootstrap/html5shiv.min.js"></script>
      <script src="js/bootstrap/respond.min.js"></script>
<![endif]-->
<!-- *************** Offline Js End *************** -->
<!-- All js in plughins.js in site Strat -->
<script src="<? echo site_url('assets/js/jquery.film_roll.min.js');?>"></script>
<script src="<? echo site_url('assets/js/easyResponsiveTabs.js');?>"></script>
<script src="<? echo site_url('assets/js/jquery.transit.min.js');?>"></script>
<script src="<? echo site_url('assets/js/plugins.js');?>"></script>
<!-- All js in plughins.js in site End -->
<!-- All script in custom.js in site Strat --> 
<script src="<? echo site_url('assets/js/custom.js');?>"></script> 
<!-- All script in custom.js in site End -->

</body>
</html>