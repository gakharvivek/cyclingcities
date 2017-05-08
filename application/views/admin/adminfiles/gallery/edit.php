<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Edit Category </div>
                <div class="box-body with-border">
                  <?php // echo form_open('Gallery/edit'); ?>
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('admins/gallery/edit'); ?>">
                    <!-- text input -->
                    
                    <div class="form-group ">
                      <label>Gallery Name</label>
                      <input type="text" class="form-control" name="gallery_title" value="<?php echo $result['gallery_title'] ?>"/>
                    </div>
                   
                    <div class="form-group">
                      <label>Gallery Description</label>
					  <textarea class="form-control" name="gallery_desc" ><?php echo $result['gallery_desc'] ?></textarea>
                    </div>
                    <div class="form-group ">
                        <label>Gallery Type</label>
                        <select name="gtype" id="gtype" class="form-control">
                            <option value="">Select</option>
                            <option value="image" <?php if($result['gtype'] == 'image'){echo 'selected';}?>>Image</option>
                            <option value="video" <?php if($result['gtype'] == 'video'){echo 'selected';}?>>Video</option>
                        </select>
                    </div>
                    <div class="form-group image">
                      <label>Gallery Image</label>
                      <input type="file" name="gallery_img" value="<?php echo $result['gallery_img'] ?>"/>
                    </div>
                    <div class="form-group video">
                      <label>Video link</label>
                      <input type="text" name="youtube_link" class="form-control" value="<?php echo $result['youtube_link'] ?>"/>
                    </div>
                    
<!--                    <div class="form-group ">
                      <label>Facebook Url</label>
                      <input type="text" class="form-control" name="gallery_fb" value="<?php //echo $result['gallery_fb'] ?>"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Twitter Url</label>
                      <input type="text" class="form-control" name="gallery_twit" value="<?php// echo $result['gallery_twit'] ?>"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Google Plus Url</label>
                      <input type="text" class="form-control" name="gallery_gplus" value="<?php// echo $result['gallery_gplus'] ?>"/>
                    </div>
                    
                    <div class="form-group ">
                      <label>Whats App Number</label>
                      <input type="text" class="form-control" name="gallery_wp" value="<?php// echo $result['gallery_wp'] ?>"/>
                    </div>
                      
                    <div class="form-group ">
                      <label>Email Address</label>
                      <input type="text" class="form-control" name="gallery_email" value="<?php// echo $result['gallery_email'] ?>"/>
                    </div>-->
                    
                    <div class="">
                      <input type="hidden" name="editid"  value="<?php echo $result['gallery_id'] ?>"/>
                      <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					  <a href="<?php echo site_url('admins/gallery');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php // form_close(); ?>
                    </form>
                </div>
	</div>
	</div>

<script src="<?php echo site_url('assets/admins/js/country-list.js') ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/admins/js/jquery-1.9.1.js') ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/admins/js/bootstrap.js') ?>" type="text/javascript"></script>

<script>

    $(document).ready(function () {
        //FormValidation.init();
        var gtype = $('#gtype').val();
        
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

	$(function () {
			$(".datepicker").datepicker();
			$(".uniform_on").uniform();
			$(".chzn-select").chosen();
			$('.textarea').wysihtml5();

			$('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
							var $total = navigation.find('li').length;
							var $current = index + 1;
							var $percent = ($current / $total) * 100;
							$('#rootwizard').find('.bar').css({width: $percent + '%'});
							// If it's the last tab then hide the last button and show the finish instead
							if ($current >= $total) {
									$('#rootwizard').find('.pager .next').hide();
									$('#rootwizard').find('.pager .finish').show();
									$('#rootwizard').find('.pager .finish').removeClass('disabled');
							} else {
									$('#rootwizard').find('.pager .next').show();
									$('#rootwizard').find('.pager .finish').hide();
							}
					}});
			$('#rootwizard .finish').click(function () {
					alert('Finished!, Starting over!');
					$('#rootwizard').find("a[href*='tab1']").trigger('click');
			});
	});


</script>
<script type="text/javascript">

  function CheckAll(mychk)
  {
    for (i = 0; i < mychk.length; i++)
      mychk[i].checked = true;
  }

  function UnCheckAll(mychk)
  {
    for (i = 0; i < mychk.length; i++)
      mychk[i].checked = false;
  }

</script>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>