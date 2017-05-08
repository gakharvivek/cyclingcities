<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Model List</h3>
        <h4><a href="<?php echo site_url('admins/cycle_info/addmodel'); ?>"> Add Model </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Brand Name</th>
              <th>Model Name</th>
<!--                        <th>Cycle Category</th>-->
              <th>Cycle Type</th>
              <th>Model Price</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td><?php echo $row['name']; ?></td>
      <!--                        <td><?php //echo $row['cycle_category'];  ?></td>-->
                    <td><?php echo $row['cycle_type']; ?></td>
                    <td><?php echo $row['price']; ?></td>

                    <td><a href="<?php echo site_url('admins/cycle_info/editmodel'); ?>/<?php echo $row['model_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/cycle_info/removemodel'); ?>/<?php echo $row['model_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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
