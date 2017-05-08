<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Partner </div>
        <div class="box-body with-border">
            <?php //echo form_open_multipart('team/add'); 
            ?>
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/partner/add'); ?>" method="post">
                <!-- text input -->
                <div class="form-group ">
                    <label>Partner Name</label>
                    <input type="text" class="form-control" name="p_name" required/>
                </div>
                <div class="form-group ">
                    <label>URL</label>
                    <input type="url" class="form-control" name="url"/>
                </div>

                <div class="form-group ">
                    <label>Details</label> 
                    <textarea class="form-control" name="detail"></textarea>
                </div>
                <div class="form-group ">
                    <label>Picture</label>
                    <input type="file" class="form-control" name="logo"/>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/partner');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>