<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Advertise List</h3>
        <h4><a href="<?php echo site_url('admins/advertise/add'); ?>"> Add Advertise </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Adv. Name</th>
              <th>Adv. Type</th>
              <th>Adv. Position</th>
              <th>Uptime</th>
              <th>Downtime</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>

                    <td><?php echo $row['ad_name']; ?></td>
                    <td><?php echo $row['ad_type']; ?></td>
                    <td><?php echo $row['ad_position']; ?></td>
                    <td><?php echo date('m-d-Y', strtotime($row['uptime'])); ?></td>
                    <td><?php echo date('m-d-Y', strtotime($row['downtime'])); ?></td>
                    <td><?php echo $row['active']; ?></td>

                    <td><a href="<?php echo site_url('admins/advertise/edit'); ?>/<?php echo $row['ad_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/advertise/remove'); ?>/<?php echo $row['ad_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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