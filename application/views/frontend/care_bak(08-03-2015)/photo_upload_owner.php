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
    <h2>Upload a owner's photo</h2>
    <input type="hidden" id="file-name1" name="profile_picture_owner" value="<?php if(isset($photo)) echo $photo;?>">
    <div id="output1"><img src="<?php echo $photo_url?>"></div>
    <label>Browse your computer to select a file to upload</label>
    <button class="btn btn-default" id="upload1">Choose File</button>
    <input type="file" name="ImageFile" id="ImageFile1" style="display: none;"> <div class="loader1"></div>
</div>

<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("ad/upload_pp?files")?>';
	$('#upload1').click(function(e){
		e.preventDefault();
		$('#ImageFile1').trigger('click');
	});

    $('#output1').click(function(e){
        e.preventDefault();
        $('#ImageFile1').trigger('click');
    });
    
</script>

<script type="text/javascript">
$(function()
{
    // Variable to store your files
    var files;

    // Add events
    //$('input[type=file]').on('change', prepareUpload);
    $('#ImageFile1').on('change', prepareUploadOwnerPhoto);
    
    //$('form').on('submit', uploadFiles);

    // Grab the files and set them to our variable
    function prepareUploadOwnerPhoto(event){
        files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader1').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output1').html(data.html);
                        $('.loader1').html('');
                        $('#file-name1').val(data.files);    
                    }
                    else{
                        $('#output1').html(data.files + ' selected');
                        $('#file-name1').val(data.files);
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }
});
</script>
<!-- FILE UPLOAD -->