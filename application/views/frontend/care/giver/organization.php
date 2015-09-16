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
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-todo">Organization Details</li>
</ol> 

<div class="container">
<form action="<?php echo site_url();?>ad/registeruserdetails" method="post" id="personal-details-form">
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Organization Info 
        </h1>
    <!--<div>-->
    <!--        <label>Name of Organization</label>-->
    <!--        <div class="form-field">-->
    <!--           <input type="text" name="organization_name" value="<?php //if(isset($fn)) echo $fn;?>" class="required">-->
    <!--        </div>-->
    <!--     </div>-->
    <!--        <div>-->
    <!--        <label>Contact name</label>-->
    <!--        <div class="form-field">-->
    <!--           <input type="text" name="name" placeholder="name" class="required" value="<?php //echo isset($name)? $name:''; ?>"/>-->
    <!--        </div>-->
    <!--     </div>-->
    <div>
        <label>Location</label>
        <div id="locationField">
            <input type="hidden" id="lat" name="lat"/>
            <input type="hidden" id="lng" name="lng"/> 
            <input type="hidden" id="cityName" name="city"/>
            <input type="hidden" id="stateName" name="state"/>
            <input type="hidden" id="countryName" name="country"/>
            <input type="text" name="location" class="required" id="autocomplete" required placeholder="Please enter a complete street address"/>
        </div>
          <span style="color:red;" id="error"> </span>
    </div>

    <div>
        <label>Neighborhood / Street</label>
        <div>
            <input type="text" name="neighbour" class="required" value=""/>
        </div>    
    </div>

    <!--<div>-->
    <!--    <label>Zip</label>-->
    <!--    <div><input type="text" name="zip" class="required" value="" /> </div>-->
    <!--</div>-->

     <div>
        <label>Phone</label>
        <div class="form-field">
        <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact"/>
        </div>
    </div>

    <div>
        <label>Name of owner / operator</label>
        <div class="form-field">
        <input type="text" name="name_of_owner" class="required" value=""/>
        </div>
    </div>


    <div> 
        <label>Age of owner / operator</label>
        <div class="form-field">
        <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
        </div>
    </div>

     <div>
        <label>Gender</label>
        <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender" checked> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == 2 ? 'checked' : '' ?>> Female </iv>
        </div>
    </div>
    <div>
        <label>Languages Spoken</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew">Hebrew</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian">Russian</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="French">French</div>
            <div class="checkbox"><input type="checkbox" name="language[]" value="Other">Other</div>
        </div>
    </div>
    <div> 
        <label>Level of religious observance</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
            <option value="Orthodox/Modern Orthodox">Orthodox / Modern Orthodox</option>
            <option value="Other">Other</option>
            <option value="Not Jewish">Not Jewish</option>
        </select>
        </div>
    </div>

    <?php   $this->load->view('frontend/care/photo_upload_owner');  ?>

    <!--  company logo starts here -->
    <?php /* $this->load->view('frontend/care/photo_upload'); */ ?>
    <!-- company logo ends here -->
</div>
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
