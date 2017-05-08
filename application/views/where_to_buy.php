<script>
   $().ready(function() {
			//$("#myForm").validate();
		});
   $(document).ready(function () {

	    
		var searchmodel = $('#searchmodel').val();
		var searchcity = $('#searchcity').val();

		pageurl = "<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>";
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
				url:"<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>",
				data: {limit:limit,searchmodel:searchmodel,searchcity:searchcity},
				//data: 'limit='+limit+',&table=all',
				success: function(data){
                    
					if(data.total_rows != '' && data.total_rows != null)
					{
						$(".total_rows").html(data.total_rows);
					}
					else
					{
						$(".total_rows").html('0');
					}
					
					$(".ajaxwhere_to_buy_list").html(data.body);
					//$(".resfooter").html(data.pagination_link);
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
					url:"<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>",
					data: {limit:limit,searchmodel:searchmodel,searchcity:searchcity,checkbrand:brandselchbox},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.total_rows != '' && data.total_rows != null)
							{
								$(".total_rows").html(data.total_rows);
							}
							else
							{
								$(".total_rows").html('0');
							}
						$(".ajaxwhere_to_buy_list").html(data.body);
						//$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		 }
    });

	

	function filternow()
		{	
			
			var searchmodel = $('#searchmodel').val();
			var searchcity = $('#searchcity').val();
			pageurl = "<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>";
			
            var select_brandcount = $("input[name='select_brand[]']:checked").length;
			
			if(select_brandcount==0)
			 {
				$.ajax({				
					type: "POST",
					url:"<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>",
					data: {searchmodel:searchmodel,searchcity:searchcity},
					//data: 'limit='+limit+',&table=all',
					success: function(data){

						if(data.total_rows != '' && data.total_rows != null)
							{
								$(".total_rows").html(data.total_rows);
							}
							else
							{
								$(".total_rows").html('0');
							}
						$(".ajaxwhere_to_buy_list").html(data.body);
						//$(".resfooter").html(data.pagination_link);
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
						url:"<?php echo site_url('your_cycle/ajaxwhere_to_buy_list');?>",
						data: {searchmodel:searchmodel,searchcity:searchcity,checkbrand:brandselchbox},
						//data: 'limit='+limit+',&table=all',
						success: function(data){

							if(data.total_rows != '' && data.total_rows != null)
							{
								$(".total_rows").html(data.total_rows);
							}
							else
							{
								$(".total_rows").html('0');
							}
							$(".ajaxwhere_to_buy_list").html(data.body);
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
function myFunction() {
    //document.getElementById("myForm").reset();
	$('#searchmodel').val('');
	$('#searchcity').select2("val",'');
	$('input:checkbox').removeAttr('checked');
	$("html, body").animate({ scrollTop: 0 }, "slow");
	filternow();
}
</script> 
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>  WHERE  <span class="redcolor">TO BUY </span></h1>
         <h2 class="caps"><span class="redcolor">Still confused?</span> Visit cycle shops in your city to explore. <br/>
			<span class="redcolor">Brand Wise shops</span> to find the shops in your locality.</h2>
    </div>
  </div> 
  <div class="row">
  	<div class="col-md-12">
    	<div class="paginationmenu marbtm20">Total Listing <span class="redcolor total_rows"></span></div>
    </div>
  </div>  
  <div class="row">
  <div class="col-md-3 col-sm-4 leftfilterbar">
    <div class="searchbarbox">
    <input type="text" name="searchmodel" id="searchmodel" placeholder="SEARCH BY SHOP" style="border:0 none;width:90%"/>
    </div>
    <div class="locationdrop">
    	<select class="myval" name="searchcity" id="searchcity">
        	<option value="">Select City</option>                                    
			  <?php
				if (isset($cities)) {
				  foreach ($cities as $row) {
					?>
					<option value="<?= $row['city']; ?>" ><?= $row['name']; ?></option>
					<?php
				  }
				}
			  ?>         
        </select>
    </div>    

	<form id="myform1" name= "myform1" class="lhform" >
		<div class="selectbrand">
			<h3>Select <span class="redcolor">Brand</span></h3>
			<ul class="selectbrandone">
				<?
				  $i= 1;
				  foreach ($brand as $row) 
				  {?>
					<li><input id="select_brand<?=$i;?>" type="checkbox" name="select_brand[]" value="<?=$row['brand_name'];?>"><label for="select_brand<?=$i;?>"><?php echo $row['brand_name'];?></label></li>
				<? $i++;
				  }?>
			</ul>
		</div>  
	</form>
    <div class="buttonarea">
    	<a href="javascript:void(0);" onclick="filternow();" class="blackback">Filter</a>
        <a href="javascript:void(0);" onClick="myFunction()" class="redkback">Reset</a>
    </div>
    
    </div>
    <div class="col-md-9 col-sm-8 ajaxwhere_to_buy_list">
    
    </div>
  </div>
</div>



</div>