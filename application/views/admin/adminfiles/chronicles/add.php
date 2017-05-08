<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Chronicles </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/chronicles/add'); ?>" >
              <div class="form-group ">
                    <label>Chronicles Category</label>
                     <select class="form-control" name="ch_category" id="ch_category" required>
                       <option value="">Select Category</option>
                        <?php 
                          foreach ($cate as $row){
                            ?>
                            <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
                       <?php
                          }     
                       ?>
                     </select>
              </div>
                <div class="form-group ">
                    <label>Chronicles Title</label>
                    <input type="text" class="form-control" name="chronicles_title" required/>
                </div>
<!--                <div class="form-group ">
                    <label>Post By</label>
                    <input type="text" class="form-control" name="post_by" required/>
                </div>-->
                <div class="form-group ">
                    <label>Story Of</label>
                    <input type="text" class="form-control" name="story_of" required/>
                </div>

                    <div class="form-group">
                      <label>Date</label>
                      <input type="text" class="form-control datepicker" name="chronicles_date"/>
                    </div>

                <div class="form-group">
                    <label>Chronicles Description</label>
                    <textarea name="chronicles_desc" class="form-control"></textarea>
                </div>
<!--                <div class="form-group ">
                    <label>Bio Of Content Writer</label>
                    <textarea class="form-control" name="bio_of" required placeholder="Bio Of Content Writer"></textarea>
                </div>-->
                <div class="form-group">
                    <label>Tags &nbsp; &nbsp; &nbsp;  <span style="color:red">Separate Tags using (,)</span></label>
                    <input type="text" class="form-control" name="chronicles_tag" />
                    <label></label>
                </div>

<!--                <div class="form-group">
                    <label>Chronicles Location</label>
                    <input type="text" class="form-control" name="chronicles_location" />
                </div>-->
                    <div class="form-group ">
                    <label>State</label>
                     <select class="form-control" name="state" id="state" required>
                       <option value="">Select State</option>
                        <?php 
                          foreach ($state as $row){
                           
                            ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                       <?php
                          }     
                       ?>
                     </select>
                    </div>
                <div class="form-group ">
                    <label>City</label>
                    <select class="form-control" name="city" id="city" required>
                        <option> Select City</option>
                       
                    </select>

                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image1" />
                </div>
                   <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image2" />
                </div>
                 <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image3" />
                </div>
                <div class="form-group">
                    <label>Chronicles Image</label>
                    <input type="file"  name="chronicles_image4" />
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="chronicles_active" value="1" />
                    <label>Active</label>
                </div>
            <input type="hidden" class="form-control" id="post_by" name="post_by" value="<?php echo $this->session->userdata('Userid'); ?>" />
                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/chronicles');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

  //get City 
  $("#state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/chronicles/aj_city"); ?>',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $("#city").html("");
        $("#city").html(data);
      }
    });
  });

</script>