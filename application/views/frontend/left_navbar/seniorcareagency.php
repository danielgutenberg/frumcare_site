<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Senior Care Agency";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		?>

	 		<div>
	 			<label>Specialize in</label>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Alz./dementia" class="willing_to_work">Alz. / dementia</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Sight Loss" class="willing_to_work">Sight Loss</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Hearing Loss" class="willing_to_work">Hearing Loss</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Wheelchair bound" class="willing_to_work">Wheelchair bound</div>	 			
	 		</div>
	 	
	 		
	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		</div>

