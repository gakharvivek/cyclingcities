<div class="row">
  <div class="col-xs-12">
  <script>
  function checkstartdate()
  {
	  var startdate=$('#startdate').val();
	  var enddate=$('#enddate').val();
      
	  if(enddate != '')
	  {
		  if(startdate <= enddate)
		  {
			  return true;
		  }
		  else
		  {
			  alert("Enddate is bigger than Startdate.");
			  $('#enddate').val('');
			  return false;
		  }
	  }
	  else
	  {
		  return true;
	  }
  }

  function resetdates()
  {
	  $('#startdate').val('');
	  $('#enddate').val('');

	  window.location = "<?php echo site_url('index.php/admins/reports/');?>";
  }
  </script>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User Registrations Report</h3>
        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('index.php/admins/reports/searchresult');?>" onsubmit="return checkstartdate();">
                    <!-- text input -->
                    
					<div class="form-group">
                      <label>Start Date</label>
                      <input type="text" class="form-control datepicker" name="startdate" id="startdate" required value="<?=$this->session->userdata('startdate');?>" readonly/>
                    </div>
                    
					<div class="form-group">
                      <label>End Date</label>
                      <input type="text" class="form-control datepicker" name="enddate" id="enddate" value="<?=$this->session->userdata('enddate');?>" readonly/>
                    </div>

                    <div class="">
                      <input type="submit" class="btn btn-group btn-primary" name="btnsubmit" value="Search" />
					  <a href="javascript:void(0)" class="btn btn-group btn-primary" onclick="resetdates();">Reset</a>
                    </div>
                  </form>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Area</th>
              <th>Age</th>
			  <th>Owns Cycle</th>
			  <th>Occupation</th>
			  <th>Gender</th>
			  <th>Marital Status</th>
			  <th>Pincode</th>
			  <th>UserType</th>
			  <th>Cycling Club</th>
			  <th>Type of Cycle</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                //echo '<pre>';print_r($result); exit;
                foreach ($result as $user) {
                    
					$age ='';
					if($user['dob']!='')
					{
						$userDob = $user['dob'];
						$difference = time() - strtotime($userDob);
						$age = floor($difference / 31556926);
					}
					
                  ?>
                  <tr>
                    <td><?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['area']; ?></td>
                    <td><?php echo $age; ?></td>
					<td><?php echo $user['owncycle']; ?></td>
					<td><?php echo $user['occu']; ?></td>
					<td><?php echo $user['gender']; ?></td>
					<td><?php echo $user['marital']; ?></td>
					<td><?php echo $user['pincode']; ?></td>
					<td><?php echo $user['user_type']; ?></td>
					<td><?php echo $user['club_member']; ?></td>
					<td><?php echo $user['typeofcyclinst']; ?></td>
                  </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>