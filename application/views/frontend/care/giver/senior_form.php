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
					<label>Looking to work in</label>
					<div class="form-field">
						<?php 
		                    $this->load->view('frontend/care/giver/fields/work_location/home_of_senior');
		                    $this->load->view('frontend/care/giver/fields/work_location/live_in');
		                    $this->load->view('frontend/care/giver/fields/work_location/live_out');
		                    $this->load->view('frontend/care/giver/fields/work_location/caregiving_institution');
		                ?>
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
						<div class="checkbox"><input type="checkbox" value="Senior Care Training" name="training[]"> <span>Senior Care Training </span></div>
						<div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> <span>Nurse</span></div>
						<div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>						
					</div>
				</div>
				
				<div>
					<label>Conditions able to work with</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]"> <span>Alz. / Dementia</span></div>
						<div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]"> <span>Sight loss</span></div>
						<div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]"> <span>Hearing loss</span></div>
						<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
						<div class="checkbox"><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]"><span>Able To Tend To Personal Hygiene of Senior</span></div>	
					</div>
				</div>
				<div>
					<label>Gender able to work with</label>
					<div class="form-field">
						<div class="radio"><input type="radio" value="1" name="gender_of_caregiver"> Male</div>
						<div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
	                    <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" checked> Any</div>
					</div>
				</div>

				<div>
					<label>Availability</label>
					<div class="form-field">
						<?php 
							$this->load->view('frontend/care/giver/fields/availability/immediate');
							$this->load->view('frontend/care/giver/fields/availability/start_date');
							$this->load->view('frontend/care/giver/fields/availability/occasional');
							$this->load->view('frontend/care/giver/fields/availability/regular');
							$this->load->view('frontend/care/giver/fields/availability/morning');
							$this->load->view('frontend/care/giver/fields/availability/afternoon');
							$this->load->view('frontend/care/giver/fields/availability/evening');
							$this->load->view('frontend/care/giver/fields/availability/overnight');
							$this->load->view('frontend/care/giver/fields/availability/weekend');
							$this->load->view('frontend/care/giver/fields/availability/shabbos');
							$this->load->view('frontend/care/giver/fields/availability/twenty_four_hours');
						?>
					</div>
				</div>
				<?php
					$this->load->view('frontend/care/giver/fields/rate');
		            $this->load->view('frontend/care/giver/fields/about_yourself');
		            $this->load->view('frontend/care/giver/fields/references');
		            $this->load->view('frontend/care/giver/fields/background'); 
		        ?>
					
				<h2>Abilities and Skills</h2>
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
