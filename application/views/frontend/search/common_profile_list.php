<?php
$careType = [
 '1' => 'Babysitter',
 '2' => 'Nanny / Au-pair',
 '3' => 'Nursery / Playgroup / Drop off / Gan',
 '4' => 'Tutor / Private lessons',
 '5' => 'Senior Caregiver / Companion',
 '6' => 'Special Needs Caregiver / Companion',
 '7' => 'Therapist',
 '8' => 'Cleaning / Household Help',
 '9' => 'Errand runner / Odd Jobs / Personal Assistant',
 '10' => 'Pediatric / Baby Nurse',
 '11' => 'Day Care Center / Day Camp / Afternoon Activities',
 '13' => 'Senior Care Agency',
 '14' => 'Special Needs Center',
 '15' => 'Cleaning / Household Help Company',
 '16' => 'Assisted living / Senior Care Center / Nursing Home',
 '17' => 'Babysitter',
 '18' => 'Nanny / Au-pair',
 '19' => 'Tutor / Private Lessons',
 '20' => 'Senior Caregiver / Companion',
 '21' => 'Errand Runner / Odd Jobs / Personal Assistant / Driver',
 '23' => 'Pediatric / Baby Nurse',
 '22' => 'Special Needs Caregiver / Companion',
 '24' => 'Cleaning / Household Help',
 '25' => 'Workers / Staff for Childcare Facility',
 '26' => 'Workers / Staff for Senior Care Facility',
 '27' => 'Workers / Staff for Special Needs Facility',
 '28' => 'Workers for Cleaning Company',
 '29' => 'Therapist'
 ];
	if(is_array($userdatas)){
        foreach($userdatas as $data){
			if ($data['rate']==56) $data['rate'] = '55+';
			$loca = '';
                if ($data['city'] != '') {
                    $loca .= $data['city'];
                }
                if ($data['state'] != '') {
                    $loca .= ', ' . $data['state'];
                }
                if ($data['country'] != '') {
                    $loca .= ', ' . $data['country'];
                }
            $navigate = $data['care_type']>16?'jobs':'caregivers'; ?> 	
            <div class="profile-list clearfix usual row">
            <div class="profile-img-wrap col-md-3 col-sm-3 col-xs-12"> <?php
                if($data['facility_pic']!="" && file_exists('images/profile-picture/'.$data['facility_pic'])) {?>
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
    		            <div id="profile_image">
    		            	<img src="<?php echo site_url("images/profile-picture/{$data['facility_pic']}")?>">
    		            </div>
    	            </a><?php } else {
                    if($data['profile_picture']!="" && $data['profile_picture_status'] == 1 && file_exists('images/profile-picture/'.$data['profile_picture'])) {?>
                        <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
        		            <div id="profile_image">
        		            	<img src="<?php echo site_url("images/profile-picture/{$data['profile_picture']}")?>">
        		            </div>
        	            </a><?php }
                    else {  
                        if($data['photo_of_child']!= 0 && file_exists('images/profile-picture/'.$data['photo_of_child'])) {?>
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
                }}} ?>
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

                    if(preg_match('/'.$location1[0].'/',$data['location'])){
                        echo '0 Miles Away From '.$location1[0];
                    }else{
                        echo ceil($data['distance'])." Miles Away From " . $location['place'];  //location is passed from controller
                    }


    	        	?>
    	        </div>
	        </div>
        	<div class="profile-list-details col-md-9 col-sm-9 col-xs-12">
                <?php if ($data['account_category'] == 3) {?>
                <span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['organization_name']);?></a>
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
				</span>	<?php } else { ?>
				<span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['name']);?></a>
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
				</span>
				<?php } ?>
                <br>
                <?php
                $type = $careType[$data['care_type']];
                $loca = '';
                if ($data['city'] != '') {
                    $loca .= $data['city'];
                }
                if ($data['state'] != '') {
                    $loca .= ', ' . $data['state'];
                }
                if ($data['country'] != '') {
                    $loca .= ', ' . $data['country'];
                }
                //for caregivers 
                //if($data['care_type'] < 10){ 
                if($data['care_type'] < 17){
                    echo $type .' - '.$loca;                                
                } 
                
                //for job posters
                //if($data['care_type'] < 25 && $data['care_type'] > 16){ 
                if($data['care_type'] > 16){
                    echo $type .' needed - '.$loca;                                                               
                } 
                
                //for caregivers
                if($data['care_type'] <10 ) {
                    $training_arr = explode(',',$data['training']); ?>
                    <div class="category-img">                            

                    </div> <?php 
                } ?>                        
				<div class="line"></div>
				
				<div class="profiles-description">
					<?php if(!empty($data['profile_description'])) { ?>
                    <?php echo substr(trim($data['profile_description']), 0, 270)?>
                    <?php if (strlen(trim($data['profile_description'])) > 270) echo ' .....'; ?>
                    <?php } 
                    else {
                        if(!empty($data['job_description'])) {
                            echo substr(trim($data['job_description']), 0, 270);
                             if (strlen(trim($data['profile_description'])) > 270) echo ' .....';
                        } else {
                            echo "Description not available";
                        }
                    } ?>
				</div>
			    			    <?php if($data['care_type'] != 7) { ?>
 			    <h5>Last Signed in: <?php 
 					$id 		= $data['user_id'];
					$dbDate 	= $data['login_time'];
 					$endDate = time(); 
 					$diff = $endDate - $dbDate; 
 					$days = floor($diff/86400);
 					$hours = floor(($diff-$days*86400)/(60 * 60));
 					$min = floor(($diff-($days*86400+$hours*3600))/60);
 					$second = $diff - ($days*86400+$hours*3600+$min*60);
                     if ($days > 30) echo "( more than 30 days ago)";
 					elseif ($days > 0) echo "( " .$days." days ago )";
 					elseif ($hours > 0) echo "( " .$hours." hours ago )";
 					elseif ($min > 0) echo "( " .$min." minute ago )";
 					else echo "( just seconds ago )";
 				?> 
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
								<?php 
								if($data['currency'] == 'ILS') {
								    echo "&#8362;"; 
								} else {
								    echo '$';
								}
								echo str_replace("t","-",$data['rate']);
								?>
                                <?php echo $data['rate_type']==1?" per hour":" per hour"; ?>						
							</li>
                        <?php  } ?>
                    <?php  } ?>

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
							    <?php 
								if($data['currency'] == 'ILS') {
								    $r = "&#8362;"; 
								} else {
								    $r = '$';
								}
								$r .= str_replace("t","-",$data['rate']);
								?>							
								<?php echo $data['care_type']==3 ? $data['rate'] : $r ?>
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
                                             					 	        
                    <?php } ?>
                    
				</div>
				<div style="clear:both"></div>
				 <a href="<?php echo site_url().$navigate; ?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" style="margin-top: 5px;">See Full Profile</a>
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
