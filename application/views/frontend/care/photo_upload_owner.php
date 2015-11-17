<?php
$photo_url = site_url("images/plus.png");
if(check_user()) {
    $current_user = get_user(check_user());
    $photo = $current_user['profile_picture'];
    if($photo!="")
        $photo_url = base_url('images/profile-picture/thumb/'.$photo);
}
?>
<div class="upload-photo">
    <h2>Upload owner's photo</h2>
    <input type="hidden" id="file-name1" name="profile_picture_owner" value="<?php if(isset($photo)) echo $photo;?>">
    <div id="output1" style="display: inline-block;"><img src="<?php echo $photo_url?>"></div>
    <label>Browse your computer to select a file to upload</label>
    <a href="#" class="buttons btn-default" id="upload1">Choose File</a>

    <input type="file" name="ImageFile" id="ImageFile1" style="display: none;"> <div class="loader1"></div>
</div>
<p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>

