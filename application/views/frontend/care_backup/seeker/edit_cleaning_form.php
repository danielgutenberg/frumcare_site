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
                <div class="checkbox"><input type="checkbox" value="Home" name="looking_to_work[]" <?php if(in_array('Home',$looking_to_work)){?> checked="checked" <?php } ?>> My home</div>
                <div class="checkbox"><input type="checkbox" value="Office/business" name="looking_to_work[]" <?php if(in_array('Office/business',$looking_to_work)){?> checked="checked" <?php } ?>> Caregivers home</div>
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
            <label>Number of rooms</label>
            <div class="form-field">
            <input type="text" name="number_of_rooms" class="required number" value="<?php echo isset($rooms) ? $rooms : '' ?>"/>
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
        <div>
            <label>Must specialize in</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]" <?php if(in_array('Floors',$willing_to_work)){?> checked="checked" <?php } ?>> Floors</div>
                <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]" <?php if(in_array('Windows',$willing_to_work)){?> checked="checked" <?php } ?>> Windows</div>
                <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]" <?php if(in_array('Dishes',$willing_to_work)){?> checked="checked" <?php } ?>> Dishes</div>
                <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]" <?php if(in_array('Laundry',$willing_to_work)){?> checked="checked" <?php } ?>> Laundry</div>
                <div class="checkbox"><input type="checkbox" value="Wash" name="willing_to_work[]" <?php if(in_array('Wash',$willing_to_work)){?> checked="checked" <?php } ?>> Wash</div>
                <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]" <?php if(in_array('Folding',$willing_to_work)){?> checked="checked" <?php } ?>> Folding</div>
                <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]" <?php if(in_array('Ironing',$willing_to_work)){?> checked="checked" <?php } ?>> Ironing</div>                
                <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]" <?php if(in_array('Cleaning and Dusting Furniture',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning and Dusting Furniture</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]" <?php if(in_array('Cleaning Refrigerator/Freezer',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Refrigerator/Freezer</div>
                <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stovetop" name="willing_to_work[]" <?php if(in_array('Cleaning Oven/Stovetop',$willing_to_work)){?> checked="checked" <?php } ?>> Cleaning Oven/Stovetop</div>
            </div>
        </div>

        <div>
            <label>Availability (check one or more)</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Occasionally" name="availability[]" <?php if(in_array("Occasionally",$temp)){?> checked="checked"<?php }?>> Occasionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>> Regularly</div>
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternood" name="availability[]" <?php if(in_array("Afternood",$temp)){?> checked="checked"<?php }?>> Afternood</div>
                <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?>> Evening</div>
                <div class="checkbox"><input type="checkbox" value="Weekends fri/sun" name="availability[]" <?php if(in_array("Weekends fri/sun",$temp)){?> checked="checked"<?php }?>> Weekends fri/sun</div>
                <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]" <?php if(in_array("Saturday",$temp)){?> checked="checked"<?php }?>> Saturday</div>    
            </div>
        </div>
        <div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
            <select name="rate" class="required">
                <option value="">Select rate</option>
                <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
                <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15</option>
                <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
                <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
                <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
                <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
                <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
            <select name="rate_type">
                <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Per Hour</option>
                <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Per Month</option>
            </select>
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
            <input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male
            <input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female
            <input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Both
        </div>
    </div>

        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="required">
                <option value="">Select</option>
                <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox' ? 'selected' : '' ?>>Orthodox</option>
                <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
            </select>
            </div>
        </div>
        <div>
            <input type="checkbox" name="pick_up_child" value="1" <?php echo isset($childcare) && $childcare == '1' ? 'checked':'' ?>/>Must be able to watch children as well 
        </div>
        <div>
            <label>Smoking acceptable</label>
            <div class="form-field">
            <input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes
            <input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No
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
function change_wage(val){
    if(val==1){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'hourly_rate');
    }
    else if(val=2){
        $('#wage').removeAttr('name');
        $('#wage').attr('name', 'monthly_rate');    
    }
}
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