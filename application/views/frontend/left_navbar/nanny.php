<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Nanny/Au-Pair";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1">Vehicle</div>                
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1">Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1">Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1">Able to do housework / cleaning</div>                
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1">Able to help with homework</div>                
                <div class="checkbox"><input type="checkbox" class="bath_children" value="1">Able to bathe children</div>
		 		<div class="checkbox"><input type="checkbox" class="bed_children" value="1">Able to put children to bed</div>
                <div class="checkbox"><input type="checkbox" class="available_on_short_notice" value="1">Available on short notice</div>		 		
		 	</div>


	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		</div>

