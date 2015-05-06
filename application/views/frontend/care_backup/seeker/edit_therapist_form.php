<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
$user_detail = get_user(check_user());
if($detail){
	$looking_to_work = explode(',', $detail[0]['looking_to_work']);
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $number_of_children = $detail[0]['number_of_children'];
    $gender = $user_detail['gender'];
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
    $conditions_of_patient = $detail[0]['conditions_of_patient'];
    $type_of_therapy = $detail[0]['type_of_therapy'];
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $accept_insurance = explode(',',$detail[0]['accept_insurance']);
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
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
        <label>Age of patient</label>
        <div class="form-field">
        <input type="text" name="age_group[]" class="required number" value="<?php if(isset($age_grp)){echo $age_grp;} ?>"/>
        </div>
    </div>
    
    <div>
        <label>Gender of patient</label>
        <div class="form-field">
            <input type="radio" value="1" name="gender" <?php echo isset($gender) && $gender == '1' ? 'checked' : '' ?>> Male
            <input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == '2' ? 'checked' : '' ?>> Female
            <input type="radio" value="3" name="gender" <?php echo isset($gender) && $gender == '3' ? 'checked' : '' ?>> Both
        </div>
    </div>
    <div>
        <label>Condition(s) of patient(Specify)</label>
        <div class="form-field">
            <input type="text" name="conditions_of_patient" class="required" value="<?php echo $conditions_of_patient;?>">
        </div>
    </div>
    
    <div>
        <label>Type of therapist wanted</label>
        <div class="form-field">
        <input type="text" value="<?php echo isset($type_of_therapy) ? $type_of_therapy : '' ?>" name="type_of_therapy" class="required">
        </div>
    </div>
    <div>
        <label>Tell us about yourself</label>
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
        <label>Gender of therapist</label>
        <div class="form-field">
            <input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male
            <input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female
            <input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Both
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
        <label>Must accept insurance</label>
        <div class="form-field">
        <input type="radio" value="1" name="accept_insurance" <?php if(in_array('1',$accept_insurance)){?> checked="checked" <?php } ?>/> Yes
        <input type="radio" value="2" name="accept_insurance" <?php if(in_array('2',$accept_insurance)){?> checked="checked" <?php } ?>/> No
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Update"/>
    </div>
    </div>
    </form>
</div>
</div>
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