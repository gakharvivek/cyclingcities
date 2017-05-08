<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User Front List</h3>
        <!--<h4> <a href="<?php //echo site_url(); ?>user/add"> Add User </a></h4>-->
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone </th>
              <!--<th>User Name</th>-->
              <th>Apply For</th>
              <th>Picture</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                //echo '<pre>';print_r($result); exit;
                foreach ($result as $user) {
                  ?>
                  <tr>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <!--<td><?php //echo $user['username']; ?></td>-->
                    <td><?php echo $user['apply_for']; ?></td>
                    <td>
					   <?if($user['pic']!='')
							 {?>
							   <img src="<?php echo site_url('upload/user'); ?>/<?php echo $user['pic']; ?>" alt=""  width="100"/>
						   <?}?>
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