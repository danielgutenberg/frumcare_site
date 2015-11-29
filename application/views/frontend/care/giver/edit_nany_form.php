<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
	$facility = $detail[0]['facility_pic'];
	$number_of_staff = $detail[0]['number_of_staff'];
	$certification = $detail[0]['certification'];
	$established   = $detail[0]['established'];
	$lookingtowork = explode(',', $detail[0]['looking_to_work']);
	$age_group = explode(',',$detail[0]['age_group']);
    $exp = $detail[0]['experience'];
	$training = explode(',', $detail[0]['training']);
	$availability = explode(',', $detail[0]['availability']);
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
	$ref = $detail[0]['references'];
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
    $care_type = $this->uri->segment(4);
    $willingtowork = explode(',' , $detail[0]['willing_to_work']);
	$hr_rate 		 = $detail[0]['hourly_rate'];
	$facility           = $detail[0]['facility_pic'];
	$wash = $detail[0]['wash'];
    $iron = $detail[0]['iron'];
    $fold = $detail[0]['fold'];
    $bath_children = $detail[0]['bath_children'];
    $bed_children = $detail[0]['bed_children'];
    $extra_field = explode(',',$detail[0]['extra_field']);
    $currency = $detail[0]['currency'];
?>
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
     <?php $this->load->view('frontend/user/dashboard_nav');?>
 </div>

 <div class="dashboard-right float-right">

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>
            <div>
				<label>Looking to work as</label>
				<div class="form-field">
					<?php 
	                    $this->load->view('frontend/care/giver/fields/work_location/live_in', ['lookingtowork' => $lookingtowork]);
	                    $this->load->view('frontend/care/giver/fields/work_location/live_out', ['lookingtowork' => $lookingtowork]);
	                ?>
				</div>
			</div>
            
            <div>
                <label>Number of children willing to care for</label>
                <div class="form-field">
                    <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="txt number">
                    <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]" <?php if(in_array("twins",$optional_number)){ ?> checked='checked' <?php }?>/>Twins</div>
                    <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" <?php if(in_array("triplets",$optional_number)){ ?> checked='checked' <?php }?>/>Triplets</div>
                </div>
            </div>
            <div>
                <label>Ages of children willing to care for</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
                </div>
            </div>
            <?php $this->load->view('frontend/care/giver/fields/experience', ['exp' => $exp]); ?>
            <div>
                <label>Training</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> <span>CPR</span></div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> <span>First Aid</span></div>                                        
                    <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course', $training)){?> checked="checked" <?php } ?>> <span>Nanny/ Babysitter Course</span></div>
                    <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> <span>Other</span></div>                    
                </div>
            </div>
            <div class="rate-select">
                <label>Rate</label>
                <div class="form-field">
                    <select name="rate" class="txt">
                        <option value="">Select rate</option>
                        <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>5-10/Hr</option>
                        <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>10-15/Hr</option>
                        <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>15-25/Hr</option>
                        <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>25-35/Hr</option>
                        <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>35-45/Hr</option>
                        <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>45-55/Hr</option>
                        <option value="55+" <?php echo isset($rate) && $rate == '56' ? 'selected' : '' ?>>55+/Hr</option>
                    </select>                                  
                </div>
            </div>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="2" name="rate_type[]" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php } ?>>Monthly Rate Available</div>
                <div class="checkbox"><input type="checkbox" value="3" name="rate_type[]" <?php if(in_array('3',$rate_type)){?> checked="checked" <?php } ?>>Room and Board Available</div>
            </div>
            <div class="rate-select">
                <label>Currency</label>
                <div class="form-field">
                    <select name="currency" class="txt rate">
            		  <!--<option value="">Select Currency</option>-->
            		  <!--<option value="AUD">Australian Dollar</option>-->
            		  <!--<option value="BRL">Brazilian Real </option>-->
            		  <!--<option value="CAD">Canadian Dollar</option>-->
            		  <!--<option value="CZK">Czech Koruna</option>-->
            		  <!--<option value="DKK">Danish Krone</option>-->
            		  <!--<option value="EUR">Euro</option>-->
            		  <!--<option value="HKD">Hong Kong Dollar</option>-->
            		  <!--<option value="HUF">Hungarian Forint </option>-->
            		  <option value="ILS" <?php if($currency == 'ILS') {?>selected<?php } ?>>&#8362; Israeli New Sheqel</option>
            		  <!--<option value="JPY">Japanese Yen</option>-->
            		  <!--<option value="MYR">Malaysian Ringgit</option>-->
            		  <!--<option value="MXN">Mexican Peso</option>-->
            		  <!--<option value="NOK">Norwegian Krone</option>-->
            		  <!--<option value="NZD">New Zealand Dollar</option>-->
            		  <!--<option value="PHP">Philippine Peso</option>-->
            		  <!--<option value="PLN">Polish Zloty</option>-->
            		  <!--<option value="GBP">Pound Sterling</option>-->
            		  <!--<option value="SGD">Singapore Dollar</option>-->
            		  <!--<option value="SEK">Swedish Krona</option>-->
            		  <!--<option value="CHF">Swiss Franc</option>-->
            		  <!--<option value="TWD">Taiwan New Dollar</option>-->
            		  <!--<option value="THB">Thai Baht</option>-->
            		  <!--<option value="TRY">Turkish Lira</option>-->
            		  <option value="USD" <?php if($currency == 'USD') {?>selected<?php } ?>>&#36; U.S. Dollar</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label>Availability</label>
                <div class="form-field">
                    <?php 
        				$this->load->view('frontend/care/giver/fields/availability/immediate' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/start_date' ,['availability' => $availability, 'date' => $date]);
        				$this->load->view('frontend/care/giver/fields/availability/occasional' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/regular' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/morning' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/afternoon' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/evening' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/weekend' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/shabbos' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/night_nurse' ,['availability' => $availability]);
        				$this->load->view('frontend/care/giver/fields/availability/vacation_sitter' ,['availability' => $availability]);
    				?>
                </div>
            </div>
            <?php
	            $this->load->view('frontend/care/giver/fields/about_yourself' ,['profile_description' => $profile_description]);
	            $this->load->view('frontend/care/giver/fields/references', ['reference_file' => $reference_file, 'ref' => $ref]);
	            $this->load->view('frontend/care/giver/fields/background'); 
	        ?>

            <h2>Abilities and skills</h2>

            <div class="checkbox-wrap">
                <div>
                    <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>I have Drivers license</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>I have Vehicle</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>> <label>Able to pick up kids from school</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Able to cook and prepare food</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Able to do housework/ cleaning</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="homework_help" <?php echo isset($bath_children) && $bath_children == 1 ? 'checked' : ''?>> <label>Able to help with homework</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="bath_children" <?php echo isset($bed_children) && $bed_children == 1 ? 'checked' : ''?>> Able to bathe children
                </div>
                <div>
                    <input type="checkbox" value="1" name="bed_children" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>> Able to put children to bed
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
</div>

<script>
    $(document).ready(function(){
    //    if($('#ckbox1').is(':checked')){
    //     $("#textbox1").show();
    // }else{
    //     $("#textbox1").hide();
    //     $('#textbox1').val('');
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
