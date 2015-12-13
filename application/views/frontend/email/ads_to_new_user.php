<?php
    $navigate = $care_type > 16 ? 'jobs' : 'caregivers';
?>
<strong>Hi <?php echo ucfirst($name); ?>,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">Thank you for joining FrumCare.com! Here are some <?php echo $ad; ?> on our site that meet your search criteria.</p>
    </div>
<br />

<?php $this->load->view('frontend/email/profile_list', array('userdatas'=>$userdatas));?>

<br />
<div style="text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:18px; margin-bottom:5px;">
    <a href="<?php echo site_url() . $navigate . '/' . $care_name . '?location=' . $location['place'] . '&lat=' . $location['lat'] . '&lng=' . $location['lng'];?>">Click here</a> to see more <?php echo $ad; ?>
</div>
<div style="text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:18px; margin-bottom:5px;">
    <a href="<?php echo site_url() . 'user/searches' ?>">Click here </a>to modify your search
</div>

Thanks,
<br />
FrumCare.com
<br />

