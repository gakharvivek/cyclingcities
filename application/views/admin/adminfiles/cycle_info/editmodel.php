<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Model </div>
        <div class="box-body with-border">
         
          <form  enctype="multipart/form-data" action="<?php echo site_url('admins/cycle_info/editmodel'); ?>" method="post">
            <!-- text input -->
            <div class="form-group ">
                <label>Brand Name</label>
                <select class="form-control" name="brand_id">
                    <?php foreach ($brand_name as $row) { ?>
                  <option value="<?php echo $row['brand_id']; ?>" <?php if ($result['brand_id'] == $row['brand_id']) {echo "selected";} ?> ><?php echo $row['brand_name']; ?></option>
                        <!--<option value="<?php //echo $row['brand_id']; ?>"> <?php// echo $row['brand_name']; ?> </option>-->
                    <?php } ?>
                </select>
            </div>

            <div class="form-group ">
                <label>Model Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/>
            </div>
            <div class="form-group">
                <label>Cycle Type</label>
                <select class="form-control" name="cycle_type">
                    <option value="Road bike" <?php if ($result['cycle_type'] == "Road bike") {
                        echo "selected";
                    } ?>> Road bike</option>
                    <option value="Mountain bike"<?php if ($result['cycle_type'] == "Mountain bike") {
                        echo "selected";
                    } ?>> Mountain bike</option>
                    <option value="Hybrid bike" <?php if ($result['cycle_type'] == "Hybrid bike") {
                        echo "selected";
                    } ?>>Hybrid bike</option>
                </select>
            </div>


            <div class="form-group ">
                <label>Model Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $result['price'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Description</label>
                <textarea type="number" class="form-control" name="m_desc" ><?php echo $result['m_desc'] ?></textarea>
            </div>
            <div class="form-group ">
                    <label>Picture1</label>
                    <input type="file" name="img1" />
                    <?php if ($result['img1'] != '') { ?>
                        <img src="<?php echo site_url('upload/model'); ?>/<?php echo $result['img1']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="img1_old" value="<?php echo $result['img1']; ?>"/>
                </div>
            <div class="form-group">
                <input type="hidden" name="editid"  value="<?php echo $result['model_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/cycle_info/model');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>