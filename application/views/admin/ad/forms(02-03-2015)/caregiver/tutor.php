<?php 
	if($detail){
		$subjects 		= explode(',', $detail[0]['subjects']);
		$availability 	= explode(',',$detail[0]['availability']);
		$exp 			= $detail[0]['experience'];
		$training 		= explode(',', $detail[0]['training']);
		$hr_rate 		= $detail[0]['hourly_rate'];
		$desc 			= $detail[0]['profile_description'];
		$ref 			= $detail[0]['references'];
		$bg_check 		= $detail[0]['agree_bg_check'];
		$start_date		= $detail[0]['start_date'];
        $rate = $detail[0]['rate'];
        $rate_type = explode(',',$detail[0]['rate_type']);
        $time = explode(',', $detail[0]['availability']);
        $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
	}
?>
<div class="form-group">
	<label class="control-label">Subject(s) (check one or more)</label>
	<div class="ad-manager-checkbox">
			<input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php } ?>>Elementary school<br/>
			<input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php } ?>>High school<br/>
			<input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php } ?>>Post high school<br/>
			<input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php } ?>>Special ed<br/>
			<input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php } ?>>Music<br/>
			<input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php } ?>>Art<br/>
			<input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Ohter',$subjects)){?> checked="checked" <?php } ?>>Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
    	<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$time)){?> checked="checked"<?php }?>> Immediate</div>
        <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?> class="check">Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1" /></div>
        <div class="checkbox"><input type="checkbox" value="occassionally" name="availability[]" <?php if(in_array('occassionally', $time)){?> checked="checked" <?php }?>> <span>Occassionally</span></div>
        <div class="checkbox"><input type="checkbox" value="regularly" name="availability[]" <?php if(in_array('regularly', $time)){?> checked="checked" <?php }?>> <span>Regularly</span></div>
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> <span>Morning</span></div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> <span>Evening</span></div>
        <div class="checkbox"><input type="checkbox" value="By Appointment" name="availability[]" <?php if(in_array('By Appointment', $time)){?> checked="checked" <?php }?>> <span>By Appointment</span></div>
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
			<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked"<?php } ?>>CPR<br/>
			<input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked"<?php } ?>>First Aid<br/>
			<input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course',$training)){?> checked="checked"<?php } ?>>Nanny/ Babysitter Course<br/>
			<input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$training)){?> checked="checked"<?php } ?>>Other
	</div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>	
	<div class="ad-manager-full-input">
		<select name="rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
        </select>
    </div>
</div>
<div class="form-group">
	<label></label>
	<div class="ad-manager-full-input" style="width:25%;margin-left:207px;">
		<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
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
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?> /> Yes</div>
        <div class="radio" ><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields (check if yes)</label>
</tr>
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license']){?> checked="checked" <?php } ?> >Drivers license</div>
		<div class="checkbox" ><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle']){?> checked="checked" <?php } ?>>Vehicle</div>
		<div class="checkbox" ><input type="checkbox" value="1" name="on_short_notice" <?php if($detail[0]['on_short_notice']){?> checked="checked" <?php } ?>>Available on short notice</div>
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
<script>
    $(document).ready(function(){
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