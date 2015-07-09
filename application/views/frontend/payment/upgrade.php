<div class="container">
<h2>Upgarde your Membership</h2>
	<p>Contact details, Reviews & Refrences of caregivers</p>
	<form action="<?php echo site_url();?>payment/save" method="post" role="form" id="payment_form"/>
		<?php 
			if($packages){
				foreach($packages as $package):
		?>
			<input type="radio" class="required" name="package" value="<?php echo $package['id'];?>"><?php echo ucwords($package['package_name']);?><?php echo '&nbsp;';?>$<?php echo $package['package_price'];?>/<?php echo $package['package_duration'];?> Months<br/>
		<?php 
				endforeach;
			}
		?>
		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata['current_user'];?>">

		<br />

		<input type="submit" name="upgrade" value="Upgrade Now" class="btn btn-primary">
	</form>
</div>



