<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
	<?php echo $this->breadcrumbs->show();?>
	

	<div class="dashboard-left float-left">
		<?php $this->load->view('frontend/user/dashboard_nav');?>
	</div><!--dashboard-left-->

	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>My search Alerts</h2>
		</div>

		<div class="search-links">
			 <a href="<?php echo site_url();?>user/createsearchalert">Create Search Alerts</a> 
			 <a href="<?php echo site_url();?>user/viewhistory">History</a>
			<a href="<?php echo site_url();?>user/currentsearch">Current Searches</a> -->
			<a href="<?php echo site_url();?>user/searchalerts">Search Alerts</a>
		</div>

	</div>

	
	
</div>

