<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        if(!empty($looking_to_work)){
            $lookingtowork = explode(',',$looking_to_work);
            ?>   
            <tr>
               <td >Looking to work in</td>
               <td >            
                <div class="details-info"><?php if(in_array('Patients home', $lookingtowork)){echo $tick; }else{echo $cross; }?> Patients home</div>
                <div class="details-info"><?php if(in_array('Caregiving institution', $lookingtowork)){echo $tick; }else{echo $cross; }?> Caregiving institution</div>	
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Looking to work in </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
         ?>
          
          <?php if(!empty($location)){ ?>
        <tr>
            <td>Location</td>
            <td>
                <?php echo $location; ?>
            </td>
        </tr>
    <?php }else{
            ?>
                <tr>
                    <td >Location </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
          
    <?php
        if(!empty($experience)){?>
        <tr>
           <td >Years of experience</td>
           <td >    		
            <?php echo $experience; ?>  
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Years of experience </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    if(!empty($training)){
        $trainingtemp = explode(',',$training);
        ?>
        <tr>
           <td >Training </td>
           <td >
            <div class="details-info"><?php if(in_array('CPR', $trainingtemp)){echo $tick; }else{echo $cross; } ?> <span>CPR</span></div>
            <div class="details-info"><?php if(in_array('First Aid', $trainingtemp)){echo $tick; }else{echo $cross; } ?> <span>First Aid</span></div>                    
            <div class="details-info"><?php if(in_array('Nurse', $trainingtemp)){echo $tick; }else{echo $cross; } ?> <span>Nurse</span></div>
            <div class="details-info"><?php if(in_array('Other', $trainingtemp)){echo $tick; }else{echo $cross; } ?><span>Other</span></div>                                        
            <div class="details-info"><?php if(in_array('Special Needs Training', $trainingtemp)){echo $tick; }else{echo $cross; } ?> <span>Special Needs Training</span></div>                      
        </td>	
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Training </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    if(!empty($willing_to_work)){
        $tempwillingtowork = explode(',',$willing_to_work);
        ?>
        <tr>
           <td >Able to work with to work</td>
           <td >
            <div class="details-info"><?php if(in_array('Autism', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Autism</span></div>
            <div class="details-info"><?php if(in_array('Down Syndrome', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Down Syndrome</span></div>                    
            <div class="details-info"><?php if(in_array('Handicapped', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Handicapped</span></div>
            <div class="details-info"><?php if(in_array('Wheelchair bound', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Wheelchair bound</span></div>                      
        </td>	
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Able to work with to work </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    if(!empty($rate)){?>
    <tr>
    	<td >Rate</td>
    	<td >
            <?php echo $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Rate Available</div>    
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Rate </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    if(!empty($availability)){
        $time = explode(',',$availability);
        ?>
        <tr id="availability1">
           <td >Availability </td>
           <td >
            <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; }?>Immediate</div>
            <div class="details-info"><?php if(in_array("Start date",$time)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
            <div class="details-info"><?php if(in_array("Occassionally",$time)){echo $tick; }else{echo $cross; }?> <span>Occassionally</span></div>
            <div class="details-info"><?php if(in_array("Regularly",$time)){echo $tick; }else{echo $cross; }?> <span>Regularly</span></div>
            <div class="details-info"><?php if(in_array("Morning",$time)){echo $tick; }else{echo $cross; }?> <span>Morning</span></div>
            <div class="details-info"><?php if(in_array("Afternoon",$time)){echo $tick; }else{echo $cross; }?> <span>Afternoon</span></div>
            <div class="details-info"><?php if(in_array("Evening",$time)){echo $tick; }else{echo $cross; }?> <span>Evening</span></div>					
            <div class="details-info"><?php if(in_array("Weekends Fri./Sun.",$time)){echo $tick; }else{echo $cross; }?> <span>Weekends Fri./Sun.</span></div>					
            <div class="details-info"><?php if(in_array("Shabbos",$time)){echo $tick; }else{echo $cross; }?> <span>Shabbos</span></div>					
            <div class="details-info"><?php if(in_array("24 hr care",$time)){echo $tick; }else{echo $cross; }?> <span>24 hr care</span></div>            
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Availability </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    if($references==1){?>
    <tr>
    	<td >References</td>
    	<td >
    		<a href="#">Download</a>
    	</td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >References </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?> 
    <tr style="display:none;">
    	<td >Agree to Background Check?</td>
    	<td >
    		<?php if ($agree_bg_check == 1) { echo 'yes';}
    		else { echo 'no';} ?>
    	</td>
    </tr>
    <tr>
    	<td >Abilities</td>
        <td >
            <div class="details-info">
                <?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license
            </div>
            <div class="details-info">
                <?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?>Vehicle
            </div>
            <div class="details-info">
                <?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?> Available on short notice
            </div>          
        </td>
    </tr>
</table>
</div>