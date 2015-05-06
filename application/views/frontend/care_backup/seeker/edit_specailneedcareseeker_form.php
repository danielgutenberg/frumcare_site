<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
  <script>
  $(function() {
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
$user_detail = get_user(check_user());
if($detail){
	$looking_to_work = explode(',', $detail[0]['looking_to_work']);
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $number_of_children = $detail[0]['number_of_children'];
    $gender = explode(',', $user_detail['gender']);
    $age = $user_detail['age'];
    $exp = $detail[0]['experience'];
    $temp = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];
    $age_grp = $detail[0]['age_group'];
    $hourly_rate = $detail[0]['hourly_rate'];
    $desc 			 = $detail[0]['profile_description'];
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $willing_to_work = explode(',',$detail[0]['willing_to_work']);
    $gender_of_caregiver = explode(',', $user_detail['gender_of_caregiver']);
    $driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
    $cook		= $detail[0]['cook'];
	$basic_housework = $detail[0]['basic_housework'];
    $personal_hygiene = $detail[0]['personal_hygiene'];
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
}
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

<form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">

    <div class="top-welcome">
        <h2>Edit Job Details</h2>
    </div>
    <div>
        <label>Looking to work in (check one or more)</label>
        <div class="form-field">
        <input type="checkbox" value="My home" name="looking_to_work[]" <?php if(in_array('My home',$looking_to_work)){?> checked="checked" <?php } ?>> My home
        <input type="checkbox" value="Caregivers home" name="looking_to_work[]" <?php if(in_array('Caregivers home',$looking_to_work)){?> checked="checked" <?php } ?>> Caregivers home
        </div>
    </div>
    <div>
        <label>Address/Location</label>
        <div>
        <input type="text" name="location" class="required" value="<?php echo isset($address) ? $address : '' ?>"/>
        </div>    
    </div>
    <div>
        <label>Phone</label>
        <div class="form-field">
        <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
        </div>
    </div>
    <div>
        <label>Age of person requiring care</label>
        <div class="form-field">
        <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
        </div>
    </div>

    <div>
        <label>Gender of person requiring care</label>
        <div class="form-field">
        <input type="radio" value="1" name="gender" <?php if(in_array('1',$gender)){?> checked="checked" <?php } ?>> Male
        <input type="radio" value="2" name="gender" <?php if(in_array('2',$gender)){?> checked="checked" <?php } ?>> Female
        </div>
    </div>
    <div>
        <label>Conditions senior suffers from</label>
        <div class="form-field">
        <input type="checkbox" value="Alz." name="willing_to_work[]" <?php if(in_array('Alz.', $willing_to_work)){?> checked="checked" <?php }?>> Alz.
        <input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Hearing loss', $willing_to_work)){?> checked="checked" <?php }?>> Sight loss
        <input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Sight loss', $willing_to_work)){?> checked="checked" <?php }?>> Hearing loss
        <input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willing_to_work)){?> checked="checked" <?php }?>> Wheelchair bound
        </div>
    </div>

    <div>
        <label>When you need care</label>
        <div class="form-field">
        <input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$temp)){?> checked="checked"<?php }?>> Part Time
        <input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$temp)){?> checked="checked"<?php }?>> Full Time
        <input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$temp)){?> checked="checked"<?php }?>> Days/ hours
         <input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap
            <br />Start Date<br />
            <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/>
        </div>
    </div>
    <div>
        <label>Tell us about needs</label>
        <div class="form-field">
        <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>

    <h2>Encouraged but not mandatory fields</h2>
    <div>
        <label>Gender of caregiver</label>
        <div class="form-field">
        <input type="radio" value="1" name="gender_of_caregiver" <?php if(in_array('1',$gender_of_caregiver)){?> checked="checked" <?php } ?>> Male
        <input type="radio" value="2" name="gender_of_caregiver" <?php if(in_array('2',$gender_of_caregiver)){?> checked="checked" <?php } ?>> Female
        </div>
    </div>

    <div>
        <label>Languages necessary</label>
        <div class="form-field">
        <select name="language[]" multiple>
            <option value="eng" <?php if(in_array('eng',$langtemp)){?> selected="selected"<?php } ?>>
                English
            </option>
            <option value="es" <?php if(in_array('es',$langtemp)){?> selected="selected"<?php } ?>>
                Spanish
            </option>
            <option value="sign" <?php if(in_array('sign',$langtemp)){?> selected="selected"<?php } ?>>
                Sign Language
            </option>
        </select>
        </div>
    </div>
    <div>
        <label>Level of observance necessary</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox' ? 'selected' : '' ?>>Orthodox</option>
            <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern orthodox</option>
            <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
            <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
        </select>
        </div>
    </div>
    <div>
        <label>Caregiver age from</label>
        <div class="form-field">
        <select name="age_group" class="required">
            <option value="">Select caregiver age from</option>
            <option value="1-5" <?php echo isset($age_grp) && $age_grp == '1-5' ? 'selected' : '' ?>>1 to 5</option>
            <option value="5-10" <?php echo isset($age_grp) && $age_grp == '5-10' ? 'selected' : '' ?>>5 to 10</option>
            <option value="10-15" <?php echo isset($age_grp) && $age_grp == '10-15' ? 'selected' : '' ?>>10 to 15</option>
        </select>
        </div>
    </div>
    <div>
        <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>Drivers license</label>
    </div>
    <div>
        <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>Vehicle</label>
    </div>
    <div>
        <label>Smoking acceptable</label>
        <div class="form-field">
        <input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes
        <input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No
        </div>
    </div>

    <div>
        <label>Training necessary</label>
        <div class="form-field">
        <input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR
        <input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid
        <input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course
        <input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary
        </div>
    </div>
    <div>
        <label>Minimum experience</label>
        <div class="form-field">
        <select name="experience">
            <option value="">Select minimum experience</option>
            <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
            <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
            <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
            <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
            <option value="5+" <?php echo isset($exp) && $exp == 5 ? 'selected' : '' ?>>5+ years</option>
        </select>
        </div>
    </div>

    <div>
        <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Willing to cook</label>
    </div>
    <div>
        <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Willing to do light housework/ cleaning</label>
    </div>
    <div>
        <input type="checkbox" value="1" name="personal_hygiene" <?php echo isset($personal_hygiene) && $personal_hygiene == 1 ? 'checked' : ''?>> <label>Must be willing to deal with personal hygiene of senior</label>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="Update"/>
    </div>
</form>
</div>
</div>