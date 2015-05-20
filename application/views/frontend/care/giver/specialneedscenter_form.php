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
        <h1 class="step3">Step 3: Organization Details</h1>
    </div>
    <?php } ?>
    
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
        <label>Year established</label>
        <div class="form-field">
        <select name="established" class="required">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>"><?php echo $i;?></option>
            <?php endfor;?>
        </select>
        </div>
    </div>

    <div>
        <label>Certification</label>
        <div class="form-field">
        <input type="text" value="" name="certification" class="required">
        </div>
    </div>
     <div>
        <label>Languages Spoken</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>    
        </div>
    </div>
    <div>
        <label>Specialize in</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]"> <span>Autism</span></div>
            <div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]"> <span>Down Syndrome</span></div>
            <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]"> <span>Wheelchair bound</span></div>
            <div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]"><span>Handicapped</span></div>
        </div>
    </div>
   <div>
        <label>Observance in facility</label>
        <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" />Shul on premises</div>
        <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" />Kosher kitchen</div>
        <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" />Kosher food available</div>
        <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" />Shabbos observant facility</div>
    </div>
    <div>
        <label>Number of patients</label>
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
                <label>Cost</label>
                <div class="form-field">
                    <input type="text" name="rate" value="">
                </div>
            </div>
    <div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
    </div>
        
    <div>
        <label>Tell us about your organization / facilities / staff</label>
        <div class="form-field">
        <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>

    

    <?php $photo_url = site_url("images/plus.png"); ?>                   
                    
            <div class="upload-photo" style="display:none;">
                <h2>Upload Photo of Facility / Organization</h2>
                <input type="hidden" id="file-name" name="facility_pic" value="">
                <div id="output"><img src="<?php echo $photo_url?>"></div>
                <label>Browse your computer to select a file to upload</label>
                <button class="btn btn-default" id="upload">Choose File</button>
                <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
            </div>



    <div>
        <label> Payment Options(specify)</label>
        <div class="form-field">
            <input type="text" name="payment_option" value="">
        </div>
    </div>

    <!--<div style="display:none">-->
    <!--    <label>Your references details</label>-->
    <!--    <div class="form-field">-->
    <!--    <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>-->
    <!--    </div>-->
    <!--</div>-->
        <br/ >
    <div>
          <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
    </div>

    </div>
    </form>
</div>

<script type="text/javascript">
 $('#ref_check1').click(function(){
        $('.refrence_file').show();
    });

    $('#ref_check2').click(function(){
        $('.refrence_file').hide();
        $('#output').text('');
        $('#file-name').val('');
    });
 $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload,,#output').trigger('click');
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
</script>