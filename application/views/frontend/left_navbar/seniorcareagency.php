<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Senior Care Agency";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<div>
	 			<label>Spoken Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang">English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang">Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang">Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang">Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang">French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang">Other</div>
	 		</div>

	 		<div>
	 			<label>Specialize in</label>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Alz./dementia" class="willing_to_work">Alz. / dementia</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Sight Loss" class="willing_to_work">Sight Loss</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Hearing Loss" class="willing_to_work">Hearing Loss</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Wheelchair bound" class="willing_to_work">Wheelchair bound</div>	 			
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

