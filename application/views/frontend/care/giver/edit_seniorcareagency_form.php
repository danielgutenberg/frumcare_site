<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
	if($detail){
		$willing_to_work = explode(',', $detail[0]['willing_to_work']);
		$hr_rate 		 = $detail[0]['hourly_rate'];
		$desc 			 = $detail[0]['profile_description'];
		$established	 = $detail[0]['established'];
        $certification = $detail[0]['certification'];
        $rate = $detail[0]['rate'];
        $rate_type = explode(',',$detail[0]['rate_type']);
        $facility  = $detail[0]['facility_pic'];
	}    
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    
    <div class="dashboard-right float-right">
    
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2 class="step3">Edit Organization Details</h2>
            </div>
            
            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="txt">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($i == $established){?> selected="selected" <?php }?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
                </div>
            </div>

            <div>
                <label>Certification</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="txt">
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willing_to_work[]" <?php if(in_array('Alz./dementia',$willing_to_work)){?> checked="checked"<?php }?>> <span>Alz./ dementia</span></div>
                <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willing_to_work)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>
                
                <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willing_to_work)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
                </div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                   <input type="text" name="rate" value="<?php echo $rate;?>">
                </div> 
            </div>
             
            <div>
                <!--<label>Check one or more</label>-->
                <div class="form-field">
                        <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1',$rate_type)){?> checked="checked" <?php } ?>>Hourly Rate</div>-->
                        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php } ?>>Monthly Rate Available</div>
                </div>
           </div>
            <div>
                <label>Tell us about your organization</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <?php 
                $photo_url = site_url("images/plus.png");
                if(isset($facility)){
                    $photo_url = base_url('images/profile-picture/thumb/'.$facility);
                } 
            ?>                   
                    
                <div class="upload-photo"  style="display:none;">
                    <h2>Upload photo of facility / organization</h2>
                    <input type="hidden" id="file-name" name="facility_pic" value="<?php echo isset($facility)?>">
                    <div id="output"><img src="<?php echo $photo_url?>"></div>
                    <label>Browse your computer to select a file to upload</label>
                    <button class="btn btn-default" id="upload">Choose File</button>
                    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                    <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
                </div>



             <div>
                <label> Payment Options (specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>

            <div>
                 <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </div>
    </form>    
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').removeAttr('onload');
    });

    $('#upload,#output').click(function(e){
            e.preventDefault();
            $('#ImageFile').trigger('click');
     });    

   $(function(){
        var files;

        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link = '<?php echo site_url("ad/upload_pp?files")?>';

        $('#ImageFile').on('change',prepareUpload);

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

    //     function prepareUpload(event){
    //      var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    //     var link = '<?php echo site_url("user/uploadfile?files")?>';

    //     var files = event.target.files;
    //     event.stopPropagation(); // Stop stuff happening
    //     event.preventDefault(); // Totally stop stuff happening

    //     // START A LOADING SPINNER HERE

    //     // Create a formdata object and add the files
    //     var data = new FormData();
    //     $.each(files, function(key, value)
    //     {
    //         data.append(key, value);
    //     });
    //     $.ajax({
    //         url: link,
    //         type: 'POST',
    //         beforesend: $('.loader').html(loader),
    //         data: data,
    //         cache: false,
    //         dataType: 'json',
    //         processData: false, // Don't process the files
    //         contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    //         success: function(data, textStatus, jqXHR)
    //         {
    //             if(typeof data.error === 'undefined')
    //             {
    //                 // Success so call function to process the form
    //                 if(data.type==1){
    //                     $('#output').html(data.html);
    //                     $('.loader').html('');
    //                     $('#file-name').val(data.files);    
    //                 }
    //                 else{
    //                     $('#output').html(data.files + ' selected');
    //                     $('#file-name').val(data.files);
    //                 }
                    
    //             }
    //             else
    //             {
    //                 // Handle errors here
    //                 console.log('ERRORS: ' + data.error);
    //             }
    //         },
    //         error: function(jqXHR, textStatus, errorThrown)
    //         {
    //             // Handle errors here
    //             console.log('ERRORS: ' + textStatus);
    //             // STOP LOADING SPINNER
    //         }
    //     });
    // }

   });
</script>
