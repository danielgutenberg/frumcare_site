<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php if(!empty($$looking_to_work)){
            $lookingtowork = explode(',',$$looking_to_work);
            ?>
            <tr>
                <td>For</td>
                <td>
                    <div class="details-info"><?php if(in_array('Boys',$lookingtowork)){ echo $tick; }else{echo $cross; } ?> Boys</div>                    
                    <div class="details-info"><?php if(in_array('Girls',$lookingtowork)){ echo $tick; }else{echo $cross; } ?> Girls</div>
                    <div class="details-info"><?php if(in_array('Both',$lookingtowork)){ echo $tick; }else{echo $cross; } ?> Both</div>
                </td>
            </tr>
            <?php } ?>
            <?php
            if(!empty($age_group)){
                $age = explode(',',$age_group)
                ?>
                <tr>
                   <td >Age group</td>
                   <td >    		
                    <div class="details-info"><?php if(in_array('0-3', $age)){ echo $tick; }else{echo $cross; }?>0-3 Months</div>
                    <div class="details-info"><?php if(in_array('3-6', $age)){ echo $tick; }else{echo $cross; }?>3-6 Months</div>
                    <div class="details-info"><?php if(in_array('6-12', $age)){ echo $tick; }else{echo $cross; }?>6-12 Months</div>		
                    <div class="details-info"><?php if(in_array('1-3', $age)){ echo $tick; }else{echo $cross; }?> 1 to 3 years</div>
                    <div class="details-info"><?php if(in_array('3-5', $age)){ echo $tick; }else{echo $cross; }?> 3 to 5 years</div>
                    <div class="details-info"><?php if(in_array('6-11', $age)){ echo $tick; }else{echo $cross; }?> 6 to 11 years</div>
                    <div class="details-info"><?php if(in_array('12+', $age)){ echo $tick; }else{echo $cross; }?> 12+ years</div>            
                </td>
            </tr>
            <?php } ?>
            <?php
            if(!empty($number_of_children)){ ?>
            <tr>
                <td >Number of children in group</td>
                <td >
                    <?php echo $number_of_children ?>
                </td>
            </tr>
            <?php } ?>
            <?php
            if(!empty($number_of_staff)){ ?>
            <tr>
                <td >Number of staff</td>
                <td >
                    <?php echo $number_of_staff ?>
                </td>
            </tr>
            <?php } ?>
            <?php
            if(!empty($experience)){?>
            <tr>
               <td >Years of experience</td>
               <td >    		
                <?php echo $experience; ?>  
            </td>
        </tr>
        <?php } ?>
        <?php
        if(!empty($rate)){?>
        <tr>
           <td >Cost</td>
           <td >    		
            <?php echo $rate; ?>  
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td>Days/ Hours</td>         
        <td>
           <?php if(!empty($sunday_from) && !empty($sunday_to)) {?>
           Sun <?php echo $sunday_from; ?> to <?php echo $sunday_to;} ?>
           <?php if(!empty($mid_days_from) && !empty($mid_days_to)) { ?>
           <br/>Mon-Thu <?php echo $mid_days_from; ?> to <?php echo $mid_days_to; }?>
           <?php if(!empty($friday_from) && !empty($friday_to)){ ?>
           <br/>Fri <?php echo $friday_from; ?> to <?php echo $friday_to; }?>          
           <div class="details-info"><?php if($extended_hrs == 1){ echo $tick; }else{echo $cross; }?>  Extended Hours Available</div>
           <div class="details-info"><?php if($flexible_hours == 1){ echo $tick; }else{echo $cross; }?> Flexible Hours</div>     
       </td>
   </tr>
   <?php if(!empty($vacation_days)){?>
   <tr>
       <td>Vacation Days</td>
       <td><?php echo $vacation_days; ?></td>          
   </tr>
   <?php } ?>
   <?php if(!empty($pdf)){?>
   <tr>
       <td>Pdf file</td>
       <td><a href="#">Download</a></td>          
   </tr>
   <?php } ?>
</table>     
</div>
