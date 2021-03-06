
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
    $temp = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];
    $age_grp = $detail[0]['age_group'];
    $hourly_rate = $detail[0]['hourly_rate'];
    $desc 			 = $detail[0]['profile_description'];
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $conditions_of_patient = $detail[0]['conditions_of_patient'];
    $type_of_therapy = $detail[0]['type_of_therapy'];
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $accept_insurance = explode(',',$detail[0]['accept_insurance']);
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
     $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
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
   <div>
            <label>Location </label>
            <div id="locationField">
                <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
                <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
                <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
                <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
                <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
                <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
            </div> 
             <span style="color:red;" id="error"> </span>
        </div>
         <div>
            <label>Neighborhood / Street</label>
            <div>
            <input type="text" name="neighbour" class="txt" value="<?php echo isset($neighbour) ? $neighbour : '' ?>"/>
            </div>    
        </div>         
        <div>
            <label>Phone</label>
            <div class="form-field">
            <input type="text" name="contact_number" class="txt" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
            </div>
        </div>
    <div>
        <label>Age of patient</label>
        <div class="form-field">
        <input type="text" name="age_group[]" class="txt number" value="<?php if(isset($age_grp)){echo $age_grp;} ?>"/>
        </div>
    </div>
    
    <div>
        <label>Gender of patient</label>
        <div class="form-field">
                    <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" <?php if($gender_of_careseeker == 1){?> checked="checked" <?php } ?>> Male</div>
                    <div class="radio"><input type="radio" value="2" name="gender_of_careseeker" <?php if($gender_of_careseeker == 2){?> checked="checked" <?php } ?>> Female</div>
                    <div class="radio"><input type="radio" value="3" name="gender_of_careseeker" <?php if($gender_of_careseeker == 3){?> checked="checked" <?php } ?>> Any</div>
                </div>
    </div>
    <div>
        <label>Condition(s) of patient(Specify)</label>
        <div class="form-field">
            <input type="text" name="conditions_of_patient" class="txt" value="<?php echo $conditions_of_patient;?>">
        </div>
    </div>
    
    <div>
        <label>Type of therapist wanted</label>
        <div class="form-field">
        <input type="text" value="<?php echo isset($type_of_therapy) ? $type_of_therapy : '' ?>" name="type_of_therapy" class="txt">
        </div>
    </div>
    <div>
        <label>Tell us about your needs</label>
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
        <label>Gender of therapist</label>
        <div class="form-field">
          <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male</div>
          <div class="radio"><input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female</div>
          <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Both</div>
        </div>
    </div>
    
    <?php /*
    <div>
        <label>Level of observance necessary</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Yeshivish/ Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/ Chasidish' ? 'selected' : '' ?>>Yeshivish/ Chasidish</option>
            <option value="Orthodox/ Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/ Modern Orthodox' ? 'selected' : '' ?>>Orthodox/ Modern orthodox</option>
            <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
            <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
        </select>
        </div>
    </div>
    */?>
    
    <div>
        <label>Must accept insurance</label>
        <div class="form-field">
          <div class="radio"><input type="radio" value="1" name="accept_insurance" <?php if(in_array('1',$accept_insurance)){?> checked="checked" <?php } ?>/> Yes</div>
          <div class="radio"><input type="radio" value="2" name="accept_insurance" <?php if(in_array('2',$accept_insurance)){?> checked="checked" <?php } ?>/> No</div>
        </div>
    </div>
    <div>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Update"/>
    </div>
    </div>
    </form>
</div>
</div>
