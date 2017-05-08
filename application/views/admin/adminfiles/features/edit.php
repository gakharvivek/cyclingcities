<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Features </div>
        <div class="box-body with-border">
            <form method="post"  action="<?php echo site_url('admins/features/edit'); ?>">
                <div class="form-group ">
                    <label>Brand Name</label>
                    <select class="form-control brand" name="b_name" required>
                        <?php foreach ($b_name as $row) { ?>
                            <option value="<?php echo $row['brand_id']; ?>" <?php if ($result['brand_id'] == $row['brand_id']) {echo "selected";} ?> ><?php echo $row['brand_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Model Name</label>
                    <select class="form-control model" name="m_name" required>
                        <?php foreach ($m_name as $row) { ?>
                            <option value="<?php echo $row['model_id']; ?>" <?php if ($result['model_id'] == $row['model_id']) {echo "selected";} ?>><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group ">
                    <label>Breaks</label>
                    <input type="text" class="form-control" name="br" value="<?php echo $result['frontbreak'] ?>"/>
                </div>

<!--                <div class="form-group ">
                    <label>Rear Breaks</label>
                    <input type="text" class="form-control" name="gears" value="<?php echo $result['rearbreak'] ?>" />
                </div>

                <div class="form-group">
                    <label>Height</label>
                    <input type="text" class="form-control" name="height" value="<?php echo $result['height'] ?>" />
                </div>-->

                <div class="form-group">
                    <label>Weight</label>
                    <input type="text" class="form-control" name="weight" value="<?php echo $result['weight'] ?>" />
                </div>

                <div class="form-group ">
                    <label>Gender</label>
                    <input type="radio"  name="gender" value="male" id='male' <?php if($result['gender']=='male'){echo 'checked';}?> />Male
                    <input type="radio"  name="gender" value="female" id='female' <?php if($result['gender']== 'female'){echo "checked";} ?>/> Female
                </div>
                <div class="form-group">
                    <label>Frame Size</label>
                    <input type="text" class="form-control" name="framesize" value="<?php echo $result['framesize'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Frame Build</label>
                    <input type="text" class="form-control" name="framebuild" value="<?php echo $result['framebuild'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Transmission</label>
                    <input type="text" class="form-control" name="transmission" value="<?php echo $result['transmission'] ?>"/>
                </div>
                <div class="form-group">
                    <label>No of Gear</label>
                    <input type="text" class="form-control" name="noof_gear" value="<?php echo $result['noof_gear'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Shifter Type</label>
                    <input type="text" class="form-control" name="shiftertype" value="<?php echo $result['shiftertype'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Wheel Size</label>
                    <input type="text" class="form-control" name="front_wheel_size" value="<?php echo $result['front_wheel_size'] ?>"/>
                </div>
<!--                <div class="form-group">
                    <label>Rear Wheel Size</label>
                    <input type="text" class="form-control" name="rear_wheel_size" value="<?php echo $result['rear_wheel_size'] ?>"/>
                </div>-->
                <div class="form-group">
                    <label>Suspension</label>
                    <input type="text" class="form-control" name="suspension" value="<?php echo $result['suspension'] ?>"/>
                </div>
              <div class="form-group">
                <label>Rating</label>
                <select class="form-control" name="rating">
                                      <option value="1" <?php if ($result['rating'] == "1") {
                        echo "selected";
                    } ?>> 1</option>
                    <option value="1.5"<?php if ($result['rating'] == "1.5") {
                        echo "selected";
                    } ?>> 1.5</option>
                    <option value="2" <?php if ($result['rating'] == "2") {
                        echo "selected";
                    } ?>>2</option>
                    <option value="2.5" <?php if ($result['rating'] == "2.5") {
                        echo "selected";
                    } ?>>2.5</option>
                    <option value="3" <?php if ($result['rating'] == "3") {
                        echo "selected";
                    } ?>>3</option>
                    <option value="3.5" <?php if ($result['rating'] == "3.5") {
                        echo "selected";
                    } ?>>3.5</option>
                    <option value="4" <?php if ($result['rating'] == "4") {
                        echo "selected";
                    } ?>>4</option>
                    <option value="4.5" <?php if ($result['rating'] == "4.5") {
                        echo "selected";
                    } ?>>4.5</option>
                    <option value="5" <?php if ($result['rating'] == "5") {
                        echo "selected";
                    } ?>>5</option>
<!--                  <option value="">Select Rating</option>
                  <option value="1">1</option>
                  <option value="1.5">1.5</option>
                  <option value="2">2</option>
                  <option value="2.5">2.5</option>
                  <option value="3">3</option>
                  <option value="3.5">3.5</option>
                  <option value="4">4</option>
                  <option value="4.5">4.5</option>
                  <option value="5">5</option>-->
                </select>
              </div>
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/features');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var bid = $('.brand').val();
        var mid = $('.model').val();

        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/features/aj_model"); ?>',
            type: 'POST',
            data: {id: bid, m_id: mid},
            success: function (data) {
                $(".model").html("");
                $(".model").html(data);
            }
        });
    });

    $(".brand").change(function () {
        //get the selected value

        var bid = this.value;
        var mid = $('.model').val();

        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("features/aj_model"); ?>',
            type: 'POST',
            data: {id: bid, m_id: mid},
            success: function (data) {
                $(".model").html("");
                $(".model").html(data);
            }
        });
    });
</script>