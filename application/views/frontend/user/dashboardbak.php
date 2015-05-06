<div class="container">
<?php 
    $user = (get_user(check_user()));
    if($user){
        if($user['account_category'] == 1)
                $category = "caregiver";
            else 
                $category = "careseeker";

        if($user['account_type'] == 1)
               $type = "individual";
            else
                $type = "organization";
    }    
?>
    <div class="dashboard-wrappers">
    <h3>
        Welcome to <span class="dark-blue">Frum</span><span class="light-blue">Care</span><span class="greens">.com</span>
    </h3>
    <?php 
        if(user_flash()){
            echo user_flash();
        }
    ?>
    <?php 
        //echo $this->session->flashdata('msg');
        //echo $this->session->flashdata('success');
          //echo $this->session->flashdata('error');
        ?>

    <p class="style-dashboard">
        <a href="<?php echo base_url();?>user/upload/<?php echo sha1(check_user());?>">Click here</a> to upload your photo

        <br />
        <a href="<?php echo base_url('user/edit/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your profile.

        <br />

        <a href="<?php echo site_url();?>ad/add_step2/<?php echo $category;?>/<?php echo $type;?>/<?php echo sha1(check_user());?>">Click Here</a> to post an ad.

        <br />
        <a href="<?php echo base_url('user/edit_availability_time/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your availability time.

        <br/>

        <a href="<?php echo base_url('user/addrefrences/'.sha1(check_user())) ?>">
            Click Here
        </a> to add your refrences.

        <br />
         <a href="<?php echo base_url('user/addtestimonials/'.sha1(check_user())) ?>">
            Click Here
        </a> to add your testimonials.

        <br />

         <a href="<?php echo base_url('user/delete_account/'.sha1(check_user()));?>">Click Here </a>to delete your account.</a>

         <br />

        <a href="javascript:void(0);" class="verifyphn" id="<?php echo check_user();?>">Click Here</a> to verify your phone number.
        <!-- <a href="<?php echo base_url('user/edit_nutshell/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your nutshell. -->
    </p>
     <div id="smserror"></div>

        <div class="verifications">
            <p>Verifications</p>
                <ul style="list-style-type: none;">
                    <li><label>Basic Background Check</label> <span><img src="<?php echo site_url();?>img/cross.png"></span></li>
                    <li><label>Motor Vehicle Records Check</label> <span><img src="<?php echo site_url();?>img/cross.png"></span></li>
                    <li>
                        <label>Phone number Verification</label> 
                        <?php if($verificationdata['contact_number_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Email address Verification</label>
                        <?php if($verificationdata['email_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Facebook Verification</label>
                        <?php if($verificationdata['facebook_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Twitter Verification</label>
                        <?php if($verificationdata['twitter_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Google+ Verification</label>
                        <?php if($verificationdata['google_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Profile Picture Verification</label>
                         <?php if($verificationdata['profile_picture_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                </ul>   
        </div>
     

</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var user_id = $('.verifyphn').attr('id');
        $('.verifyphn').click(function(){
            $.ajax({
                type:"post",
                url:'<?php echo site_url();?>user/sendsms/',
                data:"user_id="+user_id,
                success:function(done){
                    if(done == 1){
                        window.location.href = "<?php echo site_url();?>user/smsverification/<?php echo sha1(check_user());?>";
                    }
                    if(done == 2){
                        $('#smserror').text('Your phone number is already verified.').show();
                    }
                    if(done == 0){
                         $('#smserror').text('Sorry sms not sent.').show();
                    }
                }
            });
        });
    });
</script>