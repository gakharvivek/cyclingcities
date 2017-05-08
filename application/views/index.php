<div class="comingsoonpage martop64 homecontent">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		   <? if(isset($article['article_desc']))
			   {?>
				  <h1><span class="redcolor">HOW</span> CYCLING  CITIES <span class="redcolor">WORKS</span> ?</h1>
				  <p class="text-center"> <?=$article['article_desc'];?></p>
			 <?}?>

		  <?php
			if (isset($chronicles)) 
			  {?>
				<h1 class="martop30"><span class="redcolor">INDIAN</span> CYCLING <span class="redcolor">CRONICLES</span></h1>
				<div class="homeslidecarousel">
					<div id="owl-example4" class="owl-carousel">
					  <?
					   foreach ($chronicles as $row) 
						{?>
							<div class="owl-item">
								<a href="<?php echo site_url('chronicles/chronicles_detail'); ?>/<?php echo $row['chronicles_id']; ?>">
									<img src="<? echo site_url('upload/chronicles');?>/<?=$row['chronicles_image'];?>" alt="">
								</a>
							</div>
					 <?}?>
					</div>
				</div>
			<?}?>
		</div> 
	  </div>
	  <div class="row">
		<div class="col-md-7 col-sm-12 padrightzero">
		<div class="homemapnavi">
		<div class="homeindmap"><img src="<? echo site_url('assets/images/map_india.png');?>" alt=""/></div>
		<div class="redcolorback"><strong>NOW<br/>CYCLING</strong> <br/>IN YOUR CITY</div>
		</div>
		</div>
		<div class="col-md-5 col-sm-12 padleftzero">
			<div class="homegrayback">
				<h2>JOIN THE INDIA'S FASTEST GROWING COMMUNITY<br/>WHICH CITY ARE YOU<br/>PEDALLING FROM?</h2>
				<span class="homettl"><strong>Cycling</strong> Cities</span>
				<div class="clear"></div>
				<div class="selectcitydrop">
				   <select class="myval maploc">
					  <option value="">Select City</option>                                    
					  <?php
						if (isset($maploc)) {
						  foreach ($maploc as $row) {
							?>
							<option value="<?= $row['id']; ?>" ><?= $row['maploction_city']; ?></option>
							<?php
						  }
						}
					  ?>                
					</select>
				</div>
				<div class="clear"></div>
				<!-- <div class="vadorara"><strong>VADODARA,</strong> GUJARAT</div> -->
				<p class="contain-paraajax"></p>
			</div>
		</div>
	  </div>

	  <script>
		 function openspan(value)
		 {
			 
			 if(value=="rides")
			 {
				 $("#eventsspan").hide();
				 $("#allspan").hide();
				 $("#tomorrowspan").hide();
				 $("#weekspan").hide();
				 $("#ridesspan").show();

				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").hide();
			 }
			 else if(value=="events")
			 {
				 //alert(value);
				 $("#eventsspan").show();
				 $("#ridesspan").hide();
				 $("#allspan").hide();
				 $("#tomorrowspan").hide();
				 $("#weekspan").hide();

				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").hide();
				 
				 
			 }
			 else if(value=="tomorrow")
			 {
				 $("#tomorrowspan").show();
				 $("#ridesspan").hide();
				 $("#allspan").hide();
				 $("#weekspan").hide();
				 $("#eventsspan").hide();

				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").hide();
				 
				 
			 }
			 else if(value=="week")
			 {
				 $("#weekspan").show();
				 $("#ridesspan").hide();
				 $("#allspan").hide();
				 $("#tomorrowspan").hide();
				 $("#eventsspan").hide(); 

				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").hide();
			 }
			 else
			 {
				 //alert("all");
				 $("#allspan").show();
				 $("#ridesspan").hide();
				 $("#eventsspan").hide();
				 $("#tomorrowspan").hide();
				 $("#weekspan").hide(); 

				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").hide();
			 }
		 }

		 function openli(value)
		 {
			 
			 if(value=="rides")
			 {
				 $(".eventsli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 $(".ridesli").show();
			 }
			 else if(value=="events")
			 {
				 //alert(value);
				 $(".eventsli").show();
				 $(".ridesli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide();
				 
				 
			 }
			 else if(value=="tomorrow")
			 {
				 $(".tomorrowli").show();
				 $(".ridesli").hide();
				 $(".allli").hide();
				 $(".weekli").hide();
				 $(".eventsli").hide();
				 
				 
			 }
			 else if(value=="week")
			 {
				 $(".weekli").show();
				 $(".ridesli").hide();
				 $(".allli").hide();
				 $(".tomorrowli").hide();
				 $(".eventsli").hide(); 
			 }
			 else
			 {
				 //alert("all");
				 $(".allli").show();
				 $(".ridesli").hide();
				 $(".eventsli").hide();
				 $(".tomorrowli").hide();
				 $(".weekli").hide(); 
			 }
		 }
	  </script>

	  <div class="rideevents">
		  <div class="row">
			<div class="col-md-12 col-sm-12">
				<h1><span class="redcolor">RIDES</span> & <span class="redcolor">EVENTS</span></h1>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="ridesmenu">
					<a href="javascript:void(0);" onclick="openspan('rides');">RIDES</a><a href="javascript:void(0);" onclick="openspan('events');">EVENTS</a><a href="javascript:void(0);" onclick="openspan('all');">ALL</a> 
					<? if($this->user_fm->loggedin() == FALSE)
					 {?>
						<a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin">ADD RIDE</a>
				   <?}
				   else
					 {?>
						<a href="javascript:void(0)" data-toggle="modal" data-target="#myModaladdrides">ADD RIDE</a>
				   <?}?>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="ridesmenu pull-right">
					<a href="javascript:void(0);" onclick="openspan('tomorrow');">TOMMORROW</a><a href="javascript:void(0);" onclick="openspan('week');">THIS WEEKEND</a> <a href="javascript:void(0);" onclick="openspan('all');">ALL</a>
				</div>
			</div>

			<span id="ridesspan">
				<?if (count($rides)) 
				   {
					   $crides=0;
					   ?>
					<div class="col-md-12">
						<div class="eventsbox">
							<ul>
							 <? foreach ($rides as $row) 
								 {
									$ride_date = $row['ride_date'];
									
									if ($crides < 3)
									{?>
									 <li>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
									  <? $crides++;
									}
									else 
									{ ?>
									  <li style="display:none" class='ridesli'>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
								  <?}
								 }?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
						<div class="viewmorebtm"><a href="javascript:void(0);" onclick="openli('rides');">View <span class="redcolor">More</span></a></div>
					</div>
				 <?}?> 
			</span>

			<span id="eventsspan" style="display:none;">
				<?if (count($events)) 
				   {
					   $cevents=0;
					   ?>
					<div class="col-md-12">
						<div class="eventsbox">
							<ul>
							 <? foreach ($events as $row) 
								 {
									$ride_date = $row['ride_date'];
									
									if ($cevents < 3)
									{?>
									 <li>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
									  <? $cevents++;
									}
									else 
									{ ?>
									  <li style="display:none" class='eventsli'>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
								  <?}
								 }?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
						<div class="viewmorebtm"><a href="javascript:void(0);" onclick="openli('events');">View <span class="redcolor">More</span></a></div>
					</div>
				 <?}?> 
			</span>

			<span id="tomorrowspan" style="display:none;">
				<?if (count($tomorrow)) 
				   {
					   $ctomorrow=0;
					   ?>
					<div class="col-md-12">
						<div class="eventsbox">
							<ul>
							 <? foreach ($tomorrow as $row) 
								 {
									$ride_date = $row['ride_date'];
									
									if ($ctomorrow < 3)
									{?>
									 <li>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
									  <? $ctomorrow++;
									}
									else 
									{ ?>
									  <li style="display:none" class='tomorrowli'>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
								  <?}
								 }?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
						<div class="viewmorebtm"><a href="javascript:void(0);" onclick="openli('tomorrow');">View <span class="redcolor">More</span></a></div>
					</div>
				 <?}?> 
			</span>

			<span id="weekspan" style="display:none;">
				<?if (count($week)) 
				   {
					   $cweek=0;
					   ?>
					<div class="col-md-12">
						<div class="eventsbox">
							<ul>
							 <? foreach ($week as $row) 
								 {
									$ride_date = $row['ride_date'];
									
									if ($cweek < 3)
									{?>
									 <li>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
									  <? $cweek++;
									}
									else 
									{ ?>
									  <li style="display:none" class='weekli'>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
								  <?}
								 }?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
						<div class="viewmorebtm"><a href="javascript:void(0);" onclick="openli('week');">View <span class="redcolor">More</span></a></div>
					</div>
				 <?}?> 
			</span>

			<span id="allspan" style="display:none;">
				<?if (count($all)) 
				   {
					   $call=0;
					   ?>
					<div class="col-md-12">
						<div class="eventsbox">
							<ul>
							 <? foreach ($all as $row) 
								 {
									$ride_date = $row['ride_date'];
									
									if ($call < 3)
									{?>
									 <li>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
									  <? $call++;
									}
									else 
									{ ?>
									  <li style="display:none" class='allli'>
										  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
											 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
											 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
										  </a>
									 </li>
								  <?}
								 }?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-12">
						<div class="viewmorebtm"><a href="javascript:void(0);" onclick="openli('all');">View <span class="redcolor">More</span></a></div>
					</div>
				 <?}?> 
			</span>
			
			<div class="clear"></div>
			<div class="col-md-6 col-sm-12 padrightzero">
				<div class="sampleheading">
					<? if(isset($cyclingclub['article_desc']))
					   {?>
						  <?=$cyclingclub['article_desc'] ?>
					 <?}?>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 padleftzero fntcentury">
				<div class="redbakbox">
					<span class="redttl fnt50">RISE</span> <br/>
					<span class="redttl fnt50">OF THE</span> <br/>
                    <span class="redtxt">CYCLING CLUBS</span>
				</div>
			</div>
		  </div>
	  </div>
	  
	  <?if (isset($testimonial)) 
		 {?>
			  <div class="hometextimonialsmain fntcentury">
				<div class="col-md-12 col-sm-12">
					<h1>Our <span class="redcolor">Testimonials</span></h1>
					<div class="testimonialscarousel">
					  <div id="owl-example5" class="owl-carousel">  
						  <? foreach ($testimonial as $row) 
							  {?>
								  <div class="owl-item">
								   <div class="testimonialstext">
									<p><?=$row['testimonial_text'] ?></p>
									<div class="authorname"><strong><?=$row['publisher_name'] ?>,</strong><br/><?=$row['position'] ?>, <?=$row['company'] ?>.</div>
								   </div>
								  </div>
							<?}?>
					  </div>
					</div>
				</div>
			  </div>
	   <?}?>
	  
	</div>
</div>

  

  <script>
    $('.maploc').change(function () {
      var id = $(this).val();

      $.ajax({
        url: '<?php echo site_url("dashboard/getdesc"); ?>',
        type: 'POST',
        data: {id: id},
        success: function (data) {
          $('.contain-paraajax').html('');
          $('.contain-paraajax').html(data);
        }
      });
    });

  </script>

  <script type="text/javascript">
    $(window).load(function () {
      $('#mynewslettermodel').modal({backdrop: 'static', keyboard: false},'show');
    });
  </script>