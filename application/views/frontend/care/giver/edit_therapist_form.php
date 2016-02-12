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
    $type_of_therapy = $detail[0]['type_of_therapy'];
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
        <div class="ad-form-container">
        
        <div>
            <h1 class="step3">Edit Job Details</h1>
        </div>
        
        
        <div>
            <label>Type of therapy</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($type_of_therapy) ? $type_of_therapy : '' ?>" name="type_of_therapy" class="txt">
            </div>
        </div>
<div>
            <label>Years in Practice</label>
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
        <div>
            <label>Certification / License information</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="txt">
            </div>
        </div>
            <?php $this->load->view('frontend/care/giver/fields/rate', ['rate' => $rate, 'currency' => $currency]); ?>
            
            <div>
            <label>Accepts insurance</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 2 ? 'checked' : '' ?> /> No</div>
            </div>
        </div>
        <div>
            <label> Payment Options(specify)</label>
            <div class="form-field">
                <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
            </div>
        </div>
        <?php
            $this->load->view('frontend/care/giver/fields/about_yourself' ,['profile_description' => $profile_description]);
            $this->load->view('frontend/care/giver/fields/references', ['reference_file' => $reference_file, 'ref' => $ref]);
            $this->load->view('frontend/care/giver/fields/background'); 
        ?>
        <div>
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
    </div>
</form>
</div>
</div>
