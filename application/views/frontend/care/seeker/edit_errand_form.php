<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
if($detail){
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $number_of_children = $detail[0]['number_of_children'];
    $gender_of_careseeker = $detail[0]['gender_of_careseeker'];
    $desc 			 = $detail[0]['profile_description'];
    $hourly_rate = $detail[0]['hourly_rate'];
    $temp = explode(',',$detail[0]['availability']);
    $langtemp = explode(',', $detail[0]['language']);
    //$gender_of_caregiver = explode(',', $user_detail['gender_of_caregiver']);
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $religious_observance = $detail[0]['religious_observance'];
    $smoker = explode(',', $detail[0]['smoker']);
    $exp = $detail[0]['experience'];
    $driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
    $job_description = $detail[0]['job_description'];
    if (isset($detail[0]['start_date']) && $detail[0]['start_date'] != '0000-00-00') {
        if ( date_create_from_format( 'Y-m-d', $detail[0]['start_date'] ) ) {
            $date = date_create_from_format('Y-m-d', $detail[0]['start_date'])->format('m/d/Y');
        } else {
            $date = $detail[0]['start_date'];
        }
    } else {
        $date = '00-00-0000';
    }$neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
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
    <div class="ad-form-container float-left">
    <div class="top-welcome">
        <h2>Edit Job Details</h2>
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
        <label>Description of job</label>
        <div class="form-field">
        <textarea name="job_description" class="txt"><?php echo isset($job_description) ? $job_description : '' ?></textarea>
        </div>
    </div>
    <?php $this->load->view('frontend/care/seeker/fields/wage', ['rate' => $rate, 'currency' => $currency]); ?>
    
    <div>
        <label>When you need help</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="One time" name="availability[]" <?php if(in_array("One time",$temp)){?> checked="checked"<?php }?>>One time</div>
            <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>>Occassionally</div>
            <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>>Regularly</div>
            <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
            <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if($date!='00-00-0000'){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='00-00-0000'){ echo 'value="'.$date.'"';}?> id="dateTextbox"/></div>
            <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
            <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>>Afternoon</div>
            <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
            <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$temp)){?> checked="checked"<?php }?>> Weekends Fri. / Sun.</div>
            <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$temp)){?> checked="checked"<?php }?>>Shabbos</div> 
        </div>
    </div>
    <!--<div>-->
    <!--    <label>Tell us about your needs</label>-->
    <!--    <div class="form-field">-->
    <!--        <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>-->
    <!--    </div>-->
    <!--</div>-->
    
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
        <label>Gender wanted</label>
        <div class="form-field">
            <div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male</div>
            <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female</div>
            <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Any</div>
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
            <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
        </select>
        </div>
    </div>
    <div>
        <label>Smoking acceptable</label>
        <div class="form-field">
        <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
        <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
        </div>
    </div>

    <h2>Abilities and Skills Necessary</h2>
    <div class="checkbox">
        <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> Drivers license
    </div>
    <div class="checkbox">
        <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> Vehicle
    </div>
    
    <div>
       <input id="careseekerButton" type="submit" class="btn btn-success" value="Update"/>
    </div>
    </div>
        </form>
</div>
</div>
