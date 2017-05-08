<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Advertise </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/advertise/add'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Advertise Name</label>
                <input type="text" class="form-control" name="ad_name" required/>
            </div>
            <div class="form-group ">
                <label>Advertise Type</label>
                <input type="text" class="form-control" name="ad_type" required/>
            </div>
            <div class="form-group ">
                <label>Advertise Position</label>
                <!--<input type="text" class="form-control" name="ad_position"/>-->
                <select name="ad_position" class="form-control" required>
                    <option value="">Select Position</option>
                    <option value="top">Top</option>
                    <option value="middle">Middle</option>
                    <option value="left_side">Left side</option>
                    <option value="bottom">Bottom</option>
                </select>
            </div>
            <div class="form-group ">
                <label>Uptime</label>
                <input type="text" class="form-control datepicker" name="uptime"/>
            </div>
            <div class="form-group ">
                <label>Downtime</label>
                <input type="text" class="form-control datepicker" name="downtime"/>
            </div>
            <div class="form-group ">
                <input type="checkbox" class="" name="active" value="1"/> <label>Active</label>
            </div>
            <div class="">
                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/advertise');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>

</div>
<!-- /block -->
</div>