<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";
if($currency == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        if(!empty($looking_to_work)){
            $lookingtowork = explode(',',$looking_to_work);
            ?>   
            <tr>
               <td >Looking to work as</td>
               <td >            
                <div class="details-info"><?php if(in_array('Live in', $lookingtowork)){ echo $tick; }else{echo $cross; }?> Live In</div>
                <div class="details-info"><?php if(in_array("Live out", $lookingtowork)){ echo $tick; }else{echo $cross;}?> Live Out</div>                              	
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Looking to work as </td>
                    <td>N/A</td>
                </tr>
                <?php } ?>
        
            <?php
          
        if(!empty($number_of_children)){?>
        <tr>
            <td >Number of children willing to care for</td>
            <td >
                <?php echo $number_of_children ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Number of children willing to care for </td>
                    <td>N/A</td>
                </tr>
            <?php
          }        
            $optionalnumber = explode(',',$optional_number);    
            ?>
            <tr >    	
               <td></td>
               <td >    		
                <div class="details-info"><?php if(in_array('twins',$optionalnumber)){ echo $tick; }else{echo $cross; }?>  Twins</div>
                <div class="details-info"><?php if(in_array('triplets',$optionalnumber)){ echo $tick; }else{echo $cross; }?>  Triplets</div>        
            </td>
        </tr>
        <?php                
        if(!empty($age_group)){
            $age = explode(',',$age_group)
            ?>
            <tr>
               <td >Ages of children willing to care for</td>
               <td >    		
                <div class="details-info"><?php if(in_array('0-3', $age)){ echo $tick; }else{echo $cross; }?>0-3 Months</div>
                <div class="details-info"><?php if(in_array('3-6', $age)){ echo $tick; }else{echo $cross; }?>3-6 Months</div>
                <div class="details-info"><?php if(in_array('6-12', $age)){ echo $tick; }else{echo $cross; }?>6-12 Months</div>		
                <div class="details-info"><?php if(in_array('1-3', $age)){ echo $tick; }else{echo $cross; }?> 1 to 3 years</div>
                <div class="details-info"><?php if(in_array('3-5', $age)){ echo $tick; }else{echo $cross; }?> 3 to 5 years</div>
                <div class="details-info"><?php if(in_array('6-11', $age)){ echo $tick; }else{echo $cross; }?> 6 to 11 years</div>
                <div class="details-info"><?php if(in_array('13', $age)){ echo $tick; }else{echo $cross; }?> 12+ years</div>            
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Ages of children willing to care for </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
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
          }?> 
    <?php
    if(!empty($training)){
        $trainingtemp = explode(',',$training);
        ?>
        <tr>
           <td >Training </td>
           <td >
            <div class="details-info"><?php if(in_array('CPR', $trainingtemp)){ echo $tick; }else{echo $cross; } ?>  CPR</div>
            <div class="details-info"><?php if(in_array('First Aid', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> First Aid</div>
            <div class="details-info"><?php if(in_array('Nanny/ Babysitter Course', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> Nanny/ Babysitter Course</div>
            <div class="details-info"><?php if(in_array('Other', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> Other</div>                      
        </td>	
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Training</td>
                <td>N/A</td>
            </tr>
        <?php            
        } ?>
    <?php
    if(!empty($rate)){?>
    <tr>
    	<td >Rate</td>
    	<td >
            <?php echo $symbol . $rate . ' / Hr'; 
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
          }?>
    <?php
    if(!empty($availability)){
        $time = explode(',',$availability);
        ?>
        <tr id="availability1">
           <td >Availability </td>
           <td >
            <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; } ?> Immediate </div>
            <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  if ($start_date !='0000-00-00') echo $start_date;?></div>
            <div class="details-info"><?php if(in_array('Regularly', $time)){ echo $tick; }else{echo $cross;} ?>Regularly</div>
            <div class="details-info"><?php if(in_array('Morning', $time)){ echo $tick; }else{echo $cross; }?> Morning</div>
            <div class="details-info"><?php if(in_array('Afternoon', $time)){ echo $tick; }else{echo $cross; }?> Afternoon</div>
            <div class="details-info"><?php if(in_array('Evening', $time)){ echo $tick; }else{echo $cross; }?> Evening</div>
            <div class="details-info"><?php if(in_array('Shabbos', $time)){ echo $tick; }else{echo $cross; }?> Shabbos</div>
            <div class="details-info"><?php if(in_array('Night Nurse', $time)){ echo $tick; }else{echo $cross; }?> Night Nurse</div>
            <div class="details-info"><?php if(in_array('Vacation Sitter', $time)){ echo $tick; }else{echo $cross; }?>Vacation Sittter</div>            
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
          }?>
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
    <tr>
    	<td >Abilities and skills</td>
        <td >
            <div class="details-info">
                <?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> I have Drivers license
            </div>
            <div class="details-info">
                <?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?> I have Vehicle
            </div>
            <div class="details-info">
                <?php echo isset($pick_up_child) && $pick_up_child == 1 ? $tick : $cross?> Able to pick up kids from school
            </div>
            <div class="details-info">
                <?php echo isset($cook) && $cook == 1 ? $tick : $cross?> Able to cook and prepare food
            </div>
            <div class="details-info">
                <?php echo isset($basic_housework) && $basic_housework == 1 ? $tick : $cross?>Able to do housework/ cleaning
            </div>
            <div class="details-info">
                <?php echo isset($bath_children) && $bath_children == 1 ? $tick : $cross?> Able to help with homework
            </div>
            <div class="details-info">
                <?php echo isset($bed_children) && $bed_children == 1 ? $tick : $cross?> Able to bathe children
            </div>
            <div class="details-info">
                <?php echo isset($homework_help) && $homework_help == 1 ? $tick : $cross?> Able to put children to bed
            </div>
            <div class="details-info">
                <?php echo isset($sick_child_care) && $sick_child_care == 1 ? $tick : $cross?> Able to care for sick child
            </div>
            <div class="details-info">
                <?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?> Available on short notice
            </div>                           
        </td>
    </tr>
</table>   
</div>
