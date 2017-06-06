		<h3>
                <?php 
                    if(segment(1) == 'jobs' && (segment(2) == 'all' || segment(2) == '') )
                        echo 'Jobs';
                    else
                        echo 'Babysitter';
                ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
        <?php $cat = $this->uri->segment(2)?$this->uri->segment(2):''; ?>
	 	<form method="post" id="left-nav" action="">
 			<div>
	 			<label>Care Location</label>
	 			<div class="checkbox"><input type="checkbox" value="My home" class="looking_to_work">Child's home</div>
	 			<div class="checkbox"><input type="checkbox" value="Caregiver's home" class="looking_to_work">Caregivers home</div>
	 			<div class="checkbox"><input type="checkbox" value="Mother's helper" class="looking_to_work">Mother's helper</div>
	 		</div>
   	        <div class="select-services">
	 			<label>Number of children you can care for</label>
	 			<select name="number_of_children" class="number_of_children">
	 				<option value="">--select--</option>
	 				<option value="1">1</option>
	 				<option value="2">2</option>
	 				<option value="3">3</option>
	 				<option value="4">4</option>
	 				<option value="5">5</option>
	 				<option value="6">5+</option>
	 			</select>
	 		</div>
            <div>
	 			<label></label>
	 			<div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]" class="morenum">Twins</div>
	 			<div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" class="morenum">Triplets</div>
	 		</div>
            <div>
	 			<label>Age of children you can care for</label>
	 			<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"  class="age_group"> 12+ years</div>
	 		</div>
            <div>
                <label>Job Hours</label>
                <div class="checkbox"><input type="checkbox" class="availability" value="One time">One Time</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occassionally">Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>		 		
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Asap">Asap</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse">Night Nurse</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Vacation Sitter">Vacation Sitter</div>
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
                
                            <div>
                <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" class="rate_type"/>Per hour</div>-->
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" class="rate_type"/>Monthly payment available</div>
            </div>
            </div>
	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

