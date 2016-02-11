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
<?php if(($this->uri->segment(2) != 'new_profile')){?>
<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post" id="personal-details-form">
    <?php }else{
    $attributes = array('id' => 'personal-details-form');
    echo form_open('user/addprofileconfirm', $attributes);
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
    echo form_hidden('organization_care',$record['organization_care']);
   }} ?>
    <div class="ad-form-container">
        <?php if($this->uri->segment(2) != 'new_profile'){?>
        <div>
            <h1 class="step3">Step 2: Job Details</h1>
        </div>
        <?php } ?>
        <?php 
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
        ?>
        <div>
            <label>Number of children</label>
            <div class="form-field">
                <input type="text" value="" name="number_of_children" class="number">
                <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]">Twins</div>
                <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]">Triplets</div>
            </div>
        </div>
        <div>
            <label>Gender of children</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_careseeker"> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender_of_careseeker"> Both</div>
            </div>
        </div>
        <div>
            <label>Ages of children</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]"> 6-12 months</div>
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"> 12+ years</div>
            </div>
        </div>
        <div>
            <label>When you need care</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="One Time" name="availability[]">One time</div>
            <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]">Occassionally</div>
            <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]">Regularly</div>
            <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
            <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date
            <input  type="text" name="start_date" id="dateTextbox" autocomplete="off"/></div>
            <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> Morning</div>
            <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> Afternoon</div>
            <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>
            <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]"> Weekends Fri. / Sun.</div>
            <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]"> Night Nurse</div>
            <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"/>Shabbos</div>
            </div>
        </div>
        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="religious_observance">
               <option value="">Select</option>
				<option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
				<option value="Orthodox/Modern Orthodox">Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
				<option value="Not Necessary">Not necessary</option>
            </select>
            </div>

            <div style="display:none" class="not_jewish">
                <input type="checkbox" name="familarwithjewish" value="familarwithjewish">Familiar with Jewish Tradition
            </div>
        </div>
        <div>
            <label>Caregiver age</label>
            <div class="form-field">
                <input type="text" name="caregiverage_from" style="width:25%" placeholder="Age From"> to  <input type="text" name="caregiverage_to" style="width:25%" placeholder="Age To">
            </div>
        </div>

        <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
        <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


        <?php $this->load->view('frontend/care/seeker/fields/wage'); ?>
        
        <div>
            <label>Tell us about your needs</label>
            <div class="form-field">
            <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>

    <div>
        <label>Smoker</label>
        <div class="form-field">
            <div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
            <div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
        </div>
    </div>
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

                <label>Photo of child / children</label>
                    <?php $photo_url = site_url("images/plus.png");?>
                <div class="upload-photo">
                    <input type="hidden" id="file-name" name="photo_of_child" value="">
                    <div id="output"><img  id="uploadedfile" src="<?php echo $photo_url?>"></div>
                    <a href="#" class="buttons btn-default" id="upload">Choose File</a>

                    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                </div>
                <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
            </div>

        <div>
                 <input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>

    </div>
  </form>
</div>

<script type="text/javascript">
$(document).ready(function(){


        $('.religious_observance').change(function(){
            if($(this).val() == 'Other')
                $('.not_jewish').css('display','block');

            if($(this).val() == 'Not Jewish')
                $('.not_jewish').css('display','block');

            if($(this).val() != 'Other')
                $('.not_jewish').css('display','none');

            if($(this).val() != 'Not Jewish')
                $('.not_jewish').css('display','none');
       });
});
</script>


<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
