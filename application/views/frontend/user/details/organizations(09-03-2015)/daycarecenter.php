<?php
$cross = "<img src='".site_url()."img/cross.png'>";
$tick  = "<img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped">
		<tr>
			<?php if(!empty($looking_to_work)){
				$lookingtowork = explode(',', $looking_to_work); 
				?>
				<td>For</td>
				<td>
					<div class="details-info"><?php if(in_array('Boys', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Boys</div>
					<div class="details-info"><?php if(in_array('Girls', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Girls</div>
					<div class="details-info"><?php if(in_array('Both', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Both</div>
				</td>
                <?php }  
                else{ ?>
                    <td>For</td>
                    <td>N/A</td>
				<?php 
			}
			?>
		</tr>
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
			<?php 
		}
		?>
	</tr>

	<tr>
		<?php if(!empty($certification)){?>
		<td>Certification</td>
		<td>
			<div class="details-info"><?php echo $certification; ?></div>
		</td>
        <?php }  
                else{ ?>
                    <td>Certification</td>
                    <td>N/A</td>
		<?php 
	}
	?>
</tr>

<tr>
	<?php if(!empty($age_group)){
		$agegroup = explode(',', $age_group); 
		?>
		<td>Age Group</td>
		<td>
			<div class="details-info"><?php if(in_array('0-3', $agegroup)){ echo $tick; }else{ echo $cross; }?>0-3 Months</div>
			<div class="details-info"><?php if(in_array('3-6', $agegroup)){ echo $tick; }else{ echo $cross; }?>3-6 Months</div>
			<div class="details-info"><?php if(in_array('6-12', $agegroup)){ echo $tick; }else{ echo $cross; }?>6-12 Months</div>
			<div class="details-info"><?php if(in_array('1-3', $agegroup)){ echo $tick; }else{ echo $cross; }?>1-3 Years</div>
			<div class="details-info"><?php if(in_array('3-5', $agegroup)){ echo $tick; }else{ echo $cross; }?>3-5 Years</div>
			<div class="details-info"><?php if(in_array('6-11', $agegroup)){ echo $tick; }else{ echo $cross ;}?>6-11 Years</div>
			<div class="details-info"><?php if(in_array('12+', $agegroup)){ echo $tick; }else{ echo $cross ;}?>12+ Years</div>
		</td>
        <?php }  
                else{ ?>
                    <td>Age Group</td>
                    <td>N/A</td>
		<?php 
	}
	?>
</tr>

<tr>
	<?php if(!empty($language)){
		$lang = explode(',', $language); 
		?>
		<td>Language spoken</td>
		<td>
			<div class="details-info"><?php if(in_array('English', $lang)){ echo $tick; }else{ echo $cross; }?>English</div>
			<div class="details-info"><?php if(in_array('Yiddish', $lang)){ echo $tick; }else{ echo $cross; }?>Yiddish</div>
			<div class="details-info"><?php if(in_array('Hebrew', $lang)){ echo $tick; }else{ echo $cross; }?>Hebrew</div>
			<div class="details-info"><?php if(in_array('Russian', $lang)){ echo $tick; }else{ echo $cross; }?>Russian</div>
			<div class="details-info"><?php if(in_array('French', $lang)){ echo $tick; }else{ echo $cross; }?>French</div>
			<div class="details-info"><?php if(in_array('Other', $lang)){ echo $tick; }else{ echo $cross; }?>Other</div>
		</td>
        <?php }  
                else{ ?>
                    <td>Language spoken</td>
                    <td>N/A</td>
		<?php 
	}
	?>
</tr>
<tr>
	<?php if(!empty($number_of_children)){?>
	<td>Number of children in group</td>
	<td><?php echo $number_of_children;?></td>
		<?php }  
                else{ ?>
                    <td>Number of children in group</td>
                    <td>N/A</td>
        <?php }?>
	</tr>

	<tr>
		<?php if(!empty($number_of_staff)){?>
		<td>Number of staff</td>
		<td><?php echo $number_of_staff;?></td>
			<?php }  
                else{ ?>
                    <td>Number of staff</td>
                    <td>N/A</td>
            <?php }?>
		</tr>

		<tr>
			<?php if(!empty($rate)){?>
			<td>Cost</td>
			<td><?php echo $rate;?></td>
            <?php }  
                else{ ?>
                    <td>Cost</td>
                    <td>N/A</td>
				<?php }?>
			</tr>


			<tr>
				<td>Days/ Hours</td>
                <td></td>
                </tr>
            <tr>
				<?php if(!empty($sunday_from) || !empty($sunday_to)){ ?>
				<td>Sun</td>
                <td> <?php echo $sunday_from;?>- <?php echo $sunday_to;?></td>
				<?php }  
                else{ ?>
                    <td>Sun</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>

			<tr>
				<?php if(!empty($mid_days_from) || !empty($mid_days_to)){ ?>
				<td>Mon-Thu </td>
				<td><?php echo $mid_days_from;?>- <?php echo $mid_days_to;?></td>
				<?php }  
                else{ ?>
                    <td>Mon-Thu</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>

			<tr>
				<?php if(!empty($friday_from) || !empty($friday_to)){ ?>
				<td>Fri</td>
				<td><?php echo $friday_from;?>- <?php echo $friday_to;?></td>
				<?php }  
                else{ ?>
                    <td>Fri</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>
			<tr>
				<?php if(isset($extended_hrs)){?>
				<td>Extended Hours</td>
				<td><?php if($extended_hrs == 1){echo $tick; }else{ echo $cross ;}?></td>
				<?php }  
                else{ ?>
                    <td>Extended Hours</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>

			<tr>
				<?php if(isset($flexible_hours)){?>
				<td>Flexible hours</td>
				<td><?php if($flexible_hours == 1){echo $tick; }else{ echo $cross ;} ?></td>
				<?php }  
                else{ ?>
                    <td>Flexible hours</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>

			<tr>
				<?php if(!empty($vacation_days)){?>
				<td>Vacation Days</td>
				<td>
					<?php echo $vacation_days;?>
					<?php if(!empty($pdf)){?>
					<a href="<?php echo site_url();?>uploads/files/<?php echo $pdf;?>" target="_blank"> Click here to view/Download</a>
					<?php } ?>
				</td>
				<?php }  
                else{ ?>
                    <td>Vacation Days</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>
			<tr>
				<?php if(!empty($profile_description)){?>
				<td>Organization/facilities/activities</td>
				<td><?php echo $profile_description;?></td>
				<?php }  
                else{ ?>
                    <td>Organization/facilities/activities</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>

			<tr>
				<?php if(isset($references)){?>
				<?php if($references == 1){?>
				<td>Refrences</td>
				<td>
					Yes <?php if ($reference_file) { ?> <a href="<?php echo site_url();?>uploads/files/<?php echo $reference_file;?>" target="_blank"> Click here to view/Download</a><?php } ?>
				</td>
				<?php 
			} ?>
		<?php }  
                else{ ?>
                    <td>Refrences</td>
                    <td>N/A</td>
                    <?php } ?>
	</tr>


</table>
</div>
