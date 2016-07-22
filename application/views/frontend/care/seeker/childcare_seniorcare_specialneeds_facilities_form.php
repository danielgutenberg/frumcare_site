
<?php
   if(check_user()) {
   $u = get_user(check_user());
   $fn = ucfirst($u['organization_name']);
   $recorddata= get_account_details();

   }
   ?>
<?php
   $user_detail = get_user(check_user());
   $address = $user_detail['location'];
   $phone = $user_detail['contact_number'];
   $age = $user_detail['age'];
   $neighbour = $user_detail['neighbour'];
   $zip = $user_detail['zip'];
   ?>
<?php
   if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
   <li class="progtrckr-done">Sign up</li>
   <li class="progtrckr-done">Job Details</li>
   <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } ?>
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

         if(isset($record)){
         $care = $record['submit_id'];
         }else{
         $care = $recorddata->care_type;;
         }
         ?>
      <div class="ad-form-container">
         <?php if($this->uri->segment(2) != 'new_profile'){?>
         <div>
            <h1 class="step2">Step 2: Job Details</h1>
         </div>
         <?php } ?>
         <div>
            <label>Name of Organization</label>
            <div class="form-field">
               <input type="text" name="organization_name" value="<?php if(isset($fn)) echo $fn;?>" class="required">
            </div>
         </div>

          <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
          <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


         <div>
            <label>Type of Organization</label>
            <div class="form-field">
               <?php
                  if($care == 25){?>
               <select name="organization_type" class="required">
                  <option value="">Select type of organization</option>
                  <option value="Day Care Center">Day Care Center</option>
                  <option value="Nursery/ Kindergarten">Nursery / Kindergarten</option>
                  <option value="Pre School">Pre School</option>
                  <option value="Day Camp">Day Camp</option>
                  <option value="Afternoon Activities Center">Afternoon Activities Center</option>
                  <option value="Other">Other</option>
               </select>
               <?php
                  }
                  if($care==26){?>
               <select name="organization_type" class="required">
                  <option value="">Select type of organization</option>
                  <option value="Assisted living residence">Assisted living residence</option>
                  <option value="Senior care center/ nursing home">Senior care center / nursing home</option>
                  <option value="Senior care agency">Senior care agency</option>
                  <option value="Rehab/therapy center">Rehab / therapy center</option>
                  <option value="Other">Other</option>
               </select>
               <?php
                  }
                  if($care==27){?>
               <select name="organization_type" class="required">
                  <option value="">Select type of organization</option>
                  <option value="Special needs care center">Special needs care center</option>
                  <option value="Special needs activities center">Special needs activities center</option>
                  <option value="Special needs agency">Special needs agency</option>
                  <option value="Rehab/ therapy center">Rehab / therapy center</option>
                  <option value="Other">Other</option>
               </select>
               <?php
                  }?>
            </div>
         </div>
         <div>
            <label>Contact name</label>
            <div class="form-field">
               <input type="text" name="name_of_owner" placeholder="name" class="txt" value="<?php echo isset($name)? $name:''; ?>"/>
            </div>
         </div>
         <?php 
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
         ?>
         <div>
            <label>Position you are looking to fill</label>
            <div class="form-field">
               <input type="text" name="job_position" class="txt"/>
            </div>
         </div>
         <?php $this->load->view('frontend/care/seeker/fields/wage'); ?>
         <div>
            <label>Job Type</label>
            <div class="form-field">
               <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]"> Full Time</div>
               <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]"> Part Time</div>
               <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]"> Substitute</div>
               <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
               <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input type="text" name="start_date" id="dateTextbox"/></div>
            </div>
         </div>
         <div>
            <label>Details</label>
            <div class="form-field">
               <textarea name="profile_description" class="txt"></textarea>
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
            <label>Must have following Training / Certification</label>
            <div class="form-field">
               <?php
                  if($care==25){ ?>
               <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
               <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
               <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]"> Nanny / Babysitter course</div>
               <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked"<?php } ?>> Nurse</div>
               <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$trainingtemp)){?> checked="checked"<?php } ?>> Other</div>
               <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
               <?php
                  }
                  if($care == 26){?>
               <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
               <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
               <div class="checkbox"><input type="checkbox" value="Senior care training" name="training[]"> Senior care training</div>
               <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> Nurse</div>
               <div class="checkbox"><input type="checkbox" value="Other" name="training[]"> Other</div>
               <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
               <?php
                  }
                  if(($care == 27)){?>
               <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
               <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
               <div class="checkbox"><input type="checkbox" value="Special needs training" name="training[]"> Special needs training</div>
               <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> Nurse</div>
               <div class="checkbox"><input type="checkbox" value="Other" name="training[]"> Other</div>
               <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
               <?php
                  }?>
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
         <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
               <select name="religious_observance" class="religious_observance">
                  <option value="">Select</option>
                  <option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
                  <option value="Orthodox/Modern Orthodox">Orthodox / Modern Orthodox</option>
                  <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
                  <option value="Not Necessary">Not necessary</option>
               </select>
            </div>
            <div style="display:none" class="not_jewish">
               <input type="checkbox" name="familarwithjewish" value="familarwithjewish">Familiar with Jewish Tradition
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
            <label>Upload Photo of Facility / Organization</label>
            <?php
               $photo_url = site_url("images/plus.png");
               if(check_user()) {
               $current_user = get_user(check_user());
               }
               ?>
            <div class="upload-photo">
               <input type="hidden" id="file-name" name="facility_pic" value="">
               <div id="output"><img id="uploadedfile" src="<?php echo $photo_url?>"></div>
               <a href="#" class="buttons btn-default" id="upload">Choose File</a>
               <input type="file" name="ImageFile" id="ImageFile" style="display: none;">
               <div class="loader"></div>
            </div>
            <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
         </div>
         <div>
            <input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
         </div>
      </div>
   </form>
</div>
<!-- FILE UPLOAD -->
<script type="text/javascript">
   var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
   var link = '<?php echo site_url("ad/upload_pp?files")?>';
   $('#upload,#output').click(function(e){
       e.preventDefault();
       $('#ImageFile').trigger('click');
   });
</script>
<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
