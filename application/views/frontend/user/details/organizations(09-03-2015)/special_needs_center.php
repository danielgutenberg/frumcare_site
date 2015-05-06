<?php
$cross = " <img src='".site_url()."img/cross.png'>";
$tick  = " <img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped borderbottom">
		<?php if(!empty($established)){?>
		<tr>    	
			<td>Year Established </td>
			<td>
				<div class="details-info"><?php echo $established; ?></div>
			</td>
			
		</tr>
         <?php }  
                else{ ?>
                    <td>Year Established</td>
                    <td>N/A</td>
		<?php } ?>
		
		<?php if(!empty($certification)){?>
		<tr>    	
			<td>Certification </td>
			<td>
				<div class="details-info"><?php echo $certification; ?></div>
			</td>
			
		</tr>
         <?php }  
                else{ ?>
                    <td>Certification</td>
                    <td>N/A</td>
		<?php } ?>
		
		<?php if(!empty($language)){ ?>
		<?php $language = explode(',',$language); ?>
		<tr>
			<td>Language spoken</td>
			<td>
				<div class="details-info"><?php if(in_array("English",$language)){ echo $tick; }else{ echo $cross; }?> English</div>
				<div class="details-info"><?php if(in_array("Yiddish",$language)){ echo $tick; }else{ echo $cross; }?> Yiddish</div>
				<div class="details-info"><?php if(in_array("Hebrew",$language)){ echo $tick; }else{ echo $cross; }?> Hebrew</div>                
				<div class="details-info"><?php if(in_array("Russian",$language)){ echo $tick; }else{ echo $cross; }?>Russian</div>
				<div class="details-info"><?php if(in_array("French",$language)){ echo $tick; }else{ echo $cross; }?> French</div>
				<div class="details-info"><?php if(in_array("Other",$language)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
			</td>
		</tr>
         <?php }  
                else{ ?>
                    <td>Language spoken</td>
                    <td>N/A</td>
		<?php } ?>
		
		<?php if(!empty($willing_to_work)){
			$tempwillingtowork = explode(',',$willing_to_work);
			?>
			<tr>
				<td >Specialize in</td>
				<td >
					<div class="details-info"><?php if(in_array('Autism', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Autism</span></div>
					<div class="details-info"><?php if(in_array('Down Syndrome', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Down Syndrome</span></div>                    
					<div class="details-info"><?php if(in_array('Handicapped', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Handicapped</span></div>
					<div class="details-info"><?php if(in_array('Wheelchair bound', $tempwillingtowork)){echo $tick; }else{echo $cross; }?> <span>Wheelchair bound</span></div>                      
				</td>	
			</tr>
             <?php }  
                else{ ?>
                    <td>Specialize in</td>
                    <td>N/A</td>
			<?php } ?>
			
			<?php if(!empty($number_of_children)){?>
			<tr>    	
				<td>Number of patients </td>
				<td>
					<div class="details-info"><?php echo $number_of_children; ?></div>
				</td>
				
			</tr>
             <?php }  
                else{ ?>
                    <td>Number of patients</td>
                    <td>N/A</td>
			<?php } ?>
			
			<?php if(!empty($number_of_staff)){?>
			<tr>    	
				<td>Number of staff (per patient) </td>
				<td>
					<div class="details-info"><?php echo $number_of_staff; ?></div>
				</td>
				
			</tr>
             <?php }  
                else{ ?>
                    <td>Number of staff (per patient)</td>
                    <td>N/A</td>
			<?php } ?>
			
			<?php  if(!empty($rate)){?>
			<tr>
				<td >Rate</td>
				<td >
					<?php echo $rate; 
					$type = explode(',',$rate_type);
					?>
					<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>
					<div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Rate</div>    
				</td>
			</tr>
             <?php }  
                else{ ?>
                    <td>Rate</td>
                    <td>N/A</td>
			<?php } ?>
			
			<?php if($references==1){?>
			<tr>
				<td >References</td>
				<td >
					<a href="#">Download</a>
				</td>
			</tr>
             <?php }  
                else{ ?>
                    <td>References</td>
                    <td>N/A</td>
			<?php } ?>
			
			<?php if(!empty($payment_option)){?>
			<tr>
				<td >Payment option</td>
				<td >
					<?php echo $payment_option;?>
				</td>
			</tr>
             <?php }  
                else{ ?>
                    <td>Payment option</td>
                    <td>N/A</td>
			<?php } ?>
		</table>
	</div>