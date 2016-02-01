<?php echo $this->breadcrumbs->show();?>
			<h3>Cleaning / household help company</h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php $location = explode(',',$data['looking_to_work']); ?>
	 		<div>
	 			<label>For</label>
	 			<div class="checkbox"><input type="checkbox" value="Home" class="looking_to_work" <?php if(in_array("Private Home",$location)){?> checked="checked" <?php } ?>>Home</div>
	 			<div class="checkbox"><input type="checkbox" value="Office/Business" class="looking_to_work" <?php if(in_array("Office/Business",$location)){?> checked="checked" <?php } ?>>Office / Business</div>
	 		</div>
            <div>
	 			<label>Specialize in</label>
	 			<div class="checkbox"><input type="checkbox" value="Dishes" class="willing_to_work">Dishes</div>
	 			<div class="checkbox"><input type="checkbox" value="Floors" class="willing_to_work">Floors</div>
	 			<div class="checkbox"><input type="checkbox" value="Windows" class="willing_to_work">Windows</div>
                <div class="checkbox"><input type="checkbox" value="Laundry" class="willing_to_work">Laundry</div>
                <div class="checkbox"><input type="checkbox" value="Folding" class="willing_to_work">Folding</div>
                <div class="checkbox"><input type="checkbox" value="Ironing" class="willing_to_work">Ironing</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning and dusting furniture" class="willing_to_work">Cleaning and dusting furniture</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning refrigerator freezer" class="willing_to_work">Cleaning refrigerator / freezer</div>                
                <div class="checkbox"><input type="checkbox" value="Cleaning oven stove" class="willing_to_work">Cleaning oven / stove</div>
                <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
	 		</div>
	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

			</form>
		  </div>
