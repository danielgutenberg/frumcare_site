<?php echo $this->breadcrumbs->show(); ?>			
            <h3>                
                <?php
                if(segment(1) == 'caregivers' && segment(2) == 'workers-staff-for-childcare-facility' ) {
                    echo "Workers / Staff for childcare facility";
                }
                elseif(segment(1) == 'caregivers' && (segment(2) == 'all' || segment(2) == '' ) ) {
                    echo "Caregivers";
                }
                else if(segment(1) == 'caregivers' && segment(2) == 'organizations'){
                	echo 'Workers / Staff';
                } 
                elseif(segment(1) == 'caregivers' && segment(2) == 'organizations' && (segment(3) == 'all' || segment(3) == '')  ) {
                    echo "Caregiver Organizations";
                }
               
                else {
                    echo "Babysitter";
                } ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 			$cat = $this->uri->segment(2)?$this->uri->segment(2):'';

	 		?>
 			<div>
	 			<label>Age of Caregiver</label>
	 			<div>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:33%" class="caregiverage_from"> to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:33%" class="caregiverage_to">
	 			</div>
	 		</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); ?>

	 		<div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div>

	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox first"><input type="checkbox" name="languages[]" value="English" class="lang"> English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang"> Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang"> Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang"> Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang"> French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang"> Other</div>
	 		</div>
	 		<div>
	 			<label>Level of observance</label>
	 			<div class="checkbox first"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="hidefamiliar observance">Yeshivish / Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="hidefamiliar observance">Orthodox / Modern orthodox</div>
	 			<div class="checkbox"><input type="checkbox" value="Familiar With Jewish Tradition" name="observance[]" class="show observance">Familiar with Jewish Tradition</div>
	 			<?php /*<div class="checkbox"><input type="checkbox" value="Not Jewish" name="observance[]" class="show observance">Not Jewish</div> */?>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class="hidefamiliar observance">Any</div>
	 			<?php /*<div class="familarsection"></div>*/?>
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
	 				<option value="5+">5+</option>
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
            
	 		<div class="year-exp">
		 		<span>Minimum Experience</span>
		 			<select name="year_experience" class="required year_experience">
		 			<option value="">--select--</option>
		 				<option value="1">1 year</option>	
		 				<option value="2">2 years</option>	
		 				<option value="3">3 years</option>	
		 				<option value="4">4 years</option>	
		 				<option value="5+">5+ years</option>	
		 			</select>
		 	</div>
		 	<div>
		 		<label>Training</label>
		 		<div class="checkbox first"><input type="checkbox" class="training" value="CPR">CPR</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="First Aid">First Aid</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Nanny/Babysitter Course">Nanny / Babysitter Course</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Nurse">Nurse</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Other">Other</div>
		 	</div>
		 	<div>
		 		<label>When you need care</label>
		 		<div class="checkbox first"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse">Night Nurse</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Vacation Sitter">Vacation Sitter</div>
		 	</div>
		 	<div>
		 		<label>Abilities and skills</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1">Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1">Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1">Able to do light housework / cleaning</div>
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1">Able to help with homework</div>
		 		<div class="checkbox"><input type="checkbox" class="sick_child_care" value="1">Able to care for sick child</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1">Available on short notice</div>

		 	</div>


	 		<div>
		 		<div class="educationss" colspan="2">

		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" data-toggle="tooltip" data-placement="left" title="Save your search. Setup email alerts and be the first to see new profiles that have your search criteria." value="Save this Search" name="searchs">
				 	</div>
				 	</div>
				 	</div>

			</form>
		</div>

