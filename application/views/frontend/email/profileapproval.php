<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">A new profile with following details has been submitted and require your action:</p>
    </div>
<br />
<div style="font-family:Arial, Helvetica, sans-serif; font-size:15px; margin-bottom:5px;">Approve this submission:</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">To APPROVE: <a href="<?php echo site_url();?>ad/approveAd/<?php echo $recordData['user_id'];?>/<?php echo $recordData['care_type'] . '/' . $hash;?>">Click Here</a></div>

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:15px;">Or to EDIT before approving, login to the admin section.</div>

<div class="container">
    <div class="caregivers-details">
        <h3>
            <?php 
                $type = Caretype_model::getCareTypeById($recordData['care_type']);
                echo $type[0]['service_name'];
                if($recordData['care_type'] > 16) {
                echo " Job";
        }
        ?>
        </h3>
        <div class="left-sidebar-details">
            <div class="profile-img">
                <?php if($recordData['profile_picture']!= '' && file_exists('images/profile-picture/'.$recordData['profile_picture'])):?>
                     <img src="<?php echo site_url();?>images/profile-picture/<?php echo $recordData['profile_picture'];?>">
                <?php else:?>
                     <img src="<?php echo site_url("images/no-image.jpg")?>">
                <?php endif;?>
            </div>
            <div class="clearfix"></div>
            <br/>
            <div class="meet-caregivers-clients">
                   <?php if($this->uri->segment(4) < 11 || ($this->uri->segment(4)>16 && $this->uri->segment(4) < 24)){ ?>
                   <h2> Meet 
                        <?php echo $recordData['name'];?>
                    </h2>
                    <?php 
                    }
                    else{ ?>
                    <h2> Job description</h2> 
                    <?php
                }?>
                <br />
                <p>
                    <?php 
                    if(!empty($recordData['profile_description'])){
                        echo nl2br($recordData['profile_description']);
                    }
                    else{
                        echo "Description not available";   
                    }
                    ?>	
                </p>
            </div>        
            <?php 
            if($recordData['care_type'] < 11){?>
            <div >                        
                <?php $this->load->view('frontend/user/details/individual_caregiver',$recordData)?>
            </div>
            <?php
            }?>
            <?php 
            if(($recordData['care_type'] > 10 && $recordData['care_type'] < 17 ) || ($recordData['care_type'] > 24)){ ?>
            <div>                    
                <?php $this->load->view('frontend/user/details/organizations',$recordData) ?>
            </div>
            <?php            
            }
            if($recordData['care_type'] < 25 && $recordData['care_type'] > 16 ){ ?>
            <div>                    
                <?php $this->load->view('frontend/user/details/job_posters',$recordData)?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

Thanks,
<br />
FrumCare.com
<br />

