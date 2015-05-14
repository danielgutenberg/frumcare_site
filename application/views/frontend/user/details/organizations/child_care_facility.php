<?php
$cross = " <img src='".site_url()."img/cross.png'>";
$tick  = " <img src='".site_url()."img/nut-list.png'>";
?>
<div class="table-responsive">
	<table class="table table-striped">
		<tr>
			<?php if(isset($availability)){
				$available = explode(',', $availability);
				?>
				<td>Job Type</td>
				<td>
					<div class="details-info"><?php if(in_array('Full Time', $available)){ echo $tick; }else{ echo $cross; }?>Full Time</div>
					<div class="details-info"><?php if(in_array('Part Time', $available)){ echo $tick; }else{ echo $cross; }?>Part Time</div>
					<div class="details-info"><?php if(in_array('Substitute', $available)){ echo $tick; }else{ echo $cross; }?>Substitute</div>
					<div class="details-info"><?php if(in_array('Asap', $available)){ echo $tick; }else{ echo $cross; }?>Asap</div>
					<div class="details-info"><?php if(in_array("Start date",$available)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>                   
				</td>
				<?php }  
                else{ ?>
                    <td>Job Type</td>
                    <td>N/A</td>
                <?php } ?>
			</tr>
			<tr>
					<?php if(!empty($contact)) { ?>
						<td>Contact Name</td>
						<td><?php echo $contact ;?></td>
						<?php }  
	                else{ ?>
	                    <td>Contact Name</td>
	                    <td>N/A</td>
	                    <?php } ?>
					
				</td>
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
				<?php if(!empty($language)){
					$lang = explode(',', $language); 
					if(is_array($lang)){
						?>
						
						<td>Languages</td>
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
                    <td>Languages</td>
                    <td>N/A</td>
				<?php } ?>
			</tr>
			<tr>
				<?php 
				if(!empty($training)){
					$train = explode(',', $training);
					?>
					<td>Training / Certification</td>
					<td>
						<div class="details-info"><?php if(in_array('CPR', $train)){ echo $tick; }else{ echo $cross; }?>CPR</div>
						<div class="details-info"><?php if(in_array('First Aid', $train)){ echo $tick; }else{ echo $cross; }?>First Aid</div>
						<div class="details-info"><?php if(in_array('Special care training', $train)){ echo $tick; }else{ echo $cross; }?>Senior care training</div>
						<div class="details-info"><?php if(in_array('Nurse', $train)){ echo $tick; }else{ echo $cross; }?>Nurse</div>
						<div class="details-info"><?php if(in_array('Other', $train)){ echo $tick; }else{ echo $cross; }?>Other</div>
						<div class="details-info"><?php if(in_array('Not necessary', $train)){ echo $tick; }else{ echo $cross; }?>Not necessary</div>
					</td>
                    <?php }  
                else{ ?>
                    <td>Training / Certification</td>
                    <td>N/A</td>
					<?php } ?>
				</tr>
				<tr>
					<?php if(!empty($experience)){ ?>
					<td>Experience</td>
					<td><?php echo $experience .' years';?></td>
					<?php }  
                else{ ?>
                    <td>Experience</td>
                    <td>N/A</td>
                    <?php } ?>
				</tr>
				<tr>
					<?php if(!empty($smoker)){?>
					<td>Smoking acceptable</td>
					<td>
						<?php if($smoker == 1)
						echo "Smoking acceptable";
						else
							echo "Smoking Not acceptable";
						?>
					</td>
                    <?php }  
                else{ ?>
                    <td>Smoking acceptable</td>
                    <td>N/A</td>
					<?php } ?>
				</tr>
			<?php /*
				<tr>
					<?php
						if(!empty($photo_of_child) && file_exists(site_url().'images/profile-picture/thumb/'.$photo_of_child)){
							$img_url 		= site_url().'images/profile-picture/thumb/'.$photo_of_child;
							$fullimage 		= site_url().'images/profile-picture/'.$photo_of_child;	

						}else{
								$img_url = site_url().'images/no-image.jpg';	
								$fullimage = site_url().'images/no-image.jpg';
						}
					?>
						<td>Photo of Child / Children</td>
						<td>
							<a href="javascript:void(0);" class="fullimage" id="<?php echo $fullimage;?>"><img src="<?php echo $img_url;?>"></a>
						</td>
						
				</tr>

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
				</tr>

*/ ?>
			</table>

			<!-- Creates the bootstrap modal where the image will appear -->
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