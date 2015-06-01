<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Ages of patient</td>
    <td><?php
        echo $age= $_POST['age_group'];

        ?></td>
</tr>
<tr><td>Gender of patient</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr><td>Condition(s) of patient (Specify)</td><td>
        <?php

        echo $_POST['conditions_of_patient'];

        ?>
    </td></tr>
<tr><td>Type of Therapist</td><td><?php echo $_POST['type_of_therapy'];?></td></tr>
<tr><td>Tell us about yourself</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Gender of therapist</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
