<?php
	if(isset($detail)){
		$lookingtowork = explode(',',$detail[0]['looking_to_work']);
		$optionalnumber = explode(',',$detail[0]['optional_number']);
		$age = explode(',',$detail[0]['age_group']);
	}
?>
<div class="form-group">
	<label class="control-label">Looking for care in</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="My home" name="looking_to_work[]" <?php if(in_array('My home',$lookingtowork)){?> checked="checked" <?php }?>> My home</div>
       	<div class="checkbox"><input type="checkbox" value="Caregivers home" name="looking_to_work[]" <?php if(in_array('Caregivers home',$lookingtowork)){?> checked="checked" <?php }?>> Caregivers home</div>
       	<div class="checkbox"><input type="checkbox" value="Mothers helper" name="looking_to_work[]" <?php if(in_array("Mothers helper",$lookingtowork)){?> checked="checked" <?php }?>> Mother's helper</div>
	</div>
</div>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
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
	<label class="control-label">Number of children willing to care for</label>
	<div class="ad-manager-full-input"><input type="text" name="number_of_children" value="<?php echo $detail[0]['number_of_children'];?>"></div>
</div>

<div class="form-group">
    <label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" name="optionalnumber[]" value="Twins" <?php if(in_array('Twins',$optionalnumber)){?> checked="checked" <?php }?> > Twins</div>
		<div class="checkbox" ><input type="checkbox" name="optionalnumber[]" value="Triplets" <?php if(in_array('Triplets',$optionalnumber)){?> checked="checked" <?php }?> > Triplets</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Gender of children</label>
	<div class="ad-manager-checkbox">
		<div  class="radio" ><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?> > Male</div>
        <div  class="radio" ><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>> Female</div>
        <div  class="radio" ><input type="radio" value="3" name="gender" <?php if($detail[0]['gender'] == 3){?> checked="checked" <?php }?>> Any</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children</label>
	<div class="ad-manager-checkbox">				
		<div class="checkbox" ><input type="checkbox" name="age_group[]" value="0-3" <?php if(in_array('0-3', $age)){?> checked="checked" <?php }?>>0-3 Months</div>
		<div class="checkbox" ><input type="checkbox" name="age_group[]" value="3-6" <?php if(in_array('3-6', $age)){?> checked="checked" <?php }?>>3-6 Months</div>
		<div class="checkbox" ><input type="checkbox" name="age_group[]" value="6-12" <?php if(in_array('6-12', $age)){?> checked="checked" <?php }?>>6-12 Months</div>		
		<div class="checkbox" ><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3', $age)){?> checked="checked" <?php }?>> 1 to 3 years</div>
        <div class="checkbox" ><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5', $age)){?> checked="checked" <?php }?>> 3 to 5 years</div>
        <div class="checkbox" ><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11', $age)){?> checked="checked" <?php }?>> 6 to 11 years</div>
        <div class="checkbox" ><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+', $age)){?> checked="checked" <?php }?>> 12+ years</div>
	</div>
</div>
<?php /* <div class="form-group">
	<?php $exp = $detail[0]['experience'];?>
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
</div> */
/* $exp = $detail[0]['experience'];
?>        <div class="form-group">
            <label class="control-label">Years of experience</label>
            <div class="ad-manager-checkbox">
            <select name="experience" >
                <option value="">Select years of experience</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
*/ ?>
<div class="form-group">
	<?php 
		$temp = explode(',',$detail[0]['availability']);
        $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
	?>
	<label class="control-label">When do you need care</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="One Time" name="availability[]" <?php if(in_array("One Time",$temp)){?> checked="checked"<?php }?>> One Time</div>
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>> Occassionally</div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>> Regularly</div>
        <!--<div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$temp)){?> checked="checked"<?php }?>> Days/ hours</div>-->
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
        <div class="checkbox"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date
        <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>> Afternoon</div>
        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
        <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$temp)){?> checked="checked"<?php }?>> Weekends Fri./ Sun.</div>
        <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$temp)){ ?> checked="checked" <?php }?>> Shabbos</div>
        <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array("Night Nurse",$temp)){?> checked="checked"<?php }?>> Night Nurse</div>
        <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]" <?php if(in_array("Vacation Sitter",$temp)){?> checked="checked"<?php }?>>Vacation Sitter</div>
	</div>
</div>
<?php $religious_observance = $detail[0]['religious_observance']; ?>
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
        <?php 
            $caregiverage_from = $detail[0]['caregiverage_from'];
            $caregiverage_to = $detail[0]['caregiverage_to']; 
        ?>
        <div class="form-group">
            <label class="control-label">Caregiver age from</label>
            <div class="ad-manager-full-input">
                <input type="text" name="agefrom" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="ageto" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
            </div>
        </div>
<?php 
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
?>
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
 <h2>Abilities and skills</h2>
 <div class="form-group">
 	<label class="control-label">Smoker</label>
 	<div class="ad-manager-checkbox">
 		<div class="radio" ><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php }?> > Yes</div>
        <div class="radio" ><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php }?>> No</div>
 	</div>
 </div>
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
	 <label class="control-label">Training necessary</label>
	 <?php 
	 	$trainingtemp = explode(',',$detail[0]['training']);
	 ?> 
	 <div class="ad-manager-checkbox">
	 	<div><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
	    <div><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
	    <div><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course</div>
	    <div><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
	 </div>
</div>
<div class="form-group">
 	<label class="control-label">Minimum experience</label>
 	<div class="ad-manager-full-input">
 		<select name="experience">
            <option value="">Select minimum experience</option>
            <option value="1" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($detail[0]['experience']) &&  $detail[0]['experience'] == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($detail[0]['experience']) && $detail[0]['experience'] == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
 	</div>
</div>
<div class="form-group">
 	<label class="control-label"></label>
 	<div class="ad-manager-checkbox">
        <div class="checkbox" ><input type="checkbox" value="1" name="driver_license" <?php if($detail[0]['driver_license'] == 1){?> checked="checked" <?php }?> >Drivers license</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="vehicle" <?php if($detail[0]['vehicle'] == 1){?> checked="checked" <?php }?>>Vehicle</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="pick_up_child" <?php if($detail[0]['pick_up_child'] == 1){?> checked="checked" <?php }?>>Must be willing to pick up kids from school</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="cook" <?php if($detail[0]['cook'] == 1){?> checked="checked" <?php }?>>Must be willing to cook/ serve meals</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="basic_housework" <?php if($detail[0]['basic_housework'] == 1){?> checked="checked" <?php }?>>Must be willing to do light housework/ cleaning</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="homework_help" <?php if($detail[0]['homework_help'] == 1){?> checked="checked" <?php }?>>Must be willing to help with homework</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="sick_child_care" <?php if($detail[0]['sick_child_care'] == 1){?> checked="checked" <?php }?>>Must be willing to care for sick child</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="references" <?php if($detail[0]['references'] == 1){?> checked="checked" <?php }?>>Must have references</div>        
    </div>
</div>
<div class="form-group">
    <label class="control-label">Photo of child/ children</label>
        <?php
        $photo_url = site_url("images/plus.png");
        $current_user = get_user(check_user());
        $photo = $detail[0]['photo_of_child'];
        if($photo!="")
            $photo_url = base_url('images/profile-picture/thumb/'.$photo);
        ?>
    <div class="ad-manager-checkbox">
        <div class="upload-photo">
            <input type="hidden" id="file-name" name="photo_of_child" value="<?php if(isset($photo)) echo $photo;?>">
            <div id="output"><img src="<?php echo $photo_url?>"></div>
            <button class="btn btn-default" id="upload">Choose File</button>
            <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

	$('#wage_rate').change(function(){
		$('#wage').attr('name',$(this).val());
	});

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
<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("ad/upload_pp?files")?>';
    $('#upload').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });

    $('#output').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });
    
</script>
<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
