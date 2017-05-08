<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Brand List</h3>
        <h4><a href="<?php echo site_url('admins/cycle_info/addbrand'); ?>"> Add Brand </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>Brand Name</th>
              <th>Brand Logo</th>
              <th>Brand Desc</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td>
					   <? if($row['logo']!='')
					       {?>
								<img src="<?php echo site_url('upload/logo'); ?>/<?php echo $row['logo']; ?>" width="100" />
						 <?}?>
					</td>
                    <td><?php echo $row['brand_desc']; ?></td>

                    <td><a href="<?php echo site_url('admins/cycle_info/editbrand'); ?>/<?php echo $row['brand_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/cycle_info/removebrand'); ?>/<?php echo $row['brand_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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