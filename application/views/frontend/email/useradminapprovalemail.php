<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">A new user profile has been registered and require your action:</p>
    </div>
<br />

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Name: <?php echo $name;?></div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Email: <?php echo $email;?></div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Account Type:
    <?php 
        if($account_type == 1)
            echo 'Caregiver';
        if($account_type == 2)
            echo 'Parent';
        if($account_type == 3)
            echo 'Organization';
        ?>
</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Link:<a href="<?php echo site_url();?>admin/user/view/<?php echo $id;?>">Click Here</a>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:15px; margin-bottom:5px;">Approve this submission:</div>
<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">To APPROVE: <a href="<?php echo base_url('signup/userconfirm/'.$hash) ?>">Click Here</a></div>

<div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:15px;">Or to EDIT before approving, login to the admin section.</div>

Thank you,
<br />
FRUMCARE team
<br />

