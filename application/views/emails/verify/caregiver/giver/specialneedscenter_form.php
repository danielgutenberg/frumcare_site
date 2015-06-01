<tr><td>Year Established</td>
    <td><?php
        echo $_POST['established'];
        ?></td>
</tr>
<tr><td>Certification</td><td><?php echo $_POST['certification'];?></td></tr>
<tr><td>Languages Spoken</td><td>
        <?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }

        ?>

    </td></tr>
<tr><td>Specialize in</td>
    <td><?php
        $looking_to_work_in=$_POST['willing_to_work'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>
<tr><td>Observance in facility</td><td>
        <?php
        $looking_to_work_in=$_POST['extra_field'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?>
    </td></tr>
<tr><td>Number of patients</td><td><?php echo $_POST['number_of_children'];?></td></tr>
<tr><td>Number of staff</td><td><?php echo $_POST['number_of_staff'];?></td></tr>

<tr><td>Cost</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>

<tr><td>Tell us about your organization / facilities / staff</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Photo of Facility / Organization</td><td></td></tr>
<tr><td></td>Payment Options(specify)<td><?php echo $_POST['payment_option'];?></td></tr>
