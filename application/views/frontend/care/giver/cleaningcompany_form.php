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
        <h1 class="step3">Step 3: Organization Details</h1>
    </div>
    <?php } ?>
    <?php if($this->uri->segment(2) == 'new_profile') { ?>
             <h1>Organization Info</h1>
        <?php 
            $this->load->view('frontend/care/giver/fields/location');
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
            $this->load->view('frontend/care/giver/fields/name_of_owner'); 
            $this->load->view('frontend/care/giver/fields/age_of_owner'); 
            $this->load->view('frontend/care/giver/fields/gender');
            $this->load->view('frontend/care/giver/fields/languages_spoken');  
            $this->load->view('frontend/care/giver/fields/religious_observance');
            $this->load->view('frontend/care/photo_upload', ['photo_name' => 'profile_picture_owner', 'upload_title' => "Upload owner's photo"]);
            $this->load->view('frontend/care/giver/fields/account_category_type'); 
        ?>
    <h1>Organization Details</h1><?php }?>

    <div>
        <label>We clean</label>
        <div class="form-field">
            <div class="first-block-checkbox">
                <?php 
                    $this->load->view('frontend/care/giver/fields/work_location/private_home');
                    $this->load->view('frontend/care/giver/fields/work_location/business');
                ?>
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
            <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]"><span>Cleaning Refrigerator / Freezer</span></div>
            <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]"><span>Cleaning Oven / Stove</span></div>
            <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
            <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]"><span>Able to watch children as well</span></div>
        </div>
    </div>
    <div>
        <label>Days / Hours</label>
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

    <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
    <div>
        
        <label>Tell us about your organization</label>
        <div class="form-field">
            <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
        </div>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
    </div>
</div>
</form>
</div>