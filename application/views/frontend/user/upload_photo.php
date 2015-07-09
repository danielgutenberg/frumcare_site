<?php
$photo_url = site_url("images/plus.png");
if(check_user()) {
    $current_user = get_user(check_user());
    $photo = $current_user['profile_picture'];
    $photo_status = $current_user['profile_picture_status'];
    if($photo!="")
        $photo_url = base_url('images/profile-picture/thumb/'.$photo);
}
?>
<div class="container">
<?php echo $this->breadcrumbs->show();?>
    <div class="upload-photo upload-photos">

        <h2>Upload a Photo / Logo</h2>
             <?php flash();?>
         <label>Browse your computer to select a file to upload</label>
        <form action="<?php echo site_url();?>user/upload/<?php echo sha1(check_user());?>" method="post" enctype="multipart/form-data">
            <div id="output">
                <img src="<?php echo $photo_url?>">
            </div>
            <div class="upload-btns">
            <button class="btn btn-default" id="upload">Choose File</button>
            <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>

            <input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>" />
            <input type="hidden" name="user_id" value="<?php echo check_user();?>" />
            <input type="hidden" name="profile_picture_status" value="<?php if(isset($photo_status)) echo $photo_status ? $photo_status:'0';?>" />

            <input type="submit" name="save_image" class="btn btn-succes" value="Save Changes" />
        </div>
        </form>        
    </div>
</div>
<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("user/upload_image?files")?>';
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
