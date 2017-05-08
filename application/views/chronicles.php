<script>
   $(document).ready(function () {
		pageurl = "<?php echo site_url('chronicles/ajaxchronicles_list'); ?>";
		$(".resfooter > ul li a").on("click",function(e){
				e.preventDefault();				
				GetAjaxList(pageurl);			
		});
		
		if(jQuery('#showgrid').val()==""){
				var limit = 1;
			}else{
				var limit = jQuery('#showgrid').val();
			}
        var tags=$('#tags').val();
		var post_by=$('#post_by').val();
		var cate_id=$('#cate_id').val();
		var sorting = $('#sorting').val();
		var searchbycity = $('#searchbycity').val();
		
		$.ajax({				
			type: "POST",
			url:"<?php echo site_url('chronicles/ajaxchronicles_list'); ?>",
			data: {limit:limit,cate_id:cate_id,sorting:sorting,searchbycity:searchbycity,post_by:post_by,tags:tags},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxchronicles_list").html(data.body);
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
            
			var tags=$('#tags').val();
			var post_by=$('#post_by').val();
			var cate_id=$('#cate_id').val();
			var sorting = $('#sorting').val();
			var searchbycity = $('#searchbycity').val();

			parpage = "<?php echo site_url('chronicles/ajaxchronicles_list');?>"+pageurl;
			//alert(parpage);

				$.ajax({				
					type: "POST",
					url:parpage,
					data: {limit:limit,cate_id:cate_id,sorting:sorting,searchbycity:searchbycity,post_by:post_by,tags:tags},
					//data: 'limit='+limit+',&table=all',
					success: function(data){
						$(".ajaxchronicles_list").html(data.body);
						$(".resfooter").html(data.pagination_link);
						$("#drpMiles").val(data.drpmilesradius);
						$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				});
		}

	function openchroniclesbycate_id(cate_id)
		{	
			var tags=$('#tags').val();
			var post_by=$('#post_by').val();
			$('#searchbycity').select2('val','');
			$('#sorting').val('');
			$('#cate_id').val(cate_id);
			var sorting = $('#sorting').val();
			var searchbycity = $('#searchbycity').val();
			//var sorting = $('#price').val();
			pageurl = "<?php echo site_url('chronicles/ajaxchronicles_list'); ?>";
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
			url:"<?php echo site_url('chronicles/ajaxchronicles_list'); ?>",
			data: {limit:limit,cate_id:cate_id,sorting:sorting,searchbycity:searchbycity,post_by:post_by,tags:tags},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxchronicles_list").html(data.body);
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
			var tags=$('#tags').val();
			var post_by=$('#post_by').val();
			$('#sorting').val(value);
			var cate_id=$('#cate_id').val();
			var sorting = value;
			var searchbycity = $('#searchbycity').val();
			
			
			//var sorting = $('#price').val();
			pageurl = "<?php echo site_url('chronicles/ajaxchronicles_list'); ?>";
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
			url:"<?php echo site_url('chronicles/ajaxchronicles_list'); ?>",
			data: {limit:limit,cate_id:cate_id,sorting:sorting,searchbycity:searchbycity,post_by:post_by,tags:tags},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxchronicles_list").html(data.body);
				$(".resfooter").html(data.pagination_link);
				$("#drpMiles").val(data.drpmilesradius);
				$("#selectdrpMiles").html($("#drpMiles option[value='"+data.drpmilesradius+"']").text());
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}
		   });	
		} 

	function filternow(value)
		{	
			var tags=$('#tags').val();
			var post_by=$('#post_by').val();
			var cate_id=$('#cate_id').val();
			var sorting = $('#sorting').val();
			var searchbycity = value;
			
			
			//var sorting = $('#price').val();
			pageurl = "<?php echo site_url('chronicles/ajaxchronicles_list'); ?>";
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
			url:"<?php echo site_url('chronicles/ajaxchronicles_list'); ?>",
			data: {limit:limit,cate_id:cate_id,sorting:sorting,searchbycity:searchbycity,post_by:post_by,tags:tags},
			//data: 'limit='+limit+',&table=all',
			success: function(data){
				$(".ajaxchronicles_list").html(data.body);
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
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Cycling <span class="redcolor">Chronicles</span></h1>
        <h2 class="caps"><span class="redcolor">Every Journey</span> Adds up to a create a beautiful experience. <br/>
			<span class="redcolor">Bringing Most</span> inspirational stories from Indian Cities.</h2>
    </div>
  </div>   
</div>

<div class="menutwo">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
				<nav class="navbar navbar-default">
					<div>
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
					  </div>
					  <div id="navbar2" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
						  <? foreach ($ch_category as $row1) 
						      {?>
							     <li><a href="javascript:void(0);" onclick="openchroniclesbycate_id(<?php echo $row1['cate_id']; ?>)"><?php echo $row1['cate_name']; ?></a></li>
							<?}?>
						  <!-- <li class="active"><a href="#">CLUBS </a></li>
						  <li><a href="#">CITIZENS</a></li>
						  <li><a href="#">CRUSADERS </a></li>  
						  <li><a href="#">CELEBRITIES</a></li>   
						  <li><a href="#">CORPORATE</a></li>
						  <li><a href="#">CAMPUSES</a></li> 
						  <li><a href="#">CAFES</a></li>
						  <li><a href="#">COOKS</a></li>
						  <li><a href="#">ROUTES</a></li>
						  <li><a href="#">TRIPS</a></li>
						  <li><a href="#">TIPS</a></li> -->
						</ul>
					  </div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</nav>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="cate_id" name="cate_id" value="">
<input type="hidden" id="sorting" name="sorting" value="">
<input type="hidden" id="post_by" name="post_by" value="<?=$post_by?>">
<input type="hidden" id="tags" name="tags" value="<?=$tags?>">
<div class="chroniclesbox">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="paginationmenu martopzero">
                	<ul class="leftmenu">
                    	<li><a href="javascript:void(0);" onclick="searchbysort('newest')">NEWEST</a></li>
                        <!-- <li><a href="javascript:void(0);" onclick="searchbysort('mostliked')">MOST LIKED</a></li>
                        <li><a href="javascript:void(0);" onclick="searchbysort('mostviewed')">MOST VIEWED</a></li> -->
                        <li><span class="drop">
                        	<select  class="myval" id="searchbycity" name="searchbycity" onChange="filternow(this.value)">
							    <option value=""> Select City</option>
                            	<?foreach ($cities as $row) 
								   {?>
									  <option value="<?php echo $row['city']; ?>" > <?php echo $this->chronicles_front_model->getcityById($row['city']) ;?> </option>
								 <?}?> 
                            </select>
                        </span></li>
                      
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            	<div class="resfooter paginationmenu martopzero">
                	<!-- <a href="#" class="brdrright">Previous</a> <a href="#">Next</a> -->
                </div>
            </div>
        </div>
        <div class="row ajaxchronicles_list"></div>
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="paginationmenu martopzero">
                	<ul class="leftmenu">
                    	<li><a href="javascript:void(0);" onclick="searchbysort('newest')">NEWEST</a></li>
                        <!-- <li><a href="javascript:void(0);" onclick="searchbysort('mostliked')">MOST LIKED</a></li>
                        <li><a href="javascript:void(0);" onclick="searchbysort('mostviewed')">MOST VIEWED</a></li> -->
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