<script>
   $(document).ready(function () {

		pageurl = "<?php echo site_url('gallery/ajaxgallery_list'); ?>";
		$(".resfooter > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);			
		});
		
		if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}

		var sorting = $('#sorting').val();
		
		$.ajax({				
			type: "POST",
			url:"<?php echo site_url('gallery/ajaxgallery_list'); ?>",
			data: {limit:limit,sorting:sorting},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxgallery_list").html(data.body);
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

			var sorting = $('#sorting').val();
			
			parpage = "<?php echo site_url('gallery/ajaxgallery_list');?>"+pageurl;
			//alert(parpage);

				$.ajax({				
					type: "POST",
					url:parpage,
					data: {limit:limit,sorting:sorting},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxgallery_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
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
			$('#sorting').val(value);
			var sorting = value;
			
			//var sorting = $('#price').val();
			pageurl = "<?php echo site_url('gallery/ajaxgallery_list'); ?>";
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
			url:"<?php echo site_url('gallery/ajaxgallery_list'); ?>",
			data: {limit:limit,sorting:sorting},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxgallery_list").html(data.body);
				$(".resfooter").html(data.pagination_link);
				$("#drpMiles").val(data.drpmilesradius);
				$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}
		   });	
		} 
</script>

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
<!-- =========== Home Content Area Strat =========== -->
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1><span class="redcolor">Gallery </span></h1>
        <h2 class="caps"><span class="redcolor">Missed Anything Interesting?</span> we have all of it here for you. <br/>
			<span class="redcolor">Explore More</span> in the world of urban cycling.</h2>
    </div>
  </div>   
</div>

<input type="hidden" id="sorting" name="sorting" value="">
<div class="chroniclesbox martop30 backnone">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="paginationmenu martopzero">
                	<ul class="leftmenu">
                    	<li><a href="javascript:void(0);" onclick="searchbysort('newest')">NEWEST</a></li>
                        <!-- <li><a href="#">MOST LIKED</a></li>
                        <li><a href="#">MOST VIEWED</a></li>
                        <li><span class="drop">
                        	<select class="myval">
                            	<option>All</option>
                            </select>
                        </span></li> -->
                      
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            	<div class="resfooter paginationmenu martopzero">
                	<!-- <a href="#" class="brdrright">Previous</a> <a href="#">Next</a> -->
                </div>
            </div>
        </div>
		<div class="row ajaxgallery_list"></div>
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="paginationmenu martopzero">
                	<ul class="leftmenu">
                    	<li><a href="javascript:void(0);" onclick="searchbysort('newest')">NEWEST</a></li>
                        <!-- <li><a href="#">MOST LIKED</a></li>
                        <li><a href="#">MOST VIEWED</a></li> -->
                        
                      
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            	<div class="resfooter paginationmenu martopzero">
                	<!-- <a href="#" class="brdrright">Previous</a> <a href="#">Next</a> -->
                </div>
            </div>
        </div>
    </div>
	
</div>
</div>