
			<h3><?php echo 'Therapists';?></h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<!--<div>
	 			<label>Age of Therapist</label>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from" > to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to" >
	 		</div>-->

	 		<div>
	 			<label>Gender of Therapist</label>
			 	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 1) echo 'checked' ?>> Male</div>
			 	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 2) echo 'checked' ?>> Female</div>
			 	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 3) echo 'checked' ?>> Any</div>
			 </div>
            
            <?php /*
            <div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div> */ ?>
            
	 		<?php $this->load->view('frontend/left_navbar/fields/languages', array('data' => $data)); ?>
	 		<!--<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish/Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox/Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>-->
	 		<div>
		 		<label>Accepts Insurance</label>
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="1" > Yes
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="2" > No
		 	</div>


	 		<?php
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>


