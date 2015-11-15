<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Day Care Center / Day Camp / Afternoon Activities";?></h3>  			
	  		<div class="left-search-panel">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<div>
                <label>Type of Organization</label>
                <select name="sub_care" class="sub_care">
                    <option value="">Select</option>
                    <option value="day care center">Day Care Center</option>
                    <option value="day camp">Day Camp</option>
                    <option value="afternoon activities">Afternoon Activities</option>
                    <option value="pre school">Pre-School</option>
                    <option value="other">Other</option>
                </select>
            </div>
             <div>
	 			<label>For</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender">Boys</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender">Girls</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender">Any</div>
	 		</div>
   	        <div>
	 			<label>For ages</label>
	 			<div class="checkbox first"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"  class="age_group"> 12+ years</div>
	 		</div>
	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang">English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang">Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang">Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang">Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang">French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang">Other</div>
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
