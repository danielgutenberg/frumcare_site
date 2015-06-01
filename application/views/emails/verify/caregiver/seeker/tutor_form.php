<tr><td>Location</td><td><?php echo $_POST['location'];?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $_POST['neighbour'];?></td></tr>

<tr><td>Phone</td><td><?php echo $_POST['contact_number'];?></td></tr>
<tr><td>Ages of student</td>
    <td><?php
        echo $age= $_POST['age'];

        ?></td>
</tr>
<tr><td>Gender of children</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>

    <td><?php
        $looking_to_work_in=$_POST['subjects'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>
<tr><td>Looking for help in the following subject(s):</td><td>

        <?php $sub=$_POST['subjects'];
        foreach($sub as $s){
            echo $s.'<br>';
        }
        ?>
    </td></tr>
<tr><td>When you need lessons</td><td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.'<br>';
        }
        ?>
    </td></tr>
<tr><td>Wage</td><td><?php echo $_POST['rate'];?></td></tr>
<tr><td>Rate Type</td><td><?php
        $rate_type=$_POST['rate_type'];
        foreach($rate_type as $r){
            if($r==2){
                echo 'Monthly Rate Available'.'<br>';
            }
        }
        ?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
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

<tr><td>Age of Tutor wanted</td><td><?php

        echo $_POST['caregiverage_from'];

        ?> To <?php echo $_POST['caregiverage_to'];?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Minimum years of experience</td><td><?php echo $_POST['experience'];?> years</td></tr>
<tr><td>Training / Certification required</td><td><?php $t=$_POST['training']; foreach($t as $r){echo $r.'<br>';} ?></td></tr>
