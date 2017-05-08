<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Posted Sell Cycle List</h3>
                  <!--<h4><a href="<?php// echo site_url('admins/post_cycle/add');?>"> Add Post Cycle </a></h4>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped dtable">
                    <thead>
                      <tr>
                         <th>Name</th>
                         <th>Brand</th>
                         <th>Model</th>
                         <th>Purchase year</th>
                         <th>Price</th>
<!--                         <th>City</th>-->
                         <th>Cycle Pic</th> 
						 <th>Status</th> 
						 <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset ($result)){
                        foreach ($result as $row){ ?>
                      <tr>
                
                    <td><?php if(count($this->post_cycle_model->getusername($row['user_id'])))
							{
						       print_r($this->post_cycle_model->getusername($row['user_id'])); 
							}
					     ?></td>

                    <td><?php if(count($this->post_cycle_model->getbrandname($row['brand_id'])))
							{
						      echo $this->post_cycle_model->getbrandname($row['brand_id']);
							}
					     ?>
					</td> 
                     <td><?php if(count($this->post_cycle_model->getmodelname($row['model_id'])))
							{
						       echo($this->post_cycle_model->getmodelname($row['model_id'])); 
							}
					     ?>
					</td>
                    <td><?php echo $row['purchase_year']; ?></td>
                    <td><?php echo $row['selling_price']; ?></td>
<!--                    <td><?php //echo $this->post_cycle_model->getcityname($row['city']); ?></td> -->
                    <td>
					   <?php if ($row['img2'] != '') { ?>
					      <img src="<?php echo site_url('upload/buysell');?>/<?php echo $row['img2']; ?>" width="100" />
					   <?php } ?>
					</td>

					<td>
						  <?if($row['active']==0)
						  {?>
							  Pending
						<?}?>

						<?if($row['active']==1)
						  {?>
							  Approved
						<?}?>

						<?if($row['active']==2)
						  {?>
							  Rejected
						<?}?>
					</td>

					<td>
					  <a href='<? echo site_url('admins/post_cycle/sell_cycle_detail');?>/<?=$row['id']?>' title='Detail'>Detail</a>
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