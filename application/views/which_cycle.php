<!-- =========== Home Content Area Strat =========== -->
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>  Which  <span class="redcolor">Cycle </span>?</h1>
         <h2 class="caps"><span class="redcolor">Knowledgeable Enough?</span> Choose best cycle for comfort ride. <br/>
			<span class="redcolor">Get best quotations</span> for the model you finalize.</h2>
    </div>
  </div> 
  <div class="row">
  	<div class="col-md-12">
    	<div class="cyclebox">
        	<div class="boxmainbox redboxmain">
			    <? if($this->user_fm->loggedin() == FALSE)
		         {?>
					<a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin" class="showSingle">CHOOSE<br/>BY <span>TYPE</span></a>
               <?}
			    else
			     {?>
				    <a class="showSingle" data-target="1">CHOOSE<br/>BY <span>TYPE</span></a>
               <?}?>
            </div>
            <div class="boxmainbox blackboxmain" style="margin-left:-25px;">
			    <? if($this->user_fm->loggedin() == FALSE)
		         {?>
					<a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin" class="showSingle">CHOOSE<br/>BY <span>BRAND</span></a>
               <?}
			    else
			     {?>
				    <a class="showSingle" data-target="2">CHOOSE<br/>BY <span>BRAND</span></a>
               <?}?>
            	
            </div>
            <div class="boxmainbox redboxmain" style="margin-left:-25px;">
			    <? if($this->user_fm->loggedin() == FALSE)
		         {?>
					<a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin" class="showSingle">CHOOSE<br/>BY <span>PRICE</span></a>
               <?}
			    else
			     {?>
				    <a class="showSingle" data-target="3">CHOOSE<br/>BY <span>PRICE</span></a>
               <?}?>
            	
            </div>
        </div>
        <!---------------------------- pricebox------------------------------------>
        <div class="grayboxmainprice targetDiv" id="div3">
        <span class="spanuparrow"></span>
        <span class="bugetfnt"><strong>BUGET</strong><br/>CYCLES</span>
        	  <div id="slider-range"></div>
			  <input type="text" name="amount"  id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"> 
			  <input type="text" name="amount1"  id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
			  <? 
				 $this->load->model('which_cycle_type_model');
				 $range=$this->which_cycle_type_model->getallpricebyid();
				  $minprice=0;
				  if($range['minprice']!='')
				  {
					  $minprice=$range['minprice'];
				  }
				  $maxprice=$range['maxprice'];
			  ?>
			  <input type="hidden" name="minamount" id="minamount" value="<?=$minprice?>" >
			  <input type="hidden" name="maxamount1" id="maxamount1" value="<?=$maxprice?>">

			  <input type="button" value="Get Cycle" class="btn btn-default martop20" id="submit" name="submit" />
        </div>
        
        <!------------------------------- brandbox------------------------------------->
        <div class="brandbox targetDiv" id="div2">
        <span class="shadowuparrow"></span>
        	<ul class="brand_popover">
			    <?php
                        foreach ($brand as $brands) 
						 {?>
						  <li class="brdrleftnone">
							<a href="<?php echo site_url('your_cycle/which_cycle_brand'); ?>/<?php echo $brands['brand_id']; ?>">
							  <img src="<?php echo site_url('upload/logo');?>/<?php echo $brands['logo']; ?>" class="img-responsive " alt=""/></a> 
							  <? if($brands['brand_desc']!='')
									{?><span><?php echo $brands['brand_desc']; ?></span><?}?>
						  </li>
							  
                  <?php } ?>
            </ul>
            <div class="clear"></div>
        </div>
        
        <!------------------------------ type cyclyebox -------------------------------------->
        <div class="typecyclebox targetDiv" id="div1"  style="display:block;">
		<? $cms1=$this->cms_fm->getcmsbyid(1);?>
		<? $cms2=$this->cms_fm->getcmsbyid(2);?>
		<? $cms3=$this->cms_fm->getcmsbyid(3);?>
        <span class="shadowuparrow"></span>
        	<div>
            	<div class="col-md-4 col-sm-4 brdrright">
                	<div class="typeboxmain">
						<img src="<? echo site_url('upload/cms');?>/<?=$cms1['image1'];?>" alt="" class="img-responsive"/>
                        <div class="typecycleboxcnt">
                        	<a href="<?php echo site_url('your_cycle/whichcycletype/mountain');?>"><h3>MOUNTAIN <strong>BIKE</strong></h3></a>
                            <p><?=$cms1['description'];?></p>
                            <!-- <span class="fnt16"><a href="<? echo site_url('your_cycle/compare_cycle');?>"><strong>COMPARE</strong> YOUR CYCLE</a></span> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 brdrright">
                <div class="typeboxmain">
                    	<img src="<? echo site_url('upload/cms');?>/<?=$cms2['image1'];?>" alt="" class="img-responsive"/>
                        <div class="typecycleboxcnt">
                        	<a href="<?php echo site_url('your_cycle/whichcycletype/road');?>"><h3>ROAD <strong>BIKE</strong></h3></a>
                            <p><?=$cms2['description'];?></p>
                            <!-- <span class="fnt16"><a href="<? echo site_url('your_cycle/compare_cycle');?>"><strong>COMPARE</strong> YOUR CYCLE</a></span> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                <div class="typeboxmain">
                    	<img src="<? echo site_url('upload/cms');?>/<?=$cms3['image1'];?>" alt="" class="img-responsive"/>
                        <div class="typecycleboxcnt">
                        	<a href="<?php echo site_url('your_cycle/whichcycletype/hybrid');?>"><h3>HYBRID <strong>BIKE</strong></h3></a>
                            <p><?=$cms3['description'];?></p>
                            <!-- <span class="fnt16"><a href="<? echo site_url('your_cycle/compare_cycle');?>"><strong>COMPARE</strong> YOUR CYCLE</a></span> -->
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
    </div>
  </div>
  
</div>



</div>

<script>
  $(function() {  
	 var minamount = parseInt($( "#minamount" ).val());	 
	 var maxamount1 = parseInt($( "#maxamount1" ).val());
		if(minamount == maxamount1)
		{
			var minamount = 0;
			var maxamount1 = parseInt($( "#maxamount1" ).val());
		}
		else
		{
			var minamount = parseInt($( "#minamount" ).val());
			var maxamount1 = parseInt($( "#maxamount1" ).val());
		}
    $( "#slider-range" ).slider({
      range: true,
      min: minamount,
      max: maxamount1,
      values: [minamount, maxamount1 ],
      slide: function( event, ui ) {
        $("#amount").val( "Rs." + ui.values[ 0 ]);
		$("#amount1").val( "Rs." + ui.values[ 1 ]);
		$("#minamount").val(ui.values[ 0 ]);
		$("#maxamount1").val(ui.values[ 1 ]);
      }
	  ,
	  change: function( event, ui ) {
       //getpricedata();
	   }
    });

	  $( "#amount" ).val( "Rs." + $( "#slider-range" ).slider( "values", 0 ));
	  
	  $( "#amount1" ).val( "Rs." + $( "#slider-range" ).slider( "values", 1 ));

	  $( "#minamount" ).val($( "#slider-range" ).slider( "values", 0 ));
	  
	  $( "#maxamount1" ).val($( "#slider-range" ).slider( "values", 1 ));


  });
</script>
<script>
   $("#submit").click(function () {
    var minprice = document.getElementById("amount").value;
    var maxprice = document.getElementById("amount1").value;

	var minprice = minprice.replace('Rs.', "");
	var maxprice = maxprice.replace('Rs.', "");
	window.location = '<?=site_url("your_cycle/which_cycle_price");?>/'+minprice+'/'+maxprice
  });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>