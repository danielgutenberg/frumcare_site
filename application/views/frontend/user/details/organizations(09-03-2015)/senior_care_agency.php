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
				<td>Number of patients/ residents</td>
				<td><?php echo $number_of_children;?></td>
					<?php }  
                else{ ?>
                    <td>Number of patients/ residents</td>
                    <td>N/A</td>
                    <?php } ?>				
			</tr>

			<tr>
				<?php if(!empty($number_of_staff)){?>
				<td>Number of staff( per patient)</td>
				<td><?php echo $number_of_staff;?></td>
					<?php }  
                else{ ?>
                    <td>Number of staff( per patient)</td>
                    <td>N/A</td>
                    <?php } ?>				
			</tr>

			<tr>
				<?php if(!empty($language)){
					$lang = explode(',', $language); 
					if(is_array($lang)){
						?>

						<td>Language Spoken</td>
						<td>
							<div class="details-info"><?php if(in_array('English', $lang)){ echo $tick; }else{ echo $cross; }?>English</div>
							<div class="details-info"><?php if(in_array('Yiddish', $lang)){ echo $tick; }else{ echo $cross; }?>Yiddish</div>
							<div class="details-info"><?php if(in_array('Hebrew', $lang)){ echo $tick; }else{ echo $cross; }?>Hebrew</div>
							<div class="details-info"><?php if(in_array('Russian', $lang)){ echo $tick; }else{ echo $cross; }?>Russian</div>
							<div class="details-info"><?php if(in_array('French', $lang)){ echo $tick;}else{echo $cross; }?>French</div>
							<div class="details-info"><?php if(in_array('French', $lang)){ echo $tick;}else{echo $cross; }?>Other</div>
						</td>
						<?php 
					}
                     }  
                else{ ?>
                    <td>Language Spoken</td>
                    <td>N/A</td> 
				<?php
                }
				?>
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
						<div class="details-info"><?php echo $rate.' '. $type;?></div>
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
					<div class="details-info"><?php echo $profile_description;?></div>
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
			<?php if(!empty($refrences)){?>
			<td>Refrences</td>
			<td>
				<div class="details-info">
					<?php if($refrences == 1){ 
						echo 'Refrences Available';
					}else{
						echo 'Refrences Not Available';
					} ?>
				</div>
			</td>
            <?php }  
                else{ ?>
                    <td>Refrences</td>
                    <td>N/A</td>
			<?php } ?>
		</tr>

		<tr>
			<?php if(!empty($payment_options)){?>
			<td>Payment Option</td>
			<td>
				<div class="details-info">
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