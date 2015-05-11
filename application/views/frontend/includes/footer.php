<footer class="footer">
    <div class="container">
        <div class="row navigation-row">
            <div class="col-one-fourth">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Navigation</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>about-us">About Us</a></li>
                            <li><a href="<?php echo site_url();?>help">Contact Us</a></li>
                            <?php /*<li><a href="<?php echo site_url();?>testimonials">Testimonials</a></li> */?>
                            <li><a href="<?php echo site_url();?>blog">Blog</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-one-fourth">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">I am looking for</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>caregivers">Find a Caregiver</a></li>
                            <li><a href="<?php echo site_url();?>careseekers">Find a Job</a></li>
                            <li><a href="<?php echo site_url();?>caregivers ">Find Workers</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-one-fourth">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Learn More</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>howitworks">How it works</a></li>
                            <li><a href="<?php echo site_url();?>staying-safe">Safety Guide</a></li>
                            <li><a href="<?php echo site_url();?>tips-and-tools">Tips and Tools</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-one-fourth">
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
            <div class="row">
                <div class="col-half">
                    <p class="copyright-info">
                        Copyright&copy; frumcare.com. All rights reserved
                    </p>
                </div>
                <div class="col-half">
                    <div class="social-links">
                        Follow us on
                        <a href="https://www.facebook.com/pages/FrumCarecom/1442798632665058" target="_blank" class="facebook flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-facebook-white"></i></span><span class="back"><i
                                        class="icon-facebook-color"></i></span></span></a>
                        <a href="https://twitter.com/FrumCare" target="_blank" class="twitter flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-twitter-white"></i></span><span class="back"><i
                                        class="icon-twitter-color"></i></span></span></a>
                        <a href="#" class="linkedin flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-linkedin-white"></i></span><span class="back"><i
                                        class="icon-linkedin-color"></i></span></span></a>
                        <a href="https://plus.google.com/u/0/b/113342746822002772215/113342746822002772215/about" target="_blank" class="gplus flip-link-container"><span class="flip-link"><span class="front"><i
                                        class="icon-googleplus-white"></i></span><span class="back"><i
                                        class="icon-googleplus-color"></i></span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end colophon-->
    </div>
</footer>
</div>
<!--#site-wrapper-->

<script src="<?php echo base_url('js/my_js.js') ?>"></script>
<script src="<?php echo base_url('js/main.js') ?>"></script>

<script>
    var _gaq = [
        ['_setAccount', 'UA-XXXXX-X'],
        ['_trackPageview']
    ];
    (function (d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>

<script>
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
                        // $('.searchloader').fadeIn("fast");
                        // $(".searchloader").fadeOut("fast");
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
</script>
</body>
</html>