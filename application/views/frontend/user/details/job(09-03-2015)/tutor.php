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
        <?php } ?>
        
        <?php if(!empty($neighbour)){ ?>
        <tr>
            <td>Neighborhood</td>
            <td>
                <?php echo $neighbour; ?>
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($zip)){ ?>
        <tr>
            <td>zip</td>
            <td>
                <?php echo $zip; ?>
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($age_group)){ ?>    
        <tr>
            <td>Age of student</td>
            <td>
                <?php echo $age_group; ?>
            </td>
        </tr>
        <?php } ?>
        
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
            <td>Looking for help in following Subjects</td>
            <td>
                <div class="details-info"><?php if(in_array("Elementary school",$subjects)){ echo $tick; }else{ echo $cross; }?> Elementary school</div>
                <div class="details-info"><?php if(in_array("High school",$subjects)){ echo $tick; }else{ echo $cross; }?> High school</div>
                <div class="details-info"><?php if(in_array("limudei kodesh",$subjects)){ echo $tick; }else{ echo $cross; }?> Limudei kodesh</div>                
                <div class="details-info"><?php if(in_array("general studies",$subjects)){ echo $tick; }else{ echo $cross; }?>General studies</div>
                <div class="details-info"><?php if(in_array("Special ed",$subjects)){ echo $tick; }else{ echo $cross; }?> Special ed</div>
                <div class="details-info"><?php if(in_array("Music",$subjects)){ echo $tick; }else{ echo $cross; }?> Music</div>
                <div class="details-info"><?php if(in_array("Art",$subjects)){ echo $tick; }else{ echo $cross; }?> Art</div>                
                <div class="details-info"><?php if(in_array("Other",$subjects)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr id="availability1">
            <td>When you need care</td>
            <td>                
                <div class="details-info"><?php if(in_array("Occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
                <div class="details-info"><?php if(in_array("Start date",$temp)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
                <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>                                                
                <div class="details-info"><?php if(in_array("By appointment",$temp)){ echo $tick; }else{ echo $cross; }?> By appointment</div>                            
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($language)){ ?>
        <?php $language = explode(',',$language); ?>
        <tr>
            <td>Language necessary</td>
            <td>
                <div class="details-info"><?php if(in_array("English",$language)){ echo $tick; }else{ echo $cross; }?> English</div>
                <div class="details-info"><?php if(in_array("Yiddish",$language)){ echo $tick; }else{ echo $cross; }?> Yiddish</div>
                <div class="details-info"><?php if(in_array("Hebrew",$language)){ echo $tick; }else{ echo $cross; }?> Hebrew</div>                
                <div class="details-info"><?php if(in_array("Russian",$language)){ echo $tick; }else{ echo $cross; }?>Russian</div>
                <div class="details-info"><?php if(in_array("French",$language)){ echo $tick; }else{ echo $cross; }?> French</div>
                <div class="details-info"><?php if(in_array("Other",$language)){ echo $tick; }else{ echo $cross; }?> Other</div>                                                            
            </td>
        </tr>
        <?php } ?>
        
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
        
        <?php if(!empty($caregiverage_from)){ ?>    
        <tr>
            <td>Tutor age from</td>
            <td>
                <?php echo $caregiverage_from; ?>
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($caregiverage_to)){ ?>    
        <tr>
            <td>Tutor age to</td>
            <td>
                <?php echo $caregiverage_to; ?>
            </td>
        </tr>
        <?php } ?>
        
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
        <?php } ?>
        
        <?php if(!empty($experience)){ ?>    
        <tr>
            <td>Minimum experience</td>
            <td>
                <?php echo $experience; ?>
            </td>
        </tr>
        <?php } ?>                 
        
        <?php if(!empty($training)){ ?>
        <?php $trainingtemp = explode(',',$training); ?>
        <tr>
            <td>Training necessary</td>
            <td>
                <div class="details-info"> <?php if(in_array('CPR',$trainingtemp)){echo $tick; }else{ echo $cross; } ?> CPR</div>
                <div class="details-info"> <?php if(in_array('First Aid',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> First Aid</div>
                <div class="details-info"> <?php if(in_array('degree',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Degree</div>                
                <div class="details-info"> <?php if(in_array('Not necessary',$trainingtemp)){ echo $tick; }else{ echo $cross; } ?> Not necessary</div>
            </td>
        </tr>
        <?php } ?>        
    </table>
</div>