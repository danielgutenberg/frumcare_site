<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>   
<div class="table-responsive">
    <table class="table table-striped borderbottom">
       <?php if(!empty($location)){ ?>
        <!--<tr>-->
        <!--    <td>Location</td>-->
        <!--    <td>-->
        <!--        <?php //echo $location; ?>-->
        <!--    </td>-->
        <!--</tr>-->
    <?php }else{
            ?>
                <!--<tr>-->
                <!--    <td >Location </td>-->
                <!--    <td>N/A</td>-->
                <!--</tr>-->
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
    <?php }  else{
            ?>
                <tr>
                    <td >Years of experience </td>
                    <td>N/A</td>
                </tr>
            <?php
          }?> 
    
    <?php
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
                    <td >Rate</td>
                    <td>N/A</td>
                </tr>
            <?php
          }?>
    
    <?php
    if(!empty($availability)){
        $time = explode(',',$availability);
        ?>
        <tr id="availability1">
        	<td >Availability </td>
        	<td >
                <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; } ?> Immediate </div>
                <div class="details-info"><?php if(in_array("Start date",$time)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
                <div class="details-info"><?php if(in_array('Occassionally', $time)){ echo $tick; }else{echo $cross; } ?>Occassionally</div>
                <div class="details-info"><?php if(in_array('Regularly', $time)){ echo $tick; }else{echo $cross;} ?>Regularly</div>
                <div class="details-info"><?php if(in_array('Morning', $time)){ echo $tick; }else{echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array('Afternoon', $time)){ echo $tick; }else{echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array('Evening', $time)){ echo $tick; }else{echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array('Weekends Fri./Sun.', $time)){ echo $tick; }else{echo $cross; }?> Weekends Fri./Sun.</div>            
                <div class="details-info"><?php if(in_array('Saturday', $time)){ echo $tick; }else{echo $cross; }?>Saturday</div>                                       
            </td>
        </tr>
        <?php } 
        else{
            ?>
                <tr>
                    <td >Availability</td>
                    <td>N/A</td>
                </tr>
            <?php
          }   ?>
          
          
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
        <td>Abilities</td>
        <td>
            <div class="details-info"><?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license</div>
            <div class="details-info"><?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?> Vehicle</div>
            <div class="details-info"><?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?> Available on short notice</div>
        </td>
    </tr>
</table>   
</div>
