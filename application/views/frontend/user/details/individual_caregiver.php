<?php
    $cross = "<img src='".site_url()."img/cross.png'> ";
    $tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>

        <?php if($care_type==7) { ?>
        <h2>
            Personal Details 
        </h2>
        <?php } else { ?>
        <h2>
            <?php 
                $name_array = explode(" ",$name);
                echo $name_array[0]."'s ";
            ?>
            Personal Details 
        </h2>   
        <?php } ?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
    <?php if(!empty($location)){?>    
    <tr>
        <td>Location</td>
        <td id="locationField">
            <?php echo $location;?>
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
          }?>
    <?php if(!empty($neighbour)){?>
    <tr>
        <td>Neighborhood / Street</td>
        <td><?php echo $neighbour;?> </td>
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
                
    <?php 
    if($care_type != 7){
        if(!empty($age)){
    ?>
        <tr>
            <td>Age</td>
            <td ><?php echo $age;?></td>
        </tr>
    <?php }else{ ?>
        <tr>
            <td >Age </td>
            <td>N/A</td>
        </tr>
    <?php
        }
    } 
    ?>
          
    <?php if(!empty($gender)){?>
    <tr>
        <td>Gender</td>
        <td >
          <?php echo $gender==1?'Male':'Female'?>
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Gender </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
    <?php if(!empty($marital_status) && $care_type != 7){?>
    <tr>
        <td>Marital status</td>
        <td >
            <?php 
            if($marital_status==1){
                echo "Single";
            }
            else if($marital_status==2){
                echo "Married";
            }
            else if($marital_status==3){
                echo "Divorced";
            }else{
                echo "Widowed";
            }?>            
        </td>
    </tr>
    <?php }
    elseif($care_type != 7){
            ?>
                <tr>
                    <td >Marital status </td>
                    <td>N/A</td>
                </tr>
            <?php
          } ?>
        
        <?php $language = explode(',',$caregiver_language); ?>
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
        
    <?php if ($care_type != 7) { ?>
    <?php if(($smoke==1 || $smoke==3)){?>
    <tr>
        <td>Smoker</td>
        <td >        
        <?php echo "Yes"?>
        </td>
    </tr>
    <?php }
    else {
            ?>
                <tr>
                    <td >Smoker </td>
                    <td><?php echo "No"?></td>
                </tr>
            <?php
          } }?>
    <?php 
    if($care_type != 7){
        if(!empty($caregiver_religious_observance)){?>
        <tr>
            <td>Level of religious observance</td>
            <td ><?php echo $caregiver_religious_observance?></td>
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
</table>
</div>
    <div>
        <?php if($care_type==7) { ?>
        <h2>
            Therapy Details 
        </h2>
        <?php } else { ?>
        <h2>
            <?php $name_array = explode(" ",$name);
            echo $name_array[0]."'s "; ?>
            Job Details 
        </h2>   
        <?php } ?>
    </div>    
    <?php
        if($care_type==1){
            $this->load->view('frontend/user/details/individual/babysitter');
        }
        else if($care_type==2){
            $this->load->view('frontend/user/details/individual/nanny');
        }
        else if($care_type==3){
            $this->load->view('frontend/user/details/individual/nursery');
        }
        else if($care_type==4){
            $this->load->view('frontend/user/details/individual/tutor');
        }
        else if($care_type==5){
            $this->load->view('frontend/user/details/individual/senior_caregiver');
        }
        else if($care_type==6){
            $this->load->view('frontend/user/details/individual/special_needs_caregiver');            
        }
        else if($care_type==7){
            $this->load->view('frontend/user/details/individual/therapist');
        }
        else if($care_type==8){
            $this->load->view('frontend/user/details/individual/cleaning');        
        }
        else if($care_type==9){
            $this->load->view('frontend/user/details/individual/errand_runner');
        }
        else{
            echo "unable to load requested file";
        }
    ?>
<!-- end main-->