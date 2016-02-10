<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Errand Runner"?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
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
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse" <?php if(in_array("Night Nurse",$availability)){?> checked="checked" <?php } ?>>Night Nurse</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun" <?php if(in_array("Weekends Fri/Sun",$availability)){?> checked="checked" <?php } ?>>Weekends Fri / Sun</div>
			 	<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos" <?php if(in_array("Shabbos",$availability)){?> checked="checked" <?php } ?>>Shabbos</div>
		 	</div>
		 		<?php $this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data)); ?>

            	<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
            	<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		  </div>
