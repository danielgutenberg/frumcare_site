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
    <button class="btn btn-default" id="remove" style="display:none;">Remove File</button>
    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
</div>
<p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
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

<script type="text/javascript">
$(function()
{
    if($('#file-name').val()!=''){
        $('#upload').css({'display':'none'});
        $('#remove').css({'display':'block'});
    }
    // Variable to store your files
    var files;

    // Add events

    $('#ImageFile').on('change', prepareUpload);

    //$('form').on('submit', uploadFiles);

    // Grab the files and set them to our variable
    function prepareUpload(event){
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
            beforesend: $('.loader').html(loader),
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
                        $('#output').html(data.html);
                        $('.loader').html('');
                        $('#file-name').val(data.files);
                        $('#upload').css({'display':'none'});
                        $('#remove').css({'display':'none'});
                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
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
