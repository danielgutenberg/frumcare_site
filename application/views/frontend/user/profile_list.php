<?php
$careType = [
 '1' => 'Babysitter',
 '2' => 'Nanny / Au-pair',
 '3' => 'Nursery / Playgroup / Drop off / Gan',
 '4' => 'Tutor / Private lessons',
 '5' => 'Senior Caregiver',
 '6' => 'Special needs caregiver',
 '7' => 'Therapist',
 '8' => 'Cleaning / household help',
 '9' => 'Errand runner / odd jobs / personal assistant',
 '10' => 'Pediatric / Baby Nurse',
 '11' => 'Day Care Center / Day Camp / Afternoon Activities',
 '13' => 'Senior Care Agency',
 '14' => 'Special needs center',
 '15' => 'Cleaning / household help company',
 '16' => 'Assisted living / Senior Care Center / Nursing Home',
 '17' => 'Babysitter',
 '18' => 'Nanny / Au-pair',
 '19' => 'Tutor / private lessons',
 '20' => 'Senior caregiver',
 '21' => 'Errand runner / odd jobs / personal assistant / driver',
 '23' => 'Pediatric / Baby Nurse',
 '22' => 'Special needs caregiver',
 '24' => 'Cleaning / household help',
 '25' => 'Workers / staff for childcare facility',
 '26' => 'Workers / staff for senior care facility',
 '27' => 'Workers / staff for special needs facility',
 '28' => 'Workers for cleaning company',
 '29' => 'Therapist'
 ];
	if(is_array($userdatas)){
	    $adCount = count($userdatas);
        foreach($userdatas as $data){
			$data = (array) $data;
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
            <div class="profile-list clearfix usual row" style="border: 1px solid #cccccc;">
                <div class="profile-img-wrap col-lg-3 col-md-12 col-sm-12 col-xs-12"> <?php
                if($data['facility_pic']!="" && file_exists('images/profile-picture/'.$data['facility_pic'])) {?>
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
    		            <div id="profile_image">
    		            	<img src="<?php echo site_url("images/profile-picture/{$data['facility_pic']}")?>">
    		            </div>
    	            </a><?php } else {
                    if($data['profile_picture']!="" && file_exists('images/profile-picture/'.$data['profile_picture'])) {?>
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
                        </a>
                        <?php }}} ?>
                        <?php $status = $data['profile_status'] > 0 ? 'Approved' : 'Pending'; ?> 
                        <br>
                        <div>
				 	        <a style="color: grey; width: 150px;">Status: <?php echo $status; ?></a>
				 	    </div>
				 	    <?php if ($data['profile_picture'] != '' && $data['profile_picture_status'] == 0) { ?>
				 	    <div>
				 	        <a style="color: grey; width: 150px;">Photo Status: Pending</a>
				 	    </div>
				 	    <?php } ?>
	        </div>
        	<div class="profile-list-details col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <?php if ($data['account_category'] == 3) {?>
                <span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['organization_name']);?></a>
				</span>	<?php } else { ?>
				<span class="name">
					<a href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['name']);?></a>
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
				</div>
			   
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
                
				 
				 	<div class="row">
			            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-3">
    		            <?php
                            if($ac == 1){?>
                                <a style="font-size:13px; margin-left:5px; background-color:#85bd30; width: 150px;" href="<?php echo site_url('user/details/'.sha1(check_user()))?>" class="btn btn-primary" <?php if ($adCount > 1) {$message = 'Personal details get updated in all your profiles'; $click = 'onclick="return confirm(' . "'" . $message . "'" .')"'; echo $click; }?>>Edit Personal Details</a>
                                <?php
                            }
                        ?>
                        <?php
                            if($ac == 3){?>
                                <a style="font-size:13px; margin-left:5px; background-color:#85bd30; width: 150px;" href="<?php echo site_url('user/details/'.sha1(check_user()))?>" class="btn btn-primary" <?php if ($adCount > 1) {$message = 'Organization details get updated in all your profiles'; $click = 'onclick="return confirm(' . "'" . $message . "'" .')"'; echo $click; }?>>Edit Organization Info</a>
                                <?php
                            }
                        ?>
        		        </div>
			            <div class="col-md-12 col-lg-3" style="margin-left:15px">
			                <a href="<?php echo site_url();?>user/edit_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" style="font-size:13px; margin-left:5px; background-color:#5bc0de; width: 150px;" >Edit Job Details</a>
			            </div>
			            <div class="col-md-12 col-lg-3" style="margin-left:15px">
                            <?php if ($data['profile_status'] == 2) { ?>
                              
                                    <a href="<?php echo site_url();?>user/unarchive_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" style="font-size:13px; margin-left:5px; background-color:red; width: 150px;" onclick="return confirm('Are you sure you want to activate this profile?')">
                                    Unarchive</a>
                               
                            <?php } else if ($data['profile_status'] == 1){ ?>
                        
                                <a href="<?php echo site_url();?>user/delete_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" style="font-size:13px; margin-left:5px; background-color:red;  width: 150px;" onclick="return confirm('Are you sure you want to archive this profile?')">
                                Archive</a>
                        
                            <?php } ?>
                        </div>
                    </div>
			</div>
		</div>
		<div class="clearfix"></div>
        <?php 		
		} //end of foreach
	} //end of if
    else{
		echo 'Currently you have no profiles';
	}
?>
