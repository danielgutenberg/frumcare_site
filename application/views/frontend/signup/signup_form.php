<link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet"/>
<?php
$action = 'signup/save_user';
$refer = $_GET['ac'] ?: null;
$referUrl = $_GET['url'] ? '?url="' . $_GET['url'] . '"' : '';
if(segment(3) != '') {
    $action = 'user/edit/'.segment(3);
    $user_data = $user_data[0];
    $fname = $user_data['name'];   
    $email = $user_data['email'];
    $pass = $user_data['password'];
    $care = $user_data['care_type'];
    $age = $user_data['age'];
    $location = $user_data['location'];
    $city = $user_data['city'];
    $gender  = $user_data['gender']; 
}
   if(empty($at)){
       if(isset($this->session->userdata['account_type'])){
            $at = $this->session->userdata['account_type'];
        }else{
            $at  = 2;
        }
        if(segment(1) == 'signup'){
            $this->session->unset_userdata('care');
        }
    }

if($this->uri->segment(2)!='edit'){

?>

<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign Up</li>
    <li class="progtrckr-todo parent">Your Details</li>
    <li class="progtrckr-todo personal">Job Details</li>
    <li class="progtrckr-todo started">Start Getting Calls</li>
</ol>

<?php  } ?> 

<div class="container sign-up-forms">
    <div class="row">
        <div class="col-xs-offset-4">
            <?php user_flash();?>
            <?php if(segment(3) == '') { ?>
            <h2>
                Create your account
            </h2>
            <p style="text-align:center">
                Sign up now for Frumcare. Already have an <br/>account?
                <a href="<?php echo base_url('login') . $referUrl ?>">Log In</a>
            </p>
            <?php } else { ?>
            <h2>Edit your account</h2>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="signUpRight col-md-3 col-md-offset-1 hidden-sm hidden-xs">
            <h2 style="margin-left: -50px;">
            Why sign up? 
            </h2>
            <div class="rightText" style="border:1px solid black;">
            <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search quality caregivers in your area</div>
            <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new caregiver profiles directly to your inbox</div>
            <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and get contacted by caregivers in your area</div>
            <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features helping you with your care needs</div>
            </div>
        </div>
        <div class="sign-up-form col-xs-6 col-md-offset-0 col-xs-offset-4" style="horizontal-align:center; padding-left:0px">
        <?php
            $attributes = array('id' => 'sign-up', 'role' => 'form');
            echo form_open($action, $attributes);
        ?>
                <div class="care-type col-xs-12" style="padding-left:0px">I am a</div>
                <div class="form-field col-xs-12" style="padding-left:0px">
                        <div class="radio short"><input type="radio" name="account_category" value="2" <?php if($at == 2 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Parent</div>
                        <div class="radio short"><input type="radio" name="account_category" value="1" <?php if($at == 1 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Caregiver</div>
                        <div class="radio long"><input type="radio" name="account_category" value="3" <?php if($at == 3 ){?> checked="checked" <?php } ?> class="organization"> Caregiving Organization</div>
                </div>
    
                <div class="organizational_care" <?php echo isset($at) && $at==3?'':'style="display:none"'?>>
                    <div class="care-type col-xs-12" style="padding-left:0px">What would you like to do?</div>
                    <div class="form-field col-xs-12" style="padding-left:0px">
                        <div class="radio"><input type="radio" name="organization_care" value="1" class="org_caretype required" id="2" checked="checked">Advertise My Service</div>
                        <div class="radio"><input type="radio" name="organization_care" value="2" class="org_caretype required" id="2">Find Workers</div>
                    </div>
                </div>
                <div class="care-type col-xs-12" style="padding-left:0px">Care Type: 
                    <div id="select_options">
                        <select id="care_type" class="required" name="care_type" style="width:330px">
                            <option value="" class="msg">Type of care you are seeking</option>
                            <option value="17_1">Babysitter</option>
                            <option value="18_1">Nanny / Au-pair</option>
                            <option value="23_1">Pediatric / Baby Nurse</option>
                            <option value="19_1">Tutor / private lessons</option>
                            <option value="20_1">Senior caregiver</option>
                            <option value="22_1">Special needs caregiver</option>
                            <option value="24_1">Cleaning / household help</option>
                            <option value="21_1">Errand runner / odd jobs / personal assistant / driver</option>
                        </select>
                    </div>
                </div>
                <div class="care-type col-xs-12" id="locationField" style="padding-left:0px">Location:
                    <span class="first-names">
                        <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
                        <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
                        <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
                        <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
                        <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
                        <input type="hidden" id="locationName" name="location" value="<?php echo isset($country)?$country:''?>"/>
                        <input style="width:330px" type="text" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
                    </span>
                    <span style="color:red;" id="error"> </span>
                    <p>Can't find your address? <a class="noAddress" style="cursor:pointer">Click here</a></p>
                </div>
                <div class="care-type col-xs-12" id="cityField" style="display:none; padding-left:0px">Location:
                    <span class="first-names">
                        <input style="width:330px" type="text" class="required" placeholder="Please enter a city and state/country" id="autocomplete1" value="<?php echo isset($address)? $address:''; ?>" required/>
                    </span>
                    <span style="color:red;" id="error1"> </span>
                </div> 
            
                <div class="col-xs-12" style="padding-left:0px">
                    <span class="first-names">
                        <input style="width:330px" type="text" name="name" placeholder="Name" class="required name" value="<?php echo (isset($name)) ? $name : '' ?>"/>
                    </span>
                </div>
                <div class="col-xs-12" style="padding-left:0px">
                    <span class="email-names" >
                    <input style="width:330px" onblur="check_email(this.id)" id="email" type="text" name="email" placeholder="Email" class="required email" value="<?php echo (isset($email)) ? $email : '' ?>"/>
                </span> 
                </div>
                <div class="col-xs-12" style="padding-left:0px">
                    <span id="email_msg"></span>
                </div>
                <div class="col-xs-12" style="padding-left:0px">
                    <span class="create-pswrd">
                    <input style="width:330px" type="password" name="password" placeholder="Choose a Password" class="required" id="org_password" />
                </span>
                </div>
                <div class="col-xs-12" style="padding-left:0px">
                    <span class="confirm-pswrd">
                    <input style="width:330px" type="password" name="confirm_password" placeholder="Confirm Password" class="required"/>
                </span>
                </div>
                <div class="col-xs-12" style="padding-left:0px">
                    <span style="font-size:12px">By clicking on "Sign up" you agree to our <a href="<?php echo base_url();?>terms-of-use">Terms of use</a><br> and <a href="<?php echo base_url();?>privacy-policy">Privacy policy</a>
                 </span>
                 </div>
                <div class="col-xs-12" style="padding-left:0px">
                     <span class="sign-up-btn" style="text-align:inherit">
                         <input style="margin-top:-50px;" id="submit-btn" type="submit" class="signUpButton btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/>
                     </span>
                </div>
            </form>
        </div>

    </div>
</div>
    <?php if(segment(3) != '') { ?>
    <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
        <br />

    <?php } ?>
    </div>
</div>
    


<!-- Modal -->
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        
      </div>
     
    </div>
  </div>
</div>

<script type="text/javascript">
    function initialize() {
        var acc_category = $('input[name=account_category]:checked').val();
        if (acc_category == 1) {
            getAccountCat(1,1)
            leftText(1, 1);
        }
        if (acc_category == 2) {
            getAccountCat(2,1)
            leftText(2, 1);
        }
        if (acc_category == 3) {
            getAccountCat(1,2)
            leftText(3, 1);
        }
        
    }
    
    $(function(){

        var account_category = $('input[name=account_category]:checked').val(); //$('.acc_cat').val();
        getAccountCat(account_category, 0);
        leftText(account_category, 0);
        if(account_category == 2){
            $('.parent').text('Job Details');
            $('.personal').hide();
            $('.name').attr('placeholder', "Name");
            $('.started').text('Start Getting Calls');
        }       
        $('.acc_cat').change(function(){
            $('.signUpRight').css('margin-top', '70px')
            getAccountCat($(this).val(),$(this).attr('id'));
            leftText($(this).val(),$(this).attr('id'));
            $('.name').attr('placeholder', "Name");
        });

        $('.organization').click(function(){
            $('.signUpRight').css('margin-top', '130px')
            $('.organizational_care').css('display','block');
            $('.name').attr('placeholder', "Name of Organization");
            $('.parent').text('Organization Info');
            $('.personal').css('display','none');
            $('.started').text('Organization Details');
            var careType = $('input[name=organization_care]:checked').val()
            getAccountCat(careType, 2)
            leftText(3, 1);
            
        });

        $('.acc_cat').click(function(){
            $('.organizational_care').css('display','none');
            // $('.org_caretype').removeAttr("checked");
        });

        $('.org_caretype').change(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
            leftText($(this).val(),$(this).attr('id'));
        });

    });

    function check_email(id){
        var data = {
            'email': $('#' + id).val(),

        }
        $.ajax({
            url: '<?php echo site_url("common_ajax/check_email")?>',
            type: 'post',
            data: data,
            success: function(res){
                if(res==1){
                    $('#submit-btn').attr('disabled', 'disabled');
                    $('#email_msg').html('<label class="email error">Not Available</label>');
                }
                else{
                    $('#submit-btn').removeAttr('disabled');
                    $('#email_msg').html('<label class="email success">Available</label>');
                }
                
            }

        })
    } 
    
    function leftText(ac, sb){
        var parent = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search Jobs in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new job openings directly to your inbox</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Create a profile, list your skills and talents, add photos and more</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features and tools for caregivers</div>'
        var job = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search quality caregivers in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new caregiver profiles directly to your inbox</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and get contacted by caregivers in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features helping you with your care needs</div>'
        var org = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Advertise your services to jewish families worldwide</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and recruit employees / staff for your Organization</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new tools to help you run your Organization</div>'
        if(ac == 1){
        $('.rightText').html(parent)
        }
        if(ac == 2){
        $('.rightText').html(job)
        }
        if(ac == 3){
        $('.rightText').html(org)
        }
        
    }

    function getAccountCat(account_category,service_by){
        var parent_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you are seeking</option><option value="17_1">Babysitter</option><option value="18_1">Nanny / Au-pair</option><option value="23_1">Pediatric / Baby Nurse</option><option value="19_1">Tutor / private lessons</option><option value="20_1">Senior caregiver</option><option value="22_1">Special needs caregiver</option><option value="24_1">Cleaning / household help</option><option value="21_1">Errand runner / odd jobs / personal assistant / driver</option></select>'
        var caregiver_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you provide</option><option value="1_1">Babysitter</option><option value="2_1">Nanny / Au-pair</option><option value="10_1">Pediatric / Baby Nurse</option><option value="3_1">Nursery / Playgroup / Drop off / Gan</option><option value="4_1">Tutor / Private lessons</option><option value="5_1">Senior Caregiver</option><option value="6_1">Special needs caregiver</option><option value="7_1">Therapist</option><option value="8_1">Cleaning / household help</option><option value="9_1">Errand runner / odd jobs / personal assistant / driver</option></select>'
        var caregiver_organization_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you provide</option><option value="10_2">Day Care Center / Day Camp / Afternoon Activities</option><option value="13_2">Senior Care Agency</option><option value="16_2">Assisted living / Senior Care Center / Nursing Home</option><option value="14_2">Special needs center</option><option value="15_2">Cleaning / household help company</option></select>'
        var find_worker_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you are seeking</option><option value="25_2">Workers / staff for childcare facility</option><option value="26_2">Workers / staff for senior care facility</option><option value="27_2">Workers / staff for special needs facility</option><option value="28_2">Workers for cleaning company</option></select>'
        
        if(account_category == 1) {
            var organization = $('.organization:checked').val();
            $('.msg').text('Type of care you provide');
            if(organization == 3) {
                $('#select_options').html(caregiver_organization_options).show();
                $('.parent').text('Organization Info');
                $('.personal').css('display','none');
                $('.started').text('Organization Details');
            } else {
                $('#select_options').html(caregiver_options).show();
                $('.parent').text('Personal Details');
                $('.personal').css('display','inline-block');
                $('.started').text('Start Getting Calls');    
            }
        }
        if(account_category == 2){
          var organization = $('.organization:checked').val();
            $('.msg').text('Type of care you are seeking');
            if(organization == 3){
                $('#select_options').html(find_worker_options).show();
                $('.parent').text('Job Details');
                $('.personal').css('display','none');
                $('.started').text('Start Getting Calls');    
            }else{
                $('#select_options').html(parent_options).show();
                $('.parent').text('Job Details');
                $('.personal').css('display','none');
                $('.started').text('Start Getting Calls');    
            }
                        
      }
    }
    
    $('#sign-up').validate({
		 rules:{
		 	agree:"required",
		 	org_password:{
		 		required:true,
		 		minlenght:5
		 	},
	 	    confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#org_password"

            },
		 },
		 messages:{
		 	agree:"Please accept your terms & condtions to continue.",
		 	 org_password: {
                required: "Please enter password",
            },
            confirm_password: {
                required: "Please enter confirm password",
                equalTo: "Please enter the same password as above"
            },
		 }
    });
</script>
<script>
    $('.signUpButton').click(function(event) {
            event.preventDefault(); 
            if ($('#lat').val() == '') {
                if ($('#locationField').css('display') == 'none') {
                    window.scrollTo(0, $("#cityField").offset().top);
                    $("#cityField").css('border-color', 'red')
                    document.getElementById("error1").innerHTML="Please click on location from dropdown";
                } else {
                    window.scrollTo(0, $("#locationField").offset().top);
                    $("#locationField").css('border-color', 'red')
                    document.getElementById("error").innerHTML="Please click on location from dropdown";
                }
            } else {
                $('#sign-up').submit()
            }
        });
</script>
<script>
    $(function(){
    
        $('.noAddress').on('click',function(e){
            alert("Please start typing your city name and click on it from the dropdown");
            $('#cityField').css('display','block');
            $('#locationField').css('display','none');
        });
    })
</script>
<script>
    $("#cityField").ready(function(){
        var cityAutocomplete = new google.maps.places.Autocomplete($("#autocomplete1")[0]);
        google.maps.event.addListener(cityAutocomplete, 'place_changed', function() {
            $("#locationName").val($("#autocomplete1").val());
            $("#cityName").val('');
            $("#stateName").val('');
            $("#countryName").val('');
            var place = cityAutocomplete.getPlace();
            $('.locationName').val(place.formatted_address)
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
        
        $("#cityField").keypress(function(event){
            if ((event.charCode >= 47 && event.charCode <= 57) || // 0-9
                (event.charCode >= 65 && event.charCode <= 90) || // A-Z
                (event.charCode >= 97 && event.charCode <= 122)||
                (event.charCode == 32 || event.charCode == 92)){
                    return true
                } 
            else {
                alert("Please use only english letters in the location search");
                event.preventDefault()
            }
        });
        
        $('#cityField').on('click', function(){
            $('#autocomplete').val('')
            $('#lat').val('')
        });
    });
    
</script>

