<div>
    <p>Hi <?php echo $name; ?>,</p>
    <p>
        Thank you for joining FrumCare.com! To finish signing up, click the link below and confirm your email.
    </p>
    <p>
        <a class="btn btn-success btn-large" href="<?php echo base_url('signup/confirm/'.$hash) ?>">Confirm Email</a>
    </p>
    <p>
        Thanks,<br/>FrumCare.com
    </p>
</div>