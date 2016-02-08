<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Senior Care Agency";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		?>

		 	<?php $willing = explode(',',$data['willing_to_work']); ?>
		 	<div>
		 		<label>Specialize In</label>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Alz./ dementia" <?php if(in_array("Alz./ dementia",$willing)){?> checked="checked" <?php } ?>>Alz. / dementia</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Sight Loss" <?php if(in_array("Sight Loss",$willing)){?> checked="checked" <?php } ?>>Sight Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Hearing Loss" <?php if(in_array("Hearing Loss",$willing)){?> checked="checked" <?php } ?>>Hearing Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="willing_to_work" name="willing_to_work" value="Wheelchair Bound" <?php if(in_array("Wheelchair Bound",$willing)){?> checked="checked" <?php } ?>>Wheelchair Bound</div>
		 	</div>
	 	
	 		
	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		</div>

