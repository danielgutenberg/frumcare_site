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
                            <li><a href="<?php echo site_url();?>terms-of-use">Terms of Use</a></li>
                            <li><a href="<?php echo site_url();?>privacy-policy">Privacy Policy</a></li>
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
                        </ul>
                    </nav>
                </div>
            </div>
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
        <!--end colophon-->
    </div>
</footer>
<div class="row">
            <div style="background-image: url(img/homepage-icons/footer.png); height: 45px;" class="col-xs-9 col-sm-3 col-md-offset-2 col-sm-offset-1 col-xs-offset-3">
    
            </div>
            <div style="margin-top:24px; background-repeat: no-repeat; background-image: url(img/homepage-icons/copyright.png); height: 45px;" class="col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-3 col-xs-10 col-sm-6 col-md-5 col-lg-4">
    
            </div>
        </div>
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