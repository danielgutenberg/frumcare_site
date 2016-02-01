<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(3) == 'workers-for-cleaning-company' ? 'Workers for Cleaning Company' : 'Cleaning / household help';?></h3>  			
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
 				<label>For Work in</label>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="looking_to_work" value="Private Home" <?php if(in_array("Private Home",$location)){?> checked="checked" <?php } ?>>Private Home</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="looking_to_work" value="Business/Office" <?php if(in_array("Business/Office",$location)){?> checked="checked" <?php } ?>>Business / Office</div>
                 <div class="checkbox"><input type="checkbox" name="carelocation" class="looking_to_work" value="Cleaning Company" <?php echo $this->uri->segment(1) == 'caregivers' && ($this->uri->segment(2)=='workers-for-cleaning-company' || $this->uri->segment(3)=='workers-for-cleaning-company')?'checked':'' ?> <?php if(in_array("Cleaning Company",$location)){?> checked="checked" <?php } ?>>Cleaning Company</div> 				
	 		</div>

	 		<?php $this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data)); ?>
			<?php $availability = explode(',',$data['availability']); ?>
		 	<div>
		 		<label>When you need help (check one or more)</label>
			 	<div class="checkbox first"><input type="checkbox" class="availability" value="Immediate" <?php if(in_array("Immediate",$availability)){?> checked="checked" <?php } ?>>Immediate</div>
			 	<div class="checkbox full"><input type="checkbox" class="availability" id="chkbox1" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked" <?php } ?>>Start Date<input type="text" id="textbox1" value="<?php echo $data['start_date'];?>"/></div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally" <?php if(in_array("Occasionally",$availability)){?> checked="checked" <?php } ?>>Occasionally</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Regularly" <?php if(in_array("Regularly",$availability)){?> checked="checked" <?php } ?>>Regularly</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Morning" <?php if(in_array("Morning",$availability)){?> checked="checked" <?php } ?>>Morning</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon" <?php if(in_array("Afternoon",$availability)){?> checked="checked" <?php } ?>>Afternoon</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Evening" <?php if(in_array("Evening",$availability)){?> checked="checked" <?php } ?>>Evening</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse" <?php if(in_array("Night Nurse",$availability)){?> checked="checked" <?php } ?>>Night Nurse</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun" <?php if(in_array("Weekends Fri/Sun",$availability)){?> checked="checked" <?php } ?>>Weekends Fri / Sun</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos" <?php if(in_array("Shabbos",$availability)){?> checked="checked" <?php } ?>>Shabbos</div>
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

	 		<?php
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>

			</form>
		</div>
