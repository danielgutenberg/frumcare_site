<?php
	if($detail){
		$looking_to_work 	    = explode(',',$detail[0]['looking_to_work']);
		$age 				    = $detail[0]['age'];
		$willing_to_work	    = explode(',', $detail[0]['willing_to_work']);
		$availability 		    = explode(',',$detail[0]['availability']);
		$desc 				    = $detail[0]['profile_description'];
		$language 			    = explode(',',$detail[0]['language']);
		$age_grp 			    = $detail[0]['age_group'];
		$training 			    = $detail[0]['training'];
		$exp 				    = $detail[0]['experience'];
		$start_date			    = $detail[0]['start_date'];
        $tempwillingtowork      = explode(',',$detail[0]['willing_to_work']);
         $temp                  = explode(',',$detail[0]['availability']);
        $date                   = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $rate                   = $detail[0]['rate'];
        $rate_type              = $detail[0]['rate_type'];
        $childcare              = $detail[0]['pick_up_child'];
        $gender_of_caregiver    = $detail[0]['gender_of_caregiver'];
        $time                   = explode(',',$detail[0]['availability']);
        $start_date             = $detail[0]['start_date'];
        $langtemp               = explode(',', $detail[0]['language']);
        $religious_observance   = $detail[0]['religious_observance'];
        $caregiverage_from      = $detail[0]['caregiverage_from'];
        $caregiverage_to        = $detail[0]['caregiverage_to'];
        $religious_observance   = $detail[0]['religious_observance'];
	}
?>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group"><div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php }?> > Live in</div>
        <div class="checkbox"><input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php }?> > Live out</div>
	</div>
</div>
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
	<label class="control-label">Zip</label>
	<div class="ad-manager-full-input">
		<input type="text" name="zip" class="required" value="<?php echo isset($detail[0]['zip']) ? $detail[0]['zip'] : '' ?>"/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	<div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Age of senior</label>
	<div class="ad-manager-full-input"><input type="text" name="age_group[]" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Gender</label>
	<div class="ad-manager-checkbox">
		<div class="radio"><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] = 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio"><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] = 2){?> checked="checked" <?php }?> > Female</div>
        <div class="radio"><input type="radio" value="3" name="gender" <?php if($detail[0]['gender'] = 3){?> checked="checked" <?php }?> > Any</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Conditions senior suffers from</label>
	<div class="ad-manager-checkbox">		
        <div class="checkbox"><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]" <?php if(in_array('Alz./ Dementia', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Alz./ Dementia</span></div>
        <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>                                       
        <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
        <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>                                        	
        <div class="checkbox"><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]" <?php if(in_array('Able To Tend To Personal Hygiene of Senior', $tempwillingtowork)){?> checked="checked"<?php }?>><span>Able To Tend To Personal Hygiene of Senior</span></div>					
	</div>
</div>
<div class="form-group">
	<label class="control-label">When you need care</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$time)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$time)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
        <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$time)){?> checked="checked"<?php }?>> Immediate</div>
        <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?>/>Start Date
        <input  type="text" name="start_date" id="textbox1" style="display: none;" value="<?php echo isset($date)?$date:''?>"/></div>        		
		<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$time)){?> checked="checked"<?php }?>> <span>Morning</span></div>
		<div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$time)){?> checked="checked"<?php }?>> <span>Afternoon</span></div>
		<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$time)){?> checked="checked"<?php }?>> <span>Evening</span></div>
		<div class="checkbox"><input type="checkbox" value="Overnight" name="availability[]" <?php if(in_array("Overnight",$time)){?> checked="checked"<?php }?>><span>Overnight</span></div>
		<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]" <?php if(in_array("Weekends Fri./Sun.",$time)){?> checked="checked"<?php }?>> <span>Weekends Fri./Sun.</span></div>
		<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$time)){?> checked="checked"<?php }?>><span>Shabbos</span></div>
		<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]" <?php if(in_array("24 hr care",$time)){?> checked="checked"<?php }?>> <span>24 hr care</span></div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>

<div class="form-group"><div class="ad-manager-full-input">Encouraged but not mandatory fields</div></div> 
<div class="form-group">
	<label class="control-label">Gender of caregiver</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 1){?> checked="checkde" <?php }?>> Male</div>
        <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 2){?> checked="checkde" <?php }?>> Female</div>
        <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] = 2){?> checked="checkde" <?php }?>> Any</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Languages</label>
	<div class="ad-manager-full-input">
		<div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
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
	<label class="control-label">Caregiver age from</label>
	<div class="ad-manager-full-input">
		<input type="text" name="agefrom" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="ageto" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
	</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] = 1){?> checked="checked" <?php }?> > Yes</div>
        <div class="radio" ><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] = 2){?> checked="checked" <?php }?> > No</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Training/ certification required</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="CPR" name="training[]" <?php if($detail[0]['training']){?> checked="checked" <?php }?> > CPR</div>
        <div class="checkbox" ><input type="checkbox" value="First Aid" name="training[]" <?php if($detail[0]['training']){?> checked="checked" <?php }?> > First Aid</div>
        <div class="checkbox" ><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if($detail[0]['training']){?> checked="checked" <?php }?> > Nanny/ Babysitter course</div>
        <div class="checkbox" ><input type="checkbox" value="Not necessary" name="training[]" <?php if($detail[0]['training']){?> checked="checked" <?php }?> > Not necessary</div>
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
		<div class="checkbox" ><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] = 1){?>checked<?php }?> >Drivers license</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] = 1){?> checked <?php }?> >Vehicle</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] = 1){?> checked="checked" <?php }?> >Must be willing to cook/ serve meals</div>
		<div class="checkbox" ><input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] = 1){?> checked="checked" <?php }?>>Must be willing to do light housework/ cleaning</div>
		<div class="checkbox" ><input type="checkbox" value="1" name="personal_hygiene" <?php if($detail[0]['personal_hygiene'] = 1){?> checked="checked" <?php }?>>Must be willing to deal with personal hygiene of senior</div>
	</div>
</div>
<style type="text/css">
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