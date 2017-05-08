<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Shop </div>
        <div class="box-body with-border">
            <?php echo form_open_multipart('admins/shop/edit'); ?>
            <!-- text input -->

            <div class="form-group ">
                <label>Shop Name</label>
                <input type="text" class="form-control" name="shop_name" value="<?php echo $result['shop_name'] ?>"/>
            </div>
             <div class="form-group ">
                <label>Available Brand</label>
                <input type="text" class="form-control" name="brand" value="<?php echo $result['brand'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Shop Lowest Price</label>
                <input type="text" class="form-control" name="price_low" value="<?php echo $result['price_low'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Shop Highest Price</label>
                <input type="text" class="form-control" name="price_high" value="<?php echo $result['price_high'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Owner</label>
                <input type="text" class="form-control" name="owner" value="<?php echo $result['owner'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Time</label>
                <input type="text" class="form-control" name="time" value="<?php echo $result['time'] ?>"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address"><?php echo $result['address'] ?></textarea>
            </div>
            <div class="form-group ">
                <label>Phone1</label>
                <input type="text" class="form-control" name="phone1" value="<?php echo $result['phone1'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Phone2</label>
                <input type="text" class="form-control" name="phone2" value="<?php echo $result['phone2'] ?>"/>
            </div>
            <div class="form-group ">
                <label>State</label>
                <select class="form-control state" name="state" id="state" required>
                    <?php foreach ($st as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if ($result['state'] == $row['id']) {echo "selected";} ?> ><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>City</label>
                <select class="form-control city" name="city" id="city" required>
                    <option value=''>Select City</option>
                </select>
            </div>
            <div class="form-group ">
                <label>Website</label>
                <input type="text" class="form-control" name="website" value="<?php echo $result['website'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Online order</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="o_order" value="Yes" <?php if($result['o_order']=='Yes'){echo 'checked';}?>>&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="o_order" value="No" <?php if($result['o_order']=='No'){echo 'checked';}?>>&nbsp; No
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label>Home Delivery</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="h_delivery" value="Yes" <?php if($result['h_delivery']=='Yes'){echo 'checked';}?>>&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="h_delivery" value="No" <?php if($result['h_delivery']=='No'){echo 'checked';}?>>&nbsp; No
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label>Service Repair</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="service_repair" value="Yes" <?php if($result['service_repair']=='Yes'){echo 'checked';}?>>&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="service_repair" value="No" <?php if($result['service_repair']=='No'){echo 'checked';}?>>&nbsp; No
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img"/>
                 <? if($result['shop_img']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_img'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old"  value="<?php echo $result['shop_img'] ?>" />
            </div>
              <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img1"/>
                 <? if($result['shop_img1']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_img1'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old1"  value="<?php echo $result['shop_img1'] ?>" />
            </div>
              <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img2"/>
                  <? if($result['shop_img2']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_img2'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old2"  value="<?php echo $result['shop_img2'] ?>" />
            </div>
              <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer"/>
                  <? if($result['shop_offer']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old3"  value="<?php echo $result['shop_offer'] ?>" />
            </div>
              <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer1"/>
                  <? if($result['shop_offer1']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer1'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old4"  value="<?php echo $result['shop_offer1'] ?>" />
            </div>
            <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer2"/>
                  <? if($result['shop_offer2']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer2'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old5"  value="<?php echo $result['shop_offer2'] ?>" />
            </div>
            <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer3"/>
                  <? if($result['shop_offer3']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer3'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old6"  value="<?php echo $result['shop_offer3'] ?>" />
            </div>
             <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer4"/>
                  <? if($result['shop_offer4']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer4'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old7"  value="<?php echo $result['shop_offer4'] ?>" />
            </div>
               <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer5"/>
				 <? if($result['shop_offer5']!=''){?>
                 <img src="<?php echo site_url('upload/shop_img');?>/<?php echo $result['shop_offer5'];?>" width="100px" />
				 <?}?>
                <input type="hidden" name="image_old8"  value="<?php echo $result['shop_offer5'] ?>" />
            </div>
            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['shop_id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/shop');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
<?php form_close(); ?>
        </div>
    </div>
</div>
<script>
  
      $(document).ready(function () {
        var stid = $('.state').val();
        var ctid = '<?php echo $result['city']; ?>';
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/shop/aj_city"); ?>',
            type: 'POST',
            data: {id: stid, ct_id: ctid},
            success: function (data) {
                $(".city").html("");
                $(".city").html(data);
            }
        });
    });
    //get Publisher 
  $(".state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/shop/aj_city"); ?>',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $(".city").html("");
        $(".city").html(data);
      }
    });
  });
</script>