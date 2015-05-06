<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php if($detail){
	$established 		= $detail[0]['established'];
	$rate 	 		= 	$detail[0]['rate'];
	$willing_to_work 	= explode(',', $detail[0]['willing_to_work']);
	$desc 				= $detail[0]['profile_description'];
	$ref 				= $detail[0]['references'];
    $certification 		= $detail[0]['certification'];
    $number_of_children	= $detail[0]['number_of_children'];
    $number_of_staff 	= $detail[0]['number_of_staff'];
    $ref_det 			= $detail[0]['references_details'];
    $lang = explode(',',$detail[0]['language']);
} ?>
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
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="required">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($established == $i){ ?> selected="selected" <?php }?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
                </div>
            </div>

            <div>
                <label>Certification</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="required">
                </div>
            </div>

            <div>
                <label>Number of patients/residents</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="required number">
                </div>
            </div>

            <div>
                <label>Number of staff (per patient)</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_staff) ? $number_of_staff : '' ?>" name="number_of_staff" class="required number">
                </div>
            </div>
            <div>
                <label>Languages(Spoken)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $lang)){?> checked="checked" <?php }?>> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish', $lang)){?> checked="checked" <?php }?>> Yiddish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew', $lang)){?> checked="checked" <?php }?>> Hebrew</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$lang)){?> checked="checked" <?php }?>> Russian</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French', $lang)){?> checked="checked" <?php }?>> French</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other', $lang)){?> checked="checked" <?php }?>> Other</div>
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                    <div class="first-block-checkbox">
                <div><input type="checkbox" value="Alz./dementia" name="willing_to_work[]" <?php if(in_array('Alz./dementia',$willing_to_work)){?> checked="checked" <?php }?>> <span>Alz./dementia</span></div>
                <div><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willing_to_work)){?> checked="checked" <?php }?>> <span>Sight loss</span></div>
                </div><div class="first-block-checkbox">
                <div><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willing_to_work)){?> checked="checked" <?php }?>> <span>Hearing loss</span></div>
                <div><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>
                </div>
                </div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                <select name="rate" class="required">
                <option value="">Select cost</option>
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
            <div>
                <label>Tell us about your organization/ Facility/ Staff</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <div>
                <label>References</label>
                <div class="form-field">
                <input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes
                <input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No
                </div>
            </div>
            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>
            <div style="display:none">
                <label>Your references details</label>
                <div class="form-field">
                <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
            </div>

            <br />
            </div>
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
    </form>
</div>
</div>
