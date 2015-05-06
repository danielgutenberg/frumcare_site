<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package frumcare
 */
?>

	</div><!-- #content -->
         <div class="green-banner"> 
            <div class="container">
                <?php if(is_page(array('rate-calculator', 'faq'))){ ?>
                    <div class="banner-title"> Post a new question to the forums </div>    
                <?php }else { ?>
                    <div class="banner-title"> Join our community now </div>    
                <?php }?>
                <a href="#" class="ask"> Ask our community </a>
            </div>
         </div>
	<footer id="colophon" class="site-footer footer" role="contentinfo">
			<div class="container">
                    <div class="row navigation-row">
                        <div class="col-one-fourth">
                            <div class="footer-navigation">
                                <nav>
                                    <p class="nav-title">Navigation</p>
                                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu1' ) ); ?>
                                    <!--<ul>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Childcare Workers</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>-->
                                </nav>
                            </div>
                        </div>
                        <div class="col-one-fourth">
                            <div class="footer-navigation">
                                <nav>
                                    <p class="nav-title">I am looking for</p>
                                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu2' ) ); ?>
                                    <!--<ul>
                                        <li><a href="#">Caregivers</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Employees</a></li>
                                    </ul>-->
                                </nav>
                            </div>
                        </div>
                        <div class="col-one-fourth">
                            <div class="footer-navigation">
                                <nav>
                                    <p class="nav-title">Learn More</p>
                                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu3' ) ); ?>
                                    <!--<ul>
                                        <li><a href="#">How it works</a></li>
                                        <li><a href="#">Staying Safe</a></li>
                                        <li><a href="#">Advice and tips</a></li>
                                    </ul>-->
                                </nav>
                            </div>
                        </div>
                        <div class="col-one-fourth">
                            <div class="footer-navigation contactus">
                                <nav>
                                    <p class="nav-title">Contact Us</p>
                                    <ul>
                                        <li><a href="callto:111222333"><i class="icon-mobile"></i>111-222-333</a></li>
                                        <li><a href="mailto:info@frumcare.com"><i class="icon-envelope"></i>info@frumcare.com</a></li>
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
                                    <a href="<?php echo do_shortcode("[theme_option do='facebook-link']");?>" target="_blank" title="Facebook" class="facebook flip-link-container"><span class="flip-link"><span class="front"><i class="icon-facebook-white"></i></span><span class="back"><i class="icon-facebook-color"></i></span></span></a>
                                    <a href="<?php echo do_shortcode("[theme_option do='twitter-link']");?>" target="_blank" title="Twitter" class="twitter flip-link-container" ><span class="flip-link"><span class="front"><i class="icon-twitter-white"></i></span><span class="back"><i class="icon-twitter-color"></i></span></span></a>
                                    <a href="<?php echo do_shortcode("[theme_option do='linkedin-link']");?>" target="_blank" title="LinkedIn" class="linkedin flip-link-container"><span class="flip-link"><span class="front"><i class="icon-linkedin-white"></i></span><span class="back"><i class="icon-linkedin-color"></i></span></span></a>
                                    <a href="<?php echo do_shortcode("[theme_option do='google-plus-link']");?>" target="_blank" title="Google+" class="gplus flip-link-container"><span class="flip-link"><span class="front"><i class="icon-googleplus-white"></i></span><span class="back"><i class="icon-googleplus-color"></i></span></span></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end colophon-->
                </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
