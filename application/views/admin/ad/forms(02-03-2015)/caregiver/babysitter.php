<tr>
<?php 
	//var_dump($detail[0]);exit();
	$lookingtowork = explode(',', $detail[0]['looking_to_work']);
	$age_grp =  explode(',',$detail[0]['age_group']);
	$exp = $detail[0]['experience'];
	$training = explode(',', $detail[0]['training']);
	$rate = $detail[0]['rate'];
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
	$optional_number = explode(',',$detail[0]['optional_number']);
	$rate_type = explode(',',$detail[0]['rate_type']);
?>
<div class="form-group">
	<label class="control-label">Looking to work in/as</label>
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

<div class="from-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" name="optionalnumber[]" value="Twins" <?php if(in_array('Twins', $optional_number)){?> checked="checked" <?php }?> >Twins</div>
		<div class="checkbox" ><input type="checkbox" name="optionalnumber[]" value="Triplets" <?php if(in_array('Triplets', $optional_number)){?> checked="checked" <?php }?>>Triplets</div>
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
		 <select name="rate" class="required form-control">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
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
	<label></label>
	<div class="ad-manager-full-input">
        <!--
        <select name="rate_type" class="form-control">
			<option value="1" <?php if($rate_type == 1){?> selected="selected" <?php } ?> >Hourly Rate</option>
			<option value="2" <?php if($rate_type == 2){?> selected="selected" <?php } ?>>Monthly Rate</option>
		</select>
        -->
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	<div class="ad-manager-checkbox">
            <div><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$time)){?> checked="checked"<?php } ?>> Immediate </div>
            <div><input type="checkbox" value="Start date" name="availability[]" <?php if(in_array("Start date",$time)){?> checked="checked"<?php } ?> id="ckbox1"> Start date <input type="text" name="start_date" value="<?php echo isset($start_date) && $start_date!='0000-00-00'?$start_date:''?>" id="textbox1"></div>
            <div><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array('Occassionally', $time)){?> checked="checked"<?php } ?>>Occassionally</div>
            <div><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array('Regularly', $time)){?> checked="checked"<?php } ?>>Regularly</div>
            <div><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> Morning</div>
            <div><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> Afternoon</div>
            <div><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> Evening</div>
            <div><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array('Shabbos', $time)){?> checked="checked" <?php }?>> Shabbos</div>
            <div><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse', $time)){?> checked="checked" <?php }?>> Night Nurse</div>
             <div><input type="checkbox" value="Vacation Sittter" name="availability[]" <?php if(in_array('Vacation Sittter', $time)){?> checked="checked" <?php }?>>Vacation Sittter</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input">
		<textarea class="form-control" name="profile_description"><?php echo $detail[0]['profile_description'];?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-checkbox">
		<div><input type="radio" value="1" name="references" id="ref_check1" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
        <div><input type="radio" value="2" name="references" id="ref_check2" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>
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
        <br/><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No
	</div>	
</div>
<div class="form-group">
	<label class="control-label">Abilities and skills</label>
    <div class="ad-manager-checkbox">
        <div class="checkbox" ><input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>>I have a drivers license</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> I have a vehicle</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>>Able to pick up kids from school</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>>Able to cook and prepare food</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>>Able to do light housework/ cleaning</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>>Able to help with homework</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>>Able to care for sick child</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="on_short_notice" <?php echo isset($on_short_notice) && $on_short_notice == 1 ? 'checked' : ''?>>Available on short notice</div>
    </div>
</div>
<script>
$(document).ready(function(){
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

//       if($('#ckbox1').is(':checked')){
//            $("#textbox1").show();
//       }else{
//            $("#textbox1").hide();
//            $('#textbox1').val('');
//       }
        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }
            else{
                $("#textbox1").hide(); 
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
        if($('#ref_check1').is(':checked')){
        	$('.refrence_file').show();
        }
    });
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY CHAND
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
