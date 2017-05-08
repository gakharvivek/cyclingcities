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
<style type="text/css">
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
}
</style>

<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
<div class="accessoriespage">
<div class="col-md-6 col-sm-6">
    <? if($buyusedcycle_sub['img2']!='')
		{
			$chk = file_exists(FCPATH.'/upload/buysell/'.$buyusedcycle_sub['img2']);
			if($chk == 1)
			{?>
				<img class="img-responsive" src="<?php echo site_url('upload/buysell'); ?>/<?php echo $buyusedcycle_sub['img2']; ?>" alt="" />
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
    <div class="pricebox">Rs. <span class="redcolor"><?php echo $buyusedcycle_sub['selling_price']; ?>/-</span></div>
</div>
<div class="col-md-5 col-sm-6 col-md-offset-1">
<a href="<? echo site_url('your_cycle/buy_usedcycle');?>" class="redcolor pull-right">Back</a>
	<div class="detailtext fntcentury">
    	<span><strong>BRAND</strong> <?php echo $this->buyusedcycle_sub_model->getbrandname($buyusedcycle_sub['brand_id']); ?>  </span>
        <span><strong>MODEL</strong> <?php echo $this->buyusedcycle_sub_model->getmodelname($buyusedcycle_sub['model_id']); ?>  </span>
        <span><strong class="blackfnt">ACCESSORIES</strong><?php echo $buyusedcycle_sub['accessories']; ?> </span>
        <span><strong class="blackfnt">PURCHASE YEAR</strong> <?php echo $buyusedcycle_sub['purchase_year']; ?> </span>        
    </div>
</div>	
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6">
	<h2 class="text-left fnt16 uppercase">Additional <span class="redcolor">Information</span></h2>
    <p class="fnt12"><?php echo $buyusedcycle_sub['information']; ?></p>
</div>
<div class="col-md-5  col-md-offset-1 col-sm-6">
<h2 class="fnt20 text-left"><span class="redcolor"><strong>POST</strong></span> BY</h2>
<div class="postboxmain">
<div class="imgboxsmall"><img src="<? echo site_url('assets/images/gohst_img.jpg');?>" alt=""/></div>
<div class="posttext fntcentury">
<?php echo $buyusedcycle_sub['firstname']; ?> <?php echo $buyusedcycle_sub['lastname']; ?><br/>
<?php echo $buyusedcycle_sub['email'];?><br/>
 <?php echo $buyusedcycle_sub['phone'];?> <span class="redcor"><? if($buyusedcycle_sub['whatsapp']!=''){?>AVAILABLE ON WHAT'S APP<?}?></span>
</div>

</div>

</div>
</div>
<div class="row">
	<div class="col-md-12">
    	<div class="bycyclebtn fntcentury"> <a href="<?php echo site_url('your_cycle/where_to_buy'); ?>"><strong>BUY</strong> NEW CYCLE</a> <a href="<?php echo site_url('your_cycle/try_cyclelist'); ?>" class="ver_line darkred"><strong>TRY</strong> CYCLE</a></div>
    </div>
</div>
<div class="overviewmain">
	<div class="row">
    	<div class="col-md-12">
        	<h2>0 <strong>Rerview</strong></h2>
            <div class="reviewtext">
			<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#https://developers.facebook.com/docs/plugins/870798359712751" data-width="500" data-numposts="5"></div>
           	<!-- <ul>
            	<li>
                	<span class="reviewimg"><img src="<? echo site_url('assets/images/gohst_img.jpg');?>" alt=""/></span>
                    <span class="reviewtextbox">
                    	<h3>Ashish Prajapati</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
                        <a href="#" class="editpencil"></a>
                    </span>
                </li>
                <li>
                	<span class="reviewimg"><img src="<? echo site_url('assets/images/gohst_img.jpg');?>" alt=""/></span>
                    <span class="reviewtextbox">
                    	<h3>Ashish Prajapati</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quiscidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, q nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex esequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore .....</p>
                        <a href="#" class="editpencil"></a>
                    </span>
                </li>
                <li>
                	<span class="reviewimg"><img src="<? echo site_url('assets/images/gohst_img.jpg');?>" alt=""/></span>
                    <span class="reviewtextbox">
                    	<h3>Ashish Prajapati</h3>
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
<div id="myModalform" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width:900px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body buypopup padtopbtmzero" >
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
      <div class="row">
      <div class="col-md-6 col-sm-6 whitecolor">
      
      <h2 class="embosbrdr"><strong class="redcolor">Model</strong> Lorem Ispum </h2>
      <div class="buyimgbox">
      	<img src="images/popimg.jpg" alt="" class="img-responsive"/>
      </div>
      </div>
      <div class="col-md-6 col-sm-6">
      	<div class="wantbuy">
        	<h2>WANT <strong>TO BUY</strong></h2>
            <div class="popupcontent fntcentury mycycleii">
       	<ul>
        	 <li>
            	<span class="ttle1">City</span>
                <span class="ttltext"><select class="myval"><option>Select</option></select></span>
                <div class="clear"></div>
            </li>            
            <li>
            	<span class="ttle1 wid100 padttl">Mobile No. &nbsp;&nbsp; 9898123456 &nbsp;&nbsp;<a href="#" class="redcolor">SEND OTP CODE</a></span>
                 
                </span>
                <div class="clear"></div>
            </li>
            <li>
            	<span class="ttle1">Purchase Year</span>
                <span class="ttltext"><select class="myval"><option>Select</option></select></span>
                <div class="clear"></div>
            </li>
            <li>
            	<span class="ttle1">Enter OTP</span>
                <span class="ttltext terms">
                 <input id="checkbox2" type="checkbox" name="checkbox" value="2"><label for="checkbox2">I AGREE TO 
TERMS & CONDITIONS</label>
               </span>
<div class="clear"></div>
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

  </div>
</div>

<!----- thanks you message popup ----->
<div id="myModalthankou" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
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