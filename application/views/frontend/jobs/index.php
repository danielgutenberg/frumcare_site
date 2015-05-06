 <div class="container">
<?php $this->load->view('frontend/caregivers/left_navbar.php');?>

<div class="right-caregivers">
	<h3>53117 Jobs </h3>
	<div class="select-relevance">
		<span class="sort-by-relevance">
			<select id="sortby">
				<option value="desc" <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'desc'){ ?> selected="selected" <?php } }?>>Sort By Latest</option>
				<option value="asc"  <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'asc'){ ?> selected="selected" <?php } }?>>Sort By Name</option>
			</select>
		</span>
		<span>Results per Page</span>
			<span class="fifteens">
				<select id="sort">
					<option value="2" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '2'){?> selected="selected" <?php } } ?>>2</option>
					<option value="4" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '4'){?> selected="selected" <?php } } ?>>4</option>
					<option value="6" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '6'){?> selected="selected" <?php } }?>>6</option>
					<option value="100" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '100'){?> selected="selected" <?php } }?>>100</option>
				</select>
			</span>
	</div>

	<div class="navigations"></div>

	<div class="clearfix margin-bot"></div>
	<div id="list_container">

	<?php $this->load->view('frontend/jobs/jobs_list', array('jobs'=>$jobs)); ?>
	</div>
	
	</div>

</div>