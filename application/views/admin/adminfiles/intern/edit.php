<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Intern </div>
        <div class="box-body with-border">
            <?php //echo form_open('team/edit'); ?>
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/intern/edit'); ?>" method="post">
                <div class="form-group ">
                    <label>Intern Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/>
                </div>
                
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" name="dept" value="<?php echo $result['dept'] ?>"/>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="intern_desc"><?php echo $result['intern_desc'] ?></textarea>
                </div>

                <div class="form-group ">
                    <label>Pic</label>
                    <input type="file" name="pic" />
                    <?php if ($result['pic'] != '') { ?>
                        <img src="<?php echo site_url('upload/intern'); ?>/<?php echo $result['pic']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="pic_old" value="<?php echo $result['pic']; ?>"/>
                </div>

                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['intern_id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/intern');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>
</div>