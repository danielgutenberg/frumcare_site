<?php 
	if($detail){
		$availability = explode(',', $detail[0]['availability']);
		$lang 		  = explode(',', $detail[0]['language']);
		$exp 		  = $detail[0]['experience'];
        $start_date   = $detail[0]['start_date'];
        
        $date            = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $rate            = $detail[0]['rate'];
        $rate_type       = explode(',',$detail[0]['rate_type']);
        $childcare       = $detail[0]['pick_up_child'];
        $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
        $temp            = explode(',',$detail[0]['availability']);
        $start_date      = $detail[0]['start_date'];
        $langtemp = explode(',', $detail[0]['language']);
        $religious_observance = $detail[0]['religious_observance'];
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
	<label class="control-label">Description of job</label>
	<div class="ad-manager-full-input"><textarea name="job_description" class="required"><?php echo $detail[0]['job_description'];?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">Wage</label>
	<div class="ad-manager-full-input">
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
    <div class="checkbox" ><input type="checkbox" value="1" name="rate_type[]" <?php echo in_array(1,$rate_type)?'checked':'' ?>/>Per Hour</div>
    <div class="checkbox" ><input type="checkbox" value="2" name="rate_type[]" <?php echo in_array(2,$rate_type)?'checked':'' ?>/>Per Month</div>            
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
        <div class="checkbox"><input type="checkbox" value="One time" name="availability[]" <?php if(in_array("One time",$temp)){?> checked="checked"<?php }?>>One time</div>     		
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>>Occassionally</div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>>Regularly</div>
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
        <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>/>Start Date
	    <input  type="text" name="start_date" id="textbox1" value="<?php echo isset($date)?$date:''?>"/></div>      
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>>Afternoon</div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
        <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$temp)){?> checked="checked"<?php }?>> Weekends Fri./ Sun.</div> 
     </div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo $detail[0]['profile_description'];?></textarea></div>
</div>
<div class="form-group">
	<div class="ad-manager-full-input">Encouraged but not mandatory fields</div>
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
	<label class="control-label">Gender of Caregiver</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 1){?> checked="checked" <?php } ?>> Male</div>
	    <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 2){?> checked="checked" <?php } ?>> Female</div>
        <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php if($detail[0]['gender_of_caregiver'] == 3){?> checked="checked" <?php } ?>> Any</div>
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
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker']==1){?> checked="checked" <?php }?> > Yes</div>
	    <div class="radio" ><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker']==2){?> checked="checked" <?php }?> > No</div>
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
		<div class="checkbox" ><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license']){?> checked="checked" <?php }?> >Drivers license</div>
		<div class="checkbox" ><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle']){?> checked="checked" <?php }?>>Vehicle</div>
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