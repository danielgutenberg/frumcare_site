<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-done">Organization Details</li>    
</ol> 
<?php } ?>
<div class="container">
<?php 
    if(($this->uri->segment(2) != 'new_profile')){
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/savejobdetails', $attributes);
    } else {
        echo form_open('ad/addprofileconfirm');
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
        <h1 class="step3">Step 3: Organization Details</h1>
    </div>
    <?php } ?>
    
    <?php if($this->uri->segment(2) == 'new_profile') { ?>
             <h1>Organization Info</h1>
             <div>
        <?php 
            $this->load->view('frontend/care/giver/fields/location');
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
            $this->load->view('frontend/care/giver/fields/name_of_owner'); 
            $this->load->view('frontend/care/giver/fields/age_of_owner'); 
            $this->load->view('frontend/care/giver/fields/gender');
            $this->load->view('frontend/care/giver/fields/languages_spoken');  
            $this->load->view('frontend/care/giver/fields/religious_observance');
            $this->load->view('frontend/care/photo_upload', ['photo_name' => 'profile_picture_owner', 'upload_title' => "Upload owner's photo"]);
            $this->load->view('frontend/care/giver/fields/account_category_type'); 
        ?>


         <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
         <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>

    <h1>Organization Details</h1><?php }?>
    
    <div>
        <label>Year established</label>
        <div class="form-field">
        <select name="established" class="required">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>"><?php echo $i;?></option>
            <?php endfor;?>
        </select>
        </div>
    </div>

    <div>
        <label>Certification</label>
        <div class="form-field">
        <input type="text" value="" name="certification" class="required">
        </div>
    </div>
    <div>
        <label>Specialize in</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]"> <span>Autism</span></div>
            <div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]"> <span>Down Syndrome</span></div>
            <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
            <div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]"><span>Handicapped</span></div>
        </div>
    </div>
   <div>
        <label>Observance in facility</label>
        <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" />Shul on premises</div>
        <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" />Kosher kitchen</div>
        <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" />Kosher food available</div>
        <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" />Shabbos observant facility</div>
    </div>
    <div>
        <label>Number of patients</label>
        <div class="form-field">
        <input type="text" value="" name="number_of_children" class="txt number">
        </div>
    </div>

    <div>
        <label>Number of staff</label>
        <div class="form-field">
        <input type="text" value="" name="number_of_staff" class="txt number">
        </div>
    </div>


    <div>
                <label>Cost</label>
                <div class="form-field">
                    <input type="text" name="rate" value="">
                </div>
            </div>
    <div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
    </div>
        
    <div>
        <label>Tell us about your organization / facilities / staff</label>
        <div class="form-field">
        <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
        </div>
    </div>

    

    <?php $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload Photo of Facility / Organization"]); ?>               




    <div>
        <label> Payment Options(specify)</label>
        <div class="form-field">
            <input type="text" name="payment_option" value="">
        </div>
    </div>
        <br/ >
    <div>
          <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
    </div>

    </div>
    </form>
</div>