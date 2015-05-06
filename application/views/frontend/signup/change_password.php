<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-wrappers">
        <div class="dashboard-left float-left">
                <?php $this->load->view('frontend/user/dashboard_nav.php');?>
        </div><!--dashboard-left-->

            <div class="dashboard-right float-right">
            <div class="top-welcome">
                <h2>Change your password</h2>
            </div>
            <?php flash(); ?>
            <div class="sign-up-form password-wrapper">
                <form action="" method="post" id="change-password">
                    <input type="password" name="npass" id="npass" placeholder="New Password" class="required"/>
                    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" class="required"/>
                    
                    <input class="btn btn-success" type="submit" name="changepass" value="Save"/> 
                </form>
            </div>
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
