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
    <input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>">
    <div id="output"><img src="<?php echo $photo_url?>"></div>
    <button class="btn btn-default" id="upload">Select File</button>
    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
</div>
<script>
    var link = '<?php echo site_url("user/upload_image?files")?>';
    $('#upload').click(function(e){
         e.preventDefault();
         $('#ImageFile').trigger('click');
     });
</script>


<!-- FILE UPLOAD -->
