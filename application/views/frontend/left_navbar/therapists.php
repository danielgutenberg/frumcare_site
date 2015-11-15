<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo 'Therapists';?></h3>  			
	  		<div class="left-search-panel">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<!--<div>
	 			<label>Age of Therapist</label>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from" > to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to" >
	 		</div>-->

	 		<div>
	 			<label>Gender of Therapist</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender" >Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender" > Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender" > Any</div>
	 		</div>
            
            <?php /*
            <div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div> */ ?>
            
	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang" > English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang" > Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang" > Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang" > Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang" > French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang" > Other</div>
	 		</div>
	 		<!--<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish/Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox/Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>-->
	 		<div>
		 		<label>Accepts Insurance</label>
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="1" > Yes
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="2" > No
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

