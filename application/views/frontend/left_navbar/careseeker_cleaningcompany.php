<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Works for Cleaning Company";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			 		

 			  <div>
	 			<label>Job Type</label>
	 			<div class="checkbox"><input type="checkbox" value="Part Time" class="looking_to_work">Part Time</div>
	 			<div class="checkbox"><input type="checkbox" value="Full Time" class="looking_to_work">Full Time</div>
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
                    <div class="checkbox"><input type="checkbox" class="rate_type" name="rate_type[]" value="2">Monthly Payment Available</div>
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