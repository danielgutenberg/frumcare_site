<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Tutor/Private lessons";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 					
             <div>
                <label>Subject(s)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]" class="subject"> Elementary school</div>
                    <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]" class="subject"> High school</div>
                    <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]" class="subject"> Post high school</div>
                    <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" class="subject"/>Limudei Kodesh</div>
                    <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" class="subject" />General Studies</div>
                    <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]" class="subject"> Music</div>
                    <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]" class="subject"> Art</div>
                    <div class="checkbox"><input type="checkbox" value="Other" name="subjects[]" class="subject"> Other</div>
                </div>
            </div>
 			<div>
	 			<label>Gender of tutor wanted</label>
	 			<div class="radio-half"><input type="radio" name="gender" value="1" class="gender"> Male  </div>
	 			<div class="radio-half"><input type="radio" name="gender" value="2" class="gender"> Female </div>
                <div class="radio-half"><input type="radio" name="gender" value="3" class="gender"> Any </div>
	 		</div> 

	 		<div>
	 			<label>Gender of Student</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver">Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver"> Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender_of_caregiver"> Any</div>
	 		</div>
            <div>
		 		<label>Job Hours (check one or more)</label>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occassionally">Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Asap">Asap</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
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
                    <!-- <select name="rate_type" class="rate_type">
                        <option value="">Select type</option>
                        <option value="1">Per Hour</option>
                        <option value="2">Global Monthly Payment</option>
                    </select> -->
            </div>

            <div>
                <!--<label></label>-->
                <!--<div class="checkbox"><input type="checkbox" class="rate_type" value="1">Per hour</div>-->
                <div class="checkbox"><input type="checkbox" class="rate_type" value="2">Monthly payment avaialble</div>
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
