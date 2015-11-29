<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    
    <div class="dashboard-right float-right">
<div class="ad-form-container float-left">
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>
            
            <?php $this->load->view('frontend/care/giver/fields/experience'); ?>
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
					?>
				</div>
            </div>
            <?php
	            $this->load->view('frontend/care/giver/fields/about_yourself');
	            $this->load->view('frontend/care/giver/fields/references');
	            $this->load->view('frontend/care/giver/fields/background'); 
	        ?>

            <h2>Abilities</h2>
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
                <div>
                    <input type="submit" class="btn btn-success" value="Update"/>
                </div>
                </div>
        </div>
    </form>
</div>
</div>
</div>
