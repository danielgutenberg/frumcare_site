
			<h3>
					<?php echo 'Errand runner / odd jobs / personal assistant / driver'; ?>
			</h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php
	 		
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data)); 
	 		$this->load->view('frontend/left_navbar/fields/smoker', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data));
	 			 		
	 		?>

		 	<?php $availability = explode(',',$data['availability']); ?>
		 	<div>
		 		<label>Availability</label>
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
		 		<label>Abilities</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1" <?php if ($data['driver_license'] == 1) echo 'checked' ?>>Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1" <?php if ($data['vehicle'] == 1) echo 'checked' ?>>Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1" <?php if ($data['on_short_notice'] == 1) echo 'checked' ?>>Available on short notice</div>
		 	</div>	 	
            
	 		<?php
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>

