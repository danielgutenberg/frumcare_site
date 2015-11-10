<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
$templookingtowork = explode(',', $detail[0]['looking_to_work']);
$tempwillingtowork = explode(',' , $detail[0]['willing_to_work']);
$exp = $detail[0]['experience'];
$hr_rate 		 = $detail[0]['hourly_rate'];
$time = explode(',', $detail[0]['availability']);
$date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
$rate = $detail[0]['rate'];
$rate_type = explode(',',$detail[0]['rate_type']);

    $profile_description = $detail[0]['profile_description'];
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
       <?php $this->load->view('frontend/user/dashboard_nav');?>
   </div>
   <div class="dashboard-right float-right">

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post" id="personal-details-form">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>
            
            <div>
                <label>Looking to work in</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Private home" name="looking_to_work[]" <?php if(in_array('Private home',$templookingtowork)){?> checked="checked" <?php }?>> <span>Home</span></div>
                    <div class="checkbox"><input type="checkbox" value="Business/Office" name="looking_to_work[]" <?php if(in_array('Business/Office',$templookingtowork)){?> checked="checked" <?php }?>> <span>Office / business</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning company" name="looking_to_work[]" <?php if(in_array('Cleaning company',$templookingtowork)){?> checked="checked" <?php }?>> <span>Cleaning company</span></div>                
                </div>
            </div>
            
           
        <!--<div>-->
        <!--    <label>Number of rooms</label>-->
        <!--    <div class="form-field">-->
        <!--    <input type="text" name="number_of_rooms" class="required number" value=""/>-->
        <!--    </div>-->
        <!--</div>-->

        <div>
                <label>Years of experience</label>
                <div class="form-field">
                <select name="experience" class="txt">
                    <option value="">Select years of experience</option>
                    <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                    <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                    <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                    <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                    <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
                </select>
                </div>
            </div>
            
            <div class="rate-select">
                <label>Rate</label>
                <div class="form-field">
                    <select name="rate" class="txt rate">
                        <option value="">Select rate</option>
                    <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10 / Hr</option>
                    <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15 / Hr</option>
                    <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25 / Hr</option>
                    <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35 / Hr</option>
                    <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45 / Hr</option>
                    <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55 / Hr</option>
                    <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+ / Hr</option></select>
                </div>
            </div>
            <div>
                <!--<label>Check one or more</label>-->
                <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
            </div>
            
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Dishes</span></div>
                    <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Floors</span></div>
                    <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Windows</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Laundry</span></div>
                    <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Folding</span></div>
                    <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Ironing</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture', $tempwillingtowork)){?> checked="checked" <?php }?>> <span>Cleaning and Dusting Furniture</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Cleaning Refrigerator / Freezer</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stove', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Cleaning Oven / Stove</span></div>
                    <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]" <?php if(in_array('Pesach Cleaning', $tempwillingtowork)){?> checked="checked" <?php } ?> ><span>Pesach Cleaning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]" <?php if(in_array('Able to watch children as well', $tempwillingtowork)){?> checked="checked" <?php }?>><span>Able to watch children as well</span></div>
                </div>
            </div>
            <div>
                <label>Availability</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$time)){?> checked="checked"<?php }?>>Immediate</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?>> Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="dateTextbox"/></div>
                    <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$time)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$time)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $time)){?> checked="checked" <?php }?>> <span>Morning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $time)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>
                    <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $time)){?> checked="checked" <?php }?>> <span>Evening</span></div>                                        
                    <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$time)){?> checked="checked"<?php }?>> <span>Weekends Fri./ Sun.</span></div>
                    <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$time)){?> checked="checked"<?php }?>> <span>Saturday</span></div>               
                </div>
            </div>
            <div>
            <label>Tell us about yourself (Short description not cv)</label>
            <div class="form-field">
            <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
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
        
        <h2>Skills</h2>

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
                 <input type="submit" class="btn btn-success" value="Update"/>
             </div>
            
        </div>
        </div>
    </form>
</div>
</div>

<script>

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
</script>
