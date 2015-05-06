<?php
$i = 0;
if($caregiver){
    ?>
    <table class='table'>
    <?php
    foreach($caregiver as $row){
        if(!empty($row['profile_picture'])){
            $pic = $row['profile_picture'];
        }
        else{
            $pic = "no_pic.jpg";
        }
        $src = base_url()."images/profile-picture/thumb/".$pic;
        $care = get_care_detail($row['care_type']);
        ?>
        <tr>
            <td><img src='<?php echo $src ?>' width='90'/> </td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $care['service_name'] ?></td>
            <td><?php echo anchor('user/go_to_profile/'.$row['uri'].'/'.$row['care_type'],'Write review','class="btn btn-info"') ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
}
else{
    echo "No match found";
}
?>