<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Article List</h3>
        <h4><a href="<?php echo site_url('admins/article/add'); ?>"> Add Article </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable ">
          <thead>
            <tr>

              <th>Category Name</th>
              <th>Sub category Name</th>
              <th>Article Name</th>
              <th>Article Type</th>
              <th>Article Description</th>
              <th>Article Image</th>
              <th>Publish Date</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr >

                    <td><?php echo $this->article_model->getcatename($row['cate_id']); ?></td>
                    <td><?php echo $this->article_model->getsubname($row['sub_id']); ?></td>
                    <td><?php echo $row['article_name']; ?></td>
                    <td><?php echo $row['article_type']; ?></td>
                    <td class="article"><?php echo $row['article_desc']; ?></td>
                    <td><? if($row['article_image']!=''){?><img src="<?php echo site_url('upload/article'); ?>/<?php echo $row['article_image']; ?>" width="100" /><?}?></td>
                    <td><?php echo $row['pub_date']; ?></td>
                    <td><?php echo $row['create_date']; ?></td>

					<td><a href="<?php echo site_url('admins/article/edit'); ?>/<?php echo $row['article_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/article/remove'); ?>/<?php echo $row['article_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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