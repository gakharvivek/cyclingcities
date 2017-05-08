<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Gallery List</h3>
        <h4><a href="<?php echo site_url('admins/gallery/add'); ?>"> Add Gallery </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Gallery Name</th>
              <th>Gallery Description</th>
              <th>Gallery Image</th>

              <!-- <th>Whats App Number</th>
              <th>Email Address</th> -->
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>

                    <td><?php echo $row['gallery_title']; ?></td>
                    <td><?php echo $row['gallery_desc']; ?></td>
                    <td>
					   <?if($row['gallery_img']!='')
					     {?>
                           <img src="<?php echo site_url('upload/gallery'); ?>/<?php echo $row['gallery_img']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
                    </td>

                    <!-- <td><?php echo $row['gallery_wp']; ?></td>
                    <td><?php echo $row['gallery_email']; ?></td> -->
                    <td><a href="<?php echo site_url('admins/gallery/edit'); ?>/<?php echo $row['gallery_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/gallery/remove'); ?>/<?php echo $row['gallery_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a> 
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