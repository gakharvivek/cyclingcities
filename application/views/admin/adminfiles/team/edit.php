<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Shop </div>
        <div class="box-body with-border">
            <?php //echo form_open('team/edit'); ?>
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/team/edit'); ?>" method="post">
                <div class="form-group ">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="f_name" value="<?php echo $result['f_name'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="l_name" value="<?php echo $result['l_name'] ?>"/>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control" name="desig" value="<?php echo $result['desig'] ?>"/>
                </div>

                <div class="form-group">
                    <label>Information</label>
                    <textarea class="form-control" name="info"><?php echo $result['info'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="<?php echo $result['city'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
                </div>

                <div class="form-group ">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="<?php echo $result['facebook'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Tweeter</label>
                    <input type="text" class="form-control" name="tweeter" value="<?php echo $result['tweeter'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Linked In</label>
                    <input type="text" class="form-control" name="linkedin" value="<?php echo $result['linkedin'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Picture</label>
                    <input type="file" name="pic" />
                    <?php if ($result['pic'] != '') { ?>
                        <img src="<?php echo site_url('upload/team'); ?>/<?php echo $result['pic']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="pic_old" value="<?php echo $result['pic']; ?>"/>
                </div>

                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/team');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>
</div>