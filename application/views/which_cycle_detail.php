<script>
  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=870798359712751";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  $().ready(function() {
		$("#formquotation").validate();
	});
</script>
<div class="comingsoonpage martop64">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
    	 <h1><?php echo $this->which_cycle_sub_model->getmodelname($which_cycle_sub['model_id']); ?></h1>    
	  </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="accessoriespage">
           <div class="col-md-6 col-sm-6">
            <div class="produdetailbox">
				<!-- <div class="productleftside">
					<ul>
						<li><img src="<?=site_url('assets/images/img_thumb.jpg')?>" alt=""/></li>
						<li><img src="<?=site_url('assets/images/img_thumb.jpg')?>" alt=""/></li>
						<li><img src="<?=site_url('assets/images/img_thumb.jpg')?>" alt=""/></li>
						<li><img src="<?=site_url('assets/images/img_thumb.jpg')?>" alt=""/></li>
					</ul>
				</div> -->
				<div class="productdtl">
					   <img src="<?=site_url('upload/images')?>/<?php echo $which_cycle_sub['img1']; ?>" alt="" class="img-responsive"/>
					   <div class="buttonbox">
						<!-- <a href="#"><img src="<?=site_url('assets/images/gray_dot.png')?>"/></a>
						<a href="#"><img src="<?=site_url('assets/images/white_dot.png')?>"/></a>
						<a href="#"><img src="<?=site_url('assets/images/blue_dot.png')?>"/></a>
						<a href="#"><img src="<?=site_url('assets/images/orange_dot.png')?>"/></a>
						<a href="#"><img src="<?=site_url('assets/images/red_button.png')?>"/></a> -->
						<?php echo $which_cycle_sub['colors']; ?>
					   </div>
                </div>
                <div class="clear"></div>
            </div>    
            <div class="pricebox marbtm20">Rs. <span class="redcolor"><?php echo $which_cycle_sub['price']; ?>/-</span></div>
            <div class="postbybox" style="margin:30px 0px;">
    	       <h2 class="text-left fnt16 uppercase">Additional <span class="redcolor">Information</span></h2>
               <p class="fnt12"><?php echo $which_cycle_sub['m_desc']; ?></p>
               <div class="clear"></div>
				<div>
					<div class="whichcycyebuttonarea">
					    <? if($this->user_fm->loggedin() == FALSE)
							 {?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModallogin"><span>GET</span> QUOTATIONS</a>
						   <?}
							else
							 {?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModalgetquotation"><span>GET</span> QUOTATIONS</a>
						   <?}?>

						 <? if($this->user_fm->loggedin() == FALSE)
							 {?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModallogin"><span>TRY</span> CYCLE</a>
						   <?}
							else
							 {?>
								<a href="<?php echo site_url('your_cycle/try_cyclelist'); ?>" class="lightgray"  ><span>TRY</span> CYCLE</a>
						   <?}?>

						   <? if($this->user_fm->loggedin() == FALSE)
							 {?>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#myModallogin"><span>BUY</span> USED CYCLE</a>
						   <?}
							else
							 {?>
								<a href="<?php echo site_url('your_cycle/buy_usedcycle'); ?>"><span>BUY</span> USED CYCLE</a>
						   <?}?>
					</div>
				</div>
			</div>
		   </div>
		  <div class="col-md-5 col-sm-6 col-md-offset-1">
			  <?if(isset($features['rating']))
				 {?>
				   <div class="ratingstar">
				      <!-- <img src="<?=site_url('assets/images/rating_star.png')?>" alt=""/> -->
				     <?
					   $starNumber=$features['rating'];
					   //  echo $starNumber;exit;
						  for($x=1;$x<=$starNumber;$x++) { ?>
							  <img src="<?php echo site_url('upload/images/red-star.png')?>" />
						 <?php }
						  if (strpos($starNumber,'.')) { ?>
							  <img src="<?php echo site_url('upload/images/red-star01.png')?>" />
						 <?php     $x++;
						  }
						  while ($x<=5) { ?>
							 <img src="<?php echo site_url('upload/images/red-star02.png')?>" />
						   <?php   $x++;
						  }?>
				   </div>
			   <?}?>
			
			<div class="detailtext fntcentury">
				<span><strong>BRAND</strong> <?php echo $this->which_cycle_sub_model->getbrandname($which_cycle_sub['brand_id']); ?> </span>
				<span><strong>MODEL</strong> <?php echo $this->which_cycle_sub_model->getmodelname($which_cycle_sub['model_id']); ?>   </span>
				<span><strong class="blackfnt">CYCLE TYPE</strong><?php echo $which_cycle_sub['cycle_type']; ?> </span>
				<span><strong class="blackfnt">GENDER</strong> <?if(isset($features['gender']))
				 {?><?php echo $features['gender']; ?><?}?>  </span>
				<span><strong class="blackfnt">FRAME SIZE</strong> <?if(isset($features['framesize']))
				 {?><?php echo $features['framesize']; ?><?}?> </span>
				<span><strong class="blackfnt">FRAME BULD</strong> <?if(isset($features['framebuild']))
				 {?><?php echo $features['framebuild']; ?><?}?> </span>
				<span><strong class="blackfnt">TRANSMISION</strong> <?if(isset($features['transmission']))
				 {?><?php echo $features['transmission']; ?><?}?> </span>
				<span><strong class="blackfnt">NO. OF GEARS</strong> <?if(isset($features['noof_gear']))
				 {?><?php echo $features['noof_gear']; ?><?}?></span>
				<span><strong class="blackfnt">SHIFFER TYPE</strong> <?if(isset($features['shiftertype']))
				 {?><?php echo $features['shiftertype']; ?><?}?></span>
				<span><strong class="blackfnt">FRONT BRAKERS</strong> <?if(isset($features['frontbreak']))
				 {?><?php echo $features['frontbreak']; ?><?}?></span>
				<span><strong class="blackfnt">REAR BRAKERS</strong> <?if(isset($features['rearbreak']))
				 {?><?php echo $features['rearbreak']; ?><?}?></span>
				<span><strong class="blackfnt">SUSPENSION</strong> <?if(isset($features['suspension']))
				 {?><?php echo $features['suspension']; ?><?}?></span>
				<span><strong class="blackfnt">FRONT WHEEEL SIZE </strong> <?if(isset($features['front_wheel_size']))
				 {?><?php echo $features['front_wheel_size']; ?><?}?></span>
				<span><strong class="blackfnt">REAR WHEEEL SIZE  </strong> <?if(isset($features['rear_wheel_size']))
				 {?><?php echo $features['rear_wheel_size']; ?><?}?></span>
				<span><strong class="blackfnt">WEIGHT  </strong> <?if(isset($features['weight']))
				 {?><?php echo $features['weight']; ?><?}?></span> 
			</div>
			<!-- <div class="compare"> <input id="checkbox2" type="checkbox" name="checkbox" value="2"><label for="checkbox2">SELECT TO COMPARE</label></div> -->
		  </div>	
        </div>
      </div>
    </div>
	<div class="overviewmain">
		<div class="row">
			<div class="col-md-12">
				<h2 style="padding-bottom:20px;">0 <strong>Rerview</strong>
				<!-- <span class="blackrating"><span>GIVE YOUR RATING</span><img src="<?=site_url('assets/images/ratingstar_black.png')?>"/></span> -->
				</h2>
				<div class="reviewtext">
				 <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#https://developers.facebook.com/docs/plugins/870798359712751" data-width="500" data-numposts="5"></div>
				<!-- <ul>
					<li>
						<span class="reviewimg"><img src="<?=site_url('assets/images/gohst_img.jpg')?>" alt=""/></span>
						<span class="reviewtextbox">
							<h3>Ashish Prajapati <span><img src="<?=site_url('assets/images/smallrating.png')?>"/></span></h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
							<a href="#" class="editpencil"></a>
						</span>
					</li>
					<li>
						<span class="reviewimg"><img src="<?=site_url('assets/images/gohst_img.jpg')?>" alt=""/></span>
						<span class="reviewtextbox">
							<h3>Ashish Prajapati <span><img src="<?=site_url('assets/images/smallrating.png')?>"/></span></h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
							<a href="#" class="editpencil"></a>
						</span>
					</li>
					<li>
						<span class="reviewimg"><img src="<?=site_url('assets/images/gohst_img.jpg')?>" alt=""/></span>
						<span class="reviewtextbox">
							<h3>Ashish Prajapati <span><img src="<?=site_url('assets/images/smallrating.png')?>"/></span></h3>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
							<a href="#" class="editpencil"></a>
						</span>
					</li>
				</ul> -->
			   </div>
			</div>
		</div>
	</div>
  </div>
</div>



<!-- Modal -->
<div id="myModalgetquotation" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width:900px;">

    <!-- Modal content-->
	<?php echo form_open('your_cycle/sendquotation','name="formquotation" id="formquotation" enctype="multipart/form-data"') ?>
		<div class="modal-content">
		  <div class="modal-body buypopup padtopbtmzero" >
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		  <div class="col-md-6 col-sm-6 whitecolor">
		  
		  <h2 class="embosbrdr"><strong class="redcolor">Model</strong> <?php echo $this->which_cycle_sub_model->getbrandname($which_cycle_sub['brand_id']); ?> - <?php echo $this->which_cycle_sub_model->getmodelname($which_cycle_sub['model_id']); ?> </h2>
		  <div class="buyimgbox">
			<img src="<?=site_url('upload/images')?>/<?php echo $which_cycle_sub['img1']; ?>" alt="" class="img-responsive"/>
		  </div>
		  </div>
		  <div class="col-md-6 col-sm-6">
			<div class="wantbuy">
				<h2>WANT <strong>TO BUY</strong></h2>
				<div class="popupcontent fntcentury mycycleii" style="margin-top:56px;">
			<ul>
			     <li>
					how do you want to get noticed for Quotes
					<div class="clear"></div>
					  <input type="radio" name="sms" value="SMS" class="pop-form required"  />
                      <label class="pop-form">SMS</label> 
					  <input type="radio" name="sms" value="EMAIL" class="pop-form required"/>
					  <label class="pop-form">EMAIL</label> 
					  <input type="radio" name="sms" value="BOTH" class="pop-form required" checked/>
					  <label class="pop-form">BOTH</label> 
					<div class="clear"></div>
				</li>    
				 <li>
					<span class="ttle1">COLOR</span>
					<span class="ttltext">
					    <select name="color" id="color" class="myval required">
						  <option value="">Select</option>
						  <option value="white">WHITE</option>
						  <option value="black">BLACK</option>
						</select>
					</span>
					<div class="clear"></div>
				</li> 
				<li>
					<span class="ttle1">FRAME SIZE</span>
					<span class="ttltext">
					    <select name="framesize" id="framesize" class="myval required">
						  <option value="26">26"</option>
						  <option value="28">28"</option>
						  <option value="30">30"</option>
						</select>
					</span>
					<div class="clear"></div>
				</li>         
				<li>
					<span class="ttltext terms">
					 <input id="agree" type="radio" name="agree" class="required"><label for="agree">I AGREE TO TERMS & CONDITIONS</label>
				   </span><div class="clear"></div>
				</li>
				<li style="margin:0px 0px 0px; padding:13px 0px 0px!important; background:none;">
				<input type="submit" value="GET  QUOTATIONS" class="btnaddcycle"/>
				</li>
			</ul>
		   </div>
			</div>
		  </div>
		 </div>
		  </div>
		  
		</div>
	<?php echo form_close(); ?>

  </div>
</div>
<!----- thanks you message popup ----->
<div id="myModal2" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg fntcentury" style="max-width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body thankyouumessge " >
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
      <div class="row">
     	<div class="col-md-12">
        <h1>THANKS <strong>YOU</strong></h1>
        <h2><strong>FOR</strong> SHOWING INTEREST IN CYCLE MODEL NAME</h2>
        <p>You will be notified on your on your phone number as you start receiving the quotes for this model and you will received all the quotes within 48 hours to make an easy choice.</p>
        </div>
     
     </div>
      </div>
      
    </div>

  </div>
</div>