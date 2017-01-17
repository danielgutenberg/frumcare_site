<?php
if (isset($date) && $date != '0000-00-00' && $date != '00-00-0000') {
        if ( date_create_from_format( 'Y-m-d', $date ) ) {
            $date = date_create_from_format('Y-m-d', $date)->format('m/d/Y');
        } else {
            $date = $date;
        }
    } else {
        $date = '00-00-0000';
    }
?>
<div class="checkbox full"><input type="checkbox" id="ckbox1" name="availability[]" value="Start Date" <?php if(in_array("Start Date",$availability)){?> checked="checked"<?php }?> class="start_date">Start Date <input type="text" name="start_date" value="<?php if($date!='00-00-0000'){ echo $date;}?>" id="dateTextbox"/></div>
                