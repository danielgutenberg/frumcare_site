<div class="form-group">
	<label class="control-label">Type of therapy</label>	
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['type_of_therapy'];?>" name="type_of_therapy" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Training/ Certification</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['certification'];?>" name="certification" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
	<?php $exp = $detail[0]['experience'];?>
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
	<label class="control-label">License information</label>
	<div class="ad-manager-full-input"> <input type="text" value="<?php echo $detail[0]['licence_information'];?>" name="license_information" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>
	<div class="ad-manager-full-input">
	<?php $hr_rate = $detail[0]['hourly_rate'];?>
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
	<label class="control-label">Accepts insurance</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($detail[0]['accept_insurance']) && $detail[0]['accept_insurance'] == 1 ? 'checked' : '' ?>/>Yes
        <input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($detail[0]['accept_insurance']) && $detail[0]['accept_insurance'] == 2 ? 'checked' : '' ?> checked/>No
    </div>
</div>

<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($detail[0]['references']) && $detail[0]['references'] == 1 ? 'checked' : '' ?>/>Yes
        <input type="radio" value="2" name="references" class="required" <?php echo isset($detail[0]['references']) && $detail[0]['references'] == 2 ? 'checked' : '' ?> checked/>No
	</div>
</div>

<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($detail[0]['profile_description']) ? $detail[0]['profile_description'] : '' ?></textarea></td>
</div>

