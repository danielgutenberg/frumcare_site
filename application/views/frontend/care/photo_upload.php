<?php
$photo_url = site_url("images/plus.png");
if(check_user()) {
    $current_user = get_user(check_user());
    $photo = $current_user['profile_picture'];
    if($photo!="")
        $photo_url = base_url('images/profile-picture/thumb/'.$photo);
}
if ($upload_title) {
    $title = $upload_title;
} else {
    $title = 'Upload a photo';
}
?>
<div class="upload-photo">
    <h2><?php echo $title;?></h2>
    <input type="hidden" id="file-name" name="<?php echo $photo_name;?>" value="<?php if(isset($photo)) echo $photo;?>">
    <div id="output"><img src="<?php echo $photo_url?>"></div>
    <label>Browse your computer to select a file to upload</label>
    <a href="#" class="buttons btn-default" id="upload">Choose File</a>

    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
</div>
<p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>