<?php
    $navigate = $recordData['care_type']>16?'jobs':'caregivers';
?>
<strong>Hi There,</strong>
<br />
    <div style="margin:0; padding:0;">
        <p style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:20px;">A new profile with following details that match your search request has been submitted</p>
    </div>
    <div style="font-family:Arial, Helvetica, sans-serif; font-size:13px; margin-bottom:5px;">To view full ad on the website <a href="<?php echo site_url().$navigate; ?>/details/<?php echo $recordData['uri'];?>/<?php echo $recordData['care_type'];?>">Click Here</a></div>
<br />

<?php $this->load->view('frontend/email/profile_list', array('userdatas'=>[0 =>$recordData]));?>

Thanks,
<br />
FrumCare.com
<br />
 
 <br />
 The email is auto generated by frumcare.com website.
