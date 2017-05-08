<div class="navigation">
<div class="container">
  <div class="row">
    <div class="col-md-12">
     <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="menuttl"> Menu</span>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li  <? if($websitepagename=='' || $websitepagename=="index") {?>  class="active"<? } ?>><a href="<? echo site_url('');?>">Home</a></li>
              <li <? if($websitepagename=='aboutus' ) {?>  class="active"<? } ?>><a href="<? echo site_url('aboutus');?>">About US</a></li>
              <li <? if($websitepagename=='why_cycle' || $websitepagename=='know_your_cycle' || $websitepagename=='which_cycle' || $websitepagename=='try_cycle' || $websitepagename=='buycycle_usedcycle' || $websitepagename=='where_to_buy' ) {?>  class="active dropdown"<? } ?> class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Cycle  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a href="<? echo site_url('your_cycle/why_cycle');?>">Why Cycle ?</a></li>
                  <li><a href="<? echo site_url('your_cycle/know_your_cycle');?>">Know Your Cycle</a></li>
                  <li><a href="<? echo site_url('your_cycle/which_cycle');?>">Which Cycle ?</a></li>
                  <li><a href="<? echo site_url('your_cycle/try_cycle');?>">Try Cycle</a></li>
                  <li><a href="<? echo site_url('your_cycle/where_to_buy');?>">Where To Buy Cycle ?</a></li>            
                  <li><a href="<? echo site_url('your_cycle');?>">Buy/sell Used Cycle</a></li>
                </ul>
              </li>             
              
               <li <? if($websitepagename=='chronicles' ) {?>  class="active"<? } ?>><a href="<? echo site_url('chronicles');?>">Cycling Cronicles</a></li>  
               <li <? if($websitepagename=='rides_events' ) {?>  class="active"<? } ?>><a href="<? echo site_url('rides_events');?>">Rides &amp; Events </a></li> 
        
               <li <? if($websitepagename=='') {?> class="dropdown" <? } else {?>class="dropdown" <? } ?>><a href="<? echo site_url('news');?>" <?if($websitepagename=='news' || $websitepagename=='news_detail' ) {?>  class="active"<? } ?>>News</a></li>  

			   <? if($this->user_fm->loggedin() == TRUE)
		         {?>
				   <li <? if($websitepagename=='mycycle' || $websitepagename=="myquotations"|| $websitepagename=="myquotations_detail" || $websitepagename=="myrides" || $websitepagename=="myroutes"  || $websitepagename=="mydiscount" || $websitepagename=="mylisting"
					|| $websitepagename=="myactivity"  || $websitepagename=="edit_profile" || $websitepagename=="refer_tofriend" || $websitepagename=="settings"|| $websitepagename=="sendfacebook") {?> class="dropdown" <? } else {?>class="dropdown" <? } ?>>
					   <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" <? if($websitepagename=='mycycle' || $websitepagename=="myquotations"|| $websitepagename=="myquotations_detail" || $websitepagename=="myrides" || $websitepagename=="myroutes"  || $websitepagename=="mydiscount" || $websitepagename=="mylisting" ) {?> class="dropdown-toggle active" <? } else {?>class="dropdown-toggle" <? } ?>>My Activity  <span class="caret"></span></a>
						<ul class="dropdown-menu">       
						  <!-- <li><a href="<? echo site_url('myactivity/myroutes');?>">MY ROUTES</a></li>
						  <li><a href="<? echo site_url('myactivity/myrides');?>">MY RIDES</a></li>
						  <li><a href="<? echo site_url('myactivity/mydiscount');?>">MY DISCOUNTS</a></li> -->
						  <li><a href="<? echo site_url('myactivity/mylisting');?>">MY LISTINGS</a></li>
						  <!-- <li><a href="<? echo site_url('myactivity/myquotations');?>">MY QUOTATIONS</a></li>    -->         
						  <li><a href="<? echo site_url('myactivity/mycycle');?>">MY CYCLE</a></li>
						</ul>
				   </li> 
				   
				   <li <? if($websitepagename=='mycycle' || $websitepagename=="myquotations" || $websitepagename=="myquotations_detail"  || $websitepagename=="myrides" || $websitepagename=="myroutes"  || $websitepagename=="mydiscount" || $websitepagename=="mylisting"
					|| $websitepagename=="myactivity"  || $websitepagename=="edit_profile" || $websitepagename=="refer_tofriend" || $websitepagename=="settings"|| $websitepagename=="sendfacebook") {?> class="dropdown" <? } else {?>class="dropdown" <? } ?>>
						<a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
						<? if ( $websitepagename=="myactivity"  || $websitepagename=="edit_profile" || $websitepagename=="refer_tofriend" || $websitepagename=="settings"|| $websitepagename=="sendfacebook" ) {?>class="dropdown-toggle active" <? } else {?>class="dropdown-toggle"<? }?>>Personal Profile<span class="caret"></span></a>
					 <ul class="dropdown-menu">       
					  <!-- <li><a href="<? echo site_url('user/logout');?>">Logout</a></li> -->
					  <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModalfeedback">Send Feedback</a></li>
					  <!-- <li><a href="<? echo site_url('personal_profile/settings');?>">Settings</a></li> -->
					  <li><a href="<? echo site_url('personal_profile/refer_tofriend');?>">Refer to Friend</a></li>
					  <li><a href="<? echo site_url('personal_profile/view_profile');?>">View Profile</a></li>            
					  <!-- <li><a href="<? echo site_url('personal_profile');?>">MY ACtivity</a></li> -->
					</ul>
				   </li>  
			   <?}?>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
        <span class="rightback"></span>
        <span class="leftback"></span>
        <div class="menushadow">
      <span class="shadowright"></span>
      </div>
      </nav>
      
    </div>
  </div>
</div>
</div>