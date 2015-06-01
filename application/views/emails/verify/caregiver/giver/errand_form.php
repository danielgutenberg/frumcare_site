<tr><td>Years of experience</td><td><?php
        $exp= $_POST['experience'];
        if($exp==1){
            echo '1 Year';
        }
        if($exp==2){
            echo '2 Years';
        }
        if($exp==3){
            echo '3 Years';

        }
        if($exp==4){
            echo '4 Years';
        }
        if($exp=='5+'){
            echo '5+ Years';
        }
        ?>
    </td></tr>

<tr><td>Rate</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>

<tr><td>Availability</td>
    <td>
        <?php $avai= $_POST['availability'];
        foreach($avai as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>

<tr><td>Tell us about yourself</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>
<tr><td>Your references details</td><td><?php echo $_POST['references_details'];?></td></tr>
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
