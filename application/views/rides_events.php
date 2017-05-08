<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>   <span class="redcolor">Rides </span> &amp; <span class="redcolor">Events </span></h1>
       
    </div>
  </div>   
</div>

<div class="chroniclesbox fntcentury detailpage">
  <div class="container">
	  <div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="ridesmenu">
				<a href="javascript:void(0);" onclick="openspan('rides');">RIDES</a><a href="javascript:void(0);" onclick="openspan('events');">EVENTS</a><a href="javascript:void(0);" onclick="openspan('all');">ALL</a> 
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="ridesmenu pull-right">
				<a href="javascript:void(0);" onclick="openspan('tomorrow');">TOMMORROW</a><a href="javascript:void(0);" onclick="openspan('week');">THIS WEEKEND</a> <a href="javascript:void(0);" onclick="openspan('all');">ALL</a>
			</div>
		</div>

		<span id="ridesspan">
			<?if (count($rides)) 
			   {?>
				<div class="col-md-12">
					<div class="eventsbox">
						<ul>
						 <? foreach ($rides as $row) 
							 {
								$ride_date = $row['ride_date'];
								?>
								 <li>
									  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
										 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
										 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
									  </a>
								 </li>
						   <?}?>
						</ul>
					</div>
				</div>
			 <?}?> 
		</span>

		<span id="eventsspan" style="display:none;">
			<?if (count($events)) 
			   {?>
				<div class="col-md-12">
					<div class="eventsbox">
						<ul>
						 <? foreach ($events as $row) 
							 {
								$ride_date = $row['ride_date'];?>
								 <li>
									  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
										 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
										 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
									  </a>
								 </li>
						   <?}?>
						</ul>
					</div>
				</div>
			 <?}?> 
		</span>

		<span id="tomorrowspan" style="display:none;">
			<?if (count($tomorrow)) 
			   {?>
				<div class="col-md-12">
					<div class="eventsbox">
						<ul>
						 <? foreach ($tomorrow as $row) 
							 {
								$ride_date = $row['ride_date'];?>
								 <li>
									  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
										 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
										 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
									  </a>
								 </li>
						   <?}?>
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
			   {?>
				<div class="col-md-12">
					<div class="eventsbox">
						<ul>
						 <? foreach ($week as $row) 
							 {
								$ride_date = $row['ride_date'];?>
								 <li>
									  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
										 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
										 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
									  </a>
								 </li>
						   <?}?>
						</ul>
					</div>
				</div>
			 <?}?> 
		</span>

		<span id="allspan" style="display:none;">
			<?if (count($all)) 
			   {?>
				<div class="col-md-12">
					<div class="eventsbox">
						<ul>
						 <? foreach ($all as $row) 
							 {
								$ride_date = $row['ride_date'];?>
								 <li>
									  <a href="<?php echo site_url('rides_events/rides_events_details'); ?>/<?=$row['category'];  ?>/<?=$row['ride_id'];?>">
										 <img src="<? echo site_url('upload/ride/poster');?>/<?=$row['ride_poster']; ?>" alt=""/>
										 <span><?=$row['ride_title'] ?> | <?=date('dS F, Y', strtotime($ride_date)); ?> <?=$row['ride_time'] ?>, <br/><?=$row['ride_start_point'] ?></span>
									  </a>
								 </li>
						   <?}?>
						</ul>
					</div>
				</div>
			 <?}?> 
		</span>
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