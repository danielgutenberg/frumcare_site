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
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="txt">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($i == $established){?> selected="selected" <?php }?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
                </div>
            </div>

            <div>
                <label>Certification</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="txt">
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willingtowork[]" <?php if(in_array('Alz./dementia',$willingtowork)){?> checked="checked"<?php }?>> <span>Alz./ dementia</span></div>
                <div class="checkbox"><input type="checkbox" value="Sight loss" name="willingtowork[]" <?php if(in_array('Sight loss',$willingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>

                <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willingtowork[]" <?php if(in_array('Hearing loss',$willingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willingtowork[]" <?php if(in_array('Wheelchair bound',$willingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
                </div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                   <input type="text" name="rate" value="<?php echo $rate;?>">
                </div>
            </div>

            <div>
                <!--<label>Check one or more</label>-->
                <div class="form-field">
                        <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1',$rate_type)){?> checked="checked" <?php } ?>>Hourly Rate</div>-->
                        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php } ?>>Monthly Rate Available</div>
                </div>
           </div>
            <div>
                <label>Tell us about your organization</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
                </div>
            </div>

            <?php
                $photo_url = site_url("images/plus.png");
                if(isset($facility)){
                    $photo_url = base_url('images/profile-picture/thumb/'.$facility);
                }
            ?>

                <div class="upload-photo"  style="display:none;">
                    <h2>Upload photo of facility / organization</h2>
                    <input type="hidden" id="file-name" name="facility_pic" value="<?php echo isset($facility)?>">
                    <div id="output"><img src="<?php echo $photo_url?>"></div>
                    <label>Browse your computer to select a file to upload</label>
                    <button class="btn btn-default" id="upload">Choose File</button>
                    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                    <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
                </div>



             <div>
                <label> Payment Options (specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>

            <div>
                 <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </div>
    </form>
</div>
</div>

