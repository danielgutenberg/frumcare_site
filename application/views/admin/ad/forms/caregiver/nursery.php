<?php 
	if(isset($detail)){
        $age_grp = explode(',',$detail[0]['age_group']);
        $exp     = $detail[0]['experience'];
        $desc 	 = $detail[0]['profile_description'];
        $ref 	 = $detail[0]['references'];
        $ref_det = $detail[0]['references_details'];
        $looking_to_work = explode(',', $detail[0]['looking_to_work']);
        $training = explode(',',$detail[0]['training']);
        $availability = explode(',',$detail[0]['availability']);
        $number_of_children = $detail[0]['number_of_children'];
        $number_of_staff = $detail[0]['number_of_staff'];
        $trainingtemp = explode(',',$detail[0]['training']);
        $time = explode(',', $detail[0]['availability']);
        $age_group = explode(',',$detail[0]['age_group']);
        $reference_file  = $detail[0]['reference_file'];
        $rate = $detail[0]['rate'];
        $rate_type = explode(',',$detail[0]['rate_type']);
	}
?>
<div class="form-group">
	<label class="control-label">For</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="Boys" name="looking_to_work[]" <?php if(in_array('Boys',$looking_to_work)){?> checked="checked" <?php } ?>> Boys<br />
		<input type="checkbox" value="Girls" name="looking_to_work[]" <?php if(in_array('Girls',$looking_to_work)){?> checked="checked" <?php } ?>> Girls<br />
		<input type="checkbox" value="Any" name="looking_to_work[]" <?php if(in_array('Any',$looking_to_work)){?> checked="checked" <?php } ?>> Any<br />
	</div>
</div>
<div class="form-group">
	<label class="control-label">Age Group</label>
	<div class="ad-manager-full-input">
	    <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_grp)){?> checked="checked" <?php }?> >0-3 months</div>
            <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_grp)){?> checked="checked" <?php }?>>3-6 months</div>
            <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_grp)){?> checked="checked" <?php }?>>6-12 months</div>            
            <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_grp)){?> checked="checked" <?php }?>>1 to 3 years</div>
            <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_grp)){?> checked="checked" <?php }?>>3 to 5 years</div>
            <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_grp)){?> checked="checked" <?php }?>>6 to 11 years</div>
            <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_grp)){?> checked="checked" <?php }?>>12+ years</div>
        </div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Number of children in group</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['number_of_children'];?>" name="number_of_children" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Number of staff</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['number_of_staff'];?>" name="number_of_staff" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Training (check one or more)</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php }?> >CPR<br/>
		<input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php }?> >First Aid<br/>
		<input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course', $training)){?> checked="checked" <?php }?> >Nanny/ Babysitter Course<br/>
		<input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php }?> >Other
	</div>
</div><div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
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
<div class="form-group">	<label class="control-label">Cost</label>
	<div class="ad-manager-full-input">
		<select name="rate" class="required">
            <option value="">Select cost</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$5-$10</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
        </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Days/hours</label>
	<div class="ad-manager-checkbox">	
	</div>
</div>
<div class="form-group">
	<label class="control-label">Sun</label>
	<div class="ad-manager-checkbox">
			<?php /* <input type="checkbox" value="Daily hours" name="availability[]" <?php if(in_array('Daily hours', $availability)){?> checked="checked"<?php }?> >Daily hours
			<input type="checkbox" value="Weekend hours" name="availability[]" <?php if(in_array('Weekend hours', $availability)){?> checked="checked"<?php }?> >Weekend hours
			<input type="checkbox" value="Vacation schedule" name="availability[]" <?php if(in_array('Vacation schedule', $availability)){?> checked="checked"<?php }?> >Vacation schedule */?>
			 <input type="text" name="sunday_from" value="<?php echo $detail[0]['sunday_from'];?>"> to <input type="text" name="sunday_to" value="<?php echo $detail[0]['sunday_to'];?>">	
	</div>
</div>
<div class="form-group">
	<label class="control-label">Mon-Thurs</label>
	<div class="ad-manager-checkbox">
		<input type="text" name="mid_days_from" value="<?php echo $detail[0]['mid_days_from'];?>"> to <input type="text" name="mid_days_to" value="<?php echo $detail[0]['mid_days_to'];?>">
        <div class="checkbox"><input type="checkbox" name="extended_hrs_available" value="1" <?php if($detail[0]['extended_hrs'] == 1){?> checked="checked" <?php }?> > Extended Hours Available</div>
             <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?>> Flexible Hours</div>
             <br>
             Vacation Days (Please specify vacation days)
             <br>
             <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">

            <br>
            <br>

            <input type="hidden" id="pdf-name" name="pdf">
            <button class="btn btn-primary" id="pdf_file">Please select pdf file</button>
            <input type="file" name="pdf_upload" id="pdf_upload" style="display: none;"> 
            <div id="output1" class="loader1">
                <?php if(isset($detail[0]['pdf']))
                    echo $detail[0]['pdf'];
                else
                    echo 'No files';
                ?>
            </div>
			
	</div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input">
		<textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">References</label>
	<div class="ad-manager-full-input">
		<div class="radio"><input type="radio" value="1" name="references" id="ref_check1" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
        <div class="radio"><input type="radio" value="2" name="references" id="ref_check2" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No</div>
        <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader">
                <?php if(isset($reference_file))
                    echo $reference_file;
                else
                    echo 'No files';
                ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
	<label class="control-label" style="display:none">Your references details</label>
	<div class="ad-manager-full-input"><textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea></div>
</div>

<script>
    $(document).ready(function(){
        $('body').removeAttr("onload");
         $("#ref_check1").click(function(){
            if($('#ref_check1').is(':checked')){
                $("#upload_ref").show();   
            }
        });
     //   $("#ref_check2").click(function(){
//            if($("#ref_check2").is(':checked')){
//                $("#upload_ref").hide(); 
//                $('#upload_ref').val('');       
//            }
//        });
        $("#ref_check1").click(function(){
            $(".refrence_file").show();   
        });
        $("#ref_check2").click(function(){
                $.ajax({
                     type: "POST",
                     url: "<?php echo base_url(); ?>user/delete_ref_file",
                     data: {file_name : $("#output").text()},
                     success: function(r){
                        $('#output').html(r);
                     }
                  });
                     $(".refrence_file").hide(); 
             $('#file-name').val('');   
        });
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