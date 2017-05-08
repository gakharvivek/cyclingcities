<?php  $this->load->view('header');  ?>

<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Contact List</h3>
<!--                  <h4><a href="<?php echo base_url();?>contactus/add"> Add Contact </a></h4>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Cycle Type</th>
                        <th>Purchase Year</th>
                        <th>Additional Information</th>
                        <th>Cycle Pictures</th>
                        
<!--                    <th>Action</th>-->
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($mycycle)){
                        foreach ($mycycle as $row){ ?>
                      <?php // echo '<pre>'; print_r($row); ?>
                      <tr>
                        <td> <?php echo $this->mycycle_model->getbrandname($row['brand_id']); ?></td>
                        <td> <?php echo $this->mycycle_model->getmodelname($row['model_id']); ?></td>
                        <td><?php echo $row['cycle_type']; ?></td>
                        <td><?php echo $row['purchase_year']; ?></td>
                        <td><?php echo $row['add_info']; ?></td>
                        <td><?php echo $row['cycle_pics']; ?></td>
                      
<!--                        <td><a href="<?php echo base_url();?>contactus/edit/<?php //echo $row['contact_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="<?php echo base_url();?>contactus/remove/<?php //echo $row['contact_id']; ?>"><i class="fa fa-remove"></i></a>
                        </td>-->
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
<?php  $this->load->view('footer');  ?>