<?php $training = explode(',',$data['training']); ?>
<div>
 	<label>Training</label>
 	<div class="checkbox first"><input type="checkbox" class="training" value="CPR" <?php if(in_array("CPR",$training)){?> checked="checked" <?php } ?>>CPR</div>
 	<div class="checkbox"><input type="checkbox" class="training" value="First Aid" <?php if(in_array("First Aid",$training)){?> checked="checked" <?php } ?>>First Aid</div>
 	<div class="checkbox"><input type="checkbox" class="training" value="Nanny/ Babysitter Course" <?php if(in_array("Nanny/ Babysitter Course",$training)){?> checked="checked" <?php } ?>>Nanny / Babysitter Course</div>
 	<div class="checkbox"><input type="checkbox" class="training" value="Nurse" <?php if(in_array("Nurse",$training)){?> checked="checked" <?php } ?>>Nurse</div>
 	<div class="checkbox"><input type="checkbox" class="training" value="Other" <?php if(in_array("Other",$training)){?> checked="checked" <?php } ?>>Other</div>
 </div>