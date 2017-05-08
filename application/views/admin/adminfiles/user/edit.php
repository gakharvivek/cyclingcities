<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Edit Profile </div>
        <div class="box-body with-border">
            <?php //echo form_open('user/edit'); ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('index.php/admins/user/edit');?>" >
                <!-- text input -->
                <div class="form-group ">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <option value="Male" <?php if ($result['gender'] == "Male") {
                echo "selected";
            } ?> >Male</option>
                        <option value="Female" <?php if ($result['gender'] == "Female") {
                echo "selected";
            } ?> >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" class="form-control " name="age" value="<?php echo $result['age'] ?>"/>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $result['username'] ?>" readonly/>
                </div>
                <!-- <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Write only if you want to change password"/>
                </div> -->
                <div class="form-group">
                    <label>Apply For</label>
					<select class="form-control" name="apply_for" required>
						    <?php if(isset($apply_for)){
                        foreach ($apply_for as $row){ ?>
                            <option value="<?php echo $row['id']; ?>" <?php if ($result['role_id'] == $row['id']) {echo "selected";} ?>><?php echo $row['role_name']; ?></option>
                        <?php } } ?>
							<!-- <option value="Customer">Customer</option>
                            <option value="Buyer">Buyer/Seller</option>-->
                        </select>
            
                </div>
                <div class="form-group">
                    <label>State</label>
                    <select class="form-control state" name="state">
                    <?php foreach ($st as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if ($result['state'] == $row['id']) {echo "selected";} ?> ><?php echo $row['name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <select class="form-control city" name="city">
                        <option value=''>Select City</option>
						<?if(count($city)){
								foreach($city as $cityList){?>
									<option value="<?=$cityList['id']?>" <? if($result['city']==$cityList['id']){echo "selected";}?>><?=$cityList['name']?></option>
								<?}
							}?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $result['email'] ?>" required/>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>"/>
                </div>
                
                <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" class="form-control" name="occu" value="<?php echo $result['occu'] ?>"/>
                </div>
                <div class="form-group">
					<label>Bio Of Content Writer</label>
					<textarea class="form-control" name="bio_of" placeholder="Bio Of Content Writer" ><?php echo $result['bio_of'] ?></textarea>
				</div>
               <!--  <div class="form-group">
                    <label>Area Of Interest</label>
                     <select class="form-control" name="interest_area">
                        <option value="Designer" <?php if ($result['interest_area'] == "Designer") {echo "selected";} ?>>Designer</option>
                        <option value="Developer" <?php if ($result['interest_area'] == "Developer") {echo "selected";} ?>> Developer</option>
                        <option value="Other" <?php if ($result['interest_area'] == "Other") {echo "selected";} ?>>Other</option>
                    </select>
                </div>
                 -->

<!--                <div class="form-group">
                    <label>Are you cyclist?</label>
                    <input type="radio"  name="cyclist" <?php// if($result['interest_area']=='1'){echo 'checked';}?>/>Yes
                    <input type="radio"  name="cyclist" <?php// if($result['interest_area']=='0'){echo 'checked';}?>/>No
                </div>-->
                
<!--                <div class="form-group">
                    <label>Given number on What's app?</label>
                    <input type="checkbox"  name="wahtsapp" <?php //if($result['interest_area']=='1'){echo 'checked';}?> />
                </div>-->
                
<!--                <div class="form-group">
                    <label>Why Cycling Cities?</label>
                    <textarea class="form-control" name="why_cc" ><?php// echo $result['why_cc'] ?></textarea>
                </div>-->
                <div class="form-group">
                    <label>Profile picture</label>
                    <input type="file" name="pic" />
                    <?php if ($result['pic'] != '') { ?>
                        <img src="<?php echo base_url(); ?>upload/user/<?php echo $result['pic']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="pic_old" value="<?php echo $result['pic']; ?>"/>
                </div>
                
<!--                <div class="form-group">
                    <label>Resume</label>
                    <input type="file" name="resume" />
                    <input type="hidden" name="resume_old[]" value="<?php //echo $result['resume']; ?>"/>
                </div>-->
                
                <div class="">
                    <input type="hidden" name="userid"  value="<?php echo $result['id'] ?>"/>
                    <?php if (isset($_GET) && !empty($_GET['p'])) { ?>
                        <input type="hidden" name="profile"  value="<?php echo $_GET['p'] ?>"/>
                    <?php } ?>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/user');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            <?php //form_close(); ?>
            </form>
        </div>
    </div>
</div>
<script>
    //get Publisher 

	 $(".state").change(function () {
        //get the selected value

        var sid = this.value;
     
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("index.php/admins/user/aj_city"); ?>',
            type: 'POST',
            data: {id: sid},
            success: function (data) {
                $(".city").html("");
                $(".city").html(data);
            }
        });
    });
    
</script>