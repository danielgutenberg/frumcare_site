<?php
$photo_url = site_url("images/plus.png");
if(check_user()) {
    $current_user = get_user(check_user());
    $photo = $current_user['profile_picture'];
    $display = 'display:none';
    if($photo!="") {
        $photo_url = base_url('images/profile-picture/thumb/'.$photo);
        $display = 'display:inline-block';
    }
        
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
    <a class="buttons btn-default" href="#" id="remove" onclick="return removePic();" style="margin:0 10px; <?php echo $display ?>">Remove File</a>
    <label>Browse your computer to select a file to upload</label>
    <a class="buttons btn-default" id="upload">Choose File</a>
    <input type="file" name="ImageFile" id="ImageFile" style="display: none;">
    <div class="loader"></div>
</div>
<p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>

<script>
function removePic(){
    $('#file-name').attr('value','');
    var lodr='<?php echo site_url("images/plus.png")?>';
    $('#output img').attr('src',lodr);
    $('#upload').css({'display':'inline-block'});
    $('#remove').css({'display':'none'});
    return false;

}
$(function()
{


    function setListeners() {
        $('#locationField #autocomplete').change(function(){
            $('#lat').val('');
            $('#lng').val('');
        });
    
        $('#upload, #output').click(function(){
            console.log('click');
            $('#ImageFile').trigger('click');
            return false;
    
        });
    
        // Add events
    
        $('#ImageFile').on('change',prepareUpload1);
    }
    
    setListeners();
    //$('form').on('submit', uploadFiles);

    // Grab the files and set them to our variable
    function prepareUpload1(event){
        if ($('#ImageFile').val() == '') {
            console.log('no file');
            return;
        }
        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        if ($('#file-name').attr('name') == 'profile_picture') {
            var link = '<?php echo site_url("ad/upload_pp/?files")?>';
        } else {
            var link = '<?php echo site_url("ad/upload_pp/false?files")?>';
        }
        var files = event.target.files;
        // event.stopPropagation(); // Stop stuff happening
        // event.preventDefault(); // Totally stop stuff happening

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
                if(typeof data.error === 'undefined') {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output').html(data.html);
                        $('.loader').addClass('hidden');
                        $('#file-name').val(data.files);
                        $('#upload').css({'display':'none'});
                        $('#remove').css({'display':'inline-block'});
                    } else {
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                    }


                } else {
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