
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
            <h1 class="step3">Step 2: Job Details</h1>
        </div>
        <?php } ?>
        <div>
            <label>For</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Home" name="looking_to_work[]"> Home</div>
                <div class="checkbox"><input type="checkbox" value="Office/business" name="looking_to_work[]"> Office / business</div>
            </div>
        </div>
        <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
            <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>
       <?php 
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
         ?>
        <div>
            <label>Number of rooms</label>
            <div class="form-field">
            <input type="text" name="number_of_rooms" class="number" value=""/>
            </div>
        </div>

        <div>
            <label>Must specialize in</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]"> Dishes</div>
            <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]"> Floors</div>
            <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]"> Windows</div>
            <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]"> Laundry</div>
            <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]"> Folding</div>
            <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]"> Ironing</div>
            <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]">Cleaning and Dusting Furniture</div>
            <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]">Cleaning Refrigerator / Freezer</div>
            <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stovetop" name="willing_to_work[]">Cleaning Oven / Stovetop</div>
            <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
            <div class="checkbox"><input type="checkbox" name="pick_up_child" value="1"/>Must be able to watch children as well</div>
            </div>
        </div>

        <div>
            <label>When you need help</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="One time" name="availability[]"> One time</div>
                <div class="checkbox"><input type="checkbox" value="Occasionally" name="availability[]"> Occasionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> Regularly</div>
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="dateTextbox"/></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> Afternoon</div>
                <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>
                <div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]"> Weekends fri / sun</div>
                <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]"> Saturday</div>
            </div>
        </div>
        <?php $this->load->view('frontend/care/seeker/fields/wage'); ?>
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
            <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>
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
            <label>Gender of helper wanted</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Either</div>
            </div>
        </div>

        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="txt">
                <option value="">Select</option>
                <option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox">Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
                <option value="Not Jewish">Not necessary</option>
            </select>
            </div>
        </div>
        <div class="checkbox-wrap">
        		<div>
        			<input type="checkbox" value="1" name="watch_children"> <label>Must be able to watch children as well</label>
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
            <input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
    </form>
</div>
</div>
