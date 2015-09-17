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
            $('#newJob').submit()
        }
     });
    })
</script>
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
<form action="<?php echo site_url();?>/ad/add_careseeker_step2" id="personal-details-form">
<?php }else{
    $attributes = array('id' => 'newJob');
    echo form_open('user/addprofileconfirm', $attributes);
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
    echo form_hidden('organization_care',$record['organization_care']);
   }} ?>
<div class="ad-form-container">
<?php if($this->uri->segment(2) != 'new_profile'){?>
<div>
    <h1 class="step2">Step 2: Job Details</h1>
</div>
<?php } ?>
<div>


    <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
    <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


<label>Location</label>
            <div id="locationField">
                <input type="hidden" id="lat" name="lat"/>
                <input type="hidden" id="lng" name="lng"/>
            <input type="hidden" id="cityName" name="city"/>
            <input type="hidden" id="stateName" name="state"/>
            <input type="hidden" id="countryName" name="country"/>
                <input type="text" name="location" class="required" placeholder="Please enter a complete street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
            </div>
            <span style="color:red;" id="error"> </span>
</div>
                <!--<div>-->
                <!--    <label>Neighborhood / Street</label>-->
                <!--    <div>-->
                <!--    <input type="text" name="neighbour" class="required" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />-->
                <!--    </div>    -->
                <!--</div>                 -->
				<div>
					<label>Phone</label>
					<div class="form-field">
						<input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
					</div>
				</div>
<div>
    <label>Age of patient</label>
    <div class="form-field">
    <input type="text" name="age_group[]" class="required number" value=""/>
    </div>
</div>

<div>
    <label>Gender of patient</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="gender_of_careseeker" checked> Male</div>
    <div class="radio"><input type="radio" value="2" name="gender_of_careseeker"> Female</div>
    </div>
</div>
<div>
    <label>Condition(s) of patient (Specify)</label>
    <div class="form-field">
        <input type="text" name="conditions_of_patient" class="required" value="">
    </div>
</div>

<div>
    <label>Type of therapist wanted</label>
    <div class="form-field">
    <input type="text" value="" name="type_of_therapy" class="required">
    </div>
</div>
<div>
    <label>Tell us about your needs</label>
    <div class="form-field">
    <textarea name="profile_description" class="required"></textarea>
    </div>
</div>

<h2>Additional Requirements</h2>

<div>
    <label>Languages necessary</label>
    <div class="form-field">
    <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
    <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>
    </div>
</div>

<div>
    <label>Gender of therapist</label>
    <div class="form-field">
    <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
    <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
    <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Any</div>
    </div>
</div>
<?php /*
<div>
    <label>Level of observance necessary</label>
    <div class="form-field">
    <select name="religious_observance" class="required">
        <option value="">Select</option>
        <option value="Yeshivish/ Chasidish">Yeshivish/ Chasidish</option>
        <option value="Orthodox/ Modern Orthodox">Orthodox/ Modern orthodox</option>
        <option value="Familiar With Jewsish Tradition">Familiar With Jewsish Tradition</option>
        <option value="Not Jewish">Not necessary</option>
    </select>
    </div>
</div> */ ?>
<!--<div>-->
<!--    <label>Must accept insurance</label>-->
<!--    <div class="form-field">-->
<!--    <div class="radio"><input type="radio" value="1" name="accept_insurance"/> Yes</div>-->
<!--    <div class="radio"><input type="radio" value="2" name="accept_insurance" checked/> No</div>-->
<!--    </div>-->
<!--</div>-->
<div>
    <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
</div>
</div>
</form>
</div>
