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
					<label>Looking to work in</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Patients home" name="looking_to_work[]"> Patients home</div>
						<div class="checkbox"><input type="checkbox" value="Caregiving institution" name="looking_to_work[]"> Caregiving institution</div>
					</div>
				</div>
				<div>
					<label>Years of experience</label>
					<div class="form-field">
						<select name="experience" class="txt">
							<option value="">Select years of experience</option>
							<option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
							<option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
							<option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
							<option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
							<option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
						</select>
					</div>
				</div>
				<div>
					<label>Training</label>
					<div class="form-field">						
						<div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> <span>CPR</span></div>
						<div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> <span>First Aid</span></div>					
						<div class="checkbox"><input type="checkbox" value="Special Needs Training" name="training[]"> <span>Special Needs Training</span></div>
                        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> <span>Nurse</span></div>
						<div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>																	
					</div>
				</div>
				<div>
					<label>Able to work with</label>
					<div class="form-field">						
						<div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]"> <span>Autism</span></div>
						<div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]"> <span>Down Syndrome</span></div>						
						<div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]"> <span>Handicapped</span></div>
						<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>						
					</div>
				</div>

                <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
				<div>
					<label>Availability</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/>Immediate</div>
						<div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" autocomplete="off"/></div>
						<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
						<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
                        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
                        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
                        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>						
						<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]"> <span>Weekends Fri. / Sun.</span></div>						
						<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"> <span>Shabbos</span></div>						
						<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]"> <span>24 hr care</span></div>
					</div>
				</div>
				<div>
					<label>Tell us about yourself (Short description not cv)</label>
					<div class="form-field">
						<textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
					</div>
				</div>
				<?php $this->load->view('frontend/care/giver/fields/references') ?>


                <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
                <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>

				
				<div style="display:none;">
					<label>Agree to background check?</label>
					<div class="form-field">
						<div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
						<div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
					</div>
				</div>

				<h2>Abilities</h2>
				<div class="checkbox-wrap">
					<div>
						<input type="checkbox" value="1" name="driver_license"> I have a drivers license
					</div>
					<div>
						<input type="checkbox" value="1" name="vehicle"> I have a vehicle
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

