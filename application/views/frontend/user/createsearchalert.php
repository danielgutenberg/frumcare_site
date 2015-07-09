<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">

<div class="container">
	<?php echo $this->breadcrumbs->show();?>
	

	<div class="dashboard-left float-left">
	<?php 
		$this->load->view('frontend/user/dashboard_nav');
		echo flash();
	?>

	</div><!--dashboard-left-->

	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>Create Search Alerts</h2>
		</div>
	
	<?php 
		if(isset($searchalert)){
				$time 					= explode(',',$searchalert['available_time']);
				$experienced_with 		= explode(',',$searchalert['experienced_with']);
				$years_of_experience 	= $searchalert['years_of_experience'];
				$number_of_children 	= $searchalert['number_of_children'];
		}
	?>



	<form action="<?php echo site_url();?>user/createsearchalert" method="post" id="createsearchalert">

	<div class="alert-fields">
		<h4>Time Available </h4>
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Imm/Start Date',$time)){?> checked="checked" <?php }?> value="Imm/Start Date" class="required">Imm/Start Date</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Part Time',$time)){?> checked="checked" <?php }?> value="Part Time" class="required">Part Time</div>
		
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Full Time',$time)){?> checked="checked" <?php }?>  value="Full Time" class="required">Full Time</div>
		
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Morning',$time)){?> checked="checked" <?php }?> value="Morning" class="required">Morning</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Afternoon',$time)){?> checked="checked" <?php }?> value="Afternoon" class="required">Afternoon</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Weekends/ Shabbos',$time)){?> checked="checked" <?php }?> value="Weekends/ Shabbos" class="required">Weekends/ Shabbos</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Night Hours',$time)){?> checked="checked" <?php }?> value="Night Hours" class="required">Night Hours</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Daily hours',$time)){?> checked="checked" <?php }?> value="Daily hours" class="required">Daily hours</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Weekend hours',$time)){?> checked="checked" <?php }?> value="Weekend hours" class="required">Weekend hours</div>
			
			<div class="check"><input type="checkbox" name="available_time[]" <?php if(in_array('Vacation schedule',$time)){?> checked="checked" <?php }?> value="Vacation schedule" class="required">Vacation schedule</div>
			
			<div class="check"><input type="checkbox" name="available_time[]"  <?php if(in_array('24 hr care',$time)){?> checked="checked" <?php }?>value="24 hr care" class="required">24 hr care</div>
		
	</div>
	<div class="alert-fields">
		<h4>Experienced With</h4>
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Any',$experienced_with)){?> checked="" <?php }?> value="Any" class="required">Any</div>
		
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Bathing',$experienced_with)){?> checked="" <?php }?> value="Bathing" class="required">Bathing</div>
			
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Dressing',$experienced_with)){?> checked="" <?php }?> value="Dressing" class="required">Dressing</div>
			
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Grooming',$experienced_with)){?> checked="" <?php }?> value="Grooming" class="required">Grooming</div>
			
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Toileting',$experienced_with)){?> checked="" <?php }?> value="Toileting" class="required">Toileting</div>
			
			<div class="check"><input type="checkbox" name="experienced_with[]" <?php if(in_array('Feeding & sepcial diet',$experienced_with)){?> checked="" <?php }?> value="Feeding & sepcial diet" class="required">Feeding & sepcial diet</div>
			
	</div>
	<div class="alert-fields exp-yr">
			<h4>Year of Experience</h4>
			<select name="years_of_experience" class="required">
			<option value="">--select--</option>
				<option value="1 year" <?php if($years_of_experience == '1 year'){?> selected="seleted" <?php } ?>>1 year</option>
				<option value="2 years" <?php if($years_of_experience == '2 years'){?> selected="seleted" <?php } ?>>2 years</option>
				<option value="3 years" <?php if($years_of_experience == '3 years'){?> selected="seleted" <?php } ?>>3 years</option>
				<option value="4 years" <?php if($years_of_experience == '4 years'){?> selected="seleted" <?php } ?>>4 years</option>
				<option value="5 years" <?php if($years_of_experience == '5 years'){?> selected="seleted" <?php } ?>>5 years</option>
				<option value="5+ years" <?php if($years_of_experience == '5+ years'){?> selected="seleted" <?php } ?>>5 years+</option>
			</select>
			
	</div>
	<div class="alert-fields edu-level">

			<h4> Education Level</h4>
			<select name="education_level">
				<option value="">--select--</option>
				<option value="Elementary" <?php if($searchalert['education'] == 'Elementary'){?> selected="selected" <?php }?>>Elementary</option>
				<option value="High school" <?php if($searchalert['education'] == 'High school'){?> selected="selected" <?php }?>>High school</option>
				<option value="Yeshiva/Seminary" <?php if($searchalert['education'] == 'Yeshiva/Seminary'){?> selected="selected" <?php }?>>Yeshiva/Seminary</option>
				<option value="Degree" <?php if($searchalert['education'] == 'Degree'){?> selected="selected" <?php }?>>Degree</option>
			</select>

			
	</div>
	<div class="alert-fields child-no">
			<h4>Number of Children</h4>
			<input type="text" name="number_of_children" value="<?php echo $number_of_children;?>" class="required">
			<input type="hidden" name="alert_id" value="<?php echo @$searchalert['id'];?>">
			<br/>
	</div>
			<input type="submit" name="create_alert" value="Create Alert" class="btn btn-info">
	</form>
	</div><!--dashboard-right-->

</div>
<script type="text/javascript">
	$('#createsearchalert').validate({
		rules:{
			number_of_children :{
				required : true,
				number: true,
          		digits: true,
			}
		},
		messages:{
			required: "Please enter valid number"
		}
	});
</script>
