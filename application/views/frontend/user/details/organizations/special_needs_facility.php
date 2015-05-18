<?php
$cross = "<img src='".site_url()."img/cross.png'>";
$tick  = "<img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped">
		 
		 
		 <?php if(!empty($rate)){ ?>    
        <?php $rate_type = explode(',',$rate_type)?>
        <tr>
            <td>Wage</td>
            <td >
            <?php echo $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Rate Available</div>    
        </td>
        </tr>
    <?php }else{
            ?>
                <tr>
                    <td >Wage </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
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
				<td>Days / Hours</td>
				<td>
                   <?php if(!empty($sunday_from) && !empty($sunday_to)) {?>
                   Sun <?php echo $sunday_from; ?> to <?php echo $sunday_to;} ?>
                   <?php if(!empty($mid_days_from) && !empty($mid_days_to)) { ?>
                   <br/>Mon-Thu <?php echo $mid_days_from; ?> to <?php echo $mid_days_to; }?>
                   <?php if(!empty($friday_from) && !empty($friday_to)){ ?>
                   <br/>Fri <?php echo $friday_from; ?> to <?php echo $friday_to; }?>          
                   <div class="details-info"><?php if($extended_hrs == 1){ echo $tick; }else{echo $cross; }?>  Extended Hours Available</div>
                   <div class="details-info"><?php if($flexible_hours == 1){ echo $tick; }else{echo $cross; }?> Flexible Hours</div>     
               </td>
			</tr>

			
			<tr>
				<?php 
				if(isset($language)){
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
				<?php
                }
				?>
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
						<div class="details-info"><?php if(in_array('Special needs training', $train)){ echo $tick; }else{ echo $cross; }?>Special needs training</div>
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
					<?php if(!empty($facility_pic)){
						if(file_exists(site_url().'images/profile-picture/thumb/'.$facility_pic)){
							$img_url 	= site_url().'images/profile-picture/thumb/'.$facility_pic;
							$fullimage 	= site_url().'images/profile-picture/thumb/'.$facility_pic;
						}else{
							$img_url 	= site_url().'images/no-image.jpg';
							$fullimage 	= site_url().'images/no-image.jpg';
						}
						}	
					?>
						<td>Photo</td>
						<td>
								<a href="javascript:void(0);"  class="fullimage" id="<?php echo $fullimage;?>"><img src="<?php echo $img_url;?>"></a>
						</td>
						
				</tr>
*/ ?>
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