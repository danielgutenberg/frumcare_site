
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
$user_detail = get_user(check_user());
if($detail){
	$looking_to_work = explode(',', $detail[0]['looking_to_work']);
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $number_of_children = $detail[0]['number_of_children'];
    $gender_of_careseeker = $detail[0]['gender_of_careseeker'];
    $age = $user_detail['age'];
    $exp = $detail[0]['experience'];
    $time = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];
    $age_grp = $detail[0]['age_group'];
    $rate = $detail[0]['rate'];
    $desc 			 = $detail[0]['profile_description'];
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $willing_to_work = explode(',',$detail[0]['willing_to_work']);
    $gender_of_caregiver = explode(',', $detail[0]['gender_of_caregiver']);
    $driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
    $cook		= $detail[0]['cook'];
	$basic_housework = $detail[0]['basic_housework'];
    $personal_hygiene = $detail[0]['personal_hygiene'];
    if (isset($detail[0]['start_date']) && $detail[0]['start_date'] != '0000-00-00') {
        if ( date_create_from_format( 'Y-m-d', $detail[0]['start_date'] ) ) {
            $date = date_create_from_format('Y-m-d', $detail[0]['start_date'])->format('m/d/Y');
        } else {
            $date = $detail[0]['start_date'];
        }
    } else {
        $date = '00-00-0000';
    }
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
    $caregiverage_from = $detail[0]['caregiverage_from'];
    $caregiverage_to = $detail[0]['caregiverage_to'];
    $lat = $user_detail['lat'];
    $lng = $user_detail['lng'];
    $city = $user_detail['city'];
    $state = $user_detail['state'];
    $country = $user_detail['country'];
    $currency = $detail[0]['currency'];
}
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard/nav');?>
    </div>
    <div class="dashboard-right float-right">
    <?php    
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/update_job_details/'.$care_type, $attributes);
    ?>
<div class="ad-form-container">
    <div class="top-welcome">
        <h2>Edit Job Details</h2>
    </div>
    <div>
        <label>Looking for</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php } ?>> Live in</div>
            <div class="checkbox"><input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php } ?>> Live out</div>
        </div>
    </div>
        <?php 
            $location = [
                'location' => $address,
                'lat' => $lat,
                'lng' => $lng,
                'city' => $city,
                'state' => $state,
                'country' => $country
            ];
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood', ['neighbour' => $neighbour]); 
            $this->load->view('frontend/care/giver/fields/phone', ['phone' => $phone]); 
         ?>
    <div>
        <label>Age of person requiring care</label>
        <div class="form-field">
        <input type="text" name="age" class="number" value="<?php echo isset($age) ? $age : '' ?>"/>
        </div>
    </div>

    <div>
        <label>Gender of person requiring care</label>
        <div class="form-field">
                    <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" <?php if($gender_of_careseeker == 1){?> checked="checked" <?php } ?>> Male</div>
                    <div class="radio"><input type="radio" value="2" name="gender_of_careseeker" <?php if($gender_of_careseeker == 2){?> checked="checked" <?php } ?>> Female</div>
                    <div class="radio"><input type="radio" value="3" name="gender_of_careseeker" <?php if($gender_of_careseeker == 3){?> checked="checked" <?php } ?>> Any</div>
                </div>
    </div>
    <div>
		<label>Conditions person suffers from</label>
		<div class="form-field">
			<div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]" <?php if(in_array('Autism', $willing_to_work)){?> checked="checked" <?php }?>> <span>Autism</span></div>
			<div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]" <?php if(in_array('Down Syndrome', $willing_to_work)){?> checked="checked" <?php }?>> <span>Down Syndrome</span></div>
			<div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]" <?php if(in_array('Handicapped', $willing_to_work)){?> checked="checked" <?php }?>> <span>Handicapped</span></div>
			<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willing_to_work)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>
		</div>
	</div>
    <div>
        <label>When you need care</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$time)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
            <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$time)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
            <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$time)){?> checked="checked"<?php }?>>Asap</div>
            <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if($date!='00-00-0000'){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='00-00-0000'){ echo 'value="'.$date.'"';}?> id="dateTextbox"/></div>
            <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$time)){?> checked="checked"<?php }?>> <span>Morning</span></div>
            <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$time)){?> checked="checked"<?php }?>> <span>Afternoon</span></div>
            <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$time)){?> checked="checked"<?php }?>> <span>Evening</span></div>
            <div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]" <?php if(in_array("Weekends Fri./Sun.",$time)){?> checked="checked"<?php }?>> <span>Weekends Fri. / Sun.</span></div>
            <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$time)){?> checked="checked"<?php }?>> <span>Shabbos</span></div>
			<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]" <?php if(in_array("24 hr care",$time)){?> checked="checked"<?php }?>> <span>24 hr care</span></div>
        </div>
    </div>
    <?php $this->load->view('frontend/care/seeker/fields/wage', ['rate' => $rate, 'currency' => $currency]); ?>
    <div>
        <label>Tell us about needs</label>
        <div class="form-field">
        <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>

    <h2>Additional Requirements</h2>

    <div>
        <label>Languages necessary</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$langtemp)){?> checked="checked"<?php } ?>> Hebrew</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>

        </div>
    </div>
    <div>
        <label>Age of Caregiver</label>
        <div class="form-field">
        <input type="text" name="caregiverage_from" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class=""> to  <input type="text" name="caregiverage_to" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="">
        </div>
    </div>
    <div>
        <label>Gender of caregiver</label>
        <div class="form-field">
            <div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php if(in_array('1',$gender_of_caregiver)){?> checked="checked" <?php } ?>> Male</div>
            <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php if(in_array('2',$gender_of_caregiver)){?> checked="checked" <?php } ?>> Female</div>
            <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php if(in_array('3',$gender_of_caregiver)){?> checked="checked" <?php } ?>> Any</div>
        </div>
    </div>
    <div>
        <label>Training / Certification required</label>
        <div class="form-field">
        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
        <div class="checkbox"><input type="checkbox" value="Special needs training" name="training[]" <?php if(in_array('Special needs training',$trainingtemp)){?> checked="checked"<?php } ?>> Special needs training</div>
        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked"<?php } ?>> Nurse</div>
        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
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
            <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
        </select>
        </div>
    </div>
    <div>
        <label>Level of observance necessary</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Yeshivish/Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/Chasidish' ? 'selected' : '' ?>>Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/Modern Orthodox' ? 'selected' : '' ?>>Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
            <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
        </select>
        </div>
    </div>


      <div>
        <label>Smoking acceptable</label>
        <div class="form-field">
        <div class="radio" ><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
        <div class="radio" ><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
        </div>
    </div>

    <h2>Abilities and Skills Necessary</h2>
    <div class="form-field">
        <div class="checkbox">
            <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>>Drivers license
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>>Vehicle
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>>Must be able to cook and prepare food
             /serve meals
        </div>

        <div class="checkbox">
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>>Must be able to do light housework / cleaning
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="personal_hygiene" <?php echo isset($personal_hygiene) && $personal_hygiene == 1 ? 'checked' : ''?>>Must be able to deal with personal hygiene of patient
        </div>
    </div>
    <div>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Update"/>
    </div>
</div>
</form>
</div>
</div>
