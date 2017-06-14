
			<h3><?php echo "Nanny/Au-Pair";?></h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">

	 		<?php 
	 		
	 		$this->load->view('frontend/left_navbar/fields/minimum_experience');
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); 
	 		$this->load->view('frontend/left_navbar/fields/smoker');
	 		$this->load->view('frontend/left_navbar/fields/languages');
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver');
	 		 		
	 		?>
	 		<?php $location = explode(',',$data['looking_to_work']); ?>
            <div>
                <label>Nanny Type</label>
                <div class="checkbox"><input type="checkbox" value="Live In" class="looking_to_work" <?php if(in_array("Live In",$location)){?> checked="checked" <?php } ?>/>Live In</div>
                <div class="checkbox"><input type="checkbox" value="Live Out" class="looking_to_work" <?php if(in_array("Live Out",$location)){?> checked="checked" <?php } ?>/>Live Out</div>
            </div>
	 		
	 		<?php 
		 		$this->load->view('frontend/left_navbar/fields/number_of_children', array('data' => $data));
		 		$this->load->view('frontend/left_navbar/fields/age_of_children', array('data' => $data));
		 		$this->load->view('frontend/left_navbar/fields/minimum_experience');
		 		$this->load->view('frontend/left_navbar/fields/training', array('data' => $data));
		 	?>
		 	<?php $this->load->view('frontend/left_navbar/fields/when_you_need_care'); ?>
		 	<div>
		 		<label>Abilities and skills</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1" <?php if ($data['driver_license'] == 1) echo 'checked' ?>>Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1" <?php if ($data['vehicle'] == 1) echo 'checked' ?>>Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1" <?php if ($data['pick_up_child'] == 1) echo 'checked' ?>>Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1" <?php if ($data['cook'] == 1) echo 'checked' ?>>Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1" <?php if ($data['basic_housework'] == 1) echo 'checked' ?>>Able to do light housework / cleaning</div>
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1" <?php if ($data['homework_help'] == 1) echo 'checked' ?>>Able to help with homework</div>
		 		<div class="checkbox"><input type="checkbox" class="sick_child_care" value="1" <?php if ($data['sick_child_care'] == 1) echo 'checked' ?>>Able to care for sick child</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1" <?php if ($data['on_short_notice'] == 1) echo 'checked' ?>>Available on short notice</div>
		 	</div>


	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>


