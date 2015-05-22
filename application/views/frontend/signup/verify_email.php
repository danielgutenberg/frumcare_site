<div class="container">
    <div class="sign_up_successful">
    <h2>Welcome to the Frumcare Family!</h2> 
    <p>Your account has been successfully created. We need to verify your email. Please press on the link in the email we sent you.</p>
    <p>You entered <?php echo $user['email'] ?></p>
    <p><a href="">Click Here</a> to resend the email.</p>
    <p><?php             
            if(is_array($redirectData)){
                if($redirectData['care_type'] > 24)
                    $link = site_url()."ad/job/organizations/".$redirectData['care_type'];
                else
                    $link = site_url().'ad/add_step2/'.$redirectData['account_cat'].'/'.$redirectData['account_type'].'/'.$this->session->userdata('log_id').'/'.$redirectData['care_type'];                
            }                
            else
                $link = site_url().'user/profile';
        ?></p>
    <p><a href="<?php echo $link;?>">Click Here</a> to post an ad.</p>
    <p><a href="<?php echo base_url('user/edit/'.sha1(check_user())) ?>">Click Here</a> to update your email.</p>
    <p>Thanks!</p>
    </div>
</div>
