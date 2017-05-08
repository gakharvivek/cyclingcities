<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Accessories </div>
        <div class="box-body with-border">
            <?php echo form_open_multipart('admins/accessories/add'); ?>
            <!-- text input -->
            <div class="form-group ">
                <label>Accessory Name</label>
                <input type="text" class="form-control" name="name" required/>
            </div>
            <div class="form-group ">
                <label>Accessory Price</label>
                <input type="text" class="form-control" name="price" required/>
            </div>
            <div class="form-group ">
                <label>Accessory Brand</label>
                <input type="text" class="form-control" name="brand" required/>
            </div>
            <div class="form-group ">
                <label>Accessory Model</label>
                <input type="text" class="form-control" name="model" required/>
            </div>
            <div class="form-group ">
                <label>Description</label>
                <textarea class="form-control" name="description">  </textarea>
            </div>
            <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img1"/>
            </div>
             <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img2"/>
            </div>
             <div class="form-group ">
                <label>Accessory Image</label>
                <input type="file" name="img3"/>
            </div>
            <div class="form-group ">
                <label>Accessory Purchase Year</label>
                <input type="text" class="form-control" name="purchase_year"/>
            </div>
            <div class="">
                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/accessories');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>
