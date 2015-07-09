<tr>
<?php 
	$lookingtowork = explode(',', $detail[0]['looking_to_work']);
	$age_grp =  $detail[0]['age_group'];
	$exp = $detail[0]['experience'];
	$training = explode(',', $detail[0]['training']);
	$hr_rate = $detail[0]['hourly_rate'];
	$time = explode(',', $detail[0]['availability']);
	$ref = $detail[0]['references'];
	$bg_check = $detail[0]['agree_bg_check'];
	$driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
	$pick_up_child = $detail[0]['pick_up_child'];
	$cook		= $detail[0]['cook'];
	$basic_housework = $detail[0]['basic_housework'];
	$homework_help = $detail[0]['homework_help'];
	$sick_child_care = $detail[0]['sick_child_care'];
	$on_short_notice = $detail[0]['on_short_notice'];
	$start_date = $detail[0]['start_date'];
?>
<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="My home" name="looking_to_work[]" <?php if(in_array('My home', $lookingtowork)){?>checked="checked"<?php }?> > My home</div>
        <div><input type="checkbox" value="Child's home" name="looking_to_work[]" <?php if(in_array("Child's home", $lookingtowork)){?>checked="checked"<?php }?>> Child's home</div>
        <div><input type="checkbox" value="Caregiving institution" name="looking_to_work[]" <?php if(in_array("Caregiving institution", $lookingtowork)){?>checked="checked"<?php }?>> Caregiving institution</div>
        <div><input type="checkbox" value="Any" name="looking_to_work[]" <?php if(in_array("Any", $lookingtowork)){?>checked="checked"<?php }?>> Any</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Number of children willing to care for</label>
	<div class="ad-manager-full-input"><input type="text" name="number_of_children" class="form-control" value="<?php echo $detail[0]['number_of_children'];?>"></div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children willing to care for</label>
	<div class="ad-manager-full-input">
		<select name="age_group" class="form-control">
	        <option value="">Select age of children</option>
	        <option value="0-1" <?php echo isset($age_grp) && $age_grp == '0-1' ? 'selected' : '' ?>>First year</option>
	        <option value="1-3" <?php echo isset($age_grp) && $age_grp == '1-3' ? 'selected' : '' ?>>1 to 3 years</option>
	        <option value="3-5" <?php echo isset($age_grp) && $age_grp == '3-5' ? 'selected' : '' ?>>3 to 5 years</option>
	        <option value="6-11" <?php echo isset($age_grp) && $age_grp == '6-11' ? 'selected' : '' ?>>6 to 11 years</option>
	        <option value="12+" <?php echo isset($age_grp) && $age_grp == '6-11' ? 'selected' : '' ?>>12+ years</option>
	    </select>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
		 <select name="experience" class="form-control">
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
	<label class="control-label">Training (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?> > CPR</div>
        <div><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> First Aid</div>
        <div><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course', $training)){?> checked="checked" <?php } ?>> Nanny/ Babysitter Course</div>
        <div><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> Other</div>
	</div>	
</div>
<div class="form-group">
	<label class="control-label">Rate</label>
	<div class="ad-manager-full-input">
		 <select name="hourly_rate" class="required form-control">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($hr_rate) && $hr_rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($hr_rate) && $hr_rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($hr_rate) && $hr_rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($hr_rate) && $hr_rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($hr_rate) && $hr_rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($hr_rate) && $hr_rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($hr_rate) && $hr_rate == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
            <div><input type="checkbox" value="Imm" name="availability[]" <?php if(in_array("Imm",$time)){?> checked="checked"<?php }?>> Imm </div>
            <div><input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$time)){?> checked="checked"<?php }?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo $start_date;?>" id="textbox1"></div>
            <div><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time', $time)){?> checked="checked" <?php }?>> Part Time</div>
            <div><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time', $time)){?> checked="checked" <?php }?>> Full Time</div>
            <div><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> Morning</div>
            <div><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> Afternoon</div>
            <div><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> Evening</div>
            <div><input type="checkbox" value="Weekends/ Shabbos" name="availability[]" <?php if(in_array('Weekends/ Shabbos', $time)){?> checked="checked" <?php }?>> Weekends/ Shabbos</div>
            <div><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse', $time)){?> checked="checked" <?php }?>> Night Nurse</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input">
		<textarea class="form-control" name="profile_description" ><?php echo $detail[0]['profile_description'];?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes
        <br/><input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes
        <br/><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No
	</div>	
</div>
<div class="form-group">
	<label class="control-label">
		<h2>Encouraged but not mandatory fields (check if yes)</h2>
	</label>
</div>
<div class="form-group">	
 <div class="ad-manager-checkbox"><input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>Drivers license</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>Vehicle</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>> <label>Willing to pick up kids from school</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>><label>Willing to cook</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Willing to do light housework/ cleaning</label></div>
</div>
<div class="form-group">
	 <div class="ad-manager-checkbox"><input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>> <label>Willing to help with homework</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>> <label>Willing to care for sick child</label></div>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox"><input type="checkbox" value="1" name="on_short_notice" <?php echo isset($on_short_notice) && $on_short_notice == 1 ? 'checked' : ''?>> <label>Available on short notice</label></div>
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
