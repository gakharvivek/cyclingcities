<div class="comingsoonpage martop64 minheight500">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>ABOUT  <span class="redcolor">CYCLING CITIES </span></h1>
        <h2><span class="redcolor">Sampe text</span> to how to go ahead in choosing the cycle, <br/>
sampe text <span class="redcolor"> &  choose the cycles by</span></h2>
    </div>
  </div>
  <div class="abouttext">
  <? if(isset($about1['article_desc']))
	   {?>
		  <p><?php echo $about1['article_desc']; ?></p>
	 <?}?>
  
  <h1 class="martop30">OUR <span class="redcolor">STRATEGY </span></h1>
  <? if(isset($about2['article_desc']))
	   {?>
		  <p><?php echo $about2['article_desc']; ?></p>
	 <?}?>
   <h1 class="martop30">OUR <span class="redcolor">TEAM </span></h1>
  <? if(isset($about3['article_desc']))
	   {?>
		  <p><?php echo $about3['article_desc']; ?></p>
	 <?}?>

	<?if (isset($team)) 
		{?>
		   <div class="teammember">
			<ul>
			   <? foreach ($team as $row) 
				   {?>
					 <li>
						<span class="teampic"><img src="<? echo site_url('upload/team');?>/<?=$row['pic'] ?>" alt=""/></span>
						<span class="teamname fntcentury"><strong><?=$row['f_name'] ?> <?=$row['l_name'] ?></strong><br/><?=$row['desig'] ?></span>
						<span class="sociallinks">
						  <?if ($row['facebook'] != '') 
							 {?> 
								<a href="<?=$row['facebook'];?>" target="_blank"><i class="fa fa-facebook"></i></a> 
						   <?}?>
						  <?if ($row['tweeter'] != '') 
							 {?> 
								<a href="<?=$row['tweeter'];?>" target="_blank"><i class="fa fa-tweeter"></i></a> 
						   <?}?>
						  <?if ($row['linkedin'] != '') 
							 {?> 
								<a href="<?=$row['linkedin'];?>" target="_blank"><i class="fa fa-linkedin"></i></a> 
						   <?}?>
						</span>
					 </li>      
				 <?}?>
			</ul>
		   </div>
      <?}?>
   

   <?if (isset($partner)) 
		{?>
		   <h1 class="martop45">Our <span class="redcolor">Partners</span></h1>
		   <div class="partnerslogo">
			<ul>
			   <? foreach ($partner as $row) 
				   {?>
					 <li><img class="group list-group-image img-responsive" src="<? echo site_url('upload/logo');?>/<?=$row['logo']; ?>" alt=""/></li>
				 <?}?>
			</ul>
            <div class="clear"></div>
           </div>
      <?}?>
   
   
   <h1>OUR <span class="redcolor">PROJECTS</span></h1>
   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed di exam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo conse exquat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.san et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
  </div>
  
</div>
</div>