<?php $availability = explode(',',$data['availability']); ?>
<div style="font-size:12px">
 	<label style="font-size:13px; font-weight:600; margin-bottom:6px;">Job Start Date</label>
 	<div class="row">
 	    <div class="col-xs-5">
 	        <input style="margin-right: 5px; margin-bottom:9px" name ="when_care" type="radio" class="availability" value="Immediate" <?php if(in_array("Immediate",$availability)){?> checked="checked" <?php } ?>>Immediately
 	    </div>
 	    <div class="col-xs-5">
 	        <input style="margin-right: 5px; margin-bottom:9px" name ="when_care" type="radio" class="availability" value="Occasionally" <?php if(in_array("Occasionally",$availability)){?> checked="checked" <?php } ?>>Within a week
 	    </div>
 	    <div class="col-xs-5">
 	        <input style="margin-right: 5px; margin-bottom:9px" name ="when_care" type="radio" class="availability" value="Regularly" <?php if(in_array("Regularly",$availability)){?> checked="checked" <?php } ?>>Within a month
 	    </div>
 	    <div class="col-xs-5">
 	        <input style="margin-right: 5px; margin-bottom:9px" name ="when_care" type="radio" class="availability" value="Morning" <?php if(in_array("Morning",$availability)){?> checked="checked" <?php } ?>>Longer than a month
        </div>
    </div>
 </div>