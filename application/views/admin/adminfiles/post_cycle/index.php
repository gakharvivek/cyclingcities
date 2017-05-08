<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Post Cycle List</h3>
                  <h4><a href="<?php echo site_url('admins/post_cycle/add');?>"> Add Post Cycle </a></h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                       
                       <th>Name</th>
                       <th>City</th> 
                       <th>Brand</th>
                        <th>Model</th>
                       <th>Cycle Type</th>
                       <th>Cycle Pic</th> 
                       <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>

                    <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $this->post_cycle_model->getcityname($row['city']); ?></td> 
                    <td><?php echo $this->post_cycle_model->getbrandname($row['brand_id']); ?></td> 
                     <td><?php echo $this->post_cycle_model->getmodelname($row['model']); ?></td>
                    <td><?php echo $row['cycle_type']; ?></td>
                    <td>
					    <?php if ($row['cycle_pic'] != '') { ?>
                            <img src="<?php echo site_url('upload/post_cycle');?>/<?php echo $row['cycle_pic']; ?>" width="100" />
                        <?php } ?>
					   
					</td>
                    <td><a href="<?php echo site_url('admins/post_cycle/edit');?>/<?php echo $row['post_cycle_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                    <a class="hapus" href="<?php echo site_url('admins/post_cycle/remove');?>/<?php echo $row['post_cycle_id']; ?>"><i class="fa fa-remove"></i></a>
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
<script>
$(document).ready(function() {
$('.hapus').click(function() {
return confirm("Are you sure you want to delete?");
});
});

$(function() {
$('[data-toggle="tooltip"]').tooltip()
})
</script>