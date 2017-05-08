<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Intern </div>
        <div class="box-body with-border">
            <?php //echo form_open_multipart('team/add'); 
            ?>
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/intern/add'); ?>" method="post">
                <!-- text input -->
                <div class="form-group ">
                    <label>Intern Name</label>
                    <input type="text" class="form-control" name="name" required/>
                </div>

                <div class="form-group ">
                    <label>Department</label>
                    <input type="text" class="form-control" name="dept"/>
                </div>

                <div class="form-group ">
                    <label>Description</label> 
                    <textarea class="form-control" name="intern_desc"></textarea>
                </div>
                <div class="form-group ">
                    <label>Picture</label>
                    <input type="file" class="form-control" name="pic"/>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/intern');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>