<?php $this->load->view('header');?>
<div class="row-fluid">
              <div class="box ">
                <div class="box-header with-border"> Edit Parts </div>
                <div class="box-body with-border">
                  <?php echo form_open('parts/edit'); ?>
                    <!-- text input -->
                    <div class="form-group ">
                      <label>Part1</label>
                      <input type="text" class="form-control" value="<?php echo $result['part1'] ?>" name="part1"/>
                    </div>
                    <div class="form-group ">
                      <label>Part2</label>
                      <input type="text" class="form-control" value="<?php echo $result['part2'] ?>" name="part2"/>
                    </div>
                    <div class="form-group ">
                      <label>Part3</label>
                      <input type="text" class="form-control" value="<?php echo $result['part3'] ?>" name="part3"/>
                    </div>
                    <div class="form-group ">
                      <label>Part4</label>
                      <input type="text" class="form-control" value="<?php echo $result['part4'] ?>" name="part4"/>
                    </div>
                    <div class="form-group ">
                      <label>Part5</label>
                      <input type="text" class="form-control" value="<?php echo $result['part5'] ?>" name="part5"/>
                    </div>
                    <div class="form-group ">
                      <label>Part6</label>
                      <input type="text" class="form-control" value="<?php echo $result['part6'] ?>" name="part6"/>
                    </div>
                    <div class="">
                     <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                      <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					  <a href="<?php echo site_url('admins/parts');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php form_close(); ?>
                </div>
	</div>
</div>
<?php $this->load->view('footer');?>