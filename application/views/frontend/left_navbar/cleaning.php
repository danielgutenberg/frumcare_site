<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-for-cleaning-company' ? 'Workers for Cleaning Company' : 'Cleaning / household help';?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
 			

	 		<?php 
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver');
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); 
	 		$this->load->view('frontend/left_navbar/fields/smoker');
	 		$this->load->view('frontend/left_navbar/fields/languages');
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver');
	 		?>

	 		<div>
 				<label>For Work in</label>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Private Home">Private Home</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Business/Office">Business / Office</div>
                 <div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Cleaning Company" <?php echo $this->uri->segment(1) == 'caregivers' && ($this->uri->segment(2)=='workers-for-cleaning-company' || $this->uri->segment(3)=='workers-for-cleaning-company')?'checked':'' ?>>Cleaning Company</div> 				
	 		</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/minimum_experience'); ?>

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
