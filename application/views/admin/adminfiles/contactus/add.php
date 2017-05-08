<?php $this->load->view('header'); ?>


<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Contact </div>
        <div class="box-body with-border">
            <?php //echo form_open_multipart('team/add'); 
            ?>
            <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>contactus/add" method="post">
                <!-- text input -->
                <div class="form-group ">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname"/>
                </div>
                <div class="form-group ">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname"/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group ">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phn"/>
                </div>
                <div class="form-group ">
                    <label>Country</label>
                    <select class="form-control" name="country" id="country">
                        <option value="">Select Country</option>
                        <?php
                          foreach ($country as $row):
                            ?>
                            <option value="<?=$row->id ?>"><?=$row->name ?></option>
                        <?php
                          endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label>State</label>
                    <select class="form-control" name="state" id="state">
                        <option value="">Select State</option>
                      </select>
                </div>

                <div class="form-group ">
                    <label>City</label>
                    <select class="form-control" name="city" id="city">
                        <option> Select City</option>
                    </select>
                </div>
                
                <div class="form-group ">
                    <label>Inquiry</label>
                    <textarea class="form-control" name="inq"></textarea>
                </div>

                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/contactus');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>

<?php $this->load->view('footer'); ?>
<script>

  //get State 
  $("#country").change(function () {
    //get the selected value
    var CountryId = this.value;

    //make the ajax call
    $.ajax({
      url: '<?php echo base_url(); ?>contactus/aj_state',
      type: 'POST',
      data: {id: CountryId},
      success: function (data) {
        $("#state").html("");
        $("#state").html(data);
      }
    });
  });
  //get City 
  $("#state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo base_url(); ?>contactus/aj_city',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $("#city").html("");
        $("#city").html(data);
      }
    });
  });

</script> */