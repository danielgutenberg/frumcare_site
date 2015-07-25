<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        $cross = "<img src='".site_url()."img/cross.png'> ";
        $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
        ?>    
        <?php if(!empty($looking_to_work)){ ?>
        <?php $lookingtowork = explode(',',$looking_to_work)?>
        <tr>
            <td>Looking for</td>
            <td>
                <div class="details-info"><?php if(in_array('Live In',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> Live In</div>
                <div class="details-info"><?php if(in_array('Live Out',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> Live Out</div>                
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Looking for </td>
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
            <td>Neighborhood / Street</td>
            <td>
                <?php echo $neighbour; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Neighborhood / Street</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <?php if(!empty($zip)){ ?>
        <!--<tr>-->
        <!--    <td>zip</td>-->
        <!--    <td>-->
        <!--        <?php //echo $zip; ?>-->
        <!--    </td>-->
        <!--</tr>-->
        <?php } 
        else{
            ?>
                <!--<tr>-->
                <!--    <td >zip </td>-->
                <!--    <td>N/A</td>-->
                <!--</tr>-->
            <?php
          } ?>
        
        <?php if(!empty($number_of_children)){ ?>
        <?php $optional_number = explode(',',$optional_number); ?>
        <tr>
            <td>Number of children</td>
            <td>
                <div class="details-info"><?php echo $number_of_children; ?></div>
                <div class="details-info"><?php if(in_array('twins',$optional_number)){ echo $tick; }else{ echo $cross; } ?> Twins</div>
                <div class="details-info"><?php if(in_array('triplets',$optional_number)){echo $tick; }else{ echo $cross; } ?> Triplets</div>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Number of children </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <tr>
            <td>Gender of children</td>
            <td>
                <?php  
                if($gender == 1) echo "Male";
                elseif($gender == 2) echo "Female";
                else echo "Any";
                ?>
            </td>
        </tr>
        
        <?php if(!empty($age_group)){ ?>
        <?php $age_group = explode(',',$age_group); ?>
        <tr>
            <td>Ages of children</td>
            <td>
                <div class="details-info"><?php if(in_array('0-3',$age_group)){ echo $tick; }else{ echo $cross; } ?> 0-3 months</div>
                <div class="details-info"><?php if(in_array('3-6',$age_group)){ echo $tick; }else{ echo $cross; } ?> 3-6 months</div>
                <div class="details-info"><?php if(in_array('6-12',$age_group)){ echo $tick; }else{ echo $cross; } ?> 6-12 months</div>                
                <div class="details-info"><?php if(in_array('1-3',$age_group)){ echo $tick; }else{ echo $cross; } ?> 1 to 3 years</div>
                <div class="details-info"><?php if(in_array('3-5',$age_group)){ echo $tick; }else{ echo $cross; } ?> 3 to 5 years</div>
                <div class="details-info"><?php if(in_array('6-11',$age_group)){ echo $tick; }else{ echo $cross; } ?> 6 to 11 years</div>
                <div class="details-info"><?php if(in_array('12+',$age_group)){ echo $tick; }else{ echo $cross; } ?> 12+ years</div>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Ages of children </td>
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
                <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  echo $start_date;?></div>
            <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array("Weekends Fri./ Sun.",$temp)){ echo $tick; }else{ echo $cross; }?> Weekends Fri. / Sun.</div>
                <div class="details-info"><?php if(in_array("Shabbos",$temp)){ echo $tick; }else{ echo $cross; }?> Shabbos</div>
                <div class="details-info"><?php if(in_array("Night Nurse",$temp)){ echo $tick; }else{ echo $cross; }?> Night Nurse</div>                            
                <div class="details-info"><?php if(in_array("Vacation Sitter",$temp)){ echo $tick; }else{ echo $cross; }?>Vacation Sitter</div>
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
        
        <?php if(!empty($religious_observance)){ ?>    
        <tr>
            <td>Level of observance necessary</td>
            <td>
                <?php echo $religious_observance; ?>
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
        
        <tr>
            <td>Age of caregiver wanted</td>
            <td>
                <?php 
                if(!empty($caregiverage_from) && !empty($caregiverage_from)){
                    echo $caregiverage_from.' to '.$caregiverage_from;
                }
                else{
                    echo "N/A";
                } ?>
            </td>
        </tr>
        
        <?php if(!empty($rate)){ ?>    
        <?php ?>
        <tr>
            <td>Wage</td>
            <td >
            <?php echo $rate . ' / Hr'; 
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
            <td>Smoker</td>
            <td>
                <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
            </td>
        </tr>
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
        
        <?php if(!empty($training)){ ?>
        <?php $trainingtemp = explode(',',$training); ?>
        <tr>
            <td>Training necessary</td>
            <td>
                <div class="details-info"> <?php if(in_array('CPR',$trainingtemp)){echo $tick; }else{ echo $cross; } ?> CPR</div>
                <div class="details-info"> <?php if(in_array('First Aid',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> First Aid</div>
                <div class="details-info"> <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Nanny/ Babysitter course</div>
                <div class="details-info"> <?php if(in_array('Not necessary',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Not necessary</div>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Training necessary </td>
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
                    <?php echo isset($pick_up_child) && $pick_up_child == 1 ? $tick : $cross?>Must be able to pick up kids from school
                </div>
                <div class="details-info">
                    <?php echo isset($cook) && $cook == 1 ? $tick : $cross?>Must be able to cook / serve meals
                </div>
                <div class="details-info">
                    <?php echo isset($basic_housework) && $basic_housework == 1 ? $tick : $cross?>Must be able to do housework / cleaning
                </div>
                <div class="details-info">
                    <?php echo isset($homework_help) && $homework_help == 1 ? $tick : $cross?>Must be able to help with homework
                </div>
                <div class="details-info">
                    <?php echo isset($sick_child_care) && $sick_child_care == 1 ? $tick : $cross?>Must be able to care for sick child
                </div>
                
                <div class="details-info">
                    <?php echo isset($bath_children) && $bath_children == 1 ? $tick : $cross?>Must be able to bathe children
                </div>
                <div class="details-info">
                    <?php echo isset($bed_children) && $bed_children == 1 ? $tick : $cross?>Must be able to put children to bed
                </div>
                
                <div class="details-info">
                    <?php echo isset($references) && $references == 1 ? $tick : $cross?>Must have references
                </div>
            </td>
        </tr>
    </table>
</div>
