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
    $subjects       = explode(',', $detail[0]['subjects']);
?>
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
     <?php $this->load->view('frontend/user/dashboard/nav');?>
 </div>

 <div class="dashboard-right float-right">
    <?php    
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/update_job_details/'.$care_type, $attributes);
    ?>

        <div class="ad-form-container float-left">

            <div>
                <h1 class="step3">Edit Job Details</h1>
            </div>
            
            
            <div>
                <label>Subject(s)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php } ?>> <span>Elementary school</span></div>
                    <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php } ?>> <span>High school</span></div>
                    <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php } ?>> <span>Post high school</span></div>
                    <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" <?php if(in_array('limudei kodesh',$subjects)){?> checked="checked" <?php } ?>>Limudei Kodesh</div>
                    <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" <?php if(in_array('general studies',$subjects)){?> checked="checked" <?php } ?>>General Studies</div>
                    <div class="checkbox"><input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php } ?>> <span>Special ed</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php } ?>> <span>Music</span></div>                                        
                    <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php } ?>> <span>Art</span></div>                
                    <div class="checkbox"><input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Other',$subjects)){?> checked="checked" <?php } ?>> <span>Other</span></div>                                            
                </div>
            </div>
            <div>
                <label>Availability</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]" <?php if(in_array("Immediate",$availability)){?> checked="checked"<?php }?>>Immediately</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$availability)){?> checked="checked"<?php }?> class="check">Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1" /></div>
                    <div class="checkbox"><input type="checkbox" value="occassionally" name="availability[]" <?php if(in_array('occassionally', $availability)){?> checked="checked" <?php }?>> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="regularly" name="availability[]" <?php if(in_array('regularly', $availability)){?> checked="checked" <?php }?>> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array('Morning', $availability)){?> checked="checked" <?php }?>> <span>Morning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array('Afternoon', $availability)){?> checked="checked" <?php }?>> <span>Afternoon</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array('Evening', $availability)){?> checked="checked" <?php }?>> <span>Evening</span></div>                    
                    <div class="checkbox"><input type="checkbox" name="availability[]" value="Weekends fri/sun" <?php if(in_array('Weekends fri/sun', $availability)){?> checked="checked" <?php }?>> <span>Weekends fri/sun</span></div>
                    <div class="checkbox"><input type="checkbox" value="By Appointment" name="availability[]" <?php if(in_array('By Appointment', $availability)){?> checked="checked" <?php }?>> <span>By Appointment</span></div>
                </div>
            </div>

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
            <?php $this->load->view('frontend/care/giver/fields/rate', ['rate' => $rate, 'currency' => $currency]); ?>
            
            <?php
	            $this->load->view('frontend/care/giver/fields/about_yourself' ,['profile_description' => $profile_description]);
	            $this->load->view('frontend/care/giver/fields/references', ['reference_file' => $reference_file, 'ref' => $ref]);
	            $this->load->view('frontend/care/giver/fields/background'); 
	        ?>

            <h2>Abilities and skills</h2>

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
