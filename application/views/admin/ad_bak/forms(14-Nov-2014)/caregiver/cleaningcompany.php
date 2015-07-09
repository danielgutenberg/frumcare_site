<div class="form-group">
	<label class="control-label">Year Established</label>
	<div class="ad-manager-full-input">
		<select name="established" class="form-control">
			 <option value="">Select year established</option>
                <?php for($i=1950;$i<=date('Y');$i++):?>
                <option value="<?php echo $i?>" <?php if($i == $detail[0]['established']){?> selected="selected"<?php } ?>><?php echo $i;?></option>
                <?php endfor;?>
		</select>
	</div>
</div>
<div class="form-group">
<?php 
		$temp = explode(',' ,$detail[0]['willing_to_work']);
	?>
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $temp)){?> checked="checked" <?php }?>> Floors
	    <input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $temp)){?> checked="checked" <?php }?>> Windows
	    <input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $temp)){?> checked="checked" <?php }?>> Dishes
	    <input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $temp)){?> checked="checked" <?php }?>> Laundry
	    <input type="checkbox" value="Wash" name="willing_to_work[]" <?php if(in_array('Wash', $temp)){?> checked="checked" <?php }?>> Wash
	    <input type="checkbox" value="Fold" name="willing_to_work[]" <?php if(in_array('Fold', $temp)){?> checked="checked" <?php }?>> Fold
	    <input type="checkbox" value="Iron" name="willing_to_work[]" <?php if(in_array('Iron', $temp)){?> checked="checked" <?php }?>> Iron
	    <input type="checkbox" value="Furniture" name="willing_to_work[]" <?php if(in_array('Furniture', $temp)){?> checked="checked" <?php }?>> Furniture
	</div>
</div>
<div class="form-group">
	<?php 
		$availabletime = explode(',', $detail[0]['availability']);
	?>
	<label class="control-label">Availability</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Days" name="availability[]" <?php if(in_array('Days', $availabletime)){?> checked="checked" <?php  }?>> Days 
        <input type="checkbox" value="Hours" name="availability[]" <?php if(in_array('Hours', $availabletime)){?> checked="checked" <?php  }?>> Hours
	</div>
</div>

<div class="form-group">
	<label class="control-label">Cost</label>
	<div class="ad-manager-full-input">
		<select name="hourly_rate" class="form-control">
			<option value="">Select cost</option>
            <option value="5-10" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($detail[0]['hourly_rate']) && $detail[0]['hourly_rate'] == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label">Tell us about your organization</label>
	<div class="ad-manager-full-input"><textarea class="form-control"><?php echo $detail[0]['profile_description'];?></textarea></div>
</div>
