<?php $this->load->view('header');?>
<div class="row-fluid">
	<!-- block -->
	<div class="block">
      
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">Add Profile </div>
		</div>
      
		<div class="block-content collapse in">
			<div class="span12">
				<?php 
                  echo form_open('profile/add');
                ?>
				<fieldset>
					<legend>Add Profile</legend>
					
					<div class="control-group">
						<label class="control-label" for="">Name</label>
						<div class="controls">
							<input type="text" class="span6" id="pro_name"  name="pro_name" data-provide="name" data-items="4" >
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="">Gender</label>
						<div class="controls">
							<input type="text" class="span6" id="gender"  name="gender" data-provide="gender" data-items="4" >
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="">Age</label>
						<div class="controls">
							<input type="text" class="span6" id="age"  name="age" data-provide="age" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">State</label>
						<div class="controls">
							<input type="text" class="span6" id="state"  name="state" data-provide="state" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">City</label>
						<div class="controls">
							<input type="text" class="span6" id="city"  name="city" data-provide="city" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Email</label>
						<div class="controls">
							<input type="text" class="span6" id="email"  name="email" data-provide="email" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Phone</label>
						<div class="controls">
							<input type="text" class="span6" id="phone"  name="phone" data-provide="phone" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Type</label>
						<div class="controls">
							<input type="text" class="span6" id="type"  name="type" data-provide="type" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Occupation</label>
						<div class="controls">
							<input type="text" class="span6" id="occu"  name="occu" data-provide="occu" data-items="4" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Skill</label>
						<div class="controls">
							<input type="text" class="span6" id="skill"  name="skill" data-provide="skill" data-items="4" >
						</div>
					</div>
					
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Add Profile</button>
						<a href="<?php echo base_url();?>profile/index" type="reset" class="btn">Cancel</a>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
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
