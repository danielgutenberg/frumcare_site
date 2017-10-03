		
            <h3>                
                <?php
                if(segment(1) == 'caregivers' && segment(3) == 'workers-staff-for-childcare-facility' ) {
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
                    echo "Pediatric / Baby Nurse";
                } ?>
            </h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 			$cat = $this->uri->segment(2)?$this->uri->segment(2):'';

	 		
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/smoker', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/number_of_children', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/age_of_children', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/minimum_experience', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/when_you_need_care', array('data' => $data));
	 		?>
		 	<?php
		 	$this->load->view('frontend/left_navbar/fields/save_search');
		 	?>


