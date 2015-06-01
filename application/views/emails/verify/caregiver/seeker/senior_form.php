<tr><td>Looking for</td>
    <td><?php
        $looking_to_work_in=$_POST['looking_to_work'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>
<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Ages of senior</td>
    <td><?php
        echo $age= $_POST['age'];

        ?></td>
</tr>
<tr><td>Gender of senior</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr>
<td><?php
    $looking_to_work_in=$_POST['subjects'];
    foreach($looking_to_work_in as $r){
        echo $r.'<br>';
    }
    ?></td>
</tr>
<tr><td>Conditions senior suffers from</td><td>
        <?php foreach($_POST['willing_to_work'] as $r){
            echo $r.'<br>';
        }?> </td></tr>
<tr><td>When you need care</td>
    <td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Tell us about your needs</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Gender of caregiver</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Age of Caregiver wanted</td><td><?php

        echo $_POST['caregiverage_from'];

        ?> To <?php echo $_POST['caregiverage_to'];?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Training required</td><td><?php $t=$_POST['training']; foreach($t as $r){echo $r.'<br>';} ?></td></tr>
<tr><td>Minimum experience</td><td><?php echo $_POST['experience'];?> years</td></tr>

<tr><td>Abilities</td><td>

        <?php if($_POST['driver_license']){
            echo $_POST['driver_license']==1?"I have a driver's license":"";
            echo '<br>';
        }
        if($_POST['vehicle']){
            echo $_POST['vehicle']==1?'I have a vehicle':'';
            echo '<br>';
        }

        if($_POST['cook']){
            echo $_POST['cook']==1?'Must be able to cook / serve meals':'';
            echo '<br>';
        }
        if($_POST['basic_housework']){
            echo $_POST['basic_housework']==1?'Must be able to do light housework / cleaning':'';
            echo '<br>';
        }

        if($_POST['personal_hygiene']){
            echo $_POST['personal_hygiene']==1?'Must be able to deal with personal hygiene of senior':'';
            echo '<br>';
        }
        ?>
    </td></tr>

