<div class="container sign-in-forms">
    <?php user_flash(); ?>
    <h2>
        Login
    </h2>
    <div class="sign-in-form col-sm-4 col-sm-offset-4">
        <form action="" method="post" id="login-form">
            <input type="text" name="email" placeholder="Email" class="required email col-xs-12" style="min-width:330px"/>
            <input type="password" name="passwd" placeholder="Password" class="required col-xs-12" style="min-width:330px"/>
            <span class="submit-success-btn col-xs-12"><input type="submit" class="btn btn-success" value="Sign In" style="min-width:330px; margin-left:-15px"/></span>
        </form>
        <span class="forgot-passwords"><a href="<?php echo base_url('forgot-password') ?>">Forgot Password?</a></span>
        <div class="or-wraps" align="center"><span>or</span></div>
        <div class="social-sign-in">
            <p>
                <strong>Sign in with</strong>
            </p>
            <p>
                <a href="<?php echo $loginUrl; ?>">
                    <img src="<?php echo base_url('img/facebook-signin.png') ?>" alt="Facebook Sign In">
                </a>
            </p>
            <p>
                <a href="<?php echo base_url('login/twitter') ?>">
                    <img src="<?php echo base_url('img/twitter-signin.png') ?>" alt="Twitter Sign In">
                </a>
            </p>
        </div>
        <p class="dont-have-acc">
            <a href="<?php echo base_url('signup') ?>">Don't have an account yet?</a>
        </p>
    </div>
    
</div>
