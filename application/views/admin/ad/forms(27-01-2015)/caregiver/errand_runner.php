<?php 
	$exp 			= $detail[0]['experience'];
	$hr_rate 		= $detail[0]['hourly_rate'];
	$availabletime 	= $detail[0]['availability'];
	$desc 			= $detail[0]['profile_description'];
	$ref 			= $detail[0]['references'];
	$ref_det  		= $detail[0]['references_details'];
	$bg_check		= $detail[0]['agree_bg_check'];
	$temp 			= explode(',',$availabletime);
	$start_date 	= $detail[0]['start_date'];

?>
<div class="form-group">
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
		<input type="checkbox" value="Imm" name="availability[]" <?php if(in_array("Imm",$temp)){?> checked="checked"<?php }?>> Imm <br/>
        <input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$temp)){?> checked="checked"<?php }?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo $start_date;?>" id="textbox1"><br />
		<input type="checkbox" value="Part Time" <?php if(in_array('Part Time', $temp)){?> checked="checked" <?php } ?> name="availability[]" />Part Time<br/>
		<input type="checkbox" value="Full Time" <?php if(in_array('Full Time', $temp)){?> checked="checked" <?php } ?> name="availability[]" />Full Time<br/>
		<input type="checkbox" value="Morning" <?php if(in_array('Morning', $temp)){?> checked="checked" <?php } ?> name="availability[]" />Morning<br/>
		<input type="checkbox" value="Afternoon" <?php if(in_array('Afternoon', $temp)){?> checked="checked" <?php } ?> name="availability[]" />Afternoon<br/>
		<input type="checkbox" value="Evening" <?php if(in_array('Evening', $temp)){?> checked="checked" <?php } ?> name="availability[]" />Evening
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input">
		<textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No
	</div>	
</div>
<div class="form-group">
	<label class="control-label">Your references details</label>
	<div class="ad-manager-full-input">
		<textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields (check if yes)</label>
</div>
<div class="form-group">
	<div class="ad-manager-checkbox">
			<input type="checkbox" value="1" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php } ?> name="driver_license">Has Drivers license
		<br/>
			<input type="checkbox" value="1" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php } ?> name="vehicle">Has Vehicle
		<br/>
			<input type="checkbox" value="1" <?php if($detail[0]['on_short_notice'] == 1){?> checked="checked" <?php } ?> name="on_short_notice">Available on short notice
		<br/>

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