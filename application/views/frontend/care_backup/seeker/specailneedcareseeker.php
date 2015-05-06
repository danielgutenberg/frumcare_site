<ol class="progtrckr" data-progtrckr-steps="3">
	<li class="progtrckr-done">Sign up</li>
	<li class="progtrckr-done">Job Details</li>
	<li class="progtrckr-done">Start Getting Calls</li>
</ol>

<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post">
	<div class="ad-form-container">
		<div>
			<h1 class="step2">Step 2: Job Details</h1>
		</div>
		<div>
			<label>Looking to work in (check one or more)</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Live in" name="looking_to_work[]"> Live in</div>
				<div class="checkbox"><input type="checkbox" value="Live out" name="looking_to_work[]"> Live out</div>
			</div>
		</div>
		<div>
			<label>Address/ Location</label>
			<div>
				<input type="text" name="location" class="required" value=""/>
			</div>    
		</div>
		<div>
			<label>Phone</label>
			<div class="form-field">
				<input type="text" name="contact_number" class="required" value=""/>
			</div>
		</div>
		<div>
			<label>Age of person requiring care</label>
			<div class="form-field">
				<input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
			</div>
		</div>

		<div>
			<label>Gender of person requiring care</label>
			<div class="form-field">
				<div class="radio"><input type="radio" value="1" name="gender" checked> Male</div>
				<div class="radio"><input type="radio" value="2" name="gender"> Female</div>
			</div>
		</div>
		<div>
			<label>Conditions senior suffers from</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Alz." name="willing_to_work[]"> Alz.</div>
				<div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]"> Sight loss</div>
				<div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]"> Hearing loss</div>
				<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> Wheelchair bound</div>
			</div>
		</div>

		<div>
			<label>When you need care</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]"> Part Time</div>
				<div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]"> Full Time</div>
				<div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]"> Days/ hours</div>
				<div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
				<div class="checkbox full"><input type="checkbox" value="Start Date" name="st_date_disp" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" style="display: none;"/></div>
			</div>
		</div>
		<div>
			<label>Tell us about needs</label>
			<div class="form-field">
				<textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
			</div>
		</div>

		<h2>Encouraged but not mandatory fields</h2>
		<div>
			<label>Gender of caregiver</label>
			<div class="form-field">
				<div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
				<div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
			</div>
		</div>

		<div>
			<label>Languages</label>
			<div class="form-field">
				<select name="language[]" multiple>
					<option value="eng">
						English
					</option>
					<option value="es">
						Spanish
					</option>
					<option value="sign">
						Sign Language
					</option>
				</select>
			</div>
		</div>
		<div>
			<label>Level of observance necessary</label>
			<div class="form-field">
				<select name="religious_observance" class="required">
					<option value="">Select</option>
					<option value="Orthodox">Orthodox</option>
					<option value="Modern Orthodox">Modern orthodox</option>
					<option value="Other">Other</option>
					<option value="Not Jewish">Not necessary</option>
				</select>
			</div>
		</div>
		<div>
			<label>Caregiver age from</label>
			<div class="form-field">
				<select name="age_group" class="required">
					<option value="">Select caregiver age from</option>
					<option value="1-5" <?php echo isset($age_grp) && $age_grp == '1-5' ? 'selected' : '' ?>>1 to 5</option>
					<option value="5-10" <?php echo isset($age_grp) && $age_grp == '5-10' ? 'selected' : '' ?>>5 to 10</option>
					<option value="10-15" <?php echo isset($age_grp) && $age_grp == '10-15' ? 'selected' : '' ?>>10 to 15</option>
				</select>
			</div>
		</div>
		<div>
			<input type="checkbox" value="1" name="driver_license"> <label>Has Drivers license</label>
		</div>
		<div>
			<input type="checkbox" value="1" name="vehicle"> <label>Has own Vehicle</label>
		</div>
		<div>
			<label>Smoking acceptable</label>
			<div class="form-field">
				<div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
				<div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
			</div>
		</div>

		<div>
			<label>Training/ certification required</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
				<div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
				<div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]"> Nanny/ Babysitter course</div>
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
					<option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
				</select>
			</div>
		</div>


		<div class="checkbox-wrap">

			<div>
				<input type="checkbox" value="1" name="cook"> <label>Must be willing to cook/ serve meals</label>
			</div>
			<div>
				<input type="checkbox" value="1" name="basic_housework"> <label>Must be willing to do light housework/ cleaning</label>
			</div>
			<div>
				<input type="checkbox" value="1" name="personal_hygiene"> <label>Must be willing to deal with personal hygiene of senior</label>
			</div>

			<div>
				<input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
			</div>
		</div>
	</div>
</form>