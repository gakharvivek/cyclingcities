<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Add Category </div>
        <div class="box-body with-border">
		    <?php  
				if ($this->session->flashdata('message'))
				{
					echo "<div class='pansucess'>".$this->session->flashdata('message')."</div>";
				}
				if ($this->session->flashdata('error'))
				{
					echo "<div class='failure'>".$this->session->flashdata('error')."</div>";
				}
			?>
                  
             <form method="post" enctype="multipart/form-data" action="<?php echo site_url('index.php/admins/article/addcate');?>" >
      
                <!-- text input -->
                <div class="form-group ">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="cate_name" required/>
                </div>
                <div class="form-group">
                    <label>Category Description</label>
                    <textarea class="form-control" name="cate_desc" ></textarea>
                </div>

                <div class="">
                    <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					<a href="<?php echo site_url('admins/article/category');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>
<!-- /block -->
</div>