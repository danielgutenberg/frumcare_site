<?php
$cross = "<img src='".site_url()."img/cross.png'>";
$tick  = "<img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped">
            
            
            <?php 
            if( $care_type == 10 || $care_type == 16 ) { ?>
                <tr>
                    <td>Type of Organization</td>
                    <td>
                        <?php echo $sub_care ? ucfirst($sub_care) : 'N/A'; ?>
                    </td>
                </tr> <?php 
            }
        ?>
		<tr>
			<?php $lookingtowork = explode(',', $looking_to_work); ?>
				<td>For</td>
				<td>
					<div class="details-info"><?php if(in_array('Boys', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Boys</div>
					<div class="details-info"><?php if(in_array('Girls', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Girls</div>
					<div class="details-info"><?php if(in_array('Both', $lookingtowork)){ echo $tick; }else{ echo $cross; }?>Both</div>
				</td>                                			
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
	<?php //if(!empty($age_group)){
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
        <?php //}                  
	?>
</tr>

<tr>
	<?php 
		$lang = explode(',', $language); 
		?>
		<td>Languages</td>
		<td>
			<div class="details-info"><?php if(in_array('English', $lang)){ echo $tick; }else{ echo $cross; }?>English</div>
			<div class="details-info"><?php if(in_array('Yiddish', $lang)){ echo $tick; }else{ echo $cross; }?>Yiddish</div>
			<div class="details-info"><?php if(in_array('Hebrew', $lang)){ echo $tick; }else{ echo $cross; }?>Hebrew</div>
			<div class="details-info"><?php if(in_array('Russian', $lang)){ echo $tick; }else{ echo $cross; }?>Russian</div>
			<div class="details-info"><?php if(in_array('French', $lang)){ echo $tick; }else{ echo $cross; }?>French</div>
			<div class="details-info"><?php if(in_array('Other', $lang)){ echo $tick; }else{ echo $cross; }?>Other</div>
		</td>        
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
                <td>Days / Hours/td>         
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

<?php /*
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
*/ ?>
			<tr>
				<?php if(!empty($vacation_days)){?>
				<td>Vacation Days</td>
				<td>
					<?php echo $vacation_days;?>
					<?php if(!empty($pdf)){?>
					<a href="<?php echo site_url();?>uploads/files/<?php echo $pdf;?>" target="_blank"> Click here to view / Download</a>
					<?php } ?>
				</td>
				<?php }  
                else{ ?>
                    <td>Vacation Days</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>
                        			
			<tr>
				<?php if(isset($references)){?>
				<?php if($references == 1){?>
				<td>References</td>
				<td>
					<a href="<?php echo site_url();?>uploads/files/<?php echo $reference_file;?>" target="_blank"> Click here to view / Download</a>
				</td>
				<?php 
			} ?>
		<?php }  
                else{ ?>
                    <td>References</td>
                    <td>N/A</td>
                    <?php } ?>
	</tr>
<?php /*
	<tr>
		<?php 
			if(!empty($facility_pic)){
				$img_url 	= site_url().'images/profile-picture/thumb/'.$facility_pic;
				$fullimage 	= site_url().'images/profile-picture/'.$facility_pic;
			}else{
				$img_url	 = site_url().'images/no-image.jpg';
				$fullimage 	= site_url().'images/no-image.jpg';
			}
		?>

		<td>Photo of facility/ Organization</td>
		<td>
			<a href="javascript:void(0);"  class="fullimage" id="<?php echo $fullimage;?>"><img src="<?php echo $img_url;?>"></a>
		</td>

	</tr> */ ?>
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
