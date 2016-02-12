<?php
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Personal Details</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } ?>
<div class="container">
<?php 
    if(($this->uri->segment(2) != 'new_profile')){
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/savejobdetails', $attributes);
    } else {
        $this->load->helper('form');
        $attributes = array('id' => 'newJob');
        echo form_open('ad/addprofileconfirm', $attributes);
        if(!empty($record)){
            echo form_hidden('account_category',$record['ac_type']);
            echo form_hidden('care_type',$record['submit_id']);
            echo form_hidden('account_type',$record['account_type']);
            echo form_hidden('organization_care',$record['organization_care']);
        }
    } 
?>
<div class="ad-form-container">
	 <?php if($this->uri->segment(2) != 'new_profile'){?>
       <div>
            <h1 class="step3">Step 3: Job Details</h1>
        </div>

	<?php } ?>
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
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="0-3"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-6"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-12"> 6-12 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="1-3"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-5"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-11"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="13"> 12+ years</div>
            </div>
        </div>
        
        <?php $this->load->view('frontend/care/giver/fields/experience'); ?>
        <div>
            <div class="form-field">
                <label>Training</label>
                <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> <span>CPR</span></div>
                <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> <span>First Aid</span></div>
                <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter Course" name="training[]"> <span>Nanny/ Babysitter Course</span></div>
                <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]"> <span>Nurse</span></div>
                <div class="checkbox"><input type="checkbox" value="Other" name="training[]"> <span>Other</span></div>
            </div>
        </div>
        <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
        <div>
            <label>Availability</label>
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

        <div class="checkbox">
            <input type="checkbox" value="1" name="driver_license"> I have a Drivers license
        </div>

        <div class="checkbox">
            <input type="checkbox" value="1" name="vehicle">I have a Vehicle
        </div>

        <div class="checkbox">
            <input type="checkbox" value="1" name="pick_up_child">Able to pick up kids from school
        </div>

        <div class="checkbox">
            <input type="checkbox" value="1" name="cook">Able to cook and prepare food
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="basic_housework">Able to do light housework / cleaning
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="homework_help">Able to help with homework
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="sick_child_care">Able to care for sick child
        </div>
        <div class="checkbox">
            <input type="checkbox" value="1" name="on_short_notice">Available on short notice
        </div>

    <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
    <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>

        <div class="checkbox">
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
        </div>
</form>
</div>