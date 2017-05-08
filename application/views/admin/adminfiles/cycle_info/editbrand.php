<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Category </div>
        <div class="box-body with-border">
            <?php //echo form_open('cycle_info/editbrand'); ?>
           <form  enctype="multipart/form-data" action="<?php echo site_url('admins/cycle_info/editbrand'); ?>" method="post">
            <div class="form-group ">
                <label>Brand Name</label>
                <input type="text" class="form-control" name="brand_name" value="<?php echo $result['brand_name'] ?>" required/>
            </div>
            <div class="form-group ">
                    <label>Logo</label>
                    <input type="file" name="logo" />
                    <?php if ($result['logo'] != '') { ?>
                        <img src="<?php echo site_url('upload/logo'); ?>/<?php echo $result['logo']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="logo_old" value="<?php echo $result['logo']; ?>"/>
                </div>
              <div class="form-group ">
                    <label>Brand Description</label>
                    <textarea class="form-control cke_dialog_ui_input_textarea" name="brand_desc" ><?php echo $result['brand_desc']; ?></textarea>
                </div>
            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['brand_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/cycle_info/brand');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
         
           </form>
        </div>
    </div>
</div>