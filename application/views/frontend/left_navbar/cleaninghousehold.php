
			<h3>Cleaning / household help company</h3>  			
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php $location = explode(',',$data['looking_to_work']); ?>
	 		<div>
	 			<label>For</label>
	 			<div class="checkbox"><input type="checkbox" value="Home" class="looking_to_work" <?php if(in_array("Private Home",$location)){?> checked="checked" <?php } ?>>Home</div>
	 			<div class="checkbox"><input type="checkbox" value="Office/Business" class="looking_to_work" <?php if(in_array("Office/Business",$location)){?> checked="checked" <?php } ?>>Office / Business</div>
	 		</div>
            <?php $willing = explode(',',$data['willing_to_work']); ?>
            <div>
	 			<label>Specialize in</label>
	 			<div class="checkbox"><input type="checkbox" value="Dishes" class="willing_to_work" <?php if(in_array("Dishes",$willing)){?> checked="checked" <?php } ?>>Dishes</div>
	 			<div class="checkbox"><input type="checkbox" value="Floors" class="willing_to_work" <?php if(in_array("Floors",$willing)){?> checked="checked" <?php } ?>>Floors</div>
	 			<div class="checkbox"><input type="checkbox" value="Windows" class="willing_to_work" <?php if(in_array("Windows",$willing)){?> checked="checked" <?php } ?>>Windows</div>
                <div class="checkbox"><input type="checkbox" value="Laundry" class="willing_to_work" <?php if(in_array("Laundry",$willing)){?> checked="checked" <?php } ?>>Laundry</div>
                <div class="checkbox"><input type="checkbox" value="Folding" class="willing_to_work" <?php if(in_array("Folding",$willing)){?> checked="checked" <?php } ?>>Folding</div>
                <div class="checkbox"><input type="checkbox" value="Ironing" class="willing_to_work" <?php if(in_array("Ironing",$willing)){?> checked="checked" <?php } ?>>Ironing</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning and dusting furniture" class="willing_to_work" <?php if(in_array("Cleaning and dusting furniture",$willing)){?> checked="checked" <?php } ?>>Cleaning and dusting furniture</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning refrigerator freezer" class="willing_to_work" <?php if(in_array("Cleaning refrigerator freezer",$willing)){?> checked="checked" <?php } ?>>Cleaning refrigerator / freezer</div>                
                <div class="checkbox"><input type="checkbox" value="Cleaning oven stove" class="willing_to_work" <?php if(in_array("Cleaning oven stove",$willing)){?> checked="checked" <?php } ?>>Cleaning oven / stove</div>
                <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" class="willing_to_work" <?php if(in_array("Pesach Cleaning",$willing)){?> checked="checked" <?php } ?>>Pesach Cleaning</div>
	 		</div>
	 		
	 		<?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

