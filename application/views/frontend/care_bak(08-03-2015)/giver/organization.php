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
</script>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-todo">Organization Details</li>
</ol> 

<div class="container">
<form action="<?php echo site_url();?>ad/registeruserdetails" method="post">
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Organization Details 
        </h1>

    <div>
        <label>Location</label>
        <div id="locationField">
            <input type="hidden" id="lat" name="lat"/>
            <input type="hidden" id="lng" name="lng"/> 
            <input type="text" name="location" class="required" id="autocomplete" />
        </div>    
    </div>

    <div>
        <label>Neighbourhood</label>
        <div>
            <input type="text" name="neighbour" class="required" value=""/>
        </div>    
    </div>

    <div>
        <label>Zip</label>
        <div><input type="text" name="zip" class="required" value="" /> </div>
    </div>

     <div>
        <label>Phone</label>
        <div class="form-field">
        <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact"/>
        </div>
    </div>

    <div>
        <label>Name of owner/ operator</label>
        <div class="form-field">
        <input type="text" name="name_of_owner" class="required" value=""/>
        </div>
    </div>


    <div>
        <label>Age of owner/ operator</label>
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
        <label>Level of religious observance</label>
        <div class="form-field">
        <select name="religious_observance">
            <option value="">Select</option>
            <option value="Yeshivish/ Chasidish">Yeshivish/ Chasidish</option>
            <option value="Orthodox/ Modern Orthodox">Orthodox/ Modern Orthodox</option>
            <option value="Other">Other</option>
            <option value="Not Jewish">Not Jewish</option>
        </select>
        </div>
    </div>

    <?php   $this->load->view('frontend/care/photo_upload_owner');  ?>


    <?php /* <?php $this->load->view('frontend/care/photo_upload'); ?> */?>
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