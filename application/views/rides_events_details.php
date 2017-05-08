 <script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=870798359712751";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>   <span class="redcolor">Rides </span> &amp; <span class="redcolor">Events </span></h1>
       
    </div>
  </div>   
</div>


<div class="chroniclesbox fntcentury detailpage">
	<div class="container">  
    <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="cyclername"><h1><span class="redcolor"><?php echo $rides_events['category']; ?> IN <strong>VADODARA</strong> - </span> <?php echo $rides_events['ride_title']; ?></h1></div>
            </div>
            <!-- <div class="col-md-6 col-sm-6">
            	<div class="paginationmenu martopzero">
                	<a href="#" class="brdrright">Previous</a> <a href="#">Next</a>
                </div>
            </div> -->
        </div>  	
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            <div class="rideseventsimgbox">
			    <div class="citybox marbtm10">
						<div class="cityimg">
							<img src="<?php echo site_url('upload/ride/poster'); ?>/<?php echo $rides_events['ride_poster']; ?>" class="img-responsive">
							<span class="social">
								<a href="#" class="fa fa-share one"></a> 
								<!-- <a href="#" class="fa fa-whatsapp two"></a>  -->
								<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F870798359712751&amp;src=sdkpreparse" target="_blank"  class="fa fa-facebook three"></a>
								<a href="https://twitter.com" target="_blank" class="fa fa-twitter four"></a>
								<a href="https://plus.google.com" target="_blank" class="fa fa-google-plus five"></a>
							</span>
						</div>
				</div>
            	<!-- <div id="owl-example6" class="owl-carousel">
				  <div class="owl-item">
					
				  </div>
                </div> -->
            </div>
            
            	
            </div>
            <div class="col-md-6 col-sm-6">
            <div class="cycledetailtextbox rideandevemnts">   
            <div class="postlist padtopzero brdrbottom"> 
			<?php $ride_date = $rides_events['ride_date']; ?>
            <div class="date fnt18 marbtm7"></span><?php echo date('D dS F, Y', strtotime($ride_date)); ?>,  <?php echo $rides_events['ride_time']; ?></div>
            <div class="date fnt18 marbtm7"><span class="redcolor">START POINT</span> - <?php echo $rides_events['ride_start_point']; ?></div>
            <div class="date fnt18 marbtm7"><span class="redcolor">END POINT</span> - <?php echo $rides_events['ride_end_point']; ?></div>
            <div class="date fnt18 marbtm7"><span class="redcolor">ORGANIZED BY</span> - <?php echo $rides_events['ride_organizer']; ?></div>
           </div>
           <div class="postlist brdrbottom">
           	<strong class="fnt22"><span class="redcolor">TOTAL DISTANCE</span> <span class="darkcolor"><?php echo $rides_events['ride_distance']; ?> KM</span></strong>
           </div>
            <div class="postlist brdrbottom">
            <table border="0" cellpadding="0" cellspacing="0" class="jointtable">
            	<tr>
                	<td><img src="<? echo site_url('assets/images/joinride.jpg');?>" alt=""/></td><td style="width:50px;">&nbsp;</td>
                    <td valign="middle"><span class="fnt40 pull-left fntcount"><strong><?php echo $rides_events['no_of_rider']; ?></strong></span>
                    <span class="fnt18 redcolor peopletext pull-left">PEOPLE <br/> ARE RIDING</span></td>
                </tr>
            </table>
            	
            </div>
            <!-- <div class="postlist">
            <p><strong><?php echo $rides_events['add_info']; ?></strong></p>
            </div> -->
            </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            <div class="cycledetailtextbox">
            	<p><?php echo $rides_events['add_info']; ?></p>
            </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-7 col-sm-6 brdrtop padrightzero brdrright">
                <!-- <div class="postlist brdrbottom">
					<div>
						<div class="col-md-2 col-sm-3">
						<div class="jimimage">
							<img src="<? echo site_url('assets/images/img_jimcarry.png');?>"/>
							</div>
						</div>
						<div class="col-md-10 col-sm-9">
							<h2>Jim carry</h2>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim venincut laoreet dolore .</p>
							<span class="viewalllink"><a href="#">VIEW ALL POSTS BY</a> JIM CARRY</span>
						</div>
						<div class="clear"></div>
					</div>
                </div> -->
                <div class="postlist brdrbottom">
            	<div class="row">
                	<div class="col-md-12 col-sm-12">
                    	<div class="tags">
                        <strong>Tags:</strong> Rides , Cycling , Cities , Mountain bikes
                        </div> 
                    </div>
                </div>
                </div>
                <!-- <div class="postlist brdrbottom">
            		<div class="comments fnt20 pad10">
                    0 <strong>Comments</strong>
                    </div>
                </div> -->
                <div class="postlist brdrbottom">
            		<div class="addcomments fnt14">
                  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#https://developers.facebook.com/docs/plugins/870798359712751" data-width="500" data-numposts="5"></div>
                    </div>
                </div>
                <div class="postlist">&nbsp;</div>
            </div>
            <div class="col-md-5 col-sm-6 brdrtop padleftzero">
            	<!-- <div class="postlist brdrbottom">
                	<span class="fnt14 pull-right"><span class="redcolor">VIEWES</span> 23</span>
                    <div class="clear"></div>
                </div> -->
                <div class="postlist brdrbottom padtopzero padbtmzero">
				   <!-- <div id="gmap_canvas" class="pull-right" style=" height:170px; width:500px; "></div>
                   <a class="google-map-code" href="#" id="get-map-data"></a>
				   <script type="text/javascript"> function init_map() {
						  var myOptions = {zoom: 14, center: new google.maps.LatLng(40.805478, -73.96522499999998), mapTypeId: google.maps.MapTypeId.ROADMAP};
						  map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
						  marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(40.805478, -73.96522499999998)});
						  infowindow = new google.maps.InfoWindow({content: "<b>The Circle</b><br/>2880 Broadway<br/> New York"});
						  google.maps.event.addListener(marker, "click", function () {
							infowindow.open(map, marker);
						  });
						  infowindow.open(map, marker);
						}
						google.maps.event.addDomListener(window, 'load', init_map);
				   </script> -->
				 
                  <img src="<?php echo site_url('upload/ride/map'); ?>/<?php echo $rides_events['map_image']; ?>" alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
        
    </div>
	
</div>
</div>