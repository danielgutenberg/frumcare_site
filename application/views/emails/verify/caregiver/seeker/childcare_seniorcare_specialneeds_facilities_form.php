<tr><td>Name of organization</td>
    <td><?php
       echo $_POST['organization_name'];
        ?></td>
</tr>
<tr><td>Type of Organization</td><td><?php echo $_POST['organization_type'];?></td></tr>
<tr><td>Contact name</td><td><?php echo $name;?></td><td><?php echo $_POST['name'];?></td></tr>








<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Position you are looking to fill</td><td><?php echo $_POST['job_position'];?></td></tr>
<tr><td>Wage</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>

<tr><td>Job Type</td><td><?php foreach($_POST['job_type'] as $r){
            echo $r.'<br>';
        } ?></td></tr>

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
<tr><td>Availability</td><td><?php foreach($_POST['availability'] as $r){
            echo $r.'<br>';
        }?></td></tr>


<tr><td>Details</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Must have following Training / Certification</td><td><?php

        foreach($_POST['training'] as $r){
            echo $r.'<br>';
        }
        ?></td></tr>

<tr><td>Minimum experience</td><td><?php echo $_POST['experience'];?> years</td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Familiar with Jewish</td><td><?php if($_POST['familarwithjewish']){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Photo of Facility / Organization</td><td></td></tr>
