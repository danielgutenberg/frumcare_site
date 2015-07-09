<tr><td>Type of Organization</td><td><?php echo $_POST['sub_care'];?></td></tr>
<tr><td>Year established</td><td><?php echo $_POST['established'];?></td></tr>
<tr><td>Certification</td><td><?php echo $_POST['certification'];?></td></tr>
<tr><td>Number of patients / residents</td><td><?php echo $_POST['number_of_children'];?></td></tr>
<tr><td>Number of staff</td><td><?php echo $_POST['number_of_staff'];?></td></tr>
<tr><td>Language Spoken</td><td><?php

        $sp=$_POST['language'];
        foreach($sp as $r){
            echo $r.'<br>';
        }
        ?></td></tr>
<tr><td>Specialize in</td><td><?php

        $sp=$_POST['willing_to_work'];
        foreach($sp as $r){
            echo $r.'<br>';
        }
        ?></td></tr>

<tr><td>Observance in facility</td><td><?php

        $sp=$_POST['extra_field'];
        foreach($sp as $r){
            echo $r.'<br>';
        }
        ?></td></tr>





<tr><td>Cost</td><td><?php echo $_POST['rate'];
        ?></td></tr>
<tr><td>Tell us about your organization / facility / staff</td><td><?php echo $_POST['profile_description'];?></td></tr>
<tr><td>References</td><td><?php echo $_POST['references'];?></td></tr>
<tr><td>Reference File</td><td><?php ?></td></tr>
<tr><td>Photo of Facility / Organization</td><td></td></tr>
<tr><td>Payment Options(specify)</td><td><?php echo $_POST['payment_option'];?></td></tr>
