<div>
    <p>Hello <?php echo $name; ?>,</p>
    <p>
        <?php echo $user['name']; ?> has invited you to write a review. Click here to write a review on <?php echo $user['name']; ?> 's profile
    </p>
    <p>
        <a class="btn btn-success btn-large" href="<?php echo site_url('jobs/details/' . $user['uri'] . '/' . $user['care_type'])?>">Write a Review</a>
    </p>
    <p>
        Thanks,<br/>FrumCare.com
    </p>
</div>
