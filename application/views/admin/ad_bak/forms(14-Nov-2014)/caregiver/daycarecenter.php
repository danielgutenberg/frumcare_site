<?php 
	if($detail){
		$lookingtowork = explode(',',$detail[0]['looking_to_work']);
		$age_grp = $detail[0]['age_group'];
		$lang = explode(',',$detail[0]['language']);
		$training = explode(',',$detail[0]['training']);
		$exp = $detail[0]['experience'];
		$hr_rate = $detail[0]['hourly_rate'];
		$availability = explode(',', $detail[0]['availability']);
		$desc = $detail[0]['profile_description'];
		$ref  = $detail[0]['references'];

	}
?>
<div class="form-group">
	<label class="control-label">Looking to work for (check one or more)</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Boys" name="looking_to_work[]"<?php if(in_array('Boys',$lookingtowork)){?> checked="checked"<?php }?> >Boys
		<input type="checkbox" value="Girls" name="looking_to_work[]"<?php if(in_array('Girls',$lookingtowork)){?> checked="checked"<?php }?> > Girls
	</div>
</div>
<div class="form-group">
	<label class="control-label">Year established</label>
	<div class="ad-manager-full-input">
		<select name="established" class="required">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>" <?php if($detail[0]['established'] == $i){?> selected="selected" <?php }?> ><?php echo $i;?></option>
            <?php endfor;?>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Certification</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['certification'];?>" name="certification" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Age group</label>
	<div class="ad-manager-full-input">
		<select name="age_group" class="required">
            <option value="">Select age group</option>
            <option value="0-1" <?php echo isset($age_grp) && $age_grp == '0-1' ? 'selected' : '' ?>>First year</option>
            <option value="1-3" <?php echo isset($age_grp) && $age_grp == '1-3' ? 'selected' : '' ?>>1 to 3 years</option>
            <option value="3-5" <?php echo isset($age_grp) && $age_grp == '3-5' ? 'selected' : '' ?>>3 to 5 years</option>
            <option value="6-11" <?php echo isset($age_grp) && $age_grp == '6-11' ? 'selected' : '' ?>>6 to 11 years</option>
            <option value="12+" <?php echo isset($age_grp) && $age_grp == '6-11' ? 'selected' : '' ?>>12+ years</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Spoken language</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $lang)){?> checked="checked" <?php }?> >English
		<input type="checkbox" name="language[]" value="Spanish" <?php if(in_array('Spanish', $lang)){?> checked="checked" <?php }?>>Spanish
		<input type="checkbox" name="language[]" value="Sign Language" <?php if(in_array('Sign Language',$lang)){?> checked="checked" <?php }?>>Sign Language
	</div>
</div>
<div class="form-group">
	<label class="control-label">Number of children in group</label>
	<div class="ad-manager-full-input"><input type="text" value="" name="number_of_children" class="required number" value="<?php echo $detail[0]['number_of_children'];?>"></div>
</div>
<div class="form-group">
	<label class="control-label">Number of staff</label>
	<div class="ad-manager-full-input"><input type="text" value="" name="number_of_staff" class="required number" value="<?php echo $detail[0]['number_of_staff'];?>"></div>
</div>
<div class="form-group">
	<label class="control-label">Training (check one or more)</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked" <?php } ?> >CPR
		<input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked" <?php } ?> >First Aid
		<input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course',$training)){?> checked="checked" <?php } ?> >Nanny/ Babysitter Course
		<input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$training)){?> checked="checked" <?php } ?> >Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
		<select name="experience" class="required">
            <option value="">Select years of experience</option>
            <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
	</div>
</div>
<div class="form-group">	
	<label class="control-label">Cost</label>
	<div class="ad-manager-full-input">
		<select name="hourly_rate" class="required">
            <option value="">Select cost</option>
            <option value="5-10" <?php echo isset($hr_rate) && $hr_rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($hr_rate) && $hr_rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($hr_rate) && $hr_rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($hr_rate) && $hr_rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($hr_rate) && $hr_rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($hr_rate) && $hr_rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($hr_rate) && $hr_rate == '55+' ? 'selected' : '' ?>>$55+</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Daily hours" name="availability[]" <?php if(in_array('Daily hours',$availability)){?> checked="checked" <?php } ?>>Daily hours
		<input type="checkbox" value="Weekend hours" name="availability[]" <?php if(in_array('Weekend hours',$availability)){?> checked="checked" <?php } ?>>Weekend hours
		<input type="checkbox" value="Vacation schedule" name="availability[]" <?php if(in_array('Vacation schedule',$availability)){?> checked="checked" <?php } ?>>Vacation schedule
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No
	</div>
</div>
