<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
  <script>
  $(function() {
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
	$exp 			= $detail[0]['experience'];
	$hr_rate 		= $detail[0]['hourly_rate'];
	$availabletime 	= $detail[0]['availability'];
	$desc 			= $detail[0]['profile_description'];
	$ref 			= $detail[0]['references'];
	$ref_det  		= $detail[0]['references_details'];
	$bg_check		= $detail[0]['agree_bg_check'];
	$temp 			= explode(',',$availabletime);
    $time = explode(',', $detail[0]['availability']);
    $driver_license = $detail[0]['driver_license'];
    $vehicle = $detail[0]['vehicle'];
    $on_short_notice = $detail[0]['on_short_notice'];
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $reference_file  = $detail[0]['reference_file'];
     $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
?>
<?php $care_type = $this->uri->segment(4);?>
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

                <br>
                    <label>Check one or more</label>
                <br>
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1',$rate_type)){?>  checked="checked" <?php } ?> > Hourly Rate</div>
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?>  checked="checked" <?php } ?> > Monthly Rate</div>

            </div>
        </div>
       
            <div>
                <label>When you need care (check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$temp)){?> checked="checked"<?php }?>> Immediate</div>
                    <div class="checkbox full"><input type="checkbox" name="availability[]" id="ckbox1" value="Start Date" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?> class="start_date">Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
					<div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>> <span>Afternoon</span></div>
                    <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> <span>Evening</span></div>
					<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> <span>Morning</span></div>
					<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]" <?php if(in_array("Weekends Fri./Sun.",$temp)){?> checked="checked"<?php }?>> <span>Weekends Fri./Sun.</span></div>
                    <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$temp)){?> checked="checked"<?php }?>> <span>Saturday</span></div>
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
            <div class="radio"><input type="radio" value="1" id="ref_check1" name="references" class="required" <?php echo isset($reference_file) && $ref =='1'?'checked':''?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" id="ref_check2" name="references" class="required" <?php echo isset($ref) && $ref != '1' ? 'checked' : '' ?> /> No</div>
            </div>
        </div>
        
        <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ? "":"style='display:none;'" ?>>
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

            <h2>Abilities</h2>
            <div class="checkbox-wrap">
                <div>
                <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>Drivers license</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>Vehicle</label>
                </div>
                <div>
                <input type="checkbox" value="1" name="on_short_notice" <?php echo isset($on_short_notice) && $on_short_notice == 1 ? 'checked' : ''?>> <label>Available on short notice</label>
                </div>
                <div>
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