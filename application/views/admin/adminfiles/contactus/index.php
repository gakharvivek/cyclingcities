<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Contact List</h3>
<!--                  <h4><a href="<?php //echo base_url();?>contactus/add"> Add Contact </a></h4>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Inquiry</th>
<!--                    <th>Action</th>-->
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>
                      <?php // echo '<pre>'; print_r($row); ?>
                      <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phn']; ?></td>
                       <td> <?php echo $this->contactus_model->getcountryById($row['country']); ?></td>
                       <td> <?php echo $this->contactus_model->getstateById($row['state']); ?></td>
                       <td> <?php echo $this->contactus_model->getcityById($row['city']); ?></td>
                       
                        <td><?php echo $row['inq']; ?></td>
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