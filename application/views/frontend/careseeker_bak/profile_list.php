<?php
	if(is_array($userdatas)){
		foreach($userdatas as $key => $data): 
			$reviewData = Review_model::countReviewById($data['id']);
?> 	
	<div class="profile-list clearfix usual">
	<div class="profile-img-wrap">
			<?php if($data['profile_picture']!="" && file_exists('images/profile-picture/'.$data['profile_picture'])):?>
	            <a href="<?php echo site_url();?>careseekers/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
		            <div id="profile_image">
		            	<img src="<?php echo site_url("images/profile-picture/{$data['profile_picture']}")?>">
		            </div>
	            </a>
	            <?php else:?>
	            	<a href="<?php echo site_url();?>careseekers/details/<?php echo $data['uri'];?>">
			            <div id="profile_image">
			            	<img src="<?php echo site_url("images/no-image.jpg")?>">
			            </div>
			          </a>
	        <?php endif?>
	        <div class="basic-background">
		        <?php if($data['agree_bg_check']  == 1) 
		        	echo "<a href='#'>Basic Background Check</a>";
		        	else echo '';
		        ?>
	        </div>
	        <span class="img-of-profile"></span>
	        <br />

	        <div class="pin-location">
	        <?php if($data['location']){?>
	        	<img src="<?php echo site_url();?>img/pin.png">
	        <?php } ?> 
	        	

	        	 	<?php 
			        	$ipaddress = $_SERVER["REMOTE_ADDR"];
			        	$ipdata 	= Common_model::getIPData($ipaddress);

			        	if($ipdata['city']){
				        	$response 	= Common_model::getLongitudeAndLatitude($ipdata['city']);
				        	$lat    	= $response->results[0]->geometry->location->lat;
		                    $long   	= $response->results[0]->geometry->location->lng;
			        	}else{
			        		$lat   = $ipdata['lat'];
            				$long  = $ipdata['lon'];
			        	}

			        	$distance = Common_model::getdistance($lat,$long,$data['lat'],$data['lng'],"M"); 

			        	if($ipdata['city']){
			        		$city = $ipdata['city'];
			        	}else{
			        		$city = "you";
			        	}

			        	echo ceil($distance)." Miles Away From ". $city;
		        	?>

	        </div>

	        </div>
	        	<div class="profile-list-details">
					<span class="name">
						<a href="<?php echo site_url();?>careseekers/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo $data['first_name'];?> <?php echo $data['middle_name']?$data['middle_name']:'';?> <?php echo $data['last_name']?$data['last_name']:'';?></a>
					</span>
						<?php 
							$data['number_of_reviews']  = 0;
							$data['total_rating']  		= 0;
						?>
						<div class="rating-score" id="<?php echo round($reviewData['total_review'] / 5);?>"></div>

						(<?php echo number_format($reviewData['number_reviews']);?> reviews)

						<br />
							<span class="age-format">
							<?php if($data['age']){?>
								Age <?php echo $data['age'];?>
							<?php  } ?>
							</span>
							<span class="hour-rate">
							<?php if($data['hourly_rate']){?>
								<?php echo str_replace("t","-",$data['hourly_rate']); ?> /hr
							<?php  } ?>
							</span>
							<span class="exp-format">
							<?php if($data['experience']){?>
								<?php echo $data['experience'];?> yrs of exp
							<?php  } ?>
							</span>
						

						<div class="category-img"></div>
<div class="line"></div>
					
					<div class="profiles-description"><?php echo nl2br($data['profile_description']);?></div>
				
					<a href="<?php echo site_url();?>therapists/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" style="color:#98C85A">More</a>
					<br />
					<h5>Last Signed in:
							<?php foreach($userlogs as $log):
								if($data['user_id'] == $log['user_id']){
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

					 	<a href="<?php echo site_url();?>careseekers/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary">See full Profile</a>
				</div>
		</div>

		<div class="clearfix"></div>

		<?php 
		//$num['rate'] = round($data['total_rating'] / 5);
		endforeach;
	}else{
		echo 'No results found';
			}
?>
