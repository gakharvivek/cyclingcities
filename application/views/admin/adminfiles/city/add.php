<?php $this->load->view('header');?>
<div class="row-fluid">
              <div class="box ">
                <div class="box-header with-border"> Add City </div>
                <div class="box-body with-border">
                  <?php echo form_open('City/add'); ?>
                    <!-- text input -->
                    <div class="form-group ">
                      <label>City Name</label>
                      <input type="text" class="form-control" name="city_name"/>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="active"/>
                      <label>City Active</label>
                    </div>
                    <div class="">
                      <input type="submit" class="btn btn-group btn-primary"  value="Add" />
					  <a href="<?php echo site_url('admins/city');?>" class="btn btn-group btn-primary">Cancel</a>
                    </div>
                    <?php form_close(); ?>
                </div>
	</div>
</div>
	<!-- /block -->
</div>
<script>

	jQuery(document).ready(function () {
		FormValidation.init();
	});


	$(function () {
		$(".datepicker").datepicker();
		$(".uniform_on").uniform();
		$(".chzn-select").chosen();
		$('.textarea').wysihtml5();

		$('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
				var $total = navigation.find('li').length;
				var $current = index + 1;
				var $percent = ($current / $total) * 100;
				$('#rootwizard').find('.bar').css({width: $percent + '%'});
				// If it's the last tab then hide the last button and show the finish instead
				if ($current >= $total) {
					$('#rootwizard').find('.pager .next').hide();
					$('#rootwizard').find('.pager .finish').show();
					$('#rootwizard').find('.pager .finish').removeClass('disabled');
				} else {
					$('#rootwizard').find('.pager .next').show();
					$('#rootwizard').find('.pager .finish').hide();
				}
			}});
		$('#rootwizard .finish').click(function () {
			alert('Finished!, Starting over!');
			$('#rootwizard').find("a[href*='tab1']").trigger('click');
		});
	});

</script>

<?php $this->load->view('footer');?>
