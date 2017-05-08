<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Add Know Cycle </div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/knowurcycle/add'); ?>">
                <!-- text input -->
                <div class="form-group ">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" ></textarea>
                </div>
                <div class="form-group">
                    <label>Image 1 </label>
                    <input type="file" name="image1"/>
                </div>
                <div class="form-group">
                    <label>Image 2 </label>
                    <input type="file" name="image2"/>
                </div>
                <div class="form-group">
                    <label>Image 3 </label>
                    <input type="file" name="image3"/>
                </div>

                <div class="">

                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/knowurcycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>