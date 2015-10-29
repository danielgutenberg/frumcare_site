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
						<select name="experience" class="required">
							<option value="">Select years of experience</option>
							<option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
							<option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
							<option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
							<option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
							<option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
						</select>
					</div>
				</div>
				<div class="rate-select">
		            <label>Rate</label>
		            <div class="form-field">
		                <select name="rate" class="required rate">
		                    <option value="">Select rate</option>
		                    <option value="5-10">$5-$10 / Hr</option>
		                    <option value="10-15">$10-$15 / Hr</option>
		                    <option value="15-25">$15-$25 / Hr</option>
		                    <option value="25-35">$25-$35 / Hr</option>
		                    <option value="35-45">$35-$45 / Hr</option>
		                    <option value="45-55">$45-$55 / Hr</option>
		                    <option value="55+">$55+ / Hr</option>
		                </select>
                    </div>
        		</div>
                <div>
                    <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
                    <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
                </div>
		<div>
			<label>Availability</label>
			<div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/> Immediate</div>
				<div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]"> <span>Start Date</span> <input type="inbox" id="textbox1" value="" name="start_date"></div>
				<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
				<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>				
				<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>				
				<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]"> <span>Weekends Fri./Sun.</span></div>
                <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]"> <span>Saturday</span></div>
			</div>
		</div>
				<div>
					<label>Tell us about yourself (Short description not cv)</label>
					<div class="form-field">
						<textarea name="profile_description" class="txt"></textarea>
					</div>
				</div>
				<div>
					<label>References</label>
					<div class="form-field not-required">
					<div class="radio"><input type="radio" value="1" name="references" class="required" id="ref_check1" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?> /> Yes</div>
						<div class="radio"><input type="radio" value="2" name="references" class="required" id="ref_check2" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked /> No</div>
					</div>
				</div>
                <div class="refrence_file" style="display:none;">
		            <input type="hidden" id="file-name" name="file">
		            <button class="btn btn-primary" id="select_file">Select File</button>
		            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
		            <div id="output" class="loader"></div>
        		</div>
				
				<div style="display:none;">
					<label>Agree to background check?</label>
					<div class="form-field not-required">
						<div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
						<div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
					</div>
				</div>


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
	<script>
     $("#textbox1").ready(function(){        
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
		$(document).ready(function(){
		  //$("textbox1").hide();			
			// if($('#ckbox1').is(':checked')){
			// 	$("#textbox1").show();
			// }else{
			// 	$("#textbox1").hide();
			// 	$('#textbox1').val('');
			// }

			// $("#ckbox1").change(function(){
			// 	if($('#ckbox1').is(':checked')){
			// 		$("#textbox1").show();   
			// 	}else{
			// 		$("#textbox1").hide(); 
			// 		$('#textbox1').val('');       
			// 	}
			// });

			$('.charge').change(function(){
				$('.rate').attr('name',$(this).val());
			});
            $('#ref_check1').click(function(){
            $('.refrence_file').show();
        });

        $('#ref_check2').click(function(){
            $('.refrence_file').hide();
            $('#output').text('');
            $('#file-name').val('');
        });


		});
	</script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
