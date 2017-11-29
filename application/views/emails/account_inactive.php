<div>
    <p>Hi <?php echo $name; ?>,</p>
    <p>
        We've noticed that you haven't been using your FrumCare account lately. Please <a href="<?php echo base_url('login') ?>">login</a> to your account to keep your account active.
    </p>
    <p>
        If you don't log in to your account it will become inactive in <?php echo $days?> days.
    </p>
    <p>
        Thank you
    </p>
    <a href="<?php echo site_url("/")?>">
        <img src="<?php echo site_url("img/logo.png")?>">
    </a>
</div>