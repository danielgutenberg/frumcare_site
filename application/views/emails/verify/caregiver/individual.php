<tr><td>Location</td><td><?php echo $location;?></td></tr>
<tr><td>Neighborhood / Street</td><td><?php echo $neighbour;?></td></tr>
<tr><td>Phone</td><td><?php echo $phone;?></td></tr>
<tr><td>Age</td><td><?php echo $age;?></td></tr>
<tr><td>Gender</td><td><?php if($gender=='1'){
            echo 'Male';
        }elseif($gender=='2'){
            echo 'Female';
        }?></td></tr>
<tr><td>Marital status</td><td><?php
        if($marital_status=='1'){
            echo 'Single';
        }elseif($marital_status=='2'){
            echo 'Married';
        }elseif($marital_status=='3'){
            echo 'Divorced';
        }elseif($marital_status=='4') {
            echo 'Widowed';
        }?></td></tr>
<tr><td>Languages Spoken</td><td>
        <?php echo $language; ?>
    </td></tr>
<tr><td>I am a smoker</td><td><?php if($smoker=='1'){ echo 'Yes';}elseif($smoker==2){echo 'No';}elseif($smoker=='3'){echo 'Yes, but not at work';} ?></td></tr>
<tr><td>Level of religious observance</td><td><?php echo $religious_observance;?></td></tr>
<tr><td>Familiar to Jewish</td><td><?php echo $familartojewish;?></td></tr>
<tr><td>Level of education</td><td><?php echo $education_level;?></td></tr>
<tr><td>Educational institutions attended</td><td><?php echo $educational_institution;?></td></tr>
<tr><td>Photo of owner</td><td></td></tr>
