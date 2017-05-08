<div class="comingsoonpage martop64">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>My <span class="redcolor">CYCLE</span></h1>
        <h2><span class="redcolor">MY RIDES</span> AS TO HOW TO GO AHEAD IN CHOOSING THE CYCLE, <br/>
SAMPLE TEXT HERE & CHOOSE <span class="redcolor">THE CYCLES BY</span></h2>
<div class="mycycledetailpage">
<div class="col-md-5 col-sm-6 col-md-offset-1">
    <img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics']; ?>" class="img-responsive " alt=""/>
</div>
<div class="col-md-4 col-sm-6 col-md-offset-1">
	<div class="detailtext fntcentury">
    	<span><strong>BRAND</strong> <?php echo $this->mycycle_individualedit_model->getbrandname($result['brand_id']); ?></span>
        <span><strong>MODEL</strong> <?php echo $this->mycycle_individualedit_model->getmodelname($result['model_id']); ?></span>
        <span><strong class="blackfnt">CYCLE TYPE</strong><?php echo $result['cycle_type']; ?> </span>
        <span><strong class="blackfnt">PURCHASE YEAR</strong> <?php echo $result['purchase_year']; ?> </span>
        <h3>Additional <span class="redcolor">Information</span></h3>
        <p><?php echo $result['add_info']; ?> <!-- <a href="#" data-toggle="modal" data-target="#myModalreadmore">Read more</a> --></p>
    </div>
</div>	
<div class="col-md-1">
		<div class="text-center marginb30">
			<a href="<?php echo site_url('myactivity/mycycle_edit');?>/<?php echo $result['cycle_id']; ?>"><i class="fa fa-edit"></i></a>
			<!--<a href="<?php //echo site_url();  ?>" class="btn btn-danger btn-login">Edit</a>-->
		</div>
	</div>
<div class="col-md-12">
<!--<div class="detailcarousel">
<div id="owl-example" class="owl-carousel">
          <div class="owl-item">
            <div class="thumbnailimgbox my_cycle_box">
    			<span><img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics']; ?>" class="img-responsive " alt=""/></span>
    			
    		</div>
          </div>
          <div class="owl-item">
            <div class="thumbnailimgbox my_cycle_box">
    		<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics1']; ?>" class="img-responsive " alt=""/></span>
    		</div>
          </div>
          <div class="owl-item">
            <div class="thumbnailimgbox my_cycle_box">
    		<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics2']; ?>" class="img-responsive " alt=""/></span>
    		</div>
          </div>
          <div class="owl-item">
            <div class="thumbnailimgbox my_cycle_box">
    		<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics3']; ?>" class="img-responsive " alt=""/></span>
    		</div>
          </div>
 </div>-->

<div class="col-md-3 col-sm-3 my_cycle_box1">
	<span><img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics']; ?>" class="img-responsive " alt=""/></span>
</div>
<div class="col-md-3 col-sm-3 my_cycle_box1">
	<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics1']; ?>" class="img-responsive " alt=""/></span>
</div>
<div class="col-md-3 col-sm-3 my_cycle_box1">
	<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics2']; ?>" class="img-responsive " alt=""/></span>
</div>
<div class="col-md-3 col-sm-3 my_cycle_box1">
	<span>	<img src="<?php echo site_url('upload/cycle_pics'); ?>/<?php echo $result['cycle_pics3']; ?>" class="img-responsive " alt=""/></span>
</div>
   
</div>
</div>
</div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div id="myModalreadmore" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md"  style="max-width:500px;">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body additionladpopup">
      <a href="#"  class="close btnclose" data-dismiss="modal">&times;</a>
     
        <h2 class="embosbrdr">ADDITIONAL DTAILS</h2>
        <ul>
        <li>Lorem ipsum dolor sit amett, consectetuer adipiscing elit, sed diam nonummy.</li>
         <li>Lorem ipsum dolor sit amett, consectetuer adipiscing elit, sed diam nonummy.</li>
          <li>Lorem ipsum dolor sit amett, consectetuer adipiscing elit, sed diam nonummy.</li>
           <li>Lorem ipsum dolor sit amett, consectetuer adipiscing elit, sed diam nonummy.</li>
            <li>Lorem ipsum dolor sit amett, consectetuer adipiscing elit, sed diam nonummy.</li>
        </ul>
       
      </div>
      
    </div>

  </div>
</div>