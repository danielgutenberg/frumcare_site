<div class="container">
	<?php echo $this->breadcrumbs->show();?>
	<div class="caregivers-details">
		<h3>Nannies</h3>
		<div class="left-sidebar-details">
			<div class="profile-img"><?php if($recordData['profile_picture']!= '' && file_exists('images/profile-picture/'.$recordData['profile_picture'])):?>
				<img src="<?php echo site_url();?>images/profile-picture/<?php echo $recordData['profile_picture'];?>">
			<?php else:?>
			<img src="<?php echo site_url("images/no-image.jpg")?>">
		<?php endif;?></div>
		<div class="details-right-caregive">
			<span><?php echo $recordData['name'];?></span>
			<br/>
            <?php $reviews = $number_reviews['number_reviews'];?>
			<div class="rating-score" id="<?php echo round($number_reviews['total_review']/($reviews>0?$reviews:1)) ;?>"></div>

			<?php $reviews = $number_reviews['number_reviews'];?>
			(<?php echo number_format($reviews);?> reviews) 
			<?php if(isset($this->session->userdata['current_user'])){?>
			<a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" id="<?php echo $this->session->userdata['current_user'];?>">Write a review</a>
            <a href="javascript:void(0);" class="favorite" style="color:#8C8C8C;" id="<?php echo $recordData['id'];?>">Favorite this profile</a>
			<?php }else{ ?>
			<a href="javascript:void(0);" class="review">Write a review</a>
			<?php }?>
			<br />

			<span class="age-wrap"><?php echo $recordData['age']. '<span>age</span>';?></span>
			<span class="hour-wrap">$<?php echo str_replace("t","-",$recordData['hourly_rate']).'<span>hourly rate</span>'; ?></span>
			<span class="experience-wrap"><?php echo $recordData['experience']. ' <span>yrs experience</span>';?></span>
			<div class="clearfix margin-bots"></div>
			<span class="location-wrap"><?php echo $recordData['location'].'<span>location</span>';?></span>
			<span class="care-type-wrap">
				<?php 
					if($caretypes):
							foreach($caretypes as $care):
								if($recordData['care_type'] == $care['id'])
									echo ucwords($care['service_name']).'<span>care type</span>';
							endforeach;
					endif;
				?>
			</span>

			<!-- <span class="job-type-wrap">
				<?php /*if($recordData['job_type'] == 1)
					echo 'full time<span>Available </span>';
					*/
				?>
			</span> -->

		
			<span class="part-time-wrap">
				<?php if($recordData['job_type'] == 2){
					echo 'Part time <span>availablility</span>';
				}else{
					echo 'Full time<span>availablility</span>';
				}
				?>
			</span>
		</div>
				<div class="clearfix"></div>
				<br/>
				<div class="meet-caregivers-clients">
					<h2> Meet <?php echo $recordData['name'];?> </h2>
					<br />
					<p>
						<?php echo nl2br($recordData['profile_description']);?>Curabitur ut feugiat ante. In semper imperdiet pellentesque. Mauris blandit nulla neque, ac facilisis justo suscipit ut. Sed pellentesque consectetur consectetur. Nullam a justo porta, porta justo ac, viverra nisl. Pellentesque viverra metus condimentum mattis consectetur. Sed elementum, purus eget semper molestie, tellusCurabitur ut feugiat ante. In semper imperdiet pellentesque. Mauris blandit nulla neque, ac facilisis justo suscipit ut. Sed pellentesque consectetur consectetur. Nullam a justo porta, porta justo ac, viverra nisl. Pellentesque viverra metus condimentum mattis consectetur. Sed elementum, purus eget semper molestie, tellus	
					</p>
				</div>
				<div class="clients-reviews-wrappers">
					<h3>Client Reviews</h3>
					<div class="rating-review">
						<div class="review_rating">
                <?php $reviews = $number_reviews['number_reviews'];?>
					<div class="rating-score" id="<?php echo round($number_reviews['total_review']/($reviews>0?$reviews:1));?>"></div>
					
					(<?php echo number_format($reviews);?> reviews) 
				</div>

						<br />

						<div class="reviewDetails">

							<a href="<?php echo site_url();?>review/allreviews/<?php echo sha1($recordData['id']);?>">See all <?php echo number_format($number_reviews['number_reviews']);?> customer reviews</a>
						</div></div>
						<div class="clients-review-right">
						<?php 
							$sum = 0;
							if($reviewdatas):
								foreach($reviewdatas as $reviewdata):?>
									<span class="review-contents">"<?php echo nl2br($reviewdata['description']);?>"</span>
									<p><?php echo $reviewdata['name'];?> | <?php $temp = explode(' ' ,$reviewdata['created_date']);
									echo (date("g:i a", strtotime($temp['1'])));
									echo ',';
									echo ' '.date("d-m-Y", strtotime($temp['0'])); ?></p>
									
									<?php 
									
									$sum = $sum + $reviewdata['review_rating'];							
									$result = round($sum / 5);
								endforeach;
							endif;
							?>
							
						</div>
					</div><div class="clearfix"></div>
					<?php //var_dump($recordData);?>
					<div class="nutshell">
						<h2>In a nutshell</h2>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['number_childrens'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{?>
									<img src="<?php echo site_url();?>img/cross.png">
									<?php } ?>
									Will care for up to 3 children
							</li>
							<li>
								<?php if($recordData['on_short_notice'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{?>
									<img src="<?php echo site_url();?>img/cross.png">
									<?php } ?>
								Available with short notice
							</li>
							<li>
								<?php if($recordData['vehicle'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{?>
									<img src="<?php echo site_url();?>img/cross.png">
									<?php } ?>
								Has own transportation
							</li>
						</ul>

						<ul class="nutshells">
							<li>
								<?php if($recordData['homework_help'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php  } ?> 
								Will provide homework help
							</li>
							<li>
								<?php if(@$recordData['basic_homework'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php  } ?> 
									Has special needs experince
							</li>
							<li>
								<?php if(@$recordData['basic_homework'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php  } ?> 
								Has infant care experince
							</li>
						</ul>

						<ul class="nutshells">
							<li>
							<?php if(@$recordData['smoker'] == 2){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php  } ?> 
								Non Smoker
							</li>
							<li>
							<?php if(@$recordData['pets'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php  } ?> 
								Comfort with pets
							</li>
							<li>
							<?php if(@$recordData['sick_child_care'] == 1){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
							<?php  } ?> 
								Willing to provide sick care
							</li>
						</ul>	

					</div>
					<div class="clearfix"></div>
					<div class="nutshell">
						<h2>Experience</h2>
						<span><?php echo $recordData['experience'];?> years of paid child care experience with:</span>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['age_group'] == 'less than one year'){?>
											<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
									First year
							</li>
							<li>
							<?php if(@$recordData['age_group'] == '1t3'){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Toddlers (1 to 3 years)
							</li>

						</ul>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['age_group'] == '3t5'){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Preschooler (3 to 5 years)
							</li>
							<li>
								<?php if(@$recordData['age_group'] == '6t11'){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Grade School (6 to 11 years)
							</li>

						</ul>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['age_group'] == '10-15'){?>
									<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>

								Pre-teen / Teenagers (12 years and over)
							</li>

						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="nutshell">
						<h2>Skills</h2>
						<ul class="nutshells">
							<li>
								<?php if($recordData['cook'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Cooking / Meal Preparation
							</li>
							<li>
								<?php if(@$recordData['errands'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Errands
							</li>
							<li><?php if(@$recordData['travel'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Travel
							</li>
						</ul>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['laudry'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Laundry
							</li>
							<li>
								<?php if(@$recordData['carpooling'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								
								Carpooling
							</li>
							<li>
								<?php if(@$recordData['craft'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>
								Crafts
							</li>
						</ul>
						<ul class="nutshells">
							<li>
								<?php if(@$recordData['grocery_shopping'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>

								Grocery Shopping
							</li>
							<li>
								<?php if($recordData['basic_housework'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>

								Light Housekeeping
							</li>
							<li>
								<?php if(@$recordData['swimming_supervision'] == 1){?>
								<img src="<?php echo site_url();?>img/nut-list.png">
								<?php }else{ ?>
								<img src="<?php echo site_url();?>img/cross.png">
								<?php } ?>

								Swimming Supervision
							</li>
						</ul>
					</div>
					<div class="similiar-care">
						<h2>Similar Care Providers</h2>
						<?php 
							if($similar_types!=''){
								foreach($similar_types as $caregiver):
						?>

						<div class="similar-care-providers care-providers1">
							<div class="imgs">
								<?php if($caregiver['profile_picture']!='' && file_exists('images/profile-picture/'.$caregiver['profile_picture'])){?>
										<img src="<?php echo site_url();?>images/profile-picture/<?php echo $caregiver['profile_picture'];?>">
								<?php }else{ ?>
									<img src="<?php echo site_url();?>images/no-image.jpg" />
								<?php } ?>
							</div>

							<div class="name-care-providers"><?php echo trim($caregiver['name']);?></div>

							<div class="service-care-providers">
								<?php foreach($care_type as $type):
										if($caregiver['care_type'] == $type['id'])
											echo ucwords($type['service_name']);
								endforeach;?>	
							</div>
							<div class="rating-score"></div>
							<div class="care-hours">
								<?php if($caregiver['hourly_rate']!=''){
										echo '$'.str_replace('t', '- $', $caregiver['hourly_rate']).'/hour';
								}else{
										echo '$0/hour';
									}?>
							</div>
						</div>
						<?php  
								endforeach;
							} 
						?>
					</div>
					<div class="references">
						<h2>References</h2>
						<div class="references1">
							<div class="names">Sara Paul<span>is a reference for Michelle W.</span></div>
							<div class="relationships"><strong>Relationship</strong>: Family</div>
							<div class="contact-reference">Join Now to Contact Reference</div>
						</div>
						<div class="clearfix"></div>
						<div class="references1 refer1">
							<div class="names">John Marshall<span>is a reference for Sara Paul</span></div>
							<div class="relationships"><strong>Relationship</strong>: Senior Care</div>
							<div class="contact-reference">Join Now to Contact Reference</div>
						</div>
						<div class="clearfix"></div>
						<div class="references1">
							<div class="names">Michelle<span>is a reference for Michal W.</span></div>
							<div class="relationships"><strong>Relationship</strong>: Child Care</div>
							<div class="contact-reference">Join Now to Contact Reference</div>
						</div>
					</div>
				</div>
			</div>


			

			<div class="right-sidebar-details">
				<!--<p> -->
				<!--	Last Signed in: -->
					<?php 
					/*$dbDate = $userlog['login_time']; // Database date
					$endDate = time(); 
					$diff = $endDate - $dbDate; 
					$days = floor($diff/86400);
					$hours = floor(($diff-$days*86400)/(60 * 60));
					$min = floor(($diff-($days*86400+$hours*3600))/60);
					$second = $diff - ($days*86400+$hours*3600+$min*60);

					if($days > 0) echo "( " .$days." days ago )";
					elseif($hours > 0) echo "( " .$hours." hours ago )";
					elseif($min > 0) echo "( " .$min." minute ago )";
					else echo "( just second ago*/
				?>
	<!--</p>-->
	<?php 
		if(isset($this->session->userdata['current_user'])){
			$id = $this->session->userdata['current_user'];
	}else{
		$id = '';
	}
	?>

	<span class="sidebar-name-btn"><a href="javascript:void(0);" class="btn btn-primary viewcontactdetails" id="<?php echo $id;?>"> Contact  <?php echo $recordData['name'];?> </a></span>
	<span class="view-availability-btn"><a href="#" class="btn btn-primary"> View Availability</a></span>
	<div class="verification-sidebar">
		<h2>Verifications</h2>
		<ul class="contacts-verified">
			<li>Phone number - Unverified</li>
			<li>Email address - <?php if($recordData['email_status'] == 1) echo 'Verified'; else echo 'Unverified';?></li>
		</ul>

		<ul class="social-unverified">
			<li class="fb">Facebook - Unverified</li>
			<li class="twt">Twitter - Unverified</li>
			<li class="google">Google+ - Unverified</li>
		</ul>
		<div class="preliminary-check">Preliminary check - <a>Request now</a></div>
		<ul class="check-training">
			<li class="bbc">Basic Background Check
				<span>(Not Run)</span></li>
				<li class="mvrc">Motor Vehicle Records Check
					<span>(Not Run)</span></li>
					<li class="fat">First Aid Training</li>
					<li class="cprt">CPR Training</li>
					</ul>
				</div>
				
				<div class="education-major-wrap">
				<div class="education-major">
					<h2>Education</h2>
						<div class="education-level"><span>Education Level:</span><?php if($recordData['education_level'] !=""){ echo ucwords($recordData['education_level']); }?></div>
						<div class="texts"><?php if($recordData['educational_institution'] !=""){ echo ucwords($recordData['educational_institution']); }?></div>
						<div class="education-levels"><span>Major:</span> Science</div>
				</div>
			</div>
			<div class="share-profile-wrap">
				<div class="share-profile">
					<h2>Share this profile</h2>
						<div class="texts">You know someone who might be interested in this care provider?</div>
						<div class="share-profile-via">
							<h2>Share this profile via</h2>
							<span class='st_facebook_large' displayText='Facebook'></span>
							<span class='st_twitter_large' displayText='Tweet'></span>
							<span class='st_sharethis_large' displayText='ShareThis'></span>
							<span class='st_email_large' displayText='Email'></span>
						</div>
				</div>
			</div>
			</div>
			<div class="clearfix"></div>
			<div class="availability">
				<h3>Availability</h3>
				<div>
					<table border="1" width="100%">
						<tr>
							<th class="greys"></th>
							<th class="darks">Sun</th>
							<th>Mon</th>
							<th class="darks">Tue</th>
							<th>Wed</th>
							<th class="darks">Thur</th>
							<th>Fri</th>
							<th class="darks">Sat</th>
						</tr>
						<tr>
							<td align="right" class="greys">Early Morning</td>
							<td align="center" class="darks"> <?php if($availablility['early_morning_sun'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png" /> <?php }else{ ?> <img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['early_morning_mon'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_morning_tue'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['early_morning_wed'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_morning_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['early_morning_fri'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_morning_sat'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
						</tr>
						<tr>
							<td align="right" class="greys">Late Morning</td>
							<td align="center" class="darks"> <?php if($availablility['late_morning_sun'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['late_morning_mon'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_morning_tue'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['late_morning_wed'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_morning_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center"> <?php if($availablility['late_morning_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /> <?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_morning_fri'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?> </td>
						</tr>
						<tr>
							<td align="right" class="greys">Early Afternoon</td>
							<td align="center" class="darks"> <?php if($availablility['early_afternoon_sun'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php }?></td>
							<td align="center"> <?php if($availablility['early_afternoon_mon'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_afternoon_tue'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['early_afternoon_wed'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_afternoon_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php }?></td>
							<td align="center"> <?php if($availablility['early_afternoon_fri'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_afternoon_sat'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
						</tr>
						<tr>
							<td align="right" class="greys">Late Afternoon</td>
							<td align="center" class="darks"> <?php if($availablility['late_afternoon_sun'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_afternoon_mon'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_afternoon_tue'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_afternoon_wed'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_afternoon_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_afternoon_fri'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_afternoon_sat'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/>  <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
						</tr>
						<tr>
							<td align="right" class="greys">Early Evening</td>
							<td align="center" class="darks"> <?php if($availablility['early_evening_sun'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['early_evening_mon'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_evening_tue'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['early_evening_wed'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_evening_thur'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['early_evening_fri'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['early_evening_sat'] == 1){?><img src="<?php echo base_url();?>img/bullet.png"/> <?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
						</tr>
						<tr>
							<td align="right" class="greys">Late Evening</td>
							<td align="center" class="darks"> <?php if($availablility['late_evening_sun'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_evening_mon'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_evening_tue'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_evening_wed'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_evening_thur'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['late_evening_fri'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['late_evening_sat'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
						</tr>
						<tr>
							<td align="right" class="greys">Over Night</td>
							<td align="center" class="darks"> <?php if($availablility['overnight_sun'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['overnight_mon'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['overnight_tue'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['overnight_wed'] == 1){?> <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['overnight_thur'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center"> <?php if($availablility['overnight_fri'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
							<td align="center" class="darks"> <?php if($availablility['overnight_sat'] == 1){?>  <img src="<?php echo base_url();?>img/bullet.png"/><?php }else{ ?><img src="<?php echo site_url();?>img/cross.png" /><?php  }?></td>
						</tr>
					</table>
					<div class="bg-table"></div>
				</div>
			</div>

		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Write a  Review</h4>
				</div>
				<div class="modal-body">
					<form class="usersreviewform">
						<table>
							<tr>
								<td><label>Name</label></td>
								<td><input type="text" name="name" placeholder="Enter Your Name"></td>
							</tr>

							<tr>
								<td><label>Description</label></td>
								<td>
									<textarea name="review_description"></textarea>
								</td>
							</tr>

							<tr>
								<td><label>Rate</label></td>
								<td>
									<div id="half" style="cursor: pointer;">								
									</div>
								</td>
							</tr>	
							<tr>
								<td>
									<input type="hidden" name="current_user" value="<?php echo @$this->session->userdata['current_user'];?>"/>        					
								</td>
								<td>
									<input type="hidden" name="profile" value="<?php echo $recordData['id'];?>">
									<input type="hidden" name="date_time" value="<?php echo date('Y-m-d H:i:s')?>">
								</td>
							</tr>	
						</table>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary save">Save changes</button>
						</div>
					</form>
					<div class="reviewsuccess" style="display:none;"><p>Review has been successfully saved.</p></div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<script src="<?php echo base_url();?>js/labs.js" type="text/javascript"></script>

<script>
$(function(){
	$('.review').on('click',function(){
		window.location = "<?php echo site_url();?>login";
	});

	$('#myModal').on('click',function(){
		$('form.usersreviewform').show();
		$('.reviewsuccess').hide();
	});

	$('.save').on('click',function(){
		$.ajax( {
			type: "POST",
			url: '<?php echo site_url();?>review',
			data: $('form.usersreviewform').serializeArray(),
			success: function( msg ) {
				$("form.usersreviewform").get(0).reset();
				$('form.usersreviewform').hide();
				$('.reviewsuccess').show();
			}
		});
	});

	$('#half').raty({
		path       : '<?php echo site_url();?>img/',
		starHalf   : 'star-half.png',
		starOff    : 'star-off.png',
		starOn     : 'star-on.png',
		half  : true,
	});

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
    
    $('.favorite').on('click',function(){
		var profile_id  = $(this).attr('id');
		var user_id 	= '<?php echo check_user();?>';
		$.ajax({
			type:"post",
			url:"<?php echo site_url();?>caregivers/favorite",
			data:"profile_id="+profile_id+"&user_id="+user_id,
			success:function(fav){
				console.log(fav);
			}
		});
	});

	$('.viewcontactdetails').on('click',function(){
			var id = $(this).attr('id');
			var slug = '<?php echo $this->uri->segment(3);?>';
			if(id ==''){
				window.location.href="<?php echo site_url();?>login";
			}else{
				$.ajax({
					type:"post",
					url:"<?php echo site_url();?>payment/checkpaymentstatus",
					data:"id="+id,
					success:function(msg){
						if(msg == 0){
							window.location.href="<?php echo site_url();?>user/upgrademembership";
						}else{
							window.location.href="<?php echo site_url();?>caregivers/contact/"+slug;
						}
					}
				});
			}
	});	
});
</script>


<!-- share this starts-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "fcfd27c1-d440-47b3-bb5e-17abb292ed1f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!-- share this ends -->
