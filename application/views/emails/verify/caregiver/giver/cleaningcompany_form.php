<tr><td>We clean</td><td><?php $work= $_POST['looking_to_work'];
        foreach($work as $w){
            echo $w.'<br>';
        }
        ?></td></tr>
<tr><td>Specialize in</td><td><?php

        $sp=$_POST['willing_to_work'];
        foreach($sp as $r){
            echo $r.'<br>';
        }
        ?></td></tr>
<tr><td>Days / Hours</td><td> Days:<?php echo $_POST['days_to'];?> Hours: <?php echo $_POST['hours_to'];?><br> <?php if($_POST['flexible_hours']==1){ echo 'Flexible Hours';}?></td></tr>
<tr><td>Rate</td><td><?php echo $_POST['rate']; if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>
<tr><td>Tell us about your organization</td><td><?php echo $_POST['profile_description'];?></td></tr>
