<tr><td>Type of Therapy</td><td><?php echo $_POST['type_of_therapy'];?></td></tr>
<tr><td>Looking to work in</td>
    <td><?php
        $looking_to_work_in=$_POST['looking_to_work'];
        foreach($looking_to_work_in as $r){
            echo $r.'<br>';
        }
        ?></td>
</tr>
<tr><td>Years of Practice</td><td><?php
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
<tr><td>Certification / License information</td>
    <td><?php
        echo $training=$_POST['certification'];

        ?></td>


</tr>
<tr><td>Rate</td><td><?php echo $_POST['rate'];
        if(count($_POST['rate_type'])>0){
            foreach($_POST['rate_type'] as $r){
                if($r==2){
                    echo 'Monthly Rate Available';
                }
            }
        }
        ?></td></tr>
<tr><td>Accepts insurance</td><td><td><?php
        $as=$_POST['accept_insurance'];
        if($as=='1'){
            echo 'Yes';
        }else{
            echo 'No';
        }
        ?></td></td></tr>
<tr><td>Payment Options(specify)</td><td><?php echo $_POST['payment_option'];?></td></tr>
<tr><td>Tell us about yourself</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php if($_POST['references']==1){ echo 'Yes';} else {echo 'No';}?></td></tr>
<tr><td>Reference File</td><td></td></tr>
<tr><td>Your references details</td><td><?php echo $_POST['references_details'];?></td></tr>
