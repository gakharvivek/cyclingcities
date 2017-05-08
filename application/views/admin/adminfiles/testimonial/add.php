<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Testimonial </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/testimonial/add'); ?>" >
                <!-- text input -->
                <div class="form-group ">
                    <label>Client Name</label>
                    <input type="text" class="form-control" name="publisher_name" required/>
                </div>
                <div class="form-group">
                    <label>Client Position</label>
                    <input type="text" class="form-control" name="position" />
                </div>
                <div class="form-group">
                    <label>Testimonial Text</label>
                    <textarea name="testimonial_text" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label>Client Company</label>
                    <input type="text" class="form-control" name="company" />
                </div>
                <div class="form-group">
                    <label>Testimonial Image</label>
                    <input type="file"  name="testimonial_image" />
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="testimonial_active" value="1" />
                    <label>Active</label>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/testimonial');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>