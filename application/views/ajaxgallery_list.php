 <?if($results!='')
	{
		foreach ($results as $row)
		{?>
		    <div class="col-md-4 col-sm-4">
            	<div class="citybox">
                	<div class="cityimg">
                    	<? if($row->gallery_img!='')
							{
								$chk = file_exists(FCPATH.'/upload/gallery/'.$row->gallery_img);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/gallery'); ?>/<?php echo $row->gallery_img; ?>" alt="" />
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
                        <span class="social">
							<a href="<?php echo $row->gallery_email; ?>" target="_blank" class="fa fa-share one"></a> 
							<!-- <a href="#" class="fa fa-whatsapp two"></a>  -->
							<a class="fa fa-facebook three" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F870798359712751&amp;src=sdkpreparse"></a>
							<a href="<?php echo $row->gallery_twit; ?>" target="_blank" class="fa fa-twitter four"></a>
							<a href="<?php echo $row->gallery_gplus; ?>" target="_blank" class="fa fa-google-plus five"></a>
						</span>
                    </div>
                    <div class="citytext">
                    	<span class="cityttl"><span class="redcolor fnt18"> <?php echo $row->gallery_title; ?></span></span>
                        <p><?php echo $row->gallery_desc; ?></p>
                    </div>
                    <div class="navecity">
					    <?php $id = $row->gallery_id; ?>

						<a href="#" data-id="<?php echo $id ?>" data-name="<?php echo $id ?>" data-toggle="modal" data-target="#mygallery<?php echo $id ?>" cmyrideslass="modalLink">
							MORE <strong>INFO</strong>
						</a>
                    	
                        <!-- <span class="linkbox"><span class="linecount">15</span></span> -->
                    </div>
                </div>
            </div>

			
		    <div id="mygallery<?php echo $row->gallery_id; ?>" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-wide-which  gallery-bg border-gallery"> 

					<!-- Modal content-->
					<div class="modal-content ">
						<div class="modal-body gallery-bg padd0 clearfix">
							<form action="<?php echo base_url(); ?>gallery" method="post" enctype="multipart/form-data">
								<div>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="col-md-6 padd0">
									<? if($row->gallery_img!='')
										{
											$chk = file_exists(FCPATH.'/upload/gallery/'.$row->gallery_img);
											if($chk == 1)
											{?>
												<img class="img-responsive" src="<?php echo site_url('upload/gallery'); ?>/<?php echo $row->gallery_img; ?>" alt="" />
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
									<div class="socialm pull-right ">
										<span class="social">
											<a href="<?php echo $row->gallery_email; ?>" target="_blank" class="fa fa-share one"></a> 
											<!-- <a href="#" class="fa fa-whatsapp two"></a>  -->
											<a class="fa fa-facebook three" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F870798359712751&amp;src=sdkpreparse"></a>
											<a href="<?php echo $row->gallery_twit; ?>" target="_blank" class="fa fa-twitter four"></a>
											<a href="<?php echo $row->gallery_gplus; ?>" target="_blank" class="fa fa-google-plus five"></a>
										</span>
									</div>
								</div>
								<div class="col-md-6 text-white gallery-info1 margint40">
								  <h3><?php echo $row->gallery_title; ?></h3>
									<div><?php echo $row->gallery_desc; ?></div>
									<div class="margint10 gallery-info2">
										<div class="pull-left"><span class="fontbold"> Views </span>
										  <a href="http://www.hitwebcounter.com" target="_blank">
											<img src="http://hitwebcounter.com/counter/counter.php?page=6421077&style=0001&nbdigits=5&type=ip&initCount=0" title="" Alt=""   border="0" >
										  </a><br />
										</div>
										<div class="pull-right">
											<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/870798359712751" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?}
	}
	else
	{?>
	   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no Chronicles.</div>
  <?}?>