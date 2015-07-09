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
    $driver_license = $detail[0]['driver_license'];
	$vehicle = $detail[0]['vehicle'];
	$pick_up_child = $detail[0]['pick_up_child'];
	$cook		= $detail[0]['cook'];
	$basic_housework = $detail[0]['basic_housework'];
	$homework_help = $detail[0]['homework_help'];
	$sick_child_care = $detail[0]['sick_child_care'];
    $references = $detail[0]['references'];
    $photo_of_child = $detail[0]['photo_of_child'];
    $wash = $detail[0]['wash'];
    $iron = $detail[0]['iron'];
    $fold = $detail[0]['fold'];
    $bath_children = $detail[0]['bath_children'];
    $bed_children = $detail[0]['bed_children'];
    $clean = $detail[0]['clean'];
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
    $age_group = explode(',',$detail[0]['age_group']);
    $caregiverage_from = $detail[0]['caregiverage_from'];
    $caregiverage_to = $detail[0]['caregiverage_to']; 
    $optional_number =explode(',',$detail[0]['optional_number']);
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
                <div class="checkbox"><input type="checkbox" value="My home" name="looking_to_work[]" <?php if(in_array('My home',$looking_to_work)){?> checked="checked" <?php } ?>> My home</div>
                <div class="checkbox"><input type="checkbox" value="Caregivers home" name="looking_to_work[]" <?php if(in_array('Caregivers home',$looking_to_work)){?> checked="checked" <?php } ?>> Caregivers home</div>
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
            <label>Number of children</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="required number">
            </div>
            <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]" <?php if(in_array('twins',$optional_number)){?> checked="checked" <?php } ?>> Twins</div>
            <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" <?php if(in_array('triplets',$optional_number)){?> checked="checked" <?php } ?>> Triplets</div>
        </div>
        <div>
            <label>Gender of children</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender" <?php if(in_array('1',$gender)){?> checked="checked" <?php } ?>> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender" <?php if(in_array('2',$gender)){?> checked="checked" <?php } ?>> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender" <?php if(in_array('3',$gender)){?> checked="checked" <?php } ?>> Both</div>
            </div>
        </div>
        <div>
            <label>Ages of children</label>
             <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1" name="age_group[]" <?php if(in_array('1',$age_group)){?> checked="checked" <?php } ?>/> 1 year</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
            </div>
        </div>
        <div>
            <label>When you need care</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]" <?php if(in_array("Occassionally",$temp)){?> checked="checked"<?php }?>>Occassionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]" <?php if(in_array("Regularly",$temp)){?> checked="checked"<?php }?>>Regularly</div>    
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>/>Start Date
                <input  type="text" name="start_date" id="textbox1" style="display: none;" value="<?php echo isset($date)?$date:''?>"/></div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]" <?php if(in_array("Morning",$temp)){?> checked="checked"<?php }?>> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]" <?php if(in_array("Afternoon",$temp)){?> checked="checked"<?php }?>>Afternoon</div>
                <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]" <?php if(in_array("Evening",$temp)){?> checked="checked"<?php }?> > Evening</div>
                <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]" <?php if(in_array("Weekends Fri./ Sun.",$temp)){?> checked="checked"<?php }?>> Weekends Fri./ Sun.</div>
                <div class="checkbox"><input type="checkbox" value="Shabbos" name="availability[]" <?php if(in_array("Shabbos",$temp)){?> checked="checked"<?php }?>>Shabbos</div>
                <div class="checkbox"><input type="checkbox" value="Night Nurse" name="availability[]" <?php if(in_array("Night Nurse",$temp)){?> checked="checked"<?php }?>> Night Nurse</div>
                <div class="checkbox"><input type="checkbox" value="Vacation Sitter" name="availability[]" <?php if(in_array("Vacation Sitter",$temp)){?> checked="checked"<?php }?>>Vacation Sitter</div>

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
            <label>Caregiver age from</label>
            <div class="form-field">
            <input type="text" name="caregiverage_from" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="caregiverage_to" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
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
                <option value="3" <?php echo isset($rate_type) && $rate_type == '3'?'selected':'' ?>>Room and Board</option>
            </select>
            </div>
        </div>
       
        <div class="clear"></div>
        <div>
            <label>Tell us about needs</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>

        <h2>Encouraged but not mandatory fields</h2>
        <div>
            <label>Smoker</label>
            <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
            </div>
        </div>
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
            <label>Training necessary</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
            <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
            <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course</div>
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
            <input type="checkbox" value="1" name="vehicle" <?php echo isset($vehicle) && $vehicle == 1 ? 'checked' : ''?>> <label>Vehicle</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="pick_up_child" <?php echo isset($pick_up_child) && $pick_up_child == 1 ? 'checked' : ''?>> <label>Willing to pick up kids from school</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="cook" <?php echo isset($cook) && $cook == 1 ? 'checked' : ''?>> <label>Willing to cook</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="basic_housework" <?php echo isset($basic_housework) && $basic_housework == 1 ? 'checked' : ''?>> <label>Willing to do housework/ cleaning</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="homework_help" <?php echo isset($homework_help) && $homework_help == 1 ? 'checked' : ''?>> <label>Willing to help with homework</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="sick_child_care" <?php echo isset($sick_child_care) && $sick_child_care == 1 ? 'checked' : ''?>> <label>Willing to care for sick child</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="references" <?php echo isset($references) && $references == 1 ? 'checked' : ''?>> <label>Must have references</label>
        </div>
        
        <div>
            <input type="checkbox" value="1" name="photo_of_child" <?php echo isset($photo_of_child) && $photo_of_child == 1 ? 'checked' : ''?>> <label>Photo of child/ children</label>
        </div>
      
        <div>
            <input type="checkbox" value="1" name="wash" <?php echo isset($wash) && $wash == 1 ? 'checked' : ''?>> <label>Willing to do laundry</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="iron" <?php echo isset($iron) && $iron == 1 ? 'checked' : ''?>> <label>Willing to iron</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="fold" <?php echo isset($fold) && $fold == 1 ? 'checked' : ''?>> <label>Willing to fold</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="bath_children" <?php echo isset($bath_children) && $bath_children == 1 ? 'checked' : ''?>> <label>Willing to bathe children</label>
        </div>
        <div>
            <input type="checkbox" value="1" name="bed_children" <?php echo isset($bed_children) && $bed_children == 1 ? 'checked' : ''?>> <label>Willing to put children to bed</label>
        </div>

        <br />
            <div>
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>

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
    }else if(val=3){
       $('#wage').removeAttr('name');
        $('#wage').attr('name', 'room_and_board_rate'); 
    }
}
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
