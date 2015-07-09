<?php 
	$templookingtowork = explode(',', $detail[0]['looking_to_work']);
	$tempwillingtowork = explode(',' , $detail[0]['willing_to_work']);
    $templookingtowork = explode(',', $detail[0]['looking_to_work']);
    $exp = $detail[0]['experience'];
    $time = explode(',', $detail[0]['availability']);
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
?>

<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="Private home" name="looking_to_work[]" <?php if(in_array('Private home',$templookingtowork)){?> checked="checked" <?php }?>> <span>Private home</span></div>
        <div><input type="checkbox" value="Business/Office" name="looking_to_work[]" <?php if(in_array('Business/Office',$templookingtowork)){?> checked="checked" <?php }?>> <span>Business/Office</span></div>
        <div><input type="checkbox" value="Cleaning company" name="looking_to_work[]" <?php if(in_array('Cleaning company',$templookingtowork)){?> checked="checked" <?php }?>> <span>Cleaning company</span></div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
		<select name="experience" class="required">
            <option value="">Select years of experience</option>
            <option value="1" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == '5+' ? 'selected' : '' ?>>5+ years</option>
	    </select>
	</div>
</div>

<div class="form-group">
	<label class="control-label">Rate</label>
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
        <!--
        <select name="rate_type">
            <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Hourly Rate</option>
            <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Monthly Rate</option>
        </select>
        -->
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Floors</span></div>
        <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Windows</span></div>
        <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Dishes</span></div>
        <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Laundry</span></div>
        <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Folding</span></div>
        <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Ironing</span></div>
        <div><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Cleaning and Dusting Furniture</span></div>
        <div><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Cleaning Refrigerator/Freezer</span></div>
        <div><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stove', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Cleaning Oven/Stove</span></div>
        <div><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]" <?php if(in_array('Able to watch children as well', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Able to watch children as well</span></div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox">
        <input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array('Immediate',$time)){?> checked="checked" <?php }?> /> Immediate
		</div>
        <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?>> Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
		<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> <span>Morning</span></div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> <span>Evening</span></div>
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$time)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$time)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
        <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$time)){?> checked="checked"<?php }?>> <span>Weekends Fri./ Sun.</span></div>
        <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$time)){?> checked="checked"<?php }?>> <span>Saturday</span></div>
		<br />
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#wage_rate').change(function(){
			$('.wage').attr('name',$(this).val());
		});
		
		// show monthly_rate or hourly_rate
		var monthly_rate = "<?php echo $detail[0]['monthly_rate'];?>";
		var hourly_rate	 = "<?php echo $detail[0]['hourly_rate'];?>";
		if(monthly_rate !=''){
			$('#hr_wage').hide();
			$('#monthly_wage').show();
		}else{
			$('#hr_wage').show();
			$('#monthly_wage').hide();
		}

		// for checkbox and datepicker
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
