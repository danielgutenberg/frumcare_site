<?php $this->load->view('frontend/care/giver/edit_variables'); ?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

<form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
    <div class="ad-form-container float-left">
        <div class="top-welcome">
            <h2 class="step3">Edit Organization Details</h2>
        </div>
        
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



        <?php $this->load->view('frontend/care/giver/fields/rate'); ?>



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
<script type="text/javascript">
    $(document).ready(function(){
        $('body').removeAttr('onload');
    });




</script>
