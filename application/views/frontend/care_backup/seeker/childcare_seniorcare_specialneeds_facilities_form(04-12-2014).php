<?php
if(check_user()) {
    $u = get_user(check_user());
    $fn = $u['first_name'];
    $ln = $u['last_name'];
}
?>
<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-done">Start Getting Calls</li>
</ol>
<?php } ?>
<div class="container">
<?php if(($this->uri->segment(2) != 'new_profile')){?>
    <form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post">
        <?php }else{
    echo form_open('user/addprofileconfirm');
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
   }} ?>
        <div class="ad-form-container">
            <?php if($this->uri->segment(2) != 'new_profile'){?>
            <div>
                <h1 class="step2">Step 2: Job Details</h1>
            </div>
            <?php } ?>
            <div>
                <label>Name of organization</label>
                <div class="form-field">
                    <input type="text" name="organization_name" value="" class="required">
                </div>
            </div>
            <div>
                <label>Type of organization</label>
                <div class="form-field">
                    <select name="organization_type" class="required">
                        <option value="">Select type of organization</option>
                        <option value="Nursing home">Nursing home</option>
                        <option value="Preschool">Preschool</option>
                    </select> 
                </div>
            </div>
            <div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="first_name" placeholder="First name" class="required" value="<?php if(isset($fn)) echo $fn;?>"/>
                <?php /* <input type="text" name="last_name" placeholder="Last name" class="required" value="<?php if(isset($ln)) echo $ln;?>"/> */?>
                </div>
            </div>
            <div>
                <label>Address/ Location</label>
                <div>
                <input type="text" name="location" class="required" value=""/>
                </div>    
            </div>
            <div>
                <label>Phone</label>
                <div class="form-field">
                <input type="text" name="contact_number" class="required" value=""/>
                </div>
            </div>
            <div>
                <label>Position you are looking to fill</label>
                <div class="form-field">
                    <select name="job_postion" class="required">
                        <option value="">Select position</option>
                        <option value="Babysitter">Babysitter</option>
                        <option value="Nanny">Nanny</option>
                        <option value="Tutor">Tutor</option>
                    </select> 
                </div>
            </div>

            <div class="wages-select">
                <label>Wage</label>
                <div class="form-field">
                    <input type="text" value="" name="hourly_rate" id="wage" class="required">
                <select name="" onchange="change_wage(this.value)">
                    <option value="1">per hour</option>
                    <option value="2">per month</option>
                </select>
                </div>
            </div>

            <div>
                <label>Availability (check one or more)</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Occ./ reg./ one time" name="availability[]"> Occ./ reg./ one time</div>
                <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]"> Part Time</div>
                <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]"> Full Time</div>
                <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]"> Days/ hours</div>
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="st_date_disp" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" style="display: none;"/></div>
                </div>
            </div>
            <div>
                <label>Details</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"></textarea>
                </div>
            </div>


            <h2>Encouraged but not mandatory fields</h2>
            <div>
                <label>Languages necesary</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Spanish"> Spanish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Sign language"> Sign language</div>
                </div>
            </div>
            <div>
                <label>Must have following training/ certification</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
                <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
                <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]"> Nanny/ Babysitter course</div>
                <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
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
                    <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
                </select>
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
                <label>Smoking acceptable</label>
                <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
                </div>
            </div>
            <div>
                   <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
function change_wage(val){
    if(val==1){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'hourly_rate');
    }
    else if(val=2){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'monthly_rate');    
    }
}
</script>