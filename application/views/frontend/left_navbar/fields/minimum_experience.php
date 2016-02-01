<div class="year-exp">
 	<span>Minimum Experience</span>
 		<select name="year_experience" class="required year_experience">
 		<option value="">--select--</option>
 			<option <?php if ($data['min_exp'] == 1) echo 'selected' ?> value="1">1 year</option>	
 			<option <?php if ($data['min_exp'] == 2) echo 'selected' ?> value="2">2 years</option>	
 			<option <?php if ($data['min_exp'] == 3) echo 'selected' ?> value="3">3 years</option>	
 			<option <?php if ($data['min_exp'] == 4) echo 'selected' ?> value="4">4 years</option>	
 			<option <?php if ($data['min_exp'] == 6) echo 'selected' ?> value="6">5+ years</option>	
 		</select>
 </div>