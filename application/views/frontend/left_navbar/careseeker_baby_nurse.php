<?php echo $this->breadcrumbs->show();?>
			<h3>
                <?php 
                    if(segment(1) == 'jobs' && (segment(2) == 'all' || segment(2) == '') )
                        echo 'Jobs';
                    else
                        echo 'Pediatric / Baby Nurse';
                ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
        <?php $cat = $this->uri->segment(2)?$this->uri->segment(2):''; ?>
	 	<form method="post" id="left-nav" action="">
   	        <?php $this->load->view('frontend/left_navbar/fields/careseeker_number_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_age_children', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/careseeker_availability', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/wage', array('data', $data)); ?>
			<?php $this->load->view('frontend/left_navbar/fields/save_search');?>

			</form>
		  </div>
