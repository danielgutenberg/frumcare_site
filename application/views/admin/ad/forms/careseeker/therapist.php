<?php 
	if($detail){
		$lang                  = explode(',',$detail[0]['language']);
		$conditions_of_patient = explode(',', $detail[0]['conditions_of_patient']);
        $religious_observance  = $detail[0]['religious_observance'];
	}
?>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group">
	<label class="control-label">Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Neighborhood</label>
	<div class="ad-manager-full-input">
		<input type="text" name="neighbour" class="required" value="<?php echo isset($detail[0]['neighbour']) ? $detail[0]['neighbour'] : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">zip</label>
	<div class="ad-manager-full-input">
		<input type="text" name="zip" class="required" value="<?php echo isset($detail[0]['zip']) ? $detail[0]['zip'] : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Age of patient</label>
	<div class="ad-manager-full-input">
        <input type="text" name="age_group[]" class="required number" value="<?php echo $detail[0]['age_group'];?>"/>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Gender of patient</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male</div>
	    <div class="radio" ><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female</div>
        <div class="radio" ><input type="radio" value="3" name="gender" <?php if($detail[0]['gender'] == 3){?> checked="checked" <?php }?>> Any</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Condition(s) of patient</label>
	<div class="ad-manager-checkbox">
		<input type="text" name="conditions_of_patient" class="required" value="<?php echo $detail[0]['conditions_of_patient'];?>">
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
	<div class="ad-manager-full-input">Additional Requirements</label>
</div>
<div class="form-group">
 	<label class="control-label">Languages necessary</label>
 	<?php $langtemp = explode(',', $detail[0]['language']);?>
 	<div class="ad-manager-checkbox">
        <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$langtemp)){?> checked="checked"<?php } ?>> Hebrew</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
 	</div>
 </div>
<div class="form-group">
	<label class="control-label">Gender of therapist</label>
	<div class="ad-manager-checkbox"> 
        <div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 2){?> checked="checked" <?php }?> > Female</div>
        <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 3){?> checked="checked" <?php }?> > Any</div>
	</div>
</div>
<div class="form-group">
    <label class="control-label">Level of observance necessary</label>
    <div class="ad-manager-full-input">
    <select name="religious_observance">
        <option value="">Select</option>
        <option value="Yeshivish/ Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/ Chasidish' ? 'selected' : '' ?>>Yeshivish/ Chasidish</option>
        <option value="Orthodox/ Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/ Modern Orthodox' ? 'selected' : '' ?>>Orthodox/ Modern Orthodox</option>
        <!--<option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>-->
        <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
        <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
    </select>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Must accept insurance</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="radio" value="1" name="accept_insurance" <?php if($detail[0]['accept_insurance']){?> checked="checked" <?php }?>/> Yes</div>
	    <div class="checkbox" ><input type="radio" value="2" name="accept_insurance" <?php if($detail[0]['accept_insurance']){?> checked="checked" <?php }?>/> No</div>
    </div>
</div>
<style>
	html{
		height:  auto;
	}
</style>
