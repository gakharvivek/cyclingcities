<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Know Cycle</div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/knowurcycle/edit'); ?>">
                <div class="form-group ">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control cke_dialog_ui_input_textarea" name="description" ><?php echo $result['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Article Image</label>
                    <input type="file" name="image1" />
                    <?php if ($result['image1'] != '') { ?>
                        <img src="<?php echo site_url('upload/knowurcycle'); ?>/<?php echo $result['image1']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image1_old" value="<?php echo $result['image1']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Article Image</label>
                    <input type="file" name="image2" />
                    <?php if ($result['image2'] != '') { ?>
                        <img src="<?php echo site_url('upload/knowurcycle'); ?>/<?php echo $result['image2']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image2_old" value="<?php echo $result['image2']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Article Image</label>
                    <input type="file" name="image3" />
                    <?php if ($result['image3'] != '') { ?>
                        <img src="<?php echo site_url('upload/knowurcycle'); ?>/<?php echo $result['image3']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image3_old" value="<?php echo $result['image3']; ?>"/>
                </div>
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/knowurcycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>