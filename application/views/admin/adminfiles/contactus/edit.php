<?php $this->load->view('header'); ?>
<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Contact </div>
        <div class="box-body with-border">
            <?php //echo form_open('team/edit'); ?>
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>contactus/edit" method="post">
                <div class="form-group ">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?php echo $result['fname'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $result['lname'] ?>"/>
                </div>
                <div class="form-group ">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
                </div>

                <div class="form-group ">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phn" value="<?php echo $result['phn'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Country *</label>
                       <select class="form-control" name="country" id="country" value="<?php echo $result['country'] ?>" >

                        <option value="">Select Country</option>
                        <?php  foreach($country as $row): ?>
                        <option value="<?=$row->id?>" <?php if($result['country']== $row->id){echo "selected";} ?>><?=$row->name?></option>
                        <?php
                         endforeach;
                         ?>
                      </select>
                </div>
                <div class="form-group ">
                    <label>State</label>
                    <select class="form-control" name="state" id="state">
                        <option> Select </option>
                        
                    </select>
                </div>
                <div class="form-group ">
                    <label>City</label>
                    <select class="form-control" name="city" id="city">
                        <option> Select </option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Inquiry</label>
                    <textarea class="form-control" name="inq"> <?php echo $result['inq'] ?> </textarea>
                </div>
               
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['contact_id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/contactus');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
                <?php //form_close(); ?>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>

<script>
  $(document).ready(function () { 
  //get State 
        var CountryId = $('#country').val();
        var stateId="<?=$result['state'];?>";
        //make the ajax call
        $.ajax({
            url: '<?php echo base_url(); ?>contactus/aj_state',
            type: 'POST',
            data: {id: CountryId,stateId:stateId},
            success: function (data) {
                $("#state").html("");
                $("#state").html(data);
            }
        });

    //get City 
  
        var cityId="<?=$result['city'];?>";
        //make the ajax call
        $.ajax({
            url: '<?php echo base_url(); ?>contactus/aj_city',
            type: 'POST',
            data: {id: stateId,cityId:cityId},
            success: function (data) {
                $("#city").html("");
                $("#city").html(data);
            }
        });
 
 
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
    });
</script>