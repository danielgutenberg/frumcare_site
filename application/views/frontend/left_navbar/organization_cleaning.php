
			<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-for-cleaning-company' ? 'Workers for Cleaning Company' : 'Cleaning / household help';?></h3>  			
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
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish / Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox / Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar With Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
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
		 		<label>When you need help (check one or more)</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="One Time">One Time</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occassionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Saturday">Saturday</div>
		 	</div>

		 	<div>
		 		<label>Skills</label>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Dishes">Dishes</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Floors">Floors</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Windows">Windows</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Laundry">Laundry</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Folding">Folding</div>
                <div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Ironing">Ironing</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning and Dusting Furniture">Cleaning and dusting furniture</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning Refrigerator/Freezer">Cleaning refrigerator / freezer</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning Oven/Stove">Cleaning Oven / stove</div>
		 		<div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Able to watch children as well">Able to watch children as well</div>
		 	</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

