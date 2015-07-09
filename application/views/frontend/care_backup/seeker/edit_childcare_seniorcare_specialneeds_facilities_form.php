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
    $organiztion_name = $detail[0]['organiztion_name'];
    $organization_type = $detail[0]['organization_type'];
    $first_name = ucfirst($user_detail['name']);
    $job_postion = explode(',', $detail[0]['job_position']);
    $hourly_rate = $detail[0]['hourly_rate'];
    $address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $profile_description = $detail[0]['profile_description'];
    $temp = explode(',',$detail[0]['availability']);
    $trainingtemp = explode(',',$detail[0]['training']);
    $smoker = explode(',', $detail[0]['smoker']);
    $langtemp = explode(',', $detail[0]['language']);
    $exp = $detail[0]['experience'];
    $religious_observance = $detail[0]['religious_observance'];
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $reference_file  = $detail[0]['reference_file'];
    $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
    $job_position = $detail[0]['job_position'];
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
                <label>Name of organization</label>
                <div class="form-field">
                    <input type="text" name="organiztion_name" value="<?php echo isset($organiztion_name) ? $organiztion_name : '' ?>" class="required">
                </div>
            </div>
            <div>
                <label>Type of organization</label>
                <div class="form-field">
                    <select name="organization_type" class="required">
                        <option value="">Select type of organization</option>
                        <option value="Day Care Center" <?php echo isset($organization_type) && $organization_type == 'Day Care Center' ? 'selected' : '' ?>>Day Care Center</option>
                        <option value="Nursery/ Kindergarten" <?php echo isset($organization_type) && $organization_type == 'Nursery/ Kindergarten' ? 'selected' : '' ?>>Nursery/ Kindergarten</option>
                        <option value="Day Camp" <?php echo isset($organization_type) && $organization_type == 'Pre School' ? 'selected' : '' ?>>Pre School</option>
                        <option value="Day Camp" <?php echo isset($organization_type) && $organization_type == 'Day Camp' ? 'selected' : '' ?>>Day Camp</option>
                        <option value="Afternoon Activities Center" <?php echo isset($organization_type) && $organization_type == 'Afternoon Activities Center' ? 'selected' : '' ?>>Afternoon Activities Center</option>
                        <option value="Other" <?php echo isset($organization_type) && $organization_type == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select> 
                </div>
            </div>
            <div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="name" placeholder="Name" class="required" value="<?php echo isset($first_name) ? $first_name : '' ?>"/>
                </div>
            </div>
            <div>
                <label>Location</label>
                <div>
                    <input type="text" name="location" class="required" value="<?php echo isset($address) ? $address : '' ?>" id="autocomplete" onFocus="geolocate()"/>
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
                        <input type="text" name="job_position" class="required" value="<?php echo isset($job_position)?$job_position:''?>"/>
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
            <div>
                <label>Availability (check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$temp)){?> checked="checked"<?php }?>> Part Time</div>
                    <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]" <?php if(in_array("Substitute",$temp)){?> checked="checked"<?php }?>> Substitute</div>
                    <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$temp)){?> checked="checked"<?php }?>> Full Time</div>
                    <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$temp)){?> checked="checked"<?php }?>> Days/ hours</div>
                    <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                    Day Hours
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_to'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time" value="<?php echo $detail[0]['friday_from'];?>"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>">
                 <br>
                 Vacation Days (Please specify vacation days)
                 <br>
                 <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">

                <br>
                <br>
                </div>
            </div>
            <div>
                <label>Details</label>
                <div class="form-field">
                <textarea name="profile_description" class="required"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
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
                <label>Must have following training/ certification</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                    <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course</div>
                    <div class="checkbox"><input type="checkbox" value="Degree" name="training[]" <?php if(in_array('Degree',$trainingtemp)){?> checked="checked"<?php } ?>> Degree</div>
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

            <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/ Chasidish' ? 'selected' : '' ?>>Yeshivish/ Chasidish</option>
                <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern Orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
            </select>
            </div>
        </div>
            <div>
                <label>Smoker</label>
                <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
                </div>
            </div>
             <div class="refrence_file" >
            <label>Upload Photo of Facility</label>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"><?php echo isset($reference_file)?$reference_file:'' ?></div>
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
