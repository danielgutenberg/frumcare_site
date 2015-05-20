<?php 
if(($this->uri->segment(2) != 'new_profile')){?> 
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-done">Organization Details</li>    
</ol> 

<?php } ?>

<div class="container">
    <?php if(($this->uri->segment(2) != 'new_profile')){?>
    <form action="<?php echo site_url();?>ad/savejobdetails" method="post">

<?php }else{ //new field
	echo form_open('user/addprofileconfirm');
    if(!empty($record)){
        echo form_hidden('account_category',$record['ac_type']);
        echo form_hidden('care_type',$record['submit_id']);
        echo form_hidden('account_type',$record['account_type']);
        echo form_hidden('organization_care',$record['organization_care']);
    }} ?>
<div class="ad-form-container float-left">
     <?php if($this->uri->segment(2) != 'new_profile'){?>  
     <div>
        <h1 class="step3">Step 3: Organization Details</h1>
    </div>
    <?php } ?>
    <!--<div>-->
    <!--    <label>Year established</label>-->
    <!--    <div class="form-field">-->
    <!--        <select name="established" class="required">-->
    <!--            <option value="">Select year established</option>-->
    <!--            <?php for($i=1950;$i<=date('Y');$i++):?>-->
    <!--                <option value="<?php //echo $i?>"><?php //echo $i;?></option>-->
    <!--            <?php endfor;?>-->
    <!--        </select>-->
    <!--    </div>-->
    <!--</div>-->
    
    <?php if($this->uri->segment(2) == 'new_profile') { ?>
            <div>
            <label>Name of Organization</label>
            <div class="form-field">
               <input type="text" name="organization_name" value="<?php if(isset($fn)) echo $fn;?>" class="required">
            </div>
         </div>
            <div>
            <label>Contact name</label>
            <div class="form-field">
               <input type="text" name="name" placeholder="name" class="required" value="<?php echo isset($name)? $name:''; ?>"/>
            </div>
         </div>
         <div>
            <label>Location</label>
            <div id="locationField">
               <input type="hidden" id="lat" name="lat"/>
               <input type="hidden" id="lng" name="lng"/> 
               <input type="text" name="location" class="required" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>"/>
            </div>
         </div>
         <div>
            <label>Neighborhood / Street</label>
            <div>
               <input type="text" name="neighbour" class="required" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
            </div>
         </div>         
         <div>
            <label>Phone</label>
            <div class="form-field">
               <input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
            </div>
         </div> <?php }?>
    
    <div>
        <label>We clean</label>
        <div class="form-field">
            <div class="first-block-checkbox">
                <div><input type="checkbox" value="Home" name="looking_to_work[]"> <span>Homes</span></div>
                <div><input type="checkbox" value="Business" name="looking_to_work[]"> <span>Office / Business</span></div>
            </div>

        </div>
    </div>
    <div>
        <label>Specialize in</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]"> <span>Dishes</span></div>
            <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]"> <span>Floors</span></div>
            <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]"> <span>Windows</span></div>
            <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]"> <span>Laundry</span></div>
            <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]"> <span>Folding</span></div>
            <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]"> <span>Ironing</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]"> <span>Cleaning and Dusting Furniture</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]"><span>Cleaning Refrigerator / Freezer</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]"><span>Cleaning Oven / Stove</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
            <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]"><span>Able to watch children as well</span></div>                    
        </div>            
    </div>
    <div>
        <label>Days / Hours</label>
        <div class="form-field">
            Days
            <br>
            <input type="text" name="days_from" style="width:25%"> - <input type="text" name="days_to" style="width:25%">
            <br>
            Hours
            <br>
            <input type="text" name="hours_from" style="width:25%"> - <input type="text" name="hours_to" style="width:25%">
            <br>
            <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1"> Flexible Hours</div>
        </div>
    </div>

    <div class="rate-select">
        <label>Rate</label>
        <div class="form-field">
            <select name="rate" class="required rate">
                <option value="">Select rate</option>
                <option value="5-10">$5-$10 / Hr</option>
                <option value="10-15">$5-$10 / Hr</option>
                <option value="15-25">$15-$25 / Hr</option>
                <option value="25-35">$25-$35 / Hr</option>
                <option value="35-45">$35-$45 / Hr</option>
                <option value="45-55">$45-$55 / Hr</option>
                <option value="55+">$55+ / Hr</option>
            </select>
        </div>
    </div>
    <div>
        <!--<label>Check one or more</label>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
    </div>  
    <div>
        <!--	<div>-->
        <!--    <label>References</label>-->
        <!--    <div class="form-field not-required">-->
        <!--    <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>-->
        <!--    <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="refrence_file" style="display:none;">-->
        <!--    <label></label>-->
        <!--    <input type="hidden" id="file-name" name="file">-->
        <!--    <button class="btn btn-primary" id="select_file">Select File</button>-->
        <!--    <input type="file" name="file_upload" id="file_upload" style="display: none;"> -->
        <!--    <div id="output" class="loader"></div>-->
        <!--</div>-->
        <label>Tell us about your organization</label>
        <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>
    <?php   $photo_url = site_url("images/plus.png");  ?>                   
                    
            <!--<div class="upload-photo">-->
            <!--    <h2>Upload photo of facility / organization</h2>-->
            <!--    <input type="hidden" id="file-name" name="profile_picture" value="">-->
            <!--    <div id="output"><img src="<?php echo $photo_url?>"></div>-->
            <!--    <label>Browse your computer to select a file to upload</label>-->
            <!--    <button class="btn btn-default" id="upload">Choose File</button>-->
            <!--    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>-->
            <!--    <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>-->
            <!--</div>-->
    <div>
        <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
    </div>
</div>
</form>
</div>

 <script type="text/javascript">
 $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload,#output').trigger('click');
        $(document).on('change', '#file_upload', prepareUpload);
        
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
</script>