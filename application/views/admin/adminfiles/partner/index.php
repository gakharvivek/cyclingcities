<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Partner List</h3>
        <h4><a href="<?php echo site_url('admins/partner/add'); ?>"> Add Partner </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Partner Name</th>
              <th>Logo</th>

            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['p_name']; ?></td>
                    <td>
					   <?if($row['logo']!='')
							 {?>
							   <img src="<?php echo site_url('upload/logo'); ?>/<?php echo $row['logo']; ?>" alt=""  width="100"/>
						   <?}?>
					</td>
                    <td><a href="<?php echo site_url('admins/partner/edit'); ?>/<?php echo $row['p_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a class="hapus" href="<?php echo site_url('admins/partner/remove'); ?>/<?php echo $row['p_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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