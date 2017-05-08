<?php  $this->load->view('header');  ?>

<div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">City List</h3>
                  <h4><a href="<?php echo base_url();?>City/add"> Add City </a></h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                       
                        <th>City Name</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>
                      <tr>
                        
                        <td><?php echo $row['city_name']; ?></td>
                        <td><?php echo $row['active']; ?></td>
                        
                        <td><a href="<?php echo base_url();?>City/edit/<?php echo $row['city_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="<?php echo base_url();?>City/remove/<?php echo $row['city_id']; ?>"><i class="fa fa-remove"></i></a>
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
<?php  $this->load->view('footer');  ?>