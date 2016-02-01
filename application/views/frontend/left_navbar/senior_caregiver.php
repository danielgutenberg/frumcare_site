<?php echo $this->breadcrumbs->show(); ?>
			<h3>					
			     <h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-staff-for-senior-care-facility' ? 'Workers / Staff for senior care facility' : 'Senior Caregiver';?></h3>					
			</h3>  			
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
 				<label>Care location / type</label> 				 				
 				<div class="checkbox"><input type="checkbox" name="carelocation[]" class="looking_to_work" value="Home of Senior" <?php if(in_array("Home of Senior",$location)){?> checked="checked" <?php } ?>>Home of Senior</div>
                 <div class="checkbox"><input type="checkbox" name="carelocation[]" class="looking_to_work" value="Caregiving institution" <?php echo ($this->uri->segment(1) == 'caregivers' && ($this->uri->segment(2)=='workers-staff-for-senior-care-facility' || $this->uri->segment(3)=='workers-staff-for-senior-care-facility'))?'checked':'' ?> <?php if(in_array("Caregiving institution",$location)){?> checked="checked" <?php } ?>>Caregiving institution</div>
                 <div class="checkbox"><input type="checkbox" name="carelocation[]" class="looking_to_work" value="Live In" <?php if(in_array("Live In",$location)){?> checked="checked" <?php } ?>>Live In</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation[]" class="looking_to_work" value="Live Out" <?php if(in_array("Live Out",$location)){?> checked="checked" <?php } ?>>Live Out</div>
	 		</div>

		 	<?php $training = explode(',',$data['training']); ?>
		 	<div>
			 	<label>Training</label>
			 	<div class="checkbox first"><input type="checkbox" class="training" value="CPR" <?php if(in_array("CPR",$training)){?> checked="checked" <?php } ?>>CPR</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="First Aid" <?php if(in_array("First Aid",$training)){?> checked="checked" <?php } ?>>First Aid</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Senior Care Training" <?php if(in_array("Senior Care Training",$training)){?> checked="checked" <?php } ?>>Senior Care Training</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Nurse" <?php if(in_array("Nurse",$training)){?> checked="checked" <?php } ?>>Nurse</div>
			 	<div class="checkbox"><input type="checkbox" class="training" value="Other" <?php if(in_array("Other",$training)){?> checked="checked" <?php } ?>>Other</div>
			 </div>

		 	<div>
		 		<label>Able to work with</label>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Alz./ dementia">Alz. / dementia</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Sight Loss">Sight Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Hearing Loss">Hearing Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Wheelchair Bound">Wheelchair Bound</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Able to tend to personal hygiene of senior">Able to tend to personal hygiene of senior</div>
		 	</div>
		 	<?php $availability = explode(',',$data['availability']); ?>
		 	<div>
		 		<label>When you need care</label>
		 		
		 		<div class="checkbox first"><input type="checkbox" class="availability" value="Immediate" <?php if(in_array("Immediate",$availability)){?> checked="checked" <?php } ?>>Immediate</div>
			 	<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked" <?php } ?>>Start Date<input type="text" id="textbox1" value="<?php echo $data['start_date'];?>"/></div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally" <?php if(in_array("Occasionally",$availability)){?> checked="checked" <?php } ?>>Occasionally</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Regularly" <?php if(in_array("Regularly",$availability)){?> checked="checked" <?php } ?>>Regularly</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Morning" <?php if(in_array("Morning",$availability)){?> checked="checked" <?php } ?>>Morning</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon" <?php if(in_array("Afternoon",$availability)){?> checked="checked" <?php } ?>>Afternoon</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Evening" <?php if(in_array("Evening",$availability)){?> checked="checked" <?php } ?>>Evening</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun" <?php if(in_array("Weekends Fri/Sun",$availability)){?> checked="checked" <?php } ?>>Weekends Fri / Sun</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Overnight" <?php if(in_array("Overnight",$availability)){?> checked="checked" <?php } ?>>Overnight</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos" <?php if(in_array("Shabbos",$availability)){?> checked="checked" <?php } ?>>Shabbos</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="By appointment" <?php if(in_array("By appointment",$availability)){?> checked="checked" <?php } ?>>By appointment</div>

		 	</div>

		 	<div>
		 		<label>Abilities</label>
		 		<div class="checkbox"><input type="checkbox" class="driver_license" name="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox"><input type="checkbox" class="vehicle" name="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="available_on_short_notice" name="available_on_short_notice" value="1">Available on short notice</div>
		 	</div>

	 		<?php 
		 	$this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data));
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>

			</form>
		</div>

