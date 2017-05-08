<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Add Profile </div>
                <div class="box-body with-border">
				  <?php  
						if ($this->session->flashdata('message'))
						{
							echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
						}
						if ($this->session->flashdata('error'))
						{
							echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
						}
					?>
                  <?php //echo form_open('user/add'); ?>
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('index.php/admins/user/add');?>" >
                    <!-- text input -->
                    <div class="form-group ">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" required/>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                       <select class="form-control" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control " name="age" />
                    </div>
                    <div class="form-group">
                      <label>User Name</label>
                      <input type="text" class="form-control" name="username"  required/>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" required/>
                    </div>
                    <!-- <div class="form-group">
                      <label>Re-Password</label>
                      <input type="password" class="form-control" name="pwd_txt" required/>
                    </div> -->
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="apply_for" required>
						    <?php if(isset($apply_for)){
                        foreach ($apply_for as $row){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['role_name']; ?></option>
                        <?php } } ?>
<!--                            <option value="Customer">Customer</option>
                            <option value="Buyer">Buyer/Seller</option>-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <select class="form-control state" name="state" required>
                            <option value="">Select State</option>
                        <?php if(isset($st)){
                        foreach ($st as $row){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control city" name="city" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-control" name="phone" />
                    </div>
                    
                    <div class="form-group">
                        <label>Occupation</label>
                        <input type="text" class="form-control" name="occu" />
                    </div>
<!--                    <div class="form-group">
                        <label>Area Of Interest</label>
                        <select class="form-control" name="interest_area" >
                            <option value="Designer">Designer</option>
                            <option value="Developer">Developer</option>
                            <option value="Other">Other</option>
                          
                        </select>
                    </div>-->
                    <div class="form-group">
                        <label>Bio Of Content Writer</label>
                        <textarea class="form-control" name="bio_of" placeholder="Bio Of Content Writer" ></textarea>
                    </div>
<!--                    <div class="form-group">
                      <label>Are you cyclist?</label>
                      <input type="radio"  name="cyclist" value="1" checked/>Yes
                      <input type="radio"  name="cyclist" value="0"/>No
                    </div>-->
<!--                    <div class="form-group">
                      <label>Given number on What's app?</label>
                      <input type="checkbox"  name="whatsapp" value="0"/>
                    </div>-->
<!--                    <div class="form-group">
                        <label>Why Cycling City?</label>
                        <textarea class="form-control" name="why_cc" ></textarea>
                    </div>-->
                    <div class="form-group">
                        <label>Profile picture</label>
                        <input type="file"  name="pic" />
                    </div>
<!--                    <div class="form-group">
                      <label>Resume</label>
                      <input type="file"  name="resume" />
                    </div>-->
                    
                    <div class="">
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/user');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php // form_close(); ?>
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
