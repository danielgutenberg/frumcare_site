<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>                
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<script>
    $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    //console.log(place.geometry.location);
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();                                 
                    $("#lat").val(lat);
                    $("#lng").val(lng);   
                    document.getElementById("error").innerHTML="";
                });
    });
     $(document).ready(function() {
       $('.btn').click(function(event) {
        event.preventDefault(); 
        if ($('#lat').val() == '') {
            window.scrollTo(0, $("#locationField").offset().top);
            $("#locationField").css('border-color', 'red')
           document.getElementById("error").innerHTML="Please click on location from dropdown";
        } else {
            $('#personal-details-form').submit()
            $('#newJob').submit()
        }
     });
    })
     
     
</script>
<?php if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } 
$user_detail = get_user(check_user());
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $age = $user_detail['age'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
?>
<?php if(($this->uri->segment(2) != 'new_profile')){?>
<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post" id="personal-details-form">
<?php }else{
			$attributes = array('id' => 'newJob');
    		echo form_open('user/addprofileconfirm', $attributes);
			if(!empty($record)){
				echo form_hidden('account_category',$record['ac_type']);
				echo form_hidden('care_type',$record['submit_id']);
				echo form_hidden('account_type',$record['account_type']);
                echo form_hidden('organization_care',@$record['organization_care']);
			}} ?>
	<div class="ad-form-container" style="padding-left:130px;">
	
		<?php if($this->uri->segment(2) != 'new_profile'){?> 
			<div>
				<h1 class="step2" style="text-align:left; font-size:36px; width:500px">Step 2: Job Details</h1>
			</div>
		<?php } ?>

		<div>
			<label>Looking for</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Live in" name="looking_to_work[]"> Live in</div>
				<div class="checkbox"><input type="checkbox" value="Live out" name="looking_to_work[]"> Live out</div>
			</div>
		</div>
		<div>
<label>Location</label>
<div id="locationField">
    <input type="hidden" id="lat" name="lat"/>
    <input type="hidden" id="lng" name="lng"/> 
    <input type="text" name="location" class="required" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
</div>    
<span style="color:red;" id="error"> </span>
</div>
        <div >
            <label>Neighborhood / Street</label>
            <div class="form-field">
            <input type="text" name="neighbour" class="required" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
            </div>    
        </div>         
		<div>
			<label>Phone</label>
			<div class="form-field">
				<input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
			</div>
		</div>
		<div>
			<label>Age of person requiring care</label>
			<div class="form-field">
				<input type="text" name="age" class="number" value="<?php echo isset($age) ? $age : '' ?>"/>
			</div>
		</div>

		<div>
			<label>Gender of person requiring care</label>
			<div class="form-field">
				<div class="radio"><input type="radio" value="1" name="gender_of_careseeker" checked> Male</div>
				<div class="radio"><input type="radio" value="2" name="gender_of_careseeker"> Female</div>
			</div>
		</div>
		<div>
			<label>Conditions patient suffers from</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]"> <span>Autism</span></div>
				<div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]"> <span>Down Syndrome</span></div>						
				<div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]"> <span>Handicapped</span></div>
				<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
			</div>
		</div>

		<div>
			<label>When you need care</label>
			<div class="form-field">
				<div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
					<div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/>Asap</div>
					<div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" autocomplete="off"/></div>
					<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
					<div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
					<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>				
					<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]"> <span>Weekends Fri. / Sun.</span></div>					
					<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"> <span>Shabbos</span></div>
					<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]"> <span>24 hr care</span></div>
				</div>
            </div>
		</div>
		<div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
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
        </div>

         <div>
            <!--<label>Check one or more</label>
            <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
            <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
        </div>
		<div>
			<label>Tell us about your needs</label>
			<div class="form-field">
				<textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
			</div>
		</div>

		<h2>Additional Requirements</h2>
		<div>
			<label>Gender of caregiver</label>
			<div class="form-field">
				<div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
				<div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
                <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Any</div>
			</div>
		</div>
    	<div>
    		<label>Languages necessary</label>
    		<div class="form-field">
                <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>

    		</div>
    	</div>
    	<div>
    		<label>Level of observance necessary</label>
    		<div class="form-field">
    			<select name="religious_observance" class="">
    				<option value="">Select</option>
    				<option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
    				<option value="Orthodox/Modern Orthodox">Orthodox / Modern orthodox</option>
                    <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
    				<option value="Not Necessary">Not necessary</option>
    			</select>
    		</div>
    	</div>
        <div>
            <label>Age of Caregiver wanted</label>
            <div class="form-field">
                <input type="text" name="caregiverage_from" style="width:25%" placeholder="Age From"> to  <input type="text" name="caregiverage_to" style="width:25%" placeholder="Age To">
            </div>
        </div>

        <div>
			<label>Smoking acceptable</label>
			<div class="form-field">
				<div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
				<div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
			</div>
		</div>

		<div>
			<label>Training / Certification required</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
				<div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
				<div class="checkbox"><input type="checkbox" value="Special needs training" name="training[]">Special needs training</div>
				<div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> Nurse</div>
                <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
			</div>
		</div>
		<div>
			<label>Minimum experience</label>
			<div class="form-field">
				<select name="experience">
					<option value="">Select minimum experience</option>
					<option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
					<option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
					<option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
					<option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
					<option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
				</select>
			</div>
		</div>

        <div class="form-field">
    		<div class="checkbox">
    			<input type="checkbox" value="1" name="driver_license">Drivers license
    		</div>
    		<div class="checkbox">
    			<input type="checkbox" value="1" name="vehicle"> Vehicle
    		</div>
        	<div class="checkbox">
				<input type="checkbox" value="1" name="cook">Must be willing to cook and prepare food / serve meals 
			</div>
			<div class="checkbox">
				<input type="checkbox" value="1" name="basic_housework">Must be willing to do light housework / cleaning
			</div>
			<div class="checkbox">
				<input type="checkbox" value="1" name="personal_hygiene">Must be willing to deal with personal hygiene of patient
			</div>

			<div >
				<input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
			</div>
        </div>    
	</div>
</form>
