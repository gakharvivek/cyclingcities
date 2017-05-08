 <?if($results!='')
	{
		foreach ($results as $row)
		{?>
			<div class="row brdrbottom marbtm40">
				<div class="col-md-3 col-sm-3">
					<div class="citybox marbtmzero">
						<div class="cityimg news_img_height">
							<img src="<? echo site_url('upload/article');?>/<?=$row->article_image;?>" alt=""/>
						</div>
					   
					  
					</div>
				</div>
				<div class="col-md-9 col-sm-9">
				<div class="cycledetailtextbox padbtm15">
				<?
				  $date = $row->pub_date;
                  $c_date = $row->create_date;
                ?>
				<h1 class="redcolor"><?=$row->article_name;?>E<br/>
				<span class="date"><strong><?=date('dS F Y', strtotime($c_date));?> | Published date <?=date('dS F Y', strtotime($date));?> </strong>| <?=$row->article_type;?> by <?=$row->post_by;?></span></span>
				</h1>
				<p><?=$row->article_desc;?></p>
				<a href="<? echo site_url('news/news_detail');?>/<?=$row->article_id;?>" class="pull-right redcolor">Read more</a>
				 <div class="clear"></div>
				</div>
				</div>
			</div>
		<?}
	}
	else
	{?>
	   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no News.</div>
  <?}?>