<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Features List</h3>
        <h4><a href="<?php echo site_url('admins/features/add'); ?>"> Add features </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Brand Name</th>
              <th>Model Name</th>
              <th>Front Break</th>
              <th>Weight</th>
              <th>Gender</th>
              <th>Frame size</th>
              <th>Gears</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td><?php echo $row['model_name']; ?></td>
                    <td><?php echo $row['frontbreak']; ?></td>
                    <td><?php echo $row['weight']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['framesize']; ?></td>
                    <td><?php echo $row['noof_gear']; ?></td>
                  
                    <td>
                      <a href="<?php echo site_url('admins/features/edit'); ?>/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/features/remove'); ?>/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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
