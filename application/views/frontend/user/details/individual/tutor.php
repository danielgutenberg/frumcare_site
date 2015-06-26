<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php 
        if(!empty($subjects)){
            $subjects = explode(',',$subjects);
            ?>   
            <tr>
               <td >Subject(s)</td>
               <td >    		
                <div class="details-info"><?php if(in_array("Elementary school",$subjects)){ echo $tick; }else{ echo $cross; }?> Elementary school</div>
                <div class="details-info"><?php if(in_array("High school",$subjects)){ echo $tick; }else{ echo $cross; }?> High school</div>
                <div class="details-info"><?php if(in_array("Post high school",$subjects)){ echo $tick; }else{ echo $cross; }?>Post High school</div>
                <div class="details-info"><?php if(in_array("limudei kodesh",$subjects)){ echo $tick; }else{ echo $cross; }?> Limudei kodesh</div>                
                <div class="details-info"><?php if(in_array("general studies",$subjects)){ echo $tick; }else{ echo $cross; }?>General studies</div>
                <div class="details-info"><?php if(in_array("Special ed",$subjects)){ echo $tick; }else{ echo $cross; }?> Special ed</div>
                <div class="details-info"><?php if(in_array("Music",$subjects)){ echo $tick; }else{ echo $cross; }?> Music</div>
                <div class="details-info"><?php if(in_array("Art",$subjects)){ echo $tick; }else{ echo $cross; }?> Art</div>                
                <div class="details-info"><?php if(in_array("Other",$subjects)){ echo $tick; }else{ echo $cross; }?> Other</div>  
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Subject(s) </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
        if(!empty($availability)){
            $temp = explode(',',$availability);
            ?>
            <tr id="availability1">
               <td >Availability </td>
               <td >
                <div class="details-info"><?php if(in_array("Immediate",$temp)){ echo $tick; }else{ echo $cross; }?> Immediately</div>
                <div class="details-info"><?php if(in_array("Start Date",$temp)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
                <div class="details-info"><?php if(in_array("occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array('Weekends fri/sun', $temp)){echo $tick; }else{ echo $cross; }?>Weekends fri/sun</div>                                                
                <div class="details-info"><?php if(in_array("By Appointment",$temp)){ echo $tick; }else{ echo $cross; }?> By appointment</div>                                    
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
          } ?>
          
    <tr>
        <td>References</td>
		<td>
		    <?php if($references == 1) {
		        echo 'Yes';
		        if ($reference_file) {?> 
		            <a href="<?php echo site_url();?>uploads/files/<?php echo $reference_file;?>" target="_blank">Download</a>
		        <?php } }
		    else { echo 'N/A'; }?> 
		</td>
	</tr>
    <tr style="display:none;">
    	<td >Agree to Background Check?</td>
    	<td >
    		<?php if ($agree_bg_check == 1) { echo 'yes';}
    		else { echo 'no';} ?>
    	</td>
    </tr>
    <tr>
    	<td >Abilities and skills</td>
        <td >
         <div class="details-info">
            <?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license
        </div>
        <div class="details-info">
            <?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?> Vehicle
        </div>
        <div class="details-info">
            <?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?> Available on short notice
        </div>            
    </td>
</tr> 
</table>   
</div>