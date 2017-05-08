<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Add Features </div>
                <div class="box-body with-border">
                  <?php //echo form_open('article/add'); ?>
                  <form method="post" action="<?php echo site_url('admins/features/add');?>">
                    <!-- text input -->
                    <div class="form-group ">
                        <label>Brand Name</label>
                        <select class="form-control brand" name="brand_name" required>
                          <option value="">Select Brand</option>
                        <?php  foreach ($b_name as $row){ ?>
                        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Model Name</label>
                        <select class="form-control model" name="model_name" required>
                        <option value="">Select Model</option>
                        </select>
                    </div>
                    <div class="form-group ">
                      <label>Breaks</label>
                      <input type="text" class="form-control" name="br"/>
                    </div>
<!--                    <div class="form-group ">
                      <label> Rear Breaks</label>
                      <input type="text" class="form-control" name="gears"/>
                    </div>
                    <div class="form-group">
                      <label>Height</label>
                      <input type="text" class="form-control" name="height"/>
                     
                    </div>-->
                    <div class="form-group">
                      <label>Weight</label>
                      <input type="text" class="form-control" name="weight"/>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="radio"  name="gender" value="male" id='male' checked/>Male
                      <input type="radio"  name="gender" value="female" id='female'/>Female
                    </div>
                    <div class="form-group">
                      <label>Frame Size</label>
                      <input type="text" class="form-control" name="framesize"/>
                    </div>
                     <div class="form-group">
                      <label>Frame Build</label>
                      <input type="text" class="form-control" name="framebuild"/>
                    </div>
                    <div class="form-group">
                      <label>Transmission</label>
                      <input type="text" class="form-control" name="transmission"/>
                    </div>
                    <div class="form-group">
                      <label>No of Gear</label>
                      <input type="text" class="form-control" name="noof_gear"/>
                    </div>
                    <div class="form-group">
                      <label>Shifter Type</label>
                      <input type="text" class="form-control" name="shiftertype"/>
                    </div>
                    <div class="form-group">
                      <label>Wheel Size</label>
                      <input type="text" class="form-control" name="front_wheel_size"/>
                    </div>
<!--                    <div class="form-group">
                      <label>Rear Wheel Size</label>
                      <input type="text" class="form-control" name="rear_wheel_size"/>
                    </div>-->
                    <div class="form-group">
                      <label>Suspension</label>
                      <input type="text" class="form-control" name="suspension"/>
                    </div>
                    <div class="form-group">
                      <label>Rating</label>
                      <select class="form-control" name="rating" required>
                        <option value="">Select Rating</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                   
                    <div class="">
                      
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/features');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php // form_close(); ?>
                  </form>
                </div>
	</div>
</div>	

<script>
 //get Publisher 
    $(".brand").change(function () {
        //get the selected value

        var bid = this.value;
     
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/features/aj_model"); ?>',
            type: 'POST',
            data: {id: bid},
            success: function (data) {
                $(".model").html("");
                $(".model").html(data);
            }
        });
    });
</script>