<?php echo $this->breadcrumbs->show();?>			
					<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-staff-for-special-needs-facility' ? 'Workers / Staff for special needs facility' : 'Special needs caregiver';?></h3>			 			
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

		 	<div>
		 		<label>Able to work with</label>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Autism">Autism</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Down Syndrome">Down Syndrome</div>
		 		<?php /* <div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Hearing Loss">Hearing Loss</div> */?>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Handicapped">Handicapped</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Wheelchair bound">Wheelchair bound</div>
		 	</div>
	 			 		
		 	<?php $this->load->view('frontend/left_navbar/fields/when_you_need_care', array('data' => $data)); ?>

		 	<div>
		 		<label>Abilities</label>
		 		<div class="checkbox"><input type="checkbox" class="driver_license" name="driver_license" value="1">Driver License</div>
		 		<div class="checkbox"><input type="checkbox" class="vehicle" name="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="available_on_short_notice" name="available_on_short_notice" value="1">Available on short notice</div>
		 	</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		</div>
