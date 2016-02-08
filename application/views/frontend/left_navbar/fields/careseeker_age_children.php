<?php $age_group = explode(',',$data['age_group']); ?>
<div>
 	<label>Age of children you can care for</label>
 	<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"<?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>> 0-3 months</div>
    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"<?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>> 3-6 months</div>
    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"<?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>> 6-12 months</div>                
    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"<?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>> 1 to 3 years</div>
    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"<?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>> 3 to 5 years</div>
    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"<?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>> 6 to 11 years</div>
    <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"  class="age_group"<?php if(in_array('13',$age_group)){?> checked="checked" <?php } ?>> 12+ years</div>
 </div>