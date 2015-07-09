<?php 
	if($detail){
		$subjects 		= explode(',', $detail[0]['subjects']);
		$availability 	= explode(',',$detail[0]['availability']);
		$exp 			= $detail[0]['experience'];
		$training 		= explode(',', $detail[0]['training']);
		$hr_rate 		= $detail[0]['hourly_rate'];
		$desc 			= $detail[0]['profile_description'];
		$ref 			= $detail[0]['references'];
		$bg_check 		= $detail[0]['agree_bg_check'];
	}
?>
<div class="form-group">
	<label class="control-label">Subject(s) (check one or more)</label>
	<div class="ad-manager-full-input">
			<input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php } ?>>Elementary school
			<input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php } ?>>High school
			<input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php } ?>>Post high school
			<input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php } ?>>Special ed
			<input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php } ?>>Music
			<input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php } ?>>Art
			<input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Ohter',$subjects)){?> checked="checked" <?php } ?>>Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-full-input">
			<input type="checkbox" value="Imm/ Start date" name="availability[]"<?php if(in_array('Imm/ Start date',$availability)){?> checked="checked" <?php } ?>>Imm/ Start date
			<input type="checkbox" value="Part time" name="availability[]"<?php if(in_array('Part time',$availability)){?> checked="checked" <?php } ?>>Part time
			<input type="checkbox" value="Full time" name="availability[]"<?php if(in_array('Full time',$availability)){?> checked="checked" <?php } ?>>Full time
			<input type="checkbox" value="Morning" name="availability[]"<?php if(in_array('Morning',$availability)){?> checked="checked" <?php } ?>>Morning
			<input type="checkbox" value="Afternoon" name="availability[]"<?php if(in_array('Afternoon',$availability)){?> checked="checked" <?php } ?>>Afternoon
			<input type="checkbox" value="Evening" name="availability[]"<?php if(in_array('Evening',$availability)){?> checked="checked" <?php } ?>>Evening
			<input type="checkbox" value="By appoitment" name="availability[]"<?php if(in_array('By appoitment',$availability)){?> checked="checked" <?php } ?>>By appoitment
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
	<label class="control-label">Training (check one or more)</label>
	<div class="ad-manager-full-input">
			<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked"<?php } ?>>CPR
			<input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked"<?php } ?>>First Aid
			<input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course',$training)){?> checked="checked"<?php } ?>>Nanny/ Babysitter Course
			<input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$training)){?> checked="checked"<?php } ?>>Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>
	<div class="ad-manager-full-input">
		<select name="hourly_rate" class="required">
            <option value="">Select rate</option>
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
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?> /> Yes
	    <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?> /> Yes
        <input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields (check if yes)</label>
</tr>
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license']){?> checked="checked" <?php } ?> >Drivers license
		<input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle']){?> checked="checked" <?php } ?>>Vehicle
		<input type="checkbox" value="1" name="on_short_notice" <?php if($detail[0]['on_short_notice']){?> checked="checked" <?php } ?>>Available on short notice
	</div>
</div>
