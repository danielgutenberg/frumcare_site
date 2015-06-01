<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Description of job</td><td><?php echo $_POST['job_description'];?></td></tr>
<tr><td>Wage</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>
<tr><td>When you need help</td>
    <td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>
<tr><td>Tell us about your needs</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Gender wanted</td><td>
        <?php

        $ge=$_POST['gender_of_caregiver'];
        if($ge==1){
            echo 'Male';
        }elseif($ge==2){
            echo 'Female';
        }else{
            echo 'Both';
        }

        ?>
    </td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Minimum years of experience</td><td><?php echo $_POST['experience'];?> years</td></tr>

<tr><td>Abilities</td><td>

        <?php if($_POST['driver_license']){
            echo $_POST['driver_license']==1?"I have a driver's license":"";
            echo '<br>';
        }
        if($_POST['vehicle']){
            echo $_POST['vehicle']==1?'I have a vehicle':'';
            echo '<br>';
        }


        ?>
    </td></tr>
