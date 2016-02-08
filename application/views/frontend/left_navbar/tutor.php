<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo 'Tutor / Private lessons';?></h3>  			
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
	 		<?php $availability = explode(',',$data['availability']); ?>
		 	<div>
		 		<label>When you need lessons</label>
		 		<div class="checkbox first"><input type="checkbox" class="availability" value="Immediate" <?php if(in_array("Immediate",$availability)){?> checked="checked" <?php } ?>>Immediate</div>
			 	<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked" <?php } ?>>Start Date<input type="text" id="textbox1" value="<?php echo $data['start_date'];?>"/></div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally" <?php if(in_array("Occasionally",$availability)){?> checked="checked" <?php } ?>>Occasionally</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Regularly" <?php if(in_array("Regularly",$availability)){?> checked="checked" <?php } ?>>Regularly</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Morning" <?php if(in_array("Morning",$availability)){?> checked="checked" <?php } ?>>Morning</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon" <?php if(in_array("Afternoon",$availability)){?> checked="checked" <?php } ?>>Afternoon</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Evening" <?php if(in_array("Evening",$availability)){?> checked="checked" <?php } ?>>Evening</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun" <?php if(in_array("Weekends Fri/Sun",$availability)){?> checked="checked" <?php } ?>>Weekends Fri / Sun</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="By appointment" <?php if(in_array("By appointment",$availability)){?> checked="checked" <?php } ?>>By appointment</div>
 			</div>

		 	<?php 
		 	$this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data));
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>

			</form>
		</div>
