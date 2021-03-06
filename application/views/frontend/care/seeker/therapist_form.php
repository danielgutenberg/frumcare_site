
<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } 
    $user_detail = get_user(check_user());
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $age = $user_detail['age'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
?>
<div class="container">
<?php 
    if (($this->uri->segment(2) != 'new_profile')) {
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/add_careseeker_step2', $attributes);
    } else {
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/addprofileconfirm', $attributes);
        if(!empty($record)){
            echo form_hidden('account_category',$record['ac_type']);
            echo form_hidden('care_type',$record['submit_id']);
            echo form_hidden('account_type',$record['account_type']);
            echo form_hidden('organization_care',$record['organization_care']);
        }
    } 
?>
<div class="ad-form-container">
<?php if($this->uri->segment(2) != 'new_profile'){?>
<div>
    <h1 class="step2">Step 2: Job Details</h1>
</div>
<?php } ?>


    <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
    <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


                <?php $this->load->view('frontend/care/giver/fields/location', array('location' => $location));  ?>
                <div>
                    <label>Neighborhood / Street</label>
                    <div>
                    <input type="text" name="neighbour" class="txt" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
                    </div>    
                </div>                 
				<div>
					<label>Phone</label>
					<div class="form-field">
						<input type="text" name="contact_number" class="txt" value="<?php echo isset($phone)? $phone:''; ?>"/>
					</div>
				</div>
<div>
    <label>Age of patient</label>
    <div class="form-field">
    <input type="text" name="age_group[]" class="txt number" value=""/>
    </div>
</div>

<div>
    <label>Gender of patient</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" checked> Male</div>
    <div class="radio"><input type="radio" value="2" name="gender_of_careseeker"> Female</div>
    </div>
</div>
<div>
    <label>Condition(s) of patient (Specify)</label>
    <div class="form-field">
        <input type="text" name="conditions_of_patient" class="txt" value="">
    </div>
</div>

<div>
    <label>Type of therapist wanted</label>
    <div class="form-field">
    <input type="text" value="" name="type_of_therapy" class="txt">
    </div>
</div>
<div>
    <label>Tell us about your needs</label>
    <div class="form-field">
    <textarea name="profile_description" class="txt"></textarea>
    </div>
</div>

<h2>Additional Requirements</h2>

<div>
    <label>Languages necessary</label>
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
    <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Any</div>
    </div>
</div>
<div>
    <input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
</div>
</div>
</form>
</div>
