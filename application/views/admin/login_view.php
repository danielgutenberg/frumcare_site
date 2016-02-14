<!DOCTYPE html>
<html lang="en-us">
<head>
    <title><?php if(isset($title)){echo $title." - " ;} echo "Admin Panel - FrumCare"; ?></title>

    <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Basic Styles -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/bootstrap.min.css")?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/font-awesome.min.css")?>">

  <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/smartadmin-production.css")?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/smartadmin-skins.css")?>">

  <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/demo.css")?>">

  <!-- page related CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/lockscreen.css")?>">

  <!-- FAVICONS -->
  <link rel="shortcut icon" href="<?php echo site_url("plugins/admin/img/favicon/favicon.ico")?>" type="image/x-icon">
  <link rel="icon" href="<?php echo site_url("plugins/admin/img/favicon/favicon.ico")?>" type="image/x-icon">

  <!-- GOOGLE FONT -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
</head>
<body>
    
<div class="account-container login stacked" id="main" role="main">    
    <div class="">        
        <?php
            $attributes = array('id' => 'login-form', 'class' => 'smart-form client-form lockscreen animated flipInY');
            echo form_open('admin/login', $attributes);
        ?>
            <header>Sign In</header> 
            <fieldset>       
            <?php user_flash(); ?>
                <section class="field">
                    <label class="label" for="username">Username</label>
                    <label class="input">
                    <i class="icon-append fa fa-user"></i>
                    <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
                </section> <!-- /field -->
                <section class="field">
                    <label class="label" for="password">Password</label>
                    <label class="input">
                    <i class="icon-append fa fa-lock"></i>
                    <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Please enter password</b>
                    </label>
                </section> <!-- /password -->
                <section>
                    <label class="checkbox">
                    <input id="Field" name="remember" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                    <i></i>Stay sign in</label>
                </section>
            </fieldset>
            <footer>
                <input type="submit" value="Sign In" name="submit" class="btn btn-primary" />
            </footer>
                       
        </form>
    </div> <!-- /well -->
</div> <!-- /account-container -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script>
            if (!window.jQuery) {
                document.write('<script src="<?php echo site_url("plugins/admin/js/libs/jquery-2.0.2.min.js")?>"><\/script>');
            }
        </script>

        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
            if (!window.jQuery.ui) {
                document.write('<script src="<?php echo site_url("plugins/admin/js/libs/jquery-ui-1.10.3.min.js")?>"><\/script>');
            }
        </script>

<!-- BOOTSTRAP JS -->
<script src="<?php echo site_url("plugins/admin/js/bootstrap/bootstrap.min.js")?>"></script>

<!-- JQUERY VALIDATE -->
<script src="<?php echo site_url("plugins/admin/js/plugin/jquery-validate/jquery.validate.min.js")?>"></script>

<script type="text/javascript">
            $(function() {
                // Validation
                $("#login-form").validate({
                    // Rules for form validation
                    rules : {
                        username : {
                            required : true
                        },
                        password : {
                            required : true
                        }
                    },

                    // Messages for form validation
                    messages : {
                        username : {
                            required : 'Please enter your username',
                        },
                        password : {
                            required : 'Please enter your password'
                        }
                    },

                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });
            });
        </script>
</body>
</html>
