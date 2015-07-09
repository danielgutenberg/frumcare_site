<?php 
	if($detail){
		$looking_to_work      = explode(',', $detail[0]['looking_to_work']);
		$location 		      = $detail[0]['location'];
		$contact_number       = $detail[0]['contact_number'];
		$age 			      = $detail[0]['age'];
		$willing_to_work      = explode(',',$detail[0]['willing_to_work']);
		$availability 	      = explode(',', $detail[0]['availability']);
		$age_grp 		      = $detail[0]['age_group'];
		$training 		      = explode(',',$detail[0]['training']);
		$exp 			      = $detail[0]['experience'];
		$start_date		      = $detail[0]['start_date'];
        $rate_type            = explode(',',$detail[0]['rate_type']);
        $rate                 = $detail[0]['rate'];
        $langtemp 			  = explode(',',$detail[0]['language']);
        $caregiverage_from    = $detail[0]['caregiverage_from'];
        $caregiverage_to      = $detail[0]['caregiverage_to'];
        $start_date           = $detail[0]['start_date'];
        $desc 				  = $detail[0]['profile_description'];
        $date                 = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $driver_license       = $detail[0]['driver_license'];
        $vehicle              = $detail[0]['vehicle'];
        $cook		          = $detail[0]['cook'];
        $basic_housework      = $detail[0]['basic_housework'];
        $personal_hygiene     = $detail[0]['personal_hygiene'];
	}
?>
<div class="form-group">
	<label class="control-label">Looking for</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in', $looking_to_work)){?> checked=
		"checked" <?php }?> > Live in</div>
        <div class="checkbox" ><input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out', $looking_to_work)){?> checked=
		"checked" <?php }?>> Live out</div>
	</div>
</div>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group">
	<label class="control-label">Location</label>
	<div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $location;?>"/></div>
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
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $contact_number;?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Age of person requiring care</label>
	<div class="ad-manager-full-input">
		<input type="text" name="age_group[]" class="required number" value="<?php echo isset($age_grp) ? $age_grp : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender of person requiring care</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] = 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio" ><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] = 2){?> checked="checked" <?php }?> > Female</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Conditions senior suffers from</label>
	<div class="ad-manager-checkbox">
        <div class="checkbox"><input type="checkbox" value="Austim" name="willing_to_work[]" <?php if(in_array('Austim',$willing_to_work)){?> checked="checked" <?php }?>> Austim</div>
        <div class="checkbox" ><input type="checkbox" value="Down syndrome" name="willing_to_work[]" <?php if(in_array('Down syndrome',$willing_to_work)){?> checked="checked" <?php }?>> Down syndrome</div>
        <div class="checkbox" ><input type="checkbox" value="Handicapped" name="willing_to_work[]" <?php if(in_array('Handicapped',$willing_to_work)){?> checked="checked" <?php }?>> Handicapped</div>
        <div class="checkbox" ><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked" <?php }?>> Wheelchair bound</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">When you need care(check one or more)</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array('Occassionally',$availability)){?> checked="checked" <?php } ?>> Occassionally</div>
        <div class="checkbox" ><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array('Regularly',$availability)){?> checked="checked" <?php } ?>> Regularly</div>  
        <div class="checkbox" ><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array('Asap',$availability)){?> checked="checked" <?php }?> > Asap </div>
        <div class="checkbox"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$availability)){?> checked="checked"<?php }?>>Start Date
        <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
        <div class="checkbox" ><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning',$availability)){?> checked="checked" <?php } ?>> Morning</div>
        <div class="checkbox" ><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon',$availability)){?> checked="checked" <?php } ?>> Afternoon</div>
        <div class="checkbox" ><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening',$availability)){?> checked="checked" <?php } ?>> Evening</div>
        <div class="checkbox" ><input type="checkbox" value="Overnight" name="availability[]" <?php if(in_array('Overnight',$availability)){?> checked="checked" <?php } ?>> Overnight</div>
        <div class="checkbox" ><input type="checkbox" value="Weekends fri./sun." name="availability[]" <?php if(in_array('Weekends fri./sun.',$availability)){?> checked="checked" <?php } ?>> Weekends fri./sun.</div>
        <div class="checkbox" ><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array('Shabbos',$availability)){?> checked="checked" <?php } ?>> Shabbos</div>
        <div class="checkbox" ><input type="checkbox" value="24 hr care" name="availability[]" <?php if(in_array('24 hr care',$availability)){?> checked="checked" <?php } ?>> 24 hr care</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about your needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<div class="ad-manager-full-input">Additional requirements </label>
</div>
<div class="form-group">
	<label class="control-label">Gender of caregiver</label>
<div class="ad-manager-checkbox">
		<div class="radio"><input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio"><input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 2){?> checked="checked" <?php }?> > Female</div>
        <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 3){?> checked="checked" <?php }?> > Any</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Languages necessary</label>
<div class="ad-manager-full-input">
		<div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$langtemp)){?> checked="checked"<?php } ?>> Hebrew</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance" class="required">
            <option value="">Select</option>
            <option value="Yeshivish/ Chasidish" <?php if($detail[0]['religious_observance']= 'Yeshivish/ Chasidish'){?> selected="selected" <?php }?> >Yeshivish/ Chasidish</option>
            <option value="Orthodox/ Modern Orthodox" <?php if($detail[0]['religious_observance']= 'Orthodox/ Modern Orthodox'){?> selected="selected" <?php }?> >Orthodox/ Modern Orthodox</option>
            <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
            <option value="Not necessary" <?php if($detail[0]['religious_observance']= 'Not necessary'){?> selected="selected" <?php }?> >Not necessary</option>
        </select>
	</div>
</div>
<div class="form-group">
    <label class="control-label">Caregiver age from</label>
    <div class="ad-manager-full-input">
        <input type="text" name="agefrom" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="ageto" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
    </div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] = 1){?> checked="checked" <?php }?>> Yes</div>
        <div class="radio" ><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] = 2){?> checked="checked" <?php }?>> No</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Training/ certification required</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> CPR</div>
        <div class="checkbox" ><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> First Aid</div>
        <div class="checkbox" ><input type="checkbox" value="Special needs training" name="training[]" <?php if(in_array('Special needs training', $training)){?> checked="checked" <?php } ?>> Special needs training</div>
        <div class="checkbox" ><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse', $training)){?> checked="checked" <?php } ?>> Nurse</div>
        <div class="checkbox" ><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary', $training)){?> checked="checked" <?php } ?>> Not necessary</div>
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
	<div class="ad-manager-checkbox">
		<div class="checkbox">
            <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>>Drivers license
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>>Vehicle
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>>Must be able to cook and prepare food
             /serve meals
        </div>
        
        <div class="checkbox">
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>>Must be able to do light housework/ cleaning
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="personal_hygiene" <?php echo isset($personal_hygiene) && $personal_hygiene == 1 ? 'checked' : ''?>>Must be able to deal with personal hygiene of patient
        </div>
	</div>
</div>
<style>
	html{
		height: auto;
	}
</style>
<script>
$(document).ready(function(){
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

       if($('#ckbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            //$("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                //$("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });
    });
</script>
