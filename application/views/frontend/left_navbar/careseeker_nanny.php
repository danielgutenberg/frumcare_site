
			<h3><?php echo "Nanny/Au-Pair";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
            <?php $location = explode(',',$data['looking_to_work']); ?>
            <div>
	 			<label>Nanny Type</label>
	 			<div class="checkbox"><input type="checkbox" value="Live In" class="looking_to_work" <?php if (in_array('Live In', $location)) echo 'checked' ?>>Live In</div>
	 			<div class="checkbox"><input type="checkbox" value="Live Out" class="looking_to_work" <?php if (in_array('Live Out', $location)) echo 'checked' ?>>Live Out</div>
	 		</div>
   	        <?php $this->load->view('frontend/left_navbar/fields/careseeker_number_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_age_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_availability', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/save_search');?>

