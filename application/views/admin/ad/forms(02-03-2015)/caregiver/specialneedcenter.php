<?php 
	if($detail){
		$established 		= $detail[0]['established'];
		$certification 		= $detail[0]['certification'];
		$willing_to_work	= explode(',',$detail[0]['willing_to_work']);
		$lang 				= explode(',', $detail[0]['language']);
		$number_of_children	= $detail[0]['number_of_children'];
		$number_of_staff 	= $detail[0]['number_of_staff'];
		$ref 				= $detail[0]['references'];
		$ref_det 			= $detail[0]['references_details'];
		$desc 				= $detail[0]['profile_description'];
        $rate = $detail[0]['rate'];
        $rate_type = explode(',',$detail[0]['rate_type']);
	}
?>
<div class="form-group">
<label class="control-label">Year established</label>
<div class="ad-manager-full-input">
	<select name="established" class="required">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>" <?php if($established == $i){?> selected="selected" <?php } ?> ><?php echo $i;?></option>
            <?php endfor;?>
    </select>
</div>
</div>
<div class="form-group">
	<label class="control-label">Certification</label>
	<div class="ad-manager-full-input">
		<input type="text" value="<?php echo $certification;?>" name="certification" class="required">
	</div>
</div>
<div class="form-group">
	<label class="control-label">Spoken language</label>
	<div class="ad-manager-checkbox">
		<div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $lang)){?> checked="checked" <?php }?>> English</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish', $lang)){?> checked="checked" <?php }?>> Yiddish</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew', $lang)){?> checked="checked" <?php }?>> Hebrew</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$lang)){?> checked="checked" <?php }?>> Russian</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French', $lang)){?> checked="checked" <?php }?>> French</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other', $lang)){?> checked="checked" <?php }?>> Other</div>
        </div>
</div>
<div class="form-group">
	<label class="control-label">Specialize in</label>
	<div class="ad-manager-checkbox">  
        <div><input type="checkbox" value="Autism" name="willing_to_work[]" <?php if(in_array('Autism', $willing_to_work)){?> checked="checked" <?php }?>> <span>Autism</span></div>
        <div><input type="checkbox" value="Down Syndrome" name="willing_to_work[]" <?php if(in_array('Down Syndrome', $willing_to_work)){?> checked="checked" <?php }?>> <span>Down Syndrome</span></div>
        <div><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willing_to_work)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>
        <div><input type="checkbox" value="Handicapped" name="willing_to_work[]" <?php if(in_array('Handicapped',$willing_to_work)){?> checked="checked"<?php }?>><span>Handicapped</span></div>
     </div>
</div>
<div class="form-group">
	<label class="control-label">Number of patients</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $number_of_children;?>" name="number_of_children" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Number of staff (per patient)</label>
	<div class="ad-manager-full-input"><input type="text" value="<?php echo $number_of_staff;?>" name="number_of_staff" class="required number"></div>
</div>
<div class="form-group">
	<label class="control-label">Rate</label>
	<div class="ad-manager-full-input">
        <select name="rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
        </select>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1', $rate_type)){?>checked="checked"<?php }?> />Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2', $rate_type)){?>checked="checked"<?php }?> />Monthly Rate</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label">Tell us about your organization/ Facilities/ Staff</label>
	<div class="ad-manager-full-input"><textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea></div>
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
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

       if($('#ckbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            //$("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                //$("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });
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