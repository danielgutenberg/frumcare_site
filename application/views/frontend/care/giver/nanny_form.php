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
					<label>Looking to work as</label>
					<div class="form-field">
						<?php 
		                    $this->load->view('frontend/care/giver/fields/work_location/live_in');
		                    $this->load->view('frontend/care/giver/fields/work_location/live_out');
		                ?>
					</div>
				</div>
				<div>
					<label>Number of children willing to care for</label>
					<div class="form-field">
						<input type="text" value="" name="number_of_children" class="txt number"/>
                        <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]"/>Twins</div>
                        <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]"/>Triplets</div>
					</div>
				</div>
				<div>
					<label>Ages of children willing to care for</label>
					<div class="form-field">
                        <div class="checkbox"><input type="checkbox" name="age_group[]" value="0-3"> 0-3 months</div>
                        <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-6"> 3-6 months</div>
                        <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-12"> 6-12 months</div>
				        <div class="checkbox"><input type="checkbox" name="age_group[]" value="1-3"> 1 to 3 years</div>				        
				        <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-5"> 3 to 5 years</div>				        
				        <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-11"> 6 to 11 years</div>				        
				        <div class="checkbox"><input type="checkbox" name="age_group[]" value="13"> 12+ years</div>
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
						<div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]"> <span>Nanny / Babysitter Course</span></div>
						<div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>					
					</div>
				</div>

				<div class="rate-select">
	                <label>Rate</label>
	                <div class="form-field">
	                    <select name="currency" class="txt rate">
	            		  <option value="">Select currency</option>
	            		  <!--<option value="AUD">Australian Dollar</option>-->
	            		  <!--<option value="BRL">Brazilian Real </option>-->
	            		  <!--<option value="CAD">Canadian Dollar</option>-->
	            		  <!--<option value="CZK">Czech Koruna</option>-->
	            		  <!--<option value="DKK">Danish Krone</option>-->
	            		  <!--<option value="EUR">Euro</option>-->
	            		  <!--<option value="HKD">Hong Kong Dollar</option>-->
	            		  <!--<option value="HUF">Hungarian Forint </option>-->
	            		  <option value="ILS" <?php if($currency == 'ILS') {?>selected<?php } ?>>&#8362; Israeli New Sheqel</option>
	            		  <!--<option value="JPY">Japanese Yen</option>-->
	            		  <!--<option value="MYR">Malaysian Ringgit</option>-->
	            		  <!--<option value="MXN">Mexican Peso</option>-->
	            		  <!--<option value="NOK">Norwegian Krone</option>-->
	            		  <!--<option value="NZD">New Zealand Dollar</option>-->
	            		  <!--<option value="PHP">Philippine Peso</option>-->
	            		  <!--<option value="PLN">Polish Zloty</option>-->
	            		  <!--<option value="GBP">Pound Sterling</option>-->
	            		  <!--<option value="SGD">Singapore Dollar</option>-->
	            		  <!--<option value="SEK">Swedish Krona</option>-->
	            		  <!--<option value="CHF">Swiss Franc</option>-->
	            		  <!--<option value="TWD">Taiwan New Dollar</option>-->
	            		  <!--<option value="THB">Thai Baht</option>-->
	            		  <!--<option value="TRY">Turkish Lira</option>-->
	            		  <option value="USD" <?php if($currency == 'USD') {?>selected<?php } ?>>&#36; U.S. Dollar</option>
	                    </select>
	                </div>
	                
	                
	                <div class="form-field">
	                    <select name="rate" class="txt">
	                        <option value="">Select rate</option>
	                        <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>5-10 / Hr</option>
	                        <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>10-15 / Hr</option>
	                        <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>15-25 / Hr</option>
	                        <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>25-35 / Hr</option>
	                        <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>35-45 / Hr</option>
	                        <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>45-55 / Hr</option>
	                        <option value="56" <?php echo isset($rate) && $rate == '56' ? 'selected' : '' ?>>55+ / Hr</option>
	                    </select>                                  
	                </div>
	            </div>
	            <div class="form-field">
	                <div class="checkbox"><input type="checkbox" value="2" name="rate_type[]" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php } ?>>Monthly Rate Available</div>
	                <div class="checkbox"><input type="checkbox" value="3" name="rate_type[]" <?php if(in_array('3',$rate_type)){?> checked="checked" <?php } ?>>Room and Board Available</div>
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
							$this->load->view('frontend/care/giver/fields/availability/weekend');
							$this->load->view('frontend/care/giver/fields/availability/shabbos');
							$this->load->view('frontend/care/giver/fields/availability/night_nurse');
							$this->load->view('frontend/care/giver/fields/availability/vacation_sitter');
						?>
					</div>
				</div>
				<?php
		            $this->load->view('frontend/care/giver/fields/about_yourself');
		            $this->load->view('frontend/care/giver/fields/references');
		            $this->load->view('frontend/care/giver/fields/background'); 
		        ?>

				<h2>Abilities and Skills</h2>
				<div class="checkbox-wrap">
					<div>
						<input type="checkbox" value="1" name="driver_license"> I have a Drivers license
					</div>
					<div>
						<input type="checkbox" value="1" name="vehicle"> I have a Vehicle
					</div>
					<div>
						<input type="checkbox" value="1" name="pick_up_child"> Able to pick up kids from school
					</div>
					<div>
						<input type="checkbox" value="1" name="cook"> Able to cook and prepare food
					</div>
					<div>
						<input type="checkbox" value="1" name="basic_housework"> Able to do housework / cleaning
					</div>
					<div>
						<input type="checkbox" value="1" name="homework_help"> Able to help with homework
					</div>
					<div>
						<input type="checkbox" value="1" name="bath_children"> Able to bathe children
					</div>
                    <div>
						<input type="checkbox" value="1" name="bed_children"> Able to put children to bed
					</div>
                    <div>
						<input type="checkbox" value="1" name="sick_child_care"> Able to care for sick child
					</div>
					<div>
						<input type="checkbox" value="1" name="on_short_notice"> Available on short notice
					</div>

                    <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
                    <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>

				<div>
					<input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
				</div>
			</div>
			</div>
		</form>
	</div>