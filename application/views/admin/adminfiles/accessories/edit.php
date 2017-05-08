<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Accessories </div>
        <div class="box-body with-border">
            <?php echo form_open_multipart('admins/accessories/edit'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Accessory Name</label>
                <input type="text" class="form-control" value="<?php echo $result['name'] ?>" name="name"/>
            </div>
            <div class="form-group ">
                <label>Accessory Price</label>
                <input type="text" class="form-control" name="price" value="<?php echo $result['price'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Accessory Brand</label>
                <input type="text" class="form-control" name="brand" value="<?php echo $result['brand'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Accessory Model</label>
                <input type="text" class="form-control" name="model" value="<?php echo $result['model'] ?>"/>
            </div>
            <div class="form-group ">
                <label>Description</label>
                <textarea class="form-control" name="description"><?php echo $result['description'] ?> </textarea>
            </div>
            <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img1"/>
				<?if($result['img1']!='')
					 {?>
					   <img src="<?php echo site_url('upload/accessory');?>/<?php echo $result['img1'];?>" width="100px" />
				   <?}?>
                <input type="hidden" name="image_old"  value="<?php echo $result['img1'] ?>" />
            </div>
            <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img2"/>
				<?if($result['img2']!='')
					 {?>
					   <img src="<?php echo site_url('upload/accessory');?>/<?php echo $result['img2'];?>" width="100px" />
				   <?}?>
                <input type="hidden" name="image_old1"  value="<?php echo $result['img2'] ?>" />
            </div>
            <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img3"/>
				<?if($result['img3']!='')
					 {?>
					   <img src="<?php echo site_url('upload/accessory');?>/<?php echo $result['img3'];?>" width="100px" />
				   <?}?>
                <input type="hidden" name="image_old2"  value="<?php echo $result['img3'] ?>" />
            </div>
           <div class="form-group ">
                <label>Accessory Purchase Year</label>
                <input type="text" class="form-control" name="purchase_year" value="<?php echo $result['purchase_year'] ?>"/>
            </div>
            <div class="">
                <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                <input type="submit" class="btn btn-group btn-primary"  value="Update" />
				<a href="<?php echo site_url('admins/accessories');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>