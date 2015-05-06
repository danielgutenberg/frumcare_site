<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Your Details</li>
    <li class="progtrckr-done">Start Getting Calls</li>
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
                <h1 class="step3">Step 3: Job Details</h1>
            </div>
            <?php } ?>
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
                    <div class="first-block-checkbox">
                <div><input type="checkbox" value="Alz./dementia" name="willing_to_work[]"> <span>Alz./dementia.</span></div>
                <div><input type="checkbox" value="Sight loss" name="willing_to_work[]"> <span>Sight loss</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Hearing loss" name="willing_to_work[]"> <span>Hearing loss</span></div>
                <div><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
                </div>
                </div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                <select name="hourly_rate" class="required">
                <option value="">Select cost</option>
                <option value="5-10" <?php echo isset($hr_rate) && $hr_rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
                <option value="10-15" <?php echo isset($hr_rate) && $hr_rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
                <option value="15-25" <?php echo isset($hr_rate) && $hr_rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
                <option value="25-35" <?php echo isset($hr_rate) && $hr_rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
                <option value="35-45" <?php echo isset($hr_rate) && $hr_rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
                <option value="45-55" <?php echo isset($hr_rate) && $hr_rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
                <option value="55+" <?php echo isset($hr_rate) && $hr_rate == '55+' ? 'selected' : '' ?>>$55+</option>
                </select>
                </div>
            </div>
            <div>
                <label>Tell us about your organization</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="">
                </div>
            </div>
            <div>
                 <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
    </form>    
</div>