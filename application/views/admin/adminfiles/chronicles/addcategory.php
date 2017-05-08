<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Category </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/chronicles/addcate'); ?>
                <!-- text input -->
                <div class="form-group ">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="cate_name" required/>
                </div>
                <div class="form-group">
                    <label>Category Description</label>
                    <textarea class="form-control" name="cate_desc" ></textarea>
                </div>

                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/chronicles/category');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>
<!-- /block -->
</div>