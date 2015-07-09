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
    $this->load->helper('form');
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
                <div class="first-block-checkbox"><div><input type="checkbox" value="My home" name="looking_to_work[]"> <span>My home</span></div>
                <div><input type="checkbox" value="Child's home" name="looking_to_work[]"> <span>Child's home</span></div></div>
                <div class="first-block-checkbox"><div><input type="checkbox" value="Caregiving institution" name="looking_to_work[]"> <span>Caregiving institution</span></div>
                <div>
                    <input type="checkbox" value="Mother's Helper" name="looking_to_work[]"> <span>Mother's Helper<span>
                </div>
                </div>
            </div>
        </div>
        <div>
            <label>Number of children willing to care for</label>
            <div class="form-field">
                <input type="text" value="" name="number_of_children" class="required number">
                <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]"/>Twins</div>
                <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]"/>Triplets</div>
            </div>
        </div>
        <div>
            <label>Ages of children willing to care for(Check one or more)</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]"> 6-12 months</div>
                <div class="checkbox"><input type="checkbox" value="1" name="age_group[]"> 1 Year</div>
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"> 12+ years</div>
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
            <div class="first-block-checkbox"><div><input type="checkbox" value="CPR" name="training[]"> <span>CPR</span></div>
            <div><input type="checkbox" value="First Aid" name="training[]"> <span>First Aid</span></div></div>
            <div class="first-block-checkbox"><div><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]"> <span>Nanny/ Babysitter Course</span></div>
            <div><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>
            </div>
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
            </div>
        </div>
        <select name="rate_type">
            <option value="1" selected="selected">Hourly Rate</option>
            <option value="2">Monthly Rate</option>
        </select>
        <div>
            <label>Availability (check one or more)</label>
            <div class="form-field">
				<div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/> Immediate</div>
				<div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1" style="display: none;"/></div>
				<div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
				<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
				<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
				<div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
				<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>
				<div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]"> <span>Weekends fri/sun</span></div>
                <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"> <span>Shabbos</span></div>
                <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]"> <span>Vacation Sitter</span></div>
				<div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]"> <span>Night Nurse</span></div>
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
            <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required"/> Yes</div>
            <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" checked/> No</div>
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
            <div class="form-field not-required">
            <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
            </div>
        </div>
        <div>
            <label>Agree to background check?</label>
            <div class="form-field not-required">
            <div class="radio"><input type="radio" value="1" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
            </div>
        </div>

        <h2>Encouraged but not mandatory fields (check if yes)</h2>
<div class="checkbox-wrap">
        <div class="checkbox">
            <input type="checkbox" value="1" name="driver_license"> <label>I have a Drivers license</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="vehicle"> <label>I have a Vehicle</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="pick_up_child"> <label>Able to pick up kids from school</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="cook"> <label>Able to cook and prepare food</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="basic_housework"> <label>Able to do light housework/ cleaning</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="homework_help"> <label>Able to help with homework</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="sick_child_care"> <label>Able to care for sick child</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="on_short_notice"> <label>Available on short notice</label>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
        </div>
    </div>


</form>
</div>
<script>
$(document).ready(function(){
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

       if($('#ckbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            $("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                $("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });

        $('.chargetype').change(function(){
            if($(this).val() == 'hourly_rate')
                $('.rate').attr('name','hourly_rate');

            if($(this).val() == 'monthly_rate')
                $('.rate').attr('name','monthly_rate');
            
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
