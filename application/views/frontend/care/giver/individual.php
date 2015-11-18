
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Personal Details</li>
    <li class="progtrckr-todo">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>

<div class="container">
<form action="<?php echo site_url();?>ad/registeruserdetails" method="post" id="personal-details-form" enctype="multipart/formdata">
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Personal Details
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
            <label>Neighborhood</label>
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
	        <label>Age</label>
	        <div class="form-field">
	        <input type="text" name="age" class="txt number" value="<?php echo isset($age) ? $age : '' ?>"/>
	        </div>
	    </div>
	  

    <div>
        <label>Gender</label>
        <div class="form-field">
          <div class="radio-half"><input type="radio" value="1" name="gender" checked> Male</div>
          <div class="radio-half"><input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == 2 ? 'checked' : '' ?>> Female</div>
        </div>
    </div>
        
            <div>
                <label>Marital status</label>
                <div class="form-field">
                    <div class="radio-half"><input type="radio" name="marital_status" value="1"> Single</div>
                    <div class="radio-half"><input type="radio" name="marital_status" value="2"> Married</div>
                    <div class="radio-half"><input type="radio" name="marital_status" value="3"> Divorced</div>
                    <div class="radio-half"><input type="radio" name="marital_status" value="4"> Widowed</div>
                </div>
            </div> 


    <div>
        <label>Languages spoken</label>
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
                <label>I am a smoker</label>
                <div class="form-field">
                <div class="radio-half"><input type="radio" name="smoker" value="1"> Yes</div>
                <div class="radio-half"><input type="radio" name="smoker" value="2" checked> No</div>
                <div class="radio-half"><input type="radio" name="smoker" value="3"> Yes, but not at work</div>
                </div>
            </div>
    <div>
        <label>Level of religious observance</label>
        <div class="form-field">
        <select name="religious_observance" id="religious_observance">
            <option value="">Select Religious Observance</option>
            <option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
            <option value="Orthodox/Modern Orthodox">Orthodox / Modern Orthodox</option>
            <option value="Other">Other</option>
            <option value="Not Jewish">Not Jewish</option>
        </select>
        </div>
    </div>
    <div class="familar" style="display:none;">
        <label></label>
        <div class="form-field">
            <input type="checkbox" name="familartojewish" value="1"> Familiar with Jewish Tradition
        </div>
    </div>
            <div>
                <label>Level of education</label>
                <div class="form-field">
                <select name="education_level">
                    <option value="">Select Education Level</option>
                    <option value="Elementary" <?php echo isset($edu) && $edu == 1 ? 'selected' : '' ?>>Elementary</option>
                    <option value="High School" <?php echo isset($edu) && $edu == 2 ? 'selected' : '' ?>>High School</option>
                    <option value="Yeshiva/Seminary" <?php echo isset($edu) && $edu == 3 ? 'selected' : '' ?>>Yeshiva / Seminary</option>
                    <option value="Degree" <?php echo isset($edu) && $edu == 'Degree' ? 'selected' : '' ?>>Degree</option>
                </select>
                </div>
            </div>
            <div>
                <label>Educational institutions attended</label>
                <div class="form-field">
                    <input type="text" name="educational_institution" value="<?php echo isset($edu_ins) ? $edu_ins : '' ?>">
                </div>
            </div>

    </div>

   <!--  <div>
        <label>Shul membership</label>
        <div class="form-field">
        <input type="text" name="shul_membership">
        </div>
    </div> -->

    <?php $this->load->view('frontend/care/photo_upload') ?>

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

    <div>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Save & Continue"/>
    </div>
    </form>
</div>

