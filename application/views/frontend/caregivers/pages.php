 <div class="container">
 <?php $this->load->view('frontend/caregivers/left_navbar.php');?>

<div class="right-caregivers">
<h3>53117 Nannies Near 11367 </h3>
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
<div id="result">
</div>
		<?php 
			foreach($userdatas as $key => $data):
				//var_dump($data);
		?> 	
	<div class="profile-list clearfix usual">
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
	        	<?php echo $data['location'];?>
	        </div>

	        </div>

	        	<div class="profile-list-details">
					<span><?php echo $data['first_name'];?> <?php echo $data['middle_name']?$data['middle_name']:'';?> <?php echo $data['last_name']?$data['last_name']:'';?></span>

						<!--<div class="rating-score" id="<?php echo round($data['total_rating'] / 5);?>"></div>

						(<?php echo number_format($data['number_of_reviews']);?> reviews)

						<br />-->
						<span class="age-format">Age <?php echo $data['age'];?></span>
						<span class="hour-rate"><?php echo str_replace("t","-",$data['hourly_rate']); ?> / Hr</span>

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

					 	
					</div>
					<div class="profile-activities">
						<?php if($data['job_type'] == 1){ ?>
					 	<li> Available full time</li>
					 	<?php }?>

					 	<?php if($data['job_type'] == 2){ ?>
					 	<li> Available part time</li>
					 	<?php }?>

					 	<?php if($data['number_of_children']){ ?>
					 		<li>Will Care upto <?php echo $data['number_of_children'];?> children</li>
					 	<?php } ?>

					 	<?php if($data['availability']){ ?>
					 		<li>Available on <?php echo $data['availability'];?></li>
					 	<?php } ?>

					 	<li>Has Special needs experience</li>

					</div>

					 	<a href="<?php echo site_url();?>caregivers/details/<?php echo $data['uri'];?>" class="btn btn-primary">See full Profile</a>
				</div>
		</div>

		<div class="clearfix"></div>

		<?php 
		//$num['rate'] = round($data['total_rating'] / 5);
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
			score	   : $(this).attr('id'),
			readOnly : true,
			half  : true,
			space : false
		}); 
	});

		$(document).ready(function(){
			var inital_sortlimit  = $('#sort').val();
			//var inital_sortlimit = 2;
			if(inital_sortlimit){
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>caregivers/getPages",
					data:"per_page="+inital_sortlimit,
					success:function(data){
						for (i= 1; i<=data; i++) {
								if(i == 1){
									var aclass="active";
								} 
								else{
									var aclass  = "in-active";
								}
                  			$('.navigations').append('<a href="<?php echo site_url();?>caregivers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')

            			}
					}	
				});
			}

			$('#sort,#sortby').change(function(){
				  var order 	= $('#sortby option:selected').val();
				  var per_page  = $('#sort option:selected').val();
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>caregivers/sort",
				  		data:"limit="+per_page+"&order="+order,
				  		success:function(msg){
				  			$('#result').html(msg);
				  			$('.usual').hide();
				  		}
				  });
			});
		});
</script>

