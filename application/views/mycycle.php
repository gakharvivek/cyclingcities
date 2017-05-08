<div class="comingsoonpage martop64">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<h1>My <span class="redcolor">CYCLE</span></h1>
			<h2><span class="redcolor">MY RIDES</span> AS TO HOW TO GO AHEAD IN CHOOSING THE CYCLE, <br/>SAMPLE TEXT HERE & CHOOSE <span class="redcolor">THE CYCLES BY</span></h2>
			<div class="mycycledetailpage">
				<div class="col-md-12 col-sm-12">
						<?php
						if (isset($mycycle1)) {
							foreach ($mycycle1 as $row) {
								?>
								<a href="<?php echo site_url('myactivity/mycycle_detail'); ?>/<?php echo $row['cycle_id']; ?>">
								 <div class="col-md-3 my_cycle_box">
								 <span>
									<?php
									$i = 0;

									$image_arr = explode(",", $row['cycle_pics']);

									foreach ($image_arr as $image_name) {
										$i++;
										if ($i == 1) {
											?>

											<img src=" <?php echo site_url('upload/cycle_pics'); ?>/<?php echo $image_name; ?>" class="img-responsive " alt=""  /> 
											
										<?php
										}
									}
									?>
									</span>
								 </div>
								</a>
								<?php
							}
						}
						?> 
						
						<a href="javascript:void(0);" data-toggle="modal" data-target="#mycycle">
						 <div class="col-md-3 my_cycle_box">
						 <span>
							<img src="<?php echo site_url('assets/images/addcycle.png'); ?>" class="img-responsive"/>
							</span>
						 </div>
						</a>
				</div>
			</div>
		</div>
	  </div>
	</div>
</div>

<script>
	$().ready(function() {
		$("#addmycycle_form").validate();
	});	
</script>

<!-- Modal -->

<div id="mycycle" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:450px;">
    <!-- Modal content-->
	<form action="<?php echo site_url('myactivity/doupload');?>" name="addmycycle_form" id="addmycycle_form" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-body padbtm0 buyandseellpopup">
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		   <div class="col-md-12">
			   <div class="popupcontent fntcentury mycycleii">
				<h2>POST YOUR CYCLE</h2>
				<ul>
				    <li>
						<span class="ttle1">TYPE</span>
						<span class="ttltext">
						    <select name="cycle_type" class="myval required">
								<option value="">Select Type</option>
								<option value="Mountain">Mountain Bike</option>
								<option value="Road">Road Bike</option>
								<option value="Hybrid">Hybrid Bikes</option>
							</select>
						</span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Brand</span>
						<span class="ttltext">
						    <?  $b_name = $this->try_cycle_model->getbrand(); ?>
							<select name="brand" class="myval brand required">
								<option value="">Select Brand</option>
								<?php foreach ($b_name as $row) { ?>
									<option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
										<?php } ?>
							</select>
						</span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Model</span>
						<span class="ttltext">
						    <select name="model" id="mycyclemodel" class="myval model required">
							  <option value="">Select Model</option>
							</select>
					    </span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Purchase Year</span>
						<span class="ttltext"><input type="text" name="purchase_year" id="purchase_year" class="required"/></span>
						<div class="clear"></div>
					</li>
				</ul>
				<ul>
					<li>
					<textarea class="blacktextarea" name="add_info" id="add_info" placeholder="Additional Information"></textarea>
						<div class="clear"></div>
					</li>
					<li class="mycyclecntpop">
						<label>Upload Photo</label> <br/>
						<p>Ensure the cycle is properly visible in the photo Accepted formats are jpeg & png size <strong>< 1MB</strong></p>
						<input type="file" class="required" name="cycle_pics" id="cycle_pics" />
						<input type="file" class="" name="cycle_pics1" id="cycle_pics1" />
						<input type="file" class="" name="cycle_pics2" id="cycle_pics2" />
						<input type="file" class="" name="cycle_pics3" id="cycle_pics3" />
					</li>
				   
					<li style="margin:0px; padding:0px; background:none;">
					<?$userid=$this->session->userdata('fuserid');?>
					<input type="hidden" name="user_id" id="user_id" value="<?=$userid?>" />
					<input type='hidden' name="post_date" value="<?php echo date('m/d/y'); ?>"/>
                    <input type="submit" value="Submit" class="btnaddcycle"/>
					</li>

					
				</ul>
			   </div>
		   </div>
		  </div>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
  //get Publisher 
  $(".brand").change(function () {
	//get the selected value

	var bid = this.value;

	//make the ajax call
	$.ajax({
	  url: '<?php echo site_url("myactivity/aj_model"); ?>',
	  type: 'POST',
	  data: {id: bid},
	  success: function (data) {

		$("#mycyclemodel").html("");
		$("#mycyclemodel").html(data);
	  }
	});
  });
</script>