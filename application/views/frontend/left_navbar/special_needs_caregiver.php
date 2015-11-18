<?php echo $this->breadcrumbs->show();?>			
					<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-staff-for-special-needs-facility' ? 'Workers / Staff for special needs facility' : 'Special needs caregiver';?></h3>			 			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
 			<div>
	 			<label>Age of Caregiver</label>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from"> to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to">
	 		</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); ?>
            
            <div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div>
            
	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang">English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang">Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang">Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang">Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang">French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang">Other</div>
	 		</div>
	 		<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/ Chasidish" name="observance[]" class="observance">Yeshivish / Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/ Modern Orthodox" name="observance[]" class="observance">Orthodox / Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar With Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>

	 		<div>
 				<label>For work in</label>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Patients Home">Patients Home</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Caregiving Institution" <?php echo ($this->uri->segment(1)=='caregivers' && ($this->uri->segment(2)=='workers-staff-for-special-needs-facility' || $this->uri->segment(3)=='workers-staff-for-special-needs-facility') )?'checked':'' ?>>Caregiving Institution</div>
	 		</div> 

	 		<div class="year-exp">
		 		<span>Minimum Experience</span>
		 			<select name="year_experience" class="required year_experience">
		 			<option value="">--select--</option>
		 				<option value="1">1 year</option>	
		 				<option value="2">2 years</option>	
		 				<option value="3">3 years</option>	
		 				<option value="4">4 years</option>	
		 				<option value="6">5+ years</option>	
		 			</select>
		 	</div>

		 	<div>
		 		<label>Training</label>
		 		<div class="checkbox"><input type="checkbox" name="training" class="training" value="CPR">CPR</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="First Aid">First Aid</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Special Needs Training">Special Needs Training</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Nurse">Nurse</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Other">Other</div>
		 	</div>

		 	<div>
		 		<label>Able to work with</label>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Autism">Autism</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Down Syndrome">Down Syndrome</div>
		 		<?php /* <div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Hearing Loss">Hearing Loss</div> */?>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Handicapped">Handicapped</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Wheelchair bound">Wheelchair bound</div>
		 	</div>
	 			 		
		 	<div>
		 		<label>When you need care</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" class="availability chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occassionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>		 		
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="By appointment">24 hr care</div>
		 	</div>

		 	<div>
		 		<label>Abilities</label>
		 		<div class="checkbox"><input type="checkbox" class="driver_license" name="driver_license" value="1">Driver License</div>
		 		<div class="checkbox"><input type="checkbox" class="vehicle" name="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="available_on_short_notice" name="available_on_short_notice" value="1">Available on short notice</div>
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
