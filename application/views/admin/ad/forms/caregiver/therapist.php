<?php
    $licence_information = $detail[0]['licence_information'];
    $reference_file      = $detail[0]['reference_file'];
    $ref  = $detail[0]['references'];
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
?>
<div class="form-group">
	<label class="control-label">Type of therapy</label>	
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['type_of_therapy'];?>" name="type_of_therapy" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Training/ Certification</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $detail[0]['certification'];?>" name="certification" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Years of experience</label>
	<div class="ad-manager-full-input">
	<?php $exp = $detail[0]['experience'];?>
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
<div class="form-group">
	<label class="control-label">License information</label>
	<div class="ad-manager-full-input"> <input type="text" value="<?php echo isset($licence_information) ? $licence_information : '' ?>" name="licence_information" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>	
	<div class="ad-manager-full-input">
		<select name="rate" class="required">
            <option value="">Select rate</option>
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
	<label></label>
	<div class="ad-manager-full-input" style="width:25%;margin-left:207px;">
		<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Accepts insurance</label>
	<div class="ad-manager-checkbox">
		<div class="radio" ><input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($detail[0]['accept_insurance']) && $detail[0]['accept_insurance'] == 1 ? 'checked' : '' ?>/>Yes</div>
        <div class="radio" ><input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($detail[0]['accept_insurance']) && $detail[0]['accept_insurance'] == 2 ? 'checked' : '' ?>/>No</div>
    </div>
</div>
<div class="form-group">
	<label class="control-label">Tell us about yourself</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($detail[0]['profile_description']) ? $detail[0]['profile_description'] : '' ?></textarea></td></div>
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
<script>
    $(document).ready(function(){
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
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY Kiran
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>

