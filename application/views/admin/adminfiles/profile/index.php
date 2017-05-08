<div class="row-fluid">
    <div class="box">
        <div class="box-header with-border"> Profile List</div>
        <div class="box-body with-border">
            <div class="col-md-12">
                <div class="col-md-9">
                    <div class="form-group ">
                        <input type="hidden" name="id" value="<?php echo $result->id; ?>"/>
                        <!-- text input -->
                        <div class="form-group  ">
                            <label>Name : </label>
                            <label  name="name" class="pro form-control" ><? if(isset($result->name) && $result->name !='') {?> <?php echo $result->name; ?> <?}?></label>
                        </div>                   
                    </div>
                    <div class="form-group ">
                        <label>Gender : </label>
                        <label  name="gender" class="pro form-control"><? if(isset($result->gender) && $result->gender !='') {?> <?php echo $result->gender; ?> <?}?> </label>
                    </div>
                    <div class="form-group">
                        <label>Birth Date : </label>
                        <label  name="bdate" class="pro form-control"><? if(isset($result->dob) && $result->dob !='') {?> <?php echo date('d-m-Y',  strtotime($result->dob)); ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Role : </label>
                        <label  name="role" class="pro form-control" ><? if(isset($result->apply_for) && $result->apply_for !='') {?> <?php echo $result->apply_for; ?> <?}?> </label>
                    </div>

                    <div class="form-group" >
                        <label>State : </label>
                        <label  name="state" class="pro form-control"><? if(isset($result->statename) && $result->statename !='') {?> <?php echo $result->statename; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>City : </label>
                        <label  name="city" class="pro form-control"><? if(isset($result->cityname) && $result->cityname !='') {?> <?php echo $result->cityname; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Email : </label>
                        <label  name="email" class="pro form-control"><? if(isset($result->email) && $result->email !='') {?> <?php echo $result->email; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Phone : </label>
                        <label  name="phone" class="pro form-control"><? if(isset($result->phone) && $result->phone !='') {?> <?php echo $result->phone; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Type : </label>
                        <label  name="type" class="pro form-control"><? if(isset($result->user_type) && $result->user_type !='') {?> <?php echo $result->user_type; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Occupation : </label>
                        <label  name="occu" class="pro form-control"><? if(isset($result->occu) && $result->occu !='') {?> <?php echo $result->occu; ?> <?}?></label>
                    </div>
                    <div class="form-group">
                        <label>Skill : </label>
                        <label  name="skill" class="pro form-control"><? if(isset($result->interest_area) && $result->interest_area !='') {?> <?php echo $result->interest_area; ?> <?}?></label>
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
					   <? if(isset($result->pic) && $result->pic !='') {?> <img src="<?php echo site_url('upload/user');?>/<?php echo $result->pic ?>" max-width="150px" height="150px" /> <?}?>
                        
                    </div>
                     <div class="form-group">
                         <a href='<?php echo site_url('admins/user/edit'); ?>/<?php echo $result->id ?>?p=1' style="width:100%" class="btn btn-group btn-primary"> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="col-md-3"></div>

<style>
    /*.box{
        width:500px;
        margin: 0 auto;
    }*/
</style>