<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Advertise </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/advertise/edit'); ?>
            <!-- text input -->

            <div class="form-group ">
                <label>Advertise Name</label>
                <input type="text" class="form-control" name="ad_name" value="<?php echo $result['ad_name'] ?>"/>
            </div>

            <div class="form-group">
                <label>Advertise Type</label>
                <input type="text" class="form-control" name="ad_type" value="<?php echo $result['ad_type'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Advertise Position</label>
                <select name="ad_position" class="form-control" required>
                    <option value="">Select Position</option>
                    <option value="top" <?php if($result['ad_position']=='top'){echo 'selected';}?>>Top</option>
                    <option value="middle" <?php if($result['ad_position']=='middle'){echo 'selected';}?>>Middle</option>
                    <option value="left_side" <?php if($result['ad_position']=='left_side'){echo 'selected';}?>>Left side</option>
                    <option value="bottom" <?php if($result['ad_position']=='bottom'){echo 'selected';}?>>Bottom</option>
                </select>
            </div>
            <div class="form-group">
                <label>Uptime</label>
                <input type="text" class="form-control datepicker" name="uptime" value="<?php echo date('m/d/Y',  strtotime($result['uptime']));?>"/>
            </div>
            <div class="form-group ">
                <label>Downtime</label>
                <input type="text" class="form-control datepicker" name="downtime" value="<?php echo date('m/d/Y',  strtotime($result['downtime'])); ?>"/>
            </div>
            <div class="form-group">
                <input type="checkbox" class="" name="active" value="1" <?php if ($result['active'] == 1) {echo 'checked';} ?>/>
                <label>Active</label>
            </div>

            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['ad_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/advertise');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>