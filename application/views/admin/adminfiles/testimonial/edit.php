<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Testimonial </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/testimonial/edit'); ?>" >
                <div class="form-group ">
                    <label>Client Name</label>
                    <input type="text" class="form-control" name="publisher_name" value="<?php echo $result['publisher_name'];?>"  required/>
                </div>
                <div class="form-group">
                    <label>Client Position</label>
                    <input type="text" class="form-control" name="position" value="<?php echo $result['position'];?>"  />
                </div>
                <div class="form-group">
                    <label>Testimonial Text</label>
                    <textarea name="testimonial_text" class="form-control" ><?php echo $result['testimonial_text'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Client Company</label>
                    <input type="text" class="form-control" name="company" value="<?php echo $result['company'];?>"  />
                </div>
                <div class="form-group">
                    <label>Testimonial Image</label>
                    <input type="file"  name="testimonial_image" />
					<?if($result['testimonial_image']!='')
					     {?>
                           <img src="<?php echo site_url('upload/testimonial');?>/<?php echo $result['testimonial_image'];?>" width="100px" />
					   <?}?>
                    
                    <input type="hidden" name="testimonial_image_old1" value="<?php echo $result['testimonial_image'];?>" />
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="testimonial_active" value="1" <?php if ($result['testimonial_active'] == 1) {echo 'checked';} ?>/>
                    <label>Active</label>
                </div>
                <div class="">
                    <input type="hidden" name="testimonial_id" value="<?php echo $result['testimonial_id'];?>" />
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/testimonial');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>