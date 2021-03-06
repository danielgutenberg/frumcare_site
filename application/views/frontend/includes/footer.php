<style>
    .footer a {
        color: #747474 !important;
    }
</style>
<footer class="footer" style="margin-top:0px; background-color:#f3f3f3; color:black; background-image:none">
    <div class="container">
        <div class="row navigation-row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Frumcare.com</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>about-us">About Us</a></li>
                            <li><a href="<?php echo site_url();?>help">Contact Us</a></li>
                            <!--<li><a href="<?php echo site_url();?>blog">Blog</a></li>-->
                            <!--<li><a href="<?php echo site_url();?>terms-of-use">Terms of Use</a></li>-->
                            <!--<li><a href="<?php echo site_url();?>privacy-policy">Privacy Policy</a></li>-->
                            <li><a href="<?php echo site_url();?>faq">Support / FAQ</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Looking for</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>caregivers/all">A Caregiver</a></li>
                            <li><a href="<?php echo site_url();?>jobs/all">A Job Opportunity</a></li>
                            <li><a href="<?php echo site_url();?>caregivers/organizations">Business / Organization Services</a></li>
                            <li><a href="https://www.frumcare.com/store">Shop Care Products</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
            <!--    <div class="footer-navigation">-->
            <!--        <nav>-->
            <!--            <p class="nav-title">Learn More</p>-->
            <!--            <ul>-->
            <!--                <li><a href="<?php echo site_url();?>howitworks">How it works</a></li>-->
            <!--                <li><a href="<?php echo site_url();?>safety-guide/families">Safety Guide</a></li>-->
            <!--                <li><a href="<?php echo site_url();?>advice-and-tips/families">Advice and Tips</a></li>-->
            <!--                <li><a href="<?php echo site_url();?>faq">FAQs</a></li>-->
            <!--            </ul>-->
            <!--        </nav>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="footer-navigation contactus">
                    <nav>
                        <p class="nav-title">Newsletter Signup</p>
                        <span class="error"></span>
                        <div class="searchloader" style="display:none">
	                   </div>
                        <ul>
                            <li><input type="text" id="sub_name" name="sub_name" placeholder="Name" class="form-control input-sm"/></li><span class="errorName"></span>
                            <li><input type="email" id="sub_email" name="sub_email" placeholder="Email" class="form-control input-sm" required/></li><span class="errorEmail"></span>
                            <li><input type="button" id="subscribe" value="Subscribe" class="btn btn-primary btn-sm"/></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="colophon">
            <div class="row footer-links">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    Copyright&copy; frumcare.com All rights reserved
                        </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <a style="" href="<?php echo site_url();?>terms-of-use">Terms of Use</a> |
                    <a href="<?php echo site_url();?>privacy-policy">Privacy Policy</a>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 social-links">

                        <span class="title">Follow us on</span>
                        <a href="https://www.facebook.com/pages/FrumCarecom/1442798632665058" target="_blank" class="facebook flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-facebook-white"></i></span><span class="back"><i
                                        class="icon-facebook-color"></i></span></span></a>
                        <a href="https://twitter.com/FrumCare" target="_blank" class="twitter flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-twitter-white"></i></span><span class="back"><i
                                        class="icon-twitter-color"></i></span></span></a>
                        <a href="#" class="linkedin flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-linkedin-white"></i></span><span class="back"><i
                                        class="icon-linkedin-color"></i></span></span></a>
                        <a href="https://plus.google.com/u/0/b/113342746822002772215/113342746822002772215/about" target="_blank" class="gplus flip-link-container">
                            <span class="flip-link">
                                <span class="front">
                                    <i class="icon-googleplus-white"></i>
                                </span>
                                <span class="back">
                                    <i class="icon-googleplus-color"></i>
                                </span>
                            </span>
                        </a>


                        <a href="https://www.instagram.com" target="_blank" class="flip-link-container">
                            <span class="flip-link">
                                <span class="front">
                                    <img src="<?php echo site_url();?>img/instagramblue.png" alt="Smiley face" height="34" width="34">
                                </span>
                                <span class="back">
                                    <img src="<?php echo site_url();?>img/instagram.png" alt="Smiley face" height="34" width="34">
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--end colophon-->
    </div>
</footer>
</div>
<!--#site-wrapper-->
<script type="text/java_script">
        var trackcmp_email = '';
        var trackcmp = document.createElement("script");
        trackcmp.async = true;
        trackcmp.type = 'text/java_script';
        trackcmp.src = '//trackcmp.net/visit?actid=251791359&e='+encodeURIComponent(trackcmp_email)+'&r='+encodeURIComponent(document.referrer)+'&u='+encodeURIComponent(window.location.href);
        var trackcmp_s = document.getElementsByTagName("script");
        if (trackcmp_s.length) {
                trackcmp_s[0].parentNode.appendChild(trackcmp);
        } else {
                var trackcmp_h = document.getElementsByTagName("head");
                trackcmp_h.length && trackcmp_h[0].appendChild(trackcmp);
        }
</script>
<script type="text/javascript">
    $(function(){
        $("#subscribe").click(function(){
            var subName = $("#sub_name").val();
            var subEmail = $("#sub_email").val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if(subName == ''){
                $(".errorName").html("Please type your name").css("color","red");

            }else if(subEmail == ''){
                $(".errorEmail").html("Please type your email").css("color","red");
            }else if(!emailReg.test( subEmail )){
                $(".errorEmail").html("Please type correct email").css("color","red");
            }else{
                $.ajax({
                    'url' : "<?php echo site_url();?>welcome/subscribe",
                    'type' : 'get',
                    'data' : "sub_name="+subName+"&sub_email="+subEmail,
                    success:function(msg){
                        if(msg == 1){
                            $(".error").html("You have successfully subscribed").css("color","white");
                            $("#sub_name").val("");
                            $("#sub_email").val("");
                            $(".errorName").hide();
                        }else{
                            $(".error").html("You have already subscribed").css("color","white");
                            $(".errorEmail").hide();
                        }
                    }
            });
            }

        });
    });



<!-- FILE UPLOAD -->


</script>
<script>document.write(typeof _holyclock_tag=="string"?_holyclock_tag:'HolyClock \x26lt;head\x26gt; tag missing!');</script>
<script>
    $('[title="HolyClock.com"]').ready(function() {
        $('[title="HolyClock.com"]').addClass('holyclock-img')
    });
</script>
</body>
</html>