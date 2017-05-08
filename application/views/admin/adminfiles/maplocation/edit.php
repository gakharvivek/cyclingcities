<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Map Location </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/maplocation/edit'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Map Location Title</label>
                <input type="text" class="form-control" name="maploction_title" value="<?php echo $result['maploction_title'] ?>" />
            </div>
            <div class="form-group ">
                <label>Map Location City</label>
                <input type="text" class="form-control" name="maploction_city" value="<?php echo $result['maploction_city'] ?>" />
            </div>
            <div class="form-group ">
                <label>Map Location Description</label>
		<textarea class="form-control" name="maploction_desc"><?php echo $result['maploction_desc'] ?></textarea>
            </div>
            <div class="form-group ">
                <input type="checkbox" class="" name="maploction_active" value="1"  <?php if ($result['maploction_active'] == 1) {echo 'checked';} ?> /> <label>Active</label>
            </div>
            <div class="">
                <input type="hidden" name="mapid"  value="<?php echo $result['id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/maplocation');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>