<?php 
	if($detail){
		$established 		= $detail[0]['established'];
		$certification 		= $detail[0]['certification'];
		$willing_to_work	= explode(',',$detail[0]['willing_to_work']);
		$lang 				= explode(',', $detail[0]['language']);
		$number_of_children	= $detail[0]['number_of_children'];
		$number_of_staff 	= $detail[0]['number_of_staff'];
		$ref 				= $detail[0]['references'];
		$ref_det 			= $detail[0]['references_details'];
		$desc 				= $detail[0]['profile_description'];
		$hr_rate 			= $detail[0]['hourly_rate'];
	}
?>
<div class="form-group">
<label class="control-label">Year established</label>
<div class="ad-manager-full-input">
	<select name="established" class="required">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>" <?php if($established == $i){?> selected="selected" <?php } ?> ><?php echo $i;?></option>
            <?php endfor;?>
    </select>
</div>
</div>
<div class="form-group">
	<label class="control-label">Certification</label>
	<div class="ad-manager-full-input">
		<input type="text" value="<?php echo $certification;?>" name="certification" class="required">
	</div>
</div>
<div class="form-group">
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Autism" name="willing_to_work[]" <?php if(in_array('Autism', $willing_to_work)){?> checked="checked" <?php }?> >Autism<br/>
		<input type="checkbox" value="Down Syndrome" name="willing_to_work[]" <?php if(in_array('Down Syndrome', $willing_to_work)){?> checked="checked" <?php }?>>Down Syndrome<br/>
		<input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willing_to_work)){?> checked="checked" <?php }?>>Wheelchair bound
	</div>
</div>
<div class="form-group">
	<label class="control-label">Spoken language</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$lang)){?> checked="checked" <?php } ?> >English<br/>
		<input type="checkbox" name="language[]" value="Spanish" <?php if(in_array('Spanish',$lang)){?> checked="checked" <?php } ?>>Spanish<br/>
		<input type="checkbox" name="language[]" value="Sign Language" <?php if(in_array('Sign Language',$lang)){?> checked="checked" <?php } ?>>Sign Language
	</div>
</div>
<div class="form-group">
	<label class="control-label">Number of patients</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $number_of_children;?>" name="number_of_children" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Number of staff (per patient)</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $number_of_staff;?>" name="number_of_staff" class="required number"></div>
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
	<label class="control-label">Tell us about your organization/ Facilities/ Staff</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?>/> No
    </div>
</div>
<div class="form-group">
	<label class="control-label" style="display:none">Your references details</label>
	<div class="ad-manager-full-input"><textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea></div>
</div>
