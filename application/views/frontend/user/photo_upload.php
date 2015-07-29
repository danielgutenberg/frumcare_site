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
    <div id="output2" style="margin-bottom: 20px"><img src="<?php echo $photo_url?>"></div>
    <?php if ($photo_url != site_url("images/plus.png")) { ?>
        <button class="btn btn-default" id="deletePhoto">Remove Photo</button>
    <?php } else { ?>
        <button class="btn btn-default" id="upload2">Select File</button>
        <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
    <?php } ?>
</div>
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("ad/upload_pp/" . check_user() . "?files")?>';
	$('#upload2').click(function(e){
		e.preventDefault();
		$('#ImageFile').trigger('click');
	});
	$('#deletePhoto').click(function(e){
	    e.preventDefault();
	    var link = '<?php echo site_url("user/deletePhoto/" . check_user())?>';
	    $.ajax({
            url: link,
            type: 'POST'
        });
	})

    $('#output2').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });
    
</script>

<script type="text/javascript">
$(function()
{
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
                        $('#output2').html(data.html);
                        $('.loader').html('');
                        $('#file-name').val(data.files);    
                    }
                    else{
                        $('#output2').html(data.files + ' selected');
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
