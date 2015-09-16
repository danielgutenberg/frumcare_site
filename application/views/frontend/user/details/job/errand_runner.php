<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        $cross = "<img src='".site_url()."img/cross.png'>";
        $tick  = "<img src='".site_url()."img/nut-list.png'>";  
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
                    <td >Neighborhood / Street </td>
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
        
        
        
        <?php if(!empty($rate)){ ?>    
        <tr>
            <td>Wage</td>
            <td >
            <?php echo $rate . '/Hr'; 
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
        
        <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr id="availability1">
            <td>When help needed</td>
            <td>
                <div class="details-info"><?php if(in_array("One time",$temp)){ echo $tick; }else{ echo $cross; }?> One Time</div>
                <div class="details-info"><?php if(in_array("Occassionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occassionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
              <div class="details-info"><?php if(isset($start_date) && $start_date !='0000-00-00'){$start_date = $recordData['start_date'];$start_date_array = explode('-',$start_date);$start_date = $start_date_array[1].'/'.$start_date_array[2].'/'.$start_date_array[0];echo $tick;}else{echo $cross; } ?> Start Date <?php  if ($start_date !='0000-00-00') echo $start_date;?></div>
            <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array("Weekends Fri./ Sun.",$temp)){ echo $tick; }else{ echo $cross; }?> Weekends Fri./ Sun.</div>
                <div class="details-info"><?php if(in_array("Shabbos",$temp)){ echo $tick; }else{ echo $cross; }?> Shabbos</div>                                            
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >When help needed</td>
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
            <td>Gender or caregiver wanted</td>
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
                <?php if($religious_observance == 'Not Jewish') {
                    echo 'Not necessary'; 
                } else {
                    echo $religious_observance;
                }?>
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
            <td>Smoking acceptable</td>
            <td>
                <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
            </td>
        </tr>
        <tr>
            <?php
       if(!empty($experience)){?>
       <tr>
           <td >Minimum experience</td>
           <td >    		
            <?php if ($experience == '6') {echo '5+'; } else {echo $experience;}?> years  
        </td>
    </tr>
    <?php }  else{
            ?>
                <tr>
                    <td >Minimum experience</td>
                    <td>N/A</td>
                </tr>
            <?php
          }?>
            <td>Abilities and Skills Necessary</td>
            <td>
                <div class="details-info"><?php echo isset($driver_license) && $driver_license == 1 ? $tick : $cross?> Drivers license</div>
                <div class="details-info"><?php echo isset($vehicle) && $vehicle == 1 ? $tick : $cross ?> Vehicle</div>
            </td>
        </tr>
    </table>
</div>
