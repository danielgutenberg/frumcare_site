<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<script>
    $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    //console.log(place.geometry.location);
                    var lat = place.geometry.location.k;
                    var lng = place.geometry.location.D;                                
                    $("#lat").val(lat);
                    $("#lng").val(lng);                                
                });
    });
     $("#textbox1").ready(function(){        
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
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
            <h1 class="step2">Step 2: Job Details</h1>
        </div>
        <?php } ?>
        <div>
<label>Location</label>
<div id="locationField">
    <input type="hidden" id="lat" name="lat"/>
    <input type="hidden" id="lng" name="lng"/> 
    <input type="text" name="location" class="required" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>"/>
</div>    
</div>
        <div>
            <label>Neighborhood / Street</label>
            <div>
            <input type="text" name="neighbour" class="required" onFocus="geolocate()" value="<?php echo isset($neighbour)? $neighbour:''; ?>" />
            </div>    
        </div>         
		<div>
			<label>Phone</label>
			<div class="form-field">
				<input type="text" name="contact_number" class="required" value="<?php echo isset($phone)? $phone:''; ?>"/>
			</div>
		</div>
        <div>
            <label>Age of student</label>
            <div class="form-field">
            <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
            </div>
        </div>

        <div>
            <label>Gender of student</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
            <!--<div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Any</div>-->
            </div>
        </div>

        <div>
            <label>Looking for help in the following subject(s):</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]"> Elementary school</div>
                <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]"> High school</div>
                <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]"> Post high school</div>
                <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" />Limudei Kodesh</div>
                <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" />General Studies</div>
                <div class="checkbox"><input type="checkbox" value="Special ed" name="subjects[]"> Special ed</div>
                <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]"> Music</div>
                <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]"> Art</div>
                <div class="checkbox"><input type="checkbox" value="Other" name="subjects[]"> Other</div>                        
            </div>
        </div>
        <div>
            <label>When you need lessons</label>
            <div class="form-field">                
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1"/></div>
                <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]">Occassionally</div>
                <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]">Regularly</div>
                <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> Morning</div>
                <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]">Afternoon</div>
            	<div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> Evening</div>            	
                <div class="checkbox"><input type="checkbox" value="By appointment" name="availability[]">By appointment</div> 
                </div>
        </div> 
        <div class="rate-select">
            <label>Wage</label>
            <div class="form-field">
                <select name="rate" class="required rate">
                    <option value="">Select wage</option>
                    <option value="5-10">$5-$10 / Hr</option>
                    <option value="10-15">$10-$15 / Hr</option>
                    <option value="15-25">$15-$25 / Hr</option>
                    <option value="25-35">$25-$35 / Hr</option>
                    <option value="35-45">$35-$45 / Hr</option>
                    <option value="45-55">$45-$55 / Hr</option>
                    <option value="55+">$55+ / Hr</option>
                </select>
            </div>
        </div>

         <div>
            <!--<label>Check one or more</label>
            <div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
            <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
        </div>
        <!--<div>-->
        <!--    <label>Tell us about your needs</label>-->
        <!--    <div class="form-field">-->
        <!--    <textarea name="profile_description" class="required"><?php //echo isset($desc) ? $desc : '' ?></textarea>-->
        <!--    </div>-->
        <!--</div>-->

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
            <label>Gender of tutor wanted</label>
            <div class="form-field">
                <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" checked> Male</div>
                <div class="radio"><input type="radio" value="2" name="gender_of_caregiver"> Female</div>
                <div class="radio"><input type="radio" value="3" name="gender_of_caregiver"> Any</div>
            </div>
        </div>
        <div>
            <label>Age of Tutor wanted</label>
            <div class="form-field">
            <input type="text" name="caregiverage_from" value="" placeholder="Age From" style="width:25%"> to  <input type="text" name="caregiverage_to" value="" placeholder="Age To" style="width:25%">
            </div>
        </div>
        <div>
            <label>Smoking acceptable</label>
            <div class="form-field">
            <div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
            <div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
            </div>
        </div>
        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Yeshivish/ Chasidish">Yeshivish / Chasidish</option>
                <option value="Orthodox/ Modern Orthodox">Orthodox / Modern orthodox</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
                <option value="Not Jewish">Not necessary</option>
            </select>
            </div>
        </div>
        <div>
            <label>Minimum years of experience</label>
            <div class="form-field">
            <select name="experience" class="required">
                <option value="">Select</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
        <div>
            <label>Training / Certification required</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="CPR" name="training[]"> CPR</div>
            <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]"> First Aid</div>
            <div class="checkbox"><input type="checkbox" value="degree" name="training[]"> Degree</div>
            <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]"> Not necessary</div>
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
    </div>
</form>