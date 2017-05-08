<?php  $this->load->view('header');  ?>

<div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Sub category List</h3>
                  <h4><a href="<?php echo base_url();?>Subcategory/add"> Add Sub Category </a></h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                       <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Sub Category Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>
                      <tr>
                        
                        <td><?php echo $row['cate_name']; ?></td>
                        <td><?php echo $row['cate_desc']; ?></td>
                        
                        <td><a href="<?php echo base_url();?>Category/edit/<?php echo $row['cate_id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="<?php echo base_url();?>Category/remove/<?php echo $row['cate_id']; ?>"><i class="fa fa-remove"></i></a>
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