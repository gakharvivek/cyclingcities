<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User List</h3>
        <h4> <a href="<?php echo site_url('admins/user/add'); ?>"> Add User </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone </th>
              <th>User Name</th>
              <th>Apply For</th>
              <th>Picture</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                //echo '<pre>';print_r($result); exit;
                foreach ($result as $user) {
                  ?>
                  <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['role_name']; ?></td>
                    <td><img src="<?php echo site_url('upload/user'); ?>/<?php echo $user['pic']; ?>" width="100" /></td>

                    <td><a href="<?php echo site_url('admins/user/edit'); ?>/<?php echo $user['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/user/remove'); ?>/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
                     <!--<a id="hapus" href="<?php //echo site_url(); ?>user/remove/<?php // echo $user['id'];  ?>"><i class="fa fa-remove"></i></a>-->
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