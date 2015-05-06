<?php 
	if($detail){
		$looking_to_work = explode(',',$detail[0]['looking_to_work']);
		$exp 			 = $detail[0]['experience'];
		$willing_to_work = explode(',', $detail[0]['willing_to_work']);
		$availability 	 = explode(',',$detail[0]['availability']);
		$lang 			 = explode(',',$detail[0]['language']);
	}
?>
<div class="form-group">
	<label class="control-label">Looking to work for</label>
	<div class="ad-manager-full-input">	
		<input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home', $looking_to_work)){?> checked="checked" <?php }?> > Home
        <input type="checkbox" value="Office" name="looking_to_work[]" <?php if(in_array('Office', $looking_to_work)){?> checked="checked" <?php }?> > Office
    </div>
</div>
<div class="form-group">
	<label class="control-label">Address/ Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Number of rooms</label>
	<div class="ad-manager-full-input"><input type="text" name="number_of_rooms" class="required number" value="<?php echo $detail[0]['number_of_rooms'];?>"/></div>
</div>
<div class="form-group">
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
	<label class="control-label">Must specialize in</label>
	<div class="ad-manager-full-input">	
		<input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors',$willing_to_work)){?> checked="checked" <?php }?> > Floors
	    <input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows',$willing_to_work)){?> checked="checked" <?php }?> > Windows
	    <input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes',$willing_to_work)){?> checked="checked" <?php }?> > Dishes
	    <input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry',$willing_to_work)){?> checked="checked" <?php }?> > Laundry
	    <input type="checkbox" value="Wash" name="willing_to_work[]" <?php if(in_array('Wash',$willing_to_work)){?> checked="checked" <?php }?> > Wash
	    <input type="checkbox" value="Fold" name="willing_to_work[]" <?php if(in_array('Fold',$willing_to_work)){?> checked="checked" <?php }?> > Fold
	    <input type="checkbox" value="Iron" name="willing_to_work[]" <?php if(in_array('Iron',$willing_to_work)){?> checked="checked" <?php }?> > Iron
	    <input type="checkbox" value="Furniture" name="willing_to_work[]" <?php if(in_array('Furniture',$willing_to_work)){?> checked="checked" <?php }?> > Furniture
    </div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Occ./ reg./ one time" name="availability[]" <?php if(in_array('Occ./ reg./ one time', $availability)){?> checked="checked" <?php }?>> Occ./ reg./ one time
        <input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time', $availability)){?> checked="checked" <?php }?>> Part Time
        <input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time', $availability)){?> checked="checked" <?php }?>> Full Time
        <input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array('Days/ hours', $availability)){?> checked="checked" <?php }?>> Days/ hours
        <input type="checkbox" value="Asap/ start date" name="availability[]" <?php if(in_array('Asap/ start date', $availability)){?> checked="checked" <?php }?>> Asap/ start date
	</div>
</div>
<div class="form-group">
	<label class="control-label">Wage</label>
	<div class="ad-manager-full-input">
		<input type="text" value="<?php echo $detail[0]['hourly_rate'];?>" name="hourly_rate" id="wage" class="required">
        <select name="" onchange="change_wage(this.value)">
            <option value="1">per hour</option>
            <option value="2">per month</option>
        </select>
	</div>
</div>
<div class="form-group">
	<div class="ad-manager-full-input">Encouraged but not mandatory fields</label>
</div>
<div class="form-group">
	<label class="control-label">Languages</label>
	<div class="ad-manager-full-input">
		 <select name="language[]" multiple>
                <option value="eng" <?php if(in_array('eng',$lang)){?> selected="selected" <?php } ?>>
                    English
                </option>
                <option value="es" <?php if(in_array('es',$lang)){?> selected="selected" <?php } ?>>
                    Spanish
                </option>
                <option value="sign" <?php if(in_array('sign',$lang)){?> selected="selected" <?php } ?>>
                    Sign Language
                </option>
            </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 2){?> checked="checked" <?php }?> > Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		 <select name="religious_observance" class="required">
                <option value="">Select</option>
                <option value="Orthodox" <?php if($detail[0]['religious_observance'] == 'Orthodox'){?> selected="selected" <?php }?> >Orthodox</option>
                <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> selected="selected" <?php }?> >Modern orthodox</option>
                <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> selected="selected" <?php }?> >Other</option>
                <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> selected="selected" <?php }?> >Not necessary</option>
            </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-full-input">
		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php }?> > Yes
        <input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php }?> > No
	</div>
</div>

<script type="text/javascript">
function change_wage(val){
    if(val==1){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'hourly_rate');
    }
    else if(val=2){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'monthly_rate');    
    }
}
</script>
<style="text/css">
	html{
		height: auto;
	}
</style>
