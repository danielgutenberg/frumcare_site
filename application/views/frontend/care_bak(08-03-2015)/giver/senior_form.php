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
					<label>Looking to work in (check one or more)</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Home of senior" name="looking_to_work[]"> <span>Home of senior</span></div>
						<div class="checkbox"><input type="checkbox" value="Live In" name="looking_to_work[]"/> <span>Live In</span></div>
						<div class="checkbox"><input type="checkbox" value="Live Out" name="looking_to_work[]"> <span>Live Out</span></div>
                        <div class="checkbox"><input type="checkbox" value="Caregiving institude" name="looking_to_work[]"> <span>Caregiving Institution </span></div>
					</div>
				</div>
				<div>
					<label>Years of experience</label>
					<div class="form-field">
						<select name="experience" class="required">
							<option value="">Select years of experience</option>
							<option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
							<option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
							<option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
							<option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
							<option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
						</select>
					</div>
				</div>
				<div>
					<label>Training (check one or more)</label>
					<div class="form-field">						
						<div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> <span>CPR</span></div>
						<div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> <span>First Aid</span></div>						
						<div class="checkbox"><input type="checkbox" value="Senior Care Training" name="training[]"> <span>Senior Care Training </span></div>
						<div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> <span>Nurse</span></div>
						<div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>						
					</div>
				</div>
				<div>
					<label>Able to work with (check one or more)</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]"> <span>Alz./ Dementia</span></div>
						<div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]"> <span>Sight loss</span></div>
						<div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]"> <span>Hearing loss</span></div>
						<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
						<div class="checkbox"><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]"><span>Able To Tend To Personal Hygiene of Senior</span></div>	
					</div>
				</div>
				<div>
            <label>Rate</label>
            <div class="form-field">
                <select name="rate" class="required rate">
                    <option value="">Select rate</option>
                    <option value="5-10">$5-$10</option>
                    <option value="10-15">$5-$10</option>
                    <option value="15-25">$15-$25</option>
                    <option value="25-35">$25-$35</option>
                    <option value="35-45">$35-$45</option>
                    <option value="45-55">$45-$55</option>
                    <option value="55+">$55+</option>
                </select>
                <br/>
                	<label>Check one or more</label>
                <br/>
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate</div>

            </div>
        </div>
				<div>
					<label>Tell us about yourself</label>
					<div class="form-field">
						<textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
					</div>
				</div>
			 <div>
            <label>References</label>
            <div class="form-field not-required">
            <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required" /> Yes</div>
            <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" checked /> No</div>
            </div>
        </div>

        <div class="refrence_file" style="display:none;">
            <label></label>
            <input type="hidden" id="file-name" name="file" />
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;" /> 
            <div id="output" class="loader"></div>
        </div>
				<div>
					<label>Agree to background check?</label>
					<div class="form-field not-required">
						<div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
						<div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
					</div>
				</div>
				<div>
					<label>When you need care (check one or more)</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/>Immediate</div>
						<div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1"/></div>
						<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
						<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
                        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
                        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
                        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>
                        <div class="checkbox"><input type="checkbox" value="Overnight" name="availability[]"><span>Overnight</span></div>						
						<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]"> <span>Weekends Fri./Sun.</span></div>						
						<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"><span>Shabbos</span></div>						
						<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]"> <span>24 hr care</span></div>						
					</div>
				</div>	
				<h2>Abilities (check if yes)</h2>
				<div class="checkbox-wrap">
					<div>
						<input type="checkbox" value="1" name="driver_license"> Drivers license
					</div>
					<div>
						<input type="checkbox" value="1" name="vehicle"> Vehicle
					</div>
					<div>
						<input type="checkbox" value="1" name="on_short_notice"> Available on short notice
					</div>
					<div>
						<input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
					</div>
				</div>

			</div>
		</form>
	</div>
    <script>
     $("#textbox1").ready(function(){        
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
    </script>
