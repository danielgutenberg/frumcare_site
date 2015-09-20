<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>                
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
  $(function() {
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
if($detail){
	$looking_to_work = explode(',', $detail[0]['looking_to_work']);
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $number_of_children = $detail[0]['number_of_children'];
    $gender_of_careseeker = $detail[0]['gender_of_careseeker'];
    $age = $user_detail['age'];
    $exp = $detail[0]['experience'];
    $temp = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];
    $age_grp = $detail[0]['age_group'];
    $hourly_rate = $detail[0]['hourly_rate'];
    $desc 			 = $detail[0]['profile_description'];
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $rooms = $detail[0]['number_of_rooms'];
    $willing_to_work = explode(',',$detail[0]['willing_to_work']);
    //$gender_of_caregiver = explode(',',$user_detail['gender_of_caregiver']);
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
     $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
    $childcare = $detail[0]['pick_up_child'];
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $rate = $detail[0]['rate'];
    $rate_type = explode(',',$detail[0]['rate_type']);
    $lat = $user_detail['lat'];
    $lng = $user_detail['lng'];
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
            <label>For</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home',$looking_to_work)){?> checked="checked" <?php } ?>> My home</div>
                <div class="checkbox"><input type="checkbox" value="Office/business" name="looking_to_work[]" <?php if(in_array('Office/business',$looking_to_work)){?> checked="checked" <?php } ?>> Office / business</div>
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
            <label>Number of rooms</label>
            <div class="form-field">
            <input type="text" name="number_of_rooms" class="number" value="<?php echo isset($rooms) ? $rooms : '' ?>"/>
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
            <label>Must specialize in</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes',$willing_to_work)){?> checked="checked" <?php } ?>> Dishes</div>
                <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors',$willing_to_work)){?> checked="checked" <?php } ?>> Floors</div>
                <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows',$willing_to_work)){?> checked="checked" <?php } ?>> Windows</div>                
                <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry',$willing_to_work)){?> checked="checked" <?php } ?>> Laundry</div>                
                <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding',$willing_to_work)){?> checked="checked" <?php } ?>> Folding</div>
                <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing',$willing_to_work)){?> checked="checked" <?php } ?>> Ironing</div>                
                <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning and Dusting Furniture</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Refrigerator / Freezer</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stovetop" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stovetop',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Oven / Stovetop</div>
                <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]" <?php if(in_array('Pesach Cleaning',$willing_to_work)){?> checked="checked" <?php } ?>><span>Pesach Cleaning</span></div>
                <div class="checkbox"><input type="checkbox" name="pick_up_child" value="1" <?php echo isset($childcare) && $childcare == '1' ? 'checked':'' ?>/>Must be able to watch children as well</div>
            </div>
        </div>

        <div>
            <label>When you need help</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="One time" name="availability[]" <?php if(in_array("One time",$temp)){?> checked="checked"<?php }?>> One time</div>
                <div class="checkbox"><input type="checkbox" value="Occasionally" name="availability[]" <?php if(in_array("Occasionally",$temp)){?> checked="checked"<?php }?>> Occasionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>> Regularly</div>
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>> Afternoon</div>
                <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
                <div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]" <?php if(in_array("Weekends fri/sun",$temp)){?> checked="checked"<?php }?>> Weekends fri / sun</div>
                <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$temp)){?> checked="checked"<?php }?>> Saturday</div>    
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
            <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php }?> >Monthly Rate Available</div>
        </div>
        <div>
            <label>Tell us about your needs</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
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
        <label>Gender</label>
        <div class="form-field">
            <div class="radio" ><input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male</div>
            <div class="radio" ><input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female</div>
            <div class="radio" ><input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Any</div>
        </div>
    </div>

        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="">
                <option value="">Select</option>
                <option value="Yeshivish/Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/Chasidish' ? 'selected' : '' ?>>Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/Modern Orthodox' ? 'selected' : '' ?>>Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
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
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
    </div>
    </form>
</div>
</div>
