<?php echo $this->breadcrumbs->show();?>
			<h3>Senior Caregiver / Companion</h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 		 			
             <?php $location = explode(',',$data['looking_to_work']); ?>
             <div>
	 			<label>Job Type</label>
                <div class="checkbox"><input type="checkbox" value="Live In" class="looking_to_work" <?php if(in_array("Live In",$location)){?> checked="checked" <?php } ?>/>Live In</div>
                <div class="checkbox"><input type="checkbox" value="Live Out" class="looking_to_work" <?php if(in_array("Live Out",$location)){?> checked="checked" <?php } ?>/>Live Out</div>
	 		</div>
            <div>
	 			<label>Gender of Senior</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="1" class="gender_of_careseeker" <?php if ($data['gender'] == 1) echo 'checked' ?>> Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="2" class="gender_of_careseeker" <?php if ($data['gender'] == 2) echo 'checked' ?>> Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_careseeker" value="" class="gender_of_careseeker" <?php if ($data['gender'] == '') echo 'checked' ?>> Any</div>
	 		</div>
             <?php $availability = explode(',',$data['availability']); ?>
              <div>
                <label>Job Hours (check one or more)</label>
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
				 	<div class="checkbox"><input type="checkbox" class="availability" value="Vacation Sitter" <?php if(in_array("Vacation Sitter",$availability)){?> checked="checked" <?php } ?>>Vacation Sitter</div>
		 	</div>
		 		
		 		<?php $this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data)); ?>

            	<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
            	<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		  </div>
