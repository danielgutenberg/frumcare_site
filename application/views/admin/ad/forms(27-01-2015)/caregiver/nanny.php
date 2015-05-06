<?php 
if($detail){
	$looking_to_work = explode(',', $detail[0]['looking_to_work']);
	$age_grp 		 = $detail[0]['age_group'];
	$training		 = explode(',', $detail[0]['training']);
	$hr_rate 		 = $detail[0]['hourly_rate'];
	$availability    = explode(',', $detail[0]['availability']);
	$desc 			 = $detail[0]['profile_description'];
	$ref 			 = $detail[0]['references'];
	$bg_check		 = $detail[0]['agree_bg_check'];
	$start_date 	 = $detail[0]['start_date'];
}
?>
<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php } ?>>Live in<br/>
		<input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php } ?>>Live out<br/>
		<input type="checkbox" value="Any" name="looking_to_work[]" <?php if(in_array('Any',$looking_to_work)){?> checked="checked" <?php } ?>>Any
	</div>
</div>
<div class="form-group">
	<label class="control-label">Number of children willing to care for</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['number_of_children'];?>" name="number_of_children" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children willing to care for</label>
	<div class="ad-manager-full-input">
		<select name="age_group" class="required">
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
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked" <?php }?> >CPR<br/>
		<input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked" <?php }?> >First Aid<br/>
		<input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course',$training)){?> checked="checked" <?php }?> >Nanny/ Babysitter Course<br/>
		<input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$training)){?> checked="checked" <?php }?> >Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>	
	<div class="ad-manager-full-input">
		<select name="hourly_rate" class="required">
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
			<input type="checkbox" value="Imm" name="availability[]" <?php if(in_array("Imm",$availability)){?> checked="checked"<?php }?>> Imm <br />
            <input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$availability)){?> checked="checked"<?php }?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo $start_date;?>" id="textbox1"><br/>
			<input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time',$availability)){?> checked="checked" <?php }?> >Part Time<br/>
			<input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time',$availability)){?> checked="checked" <?php }?> >Full Time<br/>
			<input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning',$availability)){?> checked="checked" <?php }?> >Morning<br/>
			<input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon',$availability)){?> checked="checked" <?php }?> >Afternoon<br/>
			<input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening',$availability)){?> checked="checked" <?php }?> >Evening<br/>
			<input type="checkbox" value="Weekends/ Shabbos" name="availability[]" <?php if(in_array('Weekends/ Shabbos',$availability)){?> checked="checked" <?php }?> >Weekends/ Shabbos<br/>
			<input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse',$availability)){?> checked="checked" <?php }?> >Night Nurse
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?> /> Yes
        <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No
	</div>
</div>

<div class="form-group">
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No
	</div>
</div>

<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields (check if yes)</label>	
</div>

<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php } ?> >Drivers license<br/>
		<input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php } ?>>Vehicle<br/>
		<input type="checkbox" value="1" name="pick_up_child" <?php if($detail[0]['pick_up_child'] == 1){?> checked="checked" <?php } ?>>Willing to pick up kids from school<br/>
		<input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked="checked" <?php } ?>>Willing to cook<br/>
		<input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked="checked" <?php } ?> >Willing to do light housework/ cleaning<br/>
		<input type="checkbox" value="1" name="homework_help" <?php if($detail[0]['homework_help'] == 1){?> checked="checked" <?php } ?>>Willing to help with homework<br/>
		<input type="checkbox" value="1" name="sick_child_care" <?php if($detail[0]['sick_child_care'] == 1){?> checked="checked" <?php } ?> >Willing to care for sick child<br/>
		<input type="checkbox" value="1" name="on_short_notice"  <?php if($detail[0]['on_short_notice'] == 1){?> checked="checked" <?php } ?> >Available on short notice<br/>
		<input type="checkbox" value="1" name="wash"  <?php if($detail[0]['wash'] == 1){?> checked="checked" <?php } ?>>Willing to wash<br/>
		<input type="checkbox" value="1" name="iron" <?php if($detail[0]['iron'] == 1){?> checked="checked" <?php } ?> >Willing to iron<br/>
		<input type="checkbox" value="1" name="fold" <?php if($detail[0]['fold'] == 1){?> checked="checked" <?php } ?>>Willing to fold<br/>
		<input type="checkbox" value="1" name="bath_children" <?php if($detail[0]['bath_children'] == 1){?> checked="checked" <?php } ?>>Willing to bath children<br/>
		<input type="checkbox" value="1" name="bed_children" <?php if($detail[0]['bed_children'] == 1){?> checked="checked" <?php } ?>>Willing to put children to bed
	</div>
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