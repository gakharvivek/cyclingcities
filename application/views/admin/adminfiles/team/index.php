<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Team List</h3>
        <h4><a href="<?php echo site_url('admins/team/add'); ?>"> Add Team </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Designation</th>
              <th>Information</th>
              <th>City</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Pic</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['f_name']; ?></td>
                    <td><?php echo $row['l_name']; ?></td>
                    <td><?php echo $row['desig']; ?></td>
                    <td><?php echo $row['info']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><img src="<?php echo site_url('upload/team'); ?>/<?php echo $row['pic']; ?>" width="100" /></td>
                    <td><a href="<?php echo site_url('admins/team/edit'); ?>/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/team/remove'); ?>/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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