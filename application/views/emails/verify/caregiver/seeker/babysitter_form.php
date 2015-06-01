<tr><td>Looking to care in</td>
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
<tr><td>Number of children </td>
    <td>
        <?php $no_children= $_POST['number_of_children'];
        if($no_children){
            echo $no_children;
        }

        if(($no_children=='')){
            $optional_number=$_POST['optional_number'];
            foreach($optional_number as $r){
                echo $r.'<br>';
            }
        }
        ?>
    </td>
</tr>
<tr><td>Gender of children</td><td><?php $gender=$_POST['gender']; if($gender==1){echo 'Male';} elseif($gender==2){echo 'Female';} else{echo 'Both';} ?></td></tr>
<tr><td>Ages of children</td>
    <td><?php
        $age= $_POST['age_group'];
        foreach($age as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>When you need care</td><td>

        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.'<br>';
        }
        ?>

    </td></tr>
<tr><td>Level of observance necessary</td><td><?php echo $_POST['religious_observance'];?> <?php if($_POST['familarwithjewish']){echo 'Familiar with Jewish Tradition';}?></td></tr>
<tr><td>Caregiver age</td><td>
        <?php
        echo $_POST['caregiverage_from'];
        echo 'To';
        echo $_POST['caregiverage_to'];
        ?>
    </td></tr>

<tr><td>Wage</td><td><?php echo $_POST['rate'];?> <?php if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        } ?></td></tr>





<tr><td>Tell us about your needs</td><td><?php echo $_POST['profile_description'];?></td></tr>

<tr><td>Smoker</td><td><?php $sm=$_POST['smoker']; if($sm==1){ echo 'Yes';}else{echo 'No';} ?></td></tr>
<tr><td>Languages necessary</td><td><?php $lang=$_POST['language'];
        foreach($lang as $l){
            echo $l.'<br>';
        }
        ?></td></tr>
<tr><td>Training necessary</td><td><?php $tra=$_POST['training'];
        foreach($tra as $r){
            echo $r.'<br>';
        }
        ?></td></tr>
<tr><td>Minimum experience</td><td><?php echo $_POST['experience'];?>Years</td></tr>


<tr><td>Abilities and skills</td><td>

        <?php if($_POST['driver_license']){
            echo $_POST['driver_license']==1?"I have a driver's license":"";
            echo '<br>';
        }
        if($_POST['vehicle']){
            echo $_POST['vehicle']==1?'I have a vehicle':'';
            echo '<br>';
        }
        if($_POST['pick_up_child']){
            echo $_POST['pick_up_child']==1?'Able to pick up kids from school':'';
            echo '<br>';
        }
        if($_POST['cook']){
            echo $_POST['cook']==1?'Able to cook and prepare food':'';
            echo '<br>';
        }
        if($_POST['basic_housework']){
            echo $_POST['basic_housework']==1?'Able to do light housework / cleaning ':'';
            echo '<br>';
        }
        if($_POST['homework_help']){
            echo $_POST['homework_help']==1?'Able to help with homework ':'';
            echo '<br>';
        }
        if($_POST['sick_child_car']){
            echo $_POST['sick_child_care']==1?'Able to care for sick child ':'';
            echo '<br>';
        }
        if($_POST['on_short_notice']){
            echo $_POST['on_short_notice']==1?'Available on short notice':'';
            echo '<br>';
        }
        ?>
    </td></tr>
<tr><td>Photo of child / children</td><td></td></tr>

