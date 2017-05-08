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

	  window.location = "<?php echo site_url('index.php/admins/reports/sellcycledata');?>";
  }
  </script>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Sell Cycle Data</h3>
        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('index.php/admins/reports/searchsellcycledata');?>" onsubmit="return checkstartdate();">
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
			 <th>Post Date</th>
             <th>Name</th>
			 <th>Brand</th>
			 <th>Model</th>
			 <th>Purchase year</th>
			 <th>Frame Size</th>
			 <th>Accessories</th>
			 <th>Price</th>
            </tr>
          </thead>
          <tbody>
             <?php if(isset ($result))
			        {
						foreach ($result as $row)
						  { ?>
							  <tr>
							    <td><?php echo date('d-m-Y',strtotime($row['post_date']));?></td>
								<td>
									 <?php if(count($this->post_cycle_model->getusername($row['user_id'])))
										{
										   print_r($this->post_cycle_model->getusername($row['user_id'])); 
										}
									 ?>
								</td>

								<td><?php if(count($this->post_cycle_model->getbrandname($row['brand_id'])))
										{
										  echo $this->post_cycle_model->getbrandname($row['brand_id']);
										}
									 ?>
								</td> 
								<td><?php if(count($this->post_cycle_model->getmodelname($row['model_id'])))
										{
										   echo($this->post_cycle_model->getmodelname($row['model_id'])); 
										}
									 ?>
								</td>
								<td><?php echo $row['purchase_year']; ?></td>
								<td><?php echo $row['frame_size']; ?></td>
								<td><?php echo $row['accessories']; ?></td>
								<td><?php echo $row['selling_price']; ?></td>
							  </tr>
					<?php } 
                    }?>
             </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>