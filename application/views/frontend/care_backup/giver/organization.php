<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Your Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol> 

<div class="container">
<form action="<?php echo site_url();?>ad/registeruserdetails" method="post">
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Organization Details 
        </h1>

    <div>
        <label>Address/ Location</label>
        <div id="locationField">
            <input type="text" name="location" class="required" value="<?php echo isset($location) ? $location : '' ?>" id="autocomplete" onFocus="geolocate()"/>
        </div>    
    </div>

    <div>
        <label>Neighbourhood</label>
        <div>
            <input type="text" name="neighbour" class="required" value=""/>
        </div>    
    </div>

    <div>
        <label>Zip</label>
        <div><input type="text" name="zip" class="required" value="" /> </div>
    </div>

     <div>
        <label>Phone</label>
        <div class="form-field">
        <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact"/>
        </div>
    </div>

    <div>
        <label>Age of owner/ operator</label>
        <div class="form-field">
        <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
        </div>
    </div>

     <div>
        <label>Gender</label>
        <div class="form-field">
          <input type="radio" value="1" name="gender" checked> Male
          <input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == 2 ? 'checked' : '' ?>> Female
        </div>
    </div>

    <div>
        <label>Level of religious observance</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Yeshivish/ Chasidish">Yeshivish/ Chasidish</option>
            <option value="Orthodox/ Modern Orthodox">Orthodox/ Modern Orthodox</option>
            <option value="Other">Other</option>
            <option value="Not Jewish">Not Jewish</option>
        </select>
        </div>
    </div>

        <?php $this->load->view('frontend/care/photo_upload') ?>

        <?php 
        $acc_cat = $this->uri->segment(3);
        if($acc_cat == 'caregiver'){
            $cat = 1;
        }else{
            $cat = 2;
        }

         $acc_type = $this->uri->segment(4);
        if($acc_type == 'individual'){
            $type = 1;
        }else{
            $type = 2;
        }
    ?>

   

    <div>   
        <!-- <label>Shul membership</label> -->
        <div class="form-field">
        <input type="hidden" name="account_category" value="<?php echo $cat;?>">
        <input type="hidden" name="account_type" value="<?php echo $type;?>">
        </div>
    </div>


        <br/>
        <input type="submit" class="btn btn-success" value="Save & Continue"/>

    </div>
</form>
</div>
<script type="text/javascript" src="<?php echo site_url();?>js/jquery.ui.maskinput.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#contact').mask('999-999-9999');
    });
</script>

<!-- for google map starts -->
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
