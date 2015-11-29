<?php $this->load->view('frontend/care/giver/edit_variables'); ?>
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
       <?php $this->load->view('frontend/user/dashboard_nav');?>
   </div>
   <div class="dashboard-right float-right">

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post" id="personal-details-form">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>

            <div>
                <label>Looking to work in</label>
                <div class="form-field">
                    <?php 
                    $this->load->view('frontend/care/giver/fields/work_location/private_home');
                    $this->load->view('frontend/care/giver/fields/work_location/business');
                    $this->load->view('frontend/care/giver/fields/work_location/cleaning_company');
                    $this->load->view('frontend/care/giver/fields/work_location/mothers_helper');
                    ?>                
                </div>
            </div>
            <?php $this->load->view('frontend/care/giver/fields/experience'); ?>
            <?php $this->load->view('frontend/care/giver/fields/rate'); ?>

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
                    <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer', $willingtowork)){?> checked="checked" <?php }?>><span>Cleaning Refrigerator / Freezer</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stove', $willingtowork)){?> checked="checked" <?php }?>><span>Cleaning Oven / Stove</span></div>
                    <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]" <?php if(in_array('Pesach Cleaning', $willingtowork)){?> checked="checked" <?php } ?> ><span>Pesach Cleaning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]" <?php if(in_array('Able to watch children as well', $willingtowork)){?> checked="checked" <?php }?>><span>Able to watch children as well</span></div>
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
        
            <h2>Skills</h2>
    
            <div class="checkbox-wrap">
                    <div>
                        <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>Drivers license</label>
                    </div>
                    <div>
                        <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>Vehicle</label>
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
