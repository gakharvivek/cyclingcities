<script>

$().ready(function() {
	    var value="<?=$value?>";
	    bindimages(value);
	});



	function bindimages(value)
	  {
		  //alert(value);
		  if(value!="")
			{
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						
						document.getElementById("film_roll_1").innerHTML="";
						document.getElementById("film_roll_1").innerHTML=xmlhttp.responseText;
						  this.film_rolls || (this.film_rolls = []);
						  this.film_rolls['film_roll_1'] = new FilmRoll({
							container: '#film_roll_1',
							height: '+10'
						  });
						
					}
				}

				xmlhttp.open("GET","<?=site_url('your_cycle/bindimages')?>/"+value,true);
				xmlhttp.send();
			}
			else
			{
				document.getElementById("film_roll_1").innerHTML='';
				document.getElementById("film_roll_1").innerHTML='<div><img class="img-responsive" src="<?php echo site_url("assets/images/noimagefound.png"); ?>" alt="" /></div>';
			}
	  }
</script>

<div class="comingsoonpage martop64">
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h1>Why <span class="redcolor">Cycle</span></h1>

			<h2 class="caps"><span class="redcolor">Still wondering</span> why cycle when there is luxury of  cars-motorbikes? <br/>
				<span class="redcolor">These reasons</span> will stun you to get back on the saddle.</h2>
		</div>
	</div>
  <div class="row">
  	<div class="col-md-12">
    <div class="sliderpage" style="position:relative; overflow:hidden;">
    <div id='film_roll_1'>
	 <!-- <div><img src="<? echo site_url('assets/images/slider1.jpg');?>"></div>
	  <div><img src="<? echo site_url('assets/images/slider2.jpg');?>"></div>
	  <div><img src="<? echo site_url('assets/images/slider3.jpg');?>"></div>
	  <div><img src="<? echo site_url('assets/images/slider1.jpg');?>"></div>
	  <div><img src="<? echo site_url('assets/images/slider2.jpg');?>"></div>
	  <div><img src="<? echo site_url('assets/images/slider3.jpg');?>"></div>              -->          
	</div>   	
    </div>    
    </div>
  </div>
  
<? //$cms4=$this->cms_fm->getcmsbyid(4);?>
<? //$cms5=$this->cms_fm->getcmsbyid(5);?>
<? //$cms6=$this->cms_fm->getcmsbyid(6);?>
<? //$cms7=$this->cms_fm->getcmsbyid(7);?>
  
  <div class="row">
  	<div class="col-md-12">
    	<div class="tablist">
        <ul>
		    <? $whycyclelist=$this->whycycle_fm->getallwhycycle();?>
			<? foreach($whycyclelist as $list)
				  {?>
					<li><a href="<?php echo site_url('your_cycle/why_cycle');?>/<?=$list['id']?>"><?=$list['title']?></a></li>
				<?}?>
        </ul>
        </div>
        <div class="tabcontent  targetDiv" style="display:block;">
        <p>
		    STILL NOT CONVINCED,<span class="redcolor"><strong><a href="<? echo site_url('chronicles');?>">READ MORE</a></strong></span>  <br/>ABOUT THE  <span class="redcolor">BENEFITS</span> OF CYCLING ?
		</p>
        </div>
    </div>
  </div>
  
</div>
</div>