<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Chronicles </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/chronicles/edit'); ?>" >
              <div class="form-group ">
                    <label>Chronicles Title</label>
                    <input type="text" class="form-control" name="chronicles_title" value="<?php echo $result['chronicles_title'];?>" required/>
                </div>      
              <div class="form-group ">
                    <label>Chronicles Category</label>
                     <select class="form-control" name="ch_category" id="ch_category">
                       <option value="">Select Category</option>
                        <?php foreach ($cate as $row){ ?>
                            <option value="<?php echo $row['cate_id']; ?>" <?php if ($result['ch_category'] == $row['cate_id']) {echo "selected";} ?> > <?php echo $row['cate_name']; ?></option>
                       <?php } ?>
                     </select>
                    </div>
                <div class="form-group ">
                    <label>Story Of</label>
                    <input type="text" class="form-control" name="story_of" value="<?php echo $result['story_of'];?>" required/>
                </div>

                <div class="form-group ">
                    <label>Create Date</label>
                    <input type="text" class="form-control datepicker" name="chronicles_date" value="<?php echo date('m/d/Y',  strtotime($result['chronicles_date'])); ?>" />
                </div>
                <div class="form-group">
                    <label>Chronicles Description</label>
                    <textarea name="chronicles_desc" class="form-control" ><?php echo $result['chronicles_desc'];?></textarea>
                </div>
<!--                <div class="form-group ">
                    <label>Bio Of Content Writer</label>
                    <textarea class="form-control" name="bio_of" value="<?php //echo $result['bio_of'];?>" required placeholder="Bio Of Content Writer"></textarea>
                </div>-->
                <div class="form-group">
                    <label>Tags &nbsp; &nbsp; &nbsp;  <span style="color:red">Separate Tags using (,)</span></label>
                    <input type="text" class="form-control" name="chronicles_tag" value="<?php echo $result['chronicles_tag'];?>" />
                    <label></label>
                </div>
<!--                <div class="form-group">
                    <label>Chronicles Location</label>
                    <input type="text" class="form-control" name="chronicles_location" value="<?php //echo $result['chronicles_location'];?>" />
                </div>
                                  <div class="form-group ">
                    <label>State</label>
                     <select class="form-control state"  name="state" id="state" required>
                       <option value="">Select State</option>
                        <?php 
                         // foreach ($state as $row){
                           
                            ?>
                       <option value="<?php //echo $row['id']; ?>" <?php //if ($result['state'] == $row['id']) {echo "selected";} ?> ><?php //echo $row['name']; ?></option>
                    <option value="<?php //echo $row['id']; ?>"><?php// {echo "selected";} echo $row['name']; ?></option>
                       <?php
                       //   }     
                       ?>
                     </select>
                    </div>-->
                          <div class="form-group ">
                <label>State</label>
                <select class="form-control state" name="state" id="state" required>
                    <?php foreach ($state as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if ($result['state'] == $row['id']) {echo "selected";} ?> ><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>City</label>
                <select class="form-control city" name="city" id="city" required>
                    <option value=''>Select City</option>
                </select>
            </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image" />
					<?if($result['chronicles_image']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles');?>/<?php echo $result['chronicles_image'];?>" width="100px" />
					   <?}?>
                    <input type="hidden" name="chronicles_image_old" value="<?php echo $result['chronicles_image'];?>" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image1" />
                    <?if($result['chronicles_image1']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles');?>/<?php echo $result['chronicles_image1'];?>" width="100px" />
					   <?}?>
                    <input type="hidden" name="chronicles_image_old1" value="<?php echo $result['chronicles_image1'];?>" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image2" />
                    <?if($result['chronicles_image2']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles');?>/<?php echo $result['chronicles_image2'];?>" width="100px" />
					   <?}?>
                    <input type="hidden" name="chronicles_image_old2" value="<?php echo $result['chronicles_image2'];?>" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image3" />
                    <?if($result['chronicles_image3']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles');?>/<?php echo $result['chronicles_image3'];?>" width="100px" />
					   <?}?>
                    <input type="hidden" name="chronicles_image_old3" value="<?php echo $result['chronicles_image3'];?>" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image4" />
                    <?if($result['chronicles_image4']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles');?>/<?php echo $result['chronicles_image4'];?>" width="100px" />
					   <?}?>
                    <input type="hidden" name="chronicles_image_old4" value="<?php echo $result['chronicles_image4'];?>" />
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="chronicles_active" value="1" <?php if ($result['chronicles_active'] == 1) {echo 'checked';} ?>/>
                    <label>Active</label>
                </div>
                <div class="">
                    <input type="hidden" name="chronicles_id" value="<?php echo $result['chronicles_id'];?>" />
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/chronicles');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  
      $(document).ready(function () {
        var stid = $('.state').val();
        var ctid = '<?php echo $result['city']; ?>';
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/chronicles/aj_city"); ?>',
            type: 'POST',
            data: {id: stid, ct_id: ctid},
            success: function (data) {
                $(".city").html("");
                $(".city").html(data);
            }
        });
    });
    //get Publisher 
  $(".state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/chronicles/aj_city"); ?>',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $(".city").html("");
        $(".city").html(data);
      }
    });
  });
</script>