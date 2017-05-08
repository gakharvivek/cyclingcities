<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">CMS</h3>
        <!-- <h4><a href="<?php echo site_url('admins/cms/add'); ?>"> Add Know Cycle </a></h4> -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                      <a href="<?php echo site_url('admins/cms/edit'); ?>/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <!-- <a href="<?php echo site_url('admins/cms/remove'); ?>/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a> -->
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