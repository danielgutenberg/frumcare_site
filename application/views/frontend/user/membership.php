<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
	<?php echo $this->breadcrumbs->show();?>
	

	<div class="dashboard-left float-left">
		<?php $this->load->view('frontend/user/dashboard_nav');?>
	</div><!--dashboard-left-->

	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>My Membership</h2>
		</div>

		<div class="search-links">

		<table class="table table-bordered table-striped">
			<tr>
				<th>Profile Type</th>
				<th>Membership</th>
				<th>Action</th>
			</tr>
			<?php 
			if(is_array($membership)){
				foreach($membership as $memberdata):
                $care = get_care_detail($memberdata['care_type']);
			?>

			<tr>
				<td><?php echo $care['service_name'];?></td>
				<td>
					<?php 
						if($memberdata['package_id'] == 0){
								echo 'No package selected';
						}

						foreach($packages as $package):
								if($package['id'] == $memberdata['package_id']){
									echo $package['package_name'];
								}
						endforeach;
					?>
				</td>
				<td><a href="<?php echo site_url();?>user/upgradepackage/<?php echo check_user();?>/<?php echo $memberdata['care_type'];?>" class="btn btn-primary">Upgrade Now</a></td>
			</tr>
			<?php  	
					endforeach;	
			 	}
			 ?>
		</table>

		</div>

	</div>

	
	
</div>

