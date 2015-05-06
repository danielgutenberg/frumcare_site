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
		<?php if(!empty($number_of_children)){?>
			<td>Number of patients/residents</td>
			<td><?php echo $number_of_children;?></td>
            <?php }  
                else{ ?>
                    <td>Number of patients/residents</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>
    
    <tr>
		<?php if(!empty($number_of_staff)){?>
			<td>Number of staff</td>
			<td><?php echo $number_of_staff;?></td>
            <?php }  
                else{ ?>
                    <td>Number of staff</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>
    
    <?php $language = explode(',',$language); ?>
        <tr>
            <td>Languags</td>
            <td>
                <div ><?php if(in_array("English",$language)){ echo $tick; }else{ echo $cross; }?> English</div>
                <div ><?php if(in_array("Yiddish",$language)){ echo $tick; }else{ echo $cross; }?> Yiddish</div>
                <div ><?php if(in_array("Hebrew",$language)){ echo $tick; }else{ echo $cross; }?> Hebrew</div>                
                <div ><?php if(in_array("Russian",$language)){ echo $tick; }else{ echo $cross; }?>Russian</div>
                <div ><?php if(in_array("French",$language)){ echo $tick; }else{ echo $cross; }?> French</div>
                <div ><?php if(in_array("Other",$language)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>
        
	<tr>
		<?php $willingtowork  = explode(',',$willing_to_work); ?>
			<td>Specializes in </td>
			<td>
				<div class="details-info"><?php if(in_array(strtolower('Alz./dementia'),array_map('strtolower',$willingtowork))){ echo $tick; }else{ echo $cross; }?>Alz./dementia</div>
				<div class="details-info"><?php if(in_array(strtolower('Sight loss'),array_map('strtolower',$willingtowork))){ echo $tick; }else{ echo $cross; }?>Sight loss</div>
				<div class="details-info"><?php if(in_array(strtolower('Hearing loss'),array_map('strtolower',$willingtowork))){ echo $tick; }else{ echo $cross; }?>Hearing loss</div>
				<div class="details-info"><?php if(in_array(strtolower('Wheelchair bound'),array_map('strtolower',$willingtowork))){ echo $tick; }else{ echo $cross; }?>Wheelchair bound</div>
			</td>           
	</tr>
	
    <tr>
        <?php 
            $extra_field = explode(',',$extra_field);
        ?>
        <td>Observance in facility</td>
        <td>
            <div class="details-info"><?php if(in_array('shul on premises', $extra_field)){echo $tick; }else{echo $cross; }?> <span>Shul on premises</span></div>
            <div class="details-info"><?php if(in_array('kosher kitchen', $extra_field)){echo $tick; }else{echo $cross; }?> <span>Kosher kitchen</span></div>
            <div class="details-info"><?php if(in_array('kosher food available', $extra_field)){echo $tick; }else{echo $cross; }?> <span>Kosher food available</span></div>
            <div class="details-info"><?php if(in_array('shabbos observant facility', $extra_field)){echo $tick; }else{echo $cross; }?> <span>Shabbos observant facility</span></div>
        </td>               
    </tr>

	<tr>
		<?php if(!empty($rate)){
			if($rate_type == 1)
				$type = 'Per Hour';
			else
				$type = 'Per Monthly';
		?>
		
		<td>Cost</td>
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
		<?php if(!empty($reference) && $reference == 1 ){?>
			<td>References</td>
			<td>
					
						<a>Download</a>
					
			</td>
            <?php }  
                else{ ?>
                    <td>References</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>
    
	<tr>
		<?php if(!empty($payment_options)){?>
			<td>Payment Options</td>
			<td>
					
						<?php echo $payment_options;?>
					
			</td>
            <?php }  
                else{ ?>
                    <td>Payment Options</td>
                    <td>N/A</td>
		<?php } ?>
	</tr>

</table>
</div>