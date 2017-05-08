<?php //print_r($which_cycle_page); exit;
    if($results!='')
	{
		foreach ($results as $row)
		 {?>
		    <div class="col-md-4 col-sm-6">
				<div class="asceboxmain">
					<div class="asceimg">
					  <? if($row->img2!='')
							{
								$chk = file_exists(FCPATH.'/upload/try_cycle/'.$row->img2);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/try_cycle'); ?>/<?php echo $row->img2; ?>" alt="" />
							  <?}
								else
								{?>
									<img class="img-responsive" src="<?php echo site_url('assets/images/noimagefound.jpg'); ?>" alt="" />
						      <?}
							}
						  else
						    {?>
								<img class="img-responsive" src="<?php echo site_url('assets/images/noimagefound.jpg'); ?>" alt="" />
						  <?}?>
					</div>
					<div class="ascelisttext">
					<ul>
						<li><span class="redcolor bold">brand</span> <span class=""><?php echo $this->try_cycle_list_model->gettrybrandname($row->brand); ?></span></li>
						<li><span class="redcolor bold">Model</span> <span class=""><?php echo $this->try_cycle_list_model->gettrymodelname($row->model); ?></span></li>
						<li><span class="redcolor bold">PRICE</span> <span class=""><?php echo $row->rent_price; ?>/-</span></li>
						<li><a href="<? echo site_url('your_cycle/try_cycledetail');?>/<?php echo $row->id; ?>/<?php echo $row->model; ?>">More Detail</a></li>
					</ul>
						</div>
				</div>
			</div>
		<?} 
	}
	else
	{?>
	   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no Items.</div>
	<?}?>