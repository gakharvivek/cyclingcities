<!-- =========== Home Content Area Strat =========== -->
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Know Your <span class="redcolor">Cycle</span></h1>
        <h2 class="caps"><span class="redcolor">Lot of factors</span> these days to choose from, and it's confusing. <br/>
			<span class="redcolor">Get Educated</span> by exploring all the possible features.</h2>
    </div>
  </div>
  <div class="row">
  	<div class="col-md-12">
    <div class="knowyourcycle">

	<? if (isset($accessories)) 
		{
			$i=1;
			foreach ($accessories as $row) 
			 {?>
				<div class="user head<?=$i?>">
				  <div class="userInfo">
					<div class="popic">
					    <?if($row['img1']!="")
							 {?>
								 <img src="<? echo site_url('upload/accessory');?>/<?=$row['img1']; ?>"/>
						   <?}?>
					   
					</div>
					<p><?=$row['name'];?> <br/> <a href="#" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#myModalaccessiories<?=$i?>" cmyrideslass="modalLink"><span id="know">KNOW MORE</span></a></p>
				  </div>
				</div>
		   <?$i++;}
        }?>

<? $cms1=$this->cms_fm->getcmsbyid(1);?>
<? $cms2=$this->cms_fm->getcmsbyid(2);?>
<? $cms3=$this->cms_fm->getcmsbyid(3);?>
<div class="typebike">
	<div class="mountainbike" style="margin-right:-15px;"><a class="showSingle" data-target="1">MOUNTAIN <span>BIKE</span></a></div>
    <div class="mountainbike2 showSingle" data-target="2"> <a class="showSingle" data-target="2">ROAD <span>BIKE</span></a></div>
    <div class="mountainbike showSingle" style="margin-left:-15px;" data-target="3"> <a class="showSingle" data-target="3">HYBRID <span>BIKE</span></a></div>
</div>
<div class="targetDiv grayboxpop" id="div1">
<span class="uparrowbox"><img src="<? echo site_url('assets/images/uparrow2.png');?>"/></span>
<img src="<? echo site_url('upload/cms');?>/<?=$cms1['image1'];?>"/>
<span class="fnt20 redcolor popttl2">Mountain <strong>BIKE</strong></span>
<p><?=$cms1['description'];?></p>

	
</div>
<div class="targetDiv grayboxpop" id="div2">
	<span class="uparrowbox" style="left:35%;"><img src="<? echo site_url('assets/images/uparrow2.png');?>"/></span>
<img src="<? echo site_url('upload/cms');?>/<?=$cms2['image1'];?>"/>
<span class="fnt20 redcolor popttl2">Road <strong>BIKE</strong></span>
<p><?=$cms2['description'];?></p>


</div>
<div class="targetDiv grayboxpop" id="div3">
<span class="uparrowbox" style="left:55%;"><img src="<? echo site_url('assets/images/uparrow2.png');?>"/></span>
<img src="<? echo site_url('upload/cms');?>/<?=$cms3['image1'];?>"/>
<span class="fnt20 redcolor popttl2">Hybrid <strong>BIKE</strong></span>
<p><?=$cms3['description'];?></p>


	
</div>



</div>
    </div>
  </div>
</div>

</div>

<?$i=1;
    foreach ($accessories as $know) {

        //  print_r($brands['logo']); 
        ?>
		<div id="myModalaccessiories<?=$i?>" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		  <div class="modal-dialog modal-lg"  style="max-width:850px;">

			<!-- Modal content-->
			<div class="modal-content">
			  
			  <div class="modal-body padbtm0 loginpopup knocyclepad">
			  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
			  <div class="row">
			  <div class="col-md-4 col-sm-4 know_cycle_img">
			    <? if($know['img1']!='')
					{?>
					   <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $know['img1']; ?>" class="img-responsive" />	
				  <?}
				   else
				    {?>
					   <img src="<? echo site_url('assets/images/image1.jpg');?>" class="img-responsive" />
				  <?}?>
			    <? if($know['img2']!='')
					{?>
					   <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $know['img2']; ?>" class="img-responsive" />	
				  <?}
				   else
				    {?>
					   <img src="<? echo site_url('assets/images/image1.jpg');?>" class="img-responsive" />
				  <?}?>
			    <? if($know['img3']!='')
					{?>
					   <img src="<?php echo site_url('upload/accessory'); ?>/<?php echo $know['img3']; ?>" class="img-responsive" />	
				  <?}
				   else
				    {?>
					   <img src="<? echo site_url('assets/images/image1.jpg');?>" class="img-responsive" />
				  <?}?>
			  </div>
			  <div class="col-md-8 col-sm-8">
			   <div class="popupcontent fntcentury mycycleii">
				<h1><?php echo $know['name']; ?></h1>
				 <p><?php echo $know['description']; ?></p>
			   </div>
			   </div>
			   </div>
			  </div>
			  
			</div>

		  </div>
		</div>
<?php $i++;} ?>