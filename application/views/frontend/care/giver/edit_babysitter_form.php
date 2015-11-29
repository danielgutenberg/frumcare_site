<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">
    
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">

<div class="ad-form-container">
        <div class="top-welcome">
            <h2 class="step3">Edit Job Details</h2>
        </div>
	 
        <div>
            <label>Looking to work in</label>
            <div class="form-field">
                <?php 
                $this->load->view('frontend/care/giver/fields/work_location/my_home');
                $this->load->view('frontend/care/giver/fields/work_location/childs_home');
                $this->load->view('frontend/care/giver/fields/work_location/caregiving_institution');
                $this->load->view('frontend/care/giver/fields/work_location/mothers_helper');
                ?>
            </div>
        </div>
        <?php $this->load->view('frontend/care/giver/fields/number_of_children'); ?>
        
        <div>
            <label>Ages of children willing to care for</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>                    
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]" <?php if(in_array('13',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
            </div>
        </div>
        <?php $this->load->view('frontend/care/giver/fields/experience'); ?>
        <div>
            <label>Training</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> <span>CPR</span></div>
                <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> <span>First Aid</span></div>
                <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]" <?php if(in_array('Nanny/ Babysitter Course', $training)){?> checked="checked" <?php } ?>> <span>Nanny/ Babysitter Course</span></div>
                <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse', $training)){?> checked="checked" <?php } ?>> <span>Nurse</span></div>
                <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> <span>Other</span></div>
            </div>
        </div>
        <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
     
        <div>
            <label>Availability</label></label>
            <div class="form-field">
                <?php 
				$this->load->view('frontend/care/giver/fields/availability/immediate');
				$this->load->view('frontend/care/giver/fields/availability/start_date');
				$this->load->view('frontend/care/giver/fields/availability/occasional');
				$this->load->view('frontend/care/giver/fields/availability/regular');
				$this->load->view('frontend/care/giver/fields/availability/morning');
				$this->load->view('frontend/care/giver/fields/availability/afternoon');
				$this->load->view('frontend/care/giver/fields/availability/evening');
				$this->load->view('frontend/care/giver/fields/availability/weekend');
				$this->load->view('frontend/care/giver/fields/availability/shabbos');
				$this->load->view('frontend/care/giver/fields/availability/night_nurse');
				$this->load->view('frontend/care/giver/fields/availability/vacation_sitter');
				?>    
            </div>
        </div>
        <?php
            $this->load->view('frontend/care/giver/fields/about_yourself');
            $this->load->view('frontend/care/giver/fields/references');
            $this->load->view('frontend/care/giver/fields/background'); 
        ?>

        <h2>Abilities and skills</h2>
<div class="checkbox-wrap">
        <div>
            <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>I have a Drivers license</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>I have a Vehicle</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>> <label>Able to pick up kids from school</label>
        </div>

        <div>
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Able to cook and prepare food</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Able to do light housework/ cleaning</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>> <label>Able to help with homework</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>> <label>Able to care for sick child</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="on_short_notice" <?php echo isset($on_short_notice) && $on_short_notice == 1 ? 'checked' : ''?>> <label>Available on short notice</label>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
        </div>
    </div>


</form>
</div>
</div>

