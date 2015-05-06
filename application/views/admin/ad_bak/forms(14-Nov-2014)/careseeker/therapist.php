<?php 
	if($detail){
		$lang = explode(',',$detail[0]['language']);
		$conditions_of_patient = explode(',', $detail[0]['conditions_of_patient']);
	}
?>
<div class="form-group">
	<label class="control-label">Address/ Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Age of patient</label>
	<div class="ad-manager-full-input"><input type="text" name="age" class="required number" value="<?php echo $detail[0]['age'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Gender of patient</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male
	    <input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female
    </div>
</div>
<div class="form-group">
	<label class="control-label">Condition(s) of patient</label>
	<div class="ad-manager-full-input">
		<input type="checkbox" value="Condition1" name="conditions_of_paitent[]" <?php if(in_array('Condition1',$conditions_of_patient)){?> checked="checked" <?php }?> > Condition1
	    <input type="checkbox" value="Condition2" name="conditions_of_paitent[]" <?php if(in_array('Condition2',$conditions_of_patient)){?> checked="checked" <?php }?> > Condition2
	</div>
</div>
<div class="form-group">
	<label class="control-label">Type of therapist wanted</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['type_of_therapy'];?>" name="type_of_therapy" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo $detail[0]['profile_description'];?></textarea></div>
</div>
<div class="form-group">
	<div class="ad-manager-full-input">ncouraged but not mandatory fields</label>
</div>
<div class="form-group">
	<label class="control-label">Languages</label>
	<div class="ad-manager-full-input">
		<select name="language[]" multiple>
        <option value="eng" <?php if(in_array('eng',$lang)){?> selected="selected" <?php }?>>
            English
        </option>
        <option value="es" <?php if(in_array('es',$lang)){?> selected="selected" <?php }?>>
            Spanish
        </option>
        <option value="sign" <?php if(in_array('sign',$lang)){?> selected="selected" <?php }?>>
            Sign Language
        </option>
    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender of therapist</label>
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
        <option value="Orthodox" <?php if($detail[0]['religious_observance'] == 'Orthodox'){?> checked="checked" <?php }?>>Orthodox</option>
        <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> checked="checked" <?php }?>>Modern orthodox</option>
        <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> checked="checked" <?php }?>>Other</option>
        <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> checked="checked" <?php }?>>Not necessary</option>
    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Must accept insurance</label>
	<div class="ad-manager-full-input">
		<input type="radio" value="1" name="accept_insurance" <?php if($detail[0]['accept_insurance']){?> checked="checked" <?php }?>/> Yes
	    <input type="radio" value="2" name="accept_insurance" <?php if($detail[0]['accept_insurance']){?> checked="checked" <?php }?>/> No
    </div>
</div>
<style>
	html{
		height:  auto;
	}
</style>