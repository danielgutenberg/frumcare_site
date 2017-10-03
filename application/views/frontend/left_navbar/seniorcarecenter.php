
			<h3><?php echo 'Senior Care Center';?></h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
           	<div>
                <label>Type of Organization</label>
                <select name="sub_care" class="sub_care">
                    <option value="">Select</option>
                    <option value="assisted living residence">Assisted living residence</option>
                    <option value="senior care center">Senior care center / Nursing home</option>
                    <!--<option value="nursing home">Nursing home</option>-->
                    <option value="rehab therapy center">Rehab / Therapy Center</option>
                    <option value="other">Other</option>
                </select>
            </div>
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
	 			<label>Specialize In</label>
	 			<div class="checkbox"><input type="checkbox" value="Alz./dementia" class="willing_to_work">Alz. / dementia</div>
	 			<div class="checkbox"><input type="checkbox" value="Sight loss" class="willing_to_work">Sight loss</div>
                <div class="checkbox"><input type="checkbox" value="Hearing loss" class="willing_to_work">Hearing loss</div>
	 			<div class="checkbox"><input type="checkbox" value="Wheelchair Bound" class="willing_to_work">Wheelchair Bound</div>
	 		</div>
            <div>
                <label>Observance in facility</label>
                <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" class="extra_field" />Shul on premises</div>
                <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" class="extra_field" />Kosher kitchen</div>
                <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" class="extra_field" />Kosher food available</div>
                <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" class="extra_field" />Shabbos observant facility</div>
            </div>
	 		<div>
		 		<div class="educationss" colspan="2">
		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" data-toggle="tooltip" data-placement="left" title="Save your search. Setup email alerts and be the first to see new profiles that have your search criteria." value="Save this Search" name="searchs">
				 	</div>
				 </div>
				</div>

