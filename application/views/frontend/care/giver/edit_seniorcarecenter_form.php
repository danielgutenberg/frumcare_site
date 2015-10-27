<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 

    if($detail){
    	$established 		= $detail[0]['established'];
    	$hr_rate 	 		= 	$detail[0]['hourly_rate'];
    	$willing_to_work 	= explode(',', $detail[0]['willing_to_work']);
    	$desc 				= $detail[0]['profile_description'];
    	$ref 				= $detail[0]['references'];
        $certification 		= $detail[0]['certification'];
        $number_of_children	= $detail[0]['number_of_children'];
        $number_of_staff 	= $detail[0]['number_of_staff'];
        $ref_det 			= $detail[0]['references_details'];
        $lang = explode(',',$detail[0]['language']);
        $rate = $detail[0]['rate'];
        $rate_type = explode(',', $detail[0]['rate_type']);
        $facility = $detail[0]['facility_pic'];
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
                <h2 class="step3">Edit Job Details</h2>
            </div>
            
            <?php //print_r($details);?>
            
            <div>
                <label>Type of Organization</label>
                <select name="sub_care">
                    
                    <option <?php echo $detail[0]['sub_care']=='assisted living residence'?'selected="selected"':'';?> value="assisted living residence">Assisted living residence</option>
                    <option <?php echo $detail[0]['sub_care']=='senior care center'?'selected="selected"':'';?> value="senior care center">Senior care center</option>
                    <option <?php echo $detail[0]['sub_care']=='nursing home'?'selected="selected"':'';?> value="nursing home">Nursing home</option>
                    <option <?php echo $detail[0]['sub_care']=='rehab therapy center'?'selected="selected"':'';?> value="rehab therapy center">Rehab / Therapy Center</option>
                    <option <?php echo $detail[0]['sub_care']=='other'?'selected="selected"':'';?> value="other">Other</option>
                </select>
            </div>
            
            
            
            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="required">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($established == $i){ ?> selected="selected" <?php }?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
                </div>
            </div>

            <div>
                <label>Certification</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="required">
                </div>
            </div>

            <div>
                <label>Number of patients / residents</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="required number">
                </div>
            </div>

            <div>
                <label>Number of staff</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_staff) ? $number_of_staff : '' ?>" name="number_of_staff" class="required number">
                </div>
            </div>
            <div>
                <label>Languages Spoken</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $lang)){?> checked="checked" <?php }?>> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish', $lang)){?> checked="checked" <?php }?>> Yiddish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew', $lang)){?> checked="checked" <?php }?>> Hebrew</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$lang)){?> checked="checked" <?php }?>> Russian</div>                    
                    <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French', $lang)){?> checked="checked" <?php }?>> French</div>                    
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other', $lang)){?> checked="checked" <?php }?>> Other</div>
                </div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">                
                    <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willing_to_work[]" <?php if(in_array('Alz./dementia',$willing_to_work)){?> checked="checked" <?php }?>> <span>Alz./dementia</span></div>
                    <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willing_to_work)){?> checked="checked" <?php }?>> <span>Sight loss</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willing_to_work)){?> checked="checked" <?php }?>> <span>Hearing loss</span></div>
                    <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willing_to_work)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>                
                </div>
            </div>
            
            <div>
                <?php $extra_field = explode(',',$detail[0]['extra_field']); ?>
                <label>Observance in facility</label>
                <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" <?php if(in_array('shul on premises',$extra_field)){?> checked="checked" <?php }?>/>Shul on premises</div>
                <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" <?php if(in_array('kosher kitchen',$extra_field)){?> checked="checked" <?php }?>/>Kosher kitchen</div>
                <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" <?php if(in_array('kosher food available',$extra_field)){?> checked="checked" <?php }?>/>Kosher food available</div>
                <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" <?php if(in_array('shabbos observant facility',$extra_field)){?> checked="checked" <?php }?>/>Shabbos observant facility</div>
            </div>
            
            <div>
                <label>Cost</label>
                <div class="form-field">
                   <input type="text" name="rate" value="<?php echo $rate;?>">
                </div> 
            </div>
            <div>
                <label>Tell us about your organization / facility / staff</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <div>
                <label>References</label>
                <div class="form-field">
                    <div class="radio"><input type="radio" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes </div>
                    <div class="radio"><input type="radio" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No </div>
                </div>
            </div>
            <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
            <label></label>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"><?php echo isset($reference_file)?$reference_file:'' ?></div>
        </div>

            <?php 
                $photo_url = site_url("images/plus.png");
                if(isset($facility)){
                    $photo_url = base_url('images/profile-picture/thumb/'.$facility);
                }else{
                      $photo_url = site_url("images/plus.png");
                } 
            ?>                   
            <div class="upload-photo">
                <h2>Upload photo of facility / organization</h2>
                <input type="hidden" id="file-name" name="facility_pic" value="<?php echo $facility;?>">
                <div id="output"><img src="<?php echo $photo_url?>"></div>
                <label>Browse your computer to select a file to upload</label>
                <button class="btn btn-default" id="upload">Choose File</button>
                <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
            </div>

            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>
            <div style="display:none">
                <label>Your references details</label>
                <div class="form-field">
                <textarea style="display:none" name="references_details" class="txt"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
            </div>
            </div>
            <br />
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').removeAttr('onload');
    });
    $('#ref_check1').click(function(){
        $('.refrence_file').show();
    });

    $('#output,#upload').click(function(e){
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

    });
</script>
