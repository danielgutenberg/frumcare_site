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
        <div class="details-info"><?php if(in_array('Home of senior',$lookingtowork)){echo $tick; }else{echo $cross; } ?> <span>Home of senior</span></div>
        <div class="details-info"><?php if(in_array('Live In',$lookingtowork)){echo $tick; }else{echo $cross; } ?> <span>Live In</span></div>
        <div class="details-info"><?php if(in_array('Live Out',$lookingtowork)){echo $tick; }else{echo $cross; } ?> <span>Live Out</span></div>
        <div class="details-info"><?php if(in_array('Caregiving institution',$lookingtowork)){echo $tick; }else{echo $cross; } ?> <span>Caregiving Institution</span></div>	
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
          } ?>
          
         
          
    <?php      
    if(!empty($experience)){?>
    <tr>
    	<td >Years of experience</td>
    	<td >    		
        <?php if ($experience == '6') {echo '5+'; } else {echo $experience;} ?>  
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
        <div class="details-info"><?php if(in_array('CPR', $trainingtemp)){echo $tick; }else{echo $cross; } ?>  CPR</div>
        <div class="details-info"><?php if(in_array('First Aid', $trainingtemp)){echo $tick; }else{echo $cross; } ?> First Aid</div>
        <div class="details-info"><?php if(in_array('Senior Care Training', $trainingtemp)){echo $tick; }else{echo $cross; } ?> Senior Care Training</div>
        <div class="details-info"><?php if(in_array('Nurse', $trainingtemp)){echo $tick; }else{echo $cross; } ?> Nurse</div>
        <div class="details-info"><?php if(in_array('Other', $trainingtemp)){echo $tick; }else{echo $cross; } ?> Other</div>                      
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
       <td >Able to work with </td>
       <td >
        <div class="details-info"><?php if(in_array('Alz./ Dementia', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Alz./ Dementia</span></div>
        <div class="details-info"><?php if(in_array('Sight loss', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Sight loss</span></div>                                        
        <div class="details-info"><?php if(in_array('Hearing loss', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Hearing loss</span></div>
        <div class="details-info"><?php if(in_array('Wheelchair bound', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Wheelchair bound</span></div>                                        	
        <div class="details-info"><?php if(in_array('Able To Tend To Personal Hygiene of Senior', $tempwillingtowork)){echo $tick; }else{echo $cross; }?><span>Able To Tend To Personal Hygiene of Senior</span></div>                      
      </td>	
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Able to work with </td>
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
		    <?php if($references == 1) { ?>
		        <td> Yes
		        <?php if ($reference_file) {?> 
		            <a href="<?php echo site_url();?>uploads/files/<?php echo $reference_file;?>" target="_blank">Download</a>
		            <?php } ?>
		        </td>
		        <?php  }
		    else {?><td>N/A</td><?php }?> 
		
	</tr>
     <tr style="display:none;">
    	<td >Agree to Background Check?</td>
    	<td >
    		<?php if ($agree_bg_check == 1) { echo 'yes';}
    		else { echo 'no';} ?>
    	</td>
    </tr>
     <?php
    if(!empty($availability)){
      $time = explode(',',$availability);
      ?>
      <tr id="availability1">
       <td >Availability </td>
       <td >
        <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; }?>Immediate</div>
        <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  if ($start_date !='0000-00-00') echo $start_date;?></div>
            <div class="details-info"><?php if(in_array('Regularly', $time)){echo $tick; }else{echo $cross; }?> <span>Regularly</span></div>
        <div class="details-info"><?php if(in_array('Morning', $time)){echo $tick; }else{echo $cross; }?> <span>Morning</span></div>
        <div class="details-info"><?php if(in_array('Afternoon', $time)){echo $tick; }else{echo $cross; }?> <span>Afternoon</span></div>
        <div class="details-info"><?php if(in_array('Evening', $time)){echo $tick; }else{echo $cross; }?> <span>Evening</span></div>
        <div class="details-info"><?php if(in_array('Overnight', $time)){echo $tick; }else{echo $cross; }?><span>Overnight</span></div>
        <div class="details-info"><?php if(in_array('Weekends Fri./Sun.', $time)){echo $tick; }else{echo $cross; }?> <span>Weekends Fri./Sun.</span></div>
        <div class="details-info"><?php if(in_array('Shabbos', $time)){echo $tick; }else{echo $cross; }?><span>Shabbos</span></div>
        <div class="details-info"><?php if(in_array('24 hr care', $time)){echo $tick; }else{echo $cross; }?> <span>24 hr care</span></div>            
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
          } ?>
    <tr>
    	<td >Abilities</td>
      <td >
        <div class="details-info"><?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license</div>
        <div class="details-info"><?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?> Vehicle</div>
        <div class="details-info"><?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?> Available on short notice</div>            
      </td>
    </tr>
  </table>
</div>
