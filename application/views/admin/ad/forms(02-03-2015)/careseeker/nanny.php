<?php 
	if($detail){
		$looking_to_work 	= explode(',', $detail[0]['looking_to_work']);
		$age 				= $detail[0]['age'];
		$availability 		= explode(',',$detail[0]['availability']);
		$age_grp 			= $detail[0]['age_group'];
		$desc 				= $detail[0]['profile_description'];
		$lang 				= explode(',',$detail[0]['language']);
		$training 			= explode(',',$detail[0]['training']);
		$exp 				= $detail[0]['experience'];
		$start_date 		= $detail[0]['start_date'];
        
        $temp               = explode(',',$detail[0]['availability']);
        $date               = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
        $rate               = $detail[0]['rate'];
        $rate_type          = explode(',',$detail[0]['rate_type']);
        $childcare          = $detail[0]['pick_up_child'];
        $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
        $temp               = explode(',',$detail[0]['availability']);
        $start_date         = $detail[0]['start_date'];
        $langtemp           = explode(',', $detail[0]['language']);
        $religious_observance = $detail[0]['religious_observance'];
        
        $driver_license     = $detail[0]['driver_license'];
    	$vehicle = $detail[0]['vehicle'];
    	$pick_up_child = $detail[0]['pick_up_child'];
    	$cook		= $detail[0]['cook'];
    	$basic_housework = $detail[0]['basic_housework'];
    	$homework_help = $detail[0]['homework_help'];
    	$sick_child_care = $detail[0]['sick_child_care'];
        $references = $detail[0]['references'];
        $photo_of_child = $detail[0]['photo_of_child'];
        $wash = $detail[0]['wash'];
        $iron = $detail[0]['iron'];
        $fold = $detail[0]['fold'];
        $bath_children = $detail[0]['bath_children'];
        $bed_children = $detail[0]['bed_children'];
        $clean = $detail[0]['clean'];
        $caregiverage_from = $detail[0]['caregiverage_from'];
        $caregiverage_to = $detail[0]['caregiverage_to'];
        $age_group = explode(',',$detail[0]['age_group']);
        $optionalnumber = explode(',',$detail[0]['optional_number']);
	}
?>
<input type="hidden" name="user_id" value="<?php echo $detail[0]['user_id']; ?>"/>
<div class="form-group">
	<label class="control-label">Looking to work in (check one or more)</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox" ><input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php }?> > Live in</div>
        <div class="checkbox" ><input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php }?>> Live out</div>
	</div>
</div>
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
	<label class="control-label">Number of children</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['number_of_children'];?>" name="number_of_children" class="required number"></div>
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
		<div class="radio" ><input type="radio" value="1" name="gender" <?php if($detail[0]['gender'] == 1){?> checked="checked" <?php }?>>Male</div>
        <div class="radio" ><input type="radio" value="2" name="gender" <?php if($detail[0]['gender'] == 2){?> checked="checked" <?php }?>>Female</div>
        <div class="radio" ><input type="radio" value="3" name="gender" <?php if($detail[0]['gender'] == 3){?> checked="checked" <?php }?>>Any</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Ages of children</label>
	<div class="ad-manager-full-input">
		<div class="checkbox" ><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
        <div class="checkbox" ><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
        <div class="checkbox" ><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
        <div class="checkbox" ><input type="checkbox" value="1" name="age_group[]" <?php if(in_array('1',$age_group)){?> checked="checked" <?php } ?>/> 1 year</div>
        <div class="checkbox" ><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>
        <div class="checkbox" ><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>
        <div class="checkbox" ><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>
        <div class="checkbox" ><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">When you need care</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>>Occassionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>>Regularly</div>    
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>/>Start Date
                <input  type="text" name="start_date" id="textbox1" style="display: none;" value="<?php echo isset($date)?$date:''?>"/></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>>Afternoon</div>
                <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?> > Evening</div>
                <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$temp)){?> checked="checked"<?php }?>> Weekends Fri./ Sun.</div>
                <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$temp)){?> checked="checked"<?php }?>>Shabbos</div>
                <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array("Night Nurse",$temp)){?> checked="checked"<?php }?>> Night Nurse</div>
                <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]" <?php if(in_array("Vacation Sitter",$temp)){?> checked="checked"<?php }?>>Vacation Sitter</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	<div class="ad-manager-full-input">
		<select name="religious_observance" class="required">
            <option value="">Select</option>
                <option value="Yeshivish/ Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/ Chasidish' ? 'selected' : '' ?>>Yeshivish/ Chasidish</option>
                <option value="Orthodox/ Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/ Modern Orthodox' ? 'selected' : '' ?>>Orthodox/ Modern Orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
       </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Caregiver age from</label>
	<div class="ad-manager-full-input">
        <input type="text" name="agefrom" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="ageto" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
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
                <div>
                <div class="checkbox" ><input type="checkbox" value="1" name="rate_type[]" <?php echo in_array(1,$rate_type)?'checked':'' ?>/>Per Hour</div>
                <div class="checkbox" ><input type="checkbox" value="2" name="rate_type[]" <?php echo in_array(2,$rate_type)?'checked':'' ?>/>Per Month</div>            
                </div>
            </div>
        </div>
<div class="form-group">
	<label class="control-label">Tell us about your needs</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
</tr>
<div>Abilities and skills</div>
</tr>
<div class="form-group">
	<label class="control-label">Smoker</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php } ?>  > Yes</div>
        <div class="checkbox"><input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php } ?>> No</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Languages necessary</label>
<div class="ad-manager-full-input">
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
	<div class="ad-manager-checkbox">  
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$training)){?> checked="checked" <?php }?> > CPR<br/>
        <input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$training)){?> checked="checked" <?php }?>> First Aid<br/>
        <input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$training)){?> checked="checked" <?php }?>> Nanny/ Babysitter course<br/>
        <input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$training)){?> checked="checked" <?php }?>> Not necessary
    </div>
</div>
<div class="form-group">
	<label class="control-label">Minimum experience</label>
	<div class="ad-manager-full-input">
		<select name="experience">
            <option value="">Select minimum experience</option>
            <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label"></label>
	<div class="ad-manager-checkbox">
		<div class="checkbox">
            <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>>Drivers license
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>>Vehicle
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>>Willing to pick up kids from school
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>>Willing to cook
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>>Willing to do housework/ cleaning
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>>Willing to help with homework
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>>Willing to care for sick child
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="references" <?php echo isset($references) && $references == 1 ? 'checked' : ''?>>Must have references
        </div>
        
        <div class="checkbox">
            <input type="checkbox" value="1" name="photo_of_child" <?php echo isset($photo_of_child) && $photo_of_child == 1 ? 'checked' : ''?>>Photo of child/ children
        </div>
        <!--
        <div>
            <input type="checkbox" value="1" name="clean" <?php echo isset($clean) && $clean == 1 ? 'checked' : ''?>> <label>Must be willing to clean</label>
        </div>
        
        -->
        <div class="checkbox">
            <input type="checkbox" value="1" name="wash" <?php echo isset($wash) && $wash == 1 ? 'checked' : ''?>>Willing to do laundry
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="iron" <?php echo isset($iron) && $iron == 1 ? 'checked' : ''?>>Willing to iron
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="fold" <?php echo isset($fold) && $fold == 1 ? 'checked' : ''?>>Willing to fold
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="bath_children" <?php echo isset($bath_children) && $bath_children == 1 ? 'checked' : ''?>> Willing to bathe children
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="bed_children" <?php echo isset($bed_children) && $bed_children == 1 ? 'checked' : ''?>> Willing to put children to bed
        </div>
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

<script type="text/javascript">
function change_wage(val){
    if(val==1){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'hourly_rate');
    }
    else if(val=2){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'monthly_rate');    
    }
}
</script>
<style type="text/css">
	html{
		height: auto;
	}
</style>
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
