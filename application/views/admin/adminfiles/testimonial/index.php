<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Testimonial List</h3>
        <h4> <a href="<?php echo site_url('admins/testimonial/add'); ?>"> Add Testimonial </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>
              <th>Publisher Name</th>
              <th>Designation</th>
              <th>Company</th>
              <th>Testimonial Text</th>
              <th>Testimonial Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($result)) {
                foreach ($result as $testimonial) {
                  ?>
                  <tr>
                    <td><?php echo $testimonial['publisher_name']; ?></td>
                    <td><?php echo $testimonial['position']; ?></td>
                    <td><?php echo $testimonial['company']; ?></td>
                    <td><?php echo $testimonial['testimonial_text']; ?></td>
                    <td><?php echo $testimonial['testimonial_active']; ?></td>
                    <td>
                      <a href="<?php echo site_url('admins/testimonial/edit'); ?>/<?php echo $testimonial['testimonial_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo site_url('admins/testimonial/remove'); ?>/<?php echo $testimonial['testimonial_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a> 
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