<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Shop </div>
        <div class="box-body with-border">
<?php echo form_open_multipart('admins/shop/add'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Shop Name</label>
                <input type="text" class="form-control" name="shop_name" required/>
            </div>
            <div class="form-group ">
                <label>Available Brand</label>
                <input type="text" class="form-control" name="brand" placeholder="e.g. HERO, BSA, HONDA, HERCULES" required/>
            </div>
             <div class="form-group ">
                <label>Shop Lowest Price</label>
                <input type="text" class="form-control" name="price_low" placeholder="e.g. 3000" required/>
            </div>
            <div class="form-group ">
                <label>Shop Highest Price</label>
                <input type="text" class="form-control" name="price_high" placeholder="e.g. 200000" required/>
            </div>
            <div class="form-group ">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="e.g. xyz03@gmail.com"/>
            </div>
            <div class="form-group ">
                <label>Owner</label>
                <input type="text" class="form-control" name="owner"/>
            </div>
            <div class="form-group ">
                <label>Time</label>
                <input type="text" class="form-control" name="time" placeholder="e.g. 10:00 AM/PM"/>
            </div>
            <div class="form-group ">
                <label>Address</label>

                <textarea class="form-control" name="address"></textarea>
            </div>
            <div class="form-group ">
                <label>Phone1</label>
                <input type="text" class="form-control" name="phone1"/>
            </div>
            <div class="form-group ">
                <label>Phone2</label>
                <input type="text" class="form-control" name="phone2"/>
            </div>
            <div class="form-group ">
                <label>State</label>
                <select class="form-control state" name="state" id="state" required>
                    <option value="">Select State</option>
                    <?php foreach ($st as $row) {?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>City</label>
                <select class="form-control city" name="city" id="city" required>
                    <option value="">Select City</option>
                </select>
            </div>
            <div class="form-group ">
                <label>Website</label>
                <input type="text" class="form-control" name="website"/>
            </div>
            <div class="form-group ">
                <label>Online order</label>
                <div class="checkbox">
                    <label>
                            <input type="radio" name="o_order" value="Yes">&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="o_order" value="No">&nbsp; No
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label>Home Delivery</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="h_delivery" value="Yes">&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="h_delivery" value="No">&nbsp; No
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <label>Service Repair</label>
                <div class="checkbox">
                    <label>
                        <input type="radio" name="service_repair" value="Yes">&nbsp; Yes
                    </label>
                    <label>
                        <input type="radio" name="service_repair" value="No">&nbsp; No
                    </label>
                </div>
            </div>
             <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img"/>
            </div>
              <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img1"/>
            </div>
              <div class="form-group ">
                <label>Shop Image</label>
                <input type="file" name="shop_img2"/>
            </div>
              <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer"/>
            </div>
              <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer1"/>
            </div>
               <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer2"/>
            </div>
                <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer3"/>
            </div>
                <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer4"/>
            </div>
                <div class="form-group ">
                <label>Shop Offers</label>
                <input type="file" name="shop_offer5"/>
            </div>
            <div class="">
                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/shop');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>

</div>
<script>
    //get Publisher 
  $("#state").change(function () {
    //get the selected value
    var StateId = this.value;
    //make the ajax call
    $.ajax({
      url: '<?php echo site_url("admins/post_cycle/aj_city"); ?>',
      type: 'POST',
      data: {id: StateId},
      success: function (data) {
        $("#city").html("");
        $("#city").html(data);
      }
    });
  });
</script>