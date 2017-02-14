<?php
$careType = [
 '1' => 'Babysitter',
 '2' => 'Nanny / Au-pair',
 '3' => 'Nursery / Playgroup / Drop off / Gan',
 '4' => 'Tutor / Private lessons',
 '5' => 'Senior Caregiver / Companion',
 '6' => 'Special needs caregiver / companion',
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
 '20' => 'Senior caregiver / companion',
 '21' => 'Errand runner / odd jobs / personal assistant / driver',
 '22' => 'Special needs caregiver / companion',
 '23' => 'Pediatric / Baby Nurse',
 '24' => 'Cleaning / household help',
 '25' => 'Workers / staff for childcare facility',
 '26' => 'Workers / staff for senior care facility',
 '27' => 'Workers / staff for special needs facility',
 '28' => 'Workers for cleaning company',
 '29' => 'Therapist'
 ];
	if(is_array($userdatas)){		
        foreach($userdatas as $key => $data){ 
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
// 			$reviewData = Review_model::countReviewById($data['id']);
            $navigate = $data['care_type']>16?'jobs':'caregivers'; ?> 	
            <div style="margin-right: -15px; margin-left:-15px; width: 300px; height: 370px; border: 2px solid black; padding-bottom: 20px; padding-top: 20px; padding-left: 10px;">
            <div class="profile-img-wrap col-md-3 col-sm-3 col-xs-12" style="width:25%; float:left"> <?php
                if($data['profile_picture']!="" && file_exists('images/profile-picture/'.$data['profile_picture'])) {?>
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
    		            <div id="profile_image">
    		            	<img style="height:65px; width:65px" src="<?php echo site_url("images/profile-picture/{$data['profile_picture']}")?>">
    		            </div>
    	            </a><?php }
                else {  
                    if($data['photo_of_child']!="" && file_exists('images/profile-picture/'.$data['photo_of_child'])) {?>
                        <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
        		            <div id="profile_image">
        		            	<img style="height:65px; width:65px" src="<?php echo site_url("images/profile-picture/{$data['photo_of_child']}")?>">
        		            </div>
        	            </a><?php } else { ?>
                
                
                    <a href="<?php echo site_url().$navigate;?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>">
			            <div id="profile_image">
			            	<img style="height:65px; width:65px" src="<?php echo site_url("images/no-image.jpg")?>">
                        </div>
                    </a><?php 
                }} ?>
    	        <!--<div class="basic-background"><?php 
                    if($data['agree_bg_check']  == 1) 
    		        	echo "<a href='#'>Basic Background Check</a>";
  		        	else echo ''; ?>
    	        </div>
    	        <span class="img-of-profile"></span><br />-->
    	        <div class="pin-location" style="box-sizing: border-box;color: #313131;font-size: 16px;line-height: 19px;padding-right: 20px;margin-top: 20px;font-family: 'Lato',sans-serif;font-weight: bold;font-style: italic;">
                  
    	        </div>
	        </div>
        	<div style="float:left; width:75%;">
                <?php if ($data['account_category'] == 3) {?>
                <span style="color: #525252;display: inline-block;font-family: 'Lato',sans-serif;font-size: 29px;font-weight: 400;margin-bottom: 4px;margin-left: 0;margin-right: 8px;">
					<a style="color: #525252;display: inline-block;font-family: 'Lato',sans-serif;font-size: 29px;font-weight: 400;margin-bottom: 4px;margin-left: 0;margin-right: 8px;" href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['organization_name']);?></a>
				</span>	<?php } else { ?>
				<span style="color: #525252;display: inline-block;font-family: 'Lato',sans-serif;font-size: 29px;font-weight: 400;margin-bottom: 4px;margin-left: 0;margin-right: 8px;">
					<a style="color: #525252;display: inline-block;font-family: 'Lato',sans-serif;font-size: 29px;font-weight: 400;margin-bottom: 4px;margin-left: 0;margin-right: 8px;" href="<?php echo site_url();?>jobs/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>"><?php echo ucwords($data['name']);?></a>
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
                if($data['care_type'] < 17){
                    echo $type .' - '.$loca;                                
                }
                if($data['care_type'] > 16){
                    echo $type .' needed - '.$loca;                                                               
                } ?>
                
               
				<div style="border-bottom: 1px dashed #cccccc;box-sizing:border-box;display:block"></div>
				
				<div style="color: #525252;font-family: 'Lato',sans-serif;font-size: 14px;font-weight: 400;line-height: 19px;margin-bottom: 3px;margin-top: 10px;box-sizing:border-box;display: block;">
					<?php if(!empty($data['profile_description'])) { ?>
                    <?php echo substr(trim($data['profile_description']), 0, 170)." .....";?>
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
 			    <h5 style="color: #525252;font-size: 14px;margin-top: 18px;font-family: 'Lato',sans-serif;font-weight: bold;">
 			        Last Signed in: <?php 
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
                         if ($days > 30) echo "( more than 30 days ago)";
 						elseif($days > 0) echo "( " .$days." days ago )";
 						elseif($hours > 0) echo "( " .$hours." hours ago )";
 						elseif($min > 0) echo "( " .$min." minute ago )";
 						else echo "( just seconds ago )";
 					} ?> 
 			    </h5>
 			    <?php } ?>
				<div style="display: inline-block; margin-left: -15px; width: 225px; float: left;box-sizing:border-box;"> <?php 
                    
                    //for caregivers
                    if($data['care_type'] <10 ) { ?>
                        <?php if($data['care_type'] != 7) { ?>
                            <?php if(isset($data['age']) && is_numeric($data['age'])){?>
                                <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">							
    								<?php echo $data['age'];?> years old							
    							</li>
                            <?php  } ?>                        
                            
                            <?php if($data['experience']){?>
    							<li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">									
    								<?php if ($data['experience'] == 6) {echo '5+';} else {echo $data['experience'];}?> years of experience							
    							</li>
                            <?php  } ?>
                        <?php  } 
                        else { 
                            if($data['type_of_therapy']) { ?>
                              <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">		
                                <?php echo $data['type_of_therapy']; ?>
                              </li>
                            <?php }
                            if($data['certification']) { ?>
                              <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">		
                                <?php echo $data['certification']; ?>
                              </li>
                            <?php }
                            
                            
                         } ?>

                    
                    <?php  } ?>

                    </div><div style="display: inline-block; margin-left: -15px; width: 225px; float: left;box-sizing:border-box;">
                                        
                    <?php 
                    
                    //for job posters
                    if($data['care_type'] >16 && $data['care_type'] <25 ) { ?>
                        <?php  $availablility_arr = explode(',',$data['availability']); ?>
                        <?php if(in_array(strtolower('Asap'),array_map('strtolower',$availablility_arr))){?>
                            <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">									
								Job start date: ASAP							
							</li>
                        <?php  }
                        elseif(isset($data['start_date']) && $data['start_date'] !='0000-00-00'){ ?>    
                            <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">		
                               <?php $start_date_arr = explode('-',$data['start_date'])?>
                               Job start date: <?php echo $start_date_arr[1].'/'.$start_date_arr[2].'/'.$start_date_arr[0]; ?>
                            </li>
                        <?php  } ?>
                        <?php if($data['rate']){?>
							<li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">									
								<?php 								
    								if($data['currency'] == 'ILS') {
    								    $symbol =  "&#8362;"; 
    								} else {
    								    $symbol = '$';
    								}
    								echo $symbol . str_replace("t","-",$data['rate']); 
								?>
                                <?php echo $data['rate_type']==1?" per hour":" per hour"; ?>						
							</li>
                        <?php  } ?>
                    <?php  } ?>
					 	

					<?php 
                    
                    //for caregivers
                    if($data['care_type'] <10 ) { ?>
                    
                    <?php if($data['care_type'] == 7 && $data['experience']) { ?>
                             <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">		
                                <?php if ($data['experience'] == 6) {echo '5+';} else {echo $data['experience'];}?> years in practice
                              </li>
                            <?php } ?> 
                    
                    <?php if(segment(2)!== 'therapists'){ ?>
                        
                        
                        <?php if($data['rate']){?>
							<li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">									
								<?php 								
    								if($data['currency'] == 'ILS') {
    								    $symbol = "&#8362;"; 
    								} else {
    								    $symbol = '$';
    								}
								?>
								<?php echo $data['care_type']==3 ? $data['rate'] : $symbol . str_replace("t","-",$data['rate']); ?>
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
                            <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">									
								Available Immediately							
							</li>
                        <?php  }
                        elseif(isset($data['start_date']) && $data['start_date'] !='0000-00-00'){ ?>    
                            <li style="color: #525252;font-size: 14px;line-height: 19px;font-family: 'Lato',sans-serif;font-weight: 400;word-wrap: break-word;box-sizing:border-box;">		
                               <?php $start_date_arr = explode('-',$data['start_date'])?>
                               Available <?php echo $start_date_arr[1].'/'.$start_date_arr[2].'/'.$start_date_arr[0]; ?> 
                            </li>
                        <?php  } ?>
                    <?php } ?>
                    
				</div>
                <div style="clear:both"></div>
				 	<a style="background: none repeat scroll 0 0 #85bd30;border: medium none;font-size: 16px;margin-left: -8px;margin-top: 30px;width: 162px;color: #fff;" href="<?php echo site_url().$navigate; ?>/details/<?php echo $data['uri'];?>/<?php echo $data['care_type'];?>" class="btn btn-primary" >See Full Profile</a>
			</div>
		</div>
		<br><br>
		<div style="line-height: 1.42857143;color: #6a6a6a; font-family: 'Varela Round', 'Helvetica Neue', Helvetica, Arial, sans-serif;display:block;font-size: 14px;"></div>
        <?php 		
		} //end of foreach
	} //end of if
    else{
		echo 'No results found';
	}
?>
