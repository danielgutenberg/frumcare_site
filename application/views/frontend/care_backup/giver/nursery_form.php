
<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Your Details</li>
    <li class="progtrckr-done">Start Getting Calls</li>
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
                <label>Looking to work for (check one or more)</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Boys" name="looking_to_work[]"> Boys</div>
                <div class="checkbox"><input type="checkbox" value="Girls" name="looking_to_work[]"> Girls</div>
                <div class="checkbox"><input type="checkbox" value="Both" name="looking_to_work[]"> Both</div>
                </div>
            </div>
            <div>
                <label>Ages of children willing to care for</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]"> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]"> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]"> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1" name="age_group[]"> 1 year</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"> 1 to 3 years</div>
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"> 3 to 5 years</div>
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"> 6 to 11 years</div>
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"> 12+ years</div>
                </div>
            </div>
            <div>
                <label>Number of children in group</label>
                <div class="form-field">
                <input type="text" value="" name="number_of_children" class="required number">
                </div>
            </div>

            <div>
                <label>Number of staff</label>
                <div class="form-field">
                <input type="text" value="" name="number_of_staff" class="required number">
                </div>
            </div>
            <div>
                <label>Training (check one or more)</label>
                <div class="form-field">
                    <div class="first-block-checkbox">
                <div><input type="checkbox" value="CPR" name="training[]"> <span>CPR</span></div>
                <div><input type="checkbox" value="First Aid" name="training[]"> <span>First Aid</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]"> <span>Nanny/ Babysitter Course</span></div>
                <div><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>
                </div>
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
                <label>Cost</label>
                <div class="form-field">
                <select name="hourly_rate" class="required">
                <option value="">Select cost</option>
                <option value="5-10" <?php echo isset($hr_rate) && $hr_rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
                <option value="10-15" <?php echo isset($hr_rate) && $hr_rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
                <option value="15-25" <?php echo isset($hr_rate) && $hr_rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
                <option value="25-35" <?php echo isset($hr_rate) && $hr_rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
                <option value="35-45" <?php echo isset($hr_rate) && $hr_rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
                <option value="45-55" <?php echo isset($hr_rate) && $hr_rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
                <option value="55+" <?php echo isset($hr_rate) && $hr_rate == '55+' ? 'selected' : '' ?>>$55+</option>
                </select>
                </div>
            </div>
            <div>
                <label>Availability (check one or more)</label>
                <div class="form-field">
                   
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
                <br>

                 <input type="hidden" id="pdf-name" name="pdf">
                <button class="btn btn-primary" id="pdf_file">Please select pdf file</button>
                <input type="file" name="pdf_upload" id="pdf_upload" style="display: none;"> 
                <div id="output1" class="loader1"></div>

                
            
                 <div class="checkbox"><input type="checkbox" name="extended_hrs_available" value="1"> Extended Hours Available</div>
                 <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1"> Flexible Hours</div>

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
                <div class="radio"><input type="radio" value="1" id="ref_check1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
                <div class="radio"><input type="radio" value="2" id="ref_check2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>
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
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $('#ref_check1').click(function(){
        $('.refrence_file').show();
    });

    $('#ref_check2').click(function(){
        $('.refrence_file').hide();
        $('#output').text('');
        $('#file-name').val('');
    });

    //$('.time').timepicker();
});
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
        $(document).on('change', '#file_upload', prepareUpload);
        
    });//CODE BY Kiran
    
    $('#pdf_file').click(function(e){
        e.preventDefault();
        $('#pdf_upload').trigger('click');
        $(document).on('change', '#pdf_upload', prepareUpload1);
    });
    
     function prepareUpload(event){
         var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link = '<?php echo site_url("user/uploadfile?files")?>';

        var files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output').html(data.html);
                        $('.loader').html('');
                        $('#file-name').val(data.files);    
                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }
    // try uploadind pdf file

    function prepareUpload1(event){
        var loader1 = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link1 = '<?php echo site_url("user/uploadfile?files")?>';

        var validExtensions = ['pdf','PDF']; //array of valid extensions
        var fileName = $('#pdf_upload').val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
           alert("Invalid file type. Please upload pdf file only");
           return false;
        }


        var files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link1,
            type: 'POST',
            beforesend: $('.loader1').html(loader1),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output1').html(data.html);
                        $('.loader1').html('');
                        $('#pdf-name').val(data.files);    
                    }
                    else{
                        $('#output1').html(data.files + ' selected');
                        $('#pdf-name').val(data.files);
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }

</script>
