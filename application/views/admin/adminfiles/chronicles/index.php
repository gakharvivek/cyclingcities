<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Chronicles List</h3>
        <h4> <a href="<?php echo site_url('admins/chronicles/add'); ?>"> Add Chronicles </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Chronicles Title</th>
              <th>Chronicles city</th>
              <th>Story of</th>
			  <th>Post By</th>
              <th>Images</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                foreach ($result as $chronicles) {
                  ?>
                  <tr>
                    <td><?php echo $chronicles['chronicles_title']; ?></td>
                    <td><?php echo $this->chronicles_model->getcity($chronicles['city']); ?></td>
                    <td><?php echo $chronicles['story_of']; ?></td>
					<td><?php echo $this->chronicles_model->getusername($chronicles['post_by']); ?></td>
                    <td>
					  <?if($chronicles['chronicles_image']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles['chronicles_image']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
                      <?if($chronicles['chronicles_image1']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles['chronicles_image1']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
					   <?if($chronicles['chronicles_image2']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles['chronicles_image2']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
					   <?if($chronicles['chronicles_image3']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles['chronicles_image3']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
					   <?if($chronicles['chronicles_image4']!='')
					     {?>
                           <img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles['chronicles_image4']; ?>"alt=""  style="float: left; max-width: 20%; display: block;" />
					   <?}?>
                    </td>
                    <td>
					    <?if($chronicles['chronicles_active']==1)
					     {?>
                           Active
					   <?}
						  else
						 {?>
						   Inactive
					   <?}?>
					</td>
                    <td>
                      <a href="<?php echo site_url('admins/chronicles/edit'); ?>/<?php echo $chronicles['chronicles_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/chronicles/remove'); ?>/<?php echo $chronicles['chronicles_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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