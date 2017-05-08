<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Compare <span class="redcolor">Cycles</span></h1>
        <h2><span class="redcolor">Sampe text</span> to how to go ahead in choosing the cycle, <br/>
sampe text <span class="redcolor">& choose the cycles by</span></h2>
    </div>
  </div>
  
  <div class="row">
  	<div class="col-md-12">
    <div class="comparepage">
    <div class="table-responsive">
    	<table class="table table-bordered">
        	<tr>
            	<td width="25%">
                </td>
                <td width="25%">
                	<span class="compareimg">

					   <? if($compare1['img1']!='')
							{
								$chk = file_exists(FCPATH.'/upload/model/'.$compare1['img1']);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/model'); ?>/<?php echo $compare1['img1']; ?>" alt="" />
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

                    <!-- <a href="#" class="compareclose"><img src="<? echo site_url('assets/images/btn_close.png');?>" alt=""/></a> -->
                    </span>
                 <table class="table uppercase">
                 	<tr>
                    	<td colspan="2">   <span class="comparedrop">
						<select class="myval mtype1">
						  <?php foreach ($modeltype as $row) {
								?>
						  <option value="<?php echo $row['cycle_type']; ?>" <?php
								if ($compare1['cycle_type'] == $row['cycle_type']) {
								  echo "selected";
								}
								?> ><?php echo $row['cycle_type']; ?></option>
						  <?php } ?>
						</select>
                    </span></td>
                    </tr>
                    <tr>
                    	<td>BRAND</td>
                        <td> 
						  <span class="comparedrop">
						   <select class="myval brand1">
							  <?php foreach ($b_name as $row) {
									?>
							  <option value="<?php echo $row['brand_id']; ?>" <?php
									if ($compare1['brand_id'] == $row['brand_id']) {
									  echo "selected";
									}
									?> ><?php echo $row['brand_name']; ?></option>
							  <?php } ?>
						   </select>
						  </span>
						</td>
                    </tr>
                    <tr>
                    	<td>Model</td>
                        <td> 
						  <span class="comparedrop">
						    <select class="myval model1" id="model1">
							  <?php foreach ($m_name as $row) { ?>
							  <option value="<?php echo $row['model_id']; ?>" <?php if ($compare1['model_id'] == $row['model_id']) {
									echo "selected";}?>> <?php echo $row['name']; ?></option>
							  <?php } ?>
							</select>
						  </span>
						</td>
                    </tr>
                 </table>
                    
                </td>
                <td width="25%">
                	<span class="compareimg">
					   <? if($compare2['img1']!='')
							{
								$chk = file_exists(FCPATH.'/upload/model/'.$compare2['img1']);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/model'); ?>/<?php echo $compare2['img1']; ?>" alt="" />
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

                    <!-- <a href="#" class="compareclose"><img src="<? echo site_url('assets/images/btn_close.png');?>" alt=""/></a> -->
                    </span>
                 <table class="table uppercase">
                 	<tr>
                    	<td colspan="2">   <span class="comparedrop">
                    	<select class="myval mtype2">
						  <?php foreach ($modeltype as $row) {
								?>
						  <option value="<?php echo $row['cycle_type']; ?>" <?php
								if ($compare2['cycle_type'] == $row['cycle_type']) {
								  echo "selected";
								}
								?> ><?php echo $row['cycle_type']; ?></option>
						  <?php } ?>
						</select>
                    </span></td>
                    </tr>
                    <tr>
                    	<td>BRAND</td>
                        <td> 
						   <span class="comparedrop">
						        <select class="myval brand2">
								  <?php foreach ($b_name as $row) {
										?>
								  <option value="<?php echo $row['brand_id']; ?>" <?php
										if ($compare2['brand_id'] == $row['brand_id']) {
										  echo "selected";
										}
										?> ><?php echo $row['brand_name']; ?></option>
								  <?php } ?>
								</select>
						   </span>
						</td>
                    </tr>
                    <tr>
                    	<td>Model</td>
                        <td> 
						  <span class="comparedrop">
						     <select class="myval model2" id="model2">
							  <?php foreach ($m_name as $row) { ?>
							  <option value="<?php echo $row['model_id']; ?>" <?php if ($compare2['model_id'] == $row['model_id']) {
									echo "selected";}?>> <?php echo $row['name']; ?></option>
							  <?php }  ?>
							 </select>
						  </span>
						</td>
                    </tr>
                 </table>
                    
                </td>
                <td width="25%">
                	<span class="compareimg">
					   <? if($compare3['img1']!='')
							{
								$chk = file_exists(FCPATH.'/upload/model/'.$compare3['img1']);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/model'); ?>/<?php echo $compare3['img1']; ?>" alt="" />
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

					  
                    <!-- <a href="#" class="compareclose"><img src="<? echo site_url('assets/images/btn_close.png');?>" alt=""/></a> -->
                    </span>
                 <table class="table uppercase">
                 	<tr>
                    	<td colspan="2">   <span class="comparedrop">
                    	<select class="myval mtype3">
						  <?php foreach ($modeltype as $row) {
								?>
						  <option value="<?php echo $row['cycle_type']; ?>" <?php
								if ($compare3['cycle_type'] == $row['cycle_type']) {
								  echo "selected";
								}
								?> ><?php echo $row['cycle_type']; ?></option>
						  <?php } ?>
						</select>
                    </span></td>
                    </tr>
                    <tr>
                    	<td>BRAND</td>
                        <td> 
						   <span class="comparedrop">
						     <select class="myval brand3">
							  <?php foreach ($b_name as $row) {
									?>
							  <option value="<?php echo $row['brand_id']; ?>" <?php
									if ($compare3['brand_id'] == $row['brand_id']) {
									  echo "selected";
									}
									?> ><?php echo $row['brand_name']; ?></option>
							  <?php } ?>
							 </select>
						   </span>
						</td>
                    </tr>
                    <tr>
                    	<td>Model</td>
                        <td> 
						  <span class="comparedrop">
						        <select class="myval model3" id="model3">
								  <?php foreach ($m_name as $row) { ?>
								  <option value="<?php echo $row['model_id']; ?>" <?php if ($compare3['model_id'] == $row['model_id']) {
										echo "selected";}?>> <?php echo $row['name']; ?></option>
								  <?php } ?>
								</select>
					      </span>
						</td>
                    </tr>
                 </table>
                    
                </td>
            </tr>
            <tr>
            	<td><h1>Overview</h1></td>
                <td><h1>Interested to <span class="redcolor">Buy</span></h1></td>
                <td><h1>Interested to <span class="redcolor">Buy</span></h1></td>
                <td><h1>Interested to <span class="redcolor">Buy</span></h1></td>
            </tr>
            <tr>
            	<td><span class="redcolor">Summery</span></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Price</td>
                <td class="fnt20">
				   <?if(isset($compare1["price"]) && $compare1["price"]!='')
					 {?>
					   <span class="redcolor"><?=$compare1["price"]?></span> Rs.
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td class="fnt20">
				   <?if(isset($compare2["price"]) && $compare2["price"]!='')
					 {?>
					   <span class="redcolor"><?=$compare2["price"]?></span> Rs.
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td class="fnt20">
				   <?if(isset($compare3["price"]) && $compare3["price"]!='')
					 {?>
					   <span class="redcolor"><?=$compare3["price"]?></span> Rs.
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>Gender</td>
                <td>
				   <?if(isset($features1["gender"]) && $features1["gender"]!='')
					 {?>
					   <?=$features1["gender"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["gender"]) && $features2["gender"]!='')
					 {?>
					   <?=$features2["gender"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["gender"]) && $features3["gender"]!='')
					 {?>
					   <?=$features3["gender"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
             <tr>
            	<td>Frame Size</td>
                <td>
				   <?if(isset($features1["framesize"]) && $features1["framesize"]!='')
					 {?>
					   <?=$features1["framesize"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["framesize"]) && $features2["framesize"]!='')
					 {?>
					   <?=$features2["framesize"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["framesize"]) && $features3["framesize"]!='')
					 {?>
					   <?=$features3["framesize"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>Frame Build</td>
                <td>
				   <?if(isset($features1["framebuild"]) && $features1["framebuild"]!='')
					 {?>
					   <?=$features1["framebuild"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["framebuild"]) && $features2["framebuild"]!='')
					 {?>
					   <?=$features2["framebuild"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["framebuild"]) && $features3["framebuild"]!='')
					 {?>
					   <?=$features3["framebuild"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>Transmission</td>
                <td>
				   <?if(isset($features1["transmission"]) && $features1["transmission"]!='')
					 {?>
					   <?=$features1["transmission"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["transmission"]) && $features2["transmission"]!='')
					 {?>
					   <?=$features2["transmission"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["transmission"]) && $features3["transmission"]!='')
					 {?>
					   <?=$features3["transmission"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>No. Of Gears</td>
                <td>
				   <?if(isset($features1["noof_gear"]) && $features1["noof_gear"]!='')
					 {?>
					   <?=$features1["noof_gear"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["noof_gear"]) && $features2["noof_gear"]!='')
					 {?>
					   <?=$features2["noof_gear"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["noof_gear"]) && $features3["noof_gear"]!='')
					 {?>
					   <?=$features3["noof_gear"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>Shifter Type</td>
                <td>
				   <?if(isset($features1["shiftertype"]) && $features1["shiftertype"]!='')
					 {?>
					   <?=$features1["shiftertype"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["shiftertype"]) && $features2["shiftertype"]!='')
					 {?>
					   <?=$features2["shiftertype"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["shiftertype"]) && $features3["shiftertype"]!='')
					 {?>
					   <?=$features3["shiftertype"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
            </tr>
            <tr>
            	<td>Front Brakers</td>
                <td>
				   <?if(isset($features1["frontbreak"]) && $features1["frontbreak"]!='')
					 {?>
					   <?=$features1["frontbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["frontbreak"]) && $features2["frontbreak"]!='')
					 {?>
					   <?=$features2["frontbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["frontbreak"]) && $features3["frontbreak"]!='')
					 {?>
					   <?=$features3["frontbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
              <tr>
            	<td>Rear Brakers</td>
                <td>
				   <?if(isset($features1["rearbreak"]) && $features1["rearbreak"]!='')
					 {?>
					   <?=$features1["rearbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["rearbreak"]) && $features2["rearbreak"]!='')
					 {?>
					   <?=$features2["rearbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["rearbreak"]) && $features3["rearbreak"]!='')
					 {?>
					   <?=$features3["rearbreak"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
              <tr>
            	<td>Suspension</td>
                <td>
				   <?if(isset($features1["suspension"]) && $features1["suspension"]!='')
					 {?>
					   <?=$features1["suspension"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["suspension"]) && $features2["suspension"]!='')
					 {?>
					   <?=$features2["suspension"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["suspension"]) && $features3["suspension"]!='')
					 {?>
					   <?=$features3["suspension"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
              <tr>
            	<td>Front Wheeel Size</td>
                <td>
				   <?if(isset($features1["front_wheel_size"]) && $features1["front_wheel_size"]!='')
					 {?>
					   <?=$features1["front_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["front_wheel_size"]) && $features2["front_wheel_size"]!='')
					 {?>
					   <?=$features2["front_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["front_wheel_size"]) && $features3["front_wheel_size"]!='')
					 {?>
					   <?=$features3["front_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
              <tr>
            	<td>Rear Wheeel Size  </td>
                <td>
				   <?if(isset($features1["rear_wheel_size"]) && $features1["rear_wheel_size"]!='')
					 {?>
					   <?=$features1["rear_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["rear_wheel_size"]) && $features2["rear_wheel_size"]!='')
					 {?>
					   <?=$features2["rear_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["rear_wheel_size"]) && $features3["rear_wheel_size"]!='')
					 {?>
					   <?=$features3["rear_wheel_size"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
              <tr>
            	<td>Weight  </td>
                <td>
				   <?if(isset($features1["weight"]) && $features1["weight"]!='')
					 {?>
					   <?=$features1["weight"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
                <td>
				   <?if(isset($features2["weight"]) && $features2["weight"]!='')
					 {?>
					   <?=$features2["weight"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
				<td>
				   <?if(isset($features3["weight"]) && $features3["weight"]!='')
					 {?>
					   <?=$features3["weight"]?>
				   <?}
				   else
					 {?>
					   -
				   <?}?>
				</td>
              </tr>
        </table>
        </div>
        <!-- <div class="text-center"><a href="#" class="redkback buttonredblock">Reset</a></div> -->
       </div>
    </div>
  </div>
</div>
</div>

<script>

      $(".brand1").change(function () {
        //get the selected value

        var bid = this.value;
        // alert(bid);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_model_compare"); ?>',
          type: 'POST',
          data: {id: bid},
          success: function (data) {

            $("#model1").html("");
            $("#model1").html(data);
          }
        });
      });
            $(".brand2").change(function () {
        //get the selected value

        var bid = this.value;
        // alert(bid);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_model_compare"); ?>',
          type: 'POST',
          data: {id: bid},
          success: function (data) {

            $("#model2").html("");
            $("#model2").html(data);
          }
        });
      });
       $(".brand3").change(function () {
        //get the selected value

        var bid = this.value;
        // alert(bid);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_model_compare"); ?>',
          type: 'POST',
          data: {id: bid},
          success: function (data) {

            $("#model3").html("");
            $("#model3").html(data);
          }
        });
      });
      
    </script> 
<script>

      $("#model1").change(function () {
        //get the selected value

        var mid1 = this.value;
        var mid2=$("#model2").val();
		var mid3=$("#model3").val();

		var url="<? echo site_url('your_cycle/compare_cycle');?>/"+mid1+"/"+mid2+"/"+mid3;
		window.location = url;
	  });

	  $("#model2").change(function () {
        //get the selected value

        var mid2 = this.value;
        var mid1=$("#model1").val();
		var mid3=$("#model3").val();

		var url="<? echo site_url('your_cycle/compare_cycle');?>/"+mid1+"/"+mid2+"/"+mid3;
		window.location = url;
	  });

	  $("#model3").change(function () {
        //get the selected value

        var mid3 = this.value;
        var mid1=$("#model1").val();
		var mid2=$("#model2").val();

		var url="<? echo site_url('your_cycle/compare_cycle');?>/"+mid1+"/"+mid2+"/"+mid3;
		window.location = url;
	  });

     /* $("#model1").change(function () {
        //get the selected value

        var mid1 = this.value;
         //alert(mid1);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_compare1"); ?>',
          type: 'POST',
          data: {id1: mid1},
          success: function (data) {
          //  alert(data);
            $(".compare1").html("");
            $(".compare1").html(data);
          }
        });
      });

       $("#model2").change(function () {
        //get the selected value

        var mid2 = this.value;
         //alert(mid2);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_compare2"); ?>',
          type: 'POST',
          data: {id2: mid2},
          success: function (data) {
          //  alert(data);
            $(".compare2").html("");
            $(".compare2").html(data);
          }
        });
      });
        $("#model3").change(function () {
        //get the selected value

        var mid3 = this.value;
         //alert(mid3);
        //make the ajax call
        $.ajax({
          url: '<?php echo site_url("your_cycle/aj_compare3"); ?>',
          type: 'POST',
          data: {id3: mid3},
          success: function (data) {
          //  alert(data);
            $(".compare3").html("");
            $(".compare3").html(data);
          }
        });
      });*/
    </script>