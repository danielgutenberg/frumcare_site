<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

    <?php echo $this->breadcrumbs->show();?>

    <div class="dashboard-left float-left">
       <?php $this->load->view('frontend/user/dashboard_nav');?>
   </div>
   <div class="dashboard-right float-right">

    <div class="top-welcome">
        <h2>Edit Job Details</h2>
    </div>

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container float-left">

            
            <div>
                <label>For</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Boys" name="looking_to_work[]" <?php if(in_array('Boys',$lookingtowork)){?> checked="checked" <?php } ?>> Boys</div>                    
                    <div class="checkbox"><input type="checkbox" value="Girls" name="looking_to_work[]" <?php if(in_array('Girls',$lookingtowork)){?> checked="checked" <?php } ?>> Girls</div>
                    <div class="checkbox"><input type="checkbox" value="Both" name="looking_to_work[]" <?php if(in_array('Both',$lookingtowork)){?> checked="checked" <?php } ?>> Both</div>
                </div>
            </div>
            <div>
                <label>Age group</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>                    
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
                </div>
            </div>
            <div>
                <label>Number of children in group</label>
                <div class="form-field">
                    <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="txt number">
                </div>
            </div>

            <div>
                <label>Number of staff</label>
                <div class="form-field">
                    <input type="text" value="<?php echo isset($number_of_staff) ? $number_of_staff : '' ?>" name="number_of_staff" class="txt number">
                </div>
            </div>
            <div>
                <label>Training</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                    <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course</div>
                    <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$trainingtemp)){?> checked="checked"<?php } ?>> Other</div>
                </div>
            </div>
            <?php $this->load->view('frontend/care/giver/fields/experience'); ?>

            <div>
                    <label>Cost</label>
                    <div class="form-field">
                        <input type="text" name="rate" value="<?php echo $rate;?>">
                    </div>
            </div>
        
            <?php
                $this->load->view('frontend/care/giver/fields/days_hours');
                $this->load->view('frontend/care/giver/fields/about_yourself');
                $this->load->view('frontend/care/giver/fields/references');
                $this->load->view('frontend/care/giver/fields/background'); 
            ?>
            <div>
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </div>
    </form>
</div>
</div>



