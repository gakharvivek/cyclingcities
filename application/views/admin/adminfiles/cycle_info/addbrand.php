<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Brand </div>
        <div class="box-body with-border">
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/cycle_info/addbrand'); ?>" method="post">
            <!-- text input -->
            <div class="form-group ">
                <label>Brand Name</label>
                <input type="text" class="form-control" name="brand_name" required/>
            </div>
            <div class="form-group ">
                    <label>Brand Logo</label>
                    <input type="file" class="" name="logo" />
                </div>
            <div class="form-group ">
                    <label>Brand Description</label>
                    <textarea class="form-control cke_dialog_ui_input_textarea" name="brand_desc" ></textarea>
                </div>

            <div class="">

                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/cycle_info/brand');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>
