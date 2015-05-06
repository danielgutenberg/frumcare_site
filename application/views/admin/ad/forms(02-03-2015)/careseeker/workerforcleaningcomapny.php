<?php 
	if($detail){
		$fn                   = $detail[0]['name'];
		$availability         = explode(',', $detail[0]['availability']);
		$langtemp 		      = explode(',',$detail[0]['language']);
		$exp 			      = $detail[0]['experience'];
		$start_date 	      = $detail[0]['start_date'];
        $date                 = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $rate                 = $detail[0]['rate'];
        $rate_type            = explode(',',$detail[0]['rate_type']);
        $job_position         = $detail[0]['job_position'];
        $trainingtemp         = explode(',',$detail[0]['availability']);
        $religious_observance = $detail[0]['religious_observance'];
        $temp                 = explode(',',$detail[0]['availability']);
        $date                 = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00"; 
	}
?>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group">
	<label class="control-label">Name of organization</label>
	 <div class="ad-manager-full-input"><input type="text" name="organization_name" value="<?php echo $detail[0]['organiztion_name'];?>" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Contact name</label>
	 <div class="ad-manager-full-input">
		<input type="text" name="name" placeholder="Contact name" class="required" value="<?php if(isset($fn)) echo $fn;?>"  readonly/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Location</label>
	 <div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	 <div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Position you are looking to fill</label>
	 <div class="ad-manager-full-input">
		 <input type="text" name="job_position" class="required" value="<?php echo isset($job_position)?$job_position:''?>"/>
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
	<label class="control-label">Availability (check one or more)</label>
	 <div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$trainingtemp)){?> checked="checked"<?php }?>> Part Time</div>
        <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]" <?php if(in_array("Substitute",$trainingtemp)){?> checked="checked"<?php }?>> Substitute</div>
        <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$trainingtemp)){?> checked="checked"<?php }?>> Full Time</div>
        <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$trainingtemp)){?> checked="checked"<?php }?>> Days/ hours</div>
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$trainingtemp)){?> checked="checked"<?php }?>> Asap</div>
        <div class="checkbox"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date
        <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Job Day/ Hours</label>
	<div class="ad-manager-checkbox">
    </div>
</div>
<div class="form-group">
	<label class="control-label">Sun</label>
	<div class="ad-manager-checkbox">
        <input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>"><br />
        </div>
</div>
<div class="form-group">
	<label class="control-label">Mon-Thu</label>
	<div class="ad-manager-checkbox">        
        <input type="text" name="mid_days_from" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_to'];?>"><br />  
    </div>
</div>
<div class="form-group">
	<label class="control-label">Fri</label>
	<div class="ad-manager-checkbox">        
        <input type="text" name="friday_from" style="width:25%" class="time" value="<?php echo $detail[0]['friday_from'];?>"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>"><br />
    </div>
</div>
<div class="form-group">
	<label class="control-label">Vacation Days (Please specify vacation days)</label>
	<div class="ad-manager-checkbox">
        <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">
    </div>
</div>
<div class="form-group">
	<label class="control-label">Details</label>
	 <div class="ad-manager-full-input">
		<textarea name="profile_description" class="required"><?php echo $detail[0]['profile_description'];?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Addititonal Requirements</td>
</div>
<div class="form-group">
	<label class="control-label">Languages necesary</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
        <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Minimum years of experience</label>
	 <div class="ad-manager-full-input">
	<select name="experience">
        <option value="">Select minimum years of experience</option>
        <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
        <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
        <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
        <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
        <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
    </select>
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
