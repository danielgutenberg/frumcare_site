
			<h3><?php echo "Works/Staff for Special Needs Facility"?></h3>  	
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 						
             <div>
	 			<label>Job Type</label>
	 			<div class="checkbox"><input type="checkbox" value="Part Time" class="looking_to_work">Part Time</div>
	 			<div class="checkbox"><input type="checkbox" value="Full Time" class="looking_to_work">Full Time</div>
	 			<div class="checkbox"><input type="checkbox" value="Substitute" class="looking_to_work">Substitute</div>
	 		</div>

 			<div class="select-services">
                <label>Wage</label>
                    <select name="rate" class="rate">
                        <option value="">Select wage</option>
                        <option value="5-10">$5-$10 / Hr</option>
                        <option value="10-15">$10-$15 / Hr</option>
                        <option value="15-25">$15-$25 / Hr</option>
                        <option value="25-35">$25-$35 / Hr</option>
                        <option value="35-45">$35-$45 / Hr</option>
                        <option value="45-55">$45-$55 / Hr</option>
                        <option value="55+">$55+ / Hr</option>
                    </select>   
            </div>

            <div>
                <!--<label></label>-->
                <!--<div class="checkbox"><input type="checkbox" class="rate_type" name="rate_type[]" value="1">Per Hour</div>-->
                <div class="checkbox"><input type="checkbox" class="rate_type" name="rate_type[]" value="2">Monthly payment available</div>
            </div>

	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

