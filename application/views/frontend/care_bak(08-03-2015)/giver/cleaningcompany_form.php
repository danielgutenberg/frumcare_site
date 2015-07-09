<?php 
if(($this->uri->segment(2) != 'new_profile')){?> 
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-done">Organization Details</li>    
</ol> 

<?php } ?>

<div class="container">
    <?php if(($this->uri->segment(2) != 'new_profile')){?>
    <form action="<?php echo site_url();?>ad/savejobdetails" method="post">

<?php }else{ //new field
	echo form_open('user/addprofileconfirm');
    if(!empty($record)){
        echo form_hidden('account_category',$record['ac_type']);
        echo form_hidden('care_type',$record['submit_id']);
        echo form_hidden('account_type',$record['account_type']);
        echo form_hidden('organization_care',$record['organization_care']);
    }} ?>
<div class="ad-form-container float-left">
     <?php if($this->uri->segment(2) != 'new_profile'){?>  
     <div>
        <h1 class="step3">Step 3: Job Details</h1>
    </div>
    <?php } ?>
    <div>
        <label>Year established</label>
        <div class="form-field">
            <select name="established" class="required">
                <option value="">Select year established</option>
                <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>"><?php echo $i;?></option>
                <?php endfor;?>
            </select>
        </div>
    </div>
    <div>
        <label>We clean</label>
        <div class="form-field">
            <div class="first-block-checkbox">
                <div><input type="checkbox" value="Home" name="looking_to_work[]"> <span>Homes</span></div>
                <div><input type="checkbox" value="Business" name="looking_to_work[]"> <span>Office/Business</span></div>
            </div>

        </div>
    </div>
    <div>
        <label>Specialize in</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]"> <span>Dishes</span></div>
            <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]"> <span>Floors</span></div>
            <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]"> <span>Windows</span></div>
            <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]"> <span>Laundry</span></div>
            <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]"> <span>Folding</span></div>
            <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]"> <span>Ironing</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]"> <span>Cleaning and Dusting Furniture</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]"><span>Cleaning Refrigerator/Freezer</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]"><span>Cleaning Oven/Stove</span></div>                    
            <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
            <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]"><span>Able to watch children as well</span></div>                    
        </div>            
    </div>
    <div>
        <label>Work hours</label>
        <div class="form-field">
            Days
            <br>
            <input type="text" name="days_from" style="width:25%"> - <input type="text" name="days_to" style="width:25%">
            <br>
            Hours
            <br>
            <input type="text" name="hours_from" style="width:25%"> - <input type="text" name="hours_to" style="width:25%">
            <br>
            <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1"> Flexible Hours</div>
        </div>
    </div>

    <div class="rate-select">
        <label>Rate</label>
        <div class="form-field">
            <select name="rate" class="required rate">
                <option value="">Select rate</option>
                <option value="5-10">$5-$10</option>
                <option value="10-15">$5-$10</option>
                <option value="15-25">$15-$25</option>
                <option value="25-35">$25-$35</option>
                <option value="35-45">$35-$45</option>
                <option value="45-55">$45-$55</option>
                <option value="55+">$55+</option>
            </select>
        </div>
    </div>
    <div>
        <label>Check one or more</label>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>
        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate</div>
    </div>  
    <div>
        <label>Tell us about your organization</label>
        <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
    </div>
</div>
</form>
</div>
