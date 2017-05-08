<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit CMS</div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/cms/edit'); ?>">
                <div class="form-group ">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control cke_dialog_ui_input_textarea" name="description" ><?php echo $result['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image1" />
                    <?php if ($result['image1'] != '') { ?>
                        <img src="<?php echo site_url('upload/cms'); ?>/<?php echo $result['image1']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image1_old" value="<?php echo $result['image1']; ?>"/>
                </div>
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/cms');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>