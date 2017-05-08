<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Ride </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/ride/add'); ?>" >
                <!-- text input -->
                <div class="form-group ">
                    <label>Type</label>
                    <select name="rtype" class="form-control" required>
                        <option value="">Select</option>
                        <option value="ride">Ride</option>
                        <option value="event">Event</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Ride Title</label>
                    <input type="text" class="form-control" name="ride_title" required/>
                </div>
                <div class="form-group">
                    <label>Ride Start Point</label>
                    <input type="text" class="form-control" name="ride_start_point" required/>
                </div>
                <div class="form-group">
                    <label>Ride End Point</label>
                    <input type="text" class="form-control" name="ride_end_point" required/>
                </div>
                <div class="form-group">
                    <label>Ride Date</label>
                    <input type="text" class="form-control datepicker" name="ride_date" required/>
                </div>
                <div class="bootstrap-timepicker">
                    <label>Time </label>
                    <div class="input-group">
                        <input type="text" class="form-control timepicker" name="ride_time">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ride Organizer</label>
                    <input type="text" class="form-control" name="ride_organizer" >
                </div>
<!--                <div class="form-group">
                    <label>Story Title</label>
                    <input type="text" class="form-control" name="ride_story_title" />
                </div>
                <div class="form-group">
                    <label>Story</label>
                    <textarea name="ride_story" class="form-control" ></textarea>
                </div>-->
                <div class="form-group">
                    <label>Ride Distance</label>
                    <input type="text" class="form-control" name="ride_distance" />
                </div>
                <div class="form-group">
                    <label> Number of Riders</label>
                    <input type="text" class="form-control" name="no_of_rider" />
                </div>
                
                <div class="form-group">
                    <label>Specify If Not Cycling Club</label>
                    <input type="text" class="form-control" name="not_cyclist" />
                </div>
                <div class="form-group">
                    <label>Additional Information</label>
                    <textarea name="add_info" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label>Map Image</label>
                  <input type="file"  name="map_image" />
                </div>
                <div class="form-group">
                  <label>Ride Poster</label>
                  <input type="file"  name="ride_poster" />
                </div>
                <div class="form-group">
                  <input type="checkbox" class="" name="ride_Active" value="1" />
                  <label>Active</label>
                </div>
                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/ride');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>