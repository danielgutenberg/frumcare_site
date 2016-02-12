<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Personal Details</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
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
            <h1 class="step3">Step 3: Job Details</h1>
        </div>
        <?php } ?>
        
        <div>
            <label>Type of therapy</label>
            <div class="form-field">
                <input type="text" value="" name="type_of_therapy" class="txt">
            </div>
        </div>

         <div>
            <label>Years in Practice</label>
            <div class="form-field">
            <select name="experience" class="txt">
                <option value="">Select years in practice</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>

        <div>
            <label>Certification / License information</label>
            <div class="form-field">
            <input type="text" value="" name="certification" class="txt">
            </div>
        </div>

        <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
        
        <div style="display:none">
            <label>Accepts insurance</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 2 ? 'checked' : '' ?> checked/> No</div>
            </div>
        </div>
        <div>
            <label> Payment Options(specify)</label>
            <div class="form-field">
                <input type="text" name="payment_option">
            </div>
        </div>
        <div>
            <label>Tell us about yourself (Short description not cv)</label>
            <div class="form-field">
            <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>

            <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
            <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


        <div>
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
</form>
</div>
