<script src="https://apis.google.com/js/api:client.js"></script>
<div class="container sign-in-forms">
    <?php user_flash(); ?>
    <h2>
        Login
    </h2>
    <div class="sign-in-form col-sm-4 col-sm-offset-4">
    <?php
        $attributes = array('id' => 'login-form');
        echo form_open('login', $attributes);
    ?>
            <input type="text" name="email" placeholder="Email" class="required email col-xs-12" style="min-width:330px"/>
            <input type="password" name="passwd" placeholder="Password" class="required col-xs-12" style="min-width:330px"/>
            <?php if ($redirect) {?>
                <input type="hidden" name="redirect" value="<?php echo $redirect?>" />
                <?php } ?>
            <span class="submit-success-btn col-xs-12"><input type="submit" class="btn btn-success" value="Sign In" style="min-width:330px; margin-left:-15px"/></span>
        </form>
        <span class="forgot-passwords"><a href="<?php echo base_url('forgot-password') ?>">Forgot Password?</a></span>
        <div class="or-wraps" align="center"><span>or</span></div>
        <div class="social-sign-in">
            <p>
                <strong>Sign in with</strong>
            </p>
            <p>
                <a style="cursor:pointer">
                    <img onClick="checkLoginState()" src="<?php echo base_url('img/facebook-signin.png') ?>" alt="Facebook Sign In">
                </a>
            </p>
            <p>
                <a href="<?php echo $linkedInUrl ?>">
                    <img height="40" width="247" src="<?php echo base_url('img/linkedin-signin.png') ?>" alt="Linkedin Sign In">
                </a>
            </p>
            <p id="customBtn" class="customGPlusSignIn">
                <a style="cursor:pointer">
                    <img height="45" width="255" src="<?php echo base_url('img/google-signin.png') ?>" alt="Facebook Sign In">
                </a>
            </p>
        </div>
        <p class="dont-have-acc">
            <a href="<?php echo base_url('signup') ?>">Don't have an account yet?</a>
        </p>
    </div>
    
</div>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI(response.authResponse.accessToken);
    } else if (response.status === 'not_authorized') {
    } else {
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
      FB.init({
        appId      : '1084852534881766',
        cookie     : true,  // enable cookies to allow the server to access 
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.2' // use version 2.2
      });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI(accessToken) {
    FB.api('/me?fields=email', function(response) {
        var link = '<?php echo site_url("login/facebook")?>'
        var email = response.email
        var data = {
            code: accessToken,
            email: email,
            id: response.id,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
        $.ajax({
            url: link,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(res) {
                location.href = res
            }
        })
    })
  }
</script>
<script>
    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var id_token = googleUser.getAuthResponse().id_token;
                var email = googleUser.getBasicProfile().getEmail();
                authenticate(id_token, email);
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }
    
    var authenticate = function(token, email) {
        var link = '<?php echo site_url("login/google")?>'
        var data = {
            code: token,
            email: email,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
        $.ajax({
            url: link,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(res) {
                location.href = res
            }
        })
    }
    
    var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '390849955832-hs2ht6ua8mvd4no6ti0v3ln99crup7b8.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('customBtn'));
        });
      };
      startApp();
</script>
