<?php 
    if ( $care_type < 24 ) { ?>
    <h2>Organization info</h2>
        
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
        if(!empty($neighbour)){?>
        <tr>
            <td>Neighborhood / Street</td>
            <td>
                <?php echo $neighbour;?>
            </td>    
        </tr>
        <?php }
        else{ ?>
            <tr>
            <td>Neighborhood / Street</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        }
        
       /* if(!empty($zip)){?>
        <tr>
            <td>Zip</td>
            <td><?php echo $zip;?> </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
            <td>Zip</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        } */

        if(!empty($name_of_owner)){?>
        <tr>
            <td>Name of owner / operator</td>
            <td class="form-field">
                <?php echo $name_of_owner; ?>
            </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
            <td>Name of owner / operator</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        }
        
        if(!empty($age)){?>

        <tr>
            <td>Age of owner / operator</td>
            <td class="form-field">
             12 <?php echo $age; ?>    
         </td>
     </tr>
     <?php }
     else{ ?>
            <tr>
            <td>Age of owner / operator</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        }
        
     if(!empty($gender)){?>
     <tr>
        <td>Gender</td>
        <td class="form-field">
            <?php echo $gender==1?"Male":"Female"; ?>
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
            <td>Gender</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        }
        
    if(!empty($religious_observance)){?>
    <tr> 
        <td>Level of religious observance</td>
        <td class="form-field">
            <?php echo $religious_observance?>
        </td>
    </tr>
    <?php }
    else{ ?>
            <tr>
            <td>Level of religious observance</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        } ?>
    <tr>
        <td>Photo of owner / operator</td>
        <td>
            <?php $photo = !empty($profile_picture_owner)?"images/profile-picture/thumb/".$profile_picture_owner:"images/no-image.jpg"; ?>
            <img  src="<?php echo site_url().$photo; ?>"/>
        </td>
    </tr>
</table>
</div>
<?php } else { ?>

<h2>Organization info</h2>
        
         <div class="table-responsive">
        <table class="table table-striped borderbottom">
        
        <tr>
                    <td>Name of Organization</td>
                    <td>
                        <?php echo $organiztion_name ? ucfirst($organiztion_name) : 'N/A'; ?>
                    </td>
                </tr>
        
        <tr>
                    <td>Type of Organization</td>
                    <td>
                        <?php echo $organiztion_type ? ucfirst($organiztion_type) : 'N/A'; ?>
                    </td>
                </tr>
        
        
        
        
        
        
        
        <?php if(!empty($name_of_owner)){?>
        <tr>
            <td>Contact name</td>
            <td class="form-field">
                <?php echo $name_of_owner; ?>
            </td>
        </tr>
        <?php }
        else{ ?>
            <tr>
            <td>Contact name</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        } ?>
        
        <?php if(!empty($location)){?>
        <tr>
            <td>Location</td>
            <td id="locationField">
                <?php echo $location;?>
            </td>    
        </tr>
        <?php }
        if(!empty($neighbour)){?>
        <tr>
            <td>Neighborhood / Street</td>
            <td>
                <?php echo $neighbour;?>
            </td>    
        </tr>
        <?php }
        else{ ?>
            <tr>
            <td>Neighborhood / Street</td>
            <td>
                N/A
            </td>    
        </tr>
        <?php
        } ?>
        
</table>
</div>







<?php }
    if ( $care_type > 24 ) { ?>
        <h2>Job Details</h2> <?php 
    }
    else { ?>
        <h2>Organization Details</h2> 
            <?php      
    } 
    
    $d=array('care_type'=>$care_type,'sub_care'=>$sub_care);
if($care_type==10){
    $this->load->view('frontend/user/details/organizations/daycarecenter',$d);
}
else if($care_type==13){
    $this->load->view('frontend/user/details/organizations/senior_care_agency',$d);
}
else if($care_type==14){
    $this->load->view('frontend/user/details/organizations/special_needs_center');
}
else if($care_type==15){
    $this->load->view('frontend/user/details/organizations/cleaning_company_caregiver');
}
else if($care_type==16){
    $this->load->view('frontend/user/details/organizations/senior_care_center',$d);    
}
else if($care_type==25){
    $this->load->view('frontend/user/details/organizations/child_care_facility');
}
else if($care_type==26){
    $this->load->view('frontend/user/details/organizations/senior_care_facility');            
}
else if($care_type==27){
    $this->load->view('frontend/user/details/organizations/special_needs_facility');
}       
else if($care_type == 28){
    $this->load->view('frontend/user/details/organizations/cleaning_company_careseeker');
}
else{
    show_404();
}
?>
