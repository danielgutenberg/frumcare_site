<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo 'Nursery / Playgroup / Drop off / Gan';?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver');
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver'); 
	 		$this->load->view('frontend/left_navbar/fields/smoker');
	 		$this->load->view('frontend/left_navbar/fields/languages');
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver');	
	 		?>
            
            <div>
                <label>For</label>
                <div class="radio"><input type="radio" name="willing" class="willing" value="Boys"/>Boys</div>
                <div class="radio"><input type="radio" name="willing" class="willing" value="Girls"/>Girls</div>
                <div class="radio"><input type="radio" name="willing" class="willing" value=""/>Any</div>
            </div>
            <div>
	 			<label>For Age</label>
	 			<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"  class="age_group"> 12+ years</div>
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

