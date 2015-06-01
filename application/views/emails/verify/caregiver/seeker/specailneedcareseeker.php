<tr><td>Looking to work</td><td><?php $look=$_POST['looking_to_work']; foreach($look as $l){echo $l.'<br>';} ?></td></tr>
<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Age of person requiring care</td>
    <td><?php
        echo $age= $_POST['age'];

        ?></td>
</tr>
<tr><td>Gender of person requiring care</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr><td>Conditions person suffers from</td><td><?php

        $wi=$_POST['willing_to_work'];
        foreach($wi as $w){
            echo $w.'<br>';
        }
        ?></td></tr>


<tr><td>When you need care</td><td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.'<br>';
        }
        ?>
    </td></tr>
<tr><td>Tell us about your need</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>Gender of caregiver</td><td>
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
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Caregiver age from</td><td><?php

        echo $_POST['age_group'];

        ?> </td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Training / Certification required</td><td><?php
        $rate_type=$_POST['training'];
        foreach($rate_type as $r){
           echo $r.'<br>';
        }
        ?></td></tr>
<tr><td>Minimum years of experience</td><td><?php echo $_POST['experience'];?> years</td></tr>
<tr><td>Skills</td><td>
        <?php

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


























<tr><td>Wage</td><td><?php echo $_POST['rate'];?></td></tr>


<tr><td>Gender of tutor wanted</td><td>
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





<tr><td>Training / Certification required</td><td><?php $t=$_POST['training']; foreach($t as $r){echo $r.'<br>';} ?></td></tr>
