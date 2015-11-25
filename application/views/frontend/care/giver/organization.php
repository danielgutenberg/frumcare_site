
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Organization Info</li>
    <li class="progtrckr-todo">Organization Details</li>
</ol> 

<div class="container">
<form action="<?php echo site_url();?>ad/registeruserdetails" id="personal-details-form" method="post">
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Organization Info 
        </h1>
    <div>
            <label>Location</label>
            <div id="locationField">
                <input type="hidden" id="lat" name="lat"/>
                <input type="hidden" id="lng" name="lng"/>
            <input type="hidden" id="cityName" name="city"/>
            <input type="hidden" id="stateName" name="state"/>
            <input type="hidden" id="countryName" name="country"/>
                <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
            </div>
            <span style="color:red;" id="error"> </span>
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
        <div class="form-field">
        <input type="hidden" name="account_category" value="<?php echo $cat;?>">
        <input type="hidden" name="account_type" value="<?php echo $type;?>">
        </div>
    </div>


        <br/>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Save & Continue"/>

    </div>
</form>
</div>
