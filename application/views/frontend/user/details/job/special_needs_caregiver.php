<div class="table-responsive">
    <table class="table table-striped borderbottom">
    <?php
        $cross = "<img src='".site_url()."img/cross.png'> ";
        $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
        $location = '';
        if ($city != '') {
            $location .= $city;
        }
        if ($state != '') {
            $location .= ', ' . $state;
        }
        if ($country != '') {
            $location .= ', ' . $country;
        }
        if($currency == 'ILS') {
            $symbol = "&#8362;"; 
        } else {
            $symbol = '$';
        }
    ?>
    
    <?php if(!empty($looking_to_work)){ ?>
        <?php $lookingtowork = explode(',',$looking_to_work)?>
        <tr>
            <td>Looking for</td>
            <td>
                <div class="details-info"><?php if(in_array('Live in',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> Live in</div>
                <div class="details-info"><?php if(in_array('Live out',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> Live out</div>                
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Looking for</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    
    <?php if(!empty($location)){ ?>
        <tr>
            <td>Location</td>
            <td>
                <?php echo $location; ?>
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Location </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
          
                            <?php if(!empty($neighbour)){ ?>
        <tr>
            <td>Neighborhood</td>
            <td>
                <?php echo $neighbour; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Neighborhood </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>

    
    <?php if(!empty($age)){ ?>    
        <tr>
            <td>Age of person requiring care</td>
            <td>
                <?php echo $age; ?>
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Age of person requiring care </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
     
    <tr>
        <td>Gender of person requiring care</td>
        <td>
            <?php  
                if($gender_of_careseeker == 1) echo "Male";
                elseif($gender_of_careseeker == 2) echo "Female";
                else echo "Any";
            ?>
        </td>
    </tr>
    
    <?php if(!empty($willing_to_work)){ ?>
        <?php $tempwillingtowork = explode(',',$willing_to_work)?>
        <tr>
            <td>Conditions patient suffers from</td>
            <td>
                <div class="details-info"><?php if(in_array('Autism', $tempwillingtowork)){  echo $tick; }else{echo $cross; }?> <span>Autism</span></div>
                <div class="details-info"><?php if(in_array('Down Syndrome', $tempwillingtowork)){  echo $tick; }else{echo $cross; }?> <span>Down Syndrome</span></div>                                        
                <div class="details-info"><?php if(in_array('Handicapped', $tempwillingtowork)){  echo $tick; }else{echo $cross; }?> <span>Handicapped</span></div>
                <div class="details-info"><?php if(in_array('Wheelchair bound', $tempwillingtowork)){  echo $tick; }else{echo $cross; }?> <span>Wheelchair bound</span></div>                
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Conditions patient suffers from </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    
    <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr id="availability1">
            <td>When care needed</td>
            <td>                
                <div class="details-info"><?php if(in_array("Occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
                <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  if ($start_date !='0000-00-00') echo $start_date;?></div>
            <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>                
                <div class="details-info"><?php if(in_array("Weekends Fri./ Sun.",$temp)){ echo $tick; }else{ echo $cross; }?> Weekends Fri. / Sun.</div>                
                <div class="details-info"><?php if(in_array("Shabbos",$temp)){ echo $tick; }else{ echo $cross; }?> Shabbos</div>            
                <div class="details-info"><?php if(in_array("24 hr care",$temp)){ echo $tick; }else{ echo $cross; }?>24 hr care</div>
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >When care needed</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
   

    
    <?php if(!empty($language)){ ?>
        <?php $language = explode(',',$language); ?>
        <tr>
            <td>Languages necessary</td>
            <td>
                <div class="details-info"><?php if(in_array("English",$language)){ echo $tick; }else{ echo $cross; }?> English</div>
                <div class="details-info"><?php if(in_array("Yiddish",$language)){ echo $tick; }else{ echo $cross; }?> Yiddish</div>
                <div class="details-info"><?php if(in_array("Hebrew",$language)){ echo $tick; }else{ echo $cross; }?> Hebrew</div>                
                <div class="details-info"><?php if(in_array("Russian",$language)){ echo $tick; }else{ echo $cross; }?>Russian</div>
                <div class="details-info"><?php if(in_array("French",$language)){ echo $tick; }else{ echo $cross; }?> French</div>
                <div class="details-info"><?php if(in_array("Other",$language)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Languages necessary </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
          
    
    <tr>
        <td>Age of caregiver wanted</td>
        <td>
            <?php 
            if(!empty($caregiverage_from) && !empty($caregiverage_to)){
                echo $caregiverage_from.' to '.$caregiverage_to;
            }
            else{
                echo "N/A";
            } ?>
        </td>
    </tr>
        <tr>
        <td>Gender of caregiver wanted</td>
        <td>
            <?php  
                if($gender_of_caregiver == 1) echo "Male";
                elseif($gender_of_caregiver == 2) echo "Female";
                else echo "Any";
            ?>
        </td>
    </tr>
    
    <?php if(!empty($training)){ ?>
        <?php $trainingtemp = explode(',',$training); ?>
        <tr>
            <td>Training / Certification required</td>
            <td>
                <div class="details-info"> <?php if(in_array('CPR',$trainingtemp)){echo $tick; }else{ echo $cross; } ?> CPR</div>
                <div class="details-info"> <?php if(in_array('First Aid',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> First Aid</div>
                <div class="details-info"> <?php if(in_array('Special needs training',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Special needs training</div>
                <div class="details-info"> <?php if(in_array('Nurse',$trainingtemp)){echo $tick; }else{ echo $cross; } ?> Nurse</div>
                <div class="details-info"> <?php if(in_array('Not necessary',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Not necessary</div>
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Training / Certification required</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    
    <?php if(!empty($experience)){ ?>    
        <tr>
            <td>Minimum experience</td>
            <td>
                <?php if ($experience == '6') {echo '5+'; } else {echo $experience;}?> years
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Minimum experience </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    
    <?php if(!empty($religious_observance)){ ?>    
        <tr>
            <td>Level of observance necessary</td>
            <td>
                <?php if ($religious_observance == 'Not Jewish') {echo 'Not necessary';} else {echo $religious_observance;} ?>
            </td>
        </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Level of observance necessary </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>

    <?php if(!empty($rate)){ ?>    
        <?php $rate_type = explode(',',$rate_type)?>
        <tr>
            <td>Wage</td>
            <td >
            <?php echo $symbol . $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Payment Available</div>    
        </td>
        </tr>
    <?php }else{
            ?>
                <tr>
                    <td >Wage </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    <tr>
        <td>Smoking acceptable</td>
        <td>
            <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
        </td>
    </tr>
    

    
    <tr>
        <td>Abilities and skills necessary</td>
        <td>
            <div class="details-info">
            <?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?>Drivers license
            </div>
            <div class="details-info">
                <?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross?>Vehicle
            </div>            
            <div class="details-info">
                <?php echo isset($cook) && $cook == 1 ? $tick : $cross?>Must be able to cook and prepare food/serve meals
            </div>
            <div class="details-info">
                <?php echo isset($basic_housework) && $basic_housework == 1 ? $tick : $cross?>Must be able to do light housework/ cleaning
            </div>
            <div class="details-info">
                <?php echo isset($personal_hygiene) && $personal_hygiene == 1 ? $tick : $cross?>Must be able to deal with personal hygiene of patient
            </div>                        
        </td>
    </tr>
</table>
</div>
