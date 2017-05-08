<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Article </div>
        <div class="box-body with-border">
            <?php // echo form_open('article/edit'); ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/article/edit'); ?>">
                <!-- text input -->
                <div class="form-group ">
                    <label>Category Name</label>
                    <select class="form-control cate" name="cate_name">
                        <?php foreach ($cat_name as $row) { ?>
                            <option value="<?php echo $row['cate_id']; ?>" <?php if ($result['cate_id'] == $row['cate_id']) {echo "selected";} ?> ><?php echo $row['cate_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Sub Category Name</label>
                    <select class="form-control sub" name="sub_name">
                        <?php foreach ($sub_name as $row) { ?>
                            <option value="<?php echo $row['sub_id']; ?>" <?php if ($result['sub_id'] == $row['sub_id']) {echo "selected";} ?>><?php echo $row['sub_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group ">
                    <label>Article Name</label>
                    <input type="text" class="form-control" name="article_name" value="<?php echo $result['article_name'] ?>"/>
                </div>

                <div class="form-group ">
                    <label>Article Type</label>
                    <!--<input type="text" class="form-control" name="article_type" value="<?php echo $result['article_type'] ?>" />-->
                    <select name="article_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="news" <?php if ($result['article_type'] == 'news') {echo 'selected';} ?>>News</option>
                        <option value="article" <?php if ($result['article_type'] == 'article') {echo 'selected';} ?>>Article</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Article Description</label>
                    <textarea class="form-control cke_dialog_ui_input_textarea" name="article_desc" ><?php echo $result['article_desc'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>Article Image</label>
                    <input type="file" name="article_image" />
                    <?php if ($result['article_image'] != '') { ?>
                        <img src="<?php echo site_url('upload/article'); ?>/<?php echo $result['article_image']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="pic_old" value="<?php echo $result['article_image']; ?>"/>
                </div>

                <div class="form-group ">
                    <label>Publish Date</label>
                    <input type="text" class="form-control datepicker" name="pub_date" value="<?php echo date('m/d/Y',  strtotime($result['pub_date'])); ?>" />
                </div>
                <div class="form-group ">
                    <label>Create Date</label>
                    <input type="text" class="form-control datepicker" name="create_date" value="<?php echo date('m/d/Y',  strtotime($result['create_date'])); ?>" />
                </div>
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['article_id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/article');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var cateid = $('.cate').val();
        var cate_id = $('.sub').val();

        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/article/aj_sub"); ?>',
            type: 'POST',
            data: {id: cateid, cate_id: cate_id},
            success: function (data) {
                $(".sub").html("");
                $(".sub").html(data);
            }
        });
    });
    //get Publisher 
    $(".cate").change(function () {
        //get the selected value

        var cateid = this.value;
        var cate_id = $('.sub').val();

        //make the ajax call
        $.ajax({
            url: '<?php echo site_url("admins/article/aj_sub"); ?>',
            type: 'POST',
            data: {id: cateid, cate_id: cate_id},
            success: function (data) {
                $(".sub").html("");
                $(".sub").html(data);
            }
        });
    });
</script>