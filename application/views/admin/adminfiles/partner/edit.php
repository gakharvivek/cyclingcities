<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Partner </div>
        <div class="box-body with-border">
            <?php //echo form_open('team/edit'); ?>
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/partner/edit'); ?>" method="post">
                <div class="form-group ">
                    <label>Partner Name</label>
                    <input type="text" class="form-control" name="p_name" value="<?php echo $result['p_name'] ?>"/>
                </div>
                
                <div class="form-group">
                    <label>URL</label>
                    <input type="url" class="form-control" name="url" value="<?php echo $result['url'] ?>"/>
                </div>

                <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-control" name="detail"><?php echo $result['detail'] ?></textarea>
                </div>

                <div class="form-group ">
                    <label>Logo</label>
                    <input type="file" name="logo" />
                    <?php if ($result['logo'] != '') { ?>
                        <img src="<?php echo site_url('upload/logo'); ?>/<?php echo $result['logo']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="logo_old" value="<?php echo $result['logo']; ?>"/>
                </div>

                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['p_id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/partner');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>
</div>