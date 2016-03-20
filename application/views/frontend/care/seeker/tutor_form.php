
<div class="container">
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
        <?php 
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
         ?>
        <div>
            <label>Age of student</label>
            <div class="form-field">
            <input type="text" name="age" class="number" value="<?php echo isset($age) ? $age : '' ?>"/>
            </div>
        </div>

        <div>
            <label>Gender of student</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_careseeker"> Female</div>
            <!--<div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Any</div>-->
            </div>
        </div>

        <div>
            <label>Looking for help in the following subject(s):</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]"> Elementary school</div>
                <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]"> High school</div>
                <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]"> Post high school</div>
                <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" />Limudei Kodesh</div>
                <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" />General Studies</div>
                <div class="checkbox"><input type="checkbox" value="Special ed" name="subjects[]"> Special ed</div>
                <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]"> Music</div>
                <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]"> Art</div>
                <div class="checkbox"><input type="checkbox" value="Other" name="subjects[]"> Other</div>                        
            </div>
        </div>
        <div>
            <label>When you need lessons</label>
            <div class="form-field">                
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1"/></div>
                <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]">Occassionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]">Regularly</div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]">Afternoon</div>
            	<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>            	
                <div class="checkbox"><input type="checkbox" value="By appointment" name="availability[]">By appointment</div> 
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
        </div>


        <div>
            <label>Age of Tutor wanted</label>
            <div class="form-field">
            <input type="text" name="caregiverage_from" value="" placeholder="Age From" style="width:25%"> to  <input type="text" name="caregiverage_to" value="" placeholder="Age To" style="width:25%">
            </div>
        </div>
        <div>
            <label>Gender of tutor wanted</label>
            <div class="form-field">
                <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
                <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
                <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Any</div>
            </div>
        </div>
        <div>
            <label>Training / Certification required</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
            <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
            <div class="checkbox"><input type="checkbox" value="degree" name="training[]"> Degree</div>
            <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
            </div>
        </div>        
        <div>
            <label>Minimum years of experience</label>
            <div class="form-field">
            <select name="experience" class="">
                <option value="">Select</option>
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
                <option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox">Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
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
            <input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
</form>
</div>
