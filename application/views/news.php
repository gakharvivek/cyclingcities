<script>
   $(document).ready(function () {

		pageurl = "<?php echo site_url('news/ajaxnews_list'); ?>";
		$(".resfooter > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);			
		});
		
		if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

		
		$.ajax({				
			type: "POST",
			url:"<?php echo site_url('news/ajaxnews_list'); ?>",
			data: {limit:limit},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxnews_list").html(data.body);
				$(".resfooter").html(data.pagination_link);
				$("#drpMiles").val(data.drpmilesradius);
				$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}
		});
		
    });

	function GetAjaxList(pageurl)
		{	
		   
			if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

			parpage = "<?php echo site_url('news/ajaxnews_list');?>"+pageurl;
			//alert(parpage);

				$.ajax({				
					type: "POST",
					url:parpage,
					data: {limit:limit},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxnews_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		}

	
</script>
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Our   <span class="redcolor">News </span> Zone</h1>
       
    </div>
  </div>   
</div>


<div class="chroniclesbox fntcentury detailpage">
	<div class="container">  
		<div calss="newsboxmain"> 
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="paginationmenu martopzero">
						<ul class="leftmenu">
							<!-- <li><a href="#">NEWEST</a></li>
							<li><a href="#">MOST LIKED</a></li>
							<li><a href="#">MOST VIEWED</a></li>
							<li><span class="drop">
								<select class="myval">
									<option>Bhuvneswar</option>
								</select>
							</span></li> -->
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="resfooter paginationarea paginationmenu martopzero">
					</div>
				</div>
			</div>
			<div class="ajaxnews_list"></div>
			 <div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="paginationmenu martopzero">
						<ul class="leftmenu">
							<!-- <li><a href="#">NEWEST</a></li>
							<li><a href="#">MOST LIKED</a></li>
							<li><a href="#">MOST VIEWED</a></li>
							<li><span class="drop">
								<select class="myval">
									<option>Bhuvneswar</option>
								</select>
							</span></li> -->
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="resfooter paginationarea paginationmenu martopzero">
					</div>
				</div>
			 </div>
		</div>       
    </div>
</div>
</div>