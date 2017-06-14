
			<h3><?php echo "Tutor/Private lessons";?></h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			<?php $subjects = explode(',',$data['subjects']); ?>		
            <div>
                <label>Subject(s)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]" class="subject" <?php if(in_array("Elementary school",$subjects)){?> checked="checked" <?php } ?>> Elementary school</div>
                    <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]" class="subject" <?php if(in_array("High school",$subjects)){?> checked="checked" <?php } ?>> High school</div>
                    <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]" class="subject" <?php if(in_array("Post high school",$subjects)){?> checked="checked" <?php } ?>> Post high school</div>
                    <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" class="subject" <?php if(in_array("limudei kodesh",$subjects)){?> checked="checked" <?php } ?>>Limudei Kodesh</div>
                    <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" class="subject" <?php if(in_array("general studies",$subjects)){?> checked="checked" <?php } ?>>General Studies</div>
                    <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]" class="subject" <?php if(in_array("Music",$subjects)){?> checked="checked" <?php } ?>> Music</div>
                    <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]" class="subject" <?php if(in_array("Art",$subjects)){?> checked="checked" <?php } ?>> Art</div>
                    <div class="checkbox"><input type="checkbox" value="Other" name="subjects[]" class="subject" <?php if(in_array("Other",$subjects)){?> checked="checked" <?php } ?>> Other</div>
                </div>
            </div>
 			<div>
	 			<label>Gender of tutor wanted</label>
             	<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="1" class="gender_of_careseeker" <?php if ($data['gender'] == 1) echo 'checked' ?>> Male</div>
             	<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="2" class="gender_of_careseeker" <?php if ($data['gender'] == 2) echo 'checked' ?>> Female</div>
             	<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="3" class="gender_of_careseeker" <?php if ($data['gender'] == 3) echo 'checked' ?>> Any</div>
	 		</div> 

	 		<div>
	 			<label>Gender of Student</label>
             	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 1) echo 'checked' ?>> Male</div>
             	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 2) echo 'checked' ?>> Female</div>
             	<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender_of_caregiver" <?php if ($data['gender_of_caregiver'] == 3) echo 'checked' ?>> Any</div>
	 		</div>
            <?php $availability = explode(',',$data['availability']); ?>
            <div>
                <label>Job Hours</label>
                <div class="checkbox"><input type="checkbox" class="availability" value="One time" <?php if(in_array("One time",$availability)){?> checked="checked" <?php } ?>>One Time</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occassionally" <?php if(in_array("Occassionally",$availability)){?> checked="checked" <?php } ?>>Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly" <?php if(in_array("Regularly",$availability)){?> checked="checked" <?php } ?>>Regularly</div>		 		
             	<div class="checkbox"><input type="checkbox" class="availability" value="Asap" <?php if(in_array("Asap",$availability)){?> checked="checked" <?php } ?>>Asap</div>
             	<div class="checkbox full"><input type="checkbox" class="availability" id="chkbox1" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked" <?php } ?>>Start Date<input type="text" id="textbox1" value="<?php echo $data['start_date'];?>"/></div>
             	<div class="checkbox"><input type="checkbox" class="availability" value="Morning" <?php if(in_array("Morning",$availability)){?> checked="checked" <?php } ?>>Morning</div>
             	<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon" <?php if(in_array("Afternoon",$availability)){?> checked="checked" <?php } ?>>Afternoon</div>
             	<div class="checkbox"><input type="checkbox" class="availability" value="Evening" <?php if(in_array("Evening",$availability)){?> checked="checked" <?php } ?>>Evening</div>
             </div>
			<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/save_search');?>

