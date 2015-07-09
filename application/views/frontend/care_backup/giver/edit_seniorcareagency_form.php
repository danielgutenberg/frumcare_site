<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
	if($detail){
		$willing_to_work = explode(',', $detail[0]['willing_to_work']);
		$rate 		 = $detail[0]['rate'];
		$desc 			 = $detail[0]['profile_description'];
		$established	 = $detail[0]['established'];
        	$certification = $detail[0]['certification'];
	}
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
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="required">
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
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="required">
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willing_to_work[]" <?php if(in_array('Alz./dementia',$willing_to_work)){?> checked="checked"<?php }?>> <span>Alz./ dementia</span></div>
                <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willing_to_work)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>
                
                <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willing_to_work)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
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
                <label>Tell us about your organization</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

             <div>
                <label> Payment Options(specify)</label>
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
