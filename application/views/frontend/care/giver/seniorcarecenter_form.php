<?php
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-done">Organization Details</li>    
</ol> 
<?php } ?>
<div class="container">
<?php if(($this->uri->segment(2) != 'new_profile')){?>
    <form action="<?php echo site_url();?>ad/savejobdetails" method="post">
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
                    
                    <option value="assisted living residence">Assisted living residence</option>
                    <option value="senior care center">Senior care center</option>
                    <option value="nursing home">Nursing home</option>
                    <option value="rehab therapy center">Rehab / Therapy Center</option>
                    <option value="other">Other</option>
                </select>
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
                <label>Number of patients / residents</label>
                <div class="form-field">
                <input type="text" value="" name="number_of_children" class="txt number">
                </div>
            </div>

            <div>
                <label>Number of staff </label>
                <div class="form-field">
                <input type="text" value="" name="number_of_staff" class="txt number">
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willing_to_work[]"> <span>Alz./dementia</span></div>
                    <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]"> <span>Sight loss</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]"> <span>Hearing loss</span></div>
                    <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>               
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
                <label>Cost</label>
                <div class="form-field">
                    <input type="text" name="rate" value="">
                </div>
            </div>
            <div>
                <label>Tell us about your organization / facility / staff</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <?php $this->load->view('frontend/care/giver/fields/references') ?>

            <?php $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload Photo of Facility / Organization"]); ?>  


            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="">
                </div>
            </div>

            
            <br />
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>        
    </form>
</div>
