<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Nanny/Au-Pair";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">

	 		<?php 
	 		
	 		$this->load->view('frontend/left_navbar/fields/minimum_experience');
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); 
	 		$this->load->view('frontend/left_navbar/fields/smoker');
	 		$this->load->view('frontend/left_navbar/fields/languages');
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver');
	 		 		
	 		?>
            <div>
                <label>Nanny Type</label>
                <div class="checkbox"><input type="checkbox" value="Live In" class="looking_to_work"/>Live In</div>
                <div class="checkbox"><input type="checkbox" value="Live Out" class="looking_to_work"/>Live Out</div>
            </div>
	 		<div>
	 			<label>Number of children requiring care</label>
	 			<select name="number_of_children" class="number_of_children">
	 				<option value="">--select--</option>
	 				<option value="1">1</option>
	 				<option value="2">2</option>
	 				<option value="3">3</option>
	 				<option value="4">4</option>
	 				<option value="5">5</option>
	 				<option value="6">5+</option>
	 			</select>
	 		</div>
	 		<div>
	 			<label></label>
	 			<div class="checkbox first"><input type="checkbox" value="twins" name="optional_number[]" class="morenum">Twins</div>
	 			<div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" class="morenum">Triplets</div>
	 		</div>

	 		<div>
	 			<label>Age of children requiring care</label>
	 			<div class="checkbox first"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"  class="age_group"> 12+ years</div>
	 		</div>
	 		<?php $this->load->view('frontend/left_navbar/fields/minimum_experience'); ?>
		 	<div>
		 		<label>Training</label>
		 		<div class="checkbox first"><input type="checkbox" class="training" value="CPR">CPR</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="First Aid">First Aid</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Nanny/ Babysitter Course">Nanny / Babysitter Course</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Other">Other</div>
		 	</div>
		 	<?php $this->load->view('frontend/left_navbar/fields/when_you_need_care'); ?>
		 	<div>
		 		<label>Abilities and skills</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1">Vehicle</div>                
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1">Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1">Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1">Able to do housework / cleaning</div>                
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1">Able to help with homework</div>                
                <div class="checkbox"><input type="checkbox" class="bath_children" value="1">Able to bathe children</div>
		 		<div class="checkbox"><input type="checkbox" class="bed_children" value="1">Able to put children to bed</div>
                <div class="checkbox"><input type="checkbox" class="available_on_short_notice" value="1">Available on short notice</div>		 		
		 	</div>


	 		<div>
		 		<div class="educationss" colspan="2">

		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" data-toggle="tooltip" data-placement="left" title="Save your search. Setup email alerts and be the first to see new profiles that have your search criteria." value="Save this Search" name="searchs">
				 	</div>

			</form>
		</div>
</div>	 
	  </div>

