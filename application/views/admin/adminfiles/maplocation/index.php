<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Map Location List</h3>
        <h4><a href="<?php echo site_url('admins/maplocation/add'); ?>"> Add Map Location </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Title</th>
              <th>City</th>
              <th>Description</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['maploction_title']; ?></td>
                    <td><?php echo $row['maploction_city']; ?></td>
                    <td><?php echo $row['maploction_desc']; ?></td>
                    <td><?php echo $row['maploction_active']; ?></td>
                    <td>
                      <a href="<?php echo site_url('admins/maplocation/edit'); ?>/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/maplocation/remove'); ?>/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
                    </td>
                  </tr>
                <?php }
              }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>