<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Model </div>
        <div class="box-body with-border">
          <form  enctype="multipart/form-data" action="<?php echo site_url('admins/cycle_info/addmodel'); ?>" method="post">
          
            <!-- text input -->
            <div class="form-group ">
                <label>Brand Name</label>
                <select class="form-control" name="brand_name" required>
                  <option value="">Select Brand </option>
                    <?php foreach ($brand_name as $row) { ?>

                        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label>Model Name</label>
                <input type="text" class="form-control" name="name" required/>
            </div>
            <div class="form-group">
                <label>Cycle Type</label>
                <select  class="form-control" name="cycle_type" required>
                    <option value="">Select Type </option>
                    <option value="Road bike">Road bike</option>
                    <option value="Mountain bike">Mountain bike</option>
                    <option value="Hybrid bike">Hybrid bike</option>
                </select>
            </div>
<!--            <div class="form-group">
                <label>Cycle Type</label>
                <select  class="form-control" name="cycle_type">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>-->
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" required/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="number" class="form-control" name="m_desc" ></textarea>
            </div>
            <div class="form-group ">
                    <label>Picture1</label>
                    <input type="file" class="form-control" name="img1" />
                </div>
<!--            <div class="form-group ">
                    <label>Picture2</label>
                    <input type="file" class="form-control" name="img2"/>
                </div>
            <div class="form-group ">
                    <label>Picture3</label>
                    <input type="file" class="form-control" name="img3"/>
                </div>
            <div class="form-group ">
                    <label>Picture4</label>
                    <input type="file" class="form-control" name="img4"/>
                </div>-->

            <div class="">
                <input type="submit" class="btn btn-group btn-primary"  value="Add" />
				<a href="<?php echo site_url('admins/cycle_info/model');?>" class="btn btn-group btn-primary">Cancel</a>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /block -->
</div>