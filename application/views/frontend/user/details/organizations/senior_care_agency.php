<?php
$cross = "<img src='".site_url()."img/cross.png'>";
$tick  = "<img src='".site_url()."img/nut-list.png'>";    
?>
<div class="table-responsive">
	<table class="table table-striped">
            
            <?php 
            if( $care_type == 10 || $care_type == 16 ) { ?>
                <!--<tr>-->
                <!--    <td>Type of Organization</td>-->
                <!--    <td>-->
                <!--        <?php echo $sub_care ? ucfirst($sub_care) : 'N/A'; ?>-->
                <!--    </td>-->
                <!--</tr>--> <?php
            }
        ?>
		<tr>
			<?php if(!empty($established)){?>
			<td>Year Established</td>
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
    <?php if(isset($willing_to_work)){
      $willingtowork = explode(',', $willing_to_work); ?>
      <td>Specialize in</td>
      <td>                    
       <div class="details-info"><?php if(in_array('Alz./dementia', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Alz. / dementia</div>
       <div class="details-info"><?php if(in_array('Sight loss', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Sight loss</div>
       <div class="details-info"><?php if(in_array('Hearing loss', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Hearing loss</div>
       <div class="details-info"><?php if(in_array('Wheelchair bound', $willingtowork)){ echo $tick; }else{ echo $cross; }?>Wheelchair bound</div>
       
     </td>
     <?php }  
                else{ ?>
                    <td>Specialize in</td>
                    <td>N/A</td>
     <?php }?>
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
			<div><?php echo $rate . ' ';?></div>
		</td>
        <?php }  
                else{ ?>
                    <td>Cost</td>
                    <td>N/A</td>
		<?php 
			}
		?>
	</tr>
		<tr>
            <td>Tell us about your organization</td>
            <td>
                <div class="details-info"><?php echo isset($desc) ? $desc : '' ?></div>
            </td>
        </tr>

		<tr>
			<?php if(!empty($refrences)){?>
			<td>References</td>
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
                    <td>References</td>
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

</div>