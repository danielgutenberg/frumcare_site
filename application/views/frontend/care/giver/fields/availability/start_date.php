<div class="checkbox full"><input type="checkbox" id="ckbox1" name="availability[]" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked"<?php }?> class="start_date">Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="dateTextbox"/></div>
                