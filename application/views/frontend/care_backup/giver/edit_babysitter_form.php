<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
  <script>
  $(function() {
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 

	$lookingtowork = explode(',', $detail[0]['looking_to_work']);
	$age_group = explode(',',$detail[0]['age_group']);
	$exp = $detail[0]['experience'];
	$training = explode(',', $detail[0]['training']);
	$time = explode(',', $detail[0]['availability']);
	$ref = $detail[0]['references'];
	$bg_check = $detail[0]['agree_bg_check'];
	$driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
	$pick_up_child = $detail[0]['pick_up_child'];
	$cook		= $detail[0]['cook'];
	$basic_housework = $detail[0]['basic_housework'];
	$homework_help = $detail[0]['homework_help'];
	$sick_child_care = $detail[0]['sick_child_care'];
	$on_short_notice = $detail[0]['on_short_notice'];
    $number_of_children = $detail[0]['number_of_children'];
    $profile_description = $detail[0]['profile_description'];
    $ref_det = $detail[0]['references_details'];
    $date = $detail[0]['start_date'];
    $optional_number = explode(',',$detail[0]['optional_number']);
    $reference_file  = $detail[0]['reference_file'];
    $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];


?>

<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">
    
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">

<div class="ad-form-container">
        <div class="top-welcome">
            <h2 class="step3">Edit Job Details</h2>
        </div>
	 
        <div>
            <label>Looking to work in (check one or more)</label>
            <div class="form-field">
            <div class="first-block-checkbox"><div><input type="checkbox" value="My home" name="looking_to_work[]" <?php if(in_array('My home', $lookingtowork)){?>checked="checked"<?php }?>> <span>My home</span></div>
            <div><input type="checkbox" value="Child's home" name="looking_to_work[]" <?php if(in_array("Child's home", $lookingtowork)){?>checked="checked"<?php }?>> <span>Child's home</span></div></div>
            <div class="first-block-checkbox"><div><input type="checkbox" value="Caregiving institution" name="looking_to_work[]" <?php if(in_array("Caregiving institution", $lookingtowork)){?>checked="checked"<?php }?>> <span>Caregiving institution</span></div>
            </div>
            </div>
            </div>
        </div>
        <div>
            <label>Number of children willing to care for</label>
            <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="required number">
                <input type="checkbox" value="twins" name="optional_number[]" <?php if(in_array("twins",$optional_number)){ ?> checked='checked' <?php }?>/>Twins
                <input type="checkbox" value="triplets" name="optional_number[]" <?php if(in_array("triplets",$optional_number)){ ?> checked='checked' <?php }?>/>Triplets
            </div>
        </div>
        <div>
            <label>Ages of children willing to care for</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1" name="age_group[]" <?php if(in_array('1',$age_group)){?> checked="checked" <?php } ?>/> 1 year</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
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
                <option value="5+" <?php echo isset($exp) && $exp == 5 ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
        <div>
            <label>Training (check one or more)</label>
            <div class="form-field">
            <div class="first-block-checkbox"><div><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> <span>CPR</span></div>
            <div><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> <span>First Aid</span></div></div>
            <div class="first-block-checkbox"><div><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course', $training)){?> checked="checked" <?php } ?>> <span>Nanny/ Babysitter Course</span></div>
            <div><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> <span>Other</span></div>
            </div>
            </div>
        </div>
        <div>
            <label>Rate</label>
            <div class="form-field">
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
            </div>
        </div>
        <select name="rate_type">
            <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Hourly Rate</option>
            <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Monthly Rate</option>
        </select>
        <div>
            <label>Availability (check one or more)</label>
            <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$time)){?> checked="checked"<?php }?>> Immediate</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" name="availability[]" value="Start Date" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?> class="start_date">Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array('Regularly', $time)){?> checked="checked" <?php }?>> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array('Occassionally', $time)){?> checked="checked" <?php }?>> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> <span>Morning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>
                    <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> <span>Evening</span></div>
                    <div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]"<?php if(in_array('Weekends fri/sun', $time)){?> checked="checked" <?php }?>> <span>Weekends fri/sun</span></div>
                    <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"<?php if(in_array('Shabbos', $time)){?> checked="checked" <?php }?>> <span>Shabbos</span></div>
                    <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]"<?php if(in_array('Vacation Sitter', $time)){?> checked="checked" <?php }?>> <span>Vacation Sitter</span></div>
                    <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array('Night Nurse', $time)){?> checked="checked" <?php }?>> <span>Night Nurse</span></div>
                </div>
        </div>
        <div>
            <label>Tell us about yourself</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
            </div>
        </div>
        <div>
            <label>References</label>
            <div class="form-field not-required">
            <div class="radio"><input type="radio" value="1" id="ref_check1" name="references" class="required" <?php echo isset($reference_file) && $ref =='1'?'checked':''?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" id="ref_check2" name="references" class="required" <?php echo isset($ref) && $ref != '1' ? 'checked' : '' ?> /> No</div>
            </div>
        </div>
        
        <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
            <label></label>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"><?php echo isset($reference_file)?$reference_file:'' ?></div>
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
            <div class="radio"><input type="radio" value="2" name="bg_check" class="required" <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> /> No</div>
            </div>
        </div>

        <h2>Encouraged but not mandatory fields (check if yes)</h2>
<div class="checkbox-wrap">
        <div>
            <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>I have a Drivers license</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>I have a Vehicle</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>> <label>Able to pick up kids from school</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Able to cook and prepare food</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Able to do light housework/ cleaning</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>> <label>Able to help with homework</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>> <label>Able to care for sick child</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="on_short_notice" <?php echo isset($on_short_notice) && $on_short_notice == 1 ? 'checked' : ''?>> <label>Available on short notice</label>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
        </div>
    </div>


</form>
</div>
</div>


<script>
    $(document).ready(function(){
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
