<?php
if(check_user()) {
    $u = get_user(check_user());
    $fn = ucfirst($u['name']);
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
    echo form_hidden('organization_care',$record['organization_care']);
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
                        <option value="Day Care Center">Day Care Center</option>
                        <option value="Nursery/ Kindergarten">Nursery/ Kindergarten</option>
                        <option value="Day Camp">Pre School</option>
                        <option value="">Day Camp</option>
                        <option value="Afternoon Activities Center">Afternoon Activities Center</option>
                        <option value="Other">Other</option>
                    </select> 
                </div>
            </div>
            <div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="name" placeholder="name" class="required" value="<?php if(isset($fn)) echo $fn;?>"/>
                </div>
            </div>
            <div>
                <label>Location</label>
                <div>
                    <input type="text" name="location" class="required" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" />
                </div>    
            </div>
             <div>
            <label>Neighborhood</label>
            <div>
            <input type="text" name="neighbour" class="required" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
            </div>    
        </div>
         <div>
            <label>Zip</label>
            <div>
            <input type="text" name="zip" class="required" value="<?php echo isset($zip)? $zip:''; ?>"/>
            </div>    
        </div>
		<div>
			<label>Phone</label>
			<div class="form-field">
				<input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
			</div>
		</div>
            <div>
                <label>Position you are looking to fill</label>
                <div class="form-field">
                    <input type="text" name="job_position" class="required"/>
                </div>
            </div>

            <div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
                <select name="rate" class="required rate">
                    <option value="">Select wage</option>
                    <option value="5-10">$5-$10</option>
                    <option value="10-15">$5-$10</option>
                    <option value="15-25">$15-$25</option>
                    <option value="25-35">$25-$35</option>
                    <option value="35-45">$35-$45</option>
                    <option value="45-55">$45-$55</option>
                    <option value="55+">$55+</option>
                </select>
                 <select name="rate_type">
                    <option value="1" selected="selected">Per Hour</option>
                    <option value="2">Per Month</option>
                </select>
            </div>
        </div>
       

            <div>
                <label>Job Type(check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]"> Part Time</div>
                    <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]"> Substitute</div>
                    <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]"> Full Time</div>
                    <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]"> Days/ hours</div>
                    <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                    <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" style="display: none;"/></div>
                Day Hours
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%"> to  <input type="text" name="sunday_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%"> to  <input type="text" name="mid_days_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time"> to <input type="text" name="friday_to" class="time" style="width:25%">
                 <br>
                 Vacation Days (Please specify vacation days)
                 <br>
                 <input type="text" name="vacation_days" value="" placeholder="Vacation Days">
                <br>
                
                </div>
            </div>
            <div>
                <label>Details</label>
                <div class="form-field">
                    <textarea name="profile_description" class="required"></textarea>
                </div>
            </div>


            <h2>Additional Requirements</h2>
            <div>
                <label>Languages necesary</label>
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
                <label>Must have following training/ certification</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
                <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
                <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]"> Nanny/ Babysitter course</div>
                <div class="checkbox"><input type="checkbox" value="Degree" name="training[]"> Degree</div>
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
            <select name="religious_observance" class="religious_observance">
               <option value="">Select</option>
				<option value="Yeshivish/ Chasidish">Yeshivish/ Chasidish</option>
				<option value="Modern Orthodox">Modern orthodox</option>
				<option value="Other">Other</option>
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
            <label>Upload Photo of Facility</label>
               <div class="refrence_file">
            <label></label>
            <input type="hidden" id="file-name" name="file">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"></div>
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
<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY CHAND
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<link href="<?php echo site_url();?>css/jquery-ui.css" type="text/css" rel="stylesheet" />