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
		var type="<?=$type?>";
		var min=$('#minamount').val();
		var max=$('#maxamount1').val();
		var sorting = $('#price').val();
		var searchmodel = $('#searchmodel').val();
		var minprice = min.replace("", "");
		var maxprice = max.replace("", "");
		
		pageurl = "<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type;

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

		if(select_brandcount==0)
		 {
			$.ajax({				
				type: "POST",
				url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
				data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel},
				//data: 'limit='+limit+',&table=all',
				success: function(data){

					if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}

					$(".ajaxwhich_cycle_type").html(data.body);
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

			 $.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,checkbrand:brandselchbox},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}

						$(".ajaxwhich_cycle_type").html(data.body);
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
        
		var type="<?=$type?>";
	    var min=$('#minamount').val();
		var max=$('#maxamount1').val();
		var sorting = $('#price').val();
		var searchmodel = $('#searchmodel').val();
		var minprice = min.replace("", "");
		var maxprice = max.replace("", "");
		
     
		pageurl = "<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type;
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
		

		if(select_brandcount==0)
		 {
			$.ajax({				
				type: "POST",
				url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
				data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel},
				//data: 'limit='+limit+',&table=all',
				success: function(data){

					if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
					$(".ajaxwhich_cycle_type").html(data.body);
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

			 $.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,checkbrand:brandselchbox},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
						$(".ajaxwhich_cycle_type").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		 }
    });

	function GetAjaxList(pageurl,type)
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
			

			parpage = "<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type+""+pageurl;
			//alert(parpage);

			var select_brandcount = $("input[name='select_brand[]']:checked").length;
			

			if(select_brandcount==0)
			 {
				$.ajax({				
					type: "POST",
					url:parpage,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
						$(".ajaxwhich_cycle_type").html(data.body);
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

				 $.ajax({				
						type: "POST",
						url:parpage,
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,checkbrand:brandselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){

							if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
							$(".ajaxwhich_cycle_type").html(data.body);
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
			var type="<?=$type?>";
			var min=$('#minamount').val();
			var max=$('#maxamount1').val();
			var sorting = $('#price').val();
			var searchmodel = $('#searchmodel').val();
			var minprice = min.replace("", "");
			var maxprice = max.replace("", "");
			

			pageurl = "<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type;
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
			

			if(select_brandcount==0)
			 {
				$.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}

						$(".ajaxwhich_cycle_type").html(data.body);
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

				 $.ajax({				
						type: "POST",
						url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,checkbrand:brandselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){

							if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
							$(".ajaxwhich_cycle_type").html(data.body);
							$(".resfooter").html(data.pagination_link);
							$("#drpMiles").val(data.drpmilesradius);
							$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					});
			 }
		}

	function searchbysort(value)
		{	
			var type="<?=$type?>";
			var min=$('#minamount').val();
			var max=$('#maxamount1').val();
			var sorting = value;
			var searchmodel = $('#searchmodel').val();
			var minprice = min.replace("", "");
			var maxprice = max.replace("", "");
			
			pageurl = "<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type;
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

			if(select_brandcount==0)
			 {
				$.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
					data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,framesize:framesize},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
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

				 $.ajax({				
						type: "POST",
						url:"<?php echo site_url('your_cycle/ajaxwhich_cycle_type'); ?>/"+type,
						data: {limit:limit,minprice:minprice,maxprice:maxprice,sorting:sorting,searchmodel:searchmodel,checkbrand:brandselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){

							if(data.datacount!=0)
							{
								$(".stillbtncompare").show();
							}
							else
							{
								$(".stillbtncompare").hide();
							}
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
		 $this->load->model('which_cycle_type_model');
		 $range=$this->which_cycle_type_model->getallpricebymodelid($type);
		      $minprice=0;
		      if($range['minprice']!='')
			  {
				  $minprice=$range['minprice'];
			  }
			  $maxprice=$range['maxprice'];
	  ?>
	  <input type="hidden" name="minamount" id="minamount" value="<?=$minprice?>" >
	  <input type="hidden" name="maxamount1" id="maxamount1" value="<?=$maxprice?>">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<h1>WHICH <span class="redcolor">CYCLE</span></h1>
			<h2 class="uppercase"><span class="redcolor">still confused</span> as to how to go ahead in choosing the cycle, <br/>go ahead  <span class="redcolor">& choose the cycles by</span></h2>
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
				
				<div class="selectprice">
				  <h3>Select <span class="redcolor">Price</span></h3>
				  <div id="slider-range"></div>
				  <input type="text" name="amount"  id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"> 
				  <input type="text" name="amount1"  id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
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
			
				<div class="buttonarea">
					<a href="javascript:void(0);" class="blackback" onclick="filternow();">Filter</a>
					<a href="javascript:void(0);" class="redkback" onClick="myFunction()">Reset</a>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<div class="stillnotsure"><a href="" onClick="seefull();"><img src="<? echo site_url('assets/images/notsure.png');?>" alt=""/></a></div>
				<div class="stillbtncompare"><a href="javascript:void(0);" id="btnSave"><img src="<? echo site_url('assets/images/btn_compare.png');?>" alt=""/></a></div>
				<div class="row ajaxwhich_cycle_type">
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
	$('#price').val('');
}
</script> 