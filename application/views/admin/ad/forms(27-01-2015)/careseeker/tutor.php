<?php 
	if($detail){
		$subjects = explode(',', $detail[0]['subjects']);
		$age 	  = $detail[0]['age'];
		$lang 	  =	explode(',',$detail[0]['language']);
		$age_grp  = $detail[0]['age_group'];
		$exp 	  = $detail[0]['experience'];
		$training = explode(',',$detail[0]['training']);
	}
?>
<div class="form-group">
	<label class="control-label">Address/ Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Ages of student</label>
	<div class="ad-manager-full-input"><input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/></div>
</div><div class="form-group">
	<label class="control-label">Gender of student</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Looking for help in the following subject(s):</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php }?> > Elementary school<br/>
        <input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php }?>> High school<br/>
        <input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php }?>> Post high school<br/>
        <input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php }?>> Special ed<br/>
        <input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php }?>> Music<br/>
        <input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php }?>> Art<br/>
       <input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Ohter',$subjects)){?> checked="checked" <?php }?>> Ohter
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields</label>
</div>
<div class="form-group">
	<label class="control-label">Language</label>
	<div class="ad-manager-full-input">
		<select name="language[]" multiple>
                <option value="eng" <?php if(in_array('eng',$lang)){?> selected="selected" <?php }?> >
                    English
                </option>
                <option value="es" <?php if(in_array('es',$lang)){?> selected="selected" <?php }?>>
                    Spanish
                </option>
                <option value="sign" <?php if(in_array('sign',$lang)){?> selected="selected" <?php }?>>
                    Sign Language
                </option>
            </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender of tutor</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 2){?> checked="checked" <?php }?>> Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tutor age from</label>
	<div class="ad-manager-full-input">
		 <select name="age_group" class="required">
            <option value="">Select tutor age from</option>
            <option value="10-20" <?php echo isset($age_grp) && $age_grp == '1-5' ? 'selected' : '' ?>>10 to 20</option>
            <option value="20-30" <?php echo isset($age_grp) && $age_grp == '5-10' ? 'selected' : '' ?>>20 to 30</option>
            <option value="30-40" <?php echo isset($age_grp) && $age_grp == '10-15' ? 'selected' : '' ?>>30 to 40</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] = 1){?> checked="checked" <?php }?> > Yes
        <input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] = 2){?> checked="checked" <?php }?> > No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance">
            <option value="">Select</option>
            <option value="Orthodox" <?php if($detail[0]['religious_observance'] == 'Orthodox'){?> selected="selected" <?php }?>>Orthodox</option>
            <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> selected="selected" <?php }?> >Modern orthodox</option>
            <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> selected="selected" <?php }?>>Other</option>
            <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> selected="selected" <?php }?>>Not necessary</option>
       </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Minimum years experience</label>
	<div class="ad-manager-full-input">
		<select name="experience" class="required">
            <option value="">Select Minimum years experience</option>
            <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Training/ certification required</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked" <?php }?> > CPR<br/>
        <input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked" <?php }?>> First Aid<br/>
        <input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$training)){?> checked="checked" <?php }?>> Nanny/ Babysitter course<br/>
        <input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$training)){?> checked="checked" <?php }?>> Not necessary
	</div>
</div>
<style type="text/css">
html{
	height: auto;
}
</style>