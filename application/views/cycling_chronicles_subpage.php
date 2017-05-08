<script>
 /* (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=870798359712751";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
*/
   <div id="fb-root"></div>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1840794422849178";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  
 </script>

<style type="text/css">
.carousel {
	background: #2f4357;
	margin-top: 20px;
}
.carousel .item img {
	margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example {
	margin: 20px;
}
</style>
<!-- =========== Home Content Area Strat =========== -->
<div class="comingsoonpage martop64 minheight500">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>CYCLING <span class="redcolor">CHRONICLES </span></h1>
        <h2 class="caps"><span class="redcolor">Every Journey</span> Adds up to a create a beautiful experience. <br/>
			<span class="redcolor">Bringing Most</span> inspirational stories from Indian Cities.</h2>
      </div>
    </div>
  </div>
  <div class="chroniclesbox fntcentury detailpage">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="cyclername">
            <h1>
            	<?php $pieces = explode(" ", $chronicles_sub['story_of']);  ?>
            	<span class="redcolor"><?php echo $pieces[0];?></span>
            	<span><?php echo $pieces[1];?></span> 
            	<span class="cityname">
            		<?php echo $this->chronicles_front_model->getcityById($chronicles_sub['city']); ?>,<?php echo $this->chronicles_front_model->getstateById($chronicles_sub['state']); ?>
            	</span> 
            </h1>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="paginationmenu martopzero"> 
            <!-- <a href="#" class="brdrright">Previous</a> <a href="#">Next</a> --> 
          </div>
        </div>
      </div>
      <div class="row">
      	<div class="col-md-6 col-sm-6">
          	<div class="citybox marbtmzero cronical_slider">
            	<div class="cityimg">
              		<div class="cronical owl-theme">
			   			<? if($chronicles_sub['chronicles_image']!='')
			       			{?>
								<div class="item">
									<img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles_sub['chronicles_image'];?>"/>
								</div>
				 			<?}?>

			   			<? if($chronicles_sub['chronicles_image1']!='')
			       			{?>
								<div class="item">
									<img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles_sub['chronicles_image1'];?>"/>
								</div>
				 			<?}?>

		       			<? if($chronicles_sub['chronicles_image2']!='')
			       			{?>
								<div class="item">
									<img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles_sub['chronicles_image2'];?>"/>
								</div>
				 			<?}?>

		       			<? if($chronicles_sub['chronicles_image3']!='')
			       			{?>
								<div class="item">
									<img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles_sub['chronicles_image3'];?>"/>
								</div>
				 			<?}?>

			   			<? if($chronicles_sub['chronicles_image4']!='')
			       			{?>
								<div class="item">
									<img src="<?php echo site_url('upload/chronicles'); ?>/<?php echo $chronicles_sub['chronicles_image4'];?>"/>
								</div>
				 			<?}?>
              		</div>
              		<span class="social"><!-- <a href="#" class="fa fa-inbox one"></a> 
						<a href="#" class="fa fa-whatsapp two"></a>  --> 
						
						<div class="fb-share-button" data-href="http://dev.cyclingcities.in" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdev.cyclingcities.in%2F&amp;src=sdkpreparse">Share</a></div>		
						
              		<a class="fb-xfbml-parse-ignore fa fa-facebook three" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F870798359712751&amp;src=sdkpreparse"></a> <a href="https://twitter.com" target="_blank" class="fa fa-twitter four"></a> <a href="https://plus.google.com" target="_blank" class="fa fa-google-plus five"></a></span> </div>
          		</div>
       		</div>
       		<div class="cycledetailtextbox">
            	<h1 class="redcolor"><?php echo $chronicles_sub['chronicles_title']; ?><br/>
              	<span class="date"><?php echo $chronicles_sub['chronicles_date']; ?> | <?php echo $this->chronicles_front_model->getusername($chronicles_sub['post_by']); ?> | <span class=""><span class=""><img src="http://www.free-icons-download.net/images/eye-symbol-icon-20733.png" height="20"></span> <a href="http://www.hitwebcounter.com" target="_blank"> <img src="http://hitwebcounter.com/counter/counter.php?page=6421077&style=0008&nbdigits=5&type=ip&initCount=0" title="" Alt=""   border="0" height="12" > </a></span></span> </h1>
            	<p><?php echo $chronicles_sub['chronicles_desc']; ?></p>
          	</div>
       	</div>
        <div class="col-md-6 col-sm-6">
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 col-sm-6 brdrtop padrightzero brdrright">
          <div class="postlist brdrbottom">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <div class="jimimage"> 
				    <? if($this->chronicles_front_model->getuserpic($chronicles_sub['post_by'])!='')
					   {?>
							
							<img src="<?php echo site_url('upload/user'); ?>/<?php echo $this->chronicles_front_model->getuserpic($chronicles_sub['post_by']);?>" style="max-width:100%"/>
					 <?}
					 else
					   {?>
							<img src="<?php echo site_url('assets/images'); ?>/img_jimcarry.png"/> 
					 <?}?>
			    </div>
              </div>
              <div class="col-md-10 col-sm-9">
                <h2><?php echo $this->chronicles_front_model->getusername($chronicles_sub['post_by']); ?></h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim venincut laoreet dolore .</p> --> 
                <span class="viewalllink"><a href="<?php echo site_url('chronicles/index');?>/<?=$chronicles_sub['post_by']?>">VIEW ALL POSTS BY</a> <?php echo $this->chronicles_front_model->getusername($chronicles_sub['post_by']); ?></span> </div>
            </div>
          </div>
          <!-- <div class="postlist brdrbottom">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="tags"> <strong>Tags:</strong> 

				<? 
				  $str = $chronicles_sub['chronicles_tag'];
                  $tags=(explode(",",$str));
				?>
				<?if(count($tags))
				  {
					  foreach ($tags as $row)
						{?>
						   <a href="<?php echo site_url('chronicles/index/0');?>/<?=$row?>"><?=$row?></a>,
					  <?}
				}?></div>
              </div>
            </div>
          </div> -->
          <div class="col-md-5 col-sm-6 brdrtop padleftzero">
          <!-- <div class="postlist"> <span class="fnt14 pull-right"><span class=""><img src="http://www.free-icons-download.net/images/eye-symbol-icon-20733.png" height="20"></span> <a href="http://www.hitwebcounter.com" target="_blank"> <img src="http://hitwebcounter.com/counter/counter.php?page=6421077&style=0008&nbdigits=5&type=ip&initCount=0" title="" Alt=""   border="0" height="12" > </a></span>
            <div class="clear"></div>
          </div> --> 
          <!-- <div class="postlist brdrbottom padtopzero padbtmzero"> 
            <img src="images/gujaratmap.jpg" alt="" class="img-responsive"/>
            <div id="gmap_canvas" class="pull-right" style=" height:170px; width:100%; "></div>
            <a class="google-map-code" href="#" id="get-map-data"></a> 
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
          </div> -->
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="fb-comments" data-href="http://cyclingcities.local/" data-width="100%" data-numposts="5"></div>
    </div>
  </div>
</div>
<!-- =========== Home Content Area End =========== --> 
<script type="text/javascript"> 
              function init_map() {
                var myOptions = {zoom: 14, center: new google.maps.LatLng(40.805478, -73.96522499999998), mapTypeId: google.maps.MapTypeId.ROADMAP};
                map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(40.805478, -73.96522499999998)});
                infowindow = new google.maps.InfoWindow({content: "<b>The Circle</b><br/>2880 Broadway<br/> New York"});
                google.maps.event.addListener(marker, "click", function () {
                  infowindow.open(map, marker);
                });
                infowindow.open(map, marker);
              }
              google.maps.event.addDomListener(window, 'load', init_map);</script>
              
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://cyclingcities.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                