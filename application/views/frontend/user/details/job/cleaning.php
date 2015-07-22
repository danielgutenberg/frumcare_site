<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php
        $cross = "<img src='".site_url()."img/cross.png'> ";
        $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
        ?>
        
        <?php if(!empty($looking_to_work)){ ?>
        <?php $lookingtowork = explode(',',$looking_to_work)?>
        <tr>
            <td>Looking for help in</td>
            <td>
                <div class="details-info"><?php if(in_array('Home',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> My home</div>
                <div class="details-info"><?php if(in_array('Office/business',$lookingtowork)){ echo $tick; }else{echo $cross;} ?> Office / business</div>                
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Looking for help in </td>
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
        
        <?php if(!empty($number_of_rooms)){ ?>
        <tr>
            <td>Number of rooms</td>
            <td>
                <?php echo $number_of_rooms; ?>
            </td>
        </tr>
        <?php } 
        else{
            ?>
                <tr>
                    <td >Number of rooms </td>
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
        
        <?php if(!empty($willing_to_work)){ ?>
        <?php $willing_to_work = explode(',',$willing_to_work)?>
        <tr>
            <td>Must specialize in</td>
            <td>
                <div class="details-info"><?php if(in_array('Dishes',$willing_to_work)){echo $tick; }else{echo $cross; } ?> Dishes</div>
                <div class="details-info"><?php if(in_array('Floors',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Floors</div>
                <div class="details-info"><?php if(in_array('Windows',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Windows</div>                
                <div class="details-info"><?php if(in_array('Laundry',$willing_to_work)){ echo $tick; }else{echo $cross;} ?> Laundry</div>                
                <div class="details-info"><?php if(in_array('Folding',$willing_to_work)){ echo $tick; }else{echo $cross;} ?> Folding</div>
                <div class="details-info"><?php if(in_array('Ironing',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Ironing</div>                
                <div class="details-info"><?php if(in_array('Cleaning and Dusting Furniture',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Cleaning and Dusting Furniture</div>
                <div class="details-info"><?php if(in_array('Cleaning Refrigerator/Freezer',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Cleaning Refrigerator/Freezer</div>
                <div class="details-info"><?php if(in_array('Cleaning Oven/Stovetop',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Cleaning Oven/Stovetop</div>
                <div class="details-info"><?php if(in_array('Pesach Cleaning',$willing_to_work)){ echo $tick; }else{echo $cross; } ?> Pesach Cleaning</div>
                <div class="details-info"><?php echo isset($pick_up_child) && $pick_up_child == '1' ? $tick:$cross ?> Must be able to watch children as well</div>                 
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Must specialize in </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <?php if(!empty($availability)){ ?>
        <?php $temp = explode(',',$availability); ?>
        <tr>
            <td id="availability1">When help needed</td>
            <td>
                <div class="details-info"><?php if(in_array("One time",$temp)){ echo $tick; }else{ echo $cross; }?> One Time</div>
                <div class="details-info"><?php if(in_array("Occasionally",$temp)){ echo $tick; }else{ echo $cross; }?> Occasionally</div>
                <div class="details-info"><?php if(in_array("Regularly",$temp)){ echo $tick; }else{ echo $cross; }?> Regularly</div>
                <div class="details-info"><?php if(in_array("Asap",$temp)){ echo $tick; }else{ echo $cross; }?> Asap</div>
                <div class="details-info"><?php if(in_array("Start Date",$temp)){echo $tick; if($start_date!='0000-00-00'){ echo $start_date;} }else{echo $cross; } ?> Start Date</div>
                <div class="details-info"><?php if(in_array("Morning",$temp)){ echo $tick; }else{ echo $cross; }?> Morning</div>
                <div class="details-info"><?php if(in_array("Afternoon",$temp)){ echo $tick; }else{ echo $cross; }?> Afternoon</div>
                <div class="details-info"><?php if(in_array("Evening",$temp)){ echo $tick; }else{ echo $cross; }?> Evening</div>
                <div class="details-info"><?php if(in_array("Weekends fri/sun",$temp)){ echo $tick; }else{ echo $cross; }?> Weekends Fri./ Sun.</div>
                <div class="details-info"><?php if(in_array("Saturday",$temp)){ echo $tick; }else{ echo $cross; }?> Saturday</div>                                            
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
        
        <?php if(!empty($rate)){ ?>
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
            <td>Gender</td>
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
            <td>Smoker acceptable</td>
            <td>
                <?php if($smoker==1){echo "Yes";}else{echo "No";} ?>
            </td>
        </tr>
    </table>
</div>
