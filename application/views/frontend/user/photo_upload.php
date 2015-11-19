<?php
$photo_url = site_url("images/plus.png");
$pic = false;
if(check_user()) {
    $current_user = get_user(check_user());
    $photo = $current_user['profile_picture'];
    if($photo!="")
        $pic = true;
        $photo_url = base_url('images/profile-picture/thumb/'.$photo);
}
?>
<div class="upload-photo">
    <div id="output1" style="margin-bottom: 20px"><img src="<?php echo $photo_url?>"></div>
    <?php if ($photo_url != site_url("images/plus.png")) { ?>
        <a class="buttons btn-default" href="#" id="remove" onclick="return removePics();" style="margin:0 10px;">Remove File</a>
    <?php } ?>
        <button class="btn btn-default" id="upload1"<?php if($pic) { echo 'style="display:none"';}?> >Select File</button>
        <input type="file" name="ImageFile" id="ImageFile1" style="display: none;"> <div class="loader"></div>
    
</div>

