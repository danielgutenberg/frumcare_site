<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Cleaning / Household Help";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			
 			<div>
	 			<label>Job Type</label>
	 			<div class="checkbox"><input type="checkbox" value="Home" class="looking_to_work">Home</div>
	 			<div class="checkbox"><input type="checkbox" value="Office/Business" class="looking_to_work">Office / Business</div>
	 			<div class="checkbox"><input type="checkbox" value="3" class="looking_to_work">Any</div>
	 		</div>

	 		<div>
		 		<label>Job Hours</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="One Time">One time</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Asap">Asap</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends fri/sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 	</div>
            <div>
	 			<label>Gender of helper wanted</label>
	 			<div class="radio"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver"> Male </div>
	 			<div class="radio"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver"> Female </div>
                <div class="radio"><input type="radio" name="gender_of_caregiver" value="" class="gender_of_caregiver"> Any </div>
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
            
            <div class="checkbox"><input type="checkbox" class="rate_type" value="2" name="rate_type[]">Monthly payment available</div>
        </div>

            	<div>
		 		<div class="educationss" colspan="2">
		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" data-toggle="tooltip" data-placement="left" title="Save your search. Setup email alerts and be the first to see new profiles that have your search criteria." value="Save this Search" name="searchs">
				 	</div>

			</form>
		  </div>
        </div>
	 		
	  </div>
