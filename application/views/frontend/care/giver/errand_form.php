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
				<?php $this->load->view('frontend/care/giver/fields/rate'); ?>
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
							$this->load->view('frontend/care/giver/fields/availability/weekend');
							$this->load->view('frontend/care/giver/fields/availability/shabbos');
						?>
					</div>
				</div>
				<?php
		            $this->load->view('frontend/care/giver/fields/about_yourself');
		            $this->load->view('frontend/care/giver/fields/references');
		            $this->load->view('frontend/care/giver/fields/background'); 
		        ?>


                <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
                <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


				
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

