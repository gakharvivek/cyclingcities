<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Sub Category </div>
        <div class="box-body with-border">
            <?php echo form_open('index.php/admins/article/editsub'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Category Name</label>
                <select class="form-control" name="cate_name" required>
                    <?php foreach ($cat_name as $row) { ?>
                    <option value="<?php echo $row['cate_id']; ?>" <?php if ($result['cate_id'] == $row['cate_id']) {echo "selected";} ?> ><?php echo $row['cate_name']; ?></option>
                        <!--<option value="<?php// echo $row['cate_id']; ?>"><?php //echo $row['cate_name']; ?></option>-->


                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Sub category Name</label>
                <input type="text" class="form-control" name="sub_name" value="<?php echo $result['sub_name'] ?>" required/>
            </div>

            <div class="form-group">
                <label>Sub category Description</label>
                <textarea class="form-control" name="sub_desc" ><?php echo $result['sub_desc'] ?></textarea>
            </div>

            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['sub_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/article/subcategory');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>