<div id="profile_image">
	<img style="height:65px; width:65px" src="<?php echo site_url("images/profile-picture/{$data['photo_of_child']}")?>">
</div>

<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;"><?php echo $details['name'] ?> has set a new profile picture:</p>
    </div>
<br />
<div style="font-family:Arial, Helvetica, sans-serif; font-size:15px; margin-bottom:5px;">Approve this submission:</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">To APPROVE: <a href="<?php echo site_url();?>user/approveImage/<?php echo $details['id'];?>/<?php echo $details['email_hash'];?>">Click Here</a></div>

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:15px;">Or to EDIT before approving, login to the admin section.</div>

<div class="container">
    <div class="caregivers-details">
            <div class="profile-img">
                     <img src="<?php echo site_url();?>images/profile-picture/<?php echo $details['profile_picture'];?>">
            </div>
    </div>
</div>

Thanks,
<br />
FrumCare.com
<br />