<div class="table-responsive">
  <table class="table table-striped">
    <?php
    $cross = "<img src='".site_url()."img/cross.png'>";
    $tick  = "<img src='".site_url()."img/nut-list.png'>";   
    if($currency == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
    ?>
    
    
    <tr>
      <?php if(isset($looking_to_work)){
        $lookingtowork = explode(',', $looking_to_work);
        ?>
        <td>We Clean</td>
        <td>
         <div class="details-info"><?php if(in_array('Home', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Home</div>
         <div class="details-info"><?php if(in_array('Business', $lookingtowork)){ echo $tick; }else{ echo $cross; }?> Office/Business</div>
       </td>
       <?php }  
                else{ ?>
                    <td>We Clean</td>
                    <td>N/A</td>
       <?php 
     } 
     ?>
     
     
   </tr>
   <tr>
    <?php if(isset($willing_to_work)){
      $willingtowork = explode(',', $willing_to_work); ?>
      <td>Specialize in</td>
      <td>                    
       <div class="details-info"><?php if(in_array('Dishes', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Dishes</div>
       <div class="details-info"><?php if(in_array('Floors', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Floors</div>
       <div class="details-info"><?php if(in_array('Windows', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Windows</div>
       <div class="details-info"><?php if(in_array('Laundry', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Laundry</div>
       <div class="details-info"><?php if(in_array('Folding', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Folding</div>
       <div class="details-info"><?php if(in_array('Ironing', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Ironing</div>
       <div class="details-info"><?php if(in_array('Cleaning and Dusting Furniture', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Cleaning and Dusting Furniture</div>
       <div class="details-info"><?php if(in_array('Cleaning Refrigerator/Freezer', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Cleaning Refrigerator/Freezer</div>
       <div class="details-info"><?php if(in_array('Cleaning Oven/Stove', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Cleaning Oven/Stove</div>
       <div class="details-info"><?php if(in_array('Pesach Cleaning', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Pesach Cleaning</div>
       <div class="details-info"><?php if(in_array('Able to watch children as well', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Able to watch children as well</div>
     </td>
     <?php }  
                else{ ?>
                    <td>Specialize in</td>
                    <td>N/A</td>
     <?php }?>
   </tr>

   <tr>
                <td>Days / Hours</td>         
                <td>
					
					
						<?php if(!empty($sunday_from) || !empty($sunday_to)){ ?>
							<div class="details-info">Sun <?php echo $sunday_from;?> - <?php echo $sunday_to;?></div>
		                <?php }  
		                else{ ?>
		                    <div>Sun N/A</div>
						<?php } ?>
						<?php if(!empty($mid_days_from) || !empty($mid_days_to)){ ?>
							<div class="details-info">Mon - Thurs <?php echo $mid_days_from;?> - <?php echo $mid_days_to;?></div>
		                <?php }  
		                else{ ?>
		                    <div>Mon-Thu N/A</div>
						<?php } ?>
						<?php if(!empty($friday_from) || !empty($friday_to)){ ?>
							<div class="details-info">Fri <?php echo $friday_from;?> - <?php echo $friday_to;?></div>
		                <?php }  
		                else{ ?>
		                    <div>Fri N/A</div>
						<?php } ?>
						<div class="details-info"><?php if($extended_hrs == 1){ echo $tick; }else{echo $cross; }?>  Extended Hours Available</div>
                        <div class="details-info"><?php if($flexible_hours == 1){ echo $tick; }else{echo $cross; }?> Flexible Hours</div> 
				</td>
           </tr>

  <tr>
    <?php 
    if(!empty($rate)){   
     if($rate_type == 1)
       $type = "Hourly Rate";
     else
      $type = "Monthly Rate";
    ?>
    <td>Rate</td>
    <td><div class="details-info"><?php echo $symbol . $rate.' / Hr ';?></div></td>
    <?php }  
                else{ ?>
                    <td>Rate</td>
                    <td>N/A</td>
    <?php } ?>
  </tr>  
  
       
            
</table>            
</div>
