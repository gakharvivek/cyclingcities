<?php  $this->load->view('header'); 
// echo '<pre>'; print_r($try_cycle); exit;
?>


            
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
                        <th>Purchase Year</th>
                        <th>Frame Size</th>
                        <th>Accessories</th>
                        <th>Rent Price</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Post Date</th>
                      
                        
<!--                    <th>Action</th>-->
                      </tr>
                    </thead>
        
                    <tbody>
                      <?php if(isset ($try_cycle)){
                        foreach ($try_cycle as $row){ ?>
                      <?php // echo '<pre>'; print_r($row); ?>
                      <tr>
                        <td> <?php echo $this->try_cycle_model->getbrandname($row['brand']); ?></td>
                        <td> <?php echo $this->try_cycle_model->getmodelname($row['model']); ?></td>
                        <td><?php echo $row['purchase_year']; ?></td>
                        <td><?php echo $row['frame_size']; ?></td>
                        <td><?php echo $row['accessories']; ?></td>
                        <td><?php echo $row['rent_price']; ?></td>
                        <td><?php echo $row['height']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['post_date']; ?></td>
<!--                        <td><?php //echo $row['sell_date']; ?></td>-->
                      
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