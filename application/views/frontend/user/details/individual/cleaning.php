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
               <td >Looking to work in </td>
               <td>
                  <div class="details-info"><?php if(in_array('Private home', $lookingtowork)){ echo $tick; }else{echo $cross; }?> Private home</div>
                  <div class="details-info"><?php if(in_array("Business/Office", $lookingtowork)){ echo $tick; }else{echo $cross;}?> Business/Office</div>
                  <div class="details-info"><?php if(in_array("Cleaning company", $lookingtowork)){ echo $tick; }else{echo $cross; }?> Cleaning company</div>        
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
          if(!empty($experience)){?>
          <tr>
           <td >Years of experience</td>
           <td>
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
        } ?>
    
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
    else{ ?>
            <tr>
                <td>Rate</td>
                <td>N/A</td>
            </tr>
        <?php            
         ?>
            <?php
          }
if(!empty($willing_to_work)){
    $tempwillingtowork = explode(',',$willing_to_work);
    ?>
    <tr>
       <td >Specializes in</td>
       <td>
          <div ><?php if(in_array('Dishes', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Dishes</span></div>
          <div ><?php if(in_array('Floors', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Floors</span></div>
          <div ><?php if(in_array('Windows', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Windows</span></div>        
          <div ><?php if(in_array('Laundry', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Laundry</span></div>
          <div ><?php if(in_array('Folding', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Folding</span></div>
          <div ><?php if(in_array('Ironing', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Ironing</span></div>
          <div class="details-info"><?php if(in_array('Cleaning and Dusting Furniture', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?> <span>Cleaning and Dusting Furniture</span></div>
          <div class="details-info"><?php if(in_array('Cleaning Refrigerator/Freezer', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?><span>Cleaning Refrigerator/Freezer</span></div>
          <div class="details-info"><?php if(in_array('Cleaning Oven/Stove', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?><span>Cleaning Oven/Stove</span></div>
          <div class="details-info"><?php if(in_array('Able to watch children as well', $tempwillingtowork)){ echo $tick; }else{echo $cross;  }?><span>Able to watch children as well</span></div>
      </td>
  </tr>
  <?php }
  else{
            ?>
                <tr>
                    <td >Specialize in </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
  if(!empty($availability)){
    $time = explode(',',$availability);
    ?>
    <tr>
       <td id="availability1">Availability </td>
       <td>
        <div ><?php if(in_array('One Time', $time)){ echo $tick; }else{echo $cross;  }?> <span>One Time</span></div>        
        <div class="details-info"><?php if(in_array('Occassionally', $time)){ echo $tick; }else{echo $cross; } ?>Occassionally</div>
        <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; } ?> Immediate </div>
        <div class="details-info"><?php if(in_array("Start date",$time)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
        <div class="details-info"><?php if(in_array('Regularly', $time)){ echo $tick; }else{echo $cross;} ?>Regularly</div>
        <div class="details-info"><?php if(in_array('Morning', $time)){ echo $tick; }else{echo $cross; }?> Morning</div>
        <div class="details-info"><?php if(in_array('Afternoon', $time)){ echo $tick; }else{echo $cross; }?> Afternoon</div>
        <div class="details-info"><?php if(in_array('Evening', $time)){ echo $tick; }else{echo $cross; }?> Evening</div>        
        <div class="details-info"><?php if(in_array('Weekends Fri./ Sun.', $time)){ echo $tick; }else{echo $cross; }?> Weekends Fri./ Sun.</div>
        <div class="details-info"><?php if(in_array('Saturday', $time)){ echo $tick; }else{echo $cross; }?> Saturday</div>                    		        		
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
</table>
</div>