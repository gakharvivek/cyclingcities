<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Post of Cycle </div>
        <div class="box-body with-border">

            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/post_cycle/add'); ?>" method="post">
                <!-- text input -->
<!--                <div class="form-group ">
                    <label>Try Cycle Post</label>
                    <select class="form-control" name="type">
                    <option> Select </option>
                    <option value="My Wheels for You"> My Wheels for You </option>
                    <option value="Your Wheels for Me"> Your Wheels for Me </option>
                    </select>
                </div>-->
                <div class="form-group ">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required/>
                </div>
                <div class="form-group ">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phn"/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group ">
                    <label>Country</label>
                    <select class="form-control" name="country" id="country" required>
                        <option value="">Select Country</option>
                        <?php
                          foreach ($country as $row):
                            ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                        <?php
                          endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label>State</label>
                    <select class="form-control" name="state" id="state" required>

                        <option value="">Select State</option>

                      </select>

                </div>
                <div class="form-group ">
                    <label>City</label>
                    <select class="form-control" name="city" id="city" required>
                        <option> Select City</option>
                       
                    </select>

                </div>
                <div class="form-group ">
                    <label>Brand</label>
                    <select class="form-control" name="brand_name" id="brand" required>
                       <?php foreach ($brand_name as $row) { ?>
                        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Model</label>
                    <select class="form-control" name="model" id="model" required>
                        <option > Select </option>
                      
                    </select>
                </div>
                <div class="form-group ">
                     <label>Cycle Type</label>
                    <select class="form-control" name="cycle_type" id="c_type" required>
                        <option > Select Type </option>
                        <option value='ROAD BIKES'> Road </option>
                        <option value='MOUNTAIN BIKES'> Mountain </option>
                        <option value='HYBRID BIKES'> Hybrid </option>
                    </select>
                </div>
                
                <div class="form-group ">
                    <label>Height</label>
                    <input type="text" class="form-control" name="height"/>
                </div>
                <div class="form-group ">
                    <label>Weight</label>
                    <input type="text" class="form-control" name="weight"/>
                </div>
               
                <div class="form-group ">
                    <label>Features</label>
                    <input type="checkbox" name="features[]" id="gears" value="gears"  />Gears
                    <input type="checkbox" name="features[]" id="lights" value="lights" />Lights
                    <input type="checkbox" name="features[]" id="breaks" value="breaks" />Breaks
                </div>
                <div class="form-group ">
                    <label>Advance Reservation</label>
                    <input type="radio" name="reservation" id="Individual" value="Yes"/> Yes
                    <input type="radio" name="reservation" id="Dealer" value="No" checked="checked"/> No
                </div>
                <div class="form-group ">
                    <label>Rent</label>
                    <input type="radio" name="rent" id="Individual" value="Individual" checked="checked"/> Free
                    <input type="radio" name="rent" id="Dealer" value="Dealer"/> Paid
                </div>
                <div class="form-group ">
                    <label>Rent/Day</label>
                    <input type="text" class="form-control" name="rent_per_day"/>
                </div>
                <div class="form-group ">
                    <label>Posting Type</label>
                    <input type="radio" name="posting_type" id="Individual" value="Individual" checked="checked" /> Individual
                    <input type="radio" name="posting_type" id="Dealer" value="Dealer"/> Dealer
                </div>
                <div class="form-group ">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"></textarea>
                </div>
               
<!--                <div class="form-group ">
                    <input type="checkbox"  name="whats_app" value=""/>
                    <label>Tick If,Available on What's App</label>
                </div>-->

                <div class="form-group ">
                    <label>Cycle Picture</label>
                    <input type="file"  name="cycle_pic"/>
                </div>

                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/post_cycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
        </div>
    </div>

</div>
<!-- /block -->
</div>
<script>

  //get State 
  $("#country").change(function () {
    //get the selected value
    var CountryId = this.value;

    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/post_cycle/aj_state"); ?>',
      type: 'POST',
      data: {id: CountryId},
      success: function (data) {
        $("#state").html("");
        $("#state").html(data);
      }
    });
  });
  //get City 
  $("#state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/post_cycle/aj_city"); ?>',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $("#city").html("");
        $("#city").html(data);
      }
    });
  });
  
 
//get Model 
  $("#brand").change(function () {
    //get the selected value
    var brand_id = this.value;
    var type = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/post_cycle/aj_model"); ?>',
      type: 'POST',
      data: {id: brand_id,type:type},
      success: function (data) {
        $("#model").html("");
        $("#model").html(data);
      }
    });
  }); 
</script>