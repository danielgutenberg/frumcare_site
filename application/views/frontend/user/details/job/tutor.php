<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        $cross = "<img src='".site_url()."img/cross.png'> ";
        $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
        ?>
        
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
        
        <?php if(!empty($age_group)){ ?>    
        <tr>
            <td>Age of student</td>
            <td>
                <?php echo $age_group; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Age of student </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <tr>
            <td>Gender of student</td>
            <td>
                <?php  
                if($gender == 1) echo "Male";
                elseif($gender == 2) echo "Female";
                else echo "Any";
                ?>
            </td>
        </tr>
        
        <?php if(!empty($subjects)){ ?>
        <?php $subjects = explode(',',$subjects); ?>
        <tr>
            <td>Looking for help in the following Subjects</td>
            <td>
                <div class="details-info"><?php if(in_array("Elementary school",$subjects)){ echo $tick; }else{ echo $cross; }?> Elementary school</div>
                <div class="details-info"><?php if(in_array("High school",$subjects)){ echo $tick; }else{ echo $cross; }?> High school</div>
                <div class="details-info"><?php if(in_array("Post high school",$subjects)){ echo $tick; }else{ echo $cross; }?>Post High school</div>
                <div class="details-info"><?php if(in_array("limudei kodesh",$subjects)){ echo $tick; }else{ echo $cross; }?> Limudei kodesh</div>                
                <div class="details-info"><?php if(in_array("general studies",$subjects)){ echo $tick; }else{ echo $cross; }?>General studies</div>
                <div class="details-info"><?php if(in_array("Special ed",$subjects)){ echo $tick; }else{ echo $cross; }?> Special ed</div>
                <div class="details-info"><?php if(in_array("Music",$subjects)){ echo $tick; }else{ echo $cross; }?> Music</div>
                <div class="details-info"><?php if(in_array("Art",$subjects)){ echo $tick; }else{ echo $cross; }?> Art</div>                
                <div class="details-info"><?php if(in_array("Other",$subjects)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Looking for help in the following Subjects </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
         
        
        <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr id="availability1">
            <td>When lessons needed</td>
            <td> 
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
                <div class="details-info"><?php if(in_array("Start Date",$temp)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>               
                <div class="details-info"><?php if(in_array("Occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>                                                
                <div class="details-info"><?php if(in_array("By appointment",$temp)){ echo $tick; }else{ echo $cross; }?> By appointment</div>                            
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >When lessons needed</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
          
          <?php if(!empty($rate)){ ?>    
        <?php $rate_type = explode(',',$rate_type)?>
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
            <td>Gender of tutor wanted</td>
            <td>
                <?php  
                if($gender_of_caregiver == 1) echo "Male";
                elseif($gender_of_caregiver == 2) echo "Female";
                else echo "Any";
                ?>
            </td>
        </tr>
        
        <tr>
        <td>Age of Tutor wanted</td>
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
        
        <tr>
            <td>Smoking Acceptable</td>
            <td>
                <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
            </td>
        </tr>        
        
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
        
        <?php if(!empty($experience)){ ?>    
        <tr>
            <td>Minimum years of experience</td>
            <td>
                <?php if ($experience == '6') {echo '5+'; } else {echo $experience;} .' years'; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Minimum years of experience</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>                 
        
        <?php if(!empty($training)){ ?>
        <?php $trainingtemp = explode(',',$training); ?>
        <tr>
            <td>Training / Certification required</td>
            <td>
                <div class="details-info"> <?php if(in_array('CPR',$trainingtemp)){echo $tick; }else{ echo $cross; } ?> CPR</div>
                <div class="details-info"> <?php if(in_array('First Aid',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> First Aid</div>
                <div class="details-info"> <?php if(in_array('degree',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Degree</div>                
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
    </table>
</div>
