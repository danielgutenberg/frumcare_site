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
    <div class="ad-form-container">
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
            <label>Age of student</label>
            <div class="form-field">
            <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
            </div>
        </div>

        <div>
            <label>Gender of student</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Both</div>
            </div>
        </div>

        <div>
            <label>Looking for help in the following subject(s):</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]"> Elementary school</div>
                <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]"> High school</div>
                <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]"> Post high school</div>
                <div class="checkbox"><input type="checkbox" value="Special ed" name="subjects[]"> Special ed</div>
                <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]"> Music</div>
                <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]"> Art</div>
                <div class="checkbox"><input type="checkbox" value="Ohter" name="subjects[]"> Ohter</div>
                <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" />Limudei Kodesh</div>
                <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" />General Studies</div>
            </div>
        </div> 


        <h2>Additional Requirements</h2>

        <div>
            <label>Language</label>
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
            <label>Gender of tutor wanted</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Both</div>
            </div>
        </div>
        <div>
            <label>Tutor age from</label>
            <div class="form-field">
            <!--<select name="age_group" class="required">
                <option value="">Select tutor age from</option>
                <option value="10-20" <?php echo isset($age_grp) && $age_grp == '1-5' ? 'selected' : '' ?>>10 to 20</option>
                <option value="20-30" <?php echo isset($age_grp) && $age_grp == '5-10' ? 'selected' : '' ?>>20 to 30</option>
                <option value="30-40" <?php echo isset($age_grp) && $age_grp == '10-15' ? 'selected' : '' ?>>30 to 40</option>
            </select>-->
            <input type="text" name="caregiverage_from" value="" placeholder="Age From" style="width:25%"> to  <input type="text" name="caregiverage_to" value="" placeholder="Age To" style="width:25%">
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
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Orthodox">Orthodox</option>
                <option value="Modern Orthodox">Modern orthodox</option>
                <option value="Other">Other</option>
                <option value="Not Jewish">Not necessary</option>
            </select>
            </div>
        </div>
        <div>
            <label>Minimum years experience</label>
            <div class="form-field">
            <select name="experience" class="required">
                <option value="">Select Minimum years experience</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>

        <div>
            <label>Training/ certification required</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
            <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
            <div class="checkbox"><input type="checkbox" value="degree" name="training[]"> Degree</div>
            <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
            </div>
        </div>
        <div>
            <?php /* <input type="checkbox" value="1" name="photo_of_child"> <label>Photo</label> */?>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
</form>
