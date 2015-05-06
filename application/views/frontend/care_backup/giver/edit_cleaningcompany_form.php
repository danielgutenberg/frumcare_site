<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
if($detail){
	$established = $detail[0]['established'];
    $temp = explode(',' ,$detail[0]['willing_to_work']);
    $availabletime = explode(',', $detail[0]['availability']);
    $hourly_rate = $detail[0]['hourly_rate'];
    $desc = $detail[0]['profile_description'];
    $hr_rate = $detail[0]['hourly_rate'];
    $looking_to_work = explode(',',$detail[0]['looking_to_work']);
    $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
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
                <option value="<?php echo $i?>" <?php if($i == $established){?> selected="selected"<?php } ?>><?php echo $i;?></option>
                <?php endfor;?>
            </select>
            </div>
        </div>

        <div>
        <label>We clean</label>
        <div class="form-field">
            <div class="first-block-checkbox">
                <div><input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home',$looking_to_work)){?> checked="checked" <?php }?> > <span>Homes</span></div>
                <div><input type="checkbox" value="Business" name="looking_to_work[]" <?php if(in_array('Business',$looking_to_work)){?> checked="checked" <?php }?>> <span>Office/Business</span></div>
            </div>

        </div>
        </div>
         <div>
                <label>Specialize in</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors', $temp)){?> checked="checked" <?php }?>> <span>Floors</span></div>
                    <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows', $temp)){?> checked="checked" <?php }?>> <span>Windows</span></div>
                    <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes', $temp)){?> checked="checked" <?php }?>> <span>Dishes</span></div>
                    <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry', $temp)){?> checked="checked" <?php }?>> <span>Laundry</span></div>
                    <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding', $temp)){?> checked="checked" <?php }?>> <span>Folding</span></div>
                    <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing', $temp)){?> checked="checked" <?php }?>> <span>Ironing</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture', $temp)){?> checked="checked" <?php }?>> <span>Cleaning and Dusting Furniture</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer', $temp)){?> checked="checked" <?php }?>><span>Cleaning Refrigerator/Freezer</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stove', $temp)){?> checked="checked" <?php }?>><span>Cleaning Oven/Stove</span></div>
                    <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]" <?php if(in_array('Able to watch children as well', $temp)){?> checked="checked" <?php }?>><span>Able to watch children as well</span></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="seperator"></div>
        <div class="ad-form-container float-left">

        <div>
        <label>Availability</label>
        <div class="form-field">
            Days
            <br>
            <input type="text" name="days_from" style="width:25%" value="<?php echo $detail[0]['days_from'];?>"> - <input type="text" name="days_to" style="width:25%" value="<?php echo $detail[0]['days_to'];?>">
            <br>
            Hours
            <br>
            <input type="text" name="hours_from" style="width:25%" value="<?php echo $detail[0]['hours_from'];?>"> - <input type="text" name="hours_to" style="width:25%" value="<?php echo $detail[0]['hours_to'];?>">
            <br>
            <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?> > Flexible Hours</div>
        </div>
    </div>

        </div>
        
        <div class="clear"></div>
        <div class="seperator"></div>
        <div>
            <label>Rate</label>
            <div class="form-field" style="width:40%">
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
            </div>
        </div>
      
        <div class="clear"></div>
        <div class="seperator"></div>
        <div class="ad-form-container float-left">
            <label>Tell us about your organization</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>
        
        <div class="clear"></div>
        <div class="seperator"></div>
        <div class="ad-form-container float-left">
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
    </div>

</div>
</form>