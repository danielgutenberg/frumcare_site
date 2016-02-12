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
            <h1>Organization Details</h1><?php }?>

            <div>
                <label>Type of Organization</label>
                <select name="sub_care">
                    <option value="day care center">Day Care Center</option>
                    <option value="day camp">Day Camp</option>
                    <option value="afternoon activities">Afternoon Activities</option>
                    <option value="pre school">Pre-School</option>
                    <option value="other">Other</option>
                </select>
            </div>    
        
            
               
            <div>
                <label>For</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Boys" name="looking_to_work[]"> <span>Boys</span></div>
                    <div class="checkbox"><input type="checkbox" value="Girls" name="looking_to_work[]"> <span>Girls</span></div>
                    <div class="checkbox"><input type="checkbox" value="Both" name="looking_to_work[]"> <span>Both</span></div>
                </div>
            </div>  
            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="txt">
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
                <input type="text" value="" name="certification" class="txt">
                </div>
            </div>
            <div>
                <label>Age group</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]"> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]"> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]"> 6-12 months</div>                    
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"> 1 to 3 years</div>
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"> 3 to 5 years</div>
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"> 6 to 11 years</div>
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"> 12+ years</div>
                </div>
            </div>
            
            <div>
                <label>Number of children in group</label>
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
       
            <?php $this->load->view('frontend/care/giver/fields/days_hours'); ?>
            
            <div>
                <label>Tell us about your organization / facilities / activities</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>
            <?php $this->load->view('frontend/care/giver/fields/references') ?>

            <?php $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload Photo of Facility / Organization"]); ?> 
            <div>
            <label>Cost</label>
            <div class="form-field">
                <input type="text" name="rate" value="">
            </div>
        </div>
            <br/>
            <div>
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
   </form>
</div>

