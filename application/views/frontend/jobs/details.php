<div class="container">
	
<?php 
	if($jobdetail):
		foreach ($jobdetail as $key => $value):
			foreach($caretypes as $caretype):
				if($value['care_type'] == $caretype['id']):?>
					<h2><?php echo $caretype['service_name'];?> Wanted</h2>	
					<br />
						<div class="user_need">
						
							<?php echo nl2br($value['profile_description']);?>
						</div>

					<br/>

					<div class="user_post">
						Posted by: <?php echo $value['first_name'].' ';?><?php echo $value['middle_name']?$value['middle_name']:'';?><?php echo ' ';?><?php echo $value['last_name']?$value['last_name']:'';?>
					</div>
					
				<?php endif;
			endforeach;
		endforeach;
?>
<?php endif;?>

</div>
