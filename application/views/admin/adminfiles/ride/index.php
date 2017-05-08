<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ride List</h3>
        <h4> <a href="<?php echo site_url('admins/ride/add'); ?>"> Add Ride </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Ride Title</th>
              <th>Ride Start Point</th>
              <th>Ride End Point</th>
              <th>Ride Date</th>
              <th>Ride Time</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                foreach ($result as $ride) {
                  ?>
                  <tr>
                    <td><?php echo $ride['ride_title']; ?></td>
                    <td><?php echo $ride['ride_start_point']; ?></td>
                    <td><?php echo $ride['ride_end_point']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($ride['ride_date'])); ?></td>
                    <td><?php echo $ride['ride_time']; ?></td>
                    <td><?php echo $ride['ride_Active']; ?></td>
                    <td>
                      <a href="<?php echo site_url('admins/ride/edit'); ?>/<?php echo $ride['ride_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/ride/remove'); ?>/<?php echo $ride['ride_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
                    </td>
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