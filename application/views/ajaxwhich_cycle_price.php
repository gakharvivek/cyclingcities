<?php //print_r($which_cycle_page); exit;
    if($results!='')
	{
		$i=0;
		foreach ($results as $row)
		 {
			?>
		    <div class="col-md-4 col-sm-6">
				<div class="asceboxmain">
					<div class="asceimg">
					      <? if($row->img1!='')
							{
								$chk = file_exists(FCPATH.'/upload/model/'.$row->img1);
								if($chk == 1)
								{?>
									<img class="img-responsive" src="<?php echo site_url('upload/model'); ?>/<?php echo $row->img1; ?>" alt="" />
							  <?}
								else
								{?>
									<img class="img-responsive" src="<?php echo site_url('assets/images/noimagefound.jpg'); ?>" alt="" />
						      <?}
							}
						  else
						    {?>
								<img class="img-responsive" src="<?php echo site_url('assets/images/noimagefound.jpg'); ?>" alt="" />
						  <?}?> 
					</div>
					<div class="ascelisttext">
					<? 
					  $m1=$row->model_id;
                      $b1=$row->brand_id; ?>
					<ul>
						<li><span class="redcolor bold">brand</span> <span class=""><?php echo $this->which_cycle_type_model->getbrandname($row->brand_id); ?></span></li>
						<li><span class="redcolor bold">Model</span> <span class=""><?php echo $row->name; ?></span></li>
						<li><span class="redcolor bold">PRICE</span> <span class=""><?php echo $row->price; ?>/-</span></li>
						<li> <a href="<?php echo site_url('your_cycle/which_cycle_sub'); ?>/<?php echo $row->model_id; ?>">More Detail</a></li>
						<li class="compamre"> <input type="checkbox" id="chb<?php echo $i; ?>"  name="chb<?php echo $i; ?>" class="chkbx single-checkbox" value="<?php echo $row->model_id; ?>"> <label for="chb<?php echo $i; ?>">SELECT TO COMPARE</label> </li>
					</ul>
						</div>
				</div>
			</div>
	   <? $i++;}?>
  <?}
	else
	{?>
	   <div class="item  col-xs-12 col-sm-6 col-md-4">There are no Items.</div>
	<?}?>

<script>
  $(document).ready(function () {
	   $(".single-checkbox").change(function () {
	      var maxAllowed = 3;
	      var cnt = $(".single-checkbox:checked").length;
	      if (cnt > maxAllowed)
	      {
	         $(this).prop("checked", "");
	         alert('Select maximum ' + maxAllowed + ' Cycles!');
	     }
	  });
	});

  $(function(){
   $("#btnSave").click(function(e){
        e.preventDefault();
        var items=$(".chkbx:checked").map(function () {
            return this.value;
        }).get().join('/');
        
		var minAllowed = 3;
        var cnt = $(".single-checkbox:checked").length;
	      if (cnt < 3)
	      {
	         alert('Select minimum ' + minAllowed + ' Cycles!');
	      }
		  else
	      {
			  window.location.href="<?php echo site_url('your_cycle/compare_cycle');?>/"+items;
	      }     
   });           
  });
</script> 