<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
    if(segment(3) != '') {
        $action = 'user/account/'.segment(3);
        $user_data = $user_data[0];
        $address_location = $user_data['location'];
        $neighbourhood    = $user_data['neighbour'];
        $zip              = $user_data['zip'];
        $phone            = explode('+1-', $user_data['contact_number']);
        $age              = $user_data['age'];
        $married          = $user_data['marital_status'];
        $religious_observance  = $user_data['religious_observance'];
        $smoker                 = $user_data['smoker'];
        $lang               = explode(',',$user_data['language']);
        $education_level    = $user_data['education_level'];
        $educational_institution   = $user_data['educational_institution'];
        $familartojewish      = $user_data['familartojewish'];
        $lang                 = explode(',',$user_data['language']);
        $marital_status       = explode(',',$user_data['marital_status']);
    }    
    $photo_url = site_url("images/plus.png");
    $ac = $this->session->userdata('account_category');
    if(check_user()) {
        $current_user = get_user(check_user());
        $photo = $current_user['profile_picture'];
        $photo_status = $current_user['profile_picture_status'];
        if($photo!="")
            $photo_url = base_url('images/profile-picture/thumb/'.$photo);
    }
?>
<div class="container">
        <?php echo $this->breadcrumbs->show();?>
        <div class="dashboard-left float-left">
            <?php $this->load->view('frontend/user/dashboard_nav');?>
        </div><!--dashboard-left-->
        
        <div class="dashboard-right float-right">
            <div class="top-welcome">
                <h2>Edit Details</h2>
            </div>
            <div class="ad-form-container">
                <form role="form" id="edituserdetails" action="<?php echo site_url();?>user/account/<?php echo sha1(check_user());?>" method="post">
                    <?php if($this->session->userdata('account_category')!=3){ ?>
                    <div class="first-names">
                        <label id="locationField">Address/Location</label>
                        <input type="text" name="address_location" placeholder="Address/Location" class="required" value="<?php echo (isset($address_location)) ? $address_location : '' ?>" id="autocomplete" onFocus="geolocate()"/>
                    </div>
                    <div class="small-seperator"></div>
                    <?php } ?>

                    <div class="first-names">
                        <label>Neighborhood</label>
                        <input type="text" name="neighbourhood" placeholder="neighbourhood" class="required" value="<?php echo (isset($neighbourhood)) ? $neighbourhood : '' ?>"/>
                    </div>

                    <div class="first-names">
                        <label>Zip</label>
                        <input type="text" name="zip" placeholder="Zip" class="required" value="<?php echo (isset($zip)) ? $zip : '' ?>"/>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Phone</label>
                        <input type="text" name="contact_number" placeholder="Contact Number" class="required" value="<?php echo (isset($phone[1])) ? $phone[1] : '' ?>"/>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                    <?php if($this->session->userdata('account_category')!=3){ ?>
                        <label>Age</label>
                    <?php }else{ ?>
                        <label>Age of Owner / Operator</label>
                        <?php } ?>
                        <input type="text" name="age" placeholder="Age" class="required" value="<?php echo (isset($age)) ? $age : '' ?>"/>
                    </div>

                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Gender</label>
                        <div class="radio-half"><input type="radio" name="gender" value="1" <?php if($user_data['gender'] == 1){?> checked="checked" <?php }?> > Male</div>
                        <div class="radio-half"><input type="radio" name="gender" value="2" <?php if($user_data['gender'] == 2){?> checked="checked" <?php }?>> Female</div>
                    </div>
                    <div class="small-seperator"></div>
                    <?php if($this->session->userdata('account_category')!=3){ ?>
                    <div class="first-names">
                            <label>Marital status</label>
                            <div class="radio-half"><input type="radio" name="marital_status" value="1" <?php if(in_array('1', $marital_status)){?> checked="checked" <?php }?> > Single</div>
                            <div class="radio-half"><input type="radio" name="marital_status" value="2" <?php if(in_array('2', $marital_status)){?> checked="checked" <?php }?> > Married</div>
                            <div class="radio-half"><input type="radio" name="marital_status" value="3" <?php if(in_array('3', $marital_status)){?> checked="checked" <?php }?> > Divorced</div>
                            <div class="radio-half"><input type="radio" name="marital_status" value="4" <?php if(in_array('4', $marital_status)){?> checked="checked" <?php }?> > Widowed</div>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Languages</label>
                        <div class="checkbox"><input type="checkbox" name="languages[]" value="English" <?php if(in_array('English',$lang)){?> checked="checked" <?php } ?>> English</div>
                        <div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" <?php if(in_array('Yiddish',$lang)){?> checked="checked" <?php } ?>> Yiddish</div>
                        <div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" <?php if(in_array('Hebrew',$lang)){?> checked="checked" <?php } ?>> Hebrew</div>
                        <div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" <?php if(in_array('Russian',$lang)){?> checked="checked" <?php } ?>> Russian</div>
                        <div class="checkbox"><input type="checkbox" name="languages[]" value="French" <?php if(in_array('French',$lang)){?> checked="checked" <?php } ?>> French</div>
                        <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$lang)){?> checked="checked" <?php } ?>> Other</div>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Smoker</label>
                        <div class="radio-half"><input type="radio" name="smoker" value="1" <?php if($user_data['smoker'] == 1){?> checked <?php } ?> > Yes</div>
                        <div class="radio-half"><input type="radio" name="smoker" value="2" <?php if($user_data['smoker'] == 2){?> checked <?php } ?> > No</div>
                        <div class="radio-half"><input type="radio" name="smoker" value="3" <?php if($user_data['smoker'] == 3){?> checked <?php } ?> > Yes, but not at work</div>
                    </div>
                    <?php } ?>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Level of observance </label>
                        <select id="religious_observance" name="religious_observance">
                            <option value="Yeshivish/ Chasidish" <?php if($religious_observance == 'Yeshivish/ Chasidish'){?> selected="selected" <?php }?>>Yeshivish/ Chasidish</option>
                            <option value="Orthodox/ Modern Orthodox" <?php if($religious_observance == 'Orthodox/ Modern Orthodox'){?> selected="selected" <?php }?>>Orthodox/ Modern Orthodox</option>
                            <option value="Other" <?php if($religious_observance == 'Other'){?> selected="selected" <?php }?>>Other</option>
                            <option value="Not Jewish" <?php if($religious_observance == 'Not Jewish'){?> selected="selected" <?php }?>>Not Jewish</option>
                        </select>
                    </div>
                    <div class="small-seperator"></div>
                    <?php if($this->session->userdata('account_category')!=3){ ?>    
                    <div class="first-names" style="display:none;">
                        <label></label>
                            <input type="checkbox" name="fimilartojewish" value="fimilartojewish">
                    </div>

                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Level of Education</label>
                            <select name="education">
                                <option value="Elementary" <?php if($education_level == 'Elementary'){?> selected="selected" <?php }?> >Elementary</option>
                                <option value="High school" <?php if($education_level == 'High School'){?> selected="selected" <?php }?>>High school</option>
                                <option  value="Yeshiva/ Seminary" <?php if($education_level == 'Yeshiva/ Seminary'){?> selected="selected" <?php }?>>Yeshiva/ Seminary</option>
                                <option value="Degree" <?php if($education_level == 'Degree'){?> selected="selected" <?php }?>>Degree</option>
                            </select>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names fullwidth">
                            <label>Educational institutions attended</label>
                            <input type="text" name="educational_instution" value="<?php echo $educational_institution;?> ">
                    </div>
                    <div class="small-seperator"></div>
                    <?php } ?>
                    <!--file upload-->
                    <!-- <label>Profile Picture(Optional to upload)</label> -->
                    <!-- <div id="output">
                        <a href="#"><img src="<?php echo $photo_url?>"/></a>
                    </div>
                    <div class="upload-btns">
    		            <button class="btn btn-default" id="upload">Select File</button>
    		            <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
    
    		            <input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>" />
    		            <input type="hidden" id="user_id" name="user_id" value="<?php echo check_user();?>" />
    		            <input type="hidden" id="status" name="profile_picture_status" value="<?php if(isset($photo_status)) echo $photo_status ? $photo_status:'0';?>" />
                        <br /><br /> -->
                        
                    </div>             
                    <div class="small-seperator"></div>
                    <div class="sign-up-btn"><input id="submit-btn" type="submit" name="save" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/></div>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>js/jquery.ui.maskinput.js"></script>

<script type="text/javascript">
    $(function(){
        $('#edituserdetails').validate();
        $('.verifyemail').on('click',function(e){
            e.preventDefault();
            var email = $(this).attr('id');
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url();?>user/verfiyemail",
                    data:"email_address="+email,
                    succcess:function(msg){
                            
                    }
                });
        });
         $('.contact').mask('999-999-9999');

         $('#religious_observance').change(function(){
            if($(this).val() == 'Other')
                $('.familar').css('display','block');

            if($(this).val() == 'Not Jewish')
                $('.familar').css('display','block');

            if($(this).val() == 'Yeshivish/ Chasidish')
                $('.familar').css('display','none');

            if($(this).val() == 'Orthodox/ Modern Orthodox')
                $('.familar').css('display','none');

            if($(this).val() == '')
                $('.familar').css('display','none');
    });

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

<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/upload_image?files")?>';
    $('#upload').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });
   $('#output').click(function(e){
        e.preventDefault();
        $('#ImageFile').trigger('click');
    });
</script>

<script type="text/javascript" src="<?php echo site_url("js/portfoliouploader.js")?>"></script>
<!-- FILE UPLOAD -->
