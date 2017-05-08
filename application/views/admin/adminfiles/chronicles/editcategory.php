<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Category </div>
        <div class="box-body with-border">
            <?php echo form_open('admins/chronicles/editcate'); ?>
            <!-- text input -->

            <div class="form-group ">
                <label>Category Name</label>
                <input type="text" class="form-control" name="cate_name" value="<?php echo $result['cate_name'] ?>" required/>
            </div>

            <div class="form-group">
                <label>Category Description</label>
				<textarea class="form-control" name="cate_desc" ><?php echo $result['cate_desc'] ?></textarea>
            </div>

            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['cate_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/chronicles/category');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>