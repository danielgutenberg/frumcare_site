<?php 
	if($detail){
	    $user_detail          = get_user(check_user());
		$subjects             = explode(',', $detail[0]['subjects']);							        
        $address              = $user_detail['location'];
        $phone                = $user_detail['contact_number'];        
        $langtemp             = explode(',', $detail[0]['language']);
        $gender               = $user_detail['gender'];        
        $age_grp              = $detail[0]['age_group'];
        $smoker               = explode(',', $detail[0]['smoker']);
        $religious_observance = $detail[0]['religious_observance'];
        $exp                  = $detail[0]['experience'];
        $trainingtemp         = explode(',',$detail[0]['training']);
        $gender_of_caregiver  = $detail[0]['gender_of_caregiver'];
        $neighbour            = $user_detail['neighbour'];
        $zip                  = $user_detail['zip'];
        $phone                = $user_detail['contact_number'];
        $caregiverage_from    = $detail[0]['caregiverage_from'];
        $caregiverage_to      = $detail[0]['caregiverage_to'];
        $rate                 = $detail[0]['rate'];
        $rate_type            = $detail[0]['rate_type'];
        $desc 	              = $detail[0]['profile_description'];
        $temp                 = explode(',',$detail[0]['availability']);
        $date                 = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
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
	<label class="control-label">Ages of student</label>
	<div class="ad-manager-full-input"><input type="text" name="age_group[]" class="required number" value="<?php echo isset($detail[0]['age_group']) ? $detail[0]['age_group'] : '' ?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Gender of student</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio" ><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Looking for help in the following subject(s):</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php } ?>> <span>Elementary school</span></div>
            <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php } ?>> <span>High school</span></div>                            
            <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php } ?>> <span>Post high school</span></div>
            <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" <?php if(in_array('limudei kodesh',$subjects)){ ?> checked="checked" <?php }?>/><span>Limudei Kodesh</span></div>
            <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" <?php if(in_array('general studies',$subjects)){ ?> checked="checked" <?php }?>/><span>General Studies</span></div>
            <div class="checkbox"><input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php } ?>> <span>Special ed</span></div>                                
            <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php } ?>> <span>Music</span></div>
            <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php } ?>> <span>Art</span></div>                                
            <div class="checkbox"><input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Ohter',$subjects)){?> checked="checked" <?php } ?>> <span>Other</span></div>                                                                                                                 
        </div>
</div>
<div class="form-group">
    <label class="control-label">When you need lessons (check one or more)</label>
    <div class="ad-manager-checkbox">                
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>>Occassionally</div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>>Regularly</div>
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
        <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>> Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>>Afternoon</div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>                
        <div class="checkbox"><input type="checkbox" value="By appointment" name="availability[]" <?php if(in_array("By appointment",$temp)){?> checked="checked"<?php }?>>By appointment</div> 
    </div>
</div>
<div class="form-group">
	<?php $desc = $detail[0]['profile_description'];?>
	<label class="control-label">Tell us about your needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">Additional Requirements</label>
</div>
<div class="form-group">
	<label class="control-label">Language</label>
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
	<label class="control-label">Gender of tutor</label>
	<div class="ad-manager-checkbox">
		<div class="radio"><input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 1){?> checked="checked" <?php }?> > Male</div>
        <div class="radio"><input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 2){?> checked="checked" <?php }?>> Female</div>
        <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 3){?> checked="checked" <?php }?>> Any</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Tutor age from</label>
	<div class="ad-manager-full-input">
        <input type="text" name="caregiverage_from" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="caregiverage_to" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
	</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<div class="radio"><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] = 1){?> checked="checked" <?php }?> > Yes</div>
        <div class="radio"><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] = 2){?> checked="checked" <?php }?> > No</div>
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
	<label class="control-label">Minimum years experience</label>
	<div class="ad-manager-full-input">
		<select name="experience" class="required">
            <option value="">Select Minimum years experience</option>
            <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
	</div>
</div>
<div class="form-group">
    <label class="control-label">Training necessary</label>
    <div class="ad-manager-full-input">
        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
        <div class="checkbox"><input type="checkbox" value="degree" name="training[]" <?php if(in_array('degree',$trainingtemp)){?> checked="checked"<?php } ?>> Degree</div>
        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
    </div>
</div>
<style type="text/css">
html{
	height: auto;
}
</style>