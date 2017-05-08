<script>
	$().ready(function() {
		$("#editmycycle_form").validate();
	});	
</script>
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>My <span class="redcolor">CYCLE</span></h1>
        <h2><span class="redcolor">MY RIDES</span> AS TO HOW TO GO AHEAD IN CHOOSING THE CYCLE, <br/>
SAMPLE TEXT HERE & CHOOSE <span class="redcolor">THE CYCLES BY</span></h2>
<div class="mycycledetailpage">
	<form action="<?php echo site_url('myactivity/mycycle_edit');?>" name="editmycycle_form" id="editmycycle_form" method="post" enctype="multipart/form-data">
		<div class="col-md-5 col-sm-6 col-md-offset-1">
			<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics']; ?>" class="img-responsive " alt=""/>
		</div>
		<div class="col-md-5 col-sm-6 col-md-offset-1">
			<div class="detailtext fntcentury">
				<span><strong>BRAND</strong> 
				   <span class="profiledropdown"><select class="brand myval required" name="b_name">
					  <?php foreach ($b_name as $row) { ?>
						  <option value="<?php echo $row['brand_id']; ?>" <?php
						  if ($result['brand_id'] == $row['brand_id']) {
							echo "selected";
						  }
						  ?> ><?php echo $row['brand_name']; ?></option>
					  <?php } ?>
					</select></span>
				</span>
				<span><strong>MODEL</strong>
				  <span class="profiledropdown"><select class="model myval required" name="m_name" id="m_name">
					<?php foreach ($m_name as $row) { ?>
						<option value="<?php echo $row['model_id']; ?>" <?php
								if ($result['model_id'] == $row['model_id']) {
								  echo "selected";
								}
								?>><?php echo $row['name']; ?></option>
						<?php } ?>
				  </select></span>
				</span>
				<span><strong class="blackfnt">CYCLE TYPE</strong>
				  <span class="profiledropdown"><select class="myval required" name="cycle_type">
						  <?php //foreach ($t_name as $row) {   ?>
						  <option value="ROAD" <?php
									if ($result['cycle_type'] == "ROAD") {
									  echo "selected";
									}
								  ?>>ROAD</option>
						  <option value="MOUNTAIN" <?php
						  if ($result['cycle_type'] == "MOUNTAIN") {
							echo "selected";
						  }
								  ?>>MOUNTAIN</option>
						  <option value="HYBRID" <?php
						  if ($result['cycle_type'] == "HYBRID") {
							echo "selected";
						  }
								  ?>>HYBRID</option>
		  <?php //  }   ?>
						</select></span>
				</span>
				<span><strong class="blackfnt">PURCHASE YEAR</strong> <input type="text" class="required" name="purchase_year" value="<?php echo $result['purchase_year'] ?>" />  </span>
				<h3>Additional <span class="redcolor">Information</span></h3>
				<textarea class="blacktextarea" name="add_info" id="add_info"><?php echo $result['add_info'] ?></textarea>
			</div>
		</div>	
		<div class="col-md-12 mar50top">

			<div class="col-md-3 col-sm-3 my_cycle_box1">
				<label>Image1</label>
				<input type="file"  name="cycle_pics"/>
				<span>
					  <img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics']; ?>" class="img-responsive " alt=""/>
					  <input type="hidden" name="cycle_pics_old" value="<?php echo $result['cycle_pics']; ?>" />
				</span>
			</div>
			<div class="col-md-3 col-sm-3 my_cycle_box1">
				<label>Image2</label>
				<input type="file"  name="cycle_pics1" />
				<span>
					  <img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics1']; ?>" class="img-responsive " alt=""/>
					  <input type="hidden" name="cycle_pics_old1" value="<?php echo $result['cycle_pics1']; ?>" />
				</span>
			</div>
			<div class="col-md-3 col-sm-3 my_cycle_box1">
				<label>Image2</label>
				<input type="file"  name="cycle_pics2" />
				<span>
					  <img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics2']; ?>" class="img-responsive " alt=""/>
					  <input type="hidden" name="cycle_pics_old2" value="<?php echo $result['cycle_pics2']; ?>" />
				</span>
			</div>
			<div class="col-md-3 col-sm-3 my_cycle_box1">
				<label>Image3</label>
				<input type="file"  name="cycle_pics3" />
				<span>
					  <img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics3']; ?>" class="img-responsive " alt=""/>
					  <input type="hidden" name="cycle_pics_old3" value="<?php echo $result['cycle_pics3']; ?>" />
				</span>
			</div>
		   
		</div>
			<center>
			<input type="hidden" class="margin-leftli formfields" name="editid" value="<?php echo $result['cycle_id'] ?>" />
			<button type="submit" class="btn btn-dangeredit btn-login ">Submit</button></center>
	</form>
</div>
</div>
    </div>
  </div>
</div>
</div>

<script>
      $(".brand").change(function () {
        //get the selected value

        var bid = this.value;

        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("myactivity/aj_model"); ?>',
          type: 'POST',
          data: {id: bid},
          success: function (data) {

            $("#m_name").html("");
            $("#m_name").html(data);
          }
        });
      });
    </script>