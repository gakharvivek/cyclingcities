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
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="citybox marbtmzero">
                	<div class="cityimg">
					    <img src="<?php echo site_url('upload/article'); ?>/<?=$news_detail['article_image'];?>" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            <div class="cycledetailtextbox">
			<?
			  $date=$news_detail['pub_date'];
              $c_date=$news_detail['create_date'];
			?>
            <h1 class="redcolor"><?=$news_detail['article_name'];?><br/>
            <span class="date"><strong><?=date('dS F Y', strtotime($c_date)); ?> | Published date <?=date('dS F Y', strtotime($date)); ?> </strong>| <?=$news_detail['article_type'];?>  by <?=$news_detail['post_by'];?></span></span>
            </h1>
            <p><?=$news_detail['article_desc']; ?></p>
             
            </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<span class="pull-right alink"><a href="<? echo site_url('news');?>">BACK</a></span>
            </div>
        </div>
        
    </div>
	
</div>
</div>