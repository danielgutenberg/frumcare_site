<?php 
	$templookingtowork = explode(',', $detail[0]['looking_to_work']);
	$tempwillingtowork = explode(',' , $detail[0]['willing_to_work']);
?>

<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Private home" name="looking_to_work[]" <?php if(in_array('Private home',$templookingtowork)){?> checked="checked" <?php }?> >Private home
		<input type="checkbox" value="Office" name="looking_to_work[]" <?php if(in_array('Office',$templookingtowork)){?> checked="checked" <?php }?>>Office
		<input type="checkbox" value="Cleaning company" name="looking_to_work[]" <?php if(in_array('Cleaning company',$templookingtowork)){?> checked="checked" <?php }?>>Cleaning company
	</div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
		<select name="experience" class="required">
            <option value="">Select years of experience</option>
            <option value="1" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == '5+' ? 'selected' : '' ?>>5+ years</option>
	    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>
	<div class="ad-manager-full-input">
		<select name="hourly_rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '55+' ? 'selected' : '' ?>>$55+</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $tempwillingtowork)){?> checked="checked" <?php }?> >Floors
		<br />
		<input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $tempwillingtowork)){?> checked="checked" <?php }?> >Windows
		<br />
		<input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $tempwillingtowork)){?> checked="checked" <?php }?>>Dishes
		<br />
		<input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $tempwillingtowork)){?> checked="checked" <?php }?>>Laundry
		<br />
		<input type="checkbox" value="Wash" name="willing_to_work[]" <?php if(in_array('Wash', $tempwillingtowork)){?> checked="checked" <?php }?>>Wash
		<br />
		<input type="checkbox" value="Fold" name="willing_to_work[]" <?php if(in_array('Fold', $tempwillingtowork)){?> checked="checked" <?php }?>>Fold
		<br />
		<input type="checkbox" value="Iron" name="willing_to_work[]" <?php if(in_array('Iron', $tempwillingtowork)){?> checked="checked" <?php }?>>Iron
		<br />
		<input type="checkbox" value="Furniture" name="willing_to_work[]" <?php if(in_array('Furniture', $tempwillingtowork)){?> checked="checked" <?php }?>>Furniture
		<br />
	</div>
</div>