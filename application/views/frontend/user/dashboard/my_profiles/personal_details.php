<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
    //print_rr($user_data);
    if(segment(3) != '') {
        $action = 'user/account/'.segment(3);
        $user_data = $user_data[0];
        $address = $user_data['location'];
        $neighbourhood    = $user_data['neighbour'];
        $zip              = $user_data['zip'];
        $phone            = explode('+1-', $user_data['contact_number']);
        $age              = $user_data['age'];
        $married          = $user_data['marital_status'];
        $religious_observance  = $user_data['caregiver_religious_observance'];
        $smoker                 = $user_data['smoke'];        
        $education_level    = $user_data['education_level'];
        $educational_institution   = $user_data['educational_institution'];
        $familartojewish      = $user_data['familartojewish'];
        $lang                 = explode(',',$user_data['caregiver_language']);
        $marital_status       = explode(',',$user_data['marital_status']);
        $owner_name            = $user_data['name_of_owner']; 
        $profile_picture = $user_data['profile_picture'];
        $profile_picture_owner = $user_data['profile_picture_owner'];
        $lat = $user_data['lat'];
        $lng = $user_data['lng'];
        $city = $user_data['city'];
        $state = $user_data['state'];
        $country = $user_data['country'];
        $location = $user_data['location'];
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
            <?php $this->load->view('frontend/user/dashboard/nav');?>
        </div><!--dashboard-left-->
        
        <div class="dashboard-right float-right">
            <div class="top-welcome">
                <h2>Edit Details</h2>
            </div>
            <div class="ad-form-container">
            <?php
                $attributes = array('id' => 'edituserdetails', 'role' => 'form');
                echo form_open('user/account/' . sha1(check_user()), $attributes);
            ?>
                    <?php if($this->session->userdata('account_category') == 3){ ?>
                        <div class="first-names">
                            <label>Name of Organization</label>
                            <input type="text" name="organization_name" placeholder="Name of Organization" class="required" value="<?php echo (isset($user_data['organization_name'])) ? $user_data['organization_name'] : '' ?>"/>
                        </div>
                        
                    <?php } 
                    if( $user_data['care_type'] == 11 ) { ?>
                        <div>
                            <label>Type of Organization</label>
                            <select name="sub_care">
                                <option value="">--Select Type of Organzation--</option>
                                <option value="day care center" <?php echo $user_data['sub_care'] == 'day care center' ? 'selected="selected"' : '' ?> >Day Care Center</option>
                                <option value="day camp" <?php echo $user_data['sub_care'] == 'day camp' ? 'selected="selected"' : '' ?>>Day Camp</option>
                                <option value="afternoon activities" <?php echo $user_data['sub_care'] == 'afternoon activities' ? 'selected="selected"' : '' ?>>Afternoon Activities</option>
                                <option value="pre school" <?php echo $user_data['sub_care'] == 'pre school' ? 'selected="selected"' : '' ?>>Pre-School</option>
                                <option value="other" <?php echo $user_data['sub_care'] == 'other' ? 'selected="selected"' : '' ?>>Other</option>
                            </select>
                        </div> <?php 
                    }
                    elseif( $user_data['care_type'] == 16 ){ ?>
                        <div>
                            <label>Type of Organization</label>
                            <select name="sub_care">
                                <option value="">--Select Type of Organzation--</option>
                                <option value="day care center" <?php echo $user_data['sub_care'] == 'assisted living' ? 'selected="selected"' : '' ?> >Assisted living</option>
                                <option value="day camp" <?php echo $user_data['sub_care'] == 'senior care center' ? 'selected="selected"' : '' ?>>Senior care center</option>
                                <option value="afternoon activities" <?php echo $user_data['sub_care'] == 'nursing home' ? 'selected="selected"' : '' ?>>Nursing home</option>
                                <option value="afternoon activities" <?php echo $user_data['sub_care'] == 'nursing home' ? 'selected="selected"' : '' ?>>Nursing home</option>
                                <option value="afternoon activities" <?php echo $user_data['sub_care'] == 'nursing home' ? 'selected="selected"' : '' ?>>Nursing home</option>
                                <option value="afternoon activities" <?php echo $user_data['sub_care'] == 'nursing home' ? 'selected="selected"' : '' ?>>Nursing home</option>
                            </select>
                        </div> <?php
                    } ?>
                     <div class="first-names locationAddress">
                        <label>Location</label>
                        <div id="locationField">
                            <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
                            <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
                            <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
                            <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
                            <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
                            <input type="hidden" id="locationName" name="location" value="<?php echo isset($location)?$location:''?>"/>
                            <input type="text" class="required" placeholder="Please enter a street address (For internal purposes only, full address will not be posted)" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
                        </div>
                        <span style="color:red;" id="error"> </span>
                        <p>Can't find your address? <a class="noAddress" style="cursor:pointer">Click here</a></p>
                    </div>
                     <div class="first-names" id="cityField" style="display:none">
                        <label>Location</label>
                        <span class="first-names">
                            <input type="text" class="required" placeholder="Please enter a city and state/country" id="autocomplete1" value="" required/>
                        </span>
                        <span style="color:red;" id="error1"> </span>
                    </div> 
                    

                    <div class="first-names">
                        <label>Neighborhood / Street</label>
                        <input type="text" name="neighborhood" placeholder="Neighborhood" class="required" value="<?php echo (isset($neighbourhood)) ? $neighbourhood : '' ?>"/>
                    </div>

                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Phone</label>
                        <input type="text" name="contact_number" id="conatct" placeholder="Contact Number" class="required" value="<?php echo (isset($phone[1])) ? $phone[1] : $user_data['contact_number'] ?>"/>
                    </div>
                    <div class="small-seperator"></div>

                    <?php if($this->session->userdata('account_category') == 3){ ?>
                        <div class="first-names">
                            <label>Name of owner / operator</label>
                            <input type="text" name="name_of_owner" class="required" value="<?php echo $owner_name; ?>"/>
                        </div>
                        <div class="small-seperator"></div>
                    <?php } ?>
                    
                      <?php 
                        if($this->session->userdata('account_category')!=3){
                            $label = "Age";
                        }else{
                            $label = "Age of Owner / Operator"; 
                        }
                    ?>
                    <div class="first-names">
                        <label><?php echo $label;?></label>
                        <input type="text" name="age" placeholder="Age" class="required" value="<?php echo (isset($age)) ? $age : '' ?>"/>
                    </div>
                    
                    
                    <input type="hidden" name="save"/>

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
                        <label>Languages Spoken</label>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$lang)){?> checked="checked" <?php } ?>> English</div>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$lang)){?> checked="checked" <?php } ?>> Yiddish</div>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$lang)){?> checked="checked" <?php } ?>> Hebrew</div>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$lang)){?> checked="checked" <?php } ?>> Russian</div>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$lang)){?> checked="checked" <?php } ?>> French</div>
                            <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$lang)){?> checked="checked" <?php } ?>> Other</div>
                    </div>
                    <div class="small-seperator"></div>
                    
                    <div class="first-names">
                        <label>Smoker</label>
                        <div class="radio-half"><input type="radio" name="smoker" value="1" <?php if($user_data['smoke'] == 1){?> checked <?php } ?> > Yes</div>
                        <div class="radio-half"><input type="radio" name="smoker" value="2" <?php if($user_data['smoke'] == 2){?> checked <?php } ?> > No</div>
                        <div class="radio-half"><input type="radio" name="smoker" value="3" <?php if($user_data['smoke'] == 3){?> checked <?php } ?> > Yes, but not at work</div>
                    </div>
                    <?php } ?>
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Level of observance </label>
                        <select id="religious_observance" name="religious_observance">
                            <option value="">--Select Level of Observance--</option>
                            <option value="Yeshivish/Chasidish" <?php if($religious_observance == 'Yeshivish/Chasidish'){?> selected="selected" <?php }?>>Yeshivish/ Chasidish</option>
                            <option value="Orthodox/Modern Orthodox" <?php if($religious_observance == 'Orthodox/Modern Orthodox'){?> selected="selected" <?php }?>>Orthodox/ Modern Orthodox</option>
                            <option value="Other" <?php if($religious_observance == 'Other'){?> selected="selected" <?php }?>>Other</option>
                            <option value="Not Jewish" <?php if($religious_observance == 'Not Jewish'){?> selected="selected" <?php }?>>Not Jewish</option>
                        </select>
                    </div>
                    <div class="first-names">
                        <label></label>
                            <input type="checkbox" name="familartojewish" value="1" <?php if($user_data['familartojewish'] == 1){?> checked = "checked" <?php }?>>Familiar with Jewish Tradition
                    </div>

                    <div class="small-seperator"></div>
                    <?php if($this->session->userdata('account_category')!=3){ ?>    
                    
                    <div class="small-seperator"></div>
                    <div class="first-names">
                        <label>Level of Education</label>
                            <select name="education">
                                <option value="">--Select Level of Education--</option>
                                <option value="Elementary" <?php if($education_level == 'Elementary'){?> selected="selected" <?php }?> >Elementary</option>
                                <option value="High School" <?php if($education_level == 'High School'){?> selected="selected" <?php }?>>High school</option>
                                <option  value="Yeshiva/Seminary" <?php if($education_level == 'Yeshiva/Seminary'){?> selected="selected" <?php }?>>Yeshiva/ Seminary</option>
                                <option value="Degree" <?php if($education_level == 'Degree'){?> selected="selected" <?php }?>>Degree</option>
                            </select>
                    </div>
                    <div class="small-seperator"></div>
                    <div class="first-names fullwidth">
                            <label>Educational institutions attended</label>
                            <input type="text" name="educational_instution" value="<?php echo $educational_institution;?> ">
                    </div>  
                    <div class="small-seperator"></div>
                    
                    <?php } 
                    $photo_url = site_url("images/plus.png");
                    if(isset($profile_picture_owner)){
                        $photo_url = base_url('images/profile-picture/thumb/'.$profile_picture_owner);
                    }
                    if(isset($profile_picture)){
                        $photo_url = base_url('images/profile-picture/thumb/'.$profile_picture);
                    }
                    ?>
                    <?php if($this->session->userdata('account_category')!=3){
                        $this->load->view('frontend/care/photo_upload', ['photo_name' => 'profile_picture2']);
                     } ?>       
                    <div class="small-seperator"></div>
                    <div class="sign-up-btn"><input id="edit-account-button" type="submit" name="save" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/></div>
                </form>
            </div>
        </div>
</div>
<script type="text/javascript">
    $(function(){
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
         $('#contact').mask('999-999-9999');

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
         if($("#religious_observance option:selected" ).val() == 'Other'){
            $('.familar').css('display','block');
         }
          if($("#religious_observance option:selected" ).val() == 'Not Jewish'){
            $('.familar').css('display','block');
         }

    });
</script>
<script>
    $(function(){
    
        $('.noAddress').on('click',function(e){
            alert("Please start typing your city name and click on it from the dropdown");
            $('#cityField').css('display','block');
            $('.locationAddress').css('display','none');
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
