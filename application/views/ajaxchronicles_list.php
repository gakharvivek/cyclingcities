 <?if($results!='')
	{
		foreach ($results as $row)
		{?>
			<div class="col-md-4 col-sm-4">
            	<div class="citybox citybox_min_">
                	<div class="cityimg">
					   <a href="<?php echo site_url('chronicles/chronicles_detail');?>/<?php echo $row->chronicles_id ?>"> 
					     <? if($row->chronicles_image!='')
							{
								$chk = file_exists(FCPATH.'/upload/chronicles/'.$row->chronicles_image);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $row->chronicles_image; ?>" alt="" />
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
					   </a>
                        <span class="social">
							<a href="#" class="fa fa-share one"></a> 
							<!-- <a href="#" class="fa fa-whatsapp two"></a>  -->
							<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F870798359712751&amp;src=sdkpreparse" target="_blank"  class="fa fa-facebook three"></a>
							<a href="https://twitter.com" target="_blank" class="fa fa-twitter four"></a>
							<a href="https://plus.google.com" target="_blank" class="fa fa-google-plus five"></a>
						</span>
                    </div>
                    <div class="citytext">
                    	<span class="cityttl"><span class="redcolor"><?php echo $this->chronicles_front_model->getcityById($row->city); ?>,</span> <?php echo $this->chronicles_front_model->getstateById($row->state); ?></span>
                        <p>
                        	<?php
                        	$string = $row->chronicles_desc;
                        	$string = strip_tags($string);
                        	if (strlen($string) > 500) {
                        		// truncate string
                        		$stringCut = substr($string, 0, 500);
                        		// make sure it ends in a word so assassinate doesn't become ass...
                        		$read_more = '<a href="chronicles/chronicles_detail/'.$row->chronicles_id.'">Read More</a>';
                        		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....'." ".$read_more;
                        	}
                        		echo $string;
                        	?></p>
                    </div>
                    <div class="navecity">
                    	<p><?php echo $row->story_of; ?></p>
                        <!-- <span class="linkbox"><span class="linecount">15</span></span>
						<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/870798359712751" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div> -->
                    </div>
                </div>
            </div>
		<?}
	}
	else
	{?>
	   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no Chronicles.</div>
  <?}?>