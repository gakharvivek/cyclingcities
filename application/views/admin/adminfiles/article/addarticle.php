<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Add Article </div>
                <div class="box-body with-border">
                  <?php //echo form_open('article/add'); ?>
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/article/add');?>">
                    <!-- text input -->
                    <div class="form-group ">
                        <label>Category Name</label>
                        <select class="form-control cate" name="cate_name" required>
                          <option value="">Select Category</option>
                        <?php  foreach ($cat_name as $row){ ?>
                        <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Sub category Name</label>
                        <select class="form-control sub" name="sub_name" required>
                        
                        <option value="">Select Sub Category</option>
                       
                        </select>
                    </div>
                    <div class="form-group ">
                      <label>Article Name</label>
                      <input type="text" class="form-control" name="article_name" required/>
                    </div>
                    <div class="form-group ">
                        <label>Article Type</label>
                        <!--<input type="text" class="form-control" name="article_type"/>-->
                        <select name="article_type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="news">News</option>
                            <option value="article">Article</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Article Description</label>
                      <textarea class="form-control" name="article_desc" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Article Image</label>
                      <input type="file" name="article_image"/>
                    </div>
                    <div class="form-group">
                      <label>publish Date</label>
                      <input type="text" class="form-control datepicker" name="pub_date" required/>
                    </div>
                    <div class="form-group">
                      <label>Create Date</label>
                      <input type="text" class="form-control datepicker" name="create_date" required/>
                    </div>
                   
                    <div class="">
                      
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/article');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php // form_close(); ?>
                  </form>
                </div>
	</div>
</div>	

<script>
 //get Publisher 
    $(".cate").change(function () {
        //get the selected value

        var cateid = this.value;
     
        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("index.php/admins/article/aj_sub"); ?>',
            type: 'POST',
            data: {id: cateid},
            success: function (data) {
                $(".sub").html("");
                $(".sub").html(data);
            }
        });
    });
</script>