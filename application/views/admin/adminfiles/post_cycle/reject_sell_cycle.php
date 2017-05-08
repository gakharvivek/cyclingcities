<div class="row-fluid">

    <div class="box ">
        <div class="box-header with-border"> Reject Sell Cycle </div>
        <div class="box-body with-border">
            <!-- text input -->
            <form  enctype="multipart/form-data" action="<?php echo site_url('admins/post_cycle/rejectstatus'); ?>" method="post">

                <div class="form-group ">
                    <label>Remark</label>
                    <textarea name="remark" id="remark" cols="50" rows="5" class="required"></textarea>
                </div>
          
                <div class="">
                    <input type="hidden" name="id"  value="<?php echo $id ?>"/>
					<input type="submit" name="btn_reject" class="btn btn-group btn-primary" value="Reject">
					<a href="<?php echo site_url('admins/post_cycle/sell_list');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>