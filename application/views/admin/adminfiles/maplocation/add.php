<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Map Location </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/maplocation/add'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Map Location Title</label>
                <input type="text" class="form-control" name="maploction_title" required/>
            </div>
            <div class="form-group ">
                <label>Map Location City</label>
                <input type="text" class="form-control" name="maploction_city" required/>
            </div>
            <div class="form-group">
                <label>Map Location Description</label>
		<textarea class="form-control" name="maploction_desc"></textarea>
            </div>
            <div class="form-group ">
                <input type="checkbox" class="" name="maploction_active" value="1"/> <label>Active</label>
            </div>
            <div class="">
                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/maplocation');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>