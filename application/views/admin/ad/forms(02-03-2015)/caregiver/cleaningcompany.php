<?php
    $established = $detail[0]['established'];
    $temp = explode(',' ,$detail[0]['willing_to_work']);
    $availabletime = explode(',', $detail[0]['availability']);
    $desc = $detail[0]['profile_description'];
    $hr_rate = $detail[0]['hourly_rate'];
    $looking_to_work = explode(',',$detail[0]['looking_to_work']);
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);

?>
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
        <label class="control-label">We clean</label>
        <div class="ad-manager-full-input">
            <div><input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home',$looking_to_work)){?> checked="checked" <?php }?> > <span>Home</span></div>
            <div><input type="checkbox" value="Business" name="looking_to_work[]" <?php if(in_array('Business',$looking_to_work)){?> checked="checked" <?php }?>> <span>Business</span></div>
        </div>
        </div>
<div class="form-group">
<?php 
		$temp = explode(',' ,$detail[0]['willing_to_work']);
	?>
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $temp)){?> checked="checked" <?php }?>> <span>Floors</span></div>
        <div><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $temp)){?> checked="checked" <?php }?>> <span>Windows</span></div>    
        <div><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $temp)){?> checked="checked" <?php }?>> <span>Dishes</span></div>
        <div><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $temp)){?> checked="checked" <?php }?>> <span>Laundry</span></div>
        <div><input type="checkbox" value="Wash" name="willing_to_work[]" <?php if(in_array('Wash', $temp)){?> checked="checked" <?php }?>> <span>Wash</span></div>
        <div><input type="checkbox" value="Fold" name="willing_to_work[]" <?php if(in_array('Fold', $temp)){?> checked="checked" <?php }?>> <span>Fold</span></div>
        <div><input type="checkbox" value="Iron" name="willing_to_work[]" <?php if(in_array('Iron', $temp)){?> checked="checked" <?php }?>> <span>Iron</span></div>
        <div><input type="checkbox" value="Furniture" name="willing_to_work[]" <?php if(in_array('Furniture', $temp)){?> checked="checked" <?php }?>> <span>Furniture</span></div>
	</div>
</div>
<div class="form-group">
	<?php 
		$availabletime = explode(',', $detail[0]['availability']);
	?>
	<label class="control-label">Availability</label>
	<div class="ad-manager-full-input">
		<!--<input type="checkbox" value="Days" name="availability[]" <?php if(in_array('Days', $availabletime)){?> checked="checked" <?php  }?>> Days 
        <input type="checkbox" value="Hours" name="availability[]" <?php if(in_array('Hours', $availabletime)){?> checked="checked" <?php  }?>> Hours
        -->
        <div class="form-field">
            Days
            <br>
            <input type="text" name="days_from" style="width:25%" value="<?php echo $detail[0]['days_from'];?>"> - <input type="text" name="days_to" style="width:25%" value="<?php echo $detail[0]['days_to'];?>">
            <br>
            Hours
            <br>
            <input type="text" name="hours_from" style="width:25%" value="<?php echo $detail[0]['hours_from'];?>"> - <input type="text" name="hours_to" style="width:25%" value="<?php echo $detail[0]['hours_to'];?>">
            <br>
            <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?> > Flexible Hours</div>
        </div>
    </div>
</div>

<div class="form-group">
	<label class="control-label">Cost</label>
	<div class="ad-manager-full-input">
	<div>
            <label>Rate</label>
            <div class="form-field">
            <select name="rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
            </div>
        </div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
        <!--
        <select name="rate_type">
            <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Hourly Rate</option>
            <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Monthly Rate</option>
        </select>
        -->
	</div>
</div>

<div class="form-group">
	<label class="control-label">Tell us about your organization</label>
	<div class="ad-manager-full-input">
        <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
    </textarea></div>
</div>