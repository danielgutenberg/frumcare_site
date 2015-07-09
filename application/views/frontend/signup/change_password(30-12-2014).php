<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>
<div class="dashboard-wrappers">
<div class="dashboard-left float-left">

        <?php $this->load->view('frontend/user/dashboard_nav.php');?>

    </div><!--dashboard-left-->

    <?php flash(); ?>
    <h2>Change your password</h2>
    <div class="sign-up-form password-wrapper">
        <form action="" method="post" id="change-password">
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <?php if(!isset($_GET['hash']) || ($_GET['hash'] != sha1('jesus'))) { ?>
            <input type="password" name="opass" placeholder="Old Password" class="required"/>
            <?php } ?>
            <input type="password" name="npass" id="npass" placeholder="New Password" class="required"/>
            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" class="required"/>
            <div class="change_passwordform">
                <input class="btn btn-success" type="submit" value="Save"/>
            </div>
        </form>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#change-password").validate({
            // Specify the validation rules
            rules: {
                npass: {
                    required: true,
                    minlength: 5
                },
                cpass: {
                    required: true,
                    minlength: 5,
                    equalTo: "#npass"

                },
                accpet_tc: "required",
                membership_type:"required",
                contact_number:"required",

            },
            // Specify the validation error messages
            messages: {
                npass: {
                    required: "Please enter password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpass: {
                    required: "Please enter confirm password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });
</script>
