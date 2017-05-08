<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Team </div>
        <div class="box-body with-border">
            <?php //echo form_open_multipart('team/add'); 
            ?>
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/team/add'); ?>" method="post">
                <!-- text input -->
                <div class="form-group ">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="f_name" required/>
                </div>
                <div class="form-group ">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="l_name" required/>
                </div>
                <div class="form-group ">
                    <label>Designation</label>
                    <input type="text" class="form-control" name="desig"/>
                </div>

                <div class="form-group ">
                    <label>Information</label> 
                    <textarea class="form-control" name="info"></textarea>
                </div>
                <div class="form-group ">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" required/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group ">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <div class="form-group ">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook"/>
                </div>
                <div class="form-group ">
                    <label>Tweeter</label>
                    <input type="text" class="form-control" name="tweeter"/>
                </div>
                <div class="form-group ">
                    <label>Linked In</label>
                    <input type="text" class="form-control" name="linkedin"/>
                </div>
                <div class="form-group ">
                    <label>Picture</label>
                    <input type="file" class="form-control" name="pic"/>
                </div>

                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/team');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>