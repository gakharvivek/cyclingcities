<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Add Profile </div>
                <div class="box-body with-border">
                  <?php // echo form_open('Gallery/add'); ?>
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('admins/gallery/add'); ?>">
                    <!-- text input -->
                    <div class="form-group ">
                      <label>Gallery Name</label>
                      <input type="text" class="form-control" name="gallery_title" required/>
                    </div>
                    <div class="form-group">
                      <label>Gallery Description</label>
                      <textarea class="form-control" name="gallery_desc" ></textarea>
                    </div>
                    <div class="form-group ">
                        <label>Gallery Type</label>
                        <select name="gtype" id="gtype" class="form-control" required>
                            <option value="">Select</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="form-group image">
                      <label>Gallery Image</label>
                      <input type="file" name="gallery_img" />
                    </div>
                    <div class="form-group video">
                      <label>Video link</label>
                      <input type="text" name="youtube_link" class="form-control" />
                    </div>
<!--                    <div class="form-group ">
                      <label>Facebook Url</label>
                      <input type="text" class="form-control" name="gallery_fb"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Twitter Url</label>
                      <input type="text" class="form-control" name="gallery_twit"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Google Plus Url</label>
                      <input type="text" class="form-control" name="gallery_gplus"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Whats App Number</label>
                      <input type="text" class="form-control" name="gallery_wp"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Email Address</label>
                      <input type="text" class="form-control" name="gallery_email"/>
                    </div>-->
                    
                    <div class="">
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/gallery');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php // form_close(); ?>
                    </form>
                </div>
	</div>
	
</div>
	<!-- /block -->
</div>

<script>

jQuery(document).ready(function () {
    //FormValidation.init();
    $('.image').css('display','none');
    $('.video').css('display','none');
});

$('#gtype').change(function(){
    var gtype = $(this).val();
    if(gtype == 'image'){
        $('.image').css('display','block');
        $('.video').css('display','none');
    }else if(gtype == 'video'){
        $('.image').css('display','none');
        $('.video').css('display','block');
    }else{
        $('.image').css('display','none');
        $('.video').css('display','none');
    }
});
</script>