<?php $this->load->view('header'); ?>

<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Parts List</h3>
        <h4><a href="<?php echo base_url(); ?>parts/add"> Add Parts </a></h4>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped dtable">
          <thead>
            <tr>

              <th>parts1</th>
              <th>parts2</th>
              <th>parts3</th>
              <th>parts4</th>
              <th>parts5</th>
              <th>parts6</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($result)) {
                foreach ($result as $row) {
                  ?>
                  <tr>

                    <td><?php echo $row['part1']; ?></td>
                    <td><?php echo $row['part2']; ?></td>
                    <td><?php echo $row['part3']; ?></td>
                    <td><?php echo $row['part4']; ?></td>
                    <td><?php echo $row['part5']; ?></td>
                    <td><?php echo $row['part6']; ?></td>

                    <td><a href="<?php echo base_url(); ?>parts/edit/<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                      <a href="<?php echo base_url(); ?>parts/remove/<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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
<?php $this->load->view('footer'); ?>