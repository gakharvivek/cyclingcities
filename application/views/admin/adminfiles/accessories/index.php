<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Accessories List</h3>
        <h4><a href="<?php echo site_url('admins/accessories/add'); ?>"> Add Accessories </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Accessories Name</th>
              <th>Description</th>
              <th>Accessories Images</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
					   <?if($row['img1']!='')
					     {?>
                           <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $row['img1']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
                      <?if($row['img2']!='')
					     {?>
                           <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $row['img2']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
					   <?if($row['img3']!='')
					     {?>
                           <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $row['img3']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
                    </td>

					<td><a href="<?php echo site_url('admins/accessories/edit'); ?>/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/accessories/remove'); ?>/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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
