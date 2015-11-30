<?php
    $navigate = $care_type > 16 ? 'jobs' : 'caregivers';
?>
<strong>Hi <?php echo $name; ?>,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">Thank you for joining FrumCare.  Here are some <?php echo $ad; ?> in your area.</p>
    </div>
<br />

<?php $this->load->view('frontend/email/profile_list', array('userdatas'=>$userdatas));?>

<br />
<div style="text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:18px; margin-bottom:5px;"><a href="<?php echo site_url() . $navigate . '/all';?>">Click here</a> to see more ads</div>


Thanks,
<br />
FrumCare.com
<br />

