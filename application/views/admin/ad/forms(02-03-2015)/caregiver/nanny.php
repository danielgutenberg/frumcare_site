<?php 
if($detail){
	$looking_to_work       = explode(',', $detail[0]['looking_to_work']);
	$training		       = explode(',', $detail[0]['training']);
	$rate 		 	       = $detail[0]['rate'];
	$availability          = explode(',', $detail[0]['availability']);
	$desc 			       = $detail[0]['profile_description'];
	$ref 			       = $detail[0]['references'];
	$bg_check		       = $detail[0]['agree_bg_check'];
	$start_date 	       = $detail[0]['start_date'];
	$optional_number       = explode(',',$detail[0]['optional_number']);
	$exp 			       = $detail[0]['experience'];
	$rate_type             = explode(',',$detail[0]['rate_type']);
	$desc 			       = $detail[0]['profile_description'];
    $number_of_children    = $detail[0]['number_of_children'];
    $exp                   = $detail[0]['experience'];
    $time                  = explode(',', $detail[0]['availability']);
    $profile_description   = $detail[0]['profile_description'];
    $driver_license        = $detail[0]['driver_license'];
    $vehicle               = $detail[0]['vehicle'];
    $pick_up_child         = $detail[0]['pick_up_child'];
    $cook		           = $detail[0]['cook'];
    $basic_housework       = $detail[0]['basic_housework'];
    $homework_help         = $detail[0]['homework_help'];
    $sick_child_care       = $detail[0]['sick_child_care'];
    $on_short_notice       = $detail[0]['on_short_notice'];
    $wash                  = $detail[0]['wash'];
    $iron                  = $detail[0]['iron'];
    $fold                  = $detail[0]['fold'];
    $bath_children         = $detail[0]['bath_children'];
    $bed_children          = $detail[0]['bed_children'];
    $date                  = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $age_grp               = explode(',',$detail[0]['age_group']);
    $reference_file        = $detail[0]['reference_file'];
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
<div class="from-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" name="optionalnumber[]" value="Twins" <?php if(in_array('Twins', $optional_number)){?> checked="checked" <?php }?> >Twins
		<input type="checkbox" name="optionalnumber[]" value="Triplets" <?php if(in_array('Triplets', $optional_number)){?> checked="checked" <?php }?>>Triplets
	</div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children willing to care for</label>
	<div class="ad-manager-checkbox">
		<div><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_grp)){?> checked="checked" <?php } ?> > 0-3 months</div>
        <div><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_grp)){?> checked="checked" <?php } ?> > 3-6 months</div>
        <div><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_grp)){?> checked="checked" <?php } ?> > 6-12 months</div>
        <div><input type="checkbox" value="1" name="age_group[]" <?php if(in_array('1',$age_grp)){?> checked="checked" <?php } ?> > 1 year</div>
        <div><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_grp)){?> checked="checked" <?php } ?> > 1 to 3 years</div>
        <div><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_grp)){?> checked="checked" <?php } ?> > 3 to 5 years</div>
        <div><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_grp)){?> checked="checked" <?php } ?> > 6 to 11 years</div>
        <div><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_grp)){?> checked="checked" <?php } ?> > 12+ years</div>
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
	<label class="control-label">Training(check one or more)</label>
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
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
			<input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$availability)){?> checked="checked"<?php }?>>Immediate<br />
            <input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$availability)){?> checked="checked"<?php }?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo $start_date;?>" id="textbox1"><br/>
			<input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array('Occassionally',$availability)){?> checked="checked" <?php }?> >Occassionally<br/>
			<input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array('Regularly',$availability)){?> checked="checked" <?php }?> >Regularly<br/>
			<input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning',$availability)){?> checked="checked" <?php }?> >Morning<br/>
			<input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon',$availability)){?> checked="checked" <?php }?> >Afternoon<br/>
			<input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening',$availability)){?> checked="checked" <?php }?> >Evening<br/>
			<input type="checkbox" value="Weekends fri/sun" name="availability[]" <?php if(in_array('Weekends fri/sun',$availability)){?> checked="checked" <?php }?>>Weekends fri/sun<br/>
			<input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array('Shabbos',$availability)){?> checked="checked" <?php }?> >Shabbos<br/>
			<input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse',$availability)){?> checked="checked" <?php }?> >Night Nurse<br/>
			<input type="checkbox" value="Vacation sitter" name="availability[]" <?php if(in_array('Vacation sitter', $availability)){?> checked="checked" <?php }?> > Vacation sitter<br/>
	</div>	
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="references" id="ref_check1" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?> /> Yes
        <input type="radio" value="2" name="references" id="ref_check2" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No
	</div>
</div>
<div class="refrence_file form-group" style="display:none; margin-left:25px;">
    <label></label>
    <input type="hidden" id="file-name" name="file" value="<?php if(isset($detail[0]['reference_file']))echo $detail[0]['reference_file'];?>" class="form-control">
    <button class="btn btn-primary" id="select_file">Select File</button>
    <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
    <div id="output" class="loader"></div>
</div>
<div class="form-group">
	<label class="control-label">Agree to background check?</label>
	<div class="ad-manager-checkbox">
		<input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes
        <input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No
	</div>
</div>

<div class="form-group">
	<label class="control-label">Abilities and Skills(check if yes)</label>	
</div>

<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php } ?> >Ihave a drivers license<br/>
		<input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php } ?>>I have a vehicle<br/>
		<input type="checkbox" value="1" name="pick_up_child" <?php if($detail[0]['pick_up_child'] == 1){?> checked="checked" <?php } ?>>Able to pick up kids from school<br/>
		<input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked="checked" <?php } ?>>Able to cook and prepare food<br/>
		<input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked="checked" <?php } ?> >Able to do housework/ cleaning<br/>
		<input type="checkbox" value="1" name="homework_help" <?php if($detail[0]['homework_help'] == 1){?> checked="checked" <?php } ?>>Able help with homework<br/>
		<input type="checkbox" value="1" name="sick_child_care" <?php if($detail[0]['sick_child_care'] == 1){?> checked="checked" <?php } ?> >Able to care for sick child<br/>
		<input type="checkbox" value="1" name="on_short_notice"  <?php if($detail[0]['on_short_notice'] == 1){?> checked="checked" <?php } ?> >Available on short notice<br/>
        <input type="checkbox" value="1" name="wash"  <?php if($detail[0]['wash'] == 1){?> checked="checked" <?php } ?>>Able to do laundry<br/>
		<input type="checkbox" value="1" name="fold" <?php if($detail[0]['fold'] == 1){?> checked="checked" <?php } ?>>Able to fold<br/>
        <!--
        <input type="checkbox" value="1" name="iron" <?php if($detail[0]['iron'] == 1){?> checked="checked" <?php } ?> >Able to iron<br/>
		<input type="checkbox" value="1" name="bath_children" <?php echo isset($bath_children) && $bath_children == 1 ? 'checked' : ''?>>Able to bathe children<br />
		<input type="checkbox" value="1" name="bed_children" <?php if($detail[0]['bed_children'] == 1){?> checked="checked" <?php } ?>>Able to put children to bed
        -->
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
               // $("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });

         $('#ref_check1').click(function(){
            $('.refrence_file').show();
        });

        $('#ref_check2').click(function(){
            $('.refrence_file').hide();
            $('#output').text('');
            $('#file-name').val('');
        });

        
    });
</script>
<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("admin/ad/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY CHAND
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>