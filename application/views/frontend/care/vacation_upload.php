<input type="hidden" id="pdf-name2" name="pdf" value="<?php echo $detail[0]['pdf'];?>">
<button class="btn btn-primary" id="pdf_file2">Vacation schedule</button>
<input type="file" name="pdf_upload" id="pdf_upload2" style="display: none;"> 
<div id="output2" class="pdfloader2">
    <?php if(isset($detail[0]['pdf'])){
            echo $detail[0]['pdf'];
        }else{
            echo 'No file';
        }
        ?>
</div>

<script>

    
    $('#pdf_file2').click(function(e) {
        e.preventDefault();
        $('#pdf_upload2').trigger('click');
        $(document).on('change', '#pdf_upload2', UploadSecondPdf);
    });

    // try uploadind pdf file

    function UploadSecondPdf(event){
        var loader2 = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link2 = '<?php echo site_url("user/uploadfile?files")?>';

        var validExtensions2 = ['pdf','PDF']; //array of valid extensions
        var fileName2 = $('#pdf_upload2').val();
        var fileNameExt2 = fileName2.substr(fileName2.lastIndexOf('.') + 1);
        console.log(fileNameExt2)
        if ($.inArray(fileNameExt2, validExtensions2) == -1){
           alert("Invalid file type. Please upload pdf file only");
           return false;
        }


        var files2 = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data2 = new FormData();
        $.each(files2, function(key, value)
        {
            data2.append(key, value);
        });
        $.ajax({
            url: link2,
            type: 'POST',
            beforesend: $('.pdfloader2').html(loader2),
            data: data2,
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
                        $('.pdfloader2').html('');
                        $('#pdf-name2').val(data.files);    
                    }
                    else{
                        $('.pdfloader2').html('');
                        $('#output2').html(data.files + ' selected');
                        $('#pdf-name2').val(data.files);
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                    $('.pdfloader2').html('');
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
                $('.pdfloader2').html('');
            }
        });
    }

</script>