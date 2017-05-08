<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Shop </div>
        <div class="box-body with-border">
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/post_cycle/edit'); ?>" method="post">
<!--                <div class="form-group ">
                    <label>Try Cycle Post</label>
                    <select class="form-control" name="type">
                        <option> Select </option>
                        <option value="My Wheels for You" <?php
                                if ($result['type'] == "My Wheels for You") {
                                    echo "selected";
                                }
                                ?>> My Wheels for You </option>
                        <option value="Your Wheels for Me" <?php
                        if ($result['type'] == "Your Wheels for Me") {
                            echo "selected";
                        }
                                ?> > Your Wheels for Me </option>
                    </select>
                </div>-->
                <div class="form-group ">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phn" value="<?php echo $result['phn'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Country *</label>
                       <select class="form-control" name="country" id="country" value="<?php echo $result['country'] ?>" >

                        <option value="">Select Country</option>
                        <?php  foreach($country as $row): ?>
                        <option value="<?=$row->id?>" <?php if($result['country']== $row->id){echo "selected";} ?>><?=$row->name?></option>
                        <?php
                         endforeach;
                         ?>
                      </select>
                </div>
                <div class="form-group ">
                    <label>State</label>
                    <select class="form-control" name="state" id="state">
                        <option> Select </option>
                        
                    </select>
                </div>
                <div class="form-group ">
                    <label>City</label>
                    <select class="form-control" name="city" id="city">
                        <option> Select </option>
                        
                    </select>
                </div>
                <div class="form-group ">
                    <label>Brand</label>
                    <select class="form-control" name="brand_name" id="brand">
                        <?php foreach ($brand_name as $row) { ?>
                            <option value="<?php echo $row['brand_id']; ?>" <?php if($result['brand_id']== $row['brand_id']){echo "selected";}?> ><?php echo $row['brand_name']; ?></option>
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
                    <select class="form-control" name="cycle_type">
                        <option > Select </option>
                        <option value='Road' <?php
                        if ($result['cycle_type'] == "Road") {
                            echo "selected";
                        }
                        ?>> Road </option>
                        <option value='Mountain' <?php
                        if ($result['cycle_type'] == "Mountain") {
                            echo "selected";
                        }
                        ?>> Mountain </option>
                        <option value='Hybrid' <?php
                        if ($result['cycle_type'] == "Hybrid") {
                            echo "selected";
                        }
                        ?>> Hybrid </option>
                    </select>
                </div>
                
                <div class="form-group ">
                    <label>Height</label>
                    <input type="text" class="form-control" name="height" value="<?php echo $result['height'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Weight</label>
                    <input type="text" class="form-control" name="weight" value="<?php echo $result['weight'] ?>"/>
                </div>
                    <?php
                    $f_array = explode(',', $result['features']);
                    ?>
                <div class="form-group ">
                    <label>Features</label>
                    <input type="checkbox" name="features[]" id="gears" value="gears" <?php if (in_array('gears', $f_array)) {
                        echo 'checked';
                    } ?> />Gears
                    <input type="checkbox" name="features[]" id="lights" value="lights" <?php if (in_array('lights', $f_array)) {
                        echo 'checked';
                    } ?>/>Lights
                    <input type="checkbox" name="features[]" id="breaks" value="breaks" <?php if (in_array('breaks', $f_array)) {
                        echo 'checked';
                    } ?>/>Breaks
                </div>
                <div class="form-group ">
                    <label>Reservation</label>
                    <input type="radio" name="reservation" value="Yes" id="Yes" checked="<?php if ($result['reservation'] == 'Yes') {
                        echo 'checked';
                    } ?>" /> Yes
                    <input type="radio" name="reservation" value="No" id="No" checked="<?php if ($result['reservation'] == 'No') {
                        echo 'checked';
                    } ?>" /> No
                </div>
                <div class="form-group ">
                    <label>Rent</label>
                    <input type="radio" name="rent" value="Free" id="Free" checked="<?php if ($result['rent'] == 'Free') {
                        echo 'checked';
                    } ?>" /> Free
                    <input type="radio" name="rent" value="Paid" id=Paid"" checked="<?php if ($result['rent'] == 'Paid') {
                        echo 'checked';
                    } ?>" /> Paid
                </div>
                <div class="form-group ">
                    <label>Rent/Day</label>
                    <input type="text" class="form-control" name="rent_per_day" value="<?php echo $result['rent_per_day'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Posting Type</label>
                    <input type="radio" name="posting_type" value="Individual" checked="<?php if ($result['posting_type'] == 'Individual') {
                        echo 'checked';
                    } ?>" /> Individual
                    <input type="radio" name="posting_type" value="Dealer" checked="<?php if ($result['posting_type'] == 'Dealer') {
                        echo 'checked';
                    } ?>" /> Dealer
                </div>
                <div class="form-group ">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks"><?php echo $result['remarks'] ?></textarea>
                </div>

<!--                <div class="form-group ">

                    <input type="checkbox"  name="whats_app"/> <label>Tick If,Available on What's App</label>
                </div>-->

                <div class="form-group ">
                    <label>Cycle Picture</label>
                    <input type="file" name="cycle_pic" />
                        <?php if ($result['cycle_pic'] != '') { ?>
                        <img src="<?php echo site_url('upload/post_cycle'); ?>/<?php echo $result['cycle_pic']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="pic_old" value="<?php echo $result['cycle_pic']; ?>"/>
                </div>

                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['post_cycle_id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/post_cycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  $(document).ready(function () { 
  //get State 
        var CountryId = $('#country').val();
        var stateId="<?=$result['state'];?>";
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/post_cycle/aj_state"); ?>',
            type: 'POST',
            data: {id: CountryId,stateId:stateId},
            success: function (data) {
                $("#state").html("");
                $("#state").html(data);
            }
        });

    //get City 
  
        var cityId="<?=$result['city'];?>";
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/post_cycle/aj_city"); ?>',
            type: 'POST',
            data: {id: stateId,cityId:cityId},
            success: function (data) {
                $("#city").html("");
                $("#city").html(data);
            }
        });
 
 
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
    });
    
    
    //get Model 
  $("#brand").change(function () {
    //get the selected value
    var brand_id = this.value;
  //  var type = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/post_cycle/aj_model"); ?>',
      type: 'POST',
      data: {id: brand_id},
      success: function (data) {
        $("#model").html("");
        $("#model").html(data);
      }
    });
  }); 
</script>