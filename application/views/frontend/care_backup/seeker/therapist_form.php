<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-done">Start Getting Calls</li>
</ol>
<?php } 
    $user_detail = get_user(check_user());
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $age = $user_detail['age'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
?>

<div class="ad-form-container">
<?php if(($this->uri->segment(2) != 'new_profile')){?>
<form action="<?php echo site_url();?>/ad/add_careseeker_step2">
<?php }else{
    echo form_open('user/addprofileconfirm');
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
    echo form_hidden('organization_care',$record['organization_care']);
   }} ?>
<?php if($this->uri->segment(2) != 'new_profile'){?>
<div>
    <h1 class="step2">Step 2: Job Details</h1>
</div>
<?php } ?>
<div>
					<label>Location</label>
					<div id="locationField">
						<input type="text" name="location" class="required" id="autocomplete" onFocus="geolocate()" value="<?php echo isset($address)? $address:''; ?>" />
					</div>    
				</div>
                <div>
                    <label>Neighborhood</label>
                    <div>
                    <input type="text" name="neighbour" class="required" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
                    </div>    
                </div>
                 <div>
                    <label>Zip</label>
                    <div>
                    <input type="text" name="zip" class="required" value="<?php echo isset($zip)? $zip:''; ?>"/>
                    </div>    
                </div>
				<div>
					<label>Phone</label>
					<div class="form-field">
						<input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
					</div>
				</div>
<div>
    <label>Age of patient</label>
    <div class="form-field">
    <input type="text" name="age_group[]" class="required number" value=""/>
    </div>
</div>

<div>
    <label>Gender of patient</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="gender" checked> Male</div>
    <div class="radio"><input type="radio" value="2" name="gender"> Female</div>
    </div>
</div>
<div>
    <label>Condition(s) of patient(Specify)</label>
    <div class="form-field">
        <input type="text" name="conditions_of_patient" class="required" value="">
    </div>
</div>

<div>
    <label>Type of therapist wanted</label>
    <div class="form-field">
    <input type="text" value="" name="type_of_therapy" class="required">
    </div>
</div>
<div>
    <label>Tell us about yourself</label>
    <div class="form-field">
    <textarea name="profile_description" class="required"></textarea>
    </div>
</div>

<h2>Additional Requirements</h2>

<div>
    <label>Languages</label>
    <div class="form-field">
    <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>
    </div>
</div>

<div>
    <label>Gender of therapist</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
    <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
    <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Both</div>
    </div>
</div>

<div>
    <label>Level of observance necessary</label>
    <div class="form-field">
    <select name="religious_observance" class="required">
        <option value="">Select</option>
        <option value="Orthodox">Orthodox</option>
        <option value="Modern Orthodox">Modern orthodox</option>
        <option value="Other">Other</option>
        <option value="Not Jewish">Not necessary</option>
    </select>
    </div>
</div>
<div>
    <label>Must accept insurance</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="accept_insurance"/> Yes</div>
    <div class="radio"><input type="radio" value="2" name="accept_insurance" checked/> No</div>
    </div>
</div>
<div>
    <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
</div>
</div>
