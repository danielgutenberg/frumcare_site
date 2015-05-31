<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
	<div class="container">
	<?php echo $this->breadcrumbs->show();?>
		<div class="dashboard-left float-left">
			 <?php $this->load->view('frontend/user/dashboard_nav');?>
		</div>

		<div class="dashboard-right float-right">

			<div class="top-welcome">
				<h2>My Background Checks</h2>
			</div>

            <a href="javascript:void(0);" class="verifyphn" id="<?php echo check_user();?>">Click Here</a> to verify your phone number.

            <div id="smserror"></div>

             <div class="verifications">
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
                    if(done == 0){
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