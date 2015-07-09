<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Approval</title>
</head>
<body>


<table>
    <tr><td colspan="2"><h2>Personal Details</h2></td></tr>
    <tr>
        <td>Location</td><td><?php echo $location;?></td>

    </tr>
    <tr><td>Neighborhood / Street</td><td><?php echo $neighborhood;?></td></tr>
    <tr><td>Phone</td><td><?php echo $phone;?></td></tr>
    <tr><td>Age</td><td><?php echo $age;?></td></tr>
    <tr><td>Gender</td><td><?php echo $gender;?></td></tr>
    <tr><td>Marital Status</td><td><?php echo $marital_status;?></td></tr>
    <tr><td>Language Spoken</td><td><?php echo $language_spoken;?></td></tr>
    <tr><td>I am a smoker</td><td><?php echo $smoker;?></td></tr>
    <tr><td>Level of religious observance</td><td><?php echo $level_of_rel;?></td></tr>
    <tr><td>Level of education</td><td><?php echo $level_of_edu;?></td></tr>
    <tr><td>Educational institutions attended</td><td><?php echo $educational;?></td></tr>
    <tr><td>Photo</td><td><?php echo $photo?'<img src="'.site_url().'uploads/files/'.$photo.'">':'';?></td></tr>
    <tr><td colspan="2"><h2>Job Details</h2></td></tr>
    <tr><td>Looking to work in</td><td><?php echo $looking_to_work;?></td></tr>
    <tr><td>Number of children willing to care for</td><td><?php echo $number_of_children;?></td></tr>
    <tr><td>Ages of children willing to care for</td><td><?php echo $age_of_children;?></td></tr>
    <tr><td>Years of experience</td><td><?php echo $years_of_exp;?></td></tr>
    <tr><td>Training</td><td><?php echo $training;?></td></tr>
    <tr><td>Rate</td><td><?php echo $rate;?></td></tr>
    <tr><td>Availability</td><td><?php echo $availability;?></td></tr>
    <tr><td>Tell us about yourself</td><td><?php echo $tell_us_about_yourself;?></td></tr>
    <tr><td>References</td><td><?php echo $references;?></td></tr>
    <tr><td>Abilities and Skills</td><?php echo $ability_skills;?></tr>
    <tr><td>Approve Advertisement</td><td><a href="<?php echo site_url('ad/approveAd/'.$id);?>">Approve</a></td></tr>

</table>


</body>
</html>
