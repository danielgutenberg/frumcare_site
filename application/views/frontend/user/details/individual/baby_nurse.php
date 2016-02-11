<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";
if($currency == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
?>
<!-- Start Babysitter-->    
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php        
            $lookingtowork = explode(',',$looking_to_work);            
            ?>   

            
        <?php       
        if(!empty($number_of_children)){?>
        <tr>
            <td >Number of children willing to care for</td>
            <td >
                <?php echo $number_of_children ?>
            </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
                <td>Number of children willing to care for</td>
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
        else{ ?>
            <tr>
                <td>Ages of children willing to care for</td>
                <td>N/A</td>
            </tr>
        <?php            
        }
          if(!empty($experience)){?>
    <tr>
    	<td>Years in Practice</td>
    	<td>    		
            <?php if ($experience == '6') {echo '5+'; } else {echo $experience;} ?>  
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td>Years in Practice</td>
                    <td>N/A</td>
                </tr>
            <?php
          }
                if(!empty($certification)){
                    if(segment(4)== 7 ){
                        $info = "Information";
                    }else{
                        $info = "";
                    }
        ?>
    <tr>
    	<td >Certification / License information</td>
    	<td >    		
            <?php echo $certification; ?>  
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Certification / License information</td>
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
    else{ ?>
            <tr>
                <td>Rate</td>
                <td>N/A</td>
            </tr>
        <?php            
        } ?>
    
    <?php 
    if(!empty($availability)){
        $time = explode(',',$availability);
        ?>
        <tr id="availability1">
           <td >Availability </td>
           <td >
            <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; } ?> Immediate </div>
            <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  if ($start_date !='0000-00-00') echo $start_date;?></div>
            <div class="details-info"><?php if(in_array('Occassionally', $time)){ echo $tick; }else{echo $cross; } ?>Occassionally</div>
            <div class="details-info"><?php if(in_array('Regularly', $time)){ echo $tick; }else{echo $cross;} ?>Regularly</div>
            <div class="details-info"><?php if(in_array('Morning', $time)){ echo $tick; }else{echo $cross; }?> Morning</div>
            <div class="details-info"><?php if(in_array('Afternoon', $time)){ echo $tick; }else{echo $cross; }?> Afternoon</div>
            <div class="details-info"><?php if(in_array('Evening', $time)){ echo $tick; }else{echo $cross; }?> Evening</div>
            <div class="details-info"><?php if(in_array('Shabbos', $time)){ echo $tick; }else{echo $cross; }?> Shabbos</div>
            <div class="details-info"><?php if(in_array('Night Nurse', $time)){ echo $tick; }else{echo $cross; }?> Night Nurse</div>           
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Availability</td>
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

    
    <tr style="display:none">
    	<td >Agree to Background Check?</td>
    	<td >
    		<?php if ($agree_bg_check == 1) { echo 'yes';}
    		else { echo 'no';} ?>
    	</td>
    </tr>

</table>   

<!-- end Babysitter-->
</div>
