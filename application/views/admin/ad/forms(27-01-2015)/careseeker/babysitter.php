<div class="form-group">
	<label class="control-label">Looking to work in</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="My home" name="looking_to_work[]"> My home
       <input type="checkbox" value="Caregivers home" name="looking_to_work[]"> Caregivers home
	</div>
</div>
<div class="form-group">
	<label class="control-label">Address/Location</label>
	<div class="ad-manager-full-input">
		<input type="text" name="location" value="<?php echo $detail[0]['location'];?>"/>
	</div>
</div><div class="form-group">
	<label class="control-label">City</label>
	<div class="ad-manager-full-input">
		<input type="text" name="city" value="<?php echo $detail[0]['city'];?>" />
	</div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
    <div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="" id="contact_number" value="<?php echo $detail[0]['contact_number'];?>" /></div>
	
</div>
<div class="form-group"><label class="control-label">Number of Children</label>
	<div class="ad-manager-full-input"><input type="text" name="number_of_children" value="<?php echo $detail[0]['number_of_children'];?>"></div>
</div>
<div class="form-group">
	<label class="control-label">Gender of children</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male
        <input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female
        <input type="radio" value="3" name="gender" <?php if($detail[0]['gender'] == 3){?> checked="checked" <?php }?>> Both
	</div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children</label>
	<div class="ad-manager-full-input">
		<input type="text" name="age" class="required number" value="<?php echo $detail[0]['age'];?>"/>
	</div>
</div>
<div class="form-group">
	<?php $exp = $detail[0]['experience'];?>
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
	<?php 
		$temp = explode(',',$detail[0]['availability']);
	?>
	<label class="control-label">When do you need care</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="Occ./ reg./ one time" name="availability[]" <?php if(in_array("Occ./ reg./ one time",$temp)){?> checked="checked"<?php }?> > Occ./ reg./ one time</div>
        <div><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$temp)){?> checked="checked"<?php }?>> Part Time</div>
        <div><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$temp)){?> checked="checked"<?php }?>> Full Time</div>
        <div><input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$temp)){?> checked="checked"<?php }?>> Days/ hours</div>
        <div><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap </div>
        <div><input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$temp)){?> checked="checked"<?php }?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo $detail[0]['start_date'];?>" id="textbox1"></div>
        <div><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
        <div><input type="checkbox" value="Weekends/ Shabbos" name="availability[]" <?php if(in_array("Weekends/ Shabbos",$temp)){?> checked="checked"<?php }?>> Weekends/ Shabbos</div>
        <div><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array("Night Nurse",$temp)){?> checked="checked"<?php }?>> Night Hours</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance">
	        <option value="">Select</option>
	        <option value="Orthodox" <?php if($detail[0]['religious_observance'] == "Orthodox"){?> selected="selected"<?php } ?>>Orthodox</option>
	        <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> selected="selected"<?php } ?>>Modern orthodox</option>
	        <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> selected="selected"<?php } ?>>Other</option>
	        <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> selected="selected"<?php } ?>>Not necessary</option>
	    </select>
	</div>	
</div>
<div class="form-group">
	<label class="control-label">Caregiver age from</label>
	<?php $age_grp = $detail[0]['age_group'];?>
	<div class="ad-manager-full-input">
		<select name="age_group" class="required">
            <option value="">Select caregiver age from</option>
            <option value="18-20" <?php echo isset($age_grp) && $age_grp == '18-20' ? 'selected' : '' ?>>18 to 20</option>
            <option value="20-25" <?php echo isset($age_grp) && $age_grp == '20-25' ? 'selected' : '' ?>>20 to 25</option>
            <option value="25-30" <?php echo isset($age_grp) && $age_grp == '25-30' ? 'selected' : '' ?>>25 to 30</option>
            <option value="30+" <?php echo isset($age_grp) && $age_grp == '30+' ? 'selected' : '' ?>>30+</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Wage</label>
	<div class="ad-manager-full-input"><input type="text" value="" name="hourly_rate" id="wage" class="required" value="<?php echo $detail[0]['hourly_rate'];?>"></div>
</div>
<div class="form-group">
	<?php $desc = $detail[0]['profile_description'];?>
	<label class="control-label">Tell us about needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
 <h2>Encouraged but not mandatory fields</h2>
 <div class="form-group">
 	<label class="control-label">Smoker</label>
 	<div class="ad-manager-checkbox">
 		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php }?> > Yes
        <input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php }?>> No
 	</div>
 </div>
<div class="form-group">
 	<label class="control-label">Languages necessary</label>
 	<?php $langtemp = explode(',', $detail[0]['language']);?>
 	<div class="ad-manager-full-input">
 		<select name="language[]" multiple>
            <option value="eng" <?php if(in_array('eng',$langtemp)){?> selected="selected"<?php } ?>>
                English
            </option>
            <option value="es" <?php if(in_array('es',$langtemp)){?> selected="selected"<?php } ?>>
                Spanish
            </option>
            <option value="sign" <?php if(in_array('sign',$langtemp)){?> selected="selected"<?php } ?>>
                Sign Language
            </option>
        </select>
 	</div>
 </div>
<div class="form-group">
	 <label class="control-label">Training necessary</label>
	 <?php $trainingtemp = explode(',',$detail[0]['training']);?> 
	 <div class="ad-manager-checkbox">
	 	<div><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> selected="selected"<?php } ?>> CPR</div>
	    <div><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> selected="selected"<?php } ?>> First Aid</div>
	    <div><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> selected="selected"<?php } ?>> Nanny/ Babysitter course</div>
	    <div><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> selected="selected"<?php } ?>> Not necessary</div>
	 </div>
</div>
<div class="form-group">
 	<label class="control-label">Minimum experience</label>
 	<div class="ad-manager-full-input">
 		<select name="experience">
            <option value="">Select minimum experience</option>
            <option value="1" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
 	</div>
</div>
<div class="form-group">
 	<label class="control-label">Drivers license</label>
 	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php }?> ></div>
</div> 
<div class="form-group">
 	<label class="control-label">Vehicle</label>
 	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must be willing to pick up kids from school</label>
	<div class="ad-manager-checkbox"> <input type="checkbox" value="1" name="pick_up_child" <?php if($detail[0]['pick_up_child'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must be willing to cook/ serve meals</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must be willing to do light housework/ cleaning</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must be willing to help with homework</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="homework_help" <?php if($detail[0]['homework_help'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must be willing to care for sick child</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="sick_child_care" <?php if($detail[0]['sick_child_care'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Must have references</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="references" <?php if($detail[0]['references'] == 1){?> checked="checked" <?php }?>></div>
</div>
<div class="form-group">
	<label class="control-label">Photo of child/ children</label>
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="photo_of_child" <?php if($detail[0]['photo_of_child'] == 1){?> checked="checked" <?php }?>></div>
</div>

<script>
$(document).ready(function(){
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

       if($('#ckbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            $("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                $("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });
    });
</script>
