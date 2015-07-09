<?php 
	if($detail){
		$looking_to_work 	= explode(',', $detail[0]['looking_to_work']);
		$age 				= $detail[0]['age'];
		$availability 		= explode(',',$detail[0]['availability']);
		$age_grp 			= $detail[0]['age_group'];
		$desc 				= $detail[0]['profile_description'];
		$lang 				= explode(',',$detail[0]['language']);
		$training 			= explode(',',$detail[0]['training']);
		$exp 				= $detail[0]['experience'];
	}
?>
<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php }?> > Live in
        <input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php }?>> Live out
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
	<label class="control-label">Number of children</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['number_of_children'];?>" name="number_of_children" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Gender of children</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?>>Male
        <input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>>Female
	</div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children</label>
	<div class="ad-manager-full-input">
		<input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">When you need care</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Occ./ reg./ one time" name="availability[]" <?php if(in_array('Occ./ reg./ one time',$availability)){?> checked="checked"<?php }?> > Occ./ reg./ one time
        <input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time',$availability)){?> checked="checked"<?php }?>> Part Time
        <input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time',$availability)){?> checked="checked"<?php }?>> Full Time
        <input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array('Days/ hours',$availability)){?> checked="checked"<?php }?>> Days/ hours
        <input type="checkbox" value="Asap/ start date" name="availability[]" <?php if(in_array('Asap/ start date',$availability)){?> checked="checked"<?php }?>> Asap/ start date
        <input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening',$availability)){?> checked="checked"<?php }?>> Evening
        <input type="checkbox" value="Weekends/ Shabbos" name="availability[]" <?php if(in_array('Weekends/ Shabbos',$availability)){?> checked="checked"<?php }?>> Weekends/ Shabbos
       	<input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse',$availability)){?> checked="checked"<?php }?>> Night Nurse
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance" class="required">
            <option value="">Select</option>
            <option value="Orthodox" <?php if($detail[0]['religious_observance'] == 'Orthodox'){?> selected="selected" <?php } ?> >Orthodox</option>
            <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> selected="selected" <?php } ?>>Modern orthodox</option>
            <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> selected="selected" <?php } ?>>Other</option>
            <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> selected="selected" <?php } ?>>Not necessary</option>
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
	<label class="control-label">Tell us about needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</tr>
<div class="form-group">
	<div class="ad-manager-full-input">Encouraged but not mandatory fields</label>
</tr>
<div class="form-group">
	<label class="control-label">Smoker</label>
	<div class="ad-manager-full-input">
		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php } ?>  > Yes
        <input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php } ?>> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Languages necessary</label>
<div class="ad-manager-full-input">
		<select name="language[]" multiple>
                <option value="eng" <?php if(in_array('eng', $lang)){?> selected="selected" <?php } ?> >
                    English
                </option>
                <option value="es" <?php if(in_array('es', $lang)){?> selected="selected" <?php } ?>>
                    Spanish
                </option>
                <option value="sign" <?php if(in_array('sign', $lang)){?> selected="selected" <?php } ?>>
                    Sign Language
                </option>
            </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Training necessary</label>
	<div class="ad-manager-full-input">   
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked" <?php }?> > CPR
        <input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked" <?php }?>> First Aid
        <input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$training)){?> checked="checked" <?php }?>> Nanny/ Babysitter course
        <input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$training)){?> checked="checked" <?php }?>> Not necessary
    </div>
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
	<label class="control-label"></label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php }?> >Drivers license
		<input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php }?>>Vehicle
		<input type="checkbox" value="1" name="pick_up_child" <?php if($detail[0]['pick_up_child'] == 1){?> checked="checked" <?php }?> >Must be willing to pick up kids from school
		<input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked="checked" <?php }?> >Must be willing to cook/ serve meals
		<input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked="checked" <?php }?> >Must be willing to do light housework/ cleaning
		<input type="checkbox" value="1" name="homework_help" <?php if($detail[0]['homework_help'] == 1){?> checked="checked" <?php }?>>Must be willing to help with homework
		<input type="checkbox" value="1" name="sick_child_care" <?php if($detail[0]['sick_child_care'] == 1){?> checked="checked" <?php }?>>Must be willing to care for sick child
		<input type="checkbox" value="1" name="references" <?php if($detail[0]['references'] == 1){?> checked="checked" <?php }?>>Must have references
		<input type="checkbox" value="1" name="photo_of_child" <?php if($detail[0]['photo_of_child'] == 1){?> checked="checked" <?php }?> >Photo of child/ children
		<input type="checkbox" value="1" name="clean" <?php if($detail[0]['clean'] == 1){?> checked="checked" <?php }?>>Must be willing to clean
		<input type="checkbox" value="1" name="wash" <?php if($detail[0]['wash'] == 1){?> checked="checked" <?php }?>>Must be willing to wash
		<input type="checkbox" value="1" name="iron" <?php if($detail[0]['iron'] == 1){?> checked="checked" <?php }?> >Must be willing to iron
		<input type="checkbox" value="1" name="fold" <?php if($detail[0]['fold'] == 1){?> checked="checked" <?php }?> >Must be willing to fold
		<input type="checkbox" value="1" name="bath" <?php if($detail[0]['bath_children'] == 1){?> checked="checked" <?php }?> >Must be willing to bath
		<input type="checkbox" value="1" name="bed_children" <?php if($detail[0]['bed_children'] == 1){?> checked="checked" <?php }?>>Must be willing to put to bed
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
