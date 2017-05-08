<!-- =========== Home Content Area Strat =========== -->
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>My <span class="redcolor">Listing</span></h1>
        <h2><span class="redcolor">Sampe text</span> to how to go ahead in choosing the cycle, <br/>sampe text <span class="redcolor">T& choose the cycles by</span></h2>
		<div class="myquotations">
			<ul>
			    <?php
                    //print_r($my_listing); exit;
                    if (isset($my_listing)) 
					{
                      $x=1;
                      foreach ($my_listing as $row) 
					   {
                         $p_date=$row['post_date'];
                         $x++;
							 if($x%2!=0)
							 {?>
								  <li class="brdrbtm"> 
						   <?}
							 else
							 {?>
								  <li class="brdrright brdrbtm">
						   <?}?>
										<a href="javscript:void(0);" data-toggle="modal" data-target="#myModallisting<?php echo $row['id'] ?>"><span class="cycleimg mylisting_img"><img src="<?php echo site_url('upload/buysell'); ?>/<?php echo $row['img2'] ?>" alt=""/></span>
										<span class="quotetext"><h4><?php echo $this->myactivity_model->getmodelname($row['model_id']); ?></h4>
										<p class="fntcentury">Post for Try/Sell Cycle on <strong><?php echo date('dS F Y', strtotime($p_date)); ?> </strong><!-- <br/> <span class="fnt14"> Valid Till <strong>10 March 2016</strong></span> --></p>
										</span></a>
										<div class="clear"></div>
				     <?}?>
					              </li>
				  <?}?>
			</ul>
			<div class="clear"></div>
		</div>
    </div>
  </div>
</div>
</div>

<?if (isset($my_listing)) 
	{
	  foreach ($my_listing as $row1) 
	   {
		  $p_date=$row['post_date'];
		  ?>
			<div id="myModallisting<?php echo $row1['id'] ?>" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
			  <div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
				  
				  <div class="modal-body padzero">
				  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
				  <div class="row">
				   <div class="col-md-7"><img src="<?php echo site_url('upload/buysell'); ?>/<?php echo $row1['img2'] ?>" alt="" class="img-responsive"/></div>
				   <div class="col-md-5">
				   <div class="popupcontent fntcentury martop20">
					<ul>
						<li>
							<span class="ttle1">Brand</span>
							<span class="ttltext"><?php echo $this->buyusedcycle_model->getbrandname($row['brand_id']);?></span>
						</li>
						<li>
							<span class="ttle1">Model</span>
							<span class="ttltext"><?php echo $this->buyusedcycle_model->getmodelname($row['model_id']);?></span>
						</li>
						<li>
							<span class="ttle1">Price</span>
							<span class="ttltext"><?php echo $row['selling_price']; ?>/-</span>
						</li>
						<li>
							<span class="ttle1">Purchase year</span>
							<span class="ttltext"><?php echo $row['purchase_year']; ?></span>
						</li>
						<li>
							<span class="ttle1">Frame size</span>
							<span class="ttltext"><?php echo $row['frame_size']; ?></span>
						</li>
						<li>
							<span class="ttle1">Accessories</span>
							<span class="ttltext"><?php echo $row['accessories']; ?></span>
						</li>
						<li>
							<span class="ttle1">Posted on</span>
							<span class="ttltext"><?php echo date('dS F Y', strtotime($p_date)); ?></span>
						</li>
					</ul>
				   </div>
				   </div>
				   </div>
				  </div>
				  
				</div>

			  </div>
			</div>
	 <?}
	}?>

<!-- <div id="myModallisting" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">

	//Modal content
	<div class="modal-content">
	  
	  <div class="modal-body padzero">
	  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
	  <div class="row">
	   <div class="col-md-7"><img src="<? echo site_url('assets/images/googlemap.jpg');?>" alt="" class="img-responsive"/></div>
	   <div class="col-md-5">
	   <div class="popupcontent fntcentury martop20">
		<ul>
			<li>
				<span class="ttle1">RIDE TYPE</span>
				<span class="ttltext">Leisure</span>
			</li>
			<li>
				<span class="ttle1">DATE</span>
				<span class="ttltext">15.11.2015</span>
			</li>
			<li>
				<span class="ttle1">TITLE</span>
				<span class="ttltext">Morning Ride</span>
			</li>
			<li>
				<span class="ttle1">DURATION</span>
				<span class="ttltext">40 Min.</span>
			</li>
			<li>
				<span class="ttle1">DISTANCE</span>
				<span class="ttltext">20KM</span>
			</li>
			 <li>
				<span class="ttle1">ELEVATION</span>
				<span class="ttltext">-</span>
			</li>
			 <li>
				<span class="ttle1">SOURCE</span>
				<span class="ttltext">Strava</span>
			</li>
		</ul>
	   </div>
	   </div>
	   </div>
	  </div>
	  
	</div>
  </div>
</div> -->