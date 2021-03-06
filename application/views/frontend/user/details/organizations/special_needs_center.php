<?php
$cross = " <img src='".site_url()."img/cross.png'>";
$tick  = " <img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped borderbottom">
		
		<tr>
		<?php if(!empty($established)){?>  	
			<td>Year Established </td>
			<td>
				<div class="details-info"><?php echo $established; ?></div>
			</td>
         <?php }  
                else{ ?>
                    <td>Year Established</td>
                    <td>N/A</td>
		<?php } ?>
		</tr>
		<tr>
		<?php if(!empty($certification)){?>
		   	
			<td>Certification </td>
			<td>
				<div class="details-info"><?php echo $certification; ?></div>
			</td>
         <?php }  
                else{ ?>
                    <td>Certification</td>
                    <td>N/A</td>
		<?php } ?>
		</tr>
		
		<?php if(!empty($language)){ ?>
		<?php $language = explode(',',$language); ?>
		<tr>
			<td>Languages Spoken</td>
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
                <tr>
                    <td>Languages Spoken</td>
                    <td>N/A</td>
                </tr>
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
                <tr>
                    <td>Specialize in</td>
                    <td>N/A</td>
                    </tr>
			<?php } ?>
			
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
				<td>Number of staff </td>
				<td>
					<div class="details-info"><?php echo $number_of_staff; ?></div>
				</td>
				
			</tr>
             <?php }  
                else{ ?>
                    <td>Number of staff</td>
                    <td>N/A</td>
			<?php } ?>
			
			<tr>
		<?php if(!empty($rate)){
			if($rate_type == 1)
				$type = 'Per Hour';
			else
				$type = 'Per Monthly';
		?>
		
		<td>Cost</td>
		<td>
			<div><?php echo $rate.' ';?></div>
		</td>
        <?php }  
                else{ ?>
                    <td>Cost</td>
                    <td>N/A</td>
		<?php 
			}
		?>
	</tr>
			
			<?php if(!empty($payment_option)){?>
			<tr>
				<td >Payment options</td>
				<td >
					<?php echo $payment_option;?>
				</td>
			</tr>
             <?php }  
                else{ ?>
                    <td>Payment options</td>
                    <td>N/A</td>
			<?php } ?>

			</tr>

	
	</table>
	<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body imagepreview">
        <img src="" id="imagepreview">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').removeAttr('onload');
		$('.fullimage').click(function(){
			var image = $(this).attr('id');
			$('#imagepreview').attr('src',image);
			$('#imageModal').modal('show');
		});

	});
</script>
