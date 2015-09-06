<script>
    $('.rating-score').ready(function(){   
        $('.rating-score').raty({
        	path : '<?php echo site_url();?>img/',
        	starHalf   : 'star-half.png',
        	starOff    : 'star-off.png',
        	starOn     : 'star-on.png',        	
        	readOnly   : true,
        	half       : true,
        	space      : false,
            score	   : function(){
                            return $(this).attr('data-numbers');
                         }
        });
     }); 
</script>
<?php 
	if(is_array($userdatas)){		
        foreach($userdatas as $key => $data){ 
			$reviewData = Review_model::countReviewById($data['id']);
            $navigate = $data['care_type']>16?'jobs':'caregivers'; ?> 	
            <div class="profile-list clearfix usual row">
            <div class="profile-img-wrap col-md-3 col-sm-3 col-xs-12"> <?php
                if($data['profile_picture']!="" && file_exists('images/profile-picture/'.$data['profile_picture'])) {?>
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
    		            <div id="profile_image">
    		            	<img src="<?php echo site_url("images/profile-picture/{$data['profile_picture']}")?>">
    		            </div>
    	            </a><?php }
                else {  
                    if($data['photo_of_child']!="" && file_exists('images/profile-picture/'.$data['photo_of_child'])) {?>
                        <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
        		            <div id="profile_image">
        		            	<img src="<?php echo site_url("images/profile-picture/{$data['photo_of_child']}")?>">
        		            </div>
        	            </a><?php } else { ?>
                
                
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
			            <div id="profile_image">
			            	<img src="<?php echo site_url("images/no-image.jpg")?>">
                        </div>
                    </a><?php 
                }} ?>
    	        <!--<div class="basic-background"><?php 
                    if($data['agree_bg_check']  == 1) 
    		        	echo "<a href='#'>Basic Background Check</a>";
  		        	else echo ''; ?>
    	        </div>
    	        <span class="img-of-profile"></span><br />-->
    	        <div class="pin-location"> <?php 
                    if($data['location']) { ?>
                        <img src="<?php echo site_url();?>img/pin.png">
                        <?php
                    }
                    if (is_array($location)) {
                        $location1 = explode(',',$location['place']);
                    } else {
                        $location1 = explode(',',$location);
                    }

                     //print_r($data);
                    $lat = $data['lat'];
                    $lng = $data['lng'];
                    $json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                    $json_data = json_decode($json);



                    $formated_add=$json_data->results[5]->formatted_address;
                    echo $formated_add;

                    if(preg_match('/'.$location1[0].'/',$data['location'])){
                        echo '0 Miles Away From '.$location1[0];
                    }elseif(preg_match('/'.$location1[0].'/',$formated_add)){
                        echo '0 Miles Away From '.$location1[0];

                    }else{
                        echo ceil($data['distance'])." Miles Away From ".$location1[0];  //location is passed from controller
                    }

    	        	?>
    	        </div>
	        </div>
        	<div class="profile-list-details col-md-9 col-sm-9 col-xs-12">
                <?php if ($data['account_category'] == 3) {?>
                <span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo $data['organization_name'];?></a>
				</span>	<?php } else { ?>
				<span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo $data['name'];?></a>
				</span>
				<?php } ?>
                
                
                <?php
                //for job posters
                if($data['care_type'] < 17 ){ ?>
                    <!--<div class="review_rating">
                        <?php 
                        $reviews = $reviewData['number_reviews'];?>
                        <div class="rating-score" data-numbers="<?php echo ($reviewData['total_review']/($reviews>0?$reviews:1));?>"></div>
				       (<?php echo number_format($reviews);?> reviews) 
			        </div>--> <?php 
                } ?> <br /> <?php
                
                $type = Caretype_model::getCareTypeById($data['care_type']);
                
                //for caregivers 
                //if($data['care_type'] < 10){ 
                if($data['care_type'] < 17){
                    echo $type[0]['service_name'].' - '.$data['location'];                                
                } 
                
                //for job posters
                //if($data['care_type'] < 25 && $data['care_type'] > 16){ 
                if($data['care_type'] > 16){
                    echo $type[0]['service_name'].' needed - '.$data['location'];                                                               
                } 
                
                //for caregivers
                if($data['care_type'] <10 ) {
                    $training_arr = explode(',',$data['training']); ?>
                    <div class="category-img">                            
                        <?php if(isset($data['driver_license']) && $data['driver_license'] == 1){ ?>
                            <img src="<?php echo site_url()?>img/car-badge.png" title="Has a vehicle"/>
                        <?php } ?>
                        
                        <?php /*if($data['email_status'] && $data['email_status'] == 1){ ?>
                            <img src="<?php echo site_url()?>img/verified-badge.png" title="Email Verified Badge"/>
                        <?php } */?>
                        
                        <?php if(in_array(strtolower('First Aid'), array_map('strtolower',$training_arr))){ ?>
                            <img src="<?php echo site_url()?>img/first-aid-badge.png" title="Has first aid training"/>
                        <?php } ?>
                        
                        <?php if(in_array(strtolower('CPR'), array_map('strtolower',$training_arr))){ ?>
                            <img src="<?php echo site_url()?>img/health-badge.png" title="Has CPR training"/>
                        <?php } ?>
                    </div> <?php 
                } ?>                        
				<div class="line"></div>
				
				<div class="profiles-description">
					<?php if(!empty($data['profile_description'])) { ?>
                    <?php echo substr(trim($data['profile_description']), 0, 250)." .....";?>
                    <?php } 
                    else {
                        echo "Description not available";
                    } ?>
				</div> <?php 
                if($data['profile_description']!=''){?>							                           
                    <a href="<?php echo site_url().$navigate; ?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" style="color:#98C85A">
						More
					</a> <?php 
                } ?>
			    <br />
			    <?php if($data['care_type'] != 7) { ?>
			    <h5>Last Signed in: <?php 
					$id 		= $data['user_id'];
					$userlog 	= User_model::getUserLogById($id);
					if(!empty($userlog)){
						$dbDate = $userlog['login_time']; // Database date
						$endDate = time(); 
						$diff = $endDate - $dbDate; 
						$days = floor($diff/86400);
						$hours = floor(($diff-$days*86400)/(60 * 60));
						$min = floor(($diff-($days*86400+$hours*3600))/60);
						$second = $diff - ($days*86400+$hours*3600+$min*60);

						if($days > 0) echo "( " .$days." days ago )";
						elseif($hours > 0) echo "( " .$hours." hours ago )";
						elseif($min > 0) echo "( " .$min." minute ago )";
						else echo "( just second ago )";
					} ?> 
			    </h5>
			    <?php } ?>
				<div class="profile-activities"> <?php 
                    
                    //for caregivers
                    if($data['care_type'] <10 ) { ?>
                        <?php if($data['care_type'] != 7) { ?>
                            <?php if(isset($data['age']) && is_numeric($data['age'])){?>
                                <li>							
    								<?php echo $data['age'];?> years old							
    							</li>
                            <?php  } ?>                        
                            
                            <?php if($data['experience']){?>
    							<li>							
    								<?php if ($data['experience'] == 6) {echo '5+';} else {echo $data['experience'];}?> years of experience							
    							</li>
                            <?php  } ?>
                        <?php  } 
                        else { 
                            if($data['type_of_therapy']) { ?>
                              <li>
                                <?php echo $data['type_of_therapy']; ?>
                              </li>
                            <?php }
                            if($data['certification']) { ?>
                              <li>
                                <?php echo $data['certification']; ?>
                              </li>
                            <?php }
                            
                         } ?>
                       <?php /*if($data['rate']){?>
							<li>							
								<?php echo "$".str_replace("t","-",$data['rate']); ?>
                                <?php echo $data['rate_type']==1?" per hour":" per month"; ?>						
							</li>
                        <?php  } */?>
                    
                    <?php  } ?>

                    </div><div class="profile-activities">
                                        
                    <?php 
                    
                    //for job posters
                    if($data['care_type'] >16 && $data['care_type'] <25 ) { ?>
                        <?php  $availablility_arr = explode(',',$data['availability']); ?>
                        <?php if(in_array(strtolower('Asap'),array_map('strtolower',$availablility_arr))){?>
                            <li>							
								Job start date: ASAP							
							</li>
                        <?php  }
                        elseif(isset($data['start_date']) && $data['start_date'] !='0000-00-00'){ ?>    
                            <li>
                               <?php $start_date_arr = explode('-',$data['start_date'])?>
                               Job start date: <?php echo $start_date_arr[1].'/'.$start_date_arr[2].'/'.$start_date_arr[0]; ?>
                            </li>
                        <?php  } ?>
                        <?php if($data['rate']){?>
							<li>							
								<?php echo "$".str_replace("t","-",$data['rate']); ?>
                                <?php echo $data['rate_type']==1?" per hour":" per hour"; ?>						
							</li>
                        <?php  } ?>
                    <?php  } ?>
                    
                    <?php /*
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
                    */ ?>					 	

					<?php 
                    
                    //for caregivers
                    if($data['care_type'] <10 ) { ?>
                    
                    <?php if($data['care_type'] == 7 && $data['experience']) { ?>
                              <li>
                                <?php if ($data['experience'] == 6) {echo '5+';} else {echo $data['experience'];}?> years in practice
                              </li>
                            <?php } ?> 
                    
                    <?php if(segment(2)!== 'therapists'){ ?>
                        
                        
                        <?php if($data['rate']){?>
							<li>							
								<?php echo $data['care_type']==3 ? $data['rate'] : "$".str_replace("t","-",$data['rate']); ?>
                                <?php echo $data['care_type']==3 ? "" : " per hour"; ?>						
							</li>
                        <?php  
                            }
                           } 
                        ?>
                        
                        
                        <?php
                            if(segment(2)!== 'therapists'){ 
                                if($data['experience']) { 
                        ?>
                              <!--<li>-->
                                <?php 
                                    // echo $data['experience'].' years in practice'; 
                                    ?>
                              <!--</li>-->
                        <?php
                             }
                         } 
                        ?> 
                        
                        <?php  $availablility_arr = explode(',',$data['availability']); ?>
                        <?php if(in_array('Immediate',$availablility_arr)){?>
                            <li>							
								Available Immediately							
							</li>
                        <?php  }
                        elseif(isset($data['start_date']) && $data['start_date'] !='0000-00-00'){ ?>    
                            <li>
                               <?php $start_date_arr = explode('-',$data['start_date'])?>
                               Available <?php echo $start_date_arr[1].'/'.$start_date_arr[2].'/'.$start_date_arr[0]; ?> 
                            </li>
                        <?php  } ?>                             
                        <?php /* if($data['driver_license'] == 1){ ?>
					 	<li> I have a Drivers license </li>
					 	<?php }?>
                        
                        <?php if($data['vehicle'] == 1){ ?>
                            <li>I have a Vehicle</li>
					 	<?php }?>
                                                     
                        <?php if($data['pick_up_child'] == 1){ ?>
                            <li> Able to pick up kids from school</li>
					 	<?php }?>
                        
                        <?php if($data['cook'] == 1){ ?>
                            <li>Able to cook and prepare food</li>
					 	<?php }?>
                        <?php if($data['basic_housework'] == 1){ ?>
                            <li>Able to do light housework/ cleaning</li>
					 	<?php }?>
                        <?php if($data['homework_help'] == 1){ ?>
                            <li>Able to help with homework</li>
					 	<?php }?>
                        <?php if($data['sick_child_care'] == 1){ ?>
                            <li>Able to care for sick child</li>
					 	<?php }?>
                        <?php if($data['on_short_notice'] == 1){ ?>
                            <li>Available on short notice</li>
					 	<?php }?>
                        <?php if($data['bath_children'] == 1){ ?>
                            <li>Able to bathe children</li>
					 	<?php }?>
                         <?php if($data['bed_children'] == 1){ ?>
                            <li>Able to put children to bed</li>
					 	<?php } */ ?>                           					 	        
                    <?php } ?>
                    <?php /*
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
                    */ ?>
				</div>
                <div style="clear:both"></div>
				 	<a href="<?php echo site_url().$navigate; ?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" >See full Profile</a>
			</div>
		</div>
		<div class="clearfix"></div>
        <?php 		
		} //end of foreach
	} //end of if
    else{
		echo 'No results found';
	}
?>
