<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Shop List</h3>
        <h4> <a href="<?php echo site_url('admins/shop/add'); ?>"> Add Shop </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Shop Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>City</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
				    <td><?php echo $row['shop_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone1']; ?></td>
                    <td><?php echo $row['cityname']; ?></td>
                    <td>
                      <a href="<?php echo site_url('admins/shop/edit'); ?>/<?php echo $row['shop_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/shop/remove'); ?>/<?php echo $row['shop_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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