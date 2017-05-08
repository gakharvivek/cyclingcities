<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Ride </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/ride/edit'); ?>" >
                <!-- text input -->
                <div class="form-group ">
                    <label>Type</label>
                    <select name="rtype" class="form-control" required>
                        <option value="">Select</option>
                        <option value="ride" <?php if($result['rtype']=='ride'){ echo 'selected';}?>>Ride</option>
                        <option value="event" <?php if($result['rtype']=='event'){ echo 'selected';}?>>Event</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Ride Title</label>
                    <input type="text" class="form-control" name="ride_title" value="<?php echo $result['ride_title'];?>" required/>
                </div>
                <div class="form-group">
                    <label>Ride Start Point</label>
                    <input type="text" class="form-control" name="ride_start_point" value="<?php echo $result['ride_start_point'];?>"  />
                </div>
                <div class="form-group">
                    <label>Ride End Point</label>
                    <input type="text" class="form-control" name="ride_end_point" value="<?php echo $result['ride_end_point'];?>"  />
                </div>
                <div class="form-group">
                    <label>Ride Date</label>
                    <input type="text" class="form-control datepicker" name="ride_date" value="<?php echo date('m/d/Y',  strtotime($result['ride_date']));?>" />
                </div>
                <div class="bootstrap-timepicker">
                    <label>Time </label>
                    <div class="input-group">
                        <input type="text" class="form-control timepicker" name="ride_time" value="<?php echo $result['ride_time'];?>" >
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ride Organizer</label>
                    <input type="text" class="form-control" name="ride_organizer" value="<?php echo $result['ride_organizer'];?>"  >
                </div>
<!--                <div class="form-group">
                    <label>Story Title</label>
                    <input type="text" class="form-control" name="ride_story_title" value="<?php echo $result['ride_story_title'];?>"  />
                </div>
                <div class="form-group">
                    <label>Story</label>
                    <textarea name="ride_story" class="form-control" ><?php echo $result['ride_story'];?></textarea>
                </div>-->
                <div class="form-group">
                    <label>Ride Distance</label>
                    <input type="text" class="form-control" name="ride_distance" value="<?php echo $result['ride_distance'];?>"  />
                </div>
                <div class="form-group">
                    <label>Number Of Riders</label>
                    <input type="text" class="form-control" name="no_of_rider" value="<?php echo $result['no_of_rider'];?>"  />
                </div>
                
                <div class="form-group">
                    <label>Specify If Not Cycling Club</label>
                    <input type="text" class="form-control" name="not_cyclist" value="<?php echo $result['not_cyclist'];?>"  />
                </div>
                <div class="form-group">
                    <label>Additional Information</label>
                    <textarea name="add_info" class="form-control" ><?php echo $result['add_info'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Map Image</label>
                    <input type="file"  name="map_image" />
					<?php if ($result['map_image'] != '') { ?>
                        <img src="<?php echo site_url('upload/ride/map'); ?>/<?php echo $result['map_image']; ?>" width="100px" />
                    <?php } ?>
                    <input type="hidden" name="map_image_old1" value="<?php echo $result['map_image'];?>" />
                </div>
                <div class="form-group">
                    <label>Ride Poster</label>
                    <input type="file"  name="ride_poster" />
					<?php if ($result['ride_poster'] != '') { ?>
                        <img src="<?php echo site_url('upload/ride/poster'); ?>/<?php echo $result['ride_poster']; ?>" width="100px" />
                    <?php } ?>
                    <input type="hidden" name="ride_poster_old1" value="<?php echo $result['ride_poster'];?>" />
                </div>
                <div class="form-group">
                    <input type="checkbox" class="" name="ride_Active" value="1" <?php if ($result['ride_Active'] == 1) {echo 'checked';} ?>/>
                    <label>Active</label>
                </div>
                <div class="">
                    <input type="hidden" name="ride_id" value="<?php echo $result['ride_id'];?>" />
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/ride');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
