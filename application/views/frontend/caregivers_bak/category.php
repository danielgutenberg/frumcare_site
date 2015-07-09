 <div class="container">
	<?php echo $this->breadcrumbs->show();?>
		<h3>Category</h3>  
			
	  <div class="left-search-panel">
	 	<h4>Refine Results</h4>
	 	<form>
	 	
	 			<div><label>Country</label>
	 				 				<select name="country">
	 					<?php foreach($countries as $country):?>
	 						<option value="<?php echo $country['slug'];?>"><?php echo $country['name'];?></option>
	 					<?php endforeach;?>
	 				</select>
	 			</div>
	 	
	 			<div class="citys">
		 			<label>City</label>
		 			<input type="text" name="city">
	 			</div>
	 			<div>
		 			<label>Zip</label>
		 			<input type="text" name="zip">
	 			</div>
	 			<div class="select-services">
		 			<label>Select a service</label>
		 				<select name="service">
		 					<option value="">--select a service--</option>
		 				</select>
		 			</div>
	 			
	 			
		 			<div class="choose-services"><label>Choose Type</label>
		 			
		 				<select name="type">
		 					<option value="">--select a type--</option>
		 				</select>
		 			</div>
	 			
		 			<div class="within-distance"><label>Within</label>
		 			<input type="text" name="distance_in_length">
		 				<select name="distance">
		 					<option value="miles">Miles</option>
		 				</select>
		 			
	 			</div>

	 			<div class="keywordss"><label>Keyword(s)</label>
		 				<input type="text" name="keywords" />
		 				Add keywords to filter the terms found in job search
		 			</div>
		 			
	 			

	 					 			<div class="search-btns" colspan="2">
		 				<input type="submit" name="search" value="Search" class="btn btn-primary">
		 			</div>
	 			
	 	</form>

	 	
	 		<div class="time-available" colspan="2"><h4>Time available</h4> 
	 			<div>
	 		<input type="checkbox" name="before_school">
	 			<span>before school</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="after_school">
	 			<span>after school</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="after_school">
	 			<span>after school</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="mornings">
	 			<span>mornings</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="evenings">
	 			<span>evenings</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="weekends">
	 			<span>weekends</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="shbs">
	 			<span>shbs</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="yom_tov">
	 			<span>yom tov</span>
	 		</div>

	 		<div>
				<input type="checkbox" name="bhaab">
	 			<span>b'haab</span>
	 		</div>
</div>
	 		<div class="background-check">
<h4>Background Check</h4>
	 			<select name="background_check">
	 					<option value="">--select--</option>
	 					<option value="driving">Driving</option>
	 					<option value="criteria">Criteria</option>
	 			</select>
	 			</div>
	 		

	 		<div class="year-exp">
	 		<span>Year Experience</span>
	 		
	 			<select name="year_experience">
	 				<option value="babysitter">Babysitter</option>	
	 				<option value="nanny">Nanny</option>	
	 			</select>
	 		
	 		</div>

	 		<div class="no-child">
	 		<span>Number of Children</span>
	 		
	 			<select name="no_children">
	 				<option value="1">01</option>	
	 				<option value="2">02</option>	
	 				<option value="3">03</option>	
	 				<option value="4">04</option>	
	 				<option value="5">5+</option>	
	 			</select>
	 		
	 		</div>

	 		<div class="time-available" colspan="2"><h4>Experience With</h4>
	 		
	 			<div class="any"><input type="checkbox" name="any">
	 			<span>Any</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="bathing">
	 			<span>Bathing</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="dressing">
	 			<span>Dressing</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="grooming">
	 			<span>Grooming</span>
	 		</div>

	 		<div>
	 			<input type="checkbox" name="toileting">
	 			<span>toileting</span>
	 		</div>


	 		<div>
	 			<input type="checkbox" name="feeding">
	 			<span>Feeding & sepcail diet</span>
	 		</div>
	 		</div>

	 		<div class="educationss" colspan="2"><h4>Education</h4>
	 		<div>
	 			<span>Education</span>
	 			
	 				<select name="education">
	 				<option value="college">College</option>
	 				</select>
	 			</div>
	 		
	 		<div>
	 			<span>Student</span>
	 			
	 				<select name="education">
	 				<option value="university">University</option>
	 				</select>
	 			
	 		</div>
</div>

	 
	  </div>
<div class="right-caregivers">
<h3>53117 Nannies Near 11367 </h3>
<div class="select-relevance">
	<span class="sort-by-relevance">
		<select><option>Sort By Relevance</option> </select>
	</span>
	<span>Results per Page</span>

	<span class="fifteens">
	<select>
		<option>15</option>
		<option>25</option>
		<option>50</option>
		<option>100</option>
	</select>
	</span>
</div>
<?php echo $links;?>
<div class="clearfix margin-bot"></div>
		<?php foreach($userdatas as $key => $data):?> 	

		<div class="profile-list clearfix">
			
<div class="profile-img-wrap">
			<?php if($data['profile_picture']!="" && file_exists('images/profile-picture/'.$data['profile_picture'])):?>
	            <div id="profile_image"><img src="<?php echo site_url("images/profile-picture/{$data['profile_picture']}")?>"></div>
	            <?php else:?>
	            <div id="profile_image"><img src="<?php echo site_url("images/no-image.jpg")?>"></div>
	        <?php endif?>
	        <?php if($data['agree_bg_check']  == 1) echo "<a href='#'>Basic Background Check</a>";
	        	else echo '';
	        ?><span class="img-of-profile"></span>
	        <br />

	        <div class="pin-location">
	        <?php if($data['location_street1']){?>
	        	<img src="<?php echo site_url();?>img/pin.png">
	        <?php } ?> 
	        	<?php echo $data['location_street1'];?>
	        </div>

	        </div>

	        	<div class="profile-list-details">
					<span><?php echo $data['first_name'];?> <?php echo $data['middle_name']?$data['middle_name']:'';?> <?php echo $data['last_name']?$data['last_name']:'';?></span>

						<div class="rating-score"></div>

						(<?php echo number_format($data['number_of_reviews']);?> reviews)

						<br />
						<span class="age-format">Age <?php echo $data['age'];?></span>
						<span class="hour-rate"><?php echo str_replace("t","-",$data['hourly_rate']); ?> /hr</span>

						<span class="exp-format"><?php echo $data['experience'];?> yrs of exp</span>
						<div class="category-img"></div>
<div class="line"></div>
					
					<div class="profiles-description"><?php echo nl2br($data['profile_description']);?></div>
				
					<a href="<?php echo site_url();?>caregivers/details/<?php echo $data['uri'];?>" style="color:#98C85A">More</a>
					<br />
					<h5>Last Signed in:
							<?php foreach($userlogs as $log):
								if($data['id'] == $log['user_id']){
									$dbDate = $log['login_time']; // Database date
		    						$endDate = time();    // current time

								    $diff = $endDate - $dbDate; 
								    $days = floor($diff/86400);
								    $hours = floor(($diff-$days*86400)/(60 * 60));
								    $min = floor(($diff-($days*86400+$hours*3600))/60);
								    $second = $diff - ($days*86400+$hours*3600+$min*60);

								    if($days > 0) echo $days." days ago";
								    elseif($hours > 0) echo $hours." hours ago";
								    elseif($min > 0) echo $min." minute ago";
								    else echo "just second ago";
								}
							 endforeach;?> 
					 </h5>
					<div class="profile-activities">
					 	<li><?php echo $data['experience'];?> years of paid experience</li>
					 	<?php if($data['on_short_notice'] == 1){ ?>
					 	<li> Available with short notice</li>
					 	<?php }?>

					 	<?php if($data['driver_license'] == 1){ ?>
					 	<li> Has a driver's license</li>
					 	<?php }?>

					 	<?php if($data['homework_help'] == 1){ ?>
					 	<li> Will provide homework help</li>
					 	<?php }?>

					 	<?php if($data['job_type'] == 1){ ?>
					 	<li> Available full time</li>
					 	<?php }?>


					 	<?php if($data['job_type'] == 2){ ?>
					 	<li> Available part time</li>
					 	<?php }?>

					 	<a href="<?php echo site_url();?>caregivers/details/<?php echo $data['uri'];?>" class="btn btn-primary">See full Profile</a>

					</div>

				</div>
		</div>
<div class="clearfix"></div>
		<?php 
		$num['rate'] = round($data['total_rating'] / 5);
		endforeach;
		?>
</div>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>

<script type="text/javascript">
		$('.rating-score').each(function() {

		$(this).raty({
			path : '<?php echo site_url();?>img/',
			starHalf   : 'star-half.png',
			starOff    : 'star-off.png',
			starOn     : 'star-on.png',
			score	   : '<?php echo @$num["rate"];?>',
			readOnly : true,
			half  : true,
			space : false
		}); 
	});
</script>

