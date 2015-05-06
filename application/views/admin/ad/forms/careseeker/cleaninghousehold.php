<?php 
	if($detail){        
		$looking_to_work      = explode(',',$detail[0]['looking_to_work']);
		$exp 			      = $detail[0]['experience'];
		$willing_to_work      = explode(',', $detail[0]['willing_to_work']);
		$availability 	      = explode(',',$detail[0]['availability']);
		$langtemp 		      = explode(',',$detail[0]['language']);
        $start_date           = $detail[0]['start_date'];
        $temp                 = explode(',',$detail[0]['availability']);
        $date                 = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $rate                 = $detail[0]['rate'];
        $rate_type            = explode(',',$detail[0]['rate_type']);
        $childcare            = $detail[0]['pick_up_child'];
        $gender_of_caregiver  = $detail[0]['gender_of_caregiver'];
        $religious_observance = $detail[0]['religious_observance'];
	}
?>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group">
	<label class="control-label">Looking to work for</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home',$looking_to_work)){?> checked="checked" <?php } ?>> My home</div>
        <div class="checkbox"><input type="checkbox" value="Office/business" name="looking_to_work[]" <?php if(in_array('Office/business',$looking_to_work)){?> checked="checked" <?php } ?>> Office/business</div>
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
	<label class="control-label">Number of rooms</label>
	<div class="ad-manager-full-input">
        <input type="text" name="number_of_rooms" class="required number" value="<?php echo $detail[0]['number_of_rooms'];?>"/>
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
	<label class="control-label">Must specialize in</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes',$willing_to_work)){?> checked="checked" <?php } ?>> Dishes</div>
                <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors',$willing_to_work)){?> checked="checked" <?php } ?>> Floors</div>
                <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows',$willing_to_work)){?> checked="checked" <?php } ?>> Windows</div>                
                <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry',$willing_to_work)){?> checked="checked" <?php } ?>> Laundry</div>                
                <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding',$willing_to_work)){?> checked="checked" <?php } ?>> Folding</div>
                <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing',$willing_to_work)){?> checked="checked" <?php } ?>> Ironing</div>                
                <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning and Dusting Furniture</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Refrigerator/Freezer</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stovetop" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stovetop',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Oven/Stovetop</div>
                <div class="checkbox" ><input type="checkbox" name="pick_up_child" value="1" <?php echo isset($childcare) && $childcare == '1' ? 'checked':'' ?>/>Must be able to watch children as well</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="One time" name="availability[]" <?php if(in_array("One time",$temp)){?> checked="checked"<?php }?>> One time</div>
        <div class="checkbox"><input type="checkbox" value="Occasionally" name="availability[]" <?php if(in_array("Occasionally",$temp)){?> checked="checked"<?php }?>> Occasionally</div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>> Regularly</div>
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
        <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>/>Start Date
        <input  type="text" name="start_date" id="textbox1"  value="<?php echo isset($date)?$date:''?>"/></div> 
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>> Afternoon</div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
        <div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]" <?php if(in_array("Weekends fri/sun",$temp)){?> checked="checked"<?php }?>> Weekends fri/sun</div>
        <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$temp)){?> checked="checked"<?php }?>> Saturday</div>            
	</div>
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
	<?php $desc = $detail[0]['profile_description'];?>
	<label class="control-label">Tell us about your needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="ad-manager-full-input">Additional Requirements</div>
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
	<label class="control-label">Gender</label>
	<div class="ad-manager-checkbox">
		<div class="radio"><input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male</div>
        <div class="radio"><input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female</div>
        <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Any</div>
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
		<div class="radio" ><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php }?> > Yes</div>
        <div class="radio" ><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php }?> > No</div>
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
