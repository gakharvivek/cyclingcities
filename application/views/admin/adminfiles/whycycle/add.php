<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Why Cycle </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/whycycle/add'); ?>">
                <!-- text input -->
                <div class="form-group ">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required/>
                </div>
                <div class="form-group">
                    <label>Image 1 </label>
                    <input type="file" name="image1" required/>
                </div>
                <div class="form-group">
                    <label>Image 2 </label>
                    <input type="file" name="image2"/>
                </div>
                <div class="form-group">
                    <label>Image 3 </label>
                    <input type="file" name="image3"/>
                </div>

				<div class="form-group">
                    <label>Image 4 </label>
                    <input type="file" name="image4"/>
                </div>

				<div class="form-group">
                    <label>Image 5 </label>
                    <input type="file" name="image5"/>
                </div>

				<div class="form-group">
                    <label>Image 6 </label>
                    <input type="file" name="image6"/>
                </div>

				<div class="form-group">
                    <label>Image 7 </label>
                    <input type="file" name="image7"/>
                </div>

				<div class="form-group">
                    <label>Image 8 </label>
                    <input type="file" name="image8"/>
                </div>

				<div class="form-group">
                    <label>Image 9 </label>
                    <input type="file" name="image9"/>
                </div>

				<div class="form-group">
                    <label>Image 10 </label>
                    <input type="file" name="image10"/>
                </div>

                <div class="">

                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/whycycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>