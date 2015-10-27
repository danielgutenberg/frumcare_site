<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<script>
    $("#locationField").ready(function(){
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {types: ['address']});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    $("#cityName").val('');
                    $("#stateName").val('');
                    $("#countryName").val('');
                    var place = autocomplete.getPlace();
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();
                    var i = 0;
                      var len = place.address_components.length;
                      while (i < len) {
                        var ac = place.address_components[i];
                        if (ac.types.indexOf('locality') >= 0 || ac.types.indexOf('sublocality') >=0 ) {
                          $("#cityName").val(ac.long_name);
                        }
                        if (ac.types.indexOf('administrative_area_level_1') >= 0) {
                          $("#stateName").val(ac.short_name);
                        }
                        if (ac.types.indexOf('country') >= 0) {
                          $("#countryName").val(ac.long_name);
                        }
                        i++;
                      }
                    $("#lat").val(lat);
                    $("#lng").val(lng);
                    document.getElementById("error").innerHTML="";
                });
    });
    $("#textbox1").ready(function(){
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
     
     $(document).ready(function() {
       $('.btn').click(function(event) {
        event.preventDefault(); 
        if ($('#lat').val() == '') {
            window.scrollTo(0, $("#locationField").offset().top);
            $("#locationField").css('border-color', 'red')
           document.getElementById("error").innerHTML="Please click on location from dropdown";
        } else {
            $('#personal-details-form').submit()
        }
     });
    })
</script>  
  <script>
  // $(function() {
  //   $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  // });
$(document).ready(function(){
     $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
})
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
//print_r($usr);
if($detail){
    $organiztion_name       = $detail[0]['organiztion_name'];
    $contact_name           = $user_detail['name'];
    $neighbour              =   $usr[0]['neighbour'];
    $organization_type      = $detail[0]['organization_type'];
    $first_name             = ucfirst($user_detail['name']);
    $job_postion            = explode(',', $detail[0]['job_position']);
    $hourly_rate            = $detail[0]['hourly_rate'];
    $address                = $user_detail['location'];
    $phone                  = $user_detail['contact_number'];
    $profile_description    = $detail[0]['profile_description'];
    $temp                   = explode(',',$detail[0]['availability']);
    $trainingtemp           = explode(',',$detail[0]['training']);
    $smoker                 = explode(',', $detail[0]['smoker']);
    $langtemp               = explode(',', $detail[0]['language']);
    $exp                    = $detail[0]['experience'];
    $religious_observance   = $detail[0]['religious_observance'];
    $date                   = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $reference_file         = $detail[0]['reference_file'];
    $rate                   = $detail[0]['rate'];
    $rate_type              = explode(',',$detail[0]['rate_type']);
    $job_position           = $detail[0]['job_position'];
    $photo_of_child         = $detail[0]['photo_of_child'];
    $lat                    = $user_detail['lat'];
    $lng                    = $user_detail['lng'];
    $facility               = $detail[0]['facility_pic'];
    $city = $user_detail['city'];
    $state = $user_detail['state'];
    $country = $user_detail['country'];
}
?>

<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>

    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post" id="personal-details-form">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2>Edit Job Details</h2>
            </div>
            <div>
                <label>Name of Organization</label>
                <div class="form-field">
                    <input type="text" name="organization_name" value="<?php echo isset($organiztion_name) ? $organiztion_name : '' ?>" class="required">
                </div>
            </div>
            <div>
                <label>Type of Organization</label>
                <div class="form-field">
                <?php 
                    if($this->uri->segment(4)==25){?>
                        <select name="organization_type" class="required">
                            <option value="">Select type of organization</option>
                            <option value="Day Care Center" <?php echo isset($organization_type) && $organization_type == 'Day Care Center' ? 'selected' : '' ?>>Day Care Center</option>
                            <option value="Nursery/ Kindergarten" <?php echo isset($organization_type) && $organization_type == 'Nursery/ Kindergarten' ? 'selected' : '' ?>>Nursery / Kindergarten</option>
                            <option value="Day Camp" <?php echo isset($organization_type) && $organization_type == 'Pre School' ? 'selected' : '' ?>>Pre School</option>
                            <option value="Day Camp" <?php echo isset($organization_type) && $organization_type == 'Day Camp' ? 'selected' : '' ?>>Day Camp</option>
                            <option value="Afternoon Activities Center" <?php echo isset($organization_type) && $organization_type == 'Afternoon Activities Center' ? 'selected' : '' ?>>Afternoon Activities Center</option>
                            <option value="Other" <?php echo isset($organization_type) && $organization_type == 'Other' ? 'selected' : '' ?>>Other</option>
                        </select><?php
                    }
                    if($this->uri->segment(4)==26){?>
                        <select name="organization_type" class="required">
                            <option value="">Select type of organization</option>
                            <option value="Assisted living residence" <?php echo isset($organization_type) && $organization_type == 'Assisted living residence' ? 'selected' : '' ?>>Assisted living residence</option>
                            <option value="Senior care center/ nursing home" <?php echo isset($organization_type) && $organization_type == 'Senior care center/ nursing home' ? 'selected' : '' ?>>Senior care center / nursing home</option>
                            <option value="Senior care agency" <?php echo isset($organization_type) && $organization_type == 'Senior care agency' ? 'selected' : '' ?>>Senior care agency</option>
                            <option value="Rehab/therapy center" <?php echo isset($organization_type) && $organization_type == 'Rehab/therapy center' ? 'selected' : '' ?>>Rehab / therapy center</option>                            
                            <option value="Other" <?php echo isset($organization_type) && $organization_type == 'Other' ? 'selected' : '' ?>>Other</option>
                        </select><?php
                    }
                    if($this->uri->segment(4)==27){?>
                        <select name="organization_type" class="required">
                            <option value="">Select type of organization</option>
                            <option value="Special needs care center" <?php echo isset($organization_type) && $organization_type == 'Special needs care center' ? 'selected' : '' ?>>Special needs care center</option>
                            <option value="Special needs activities center" <?php echo isset($organization_type) && $organization_type == 'Special needs activities center' ? 'selected' : '' ?>>Special needs activities center</option>
                            <option value="Special needs agency" <?php echo isset($organization_type) && $organization_type == 'Special needs agency' ? 'selected' : '' ?>>Special needs agency</option>
                            <option value="Rehab/ therapy center" <?php echo isset($organization_type) && $organization_type == 'Rehab/ therapy center' ? 'selected' : '' ?>>Rehab/ therapy center</option>
                            <option value="Other" <?php echo isset($organization_type) && $organization_type == 'Other' ? 'selected' : '' ?>>Other</option>
                        </select><?php
                    }?>  
                </div>
            </div>
            <div>
                <label>Contact name</label>
                <div class="form-field">
               <input type="text" name="name" placeholder="name" class="required" value="<?php echo isset($contact_name)? $contact_name:''; ?>"/>
                </div>
            </div>
            <div>
            <label>Location </label>
            <div id="locationField">
                <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
                <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
                <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
                <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
                <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
                <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
            </div> 
             <span style="color:red;" id="error"> </span>
        </div>
         <div>
            <label>Neighborhood / Street</label>
            <div>
            <input type="text" name="neighbour" class="required" value="<?php echo isset($neighbour) ? $neighbour : '' ?>"/>
            </div>    
        </div>         
            <div>
                <label>Phone</label>
                <div class="form-field">
                <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
                </div>
            </div>
            <div>
                <label>Position you are looking to fill</label>
                <div class="form-field">
                        <input type="text" name="job_position" class="" value="<?php echo isset($job_position)?$job_position:''?>"/>
                </div>
            </div>

           <div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
                <select name="rate" class="">
                    <option value="">Select rate</option>
                    <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10 / Hr</option>
                    <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15 / Hr</option>
                    <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25 / Hr</option>
                    <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35 / Hr</option>
                    <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45 / Hr</option>
                    <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55 / Hr</option>
                    <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+ / Hr</option>
                </select>
            </div>
        </div>
        <div>
                <!--<label>Check one or more</label>
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1',$rate_type)){?> checked="checked" <?php }?> >Hourly Rate</div>-->
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php }?> >Monthly Payment Available</div>
        </div>
            <div>
                <label>Job Type</label>
                <div class="form-field">
                        <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$temp)){?> checked="checked"<?php }?>> Full Time</div>
                        <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$temp)){?> checked="checked"<?php }?>> Part Time</div>
                        <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]" <?php if(in_array("Substitute",$temp)){?> checked="checked"<?php }?>> Substitute</div>
                        <label>Job Days / Hours</label>
                        <br>
                         <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>">
                         <br>
                         <br>
                         <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_to'];?>">
                         <br>
                         <br>
                         <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time" value="<?php echo $detail[0]['friday_from'];?>"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>">
                         <br>
                         <br>
                        <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
                        <div class="checkbox"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>                                        
                </div>
            </div>
            <div>
                <label>Details</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
                </div>
            </div>


            <h2>Additional Requirements</h2>
            <div>
                <label>Languages necessary</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$langtemp)){?> checked="checked"<?php } ?>> Hebrew</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
                </div>
            </div>
            <div>
                <label>Must have following Training / Certification</label>
                <div class="form-field">
                <?php
                    if($this->uri->segment(4)==25){ ?>
                        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                        <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny / Babysitter course</div>
                        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked"<?php } ?>> Nurse</div>
                        <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$trainingtemp)){?> checked="checked"<?php } ?>> Other</div>
                        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
                        <?php
                    }
                    if($this->uri->segment(4)==26){?>
                        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                        <div class="checkbox"><input type="checkbox" value="Senior care training" name="training[]" <?php if(in_array('Senior care training',$trainingtemp)){?> checked="checked"<?php } ?>> Senior care training</div>
                        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked"<?php } ?>> Nurse</div>
                        <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$trainingtemp)){?> checked="checked"<?php } ?>> Other</div>
                        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
                        <?php
                    }
                    if($this->uri->segment(4)==27){?>
                        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                        <div class="checkbox"><input type="checkbox" value="Special needs training" name="training[]" <?php if(in_array('Special needs training',$trainingtemp)){?> checked="checked"<?php } ?>> Special needs training</div>
                        <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked"<?php } ?>> Nurse</div>
                        <div class="checkbox"><input type="checkbox" value="Other" name="training[]" <?php if(in_array('Other',$trainingtemp)){?> checked="checked"<?php } ?>> Other</div>
                        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
                        <?php
                    }?>
                </div>
            </div>
            <div>
                <label>Minimum experience</label>
                <div class="form-field">
                <select name="experience">
                    <option value="">Select minimum experience</option>
                    <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                    <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                    <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                    <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                    <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
                </select>
                </div>
            </div>

            <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Yeshivish/Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/Chasidish' ? 'selected' : '' ?>>Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/Modern Orthodox' ? 'selected' : '' ?>>Orthodox / Modern Orthodox</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
            </select>
            </div>
        </div>
            <div>
                <label>Smoking acceptable</label>
                <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
                </div>
            </div>
 
               <div>
                <label>Upload Photo of Facility / Organization</label>
                    <?php
                        if(!empty($facility)){
                            $profile_picture = base_url('images/profile-picture/thumb/'.$facility);
                        }else{
                            $profile_picture = site_url("images/plus.png");    
                        }
                     ?>
                <div class="upload-photo">
                    <input type="hidden" id="file-name1" name="facility_pic" value="<?php if(isset($facility)) echo $facility;?>">
                    <div id="output1"><img src="<?php echo $profile_picture?>"></div>
                    <button class="btn btn-default" id="upload1">Choose File</button>
                    <input type="file" name="ImageFile1" id="ImageFile1" style="display: none;"> <div class="loader1"></div>
                </div>
                <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
            </div>

            <div>
                   <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </div>
    </form>
</div>
</div>
<!-- FILE UPLOAD -->

<script type="text/javascript">
    $(document).ready(function(){
        $('body').removeAttr('onload');
    })
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("ad/upload_pp?files")?>';
    $('#upload,#output').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
        $('#ImageFile').on('change',prepareUpload);
    });

    $('#upload1,#output1').click(function(e){
        e.preventDefault();
        $('#ImageFile1').trigger('click');
        $('#ImageFile1').on('change',uploadImage);
    });


    function prepareUpload(event){
        var files;
        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link   = '<?php echo site_url("ad/upload_pp?files")?>';

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

    function uploadImage(event){
        var files;
        var loader1 = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link1   = '<?php echo site_url("ad/upload_pp?files")?>';

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
                url: link1,
                type: 'POST',
                beforesend: $('.loader1').html(loader1),
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
</script>
