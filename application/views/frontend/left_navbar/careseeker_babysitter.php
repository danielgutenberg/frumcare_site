<?php echo $this->breadcrumbs->show();?>
			<h3>
                <?php 
                    if(segment(1) == 'jobs' && (segment(2) == 'all' || segment(2) == '') )
                        echo 'Jobs';
                    else
                        echo 'Babysitter';
                ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
        <?php $cat = $this->uri->segment(2)?$this->uri->segment(2):''; ?>
	 	<form method="post" id="left-nav" action="">
 			<?php $location = explode(',',$data['looking_to_work']); ?>
 			<div>
	 			<label>Care Location</label>
	 			<div class="checkbox"><input type="checkbox" value="My home" class="looking_to_work" <?php if (in_array('My home', $location)) echo 'checked' ?>>Child's home</div>
	 			<div class="checkbox"><input type="checkbox" value="Caregiver's home" class="looking_to_work" <?php if (in_array("Caregiver's home", $location)) echo 'checked' ?>>Caregivers home</div>
	 			<div class="checkbox"><input type="checkbox" value="Mother's helper" class="looking_to_work" <?php if (in_array("Mother's helper", $location)) echo 'checked' ?>>Mother's helper</div>
	 		</div>
   	        <?php $this->load->view('frontend/left_navbar/fields/careseeker_number_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_age_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_availability', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/save_search');?>

			</form>
		  </div>
        </div>	 
	  </div>
