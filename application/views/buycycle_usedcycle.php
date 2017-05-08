<script>
	$().ready(function() {
		$("#sell_cycleform").validate();
	});	
</script>
<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Buy &amp; Sell <span class="redcolor">Used Cycle</span></h1>
        <h2 class="caps"><span class="redcolor">Planning to upgrade?</span> Sell the one kept idle in your garage. <br/>
			<span class="redcolor">Or Buy a Used</span> bicycle till you plan to buy a good one.</h2>
    </div>
  </div>
  <div class="buyandsell">
  	<div class="row">
    	<div class="col-md-12">
        	<div class="cyclebox">
        	<div class="boxmainbox redboxmain ">
			  <? if($this->user_fm->loggedin() == FALSE)
		         {?>
				    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin"><span>BUY</span></a>
               <?}
			    else
			     {?>
				    <a href="<? echo site_url('your_cycle/buy_usedcycle');?>"><span>BUY</span></a>
               <?}?>
            
            </div>
            <div class="boxmainbox blackboxmain" style="margin-left:-25px;">
			    <? if($this->user_fm->loggedin() == FALSE)
		         {?>
				    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin"><span>SELL</span></a>
               <?}
			    else
			     {?>
				    <a href="#" data-toggle="modal" data-target="#mysellcycleModal"><span>SELL</span></a>
               <?}?>
             
            </div>
            
        </div>
        </div>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div id="mysellcycleModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:450px;">
    <!-- Modal content-->
	<form action="<?php echo site_url('your_cycle/add_sell_cycle');?>" name="sell_cycleform" id="sell_cycleform" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-body padbtm0 buyandseellpopup">
		  <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
		  <div class="row">
		   <div class="col-md-12">
			   <div class="popupcontent fntcentury mycycleii">
				<h2>POST YOUR CYCLE TO SELL</h2>
				<ul>
					
					 <li>
						<?  $my_cycle = $this->buysell_model->getmycycle(); ?>
						<span>
						     <select name="mycycle" class="myval mycycle">
								<option value="">SELECT FROM MY CYCLE</option>
								<?php
										// print_r($my_cycle); 
										foreach ($my_cycle as $row) {
										  // print_r($row); 
										  ?>
								<option value="<?php echo $row['model_id']; ?>"> <?php echo $row['name']; ?> </option>
								<?php } ?>
							  </select>
						</span>
						<div class="clear"></div>
					</li>
					 <li class="text-center">
						OR
					</li>
				</ul>
				<ul class="sell">
					<li>
						<span class="ttle1">Brand</span>
						<span class="ttltext">
						    <?  $b_name = $this->buysell_model->getbrand(); ?>
						    <select name="brand_id" id="brand_id" class="myval brand_id required">
							  <option value="">Select Brand</option>
							  <?php foreach ($b_name as $row) { ?>
							  <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
							  <?php } ?>
							</select>
						</span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Model</span>
						<span class="ttltext">
						    <select name="model_id" id="model_id" class="myval model_id required">
							  <option value="">Select Model</option>
							</select>
					    </span>
						<div class="clear"></div>
					</li>
					<li>
						<span class="ttle1">Purchase Year</span>
						<span class="ttltext"><input type="text" name="purchase_year" id="purchase_year" class="required"/></span>
						<div class="clear"></div>
					</li>
					 <li>
						<span class="ttle1">Frame size</span>
						<span class="ttltext"><input type="text" name="frame_size" id="frame_size" class="required"/></span>
						<div class="clear"></div>
					</li>
				</ul>
				<ul>
					 <li>
						<span class="ttle1">Accessories</span>
						<span class="ttltext">
						<table border="0" cellpadding="0" cellspacing="0" class="accessoriesradio">
							<tr>
								<td><input type="radio" name="accessories" id="accessories" value="Bell" checked="checked"/><label for="accessories">BELL</label></td>
								<td><input type="radio" name="accessories" id="accessories1" value="WATER BOTTLE CASE"/><label for="accessories1">WATER BOTTLE CASE</label></td>
							 </tr>
							 <tr>
								<td><input type="radio" name="accessories" id="accessories2" value="HELMET"/><label for="accessories2">HELMET</label></td>
								<td><input type="radio" name="accessories" id="accessories3" value="HEAD & TAIL LIGHTS"/><label for="accessories3">HEAD & TAIL LIGHTS </label></td>
							</tr>
						</table>                
						</span>
						<div class="clear"></div>
					</li>
					<!--  <li>
						<span class="ttle1" style="width:50%">Height of Rider Limit</span>
						<span class="ttltext" style="width:48%">
						    <input type="text" name="height" id="height" placeholder="00 ft" class="required"/>
					    </span>
						<div class="clear"></div>
						<span class="ttle1" style="width:50%">Weight of Rider Limit</span>
						<span class="ttltext" style="width:48%"> 
						   <input type="text" name="weight" id="weight" placeholder="00 kg" class="required"/>
						</span>
						<div class="clear"></div>
					</li> -->
					 <li>
						<span class="ttle1 padtopzero">Selling Price</span>
						<span class="ttltext"><input type="text" name="selling_price" id="selling_price" placeholder="" class="required"/></span>
						<div class="clear"></div>
					</li>
					<li>
					<textarea class="blacktextarea" name="information" id="information" placeholder="Additional Information"></textarea>
						<div class="clear"></div>
					</li>
					<li class="mycyclecntpop">
						<label>Upload Photo</label> <br/>
						<p>Ensure the cycle is properly visible in the photo Accepted formats are jpeg & png size <strong>< 1MB</strong></p>
						<input type="file" name="img2" id="img2"  class="required" />
						<!-- <span class="popimgbox"><img src="<? echo site_url('assets/images/img_popcycle.jpg');?>" alt="popclosebtn"/> <a href="#" class="popclosebtn"><img src="<? echo site_url('assets/images/close_btn.png');?>" alt=""/></a></span>
						<span class="popimgbox"><img src="<? echo site_url('assets/images/img_popcycle.jpg');?>" alt="popclosebtn"/> <a href="#" class="popclosebtn"><img src="<? echo site_url('assets/images/close_btn.png');?>" alt=""/></a></span>
						<span class="popimgbox"><img src="<? echo site_url('assets/images/img_popcycle.jpg');?>" alt="popclosebtn"/> <a href="#" class="popclosebtn"><img src="<? echo site_url('assets/images/close_btn.png');?>" alt=""/></a></span>
						<span class="popimgbox"><img src="<? echo site_url('assets/images/img_popcycle.jpg');?>" alt="popclosebtn"/> <a href="#" class="popclosebtn"><img src="<? echo site_url('assets/images/close_btn.png');?>" alt=""/></a></span> -->
					</li>
				   
					<li style="margin:0px; padding:0px; background:none;">
					<?$userid=$this->session->userdata('fuserid');?>
					<input type="hidden" name="user_id" id="user_id" value="<?=$userid?>" />
					<input type='hidden' name="post_date" value="<?php echo date('Y-m-d'); ?>"/>
                    <input type="submit" value="Submit" class="btnaddcycle"/>
					</li>

					
				</ul>
			   </div>
		   </div>
		  </div>
      </div>
    </div>
    </form>
  </div>
</div>
<script>
   //get Publisher 
  $(".mycycle").change(function () {

//    alert("here");
    //get the selected value
    var mid = this.value;

//    alert(mid);

    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("your_cycle/aj_sell"); ?>',
      type: 'POST',
      data: {id: mid},
      success: function (data) {
//        alert(data);
        $(".sell").html("");
        $(".sell").html(data);
      }
    });
  });

  $(".brand_id").change(function () {
    //get the selected value
    //alert(123);
    var bid = this.value;

    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("your_cycle/aj_model_buysell"); ?>',
      type: 'POST',
      data: {id: bid},
      success: function (data) {
        // alert(data);
        //$(".model_id").html("");
        $("#model_id").html(data);
      }
    });
  });
</script>