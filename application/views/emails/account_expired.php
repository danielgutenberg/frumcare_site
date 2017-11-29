<div>
    <p>Hi <?php echo $name; ?>,</p>
    <p>
        Your FrumCare account has been inactive for 90 days. Your account has been made inactive.
    </p>
    <p>
        To reactivate your account <a href="<?php echo base_url('login') ?>">click here</a>
    </p>
    <p>
        Thank you for using FrumCare.com!
    </p>
    <a href="<?php echo site_url("/")?>">
        <img src="<?php echo site_url("img/logo.png")?>">
    </a>
</div>