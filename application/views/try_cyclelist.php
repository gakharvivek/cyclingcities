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
       getpricedata();
	   }
	  //getpricedata();
    });

	  $( "#amount" ).val( "Rs." + $( "#slider-range" ).slider( "values", 0 ));
	  
	  $( "#amount1" ).val( "Rs." + $( "#slider-range" ).slider( "values", 1 ));

	  $( "#minamount" ).val($( "#slider-range" ).slider( "values", 0 ));
	  
	  $( "#maxamount1" ).val($( "#slider-range" ).slider( "values", 1 ));


  });

  function getpricedata()
	{
		var min=$('#minamount').val();
		var max=$('#maxamount1').val();
		var sorting = $('#price').val();
		var searchmodel = $('#searchmodel').val();
		var minprice = min.replace("", "");
		var maxprice = max.replace("", "");
		var framesize = $('#framesize').val();

		pageurl = "<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>";

		$(".resfooter > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);			
		});
		
		if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

        var select_brandcount = $("input[name='select_brand[]']:checked").length;
		var select_modeltypecount = $("input[name='select_modeltype[]']:checked").length;
		var select_accessoriescount = $("input[name='select_accessories[]']:checked").length;

		if(select_brandcount==0 && select_modeltypecount==0 && select_accessoriescount==0)
		 {
			$.ajax({				
				type: "POST",
				url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
				data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
				//data: 'limit='+limit+',&table=all',
				success: function(data){
					$(".ajaxtry_cycle_list").html(data.body);
					$(".resfooter").html(data.pagination_link);
					$("#drpMiles").val(data.drpmilesradius);
					$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
					$("html, body").animate({ scrollTop: 0 }, "slow");
				}
		    });
		 }
		else
		 {
			 var brandselchbox = [];
			  var brandinpfields = myform1.getElementsByTagName("input");
			  var brandnr_inpfields = brandinpfields.length;
			  for(var l=0; l<brandnr_inpfields; l++) 
			  {
				if(brandinpfields[l].type == 'checkbox' && brandinpfields[l].checked == true) brandselchbox.push(brandinpfields[l].value);
			  }

			 var modeltypeselchbox = [];
			  var modeltypeinpfields = myform2.getElementsByTagName("input");
			  var modeltypenr_inpfields = modeltypeinpfields.length;
			  for(var l=0; l<modeltypenr_inpfields; l++) 
			  {
				if(modeltypeinpfields[l].type == 'checkbox' && modeltypeinpfields[l].checked == true) modeltypeselchbox.push(modeltypeinpfields[l].value);
			  }

			 var accessoriesselchbox = [];
			  var accessoriesinpfields = myform3.getElementsByTagName("input");
			  var accessoriesnr_inpfields = accessoriesinpfields.length;
			  for(var l=0; l<accessoriesnr_inpfields; l++) 
			  {
				if(accessoriesinpfields[l].type == 'checkbox' && accessoriesinpfields[l].checked == true) accessoriesselchbox.push(accessoriesinpfields[l].value);
			  }

			 $.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize,checkbrand:brandselchbox,checkmodeltype:modeltypeselchbox,checkaccessories:accessoriesselchbox},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxtry_cycle_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		 }
	}
</script>
<script>
   $().ready(function() {
			//$("#myForm").validate();
		});
   $(document).ready(function () {

	    var min=$('#minamount').val();
		var max=$('#maxamount1').val();
		var sorting = $('#price').val();
		var searchmodel = $('#searchmodel').val();
		var minprice = min.replace("", "");
		var maxprice = max.replace("", "");
		var framesize = $('#framesize').val();
     
		pageurl = "<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>";
		$(".resfooter > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);			
		});
		
		if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

		var select_brandcount = $("input[name='select_brand[]']:checked").length;
		var select_modeltypecount = $("input[name='select_modeltype[]']:checked").length;
		var select_accessoriescount = $("input[name='select_accessories[]']:checked").length;

		if(select_brandcount==0 && select_modeltypecount==0 && select_accessoriescount==0)
		 {
			$.ajax({				
				type: "POST",
				url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
				data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
				//data: 'limit='+limit+',&table=all',
				success: function(data){
					$(".ajaxtry_cycle_list").html(data.body);
					$(".resfooter").html(data.pagination_link);
					$("#drpMiles").val(data.drpmilesradius);
					$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
					$("html, body").animate({ scrollTop: 0 }, "slow");
				}
		    });
		 }
		else
		 {
			 var brandselchbox = [];
			  var brandinpfields = myform1.getElementsByTagName("input");
			  var brandnr_inpfields = brandinpfields.length;
			  for(var l=0; l<brandnr_inpfields; l++) 
			  {
				if(brandinpfields[l].type == 'checkbox' && brandinpfields[l].checked == true) brandselchbox.push(brandinpfields[l].value);
			  }

			 var modeltypeselchbox = [];
			  var modeltypeinpfields = myform2.getElementsByTagName("input");
			  var modeltypenr_inpfields = modeltypeinpfields.length;
			  for(var l=0; l<modeltypenr_inpfields; l++) 
			  {
				if(modeltypeinpfields[l].type == 'checkbox' && modeltypeinpfields[l].checked == true) modeltypeselchbox.push(modeltypeinpfields[l].value);
			  }

			 var accessoriesselchbox = [];
			  var accessoriesinpfields = myform3.getElementsByTagName("input");
			  var accessoriesnr_inpfields = accessoriesinpfields.length;
			  for(var l=0; l<accessoriesnr_inpfields; l++) 
			  {
				if(accessoriesinpfields[l].type == 'checkbox' && accessoriesinpfields[l].checked == true) accessoriesselchbox.push(accessoriesinpfields[l].value);
			  }

			 $.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize,checkbrand:brandselchbox,checkmodeltype:modeltypeselchbox,checkaccessories:accessoriesselchbox},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxtry_cycle_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		 }
    });

	function GetAjaxList(pageurl)
		{	
		   
			if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

			var min=$('#minamount').val();
			var max=$('#maxamount1').val();
			var sorting = $('#price').val();
			var searchmodel = $('#searchmodel').val();
			var minprice = min.replace("", "");
			var maxprice = max.replace("", "");
			var framesize = $('#framesize').val();

			parpage = "<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>"+pageurl;
			//alert(parpage);

			var select_brandcount = $("input[name='select_brand[]']:checked").length;
			var select_modeltypecount = $("input[name='select_modeltype[]']:checked").length;
			var select_accessoriescount = $("input[name='select_accessories[]']:checked").length;

			if(select_brandcount==0 && select_modeltypecount==0 && select_accessoriescount==0)
			 {
				$.ajax({				
					type: "POST",
					url:parpage,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxtry_cycle_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
			 }
			else
			 {
				 var brandselchbox = [];
				  var brandinpfields = myform1.getElementsByTagName("input");
				  var brandnr_inpfields = brandinpfields.length;
				  for(var l=0; l<brandnr_inpfields; l++) 
				  {
					if(brandinpfields[l].type == 'checkbox' && brandinpfields[l].checked == true) brandselchbox.push(brandinpfields[l].value);
				  }

				 var modeltypeselchbox = [];
				  var modeltypeinpfields = myform2.getElementsByTagName("input");
				  var modeltypenr_inpfields = modeltypeinpfields.length;
				  for(var l=0; l<modeltypenr_inpfields; l++) 
				  {
					if(modeltypeinpfields[l].type == 'checkbox' && modeltypeinpfields[l].checked == true) modeltypeselchbox.push(modeltypeinpfields[l].value);
				  }

				 var accessoriesselchbox = [];
				  var accessoriesinpfields = myform3.getElementsByTagName("input");
				  var accessoriesnr_inpfields = accessoriesinpfields.length;
				  for(var l=0; l<accessoriesnr_inpfields; l++) 
				  {
					if(accessoriesinpfields[l].type == 'checkbox' && accessoriesinpfields[l].checked == true) accessoriesselchbox.push(accessoriesinpfields[l].value);
				  }

				 $.ajax({				
						type: "POST",
						url:parpage,
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize,checkbrand:brandselchbox,checkmodeltype:modeltypeselchbox,checkaccessories:accessoriesselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){
							$(".ajaxtry_cycle_list").html(data.body);
							$(".resfooter").html(data.pagination_link);
							$("#drpMiles").val(data.drpmilesradius);
							$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					});
			 }
		}

	function filternow()
		{	
			var min=$('#minamount').val();
			var max=$('#maxamount1').val();
			var sorting = $('#price').val();
			var searchmodel = $('#searchmodel').val();
			var minprice = min.replace("", "");
			var maxprice = max.replace("", "");
			var framesize = $('#framesize').val();

			pageurl = "<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>";
			$(".resfooter > ul li a").on("click",function(e){
					e.preventDefault();				
					GetAjaxList(pageurl);			
			});
			
			if(jQuery('#showgrid').val()==""){
					var limit = 1;
				}else{
					var limit = jQuery('#showgrid').val();
				}

            var select_brandcount = $("input[name='select_brand[]']:checked").length;
			var select_modeltypecount = $("input[name='select_modeltype[]']:checked").length;
            var select_accessoriescount = $("input[name='select_accessories[]']:checked").length;

			if(select_brandcount==0 && select_modeltypecount==0 && select_accessoriescount==0)
			 {
				$.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxtry_cycle_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
			 }
			else
			 {
				 var brandselchbox = [];
				  var brandinpfields = myform1.getElementsByTagName("input");
				  var brandnr_inpfields = brandinpfields.length;
				  for(var l=0; l<brandnr_inpfields; l++) 
				  {
					if(brandinpfields[l].type == 'checkbox' && brandinpfields[l].checked == true) brandselchbox.push(brandinpfields[l].value);
				  }

				 var modeltypeselchbox = [];
				  var modeltypeinpfields = myform2.getElementsByTagName("input");
				  var modeltypenr_inpfields = modeltypeinpfields.length;
				  for(var l=0; l<modeltypenr_inpfields; l++) 
				  {
					if(modeltypeinpfields[l].type == 'checkbox' && modeltypeinpfields[l].checked == true) modeltypeselchbox.push(modeltypeinpfields[l].value);
				  }

				 var accessoriesselchbox = [];
				  var accessoriesinpfields = myform3.getElementsByTagName("input");
				  var accessoriesnr_inpfields = accessoriesinpfields.length;
				  for(var l=0; l<accessoriesnr_inpfields; l++) 
				  {
					if(accessoriesinpfields[l].type == 'checkbox' && accessoriesinpfields[l].checked == true) accessoriesselchbox.push(accessoriesinpfields[l].value);
				  }

				 $.ajax({				
						type: "POST",
						url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize,checkbrand:brandselchbox,checkmodeltype:modeltypeselchbox,checkaccessories:accessoriesselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){
							$(".ajaxtry_cycle_list").html(data.body);
							$(".resfooter").html(data.pagination_link);
							$("#drpMiles").val(data.drpmilesradius);
							$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					});
			 }
		}
</script>

<div class="comingsoonpage martop64">
      <? 
		 $range=$this->try_cycle_list_model->getallpricebyid();
		 $minprice=$range['minprice'];
		 $maxprice=$range['maxprice'];
	  ?>
	  <input type="hidden" name="minamount" id="minamount" value="<?=$minprice?>" >
	  <input type="hidden" name="maxamount1" id="maxamount1" value="<?=$maxprice?>">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<h1>Try <span class="redcolor">CYCLE</span></h1>
			<h2><span class="redcolor">still confused</span> as to how to go ahead in choosing the cycle, <br/>go ahead  <span class="redcolor">& choose the cycles by</span></h2>
		</div>
	  </div>
	  <div class="accessorieslist fntcentury">
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<div class="selectarea">
					<span class="selecttype">
					   <select  class="myval" id="price" name="price" onChange="searchbysort(this.value)">
							<option  value="">RENT</option>
							<option  value="desc" name="order">High to Low</option>
							<option  value="asc" name="order">Low to High</option>
					   </select>
					</span>
					<input type="hidden" name="showgrid" id="showgrid" >
					<span class="resfooter">
					</span>
				</div>
			</div>
			<div class="col-md-3 col-sm-4 leftfilterbar">
				<div class="searchbarbox">
				  <input type="text" name="searchmodel" id="searchmodel" placeholder="Search by Model"/>
				</div>
				<!-- <div class="locationdrop">
					<select class="myval">
						<option>BHUBANESHWAR</option>
					</select>
				</div> -->
				<!-- <div class="cate">
				  <a href="" class="brdrright">CYCLE</a><a href="<? echo site_url('your_cycle/tryaccessories');?>" class="redcolor">Accessories</a>
				</div> -->
				<div class="selectprice">
				  <h3>Select <span class="redcolor">Rent</span></h3>
				  <div id="slider-range"></div>
				  <input type="text" name="amount"  id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"> 
				  <input type="text" name="amount1"  id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
				</div>
				<!-- <div class="cate selectspeed">
				 <h3>Select <span class="redcolor">USER</span></h3>
				 <a href="#" class="brdrright">MEN</a><a href="#" class=" brdrright">Women</a>
				 <a href="#" class=" brdrright">UNISEX</a><a href="#" class="">Kids</a>
				</div> -->
				<!-- <div class="cate selectspeed gearing">
				 <h3>Select <span class="redcolor">GEARING</span></h3>
				 <a href="#" class="brdrright">NON-GEARED</a><a href="#" class="">MULTI-GEARED</a>
				</div> -->

				<form id="myform2" name= "myform2">
				  <div class="selectbrand">
					<h3>Select <span class="redcolor">TYPE</span></h3>
					<ul class="selectbrandone">
					    <?
						  $j= 1;
						  foreach ($modeltype as $row1) 
						  {?>
						    <li><input id="select_modeltype<?=$j;?>" type="checkbox" name="select_modeltype[]" value="<?=$row1['cycle_type'];?>" ><label for="select_modeltype<?=$j;?>"><?=$row1['cycle_type'];?></label></li>
						<? $j++;
						  }?>
					</ul>
				  </div>
			    </form>

				<div class="cate selectspeed gearing">
				  <span class="fnt14">TO  EXPLORE MORE FEATURES</span>
				  <h3>KNOW YOUR  <span class="redcolor">CYCLE</span></h3>
				</div>
				<form id="myform1" name= "myform1">
				  <div class="selectbrand">
					<h3>Select <span class="redcolor">Brand</span></h3>
					<ul class="selectbrandone">
					    <?
						  $i= 1;
						  foreach ($brand as $row) 
						  {?>
						    <li><input id="select_brand<?=$i;?>" type="checkbox" name="select_brand[]" value="<?=$row['brand_id'];?>"><label for="select_brand<?=$i;?>"><?=$row['brand_name'];?></label></li>
						<? $i++;
						  }?>
					</ul>
				  </div>
			    </form>
				
				<div class="framesize">
					<h3>Frame <span class="redcolor">Size</span></h3>
					<select class="myval" id="framesize" name="framesize">
					  <option value="">Select Frame Size</option>
					  <option value="26">26"</option>
					  <option value="28">28"</option>
					  <option value="30">30"</option>
					</select>
				</div>

				<form id="myform3" name= "myform3">
				  <div class="selectbrand features">
					<h3>Features <span class="redcolor">Accessories</span></h3>
					<ul class="selectbrandone">
					    <?
						  $k= 1;
						  foreach ($accessories as $row2) 
						  {?>
						    <li><input id="select_accessories<?=$k;?>" type="checkbox" name="select_accessories[]" value="<?=$row2['accessories'];?>"><label for="select_accessories<?=$k;?>"><?=$row2['accessories'];?></label></li>
						<? $k++;
						  }?>
					</ul>
				  </div>
			    </form>
				
				<div class="buttonarea">
					<a href="javascript:void(0);" class="blackback" onclick="filternow();">Filter</a>
					<a href="javascript:void(0);" class="redkback" onClick="myFunction()">Reset</a>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<div class="stillnotsure"><a href="" onClick="seefull();"><img src="<? echo site_url('assets/images/notsure.png');?>" alt=""/></a></div>
				<div class="row ajaxtry_cycle_list">
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-8">
					    <input type="hidden" name="showgrid" id="showgrid" >
						<div class="selectarea resfooter">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="clear"></div>
	  </div>
	</div>
</div>

<script>
function myFunction() {
    //document.getElementById("myForm").reset();
	$('#searchmodel').val('');
	$('input:checkbox').removeAttr('checked');
	$('#framesize').val('');
	$('#price').val('');
	filternow();
}
</script> 
<script>
  //get Publisher 
 /* $("#price").change(function () {
    var price = this.value;
	alert(price);
    $.ajax({
      url: '<?php echo base_url(); ?>try_cycle_list/price',
      type: 'POST',
      data: {price: price},
      success: function (data) {
       $('#price').value(result);
      }
    });
  });*/

  function searchbysort(value)
		{	
			var min=$('#minamount').val();
			var max=$('#maxamount1').val();
			var sorting = value;
			var searchmodel = $('#searchmodel').val();
			var minprice = min.replace("", "");
			var maxprice = max.replace("", "");
			var framesize = $('#framesize').val();
			
			pageurl = "<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>";
			$(".resfooter > ul li a").on("click",function(e){
					e.preventDefault();				
					GetAjaxList(pageurl);			
			});
			
			if(jQuery('#showgrid').val()==""){
					var limit = 1;
				}else{
					var limit = jQuery('#showgrid').val();
				}

			var select_brandcount = $("input[name='select_brand[]']:checked").length;
			var select_modeltypecount = $("input[name='select_modeltype[]']:checked").length;
            var select_accessoriescount = $("input[name='select_accessories[]']:checked").length;

			if(select_brandcount==0 && select_modeltypecount==0 && select_accessoriescount==0)
			 {
				$.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxtry_cycle_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
			 }
			else
			 {
				 var brandselchbox = [];
				  var brandinpfields = myform1.getElementsByTagName("input");
				  var brandnr_inpfields = brandinpfields.length;
				  for(var l=0; l<brandnr_inpfields; l++) 
				  {
					if(brandinpfields[l].type == 'checkbox' && brandinpfields[l].checked == true) brandselchbox.push(brandinpfields[l].value);
				  }

				 var modeltypeselchbox = [];
				  var modeltypeinpfields = myform2.getElementsByTagName("input");
				  var modeltypenr_inpfields = modeltypeinpfields.length;
				  for(var l=0; l<modeltypenr_inpfields; l++) 
				  {
					if(modeltypeinpfields[l].type == 'checkbox' && modeltypeinpfields[l].checked == true) modeltypeselchbox.push(modeltypeinpfields[l].value);
				  }

				 var accessoriesselchbox = [];
				  var accessoriesinpfields = myform3.getElementsByTagName("input");
				  var accessoriesnr_inpfields = accessoriesinpfields.length;
				  for(var l=0; l<accessoriesnr_inpfields; l++) 
				  {
					if(accessoriesinpfields[l].type == 'checkbox' && accessoriesinpfields[l].checked == true) accessoriesselchbox.push(accessoriesinpfields[l].value);
				  }

				 $.ajax({				
						type: "POST",
						url:"<?php echo site_url('your_cycle/ajaxtry_cycle_list'); ?>",
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize,checkbrand:brandselchbox,checkmodeltype:modeltypeselchbox,checkaccessories:accessoriesselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){
							$(".ajaxtry_cycle_list").html(data.body);
							$(".resfooter").html(data.pagination_link);
							$("#drpMiles").val(data.drpmilesradius);
							$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					});
			 }			
		} 
</script>