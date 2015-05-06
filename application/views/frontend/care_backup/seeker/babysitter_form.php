<?php 
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } 
$user_detail = get_user(check_user());
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $age = $user_detail['age'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
?>
<div class="container">
<?php if(($this->uri->segment(2) != 'new_profile')){?>
<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post"> 
    <?php }else{
    echo form_open('user/addprofileconfirm');
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
    echo form_hidden('organization_care',$record['organization_care']);
   }} ?>
    <div class="ad-form-container">
        <?php if($this->uri->segment(2) != 'new_profile'){?> 
        <div>
            <h1 class="step3">Step 2: Job Details</h1>
        </div>
        <?php } ?>
        <div>
            <label>Looking to work in (check one or more)</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="My home" name="looking_to_work[]"> My home</div>
            <div class="checkbox"><input type="checkbox" value="Caregivers home" name="looking_to_work[]"> Caregivers home</div>
            <div class="checkbox"><input type="checkbox" value="Mothers helper" name="looking_to_work[]"/>Mother's helper</div>            
            </div>
        </div>
        <div>
            <label>Location</label>
            <div id="locationField">
                <input type="text" name="location" class="required" id="autocomplete" onFocus="geolocate()" value="<?php echo isset($address)? $address:''; ?>"/>
            </div>    
        </div>
        <div>
            <label>Neighborhood</label>
            <div>
            <input type="text" name="neighbour" class="required" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
            </div>    
        </div>
        <div>
            <label>Zip</label>
            <div id="locationField">
                <input type="text" name="zip" class="required" value="<?php echo isset($zip)? $zip:''; ?>"/>
            </div>    
        </div>
        <div>
            <label>Phone</label>
            <div class="form-field">
            <input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>" id="contact_number"/>
            </div>
        </div>
        <div>
            <label>Number of children</label>
            <div class="form-field">
                <input type="text" value="" name="number_of_children" class="required number">
                <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]">Twins</div>
                <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]">Triplets</div>
            </div>
        </div>
        <div>
            <label>Gender of children</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender"> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender"> Both</div>
            </div>
        </div>
        <div>
            <label>Ages of children(Check one or more)</label>
            <div class="form-field">
            <!-- <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/> -->
                <input type="checkbox" value="0-3" name="age_group[]"> 0-3 months
                <input type="checkbox" value="3-6" name="age_group[]"> 3-6 months
                <input type="checkbox" value="6-12" name="age_group[]"> 6-12 months
                <input type="checkbox" value="1" name="age_group[]"> 1 year
                <input type="checkbox" value="1-3" name="age_group[]"> 1 to 3 years
                <input type="checkbox" value="3-5" name="age_group[]"> 3 to 5 years
                <input type="checkbox" value="6-11" name="age_group[]"> 6 to 11 years
                <input type="checkbox" value="12+" name="age_group[]"> 12+ years
            </div>
        </div>
        <div>
            <label>Years of experience</label>
            <div class="form-field">
            <select name="experience" class="required">
                <option value="">Select years of experience</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
        <div>
            <label>When you need care(Check one or more)</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="One Time" name="availability[]">One time</div>
            <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]">Occassionally</div>
            <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]">Regularly</div>
            <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]"> Days/ hours</div>
            <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
            <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date
            <input  type="text" name="start_date" id="textbox1" style="display: none;" autocomplete="off"/></div>
            <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>
            <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]"> Weekends Fri./ Sun.</div>
            <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]"/>Shabbos</div>
            <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]"> Night Nurse</div>
            <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]">Vacation Sitter</div>
            </div>
        </div>
        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="religious_observance">
               <option value="">Select</option>
				<option value="Yeshivish/ Chasidish">Yeshivish/ Chasidish</option>
				<option value="Modern Orthodox">Modern orthodox</option>
				<option value="Other">Other</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
				<option value="Not Necessary">Not necessary</option>
            </select>
            </div>

            <div style="display:none" class="not_jewish">
                <input type="checkbox" name="familarwithjewish" value="familarwithjewish">Familiar with Jewish Tradition
            </div>
        </div>
        <div>
            <label>Caregiver age</label>
            <div class="form-field">
           <!--  <select name="age_group" class="required">
                <option value="">Select caregiver age from</option>
                <option value="18-20" <?php echo isset($age_grp) && $age_grp == '18-20' ? 'selected' : '' ?>>18 to 20</option>
                <option value="20-25" <?php echo isset($age_grp) && $age_grp == '20-25' ? 'selected' : '' ?>>20 to 25</option>
                <option value="25-30" <?php echo isset($age_grp) && $age_grp == '25-30' ? 'selected' : '' ?>>25 to 30</option>
                <option value="30+" <?php echo isset($age_grp) && $age_grp == '30+' ? 'selected' : '' ?>>30+</option>
            </select> -->
            <input type="text" name="caregiverage_from" style="width:25%" placeholder="Age From"> to  <input type="text" name="caregiverage_to" style="width:25%" placeholder="Age To">

            </div>
        </div>
        <div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
                <select name="rate" class="required rate">
                    <option value="">Select wage</option>
                    <option value="5-10">$5-$10</option>
                    <option value="10-15">$5-$10</option>
                    <option value="15-25">$15-$25</option>
                    <option value="25-35">$25-$35</option>
                    <option value="35-45">$35-$45</option>
                    <option value="45-55">$45-$55</option>
                    <option value="55+">$55+</option>
                </select>
            </div>
        </div>
        <select name="rate_type">
            <option value="1" selected="selected">Per Hour</option>
            <option value="2">Per Month</option>
        </select>
        <div>
            <label>Tell us about needs</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>
    <h2>Abilities and Skill Necessary</h2>
    <div>
        <label>Smoker</label>
        <div class="form-field">
        <div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
        <div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
        </div>
    </div>
    <div>
        <label>Languages necessary (Choose one or more)</label>
        <div class="form-field">
      <!--   <select name="language[]" multiple>
            <option value="eng">
                English
            </option>
            <option value="es">
                Spanish
            </option>
            <option value="sign">
                Sign Language
            </option>
        </select> -->
            <input type="checkbox" name="language[]" value="English"> English
            <input type="checkbox" name="language[]" value="Yiddish"> Yiddish
            <input type="checkbox" name="language[]" value="Hebrew"> Hebrew
            <input type="checkbox" name="language[]" value="Russian"> Russian
            <input type="checkbox" name="language[]" value="French"> French
            <input type="checkbox" name="language[]" value="Other"> Other
        </div>
    </div>
    <div>
        <label>Training necessary</label>
        <div class="form-field">
        <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
        <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
        <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]"> Nanny/ Babysitter course</div>
        <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
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
            <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
        </select>
        </div>
        </div>
        <div class="checkbox-wrap">
        <div>
            <input type="checkbox" value="1" name="driver_license"> <label>Drivers license</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="vehicle"> <label>Vehicle</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="pick_up_child"> <label>Must be willing to pick up kids from school</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="cook"> <label>Must be willing to cook/ serve meals</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="basic_housework"> <label>Must be willing to do light housework/ cleaning</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="homework_help"> <label>Must be willing to help with homework</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="sick_child_care"> <label>Must be willing to care for sick child</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="references"> <label>Must have references</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="photo_of_child" class="uploadphoto"> <label>Photo of child/ren(Option to upload)</label>
        </div>

        <div>
             <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
        </div>
    </div>
  </form>
</div>

<script type="text/javascript" src="<?php echo site_url();?>js/jquery.ui.maskinput.js"></script>
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
$(document).ready(function(){
   $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

    $('#contact_number').mask('999-999-9999');
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

        $('.religious_observance').change(function(){
            if($(this).val() == 'Other')
                $('.not_jewish').css('display','block');
            
            if($(this).val() == 'Not Jewish')
                $('.not_jewish').css('display','block');

            if($(this).val() != 'Other')
                $('.not_jewish').css('display','none');
            
            if($(this).val() != 'Not Jewish')
                $('.not_jewish').css('display','none');
       });
});
</script>
