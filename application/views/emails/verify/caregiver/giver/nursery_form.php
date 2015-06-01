<tr><td>For</td>
    <td><?php
        $looking_to_work_in=$_POST['looking_to_work'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>

<tr><td>Age Group</td>
    <td><?php
        $age= $_POST['age_group'];
        foreach($age as $r){
            echo $r.',';
        }
        ?></td>
</tr>
<tr><td>Number of children in group</td>
    <td>
        <?php $no_children= $_POST['number_of_children'];
        if($no_children){
            echo $no_children;
        }


        ?>
    </td>
</tr>
<tr><td>Number of staff</td><td><?php echo $_POST['number_of_staff'];?></td></tr>
<tr><td>Training</td>
    <td><?php
        $training=$_POST['training'];
        foreach($training as $t){
            echo $t.'<br>';
        }
        ?></td>
</tr>

<tr><td>Years of experience</td><td><?php echo $_POST['experience'];?></td></tr>

<tr><td>Cost</td><td><?php echo $_POST['rate'];?></td></tr>
<tr><td>Days / Hours</td><td>

        <?php

        if($_POST['sunday_from']){
            echo $_POST['sunday_from'];
            echo '&nbsp; to &nbsp;';
        }
        if($_POST['sunday_to']){
            echo $_POST['sunday_to'];
        }

        echo '<br>';

        if($_POST['mid_days_from']){
            echo $_POST['mid_days_from'].'&nbsp; To &nbsp;';
        }
        if($_POST['mid_days_to']){
            echo $_POST['mid_days_to'];
        }

        echo '<br>';
        if($_POST['friday_from']){
            echo $_POST['friday_from'].'&nbsp; To &nbsp;';
        }
        if($_POST['friday_to']){
            echo $_POST['friday_to'];
        }
        echo '<br>';

        if($_POST['extended_hrs_available']==1){
            echo 'Extended Hours Available';
        }

        echo '<br>';
        if($_POST['flexible_hours']==1){
            echo 'Flexible Hours';
        }

        ?>


    </td></tr>

<tr><td>Vacation Days (Please specify vacation days)</td><td><?php echo $_POST['vacation_days'];?></td></tr>

<tr><td>Tell us about yourself</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>



