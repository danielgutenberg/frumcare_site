<?php
if($recordData['currency'] == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
user_flash(); 
?>
<div class="container">
	<?php echo $this->breadcrumbs->show();
    ?>
    <div class="caregivers-details">
      <h3>
       <?php
       $type = Caretype_model::getCareTypeById($recordData['care_type']);
       echo $type[0]['service_name'];
        $referAccountType = 2;
       if($recordData['care_type']>16){
        echo " Job";
        $referAccountType = 1;
    }
    ?>
</h3>
<div class="left-sidebar-details col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <div class="profile-img col-lg-4 col-md-4 col-sm-4 col-sm-6 col-xs-6">
        <?php if($recordData['facility_pic']!= '' && file_exists('images/profile-picture/'.$recordData['facility_pic'])) {?>
            <img class="img-responsive" src="<?php echo site_url();?>images/profile-picture/<?php echo $recordData['facility_pic'];?>">
        <?php } else {
            if($recordData['profile_picture'] != '' && $recordData['profile_picture_status'] == 1 && file_exists('images/profile-picture/'.$recordData['profile_picture'])) { ?>
                <img class="img-responsive" src="<?php echo site_url();?>images/profile-picture/<?php echo $recordData['profile_picture'];?>">
                <?php } else {
            if($recordData['photo_of_child']!= 0 && file_exists('images/profile-picture/'.$recordData['photo_of_child'])) { ?>
                <img class="img-responsive" src="<?php echo site_url();?>images/profile-picture/<?php echo $recordData['photo_of_child'];?>">
            <?php } else { ?>
                <img class="img-responsive" src="<?php echo site_url("images/no-image.jpg")?>">
        <?php }}
        }?>
    </div>
    <div class="details-right-caregive col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="profile-name-details">
            <?php if ($recordData['organization_name']) { ?>
                <span style="font-size:30px;"><?php echo ucfirst($recordData['organization_name']);?> </span>
            <?php } else { ?>
                <span style="font-size:30px;"><?php echo ucfirst($recordData['name']);?> </span>
            <?php } ?>
        </div>
        <div>
            <?php if($this->uri->segment(4) <17 ){ ?>
                    <?php $reviews = $number_reviews['number_reviews']; ?>
                    <div class="rating-score" id="<?php echo ($number_reviews['total_review']/($reviews>0?$reviews:1));?>"></div>
    
                    (<?php echo number_format($reviews);?> reviews)
    
                    <?php
                    if($this->session->userdata('current_user')!=$care_id){ //condition for blocking own review and rating
                        if(isset($this->session->userdata['current_user']) && $recordData['care_type']<17){?>
                        
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" id="<?php echo $this->session->userdata['current_user'];?>">Write a review</a>
                            <?php if ($reviews > 0) { ?>
                             | <a href="#myModal3" data-toggle="modal" data-target="#myModal3">See all reviews</a>
                        <?php }} else {
                            if($recordData['care_type']<17){
                                ?>
                                <a href="javascript:void(0)" id="not_login">Write a review</a>
                                <?php if ($reviews > 0) { ?>
                                |<a href="#myModal3" data-toggle="modal" data-target="#myModal3">See all reviews</a>
                                <?php
                                }
                            }
                        }
                    }?>
                    <?php
                }?>

        </div>
                
                <?php
                
                if($this->uri->segment(4)>0 && $this->uri->segment(4)<11){
                   if($recordData['care_type'] != 7){ ?>
                       <div class="row" style="width:425px">
                       <div class="col-xs-4">
                       <?php if(!empty($recordData['age'])){ ?>
                                   <span class="age-wrap"><?php echo $recordData['age']. '<span>Age</span>';?></span>
                                   <?php
                               }else{ ?>
                               <span class="age-wrap"><?php echo 'N/A'. '<span>Age</span>';?></span>
                               <?php
                           } ?>
                           </div>
                           <div class="col-xs-4">
                        <?php if($this->uri->segment(4) == 3) {
                                if(!empty($recordData['rate'])){ ?>
    
                                   <span class="hour-wrap"><?php echo $symbol . $recordData['rate'] . $rate_type.'<span>Cost</span>'; ?></span>
                                <?php
                                } else{ ?>
                                   <span class="hour-wrap"><?php echo 'N/A'.'<span>Cost</span>'; ?></span>
                                <?php }
                                } else {


                                   if(!empty($recordData['rate'])){ ?>
                                    <?php $rate_type = $recordData['rate_type']==2?' / Hr':' / Hr'?>
                                    <?php if ($recordData['rate']==56) $recordData['rate'] = '55+' ?>
                                       <span class="hour-wrap"><?php echo $symbol . $recordData['rate'] . $rate_type.'<span>Rate</span>'; ?></span>
                                    <?php
                                    }
                                   else{ ?>
                                       <span class="hour-wrap"><?php echo 'N/A'.'<span>Rate</span>'; ?></span>
                                     <?php
                                    }
                                } ?>
                            </div>
                   
                   <div class="col-xs-4">
                       <?php $yearsExperienceText = ($recordData['care_type'] == 10) ? 'Years in Practice' : 'Years of Experience'; ?>
                   <?php if(!empty($recordData['experience'])){ ?>
                           <span class="experience-wrap"><?php if ($recordData['experience']==6) {echo '5+ <span>' . $yearsExperienceText . '</span>';} else {echo $recordData['experience']. ' <span>' . $yearsExperienceText . '</span>'; }?></span>
                    <?php
                        }   
                        else{ ?>
                            <span class="experience-wrap"><?php echo 'N/A'. ' <span>' . $yearsExperienceText . '</span>';?></span>
                        <?php
                        }
                        ?>
                    </div>
                <div class="clearfix margin-bots"></div>
                <div class="col-xs-4">
                    <?php
                    if(!empty($recordData['location'])){ ?>
                    <?php $loca = '';
                    if ($recordData['city'] != '') {
                        $loca .= $recordData['city'];
                    }
                    if ($recordData['state'] != '') {
                        $loca .= ', ' . $recordData['state'];
                    }
                    if ($recordData['country'] != '') {
                        $loca .= ', ' . $recordData['country'];
                    }?>
                    <?php $location_array = explode(',',$recordData['location']); ?>
                    <?php $formated_location = (isset($location_array[0])?$location_array[0]:"").', '.(isset($location_array[1])?$location_array[1]:""); ?> 
                    <span class="location-wrap"><?php echo $loca.'<span>Location</span>';?></span>
                    <?php
                    }
                    else{ ?>
                    <span class="location-wrap"><?php echo 'N/A'.'<span>Location</span>';?></span>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-xs-4">
                <span class="care-type-wrap">
                    <?php
                    echo ucwords($type[0]['service_name']).'<span>Care Type</span>';
                    ?>
                </span>
                </div>
                <div class="col-xs-4">
                <?php
                    $availablility = explode(',',$recordData['availability']);
                    $start_date = $recordData['start_date'];
                    $start_date_array = explode('-',$start_date);
                    $formated_start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];
                    if(in_array('Immediate',$availablility)){?>
                        <span class="location-wrap"><?php echo 'Immediately'.'<span>Availability</span>';?></span>
                        <?php
                    }
                    else if(isset($start_date) && $start_date !='0000-00-00'){ ?>
                    <span class="location-wrap"><?php echo $formated_start_date.'<span>Availability</span>';?></span>
                    <?php
                    }else{ ?>
                    <span class="location-wrap"><?php echo 'N/A'.'<span>Availability</span>';?></span>
                    <?php
                    } ?>
                    </div>
                    </div>
            <?php   }
            else{ ?>
                <div class="row" style="width:425px">
                <div class="col-xs-2"></div>
                <div class="col-xs-4">
                    <span class="location-wrap"><?php echo isset($recordData['type_of_therapy']) ? $recordData['type_of_therapy'] : "N/A";
                    echo '<span>Type of therapy</span>'; ?></span>
                </div>
                <div class="col-xs-4">
                   <span class="care-type-wrap"><?php if ($recordData['experience']==6) {echo '5+ <span>Years in Practice</span>';} else {echo $recordData['experience']. ' <span>Years in Practice</span>'; }?></span>
                </div>
                <div class="clearfix margin-bots"></div>
                <div class="col-xs-2"></div>
                <?php if(!empty($recordData['location'])){ ?>
                <?php $loca = '';
                if ($recordData['city'] != '') {
                    $loca .= $recordData['city'];
                }
                if ($recordData['state'] != '') {
                    $loca .= ', ' . $recordData['state'];
                }
                if ($recordData['country'] != '') {
                    $loca .= ', ' . $recordData['country'];
                }?>
                    <?php $location_array = explode(',',$recordData['location']); ?>
                    <?php $formated_location = (isset($location_array[0])?$location_array[0]:"").', '.(isset($location_array[1])?$location_array[1]:""); ?> 
                    <div class="col-xs-4">
                        <span class="location-wrap"><?php echo $loca.'<span>Location</span>';?></span>
                    </div>
                    <?php
                } ?>
                <div class="col-xs-4">
                    <span class="care-type-wrap">
                        <?php
                        echo ucwords($type[0]['service_name']).'<span>Care Type</span>';
                        ?>
                    </span>
                </div>
                </div>
            <?php }
}
if($this->uri->segment(4)>16){ ?>
    <div class="row" style="width:425px">
    <div class="col-xs-4">
    <?php if(!empty($recordData['location'])){ ?>
        <?php $location_array = explode(',',$recordData['location']); ?>
        <?php $loca = '';
                if ($recordData['city'] != '') {
                    $loca .= $recordData['city'];
                }
                if ($recordData['state'] != '') {
                    $loca .= ', ' . $recordData['state'];
                }
                if ($recordData['country'] != '') {
                    $loca .= ', ' . $recordData['country'];
                }?>
        <?php $formated_location = (isset($location_array[0])?$location_array[0]:"").', '.(isset($location_array[1])?$location_array[1]:""); ?>
        <span class="age-wrap"><?php echo $loca.'<span>Location</span>';?></span>
        <?php
    }
    else{ ?>
        <span class="age-wrap"><?php echo 'N/A'.'<span>Location</span>';?></span>
        <?php
    } ?>
    </div>
    <div class="col-xs-4">
    <span class="hour-wrap">
        <?php echo ucwords($type[0]['service_name']).'<span>Job Type</span>'; ?>
    </span>
    </div>
    <div class="col-xs-4">
    <?php
    if(!empty($recordData['rate'])){ ?>
        <?php $rate_type = $recordData['rate_type']==2?' / Hr':' / Hr'?>
        <?php if ($recordData['rate']==56) $recordData['rate'] = '55+' ?>
        <span class="experience-wrap"><?php echo $symbol . $recordData['rate'].$rate_type.'<span>Wage</span>'; ?></span>
        <?php
    }
    else{ ?>
        <span class="experience-wrap"><?php echo 'N/A'.'<span>Wage</span>'; ?></span>
        <?php
    }?>
    </div>
    <div class="clearfix margin-bots"></div>
    <div class="col-xs-4">
    <?php
    $availablility = explode(',',$recordData['availability']);
    $start_date = $recordData['start_date'];
    $start_date_array = explode('-',$start_date);
    $formated_start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];
    if(in_array('Immediate',$availablility)){?>
        <span class="location-wrap"><?php echo 'Immediate'.'<span>Job Start Date</span>';?></span>
        <?php
    }
    else if(isset($start_date) && $start_date !='0000-00-00'){ ?>
        <span class="location-wrap"><?php echo $formated_start_date.'<span>Job Start Date</span>';?></span>
        <?php
    }
    else{ ?>
        <span class="location-wrap"><?php echo 'N/A'.'<span>Job Start Date</span>';?></span>
    <?php
    } ?>
    </div>
    </div>
<?php }
if($this->uri->segment(4)>10 && $this->uri->segment(4)<17){
    if($this->uri->segment(4) == 11 || $this->uri->segment(4) == 16) { ?>
        <div class="row" style="width:425px">
        <div class="col-xs-4">
        <?php if(!empty($recordData['sub_care'])){ ?>
            <span class="age-wrap"><?php echo $recordData['sub_care'].'<span>Type of Organization</span>';?></span>
            <?php
        }else{ ?>
        <span class="age-wrap"><?php echo 'N/A'.'<span>Type of Organization</span>';?></span>
        <?php
        } ?>
        </div>
        <div class="col-xs-4">
        <?php if(!empty($recordData['location'])){ ?>
        <?php $loca = '';
                if ($recordData['city'] != '') {
                    $loca .= $recordData['city'];
                }
                if ($recordData['state'] != '') {
                    $loca .= ', ' . $recordData['state'];
                }
                if ($recordData['country'] != '') {
                    $loca .= ', ' . $recordData['country'];
                }?>
            <span class="hour-wrap"><?php echo $loca.'<span>Location</span>';?></span>
            <?php
        }else{ ?>
        <span class="hour-wrap"><?php echo 'N/A'.'<span>Location</span>';?></span>
        <?php
        } ?>
        </div>
        <div class="col-xs-4">
        <?php if(!empty($recordData['established'])){ ?>
        <span class="experience-wrap"><?php echo $recordData['established'].'<span>Year Established</span>';?></span>
        <?php
        }
        else{ ?>
        <span class="experience-wrap"><?php echo 'N/A'.'<span>Year Established</span>';?></span>
        <?php
        }
        ?>
        </div>
        <div class="clearfix margin-bots"></div>
        <div class="col-xs-4">
        <?php
        if(!empty($recordData['rate'])){ ?>
        <?php if ($recordData['rate']==56) $recordData['rate'] = '55+' ?>
        <span class="age-wrap"><?php echo $symbol . $recordData['rate'].$rate_type.'<span>Cost</span>'; ?></span>
        <?php
        }
        else{ ?>
        <span class="age-wrap"><?php echo 'N/A'.'<span>Cost</span>'; ?></span>
        <?php
        } ?>
        </div>
        </div>

    <?php } else { ?>
        <div class="row" style="width:425px">
        <div class="col-xs-4">
        <?php if(!empty($recordData['location'])){ ?>
        <?php $loca = '';
                if ($recordData['city'] != '') {
                    $loca .= $recordData['city'];
                }
                if ($recordData['state'] != '') {
                    $loca .= ', ' . $recordData['state'];
                }
                if ($recordData['country'] != '') {
                    $loca .= ', ' . $recordData['country'];
                }?>
            <span class="age-wrap"><?php echo $loca.'<span>Location</span>';?></span>
            <?php
        }else{ ?>
        <span class="age-wrap"><?php echo 'N/A'.'<span>Location</span>';?></span>
        <?php
        } ?>
        </div>
        <div class="col-xs-4">
        <?php if(!empty($recordData['established'])){ ?>
        <span class="hour-wrap"><?php echo $recordData['established'].'<span>Year Established</span>';?></span>
        <?php
        }
        else{ ?>
        <span class="hour-wrap"><?php echo 'N/A'.'<span>Year Established</span>';?></span>
        <?php
        }
        ?>
        </div>
        <div class="col-xs-4">
        <?php
        if(!empty($recordData['rate'])){ ?>
        <?php if ($recordData['rate']==56) $recordData['rate'] = '55+' ?>
        <span class="experience-wrap"><?php echo $symbol . $recordData['rate'].$rate_type.'<span>Cost</span>'; ?></span>
        <?php
        }
        else{ ?>
        <span class="experience-wrap"><?php echo 'N/A'.'<span>Cost</span>'; ?></span>
        <?php
        } ?>
        </div>
        </div>
    <?php }

}
?>
</div>
<div class="clearfix"></div>
<br/>
<div class="meet-caregivers-clients">
       <?php if($this->uri->segment(4) < 17 || $this->uri->segment(4) == 13
    //   || ($this->uri->segment(4)>16 && $this->uri->segment(4) < 24)
       ){ ?>
       <h2> Meet 
            <?php 
            if ($this->uri->segment(4) < 11) { 
                echo ucfirst($recordData['name']);
            } else {
                echo ucfirst($recordData['organization_name']);
            }
            ?>
        </h2>
        <?php
        }
        else{ ?>
        <h2> Job description</h2>
        <?php
    }?>
    <br />
    <p>
        <?php
        if(!empty($recordData['profile_description'])){
            echo nl2br($recordData['profile_description']);
        }
        else{
            if(!empty($recordData['job_description'])){
                echo nl2br($recordData['job_description']);
            } else {
                echo "Description not available";
            }
        }
        ?>
    </p>
    
</div>
<?php
if($recordData['care_type'] < 11){?>
<div >
    <?php $this->load->view('frontend/user/details/individual_caregiver',$recordData)?>
</div>
<?php
}?>
<?php
if(($recordData['care_type'] > 10 && $recordData['care_type'] < 17 ) || ($recordData['care_type'] > 24)){ ?>
<div>
    <?php $this->load->view('frontend/user/details/organizations',$recordData) ?>
</div>
<?php
}
if($recordData['care_type'] < 25 && $recordData['care_type'] > 16 ){ ?>
<div>
    <?php $this->load->view('frontend/user/details/job_posters',$recordData)?>
</div>
<?php
}
?>
    <div class="similiar-care col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <h2>
            <?php if($recordData['care_type'] > 16){
                echo "Similar Jobs";
            }
            else{
                echo "Similar Care Providers";
            }
            ?>
        </h2>
        <?php
        if($similar_types!=''){
            foreach($similar_types as $caregiver){
                $navigate = $caregiver['care_type']>16?'jobs':'caregivers'; ?>
                <div class="similar-care-providers care-providers1 col-md-3 col-sm-4 col-xs-6 col-lg-2">
                    <a href="<?php echo site_url().$navigate; ?>/details/<?php echo $caregiver['uri'];?>/<?php echo $caregiver['care_type'];?>" >
                        <div class="imgs">
                            <?php if($caregiver['profile_picture']!='' && file_exists('images/profile-picture/'.$caregiver['profile_picture'])){?>
                            <img src="<?php echo site_url();?>images/profile-picture/<?php echo $caregiver['profile_picture'];?>">
                            <?php }else{ ?>
                            <img src="<?php echo site_url();?>images/no-image.jpg" />
                            <?php } ?>
                        </div>

                        <div class="name-care-providers">
                            <?php echo trim($caregiver['name']);?><?php echo '&nbsp;';?>
                        </div>

                        <div class="service-care-providers">
                            <?php
                               echo ucwords($type[0]['service_name']);
                            ?>
                        </div>
                        <div class="rating-score"></div>
                        <div class="care-hours">
                            <?php if($caregiver['rate']!=''){
                                if($caregiver['currency'] == 'ILS') {
                                    $symbol = "&#8362;"; 
                                } else {
                                    $symbol = '$';
                                }
                              $rateType = $caregiver['rate']==1?" per hour":" per month";
                              echo $symbol . str_replace('t', '- $', $caregiver['rate']). '/hr';
                          }else{
                              echo $symbol . '0/hr';
                          }?>
                        </div>
                    </a>
                </div>
                <?php
            }
        } ?>
    </div>
</div>



        <div class="right-sidebar-details col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <?php if($caregiver['care_type'] != 7) { ?>
    <p>
     Last Signed in:
     <?php
 					$dbDate = $userlog['login_time']; // Database date
 					$endDate = time();
 					$diff = $endDate - $dbDate;
 					$days = floor($diff/86400);
 					$hours = floor(($diff-$days*86400)/(60 * 60));
 					$min = floor(($diff-($days*86400+$hours*3600))/60);
 					$second = $diff - ($days*86400+$hours*3600+$min*60);
 
                     if ($days > 30) echo "( more than 30 days ago)";
 					elseif ($days > 0) echo "( " .$days." days ago )";
 					elseif($hours > 0) echo "( " .$hours." hours ago )";
 					elseif($min > 0) echo "( " .$min." minute ago )";
 					else echo "( just second ago )";
 					?>
 				</p>
 				<?php } ?>
				<?php
				if(isset($this->session->userdata['current_user'])){
					$id = $this->session->userdata['current_user'];
				}else{
					$id = '';
				}
				?>
                <?php if($recordData['care_type'] < 11){?>
                    <span class="sidebar-name-btn">
                      <a href="#" class="btn btn-primary viewcontactdetails"> Contact <?php echo $recordData['name']; ?> </a>                       </span>
                      <br />
                  <?php if( $recordData['care_type'] != 7 ) { ?>
                    <span class="view-availability-btn"><a href="javascript:void(0);" class="btn btn-primary timetable"> View Availability</a></span>
                  <?php } ?>
              <?php }
              if($recordData['care_type'] < 25 && $recordData['care_type'] > 16 ){ ?>
              <span class="sidebar-name-btn">
                  <a href="#" class="btn btn-primary viewcontactdetails"> Contact <?php echo $recordData['name']; ?> </a>                       </span>
                  <br />
              <span class="view-availability-btn">
                  <a href="#" class="btn btn-primary timetable">View job hours</a>
              </span>
              <?php
          }
          if(($recordData['care_type'] > 10 && $recordData['care_type'] < 17 ) || ($recordData['care_type'] > 24)){ ?>
          <span class="view-availability-btn">
              <a href="#" class="btn btn-primary viewcontactdetails">Contact <?php echo $recordData['organization_name'] ?></a>                                               
          </span>
          <?php
      }
      ?>
      <?php if(segment(4) == 7){ ?>
        <br />
      <?php } ?>
      <div class="verification-sidebar">
         <h2>Verifications</h2>
         <ul class="contacts-verified">
          <li>Phone number - <?php if($recordData['contact_number_status'] == 1) echo 'Verified'; else echo 'Unverified';?></li>
          <li>Email address - <?php if($recordData['email_status'] == 1) echo 'Verified'; else echo 'Unverified';?></li>
      </ul>

      <!--<ul class="social-unverified">-->
      <!--    <li class="fb">Facebook - Unverified</li>-->
      <!--    <li class="twt">Twitter - Unverified</li>-->
      <!--    <li class="google">Google+ - Unverified</li>-->
      <!--</ul>-->
      <?php if(isset($this->session->userdata['current_user'])){
          $link = site_url().'user/upgrademembership';
      }else{
          $link = site_url().'signup';
      }
      ?>
      <!--<div class="preliminary-check">Preliminary check - <a href="<?php echo $link;?>">Request now</a></div>-->
      <?php /* if(isset($recordData['training']) && $recordData['care_type'] < 10){	*/ ?>
      <?php if(isset($recordData['training']) && $recordData['training']!='' && $recordData['care_type']<10){ ?>
      <h2>Training</h2>
      <ul class="check-training">
						<!-- <li class="bbc">Basic Background Check<span>(Not Run)</span></li>
						<li class="mvrc">Motor Vehicle Records Check<span>(Not Run)</span></li> -->
                        <?php
                            //$training = explode(',', $recordData['training']);
                        ?>
                        <?php /*
                        <li class="bbc">Basic Background Check</li>
                        <li class="mvrc">Motor Vehicle Records Check</li> */ ?>

                        <?php /*
                            if(in_array('CPR',$training)){
                                $cpr = "CPR Training";
                            }
                            if(in_array('First Aid', $training)){
                                $training = "First Aid Training";
                            }

                            if(in_array('Nanny/ Babysitter Course', $training)){
                                $training = "Nanny/ Babysitter Course Training";
                            }

                            if(in_array('Senior Care Training', $training)){
                                $training = "Senior Care Training";
                            } */

                            ?>
                        <?php /*
                        <li class="cprt" title="">CPR Training</li>
                        <li class="fat" title="<?php if(in_array('First Aid',$training)){?> CPR Training <?php } ?>">First Aid Training</li>
                        <li class="bbc">Senior Care Training</li>
                        <li class="bbc">Special Needs Training</li>
                        <li class="bbc">Other Training</li>
                    </ul>                    */ ?>
                    <?php
                    $training = explode(',', $recordData['training']);
                    if(in_array(strtolower('CPR'), array_map('strtolower',$training))){?>
                    <li class="fat" title="Training">CPR Training</li>
                    <?php
                }
                if(in_array(strtolower('First Aid'), array_map('strtolower',$training))){ ?>
                <li class="cprt" title="Training">First Aid Training</li>
                <?php
            }
            if(in_array(strtolower('Nanny/ Babysitter Course'), array_map('strtolower',$training))){?>
            <li class="bbc" title="Training" >Nanny / Babysitter Course</li>
            <?php
        }
        if(in_array(strtolower('Senior Care Training'), array_map('strtolower',$training))){?>
        <li class="bbc" title="Training" >Senior Care Training</li>
        <?php
    }
    if(in_array(strtolower('Special Needs Training'), array_map('strtolower',$training))){
      ?>
      <li class="bbc" title="Training">Special Needs Training</li>
      <?php
  }
  if(in_array(strtolower('degree'), array_map('strtolower',$training))){
      ?>
      <li class="bbc" title="Training">Degree</li>
      <?php
  }
  if(in_array(strtolower('Other'), array_map('strtolower',$training))){
      ?>
      <li class="bbc" title="Training">Other Training</li>
      <?php
  }?>
</ul>
<?php } ?>
</div>
<div class="map verification-sidebar">
        <h2>Location</h2>




        <div id="map"></div>

    </div>
							<div class="share-profile-wrap">
								<div class="share-profile">
									<?php
                                    if($recordData['care_type']<17){
                                        $profile = ' profile';
                                        $title = 'Favorite';
                                    }else{
                                        $title = 'Favorite';
                                        $profile = ' job';
                                    }
                                    ?>
                                    <h2>Share this <?php echo $profile; ?></h2>
                                    <div class="texts">You know someone who might be interested in this <?php echo $profile; ?> ?</div>
                                    <div class="share-profile-via">
                                      <h2>Share this <?php echo $profile; ?> via</h2>
                                      <div class="sharethis-inline-share-buttons"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="favourite-profile-wrap">
                            <div class="favourite-profile">
                                <h2><?php echo $title;?> this <?php echo $profile; ?></h2>
                                <div class="texts">Save this <?php echo $profile; ?> to the list of favorites in your FrumCare account.</div>

                                <div class="share-profile-wrap">
                                <a href="javascript:void(0);" class="favorite btn btn-primary" style="color:#8C8C8C;" id="<?php echo $recordData['id'];?>">Favorite this <?php echo $profile; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Write a  Review</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="usersreviewform">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label>Rate</label>
                                                </td>
                                                <td>
                                                    <div id="half" style="cursor: pointer;"></div>
                                                </td>
                                            </tr>
                       
                                            <tr>
                                                <td><label>Review</label></td>
                                                <td style="padding:3px">
                                                    <textarea id="review_text" name="review_description" class="required" style="width: 470px;height: 114px;"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="current_user" value="<?php echo @$this->session->userdata['current_user'];?>"/>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="new_id" value="<?php echo $recordData['user_id']?>"/>
                                                    <input type="hidden" name="profile" value="<?php echo $recordData['id'];?>">
                                                    <input type="hidden" name="date_time" value="<?php echo date('Y-m-d H:i:s')?>">
                                                    <input type="hidden" name="acc_category" value="<?php echo $recordData['account_category'];?>">
                                                    <input type="hidden" name="care_type" value="<?php echo $recordData['care_type'];?>">
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary save">Save changes</button>
                                        </div>
                                    </form>
                                    <div class="reviewsuccess" style="display:none;">
                                        <p>Review has been successfully saved.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Reviews</h4>
                                </div>
                                <div class="modal-body">
                                    <?php foreach ($profileReviews as $pr) { ?>
                                        <div class="rating-score" id="<?php echo $pr['review_rating'];?>"></div>
                                        <br>
        		                        <span class="name"><?php echo $pr['name'];?></span>
        		                        <br>
        		                        <span class="date"><?php 
        		                        $dt = new DateTime($pr['created_date']);
     						            echo $dt->format('m/d/Y');
        		                        ?></span>
                                        <p><?php echo $pr['description'];?></p>
        		                        <br>
        		                        
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
</div>

                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Invite Employers to Write a Review</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="share-profile">
    								
                                    <h2>Invite an Employer to Write a Review</h2>
                                    <h5 style="padding-left: 13px;">(Choose an option below and add a personal message)</h3>
                                    <div class="sharethis-inline-share-buttons"></div>
                              </div>

                                    <div class="modal-footer">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



</div>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<!--<script src="<?php echo base_url();?>js/labs.js" type="text/javascript"></script>-->

<script>
   $(function(){

    $('#myModal').on('click',function(){
     $('form.usersreviewform').show();
     $('.reviewsuccess').hide();
 });

    $('.save').on('click',function() {
        $('form.usersreviewform').validate();
        var text = document.getElementById('review_text').value; 
        if(text.length < 20) { 
            alert('To submit a reivew you must leave a comment of at least 20 characters!'); 
            return false; 
            
        }
        $.ajax( {
            type: "POST",
            url: '<?php echo site_url();?>review',
            data: $('form.usersreviewform').serializeArray(),
            success: function( msg ) {
                $("form.usersreviewform").get(0).reset();
                $('form.usersreviewform').hide();
							//$('.reviewsuccess').show();
                $('.reviewsuccess').html(msg);
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

    $('.viewcontactdetails').on('click',function(){
     var id = $(this).attr('id');
     var category = '<?php echo $this->uri->segment(1);?>';
     var slug = '<?php echo $this->uri->segment(3);?>';
     var type = '<?php echo $this->uri->segment(4);?>';
     var user_id 	= '<?php echo check_user();?>';
     if(user_id != ''){
      window.location.href = "<?php echo site_url();?>contactprofile/profile/"+category+"/"+slug+"/"+type;
  }else{
      window.location = '<?php echo site_url()?>signup?ac=' + '<?php echo $referAccountType; ?>' + '?url='+ btoa('<?php echo uri_string(); ?>');
  }
});

    $('.favorite').on('click',function(){
     var profile_id  = $(this).attr('id');
     var user_id 	= '<?php echo check_user();?>';
     if(user_id != ''){
        $.ajax({
          type:"post",
          url:"<?php echo site_url();?>caregivers/favorite",
          data:"profile_id="+profile_id+"&user_id="+user_id,
          success:function(fav){
           alert('Profile added to your favorites list');
       }
   });
    }
    else{
        window.location = '<?php echo site_url()?>signup?ac=' + '<?php echo $referAccountType; ?>' + '?url='+ btoa('<?php echo uri_string(); ?>');
    }
});
});
</script>

<!-- share this starts-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="//w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "fcfd27c1-d440-47b3-bb5e-17abb292ed1f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!-- share this ends -->
<!-- scroll js starts -->
<script src="<?php echo site_url();?>js/jquery.localScroll.min.js"></script>
<!--<script src="<?php echo site_url();?>js/jquery.scrollTo.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url();?>js/gmaps.js"></script>

<?php 
$ci = &get_instance();
if ($ci->session->flashdata('review')) { ?>
<script>
    $(document).ready(function(){
        $('#myModal2').modal('show');
    })
</script>
<?php } ?>

<!-- scroll js ends -->
<script>
	$(document).ready(function(){


    var map = new GMaps({
        div: '#map',
        lat: 31.7963186,
        lng: 35.175359,
        // width: '235px',
        height: '250px'

    });


         GMaps.geocode({
          address: "<?php echo $recordData['location'];?>",
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng(),
                title: "<?php echo $recordData['Location'];?>",
                infoWindow: {
                  content: "<span class='info_text'><?php echo $recordData['Location'];?></span>",
                }
              });
            }
          }
       });




		$.localScroll();
        $(".timetable").click(function(){
            var divPosition = $('#availability1').offset();
            if(divPosition){
                $('html, body').animate({scrollTop: divPosition.top-15}, "slow");
            }else
            {
                alert('This profile does not have any availability');
            }
        });

        $("#not_login").click(function(){
            window.location = '<?php echo site_url()?>signup?ac=' + '<?php echo $referAccountType; ?>' + '?url='+ btoa('<?php echo uri_string(); ?>');
        });
    });
</script>
