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
         <?php $this->load->view('frontend/user/dashboard/nav');?>
    </div>
    <div class="dashboard-right float-right">
    <?php    
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/update_job_details/'.$care_type, $attributes);
    ?>
    <div class="ad-form-container float-left">
        <div class="top-welcome">
            <h2 class="step3">Edit Organization Details</h2>
        </div>
        
        <div>
            <label>We clean</label>
            <div class="form-field">
                <div class="first-block-checkbox">
                    <?php 
                        $this->load->view('frontend/care/giver/fields/work_location/private_home', ['lookingtowork' => $lookingtowork]);
                        $this->load->view('frontend/care/giver/fields/work_location/business', ['lookingtowork' => $lookingtowork]);
                    ?>
                </div>
    
            </div>
        </div>
        <div>
            <label>Specialize in</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $willingtowork)){?> checked="checked" <?php }?>> <span>Dishes</span></div>
                <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $willingtowork)){?> checked="checked" <?php }?>> <span>Floors</span></div>
                <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $willingtowork)){?> checked="checked" <?php }?>> <span>Windows</span></div>
                <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $willingtowork)){?> checked="checked" <?php }?>> <span>Laundry</span></div>
                <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding', $willingtowork)){?> checked="checked" <?php }?>> <span>Folding</span></div>
                <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing', $willingtowork)){?> checked="checked" <?php }?>> <span>Ironing</span></div>
                <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture', $willingtowork)){?> checked="checked" <?php }?>> <span>Cleaning and Dusting Furniture</span></div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer', $willingtowork)){?> checked="checked" <?php }?>><span>Cleaning Refrigerator/Freezer</span></div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stove', $willingtowork)){?> checked="checked" <?php }?>><span>Cleaning Oven/Stove</span></div>
                <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]" <?php if(in_array('Pesach Cleaning', $willingtowork)){?> checked="checked" <?php } ?> ><span>Pesach Cleaning</span></div>
                <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]" <?php if(in_array('Able to watch children as well', $willingtowork)){?> checked="checked" <?php }?>><span>Able to watch children as well</span></div>
            </div>
         </div>
        <div class="ad-form-container float-left">

        <div>
        <label>Days / Hours</label>
        <div class="form-field">
            Days
            <br />
            <input type="text" name="days_from" style="width:48%" value="<?php echo $detail[0]['days_from'];?>"> - <input type="text" name="days_to" style="width:48%" value="<?php echo $detail[0]['days_to'];?>">
            <br /><br />
            Hours
            <br />
            <input type="text" name="hours_from" style="width:48%" value="<?php echo $detail[0]['hours_from'];?>"> - <input type="text" name="hours_to" style="width:48%" value="<?php echo $detail[0]['hours_to'];?>">
            <br />
            <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?> > Flexible Hours</div>
        </div>
    </div>



        <?php $this->load->view('frontend/care/giver/fields/rate', ['rate' => $rate, 'currency' => $currency]); ?>



        <div class="ad-form-container float-left">
            <label>Tell us about your organization</label>
            <div class="form-field">
            <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
            </div>
        </div>

        <div class="ad-form-container float-left">
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
    </div>

</div>
</div>
</div>
</form>