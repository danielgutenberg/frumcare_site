<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        $cross = "<img src='".site_url()."img/cross.png'>";
        $tick  = "<img src='".site_url()."img/nut-list.png'>";    
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
        
        <?php if(!empty($job_description)){ ?>
        <tr>
            <td>Job description</td>
            <td>
                <?php echo $job_description; ?>
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($rate)){ ?>    
        <?php $rate_type = explode(',',$rate_type)?>
        <tr>
            <td>Wage</td>
            <td>
                <div class="details-info"><?php echo $rate; ?></div>
                <div class="details-info"><?php if(in_array('1',$rate_type)){ echo $tick; }else{ echo $cross; }?> Hourly Rate</div>
                <div class="details-info"><?php if(in_array('2',$rate_type)){ echo $tick; }else{ echo $cross; }?> Monthly Rate</div>
            </td>
        </tr>
        <?php } ?>
        
        <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr id="availability1">
            <td>When you need help</td>
            <td>
                <div class="details-info"><?php if(in_array("One Time",$temp)){ echo $tick; }else{ echo $cross; }?> One Time</div>
                <div class="details-info"><?php if(in_array("Occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
                <div class="details-info"><?php if(in_array("Start date",$temp)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
                <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array("Weekends Fri./ Sun.",$temp)){ echo $tick; }else{ echo $cross; }?> Weekends Fri./ Sun.</div>
                <div class="details-info"><?php if(in_array("Shabbos",$temp)){ echo $tick; }else{ echo $cross; }?> Shabbos</div>                                            
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
            <td>Gender of caregiver</td>
            <td>
                <?php  
                if($gender_of_caregiver == 1) echo "Male";
                elseif($gender_of_caregiver == 2) echo "Female";
                else echo "Any";
                ?>
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
        
        <tr>
            <td>Smoker acceptable</td>
            <td>
                <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="details-info"><?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license</div>
                <div class="details-info"><?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross ?> Vehicle</div>
            </td>
        </tr>
    </table>
</div>