<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Intern List</h3>
                  <h4><a href="<?php echo site_url('admins/intern/add');?>"> Add Intern </a></h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                       <th>Partner Name</th>
                       <th>Department</th>
                       <th>Pic</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>
                      <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['dept']; ?></td>
                        <td>
						   <?if($row['pic']!='')
							 {?>
							   <img src="<?php echo site_url('upload/intern'); ?>/<?php echo $row['pic']; ?>" alt=""  width="100"/>
						   <?}?>
						</td>
                        <td><a href="<?php echo site_url('admins/intern/edit');?>/<?php echo $row['intern_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="<?php echo site_url('admins/intern/remove');?>/<?php echo $row['intern_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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