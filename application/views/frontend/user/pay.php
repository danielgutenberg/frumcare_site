<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="conatiner">
		<?php echo $this->breadcrumbs->show();?>
	    <div class="dashboard-left float-left">
	    	<?php $this->load->view('frontend/user/dashboard_nav');?>
	    </div>
	        <div class="dashboard-right float-right"> 
		        <div class="top-welcome">
					<h2>Pay From Here</h2>
				</div>
		
		<form name="_xclick" action="https://www.sandbox.paypal.com/us/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="me@mybusiness.com">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="item_name" value="<?php echo $this->session->userdata['package_name'];?>">
			<input type="hidden" name="amount" value="<?php echo number_format($this->session->userdata['package_amount'],2,'.','');?>">
			<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
		</form>
	</div>
</div>
