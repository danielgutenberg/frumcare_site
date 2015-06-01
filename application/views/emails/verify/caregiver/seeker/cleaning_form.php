<tr><td>For</td>
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
<tr><td>Number of rooms</td><td><?php echo $_POST['number_of_rooms'];?></td></tr>
<tr><td>Minimum experience</td><td><?php echo $_POST['experience'];?></td></tr>
<tr><td>Must specialize in</td><td>

        <?php

        $willing=$_POST['willing_to_work'];
        foreach($willing as $r){
            echo $r.'<br>';
        }

        ?>

    </td></tr>
<tr><td>When you need help</td>
    <td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Wage</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }

        ?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Gender of helper wanted</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?></td></tr>
<tr><td>Must watch children</td><td><?php if(isset($_POST['watch_children'])){echo 'Yes';}else{echo 'No';}?></td></tr>
<tr><td>Smoking acceptable</td><td><?php $sm=$_POST['smoker']; if($sm==1){echo 'Yes';}else{echo 'No';}?></td></tr>





















<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>


<tr><td>Abilities</td><td>

        <?php if($_POST['driver_license']){
            echo $_POST['driver_license']==1?"I have a driver's license":"";
            echo '<br>';
        }
        if($_POST['vehicle']){
            echo $_POST['vehicle']==1?'I have a vehicle':'';
            echo '<br>';
        }

        if($_POST['on_short_notice']){
            echo $_POST['on_short_notice']==1?'Available on short notice':'';
            echo '<br>';
        }
        ?>
    </td></tr>

