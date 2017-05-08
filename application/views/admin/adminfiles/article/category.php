<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Category List</h3>
        <h4><a href="<?php echo site_url('admins/article/addcate'); ?>"> Add Category </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Category Name</th>
              <th>Category Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>

                    <td><?php echo $row['cate_name']; ?></td>
                    <td><?php echo $row['cate_desc']; ?></td>

					<td><a href="<?php echo site_url('admins/article/editcate'); ?>/<?php echo $row['cate_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/article/removecate'); ?>/<?php echo $row['cate_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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