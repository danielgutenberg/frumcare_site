<?php echo $this->breadcrumbs->show();?>			
					<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-staff-for-special-needs-facility' ? 'Workers / Staff for special needs facility' : 'Special needs caregiver / companion';?></h3>			 			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
 			<?php 
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/smoker', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver', array('data' => $data));
	 		?>

	 		<?php $location = explode(',',$data['looking_to_work']); ?>
	 		<div>
 				<label>For work in</label>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="looking_to_work" value="Patients Home" <?php if(in_array("Patients Home",$location)){?> checked="checked" <?php } ?>>Patients Home</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="looking_to_work" value="Caregiving Institution" <?php echo ($this->uri->segment(1)=='caregivers' && ($this->uri->segment(2)=='workers-staff-for-special-needs-facility' || $this->uri->segment(3)=='workers-staff-for-special-needs-facility') )?'checked':'' ?> <?php if(in_array("Caregiving Institution",$location)){?> checked="checked" <?php } ?>>Caregiving Institution</div>
	 		</div> 

	 		<?php $this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data)); ?>

		 	<?php $training = explode(',',$data['training']); ?>
		 	<div>
			 	<label>Training</label>
			 	<div class="checkbox first"><input type="checkbox" class="training" value="CPR" <?php if(in_array("CPR",$training)){?> checked="checked" <?php } ?>>CPR</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="First Aid" <?php if(in_array("First Aid",$training)){?> checked="checked" <?php } ?>>First Aid</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Special Needs Training" <?php if(in_array("Special Needs Training",$training)){?> checked="checked" <?php } ?>>Special Needs Training</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Nurse" <?php if(in_array("Nurse",$training)){?> checked="checked" <?php } ?>>Nurse</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Other" <?php if(in_array("Other",$training)){?> checked="checked" <?php } ?>>Other</div>
			 </div>

		 	<?php $willing = explode(',',$data['willing_to_work']); ?>
		 	<div>
		 		<label>Conditions able to work with</label>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Autism" <?php if(in_array("Autism",$willing)){?> checked="checked" <?php } ?>>Autism</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Down Syndrome" <?php if(in_array("Down Syndrome",$willing)){?> checked="checked" <?php } ?>>Down Syndrome</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Handicapped" <?php if(in_array("Handicapped",$willing)){?> checked="checked" <?php } ?>>Handicapped</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Wheelchair Bound" <?php if(in_array("Wheelchair Bound",$willing)){?> checked="checked" <?php } ?>>Wheelchair Bound</div>
		 	</div>
	 			 		
		 	<?php $this->load->view('frontend/left_navbar/fields/when_you_need_care', array('data' => $data)); ?>

		 	<div>
		 		<label>Abilities</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1" <?php if ($data['driver_license'] == 1) echo 'checked' ?>>Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1" <?php if ($data['vehicle'] == 1) echo 'checked' ?>>Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1" <?php if ($data['on_short_notice'] == 1) echo 'checked' ?>>Available on short notice</div>
		 	</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		</div>
