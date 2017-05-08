<div class="row-fluid">
    <div class="box ">
        <div class="box-header with-border"> Edit Why Cycle</div>
        <div class="box-body with-border">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admins/whycycle/edit'); ?>">
                <div class="form-group ">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Image 1</label>
                    <input type="file" name="image1" />
                    <?php if ($result['image1'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image1']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image1_old" value="<?php echo $result['image1']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Image 2</label>
                    <input type="file" name="image2" />
                    <?php if ($result['image2'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image2']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image2_old" value="<?php echo $result['image2']; ?>"/>
                </div>
                <div class="form-group">
                    <label>Image 3</label>
                    <input type="file" name="image3" />
                    <?php if ($result['image3'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image3']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image3_old" value="<?php echo $result['image3']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 4</label>
                    <input type="file" name="image4" />
                    <?php if ($result['image4'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image4']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image4_old" value="<?php echo $result['image4']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 5</label>
                    <input type="file" name="image5" />
                    <?php if ($result['image5'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image5']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image5_old" value="<?php echo $result['image5']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 6</label>
                    <input type="file" name="image6" />
                    <?php if ($result['image6'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image6']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image6_old" value="<?php echo $result['image6']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 7</label>
                    <input type="file" name="image7" />
                    <?php if ($result['image7'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image7']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image7_old" value="<?php echo $result['image7']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 8</label>
                    <input type="file" name="image8" />
                    <?php if ($result['image8'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image8']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image8_old" value="<?php echo $result['image8']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 9</label>
                    <input type="file" name="image9" />
                    <?php if ($result['image9'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image9']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image9_old" value="<?php echo $result['image9']; ?>"/>
                </div>

				<div class="form-group">
                    <label>Image 10</label>
                    <input type="file" name="image10" />
                    <?php if ($result['image10'] != '') { ?>
                        <img src="<?php echo site_url('upload/whycycle'); ?>/<?php echo $result['image10']; ?>" width="50" />
                    <?php } ?>
                    <input type="hidden" name="image10_old" value="<?php echo $result['image10']; ?>"/>
                </div>
                <div class="">
                    <input type="hidden" name="editid"  value="<?php echo $result['id'] ?>"/>
                    <input type="submit" class="btn btn-group btn-primary"  value="Update" />
					<a href="<?php echo site_url('admins/whycycle');?>" class="btn btn-group btn-primary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>