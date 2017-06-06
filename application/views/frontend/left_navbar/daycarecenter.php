
			<h3><?php echo "Day Care Center / Day Camp / Afternoon Activities";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<div>
                <label>Type of Organization</label>
                <select name="sub_care" class="sub_care">
                    <option value="">Select</option>
                    <option value="day care center">Day Care Center</option>
                    <option value="day camp">Day Camp</option>
                    <option value="afternoon activities">Afternoon Activities</option>
                    <option value="pre school">Pre-School</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label>For</label>
                <div class="radio"><input type="radio" name="willing_to_work" class="willing_to_work" value="Boys" <?php if ($data['willing_to_work'] == 'Boys') echo 'checked' ?>/>Boys</div>
                <div class="radio"><input type="radio" name="willing_to_work" class="willing_to_work" value="Girls" <?php if ($data['willing_to_work'] == 'Girls') echo 'checked' ?>/>Girls</div>
                <div class="radio"><input type="radio" name="willing_to_work" class="willing_to_work" value="" <?php if ($data['willing_to_work'] == '') echo 'checked' ?>/>Any</div>
            </div>
   	        <?php $age_group = explode(',',$data['age_group']); ?>
            <div>
	 			<label>For Ages</label>
	 			<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"  class="age_group" <?php if(in_array('13',$age_group)){?> checked="checked" <?php } ?>> 12+ years</div>
	 		</div>
	 		<?php $this->load->view('frontend/left_navbar/fields/languages'); ?> 		
            <?php $this->load->view('frontend/left_navbar/fields/save_search'); ?>

