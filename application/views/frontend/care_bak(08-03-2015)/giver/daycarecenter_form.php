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
    <form action ="<?php echo site_url();?>ad/savejobdetails" method="post">
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
                <label>For (check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Boys" name="looking_to_work[]"> <span>Boys</span></div>
                    <div class="checkbox"><input type="checkbox" value="Girls" name="looking_to_work[]"> <span>Girls</span></div>
                    <div class="checkbox"><input type="checkbox" value="Both" name="looking_to_work[]"> <span>Both</span></div>
                </div>
            </div>  
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
                <label>Languages Spoken</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew">Hebrew</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian">Russian</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="French">French</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Other">Other</div>
                </div>
            </div>

            <div>
                <label>Number of children in group</label>
                <div class="form-field">
                <input type="text" value="" name="number_of_children" class="required number">
                </div>
            </div>

            <div>
                <label>Number of staff per group</label>
                <div class="form-field">
                <input type="text" value="" name="number_of_staff" class="required number">
                </div>
            </div>
            

            

            <div>
            <label>Cost</label>
            <div class="form-field">
                <input type="text" name="rate" value="">
            </div>
        </div>
       
            <div>
                <label>Days/ Hours</label>
                <div class="form-field">
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%"> to  <input type="text" name="sunday_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%"> to  <input type="text" name="mid_days_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time"> to <input type="text" name="friday_to" class="time" style="width:25%">
                 <div class="checkbox"><input type="checkbox" name="extended_hrs_available" value="1"> Extended Hours Available</div>
                 <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1"> Flexible Hours</div>
                 <br>
                 Vacation Days (Please specify vacation days)
                 <br>
                 <input type="text" name="vacation_days" value="" placeholder="Vacation Days">

                <br>
                <br>

                <input type="hidden" id="pdf-name" name="pdf">
                <button class="btn btn-primary" id="pdf_file">Please select pdf file</button>
                <input type="file" name="pdf_upload" id="pdf_upload" style="display: none;"> 
                <div id="output1" class="loader1"></div>
            
                </div>
            </div>
            
            <div>
                <label>Tell us about organization/facilities/activities</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>
            <div>
                <label>References(Option to Upload)</label>
                <div class="form-field">
                <div class="radio"><input type="radio" value="1" name="references" id="ref_check1" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
                <div class="radio"><input type="radio" value="2" name="references" id="ref_check2" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>
                </div>
            </div>

            <div class="refrence_file" style="display:none;">
                <label></label>
                <input type="hidden" id="file-name" name="file">
                <button class="btn btn-primary" id="select_file">Select File</button>
                <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
                <div id="output" class="loader"></div>
            </div>

            <div style="display:none">
                <label>Your references details</label>
                <div class="form-field">
                <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
                </div>
            </div>
            <br/>
            <div>
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
   </form>
</div>