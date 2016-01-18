<div class="container">
    <div class="sign_up_successful">
    <h2 style="text-align:center">Welcome To The FrumCare Family!</h2> 
    <!--<p>Your account has been successfully created. We need to verify your email. Please press on the link in the email we sent you.</p>-->
    <!--<p>You entered with <?php echo $user[0]['email'] ?></p>-->
    <!--<p><a href="">Click Here</a> to resend the email.</p>-->
    <p><?php             
            if(is_array($redirectData)){
                if($redirectData['care_type'] > 24)
                    $link = site_url()."ad/job/organizations/".$redirectData['care_type'];
                else
                    $link = site_url().'ad/add_step2/'.$redirectData['account_cat'].'/'.$redirectData['account_type'].'/'.$this->session->userdata('log_id').'/'.$redirectData['care_type'];                
            }                
            else
                $link = site_url().'user/profile';
            $searchlink = $redirectData['care_type'] > 16 ? 'caregivers/all' : 'jobs/all';
            $care = $redirectData['care_type'] > 16 ? 'Caregivers' : 'Jobs';
            $create = $redirectData['care_type'] > 16 ? 'Post a Job' : 'Create a Profile';
        
        
        ?>
        
        
        </p>
    <p style="text-align:center"><a href="<?php echo $link;?>">Click here</a> to <?php echo $create; ?></p>
    <p style="text-align:center"><a href="<?php echo base_url($searchlink);?>">Click here</a> to Search <?php echo $care; ?> in your area</p> 
    <p style="text-align:center"><a href="<?php echo base_url('user/dashboard') ?>">Click Here</a> to see your account dashboard.</p>
    </div>
</div>
