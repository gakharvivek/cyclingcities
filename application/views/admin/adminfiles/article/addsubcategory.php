<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Subcategory </div>
        <div class="box-body with-border">
            <?php echo form_open('index.php/admins/article/addsub'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Category Name</label>
                <select class="form-control" name="cate_name" required>
                  <option value="">Select Category</option>
                    <?php foreach ($cat_name as $row) { ?>
                        <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Subcategory Name</label>
                <input type="text" class="form-control" name="sub_name" required/>
            </div>
            <div class="form-group">
                <label>Subcategory Description</label>
                <textarea class="form-control" name="sub_desc" ></textarea>
            </div>

            <div class="">

                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/article/subcategory');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>
<!-- /block -->
</div>