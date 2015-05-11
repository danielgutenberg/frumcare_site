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
						<div class="checkbox"><input type="checkbox" value="Special Needs Training" name="training[]"> <span>Special Needs Training</span></div>
                        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> <span>Nurse</span></div>
						<div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>																	
					</div>
				</div>
				<div>
					<label>Able to work with (check one or more)</label>
					<div class="form-field">						
						<div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]"> <span>Autism</span></div>
						<div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]"> <span>Down Syndrome</span></div>						
						<div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]"> <span>Handicapped</span></div>
						<div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>						
					</div>
				</div>

                <div class="rate-select">
                    <label>Rate</label>
                    <div class="form-field">
                        <select name="rate" class="required rate">
                            <option value="">Select rate</option>
                            <option value="5-10">$5-$10/Hr</option>
                            <option value="10-15">$10-$15/Hr</option>
                            <option value="15-25">$15-$25/Hr</option>
                            <option value="25-35">$25-$35/Hr</option>
                            <option value="35-45">$35-$45/Hr</option>
                            <option value="45-55">$45-$55/Hr</option>
                            <option value="55+">$55+/Hr</option>
                        </select>
                    </div>
                </div>
                <div>
                    <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
                    <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
                </div>
				<div>
					<label>When you need care (check one or more)</label>
					<div class="form-field">
						<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/>Immediate</div>
						<div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" autocomplete="off"/></div>
						<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
						<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
                        <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
                        <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
                        <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>						
						<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]"> <span>Weekends Fri./Sun.</span></div>						
						<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"> <span>Shabbos</span></div>						
						<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]"> <span>24 hr care</span></div>
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
            <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>
            </div>
        </div>
        <div class="refrence_file" style="display:none;">
            <label></label>
            <input type="hidden" id="file-name" name="file">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"></div>
        </div>
				
				<div>
					<label>Agree to background check?</label>
					<div class="form-field">
						<div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
						<div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
					</div>
				</div>

				<h2>Abilities(check if yes)</h2>
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
	       // if($('#ckbox1').is(':checked')){
	       //      $("#textbox1").show();
	       // }else{
	       //      $("#textbox1").hide();
	       //      $('#textbox1').val('');
	       // }

	        // $("#ckbox1").change(function(){
	        //     if($('#ckbox1').is(':checked')){
	        //         $("#textbox1").show();   
	        //     }else{
	        //         $("#textbox1").hide(); 
	        //         $('#textbox1').val('');       
	        //     }
	        // });

            $("#ref_check1").click(function(){
            	$(".refrence_file").show();   
       	 });

        $("#ref_check2").click(function(){
            //  	$.ajax({
			         // type: "POST",
			         // url: "<?php echo base_url(); ?>user/delete_ref_file",
			         // data: {file_name : $("#output").text()},
			         // success: function(r){
            //             $('#output').html(r);
			         // }
		          // });
                    $(".refrence_file").hide(); 
             		$('#file-name').val('');   
        });

		});
	</script>
	<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY Kiran
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>