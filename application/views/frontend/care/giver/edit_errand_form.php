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
<div class="ad-form-container float-left">
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>
            
            <?php $this->load->view('frontend/care/giver/fields/experience', ['exp' => $exp]); ?>
            <?php $this->load->view('frontend/care/giver/fields/rate', ['rate' => $rate, 'currency' => $currency]); ?>
       
            <div>
                <label>Availability</label>
                <div class="form-field">
                    <?php 
						$this->load->view('frontend/care/giver/fields/availability/immediate', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/start_date', ['availability' => $availability, 'date' => $date]);
						$this->load->view('frontend/care/giver/fields/availability/occasional', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/regular', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/morning', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/afternoon', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/evening', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/weekend', ['availability' => $availability]);
						$this->load->view('frontend/care/giver/fields/availability/shabbos', ['availability' => $availability]);
					?>
				</div>
            </div>
            <?php
	            $this->load->view('frontend/care/giver/fields/about_yourself' ,['profile_description' => $profile_description]);
	            $this->load->view('frontend/care/giver/fields/references', ['reference_file' => $reference_file, 'ref' => $ref]);
	            $this->load->view('frontend/care/giver/fields/background'); 
	        ?>

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
