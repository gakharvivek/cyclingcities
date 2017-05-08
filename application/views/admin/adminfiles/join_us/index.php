<div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Joining Request List</h3>
<!--                  <h4><a href="<?php //echo base_url();?>join_us"> Add Accessories </a></h4>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                       
                        <th>Type</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Apply For</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <!--<th>What's App</th>-->
                        <th>Occupation</th>
                        <!--<th>Interest Area</th>-->
                        <th>why join us?</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($join_us)){
                        foreach ($join_us as $row){ ?>
                      <tr>
                        <td><?php echo $row['user_type']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['apply_for']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <!--<td><?php //echo $row['whatsapp']; ?></td>-->
                        <td><?php echo $row['occu']; ?></td>
                        <!--<td><?php //echo $row['interest_area']; ?></td>-->
                        <td><?php echo $row['why_cc']; ?></td>
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