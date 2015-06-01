<tr><td>Looking to work as</td>
    <td><?php
        $looking_to_work_in=$_POST['looking_to_work'];
        foreach($looking_to_work_in as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Number of children willing to care for</td>
    <td>
        <?php $no_children= $_POST['number_of_children'];
        if($no_children){
            echo $no_children;
        }

        if(($no_children=='')){
            $optional_number=$_POST['optional_number'];
            foreach($optional_number as $r){
                echo $r.',';
            }
        }
        ?>
    </td>
</tr>
<tr><td>Ages of children willing to care for</td>
    <td><?php
        $age= $_POST['age_group'];
        foreach($age as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Years of experience</td><td><?php echo $_POST['experience'];?></td></tr>
<tr><td>Training</td>
    <td><?php
        $training=$_POST['training'];
        foreach($training as $t){
            echo $t.',';
        }
        ?></td>
</tr>
<tr><td>Rate</td><td><?php
        if($_POST['rate']==''){echo $_POST['rate'];}
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                echo $r.'<br>';
            }
        }
        ?></td></tr>
<tr><td>Availability</td>
    <td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Tell us about yourself</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>
<tr><td>Your references details</td><td><?php echo $_POST['references_details'];?></td></tr>

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

