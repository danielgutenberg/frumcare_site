<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
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
    $gender = explode(',', $user_detail['gender']);
    $age = $user_detail['age'];
    $exp = $detail[0]['experience'];
    $time = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];
    $age_grp = $detail[0]['age_group'];
    $hourly_rate = $detail[0]['hourly_rate'];
    $desc 			 = $detail[0]['profile_description'];
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $tempwillingtowork = explode(',',$detail[0]['willing_to_work']);
    $personal_hygiene = $detail[0]['personal_hygiene'];
    $driver_license = $detail[0]['driver_license'];
    $vehicle = $detail[0]['vehicle'];
    $cook		= $detail[0]['cook'];
    $basic_housework = $detail[0]['basic_housework'];
   // $gender_of_caregiver = explode(',', $detail[0]['gender_of_caregiver']);
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
    $caregiverage_from = $detail[0]['caregiverage_from'];
    $caregiverage_to = $detail[0]['caregiverage_to'];
     $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
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
                <h2>Edit Job Details</h2>
            </div>

            <div>
                <label>Looking to work in (check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Live in" name="looking_to_work[]" <?php if(in_array('Live in',$looking_to_work)){?> checked="checked" <?php } ?>> Live in</div>
                    <div class="checkbox"><input type="checkbox" value="Live out" name="looking_to_work[]" <?php if(in_array('Live out',$looking_to_work)){?> checked="checked" <?php } ?>> Live out</div>
                </div>
            </div>
             <div>
            <label>Location</label>
            <div id="locationField">
                <input type="text" name="location" class="required" value="<?php echo isset($address) ? $address : '' ?>" id="autocomplete" onFocus="geolocate()"/>
            </div>    
        </div>
         <div>
            <label>Neighborhood</label>
            <div>
            <input type="text" name="neighbour" class="required" value="<?php echo isset($neighbour) ? $neighbour : '' ?>"/>
            </div>    
        </div>
         <div>
            <label>Zip</label>
            <div>
            <input type="text" name="zip" class="required" value="<?php echo isset($zip) ? $zip : '' ?>"/>
            </div>    
        </div>
        <div>
            <label>Phone</label>
            <div class="form-field">
            <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
            </div>
        </div>
            <div>
                <label>Ages of senior</label>
                <div class="form-field">
                    <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
                </div>
            </div>

            <div>
                <label>Gender</label>
                <div class="form-field">
                    <div class="radio"><input type="radio" value="1" name="gender" <?php if(in_array('1',$gender)){?> checked="checked" <?php } ?>> Male</div>
                    <div class="radio"><input type="radio" value="2" name="gender" <?php if(in_array('2',$gender)){?> checked="checked" <?php } ?>> Female</div>
                    <div class="radio"><input type="radio" value="3" name="gender" <?php if(in_array('3',$gender)){?> checked="checked" <?php } ?>> Both</div>
                </div>
            </div>
            <div>
                <label>Conditions senior suffers from</label>
                <div class="form-field">
                    <div class="first-block-checkbox">
                        <div><input type="checkbox" value="Alz./ Dementia" name="willing_to_work[]" <?php if(in_array('Alz./ Dementia', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Alz./ Dementia</span></div>
                        <div><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>
                    </div>
                    <div class="first-block-checkbox">
                        <div><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                        <div><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $tempwillingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
                    </div>
                    	<div class="first-block-checkbox">
							<div><input type="checkbox" value="Able To Tend To Personal Hygiene of Senior" name="willing_to_work[]" <?php if(in_array('Able To Tend To Personal Hygiene of Senior', $tempwillingtowork)){?> checked="checked"<?php }?>><span>Able To Tend To Personal Hygiene of Senior</span></div>
						</div>
                </div>
            </div>

            <div>
                <label>When you need care</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$time)){?> checked="checked"<?php }?>> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$time)){?> checked="checked"<?php }?>> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$time)){?> checked="checked"<?php }?>>Asap</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$time)){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                	<div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$time)){?> checked="checked"<?php }?>> <span>Morning</span></div>
					<div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$time)){?> checked="checked"<?php }?>> <span>Afternoon</span></div>
					<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$time)){?> checked="checked"<?php }?>> <span>Evening</span></div>
					<div class="checkbox"><input type="checkbox" value="Overnight" name="availability[]" <?php if(in_array("Overnight",$time)){?> checked="checked"<?php }?>><span>Overnight</span></div>
					<div class="checkbox"><input type="checkbox" value="Weekends Fri./Sun." name="availability[]" <?php if(in_array("Weekends Fri./Sun.",$time)){?> checked="checked"<?php }?>> <span>Weekends Fri./Sun.</span></div>
					<div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$time)){?> checked="checked"<?php }?>><span>Shabbos</span></div>
					<div class="checkbox"><input type="checkbox" value="24 hr care" name="availability[]" <?php if(in_array("24 hr care",$time)){?> checked="checked"<?php }?>> <span>24 hr care</span></div>
                </div>
            </div>
            <div>
                <label>Tell us about needs</label>
                <div class="form-field">
                    <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <h2>Additional Requirements</h2>
            <div>
                <label>Gender of Caregiver</label>
                <div class="form-field">
                    <input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male
                    <input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female
                    <input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Both
                </div>
            </div>

            <div>
                <label>Languages</label>
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
                <label>Level of observance necessary</label>
                <div class="form-field">
                    <select name="religious_observance">
                        <option value="">Select</option>
                        <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox' ? 'selected' : '' ?>>Orthodox</option>
                        <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern orthodox</option>
                        <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                        <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
                    </select>
                </div>
            </div>
            <div>
                <label>From age to age</label>
                <div class="form-field">
                    <input type="text" name="caregiverage_from" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="caregiverage_to" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
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
                <label>Training(required)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                    <div class="checkbox"><input type="checkbox" value="Senior Care Training" name="training[]" <?php if(in_array('Senior Care Training',$trainingtemp)){?> checked="checked" <?php }?>>Senior Care Training</div>
                    <div class="checkbox"><input type="checkbox" value="Nurse" name="training[]" <?php if(in_array('Nurse',$trainingtemp)){?> checked="checked" <?php }?>>Nurse</div>
                    <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
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
                        <option value="5+" <?php echo isset($exp) && $exp == 5 ? 'selected' : '' ?>>5+ years</option>
                    </select>
                </div>
            </div>

            <div class="checkbox-wrap">
                <div>
                    <input type="checkbox" value="1" name="driver_license" <?php echo isset($driver_license) && $driver_license == 1 ? 'checked' : ''?>> <label>Drivers license</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked':''?>> <label>Vehicle</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Must be willing to cook and prepare food/serve meals</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Must be willing to do light housework/ cleaning</label>
                </div>
                <div>
                    <input type="checkbox" value="1" name="personal_hygiene" <?php echo isset($personal_hygiene) && $personal_hygiene == 1 ? 'checked' : ''?>> <label>Must be willing to deal with personal hygiene of senior</label>
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Update"/>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<script>
    $(document).ready(function(){
     if($('#ckbox1').is(':checked')){
        $("#textbox1").show();
    }else{
        $("#textbox1").hide();
        $('#textbox1').val('');
    }

    $("#ckbox1").change(function(){
        if($('#ckbox1').is(':checked')){
            $("#textbox1").show();   
        }else{
            $("#textbox1").hide(); 
            $('#textbox1').val('');       
        }
    });
});
</script>

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
    console.log(place);
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
<!-- for google map ends -->