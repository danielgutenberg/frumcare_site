<tr><td>Name of Organization</td><td><?php echo $_POST['organization_name'];?></td></tr>
<tr><td>Contact Name</td><td><?php echo $_POST['first_name'];?></td></tr>
<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>
<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Position you are looking to fill</td><td><?php echo $_POST['job_position'];?></td></tr>
<tr><td>Wage</td><td><?php echo $_POST['rate'];?><?php if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        } ?></td></tr>
<tr><td>Job Type</td><td>
        <?php

        foreach($_POST['availability'] as $r){
            echo $r.'<br>';
        }

        ?>
    </td></tr>

<tr><td>Days / Hours</td><td>
        <?php
        echo $_POST['sunday_from'];?>
        to
        <?php echo $_POST['sunday_to'];?><br>
        <?php echo $_POST['mid_days_from']?> to <?php echo $_POST['mid_days_to'];?>
        <br>
        <?php echo $_POST['friday_from'];?> to <?php echo $_POST['friday_to'];?>

        <br>


    </td></tr>
<tr><td>Details</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Minimum experience</td><td><?php echo $_POST['experience'];?> years</td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Familiar with Jewish</td><td><?php if($_POST['familarwithjewish']){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>







<tr><td>We clean</td><td><?php $work= $_POST['first_name'];
        foreach($work as $w){
            echo $w.'<br>';
        }
        ?></td></tr>
<tr><td>Specialize in</td><td><?php

        $sp=$_POST['willing_to_work'];
        foreach($sp as $r){
            echo $r.'<br>';
        }
        ?></td></tr>
<tr><td>Days / Hours</td><td> Days:<?php echo $_POST['days_to'];?> Hours: <?php echo $_POST['hours_to'];?><br> <?php if($_POST['flexible_hours']==1){ echo 'Flexible Hours';}?></td></tr>
<tr><td>Rate</td><td><?php echo $_POST['rate']; if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>
<tr><td>Tell us about your organization</td><td><?php echo $_POST['profile_description'];?></td></tr>
