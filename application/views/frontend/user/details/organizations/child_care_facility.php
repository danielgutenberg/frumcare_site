<?php
$cross = " <img src='".site_url()."img/cross.png'>";
$tick  = " <img src='".site_url()."img/nut-list.png'>";
if($currency == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
?>
<div class="table-responsive">
	<table class="table table-striped">
		<tr>
			<td>Position needed</td>
			<td><?php $position = !empty($job_position) ? $job_position : 'N/A'; echo $position?></td>
		</tr>
		
		 <?php if(!empty($rate)){ ?>   
        <tr>
            <td>Wage</td>
            <td >
            <?php echo $symbol . $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Payment Available</div>    
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
					<div class="details-info"><?php if(in_array("Start Date",$available)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>                   
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
		$lang = explode(',', $language); 
		?>
		<td>Languages Spoken</td>
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
				<?php
					$train = explode(',', $training);
					?>
					<td>Must have following Training / Certification</td>
					<td>
						<div class="details-info"><?php if(in_array('CPR', $train)){ echo $tick; }else{ echo $cross; }?>CPR</div>
						<div class="details-info"><?php if(in_array('First Aid', $train)){ echo $tick; }else{ echo $cross; }?>First Aid</div>
						<div class="details-info"><?php if(in_array('Nanny/ Babysitter course', $train)){ echo $tick; }else{ echo $cross; }?>Nanny / Babysitter course</div>
						<div class="details-info"><?php if(in_array('Nurse', $train)){ echo $tick; }else{ echo $cross; }?>Nurse</div>
						<div class="details-info"><?php if(in_array('Other', $train)){ echo $tick; }else{ echo $cross; }?>Other</div>
						<div class="details-info"><?php if(in_array('Not necessary', $train)){ echo $tick; }else{ echo $cross; }?>Not necessary</div>
					</td>
				</tr>
				<tr>
					<?php if(!empty($experience)){ ?>
					<td>Minimum Experience</td>
					<td><?php if ($experience == '6') {echo '5+'; } else {echo $experience;}?> years</td>
					<?php }  
                else{ ?>
                    <td>Minimum Experience</td>
                    <td>N/A</td>
                    <?php } ?>
				</tr>
				
				<?php if(!empty($religious_observance)){ ?>    
        <tr>
            <td>Level of observance necessary</td>
            <td>
                <?php echo $religious_observance; ?>
            </td>
        </tr>
    <?php }else{
            ?>
                <tr>
                    <td >Level of observance necessary </td>
                    <td>N/A</td>
                </tr>
                <?php } ?>
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
            <?php
           ?>
			 
				

				
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
