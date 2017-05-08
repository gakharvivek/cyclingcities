<?php $this->load->view('header');?>
<div class="row-fluid">
  
              <div class="box ">
                <div class="box-header with-border"> Add Parts </div>
                <div class="box-body with-border">
                  <?php echo form_open('parts/add'); ?>
                    <!-- text input -->
                    <div class="form-group ">
                      <label>Parts1</label>
                      <input type="text" class="form-control" name="part1"/>
                    </div>
                    <div class="form-group ">
                      <label>Parts2</label>
                      <input type="text" class="form-control" name="part2"/>
                    </div>
                    <div class="form-group ">
                      <label>Parts3</label>
                      <input type="text" class="form-control" name="part3"/>
                    </div>
                    <div class="form-group ">
                      <label>Parts4</label>
                      <input type="text" class="form-control" name="part4"/>
                    </div>
                    <div class="form-group ">
                      <label>Parts5</label>
                      <input type="text" class="form-control" name="part5"/>
                    </div>
                    <div class="form-group ">
                      <label>Parts6</label>
                      <input type="text" class="form-control" name="part6"/>
                    </div>
                    
                    <div class="">
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/parts');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php form_close(); ?>
                </div>
	</div>	
</div>
	<!-- /block -->
</div>
<?php $this->load->view('footer');?>