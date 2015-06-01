<tr><td>Year Established</td><td><?php echo $_POST['established'];?></td></tr>
<tr><td>Certification</td><td><?php echo $_POST['certification'];?></td></tr>
<tr><td>Specialize in</td><td>

        <?php

        $willing=$_POST['willing_to_work'];
        foreach($willing as $r){
            echo $r.'<br>';
        }

        ?>

    </td></tr>
<tr><td>Cost</td><td><?php echo $_POST['rate'];?></td></tr>
<tr><td>Tell us about your organization</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>


<tr><td>Payment Options(specify)</td><td>

        <?php echo $_POST['payment_option'];?>
    </td></tr>

