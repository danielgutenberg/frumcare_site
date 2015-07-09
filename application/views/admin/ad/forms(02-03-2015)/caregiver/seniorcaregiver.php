<?php 
	if($detail){
		$exp  				= $detail[0]['experience'];
		$tempwillingtowork  = explode(',' ,$detail[0]['willing_to_work']);
		$tempavailability   = explode(',' , $detail[0]['availability']);
		$desc 				= $detail[0]['profile_description'];
		$ref 				= $detail[0]['references'];
		$ref_det 			= $detail[0]['references_details'];
		$bg_check			= $detail[0]['agree_bg_check'];
		$temptraining		= explode(',', $detail[0]['training']);
		$start_date			= $detail[0]['start_date'];
        $looking_to_work    = explode(',', $detail[0]['looking_to_work']);
        $training		    = explode(',', $detail[0]['training']);
        $time               = explode(',', $detail[0]['availability']);
        $driver_license     = $detail[0]['driver_license'];
        $vehicle            = $detail[0]['vehicle'];
        $on_short_notice    = $detail[0]['on_short_notice'];
        $date               = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $reference_file     = $detail[0]['reference_file'];
        $rate               = $detail[0]['rate'];
        $rate_type = explode(',',$detail[0]['rate_type']);
	} 
?>
<div class="form-group">
    <label class="control-label">Looking to work in (check one or more)</label>
    <div class="ad-manager-full-input">
        <div class="checkbox"><input type="checkbox" value="Home of senior" name="looking_to_work[]" <?php if(in_array('Home of senior',$looking_to_work)){?> checked="checked" <?php } ?>> <span>Home of senior</span></div>
        <div class="checkbox"><input type="checkbox" value="Caregiving institude" name="looking_to_work[]" <?php if(in_array('Caregiving institude',$looking_to_work)){?> checked="checked" <?php } ?>> <span>Caregiving Instution</span></div>
        <div class="checkbox"><input type="checkbox" value="Live In" name="looking_to_work[]" <?php if(in_array('Live In',$looking_to_work)){?> checked="checked" <?php } ?>> <span>Live In</span></div>
        <div class="checkbox"><input type="checkbox" value="Live Out" name="looking_to_work[]" <?php if(in_array('Live Out',$looking_to_work)){?> checked="checked" <?php } ?>> <span>Live Out</span></div>
    </div>
</div>
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
	<label class="control-label">Training (check one or more)</label>
	<div class="ad-manager-checkbox">
        <div><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> <span>CPR</span></div>
        <div><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> <span>First Aid</span></div>
        <div><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> <span>Other</span></div>
        <div><input type="checkbox" value="Senior Care Training" name="training[]" <?php if(in_array('Senior Care Training', $training)){?> checked="checked" <?php } ?>> <span>Senior Care Training</span></div>
        <div><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse', $training)){?> checked="checked" <?php } ?>> <span>Nurse</span></div>
	</div>
</div>

<div class="form-group">
	<label class="control-label">Willing to work (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]" <?php if(in_array('Alz./ Dementia', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Alz./ Dementia</span></div>
        <div><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>                                                                <div><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>                        
        <div><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
        <div><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]" <?php if(in_array('Able To Tend To Personal Hygiene of Senior', $tempwillingtowork)){?> checked="checked"<?php }?>><span>Able To Tend To Personal Hygiene of Senior</span></div>
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
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
        <div class="checkbox"><input type="checkbox" value="Imm" name="availability[]" <?php if(in_array("Imm",$time)){?> checked="checked"<?php }?>> Imm</div>
        <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array('Occassionally', $time)){?> checked="checked" <?php }?>> <span>Occassionally</span></div>
		<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array('Regularly', $time)){?> checked="checked" <?php }?>> <span>Regularly</span></div>
		<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> <span>Morning</span></div>
		<div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>
		<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> <span>Evening</span></div>
		<div class="checkbox"><input type="checkbox" value="Overnight" name="availability[]" <?php if(in_array('Overnight', $time)){?> checked="checked" <?php }?>><span>Overnight</span></div>
		<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]" <?php if(in_array('Weekends Fri./Sun.', $time)){?> checked="checked" <?php }?>> <span>Weekends Fri./Sun.</span></div>
		<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array('Shabbos', $time)){?> checked="checked" <?php }?>><span>Shabbos</span></div>
		<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]" <?php if(in_array('24 hr care', $time)){?> checked="checked" <?php }?>> <span>24 hr care</span></div>
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
	<div class="ad-manager-full-input">
		<div class="radio"><input type="radio" value="1" name="references" id="ref_check1" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
        <div class="radio"><input type="radio" value="2" name="references" id="ref_check2" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No</div>
        <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader">
                <?php if(isset($reference_file))
                    echo $reference_file;
                else
                    echo 'No files';
                ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
	<label class="control-label" style="display:none">Your references details</td>
	<div class="ad-manager-full-input">
			<textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
	</div>
</div>
<div class="form-group">	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
        <div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
        <div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields (check if yes)</label>
</div>
<div class="form-group">	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php }?>>Drivers license
		<br />
		<input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php }?>>Vehicle
		<br />
		<input type="checkbox" value="1" name="on_short_notice" <?php if($detail[0]['on_short_notice']){?> checked="checked" <?php }?>>Available on short notice
		
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
  $("#ref_check1").click(function(){
            $(".refrence_file").show();   
        });
        $("#ref_check2").click(function(){
             	$.ajax({
			         type: "POST",
			         url: "<?php echo base_url(); ?>user/delete_ref_file",
			         data: {file_name : $("#output").text()},
			         success: function(r){
                        $('#output').html(r);
			         }
		          });
                     $(".refrence_file").hide(); 
             $('#file-name').val('');   
        });
});
</script>
<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY Kiran
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
