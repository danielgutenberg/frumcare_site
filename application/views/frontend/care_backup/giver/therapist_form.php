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
            <label>Type of therapy</label>
            <div class="form-field">
                <input type="text" value="" name="type_of_therapy" class="required">
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
            <label>Training/ Certification</label>
            <div class="form-field">
            <input type="text" value="" name="certification" class="required">
            </div>
        </div>
       
        <div>
            <label>License information</label>
            <div class="form-field">
            <input type="text" value="" name="licence_information" class="required">
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

       <!--  <div>
            <label></label>
            <div class="form-field">
           
            </div>
        </div> -->

        <div>
            <label>Accepts insurance</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 2 ? 'checked' : '' ?> checked/> No</div>
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
         <div style="display:none">
                <label>Your references details</label>
                <div class="form-field not-required">
                <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
                </div>
            </div>
        <div>
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
</form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.chargetype').change(function(){
            $('.rate').attr('name',$(this).val());
        });
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
