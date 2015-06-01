<tr><td>Type of Organization</td><td><?php echo $_POST['sub_care'];?></td></tr>
<tr><td>For</td><td><?php $work= $_POST['looking_to_work'];
        foreach($work as $r){
            echo $work.'<br>';
        }
        ?></td></tr>
<tr><td>Year established</td><td><?php echo $_POST['established'];?></td></tr>
<tr><td>Certification</td><td><?php echo $_POST['certification'];?></td></tr>
<tr><td>Age group</td><td><?php $age= $_POST['age'];
        foreach($age as $a){
            echo $a.'<br>';
        }
        ?></td></tr>
<tr><td>Languages Spoken</td><td>
        <?php $lang=$_POST['language'];
            foreach($lang as $l){
                echo $l.'<br>';
            }
        ?>
    </td></tr>

<tr><td>Number of children in group</td><td>
        <?php echo $_POST['number_of_children'];?>
    </td></tr>
<tr><td>Number of staff</td><td><?php echo $_POST['number_of_staff'];?></td></tr>
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
<tr><td>Upload photo of facility / organization</td><td></td></tr>


<tr><td>Tell us about your organization / facilities / activities</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>

<tr><td>Cost</td><td><?php echo $_POST['cost']; ?>
    </td></tr>
