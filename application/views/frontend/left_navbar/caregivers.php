			
            <h3>                
                <?php
                if(segment(1) == 'caregivers' && segment(2) == 'workers-staff-for-childcare-facility' ) {
                    echo "Workers / Staff for childcare facility";
                }
                elseif(segment(1) == 'caregivers' && (segment(2) == 'all' || segment(2) == '' ) ) {
                    echo "Caregivers";
                }
                else if(segment(1) == 'caregivers' && segment(2) == 'organizations'){
                	echo 'Workers / Staff';
                } 
                elseif(segment(1) == 'caregivers' && segment(2) == 'organizations' && (segment(3) == 'all' || segment(3) == '')  ) {
                    echo "Caregiver Organizations";
                }
               
                else {
                    echo "Babysitter";
                } ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 			$cat = $this->uri->segment(2)?$this->uri->segment(2):'';

	 		?>
 			

	 		<?php 
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver');
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver');
	 		$this->load->view('frontend/left_navbar/fields/smoker');
	 		$this->load->view('frontend/left_navbar/fields/languages');
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver');
	 		$this->load->view('frontend/left_navbar/fields/care_location');
	 		$this->load->view('frontend/left_navbar/fields/number_of_children');
	 		$this->load->view('frontend/left_navbar/fields/age_of_children');
	 		$this->load->view('frontend/left_navbar/fields/minimum_experience');
	 		$this->load->view('frontend/left_navbar/fields/training');
	 		$this->load->view('frontend/left_navbar/fields/when_you_need_care')
	 		
	 		?>
		 	
		 	<div>
		 		<label>Abilities and skills</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1">Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1">Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1">Able to do light housework / cleaning</div>
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1">Able to help with homework</div>
		 		<div class="checkbox"><input type="checkbox" class="sick_child_care" value="1">Able to care for sick child</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1">Available on short notice</div>

		 	</div>


	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>


