<?php
    $cross = "<img src='".site_url()."img/cross.png'>";
    $tick  = "<img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
<table class="table table-striped">
	<tr>
		<?php if(!empty($established)){?>
			<td>Established</td>
			<td><?php echo $established;?></td>
		      <?php }  
                else{ ?>
                    <td>Established</td>
                    <td>N/A</td>
        <?php } ?>
	</tr>

	<tr>
		<?php if(!empty($certification)){?>
			<td>Certification</td>
			<td><?php echo $certification;?></td>
            <?php }  
                else{ ?>
                    <td>Certification</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>
	
	<tr>
		<?php 
			if(!empty($willing_to_work)){
				$willingtowork  = explode(',',$willing_to_work);
		?>
			<td>Specialize in </td>
			<td>
				<div class="details-info"><?php if(in_array('Alz./ dementia',$willingtowork)){ echo $tick; }else{ echo $cross; }?> Alz./ dementia</div>
				<div class="details-info"><?php if(in_array('Sight loss',$willingtowork)){ echo $tick; }else{ echo $cross; }?>Sight loss</div>
				<div class="details-info"><?php if(in_array('Hearing loss',$willingtowork)){ echo $tick; }else{ echo $cross; }?>Hearing loss</div>
				<div class="details-info"><?php if(in_array('Wheelchair bound',$willingtowork)){ echo $tick; }else{ echo $cross; }?>Wheelchair bound</div>
			</td>
            <?php }  
                else{ ?>
                    <td>Specialize in</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>
	

	<tr>
		<?php if(!empty($rate)){
			if($rate_type == 1)
				$type = 'Per Hour';
			else
				$type = 'Per Monthly';
		?>
		
		<td>Rate</td>
		<td>
			<div><?php echo $rate.' '. $type;?></div>
		</td>
        <?php }  
                else{ ?>
                    <td>Rate</td>
                    <td>N/A</td>
		<?php 
			}
		?>
	</tr>


	<tr>
		<?php if(!empty($profile_description)){?>
		<td>Brief description about Organization/ Facilities/ Staff</td>
		<td>
			<div><?php echo $profile_description;?></div>
		</td>
        <?php }  
                else{ ?>
                    <td>Brief description about Organization/ Facilities/ Staff</td>
                    <td>N/A</td>
		<?php 
			}
		?>
	</tr>

	<tr>
		<?php if(!empty($payment_options)){?>
			<td>Payment Option</td>
			<td>
					<div>
						<?php echo $payment_options;?>
					</div>
			</td>
            <?php }  
                else{ ?>
                    <td>Payment Option</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>

</table>
</div>