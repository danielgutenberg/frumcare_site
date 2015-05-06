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
<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post">
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
					<label>Address</label>
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
    <label>Description of job</label>
    <div class="form-field">
    <textarea name="job_description" class="required"></textarea>
    </div>
</div>
<div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
                <select name="rate" class="required rate">
                    <option value="">Select wage</option>
                    <option value="5-10">$5-$10</option>
                    <option value="10-15">$5-$10</option>
                    <option value="15-25">$15-$25</option>
                    <option value="25-35">$25-$35</option>
                    <option value="35-45">$35-$45</option>
                    <option value="45-55">$45-$55</option>
                    <option value="55+">$55+</option>
                </select>
                <select name="rate_type">
                    <option value="1" selected="selected">Per Hour</option>
                    <option value="2">Per Month</option>
                </select>
            </div>
        </div>
<div>
    <label>Availability (check one or more)</label>
    <div class="form-field">
        <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]">Occassionally</div>
        <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]">Regularly</div>
        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
        <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" style="display: none;"/></div>
        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> Morning</div>
        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]">Afternoon</div>
    	<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>
    	<div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]"> Weekends Fri./ Sun.</div> 
        </div>
</div>
<div>
    <label>Tell us about needs</label>
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
    <label>Gender wanted</label>
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
    <label>Smoking acceptable</label>
    <div class="form-field">
    <div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
    <div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
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
        <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
    </select>
    </div>
</div>
<div class="checkbox-wrap">
<div>
    <input type="checkbox" value="1" name="driver_license"> <label>Drivers license</label>
</div>
<div>
    <input type="checkbox" value="1" name="vehicle"> <label>Vehicle</label>
</div>

<div>
   <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
</div>
</div>
    </form>
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