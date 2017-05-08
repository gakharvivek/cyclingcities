<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Subcategory List</h3>
        <h4><a href="<?php echo site_url('admins/article/addsub'); ?>"> Add Subcategory </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Category Name</th>
              <th>Sub Category Name</th>
              <th>Sub Category Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $this->article_model->getcatename($row['cate_id']); ?></td>
                    <td><?php echo $row['sub_name']; ?></td>
                    <td><?php echo $row['sub_desc']; ?></td>

					<td><a href="<?php echo site_url('admins/article/editsub'); ?>/<?php echo $row['sub_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/article/removesub'); ?>/<?php echo $row['sub_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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