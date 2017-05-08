<div class="sticky"><div class="container">
  <div class="row">  
    <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="logo"><a href="<? echo site_url('');?>"><img src="<? echo site_url('assets/images/logo.png');?>" alt="Cycling Cities"/></a></div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12">
   	<div class="headerrightmenu">
    	<ul>
        	<!-- <li><a href="#">Search</a></li> -->
			<? if($this->user_fm->loggedin() == FALSE)
		         {?>
				    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin">Login</a></li>
               <?}
			   else
			     {?>
               <?}?>
			<? if($this->user_fm->loggedin() == TRUE)
		         {
					 $userrole=$this->session->userdata('userrole');
					 ?>
					 <li><?php echo anchor('user/logout', "Logout"); ?></li>
               <?}?> 
            <li><a href="<? echo site_url('joinus');?>">Join Us</a></li>
            <li><a href="<? echo site_url('contactus');?>">Contact Us</a></li>
            <!-- <li><a href="#"><img src="<? echo site_url('assets/images/author.png');?>" alt=""/></a></li> -->
        </ul>
        
    </div>
    	
    </div>
  </div>
</div></div>
