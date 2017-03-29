<div>
    <p>Hello <?php echo $name; ?>,</p>
    <p>
        <?php echo $user['name']; ?> has invited you to write a revietrx on FrumCare.com. <a class="btn btn-success btn-large" href="<?php echo site_url('jobs/details/' . $user['uri'] . '/' . $user['care_type'])?>">Click here</a> to write a review on <?php echo $user['name']; ?>'s profile
    </p>
    <p>
        Thanks,<br/>FrumCare.com
    </p>
</div>
