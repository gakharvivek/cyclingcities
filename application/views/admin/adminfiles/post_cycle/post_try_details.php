<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Posted Try Cycle Details </div>
        <div class="box-body with-border">
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/post_cycle/changetrycyclestatus'); ?>" method="post">

			    <table  border="0" cellpadding="5" cellspacing="1" width="100%" class="tblDisplay widthPc">
							<tr class="odd">
								<td class="width130" valign="top">Name </td>
								<td> 
									<?php if(count($this->post_cycle_model->getusername($result[0]['user_id'])))
											{
											   print_r($this->post_cycle_model->getusername($result[0]['user_id'])); 
											}
										 ?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Brand </td>
								<td> 
									<?php if(count($this->post_cycle_model->getbrandname($result[0]['brand'])))
											{
											  echo $this->post_cycle_model->getbrandname($result[0]['brand']);
											}
										 ?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Model </td>
								<td> 
									<?php if(count($this->post_cycle_model->getmodelname($result[0]['model'])))
											{
											   echo($this->post_cycle_model->getmodelname($result[0]['model'])); 
											}
										 ?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Purchase year </td>
								<td> 
									<?=$result[0]['purchase_year']?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Price </td>
								<td> 
									<?=$result[0]['rent_price']?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Frame Size </td>
								<td> 
									<?=$result[0]['frame_size']?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Accessories </td>
								<td> 
									<?=$result[0]['accessories']?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">information </td>
								<td> 
									<?=$result[0]['information']?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Posted Date </td>
								<td> 
									<?=date('d-m-Y',strtotime($result[0]['post_date']))?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Cycle Pic </td>
								<td> 
									<?php if ($result[0]['img2'] != '') { ?>
									  <img src="<?php echo site_url('upload/post_cycle');?>/<?php echo $result[0]['img2']; ?>" width="100" />
								   <?php } ?>
								</td>
							</tr>

							<tr class="odd">
								<td class="width130" valign="top">Status </td>
								<td> 
									<?if($result[0]['active']==0)
									  {?>
										  Pending
									<?}?>

									<?if($result[0]['active']==1)
									  {?>
										  Approved
									<?}?>

									<?if($result[0]['active']==2)
									  {?>
										  Rejected
									<?}?>
								</td>
							</tr>
						</table>

                <div class="">
                    <input type="hidden" name="id"  value="<?php echo $result[0]['id'] ?>"/>
					<?if($result[0]['active']==0)
					  {?>
						  <input type="submit" name="btn_approve" value="Approve" class="btn btn-group btn-primary"> <input type="submit" name="btn_reject" value="Reject" class="btn btn-group btn-primary">
						  <a href="<?php echo site_url('admins/post_cycle/try_list');?>" class="btn btn-group btn-primary">Cancel</a>
					<?}?>
                </div>
            </form>
        </div>
    </div>
</div>