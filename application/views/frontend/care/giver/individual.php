
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Personal Details</li>
    <li class="progtrckr-todo">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>

<div class="container">
<?php
    $attributes = array('id' => 'personal-details-form', 'enctype' => "multipart/formdata");
    echo form_open('ad/registeruserdetails', $attributes);
?>
    <div class="ad-form-container">
        <h1 class="step2">
            Step 2: Personal Details
        </h1>

        <?php 
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
        ?>
	 
	    <div>
	        <label>Age</label>
	        <div class="form-field">
	        <input type="text" name="age" class="txt number" value="<?php echo isset($age) ? $age : '' ?>"/>
	        </div>
	    </div>
	  

        <?php 
            $this->load->view('frontend/care/giver/fields/gender');
        ?>
        
        <div>
            <label>Marital status</label>
            <div class="form-field">
                <div class="radio-half"><input type="radio" name="marital_status" value="1"> Single</div>
                <div class="radio-half"><input type="radio" name="marital_status" value="2"> Married</div>
                <div class="radio-half"><input type="radio" name="marital_status" value="3"> Divorced</div>
                <div class="radio-half"><input type="radio" name="marital_status" value="4"> Widowed</div>
            </div>
        </div> 

        <?php 
            $this->load->view('frontend/care/giver/fields/languages_spoken');
        ?>

        <div>
            <label>I am a smoker</label>
            <div class="form-field">
            <div class="radio-half"><input type="radio" name="smoker" value="1"> Yes</div>
            <div class="radio-half"><input type="radio" name="smoker" value="2" checked> No</div>
            <div class="radio-half"><input type="radio" name="smoker" value="3"> Yes, but not at work</div>
            </div>
        </div>
        <?php   
            $this->load->view('frontend/care/giver/fields/religious_observance');
        ?>                
        <div>
            <label>Level of Education</label>
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

    <?php
        $this->load->view('frontend/care/photo_upload', ['photo_name' => 'profile_picture']);
        $this->load->view('frontend/care/giver/fields/account_category_type'); 
    ?>



    <div>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Save & Continue"/>
    </div>
    </form>
</div>

