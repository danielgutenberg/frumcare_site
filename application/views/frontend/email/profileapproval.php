<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">A new profile with following details has been submitted and require your action:</p>
    </div>
<br />
<?php
    $cross = "<img src='".site_url()."img/cross.png'> ";
    $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>

       
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        
        <?php 
        $navigate = $care_type > 16 ? 'jobs' : 'caregivers';
        if($facility_pic!="" && file_exists('images/profile-picture/'.$facility_pic)) {?>
        <tr>
                    <td >Photo</td>
    		         <td>   <div id="profile_image">
    		            	<img src="<?php echo site_url("images/profile-picture/{$facility_pic}")?>">
    		            </div></td></tr>
    	           <?php }
                else {
                 if($photo_of_child!="" && file_exists('images/profile-picture/'.$photo_of_child)) {?>
        <tr>
                    <td >Photo</td>
    		         <td>   <div id="profile_image">
    		            	<img src="<?php echo site_url("images/profile-picture/{$$photo_of_child}")?>">
    		            </div></td></tr> <?php } else { ?>
                
                <tr>
                    <td >No photo provided</td>
                    </tr>
                    <?php 
                } }?>
     
    
        
        <?php $language = explode(',',$language); ?>
        <tr>
            <td>Languages</td>
            <td>
                <div ><?php if(in_array("English",$language)){ echo $tick; }else{ echo $cross; }?> English</div>
                <div ><?php if(in_array("Yiddish",$language)){ echo $tick; }else{ echo $cross; }?> Yiddish</div>
                <div ><?php if(in_array("Hebrew",$language)){ echo $tick; }else{ echo $cross; }?> Hebrew</div>                
                <div ><?php if(in_array("Russian",$language)){ echo $tick; }else{ echo $cross; }?>Russian</div>
                <div ><?php if(in_array("French",$language)){ echo $tick; }else{ echo $cross; }?> French</div>
                <div ><?php if(in_array("Other",$language)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>    
    <?php if(($smoker==1 || $smoker==3) && $care_type != 7){?>
    <tr>
        <td>Smoker</td>
        <td >        
        <?php echo "Yes"?>
        </td>
    </tr>
    <?php }
    elseif($care_type != 7){
            ?>
                <tr>
                    <td >Smoker </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    <?php 
    if($care_type != 7){
        if(!empty($religious_observance)){?>
        <tr>
            <td>Level of religious observance</td>
            <td ><?php echo $religious_observance?></td>
        </tr>
        <?php }
        else{
            ?>
        <tr>
            <td >Level of religious observance </td>
            <td>N/A</td>
        </tr>
            <?php
        } 
    }
    ?>    
    <?php if(!empty($education_level) && $care_type != 7){?>
    <tr>
        <td>Level of education</td>
        <td >
            <?php 
                echo $education_level
            ?>
        </td>
    </tr>
    <?php }
     elseif($care_type != 7){
            ?>
                <tr>
                    <td >Level of education </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    <?php if(!empty($educational_institution) && $care_type != 7){?>
    <tr>
        <td>Educational institutions attended</td>
        <td >
            <?php echo $educational_institution; ?>
        </td>
    </tr>
    <?php }
    elseif($care_type != 7){
            ?>
                <tr>
                    <td >Educational institutions attended </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
          
    <?php        
            $lookingtowork = explode(',',$looking_to_work);            
            ?>   
            <tr>
               <td >Looking to work in</td>
               <td >            
                    <div class="details-info"><?php if(in_array('My home', $lookingtowork)){ echo $tick; }else{echo $cross; }?> My home</div>
                    <div class="details-info"><?php if(in_array("Child's home", $lookingtowork)){ echo $tick; }else{echo $cross;}?> Child's home</div>
                    <div class="details-info"><?php if(in_array(strtolower("Caregiving institution"), array_map('strtolower',$lookingtowork))){ echo $tick; }else{echo $cross; }?> Caregiving institution</div>
                    <div class="details-info"><?php if(in_array("Mother's helper", $lookingtowork)){ echo $tick; }else{echo $cross; }?> Mother's helper</div>	
                </td>
            </tr>
            
        <?php       
        if(!empty($number_of_children)){?>
        <tr>
            <td >Number of children willing to care for</td>
            <td >
                <?php echo $number_of_children ?>
            </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
                <td>Number of children willing to care for</td>
                <td>N/A</td>
            </tr>
        <?php            
        }         
            $optionalnumber = explode(',',$optional_number);    
            ?>
            <tr >    	
               <td></td>
               <td >    		
                <div class="details-info"><?php if(in_array('Twins',$optionalnumber)){ echo $tick; }else{echo $cross; }?>  Twins</div>
                <div class="details-info"><?php if(in_array('Triplets',$optionalnumber)){ echo $tick; }else{echo $cross; }?>  Triplets</div>        
            </td>
        </tr>
          <?php     
        if(!empty($age_group)){
            $age = explode(',',$age_group)
            ?>
            <tr>
               <td >Ages of children willing to care for</td>
               <td >    		
                <div class="details-info"><?php if(in_array('0-3', $age)){ echo $tick; }else{echo $cross; }?>0-3 Months</div>
                <div class="details-info"><?php if(in_array('3-6', $age)){ echo $tick; }else{echo $cross; }?>3-6 Months</div>
                <div class="details-info"><?php if(in_array('6-12', $age)){ echo $tick; }else{echo $cross; }?>6-12 Months</div>		
                <div class="details-info"><?php if(in_array('1-3', $age)){ echo $tick; }else{echo $cross; }?> 1 to 3 years</div>
                <div class="details-info"><?php if(in_array('3-5', $age)){ echo $tick; }else{echo $cross; }?> 3 to 5 years</div>
                <div class="details-info"><?php if(in_array('6-11', $age)){ echo $tick; }else{echo $cross; }?> 6 to 11 years</div>
                <div class="details-info"><?php if(in_array('12+', $age)){ echo $tick; }else{echo $cross; }?> 12+ years</div>            
            </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
                <td>Ages of children willing to care for</td>
                <td>N/A</td>
            </tr>
        <?php            
        }
        if(!empty($experience)){?>
        <tr>
           <td >Years of experience</td>
           <td >    		
            <?php echo $experience; ?>  
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Years of experience</td>
                <td>N/A</td>
            </tr>
        <?php            
        }
    if(!empty($training)){
        $trainingtemp = explode(',',$training);
        ?>
        <tr>
           <td >Training </td>
           <td >
            <div class="details-info"><?php if(in_array('CPR', $trainingtemp)){ echo $tick; }else{echo $cross; } ?>  CPR</div>
            <div class="details-info"><?php if(in_array('First Aid', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> First Aid</div>
            <div class="details-info"><?php if(in_array('Nanny/ Babysitter Course', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> Nanny/ Babysitter Course</div>
            <div class="details-info"><?php if(in_array('Other', $trainingtemp)){ echo $tick; }else{echo $cross; } ?> Other</div>                      
        </td>	
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Training</td>
                <td>N/A</td>
            </tr>
        <?php            
        } ?>
    
    <?php
    if(!empty($rate)){?>
    <tr>
    	<td >Rate</td>
    	<td >
            <?php echo $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Rate Available</div>    
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Rate</td>
                <td>N/A</td>
            </tr>
        <?php            
        } ?>
    
    <?php 
    if(!empty($availability)){
        $time = explode(',',$availability);
        ?>
        <tr id="availability1">
           <td >Availability </td>
           <td >
            <div class="details-info"><?php if(in_array("Immediate",$time)){echo $tick; }else{echo $cross; } ?> Immediate </div>
            <div class="details-info"><?php if(in_array("Start date",$time)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
            <div class="details-info"><?php if(in_array('Occassionally', $time)){ echo $tick; }else{echo $cross; } ?>Occassionally</div>
            <div class="details-info"><?php if(in_array('Regularly', $time)){ echo $tick; }else{echo $cross;} ?>Regularly</div>
            <div class="details-info"><?php if(in_array('Morning', $time)){ echo $tick; }else{echo $cross; }?> Morning</div>
            <div class="details-info"><?php if(in_array('Afternoon', $time)){ echo $tick; }else{echo $cross; }?> Afternoon</div>
            <div class="details-info"><?php if(in_array('Evening', $time)){ echo $tick; }else{echo $cross; }?> Evening</div>
            <div class="details-info"><?php if(in_array('Shabbos', $time)){ echo $tick; }else{echo $cross; }?> Shabbos</div>
            <div class="details-info"><?php if(in_array('Night Nurse', $time)){ echo $tick; }else{echo $cross; }?> Night Nurse</div>
            <div class="details-info"><?php if(in_array('Vacation Sittter', $time)){ echo $tick; }else{echo $cross; }?>Vacation Sittter</div>            
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>Availability</td>
                <td>N/A</td>
            </tr>
        <?php            
        }
    if($references==1){?>
    <tr>
    	<td >References</td>
    	<td >
    		<a href="#">Download</a>
    	</td>
    </tr>
    <?php }
    else{ ?>
            <tr>
                <td>References</td>
                <td>N/A</td>
            </tr>
        <?php            
        } ?> 
    <?php
    if($references==1){?>
    <!--<tr>-->
    <!--	<td >References Details</td>-->
    <!--	<td >-->
    		
    <!--	</td>-->
    <!--</tr>-->
    <?php }
    else{ ?>
            <!--<tr>-->
            <!--    <td>References Details</td>-->
            <!--    <td>N/A</td>-->
            <!--</tr>-->
        <?php            
        } ?>
    
    <tr style="display:none">
    	<td >Agree to Background Check?</td>
    	<td >
    		<?php if ($agree_bg_check == 1) { echo 'yes';}
    		else { echo 'no';} ?>
    	</td>
    </tr>
    <tr>
    	<td >Abilities and skills</td>
        <td >
            <div class="details-info"><?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?>I have a drivers license</div>
            <div class="details-info"><?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?> I have a vehicle</div>
            <div class="details-info"><?php echo isset($pick_up_child) && $pick_up_child == 1 ? $tick : $cross?>Able to pick up kids from school</div>
            <div class="details-info"><?php echo isset($cook) && $cook == 1 ? $tick : $cross?>Able to cook and prepare food</div>
            <div class="details-info"><?php echo isset($basic_housework) && $basic_housework == 1 ? $tick : $cross?>Able to do light housework / cleaning</div>
            <div class="details-info"><?php echo isset($homework_help) && $homework_help == 1 ? $tick : $cross?>Able to help with homework</div>
            <div class="details-info"><?php echo isset($sick_child_care) && $sick_child_care == 1 ? $tick : $cross?>Able to care for sick child</div>
            <div class="details-info"><?php echo isset($on_short_notice) && $on_short_notice == 1 ? $tick : $cross?>Available on short notice</div>            
        </td>
    </tr>
    
</table>
</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:15px; margin-bottom:5px;">Approve this submission:</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">To APPROVE: <a href="<?php echo site_url();?>ad/approve/<?php echo $user_id;?>/<?php echo $profile_id;?>">Click Here</a></div>

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:15px;">Or to EDIT before approving, login to the admin section.</div>

Thanks you,
<br />
FRUMCARE team
<br />
 —
 <br />
 The email is auto generated by frumcare.com website.