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
                <h1 class="step3">Edit Job Details</h1>
            </div>

            
            <div>
				<label>Looking to work in</label>
				<div class="form-field">
					<?php 
	                    $this->load->view('frontend/care/giver/fields/work_location/home_of_senior');
	                    $this->load->view('frontend/care/giver/fields/work_location/line_in');
	                    $this->load->view('frontend/care/giver/fields/work_location/live_out');
	                    $this->load->view('frontend/care/giver/fields/work_location/caregiving_institution');
	                ?>
				</div>
			</div>
            
            <div>
                <label>Years of experience</label>
                <div class="form-field">
                    <select name="experience" class="txt">
                        <option value="">Select years of experience</option>
                        <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                        <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                        <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                        <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                        <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Training</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR', $training)){?> checked="checked" <?php } ?>> <span>CPR</span></div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid', $training)){?> checked="checked" <?php } ?>> <span>First Aid</span></div>                
                    <div class="checkbox"><input type="checkbox" value="Senior Care Training" name="training[]" <?php if(in_array('Senior Care Training', $training)){?> checked="checked" <?php } ?>> <span>Senior Care Training</span></div>
                    <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse', $training)){?> checked="checked" <?php } ?>> <span>Nurse</span></div>
                    <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other', $training)){?> checked="checked" <?php } ?>> <span>Other</span></div>                                                    
                </div>
            </div>
            <div>
                <label>Able to work with</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]" <?php if(in_array('Alz./ Dementia', $willingtowork)){?> checked="checked"<?php }?>> <span>Alz./ Dementia</span></div>
                    <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss', $willingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>                                        
                    <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss', $willingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                    <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>                                        	
                    <div class="checkbox"><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]" <?php if(in_array('Able To Tend To Personal Hygiene of Senior', $willingtowork)){?> checked="checked"<?php }?>><span>Able To Tend To Personal Hygiene of Senior</span></div>						
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
						$this->load->view('frontend/care/giver/fields/availability/overnight');
						$this->load->view('frontend/care/giver/fields/availability/weekend');
						$this->load->view('frontend/care/giver/fields/availability/shabbos');
						$this->load->view('frontend/care/giver/fields/availability/twenty_four_hours');
					?>
				</div>
            </div>
            <?php
                $this->load->view('frontend/care/giver/fields/rate');
                $this->load->view('frontend/care/giver/fields/about_yourself');
                $this->load->view('frontend/care/giver/fields/references');
                $this->load->view('frontend/care/giver/fields/background'); 
            ?>
            

            <h2>Abilities (check if yes)</h2>

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
