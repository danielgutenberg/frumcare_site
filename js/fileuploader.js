$(function()
{
	// Variable to store your files
	var files;

	// Add events
	$('input[type=file]').on('change', prepareUpload);
	//$('form').on('submit', uploadFiles);

	// Grab the files and set them to our variable
	function prepareUpload(event){
        alert('working');
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
                        $('.upload-photo').append('<button class="btn btn-default" id="remove">Remove File</button>');
                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                        $('#upload').css({'display':'none'});
                        $('.upload-photo').append('<button class="btn btn-default" id="remove">Remove File</button>');
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
