
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
        <?php 
            $this->load->view('frontend/care/giver/fields/location');
            $this->load->view('frontend/care/giver/fields/neighborhood'); 
            $this->load->view('frontend/care/giver/fields/phone'); 
            $this->load->view('frontend/care/giver/fields/name_of_owner'); 
            $this->load->view('frontend/care/giver/fields/age_of_owner'); 
            $this->load->view('frontend/care/giver/fields/gender');
            $this->load->view('frontend/care/giver/fields/languages_spoken');  
            $this->load->view('frontend/care/giver/fields/religious_observance');
            $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload owner's photo"]);
            $this->load->view('frontend/care/giver/fields/account_category_type'); 
        ?>

        <br/>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Save & Continue"/>

    </div>
</form>
</div>
