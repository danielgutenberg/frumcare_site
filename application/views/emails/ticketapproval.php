<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">A new ticket with following details has been submitted and require your action:</p>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Title: <?php echo $subject;?></div>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Description:<?php echo nl2br($description);?></div>
        <?php if(!empty($file)){?>
            <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">
                File:<a href="<?php echo site_url();?>uploads/files/<?php echo $file;?>">Click here to view/download the file</a>
            </div>
            <?php } ?> 
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Email: <?php echo $email;?></div>
        <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">Contact Number: <?php echo $phone;?></div>
    </div>
<br />
Thanks you,
<br />
FRUMCARE team
<br />

