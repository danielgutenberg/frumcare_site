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
    <h2>Upload a photo</h2>
    <input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>">
    <div id="output"><img src="<?php echo $photo_url?>"></div>
    <label>Browse your computer to select a file to upload</label>
    <button class="btn btn-default" id="upload">Choose File</button>
    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
</div>

<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("ad/upload_pp?files")?>';
	$('#upload').click(function(e){
		e.preventDefault();
		$('#ImageFile').trigger('click');
	});

    $('#output').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });
    
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<!-- FILE UPLOAD -->
