<script>
   $().ready(function() {
			$("#offerform").validate();
		});
</script>
<div class="stillnotsure"><a href="" onClick="seefull();"><img src="<? echo site_url('assets/images/notsure.png');?>" alt=""/></a></div>
<div class="row fntcentury">
	 <?if($results!='')
		{
			$i=0;
			foreach ($results as $row)
			{?>
				<div class="col-md-4 col-sm-6">
					<div class="asceboxmain asceboxmain_min_height">
						<div class="asceimg">
						   <? if($row->shop_img!='')
							{
								$chk = file_exists(FCPATH.'/upload/shop_img/'.$row->shop_img);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/shop_img'); ?>/<?php echo $row->shop_img; ?>" alt="" />
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
						<div class="ascelisttext wheretobuy">
						<strong class="redcolor fnt14"><?=$row->shop_name;?></strong>
						<div class="fnt12 uppercase"><?=$row->owner;?></div>
						<div class="fnt12"><?=$row->phone1;?></div>
						<div class="fnt11"><?=$row->address;?></div>
						<div class="fnt11"><?=$row->website;?></div>
						<div><?=$row->email;?></div>
						<div><strong>BRANDS</strong> <?=$row->brand;?></div>
						<div><strong>PRICE RANGE</strong> <?=$row->price_low;?>  - <?=$row->price_high;?></div>
						<div><span class="redcolor">OPENING HOURS</span> <?=$row->time;?></div>
						<div class="hrline"></div>
						<div><span class="redcolor">ONLINE ORDER</span>  <?=$row->o_order;?></div>
						<div><span class="redcolor">HOME DELIVERY</span>  <?=$row->h_delivery;?></div>
						<div><span class="redcolor">SERVICE/REPAIRS</span>  <?=$row->service_repair;?></div>
						<div class="hrline"></div>
						<a href="#" data-toggle="modal" data-target="#myModalwheretobuy<?=$i?>"><span class="redcolor">CHECK</span> <strong>OFFERS &amp;  DISCOUNTS</strong></a>
						<div class="hrline"></div>
							</div>
					</div>
				</div>
			<?$i++;}
		}
		else
		{?>
		   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no Shop.</div>
	  <?}?>
</div>



	<?
	  $i=0;
	  foreach ($results as $list) 
	   {?>
	        <script>
			   $().ready(function() {
				        var shop_id="<?=$list->shop_id;?>";
						$("#offerform"+shop_id).validate();
					});
			</script>
			<div id="myModalwheretobuy<?=$i?>" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
			  <div class="modal-dialog modal-lg"  style="max-width:950px;">

				<!-- Modal content-->

				<?php echo form_open('your_cycle/submitshopinquiry','name="offerform" id="offerform'.$list->shop_id.'" enctype="multipart/form-data"');?>
					<div class="modal-content">  
					  <div class="modal-body padbtm0 loginpopup gallerypopup wheretobuybox">
					  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
					  <div class="row">
					  <div class="col-md-12">
					  <div class="imagepopbox">
						<ul>
							<? if($list->shop_offer!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer" type="checkbox" name="checkboxoffer[]" value="<?php echo $list->shop_offer;?>"><label for="checkboxoffer">&nbsp;</label> </span>
								  </li>
							  <?}?>

							<? if($list->shop_offer1!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer1;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer1" name="checkboxoffer[]" type="checkbox" value="<?php echo $list->shop_offer1;?>"><label for="checkboxoffer1">&nbsp;</label> </span>
								  </li>
							  <?}?>
							
							<? if($list->shop_offer2!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer2;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer2" name="checkboxoffer[]" type="checkbox" value="<?php echo $list->shop_offer2;?>"><label for="checkboxoffer2">&nbsp;</label> </span>
								  </li>
							  <?}?>

							<? if($list->shop_offer3!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer3;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer3" name="checkboxoffer[]" type="checkbox" value="<?php echo $list->shop_offer3;?>"><label for="checkboxoffer3">&nbsp;</label> </span>
								  </li>
							  <?}?>

							<? if($list->shop_offer4!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer4;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer4" name="checkboxoffer[]" type="checkbox" value="<?php echo $list->shop_offer4;?>"><label for="checkboxoffer4">&nbsp;</label> </span>
								  </li>
							  <?}?>
							
							<? if($list->shop_offer5!='')
								{?>
								  <li>
									<img src="<?php echo site_url('upload/shop_img');?>/<?php echo $list->shop_offer5;?>" />
									<span class="chkboxbox"> <input id="checkboxoffer5" name="checkboxoffer[]" type="checkbox" value="<?php echo $list->shop_offer5;?>"><label for="checkboxoffer5">&nbsp;</label> </span>
								  </li>
							  <?}?>
						</ul>
					  </div>
					  <div class="wheretobuycnt">
					  <h1><?php echo $list->shop_name; ?></h1>
					  <p>Loremsum, dolsit, amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim .</p>
					  
					  <div class="emaiboxbox">
						<ul>
							<li></li>
							<li>
							   <input type="email" name="offeremail" id="offeremail" placeholder="xyz03@gmail.com" class="required"/>
							   <input type="hidden" name="shop_id" id="shop_id" value="<?php echo $list->shop_id;?>" class="required"/>
							</li>
							<li></li>
						</ul>
					  </div>
					  <p class="wheretiburcyce">By clicking "submit" you agree to our <br/>terms & conditions</p>
					  <span class="btnsubmitbox"><input type="submit" value="Submit" class="btnaddcycle"/></span>
					  </div>
					  </div>
					  
					   </div>
					  </div>
					  
					</div>
				</form>

			  </div>
			</div>
	 <?$i++;}?>
