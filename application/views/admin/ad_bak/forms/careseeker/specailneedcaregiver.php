<?php 
	if($detail){
		$looking_to_work = explode(',', $detail[0]['looking_to_work']);
		$location 		 = $detail[0]['location'];
		$contact_number  = $detail[0]['contact_number'];
		$age 			 = $detail[0]['age'];
		$willing_to_work = explode(',',$detail[0]['willing_to_work']);
		$availability 	 = explode(',', $detail[0]['availability']);
		$age_grp 		 = $detail[0]['age_group'];
		$language 		 = explode(',',$detail[0]['language']);
		$training 		=  explode(',',$detail[0]['training']);
		$exp 			= $detail[0]['experience'];
	}
?>
<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in', $looking_to_work)){?> checked=
		"checked" <?php }?> > Live in
        <input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out', $looking_to_work)){?> checked=
		"checked" <?php }?>> Live out
	</div>
</div>
<div class="form-group">
	<label class="control-label">Address/ Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $location;?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $contact_number;?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Age of person requiring care</label>
	<div class="ad-manager-full-input">
		<input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender of person requiring care</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] = 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] = 2){?> checked="checked" <?php }?> > Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Conditions senior suffers from</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="Alz." name="willing_to_work[]" <?php if(in_array('Alz.',$willing_to_work)){?> checked="checked" <?php }?>> Alz.<br/>
        <input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willing_to_work)){?> checked="checked" <?php }?>> Sight loss<br/>
        <input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willing_to_work)){?> checked="checked" <?php }?>> Hearing loss<br/>
        <input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked" <?php }?>> Wheelchair bound
    </div>
</div>
<div class="form-group">
	<label class="control-label">When you need care</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time',$availability)){?> checked="checked" <?php } ?>> Part Time<br/>
        <input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time', $availability)){?> checked="checked" <?php } ?>> Full Time<br/>
        <input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array('Days/ hours',$availability)){?> checked="checked" <?php } ?>> Days/ hours<br/>
        <input type="checkbox" value="Asap/ start date" name="availability[]" <?php if(in_array('Asap/ start date',$availability)){?> checked="checked" <?php } ?>> Asap/ start date
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<div class="ad-manager-full-input">Encouraged but not mandatory fields</label>
</div>
<div class="form-group">
	<label class="control-label">Gender of caregiver</label>
<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 2){?> checked="checked" <?php }?> > Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Languages</label>
	<div class="ad-manager-full-input">
		<select name="language[]" multiple>
            <option value="eng" <?php if(in_array('eng', $language)){?> selected="selected" <?php } ?>>
                English
            </option>
            <option value="es" <?php if(in_array('es', $language)){?> selected="selected" <?php } ?>>
                Spanish
            </option>
            <option value="sign" <?php if(in_array('sign', $language)){?> selected="selected" <?php } ?>>
                Sign Language
            </option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance" class="required">
            <option value="">Select</option>
            <option value="Orthodox" <?php if($detail[0]['religious_observance']= 'Orthodox'){?> selected="selected" <?php }?> >Orthodox</option>
            <option value="Modern Orthodox" <?php if($detail[0]['religious_observance']= 'Modern Orthodox'){?> selected="selected" <?php }?> >Modern orthodox</option>
            <option value="Other" <?php if($detail[0]['religious_observance']= 'Other'){?> selected="selected" <?php }?> >Other</option>
            <option value="Not Jewish" <?php if($detail[0]['religious_observance']= 'Not Jewish'){?> selected="selected" <?php }?> >Not necessary</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Caregiver age from</label>
	<div class="ad-manager-full-input">
		 <select name="age_group" class="required">
            <option value="">Select caregiver age from</option>
            <option value="1-5" <?php echo isset($age_grp) && $age_grp == '1-5' ? 'selected' : '' ?>>1 to 5</option>
            <option value="5-10" <?php echo isset($age_grp) && $age_grp == '5-10' ? 'selected' : '' ?>>5 to 10</option>
            <option value="10-15" <?php echo isset($age_grp) && $age_grp == '10-15' ? 'selected' : '' ?>>10 to 15</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-full-input"><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] = 1){?> checked="checked" <?php }?> >Has Drivers license</div>
</div>
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-full-input"><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] = 1){?> checked="checked" <?php }?>>Has own Vehicle</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] = 1){?> checked="checked" <?php }?>> Yes
        <input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] = 2){?> checked="checked" <?php }?>> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Training/ certification required</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> CPR<br/>
        <input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> First Aid<br/>
        <input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course', $training)){?> checked="checked" <?php } ?>> Nanny/ Babysitter course<br/>
        <input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary', $training)){?> checked="checked" <?php } ?>> Not necessary
	</div>
</div><div class="form-group">
	<label class="control-label">Minimum experience</label>
	<div class="ad-manager-full-input">
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
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked <?php }?> >Must be willing to cook/ serve meals<br/>
		<input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked <?php }?>>Must be willing to do light housework/ cleaning<br/>
		<input type="checkbox" value="1" name="personal_hygiene" <?php if($detail[0]['personal_hygiene'] == 1){?> checked <?php }?>>Must be willing to deal with personal hygiene of senior
	</div>
</div>
<style>
	html{
		height: auto;
	}
</style>