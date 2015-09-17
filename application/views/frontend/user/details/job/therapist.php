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
        <!--<tr>-->
        <!--    <td>Neighborhood / Street</td>-->
        <!--    <td>-->
        <!--        <?php echo $neighbour; ?>-->
        <!--    </td>-->
        <!--</tr>-->
        <?php }
        else{
            ?>
                <!--<tr>-->
                <!--    <td >Neighborhood / Street</td>-->
                <!--    <td>N/A</td>-->
                <!--</tr>-->
            <?php
          } ?>
                  
        <?php if(!empty($age_group)){ ?>    
        <tr>
            <td>Age of patient</td>
            <td>
                <?php echo $age_group; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Age of patient </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <tr>
            <td>Gender of patient</td>
            <td>
                <?php  
                if($gender == 1) echo "Male";
                elseif($gender == 2) echo "Female";
                else echo "Any";
                ?>
            </td>
        </tr>
        
        <?php if(!empty($conditions_of_patient)){ ?>
        <tr>
            <td>Conditions of patient</td>
            <td>
                <?php echo $conditions_of_patient; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Conditions of patient </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <?php if(!empty($type_of_therapy)){ ?>
        <tr>
            <td>Type of therapy wanted</td>
            <td>
                <?php echo $type_of_therapy; ?>
            </td>
        </tr>
        <?php }
        else{
            ?>
                <tr>
                    <td >Type of therapy wanted</td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <tr>
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
            <td>Gender of therapist wanted</td>
            <td>
                <?php  
                if($gender_of_caregiver == 1) echo "Male";
                elseif($gender_of_caregiver == 2) echo "Female";
                else echo "Any";
                ?>
            </td>
        </tr>
        
        <?php /* if(!empty($religious_observance)){ ?>    
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
          } */ ?>
        
        <!--<tr>-->
        <!--    <td>Must accept insurance</td>-->
        <!--    <td>-->
                <?php  
                //if($accept_insurance == 1) echo "Yes";                
                //else echo "No";
                ?>
        <!--    </td>-->
        <!--</tr>-->
    </table>
</div>
