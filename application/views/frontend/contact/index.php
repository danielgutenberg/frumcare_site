<div class="container">
    <div class="sign_up_save">    
        <div class="leftalign">            
            <h2>Contact by Phone</h2>
            <div class="contact-profile">
                <label>Contact Number</label>
                <label><?php echo isset($user['contact_number'])?$user['contact_number']:"Contact number not available";?></label>
            </div>
            <h2>Contact by email</h2>
            <h3>Enter your details</h3>
            <?php user_flash(); ?>
            <form action="<?php echo site_url();?>contactprofile/profile/<?php echo $category.'/'.$user['uri'] . '/' . $careType?>" method="post" id="contact_form" enctype="multipart/form-data">
                <div class="contact-profile">
                    <label>Name</label>
                    <input type="text" name="name" class="required">
                </div>
                <div class="contact-profile">
                    <label>Phone Number</label>
                    <input type="text" name="phonenumber" class="required">
                </div>

                <div class="contact-profile">
                    <label>Email</label>
                    <input type="text" name="email" class="required"> 
                </div>


                <div class="contact-profile">
                    <label>Message</label>
                    <textarea name="comment"></textarea>
                </div>
                
                <?php
                if($user['care_type'] > 24  && $user['care_type'] < 29){?>

                <div class="contact-profile">
                    <label for='uploaded_file'>Upload Resume</label>
                    <input type="file" name="userfile">
                </div>

                <?php } ?>

                <div class="contact-profile">
                    <input type="submit" name="contact" value="Send" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#contact_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: "Please enter a valid email address",
            },
        });
    })
</script>
