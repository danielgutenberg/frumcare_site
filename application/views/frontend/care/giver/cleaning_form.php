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
        echo form_open('ad/addprofileconfirm');
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
                        $this->load->view('frontend/care/giver/fields/work_location/private_home');
                        $this->load->view('frontend/care/giver/fields/work_location/business');
                        $this->load->view('frontend/care/giver/fields/work_location/cleaning_company');
                    ?>                
                </div>
            </div>
            
            <?php $this->load->view('frontend/care/giver/fields/experience'); ?>
            <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
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
    				?>
                </div>
            </div>
            <?php
                $this->load->view('frontend/care/giver/fields/about_yourself');
                $this->load->view('frontend/care/giver/fields/references');
                $this->load->view('frontend/care/giver/fields/background'); 
            ?>

            <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
            <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


        <h2>Abilities and Skills</h2>
            <div class="checkbox-wrap">
                <div>
                    <input type="checkbox" value="1" name="driver_license"> Drivers license
                </div>
                <div>
                    <input type="checkbox" value="1" name="vehicle"> Vehicle
                </div>
                <div>
                    <input type="checkbox" value="1" name="on_short_notice"> Available on short notice
                </div>
                
            </div>
            <br />
            <div>
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
    </form>
</div>
