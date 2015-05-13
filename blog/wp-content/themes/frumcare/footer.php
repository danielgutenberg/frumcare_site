<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package frumcare
 */
?>
<?php 
    $wpurl            = site_url();
    $trimmed_url    = parse_url($wpurl);
    $path1           = explode('/', $trimmed_url['path']);	
    $ciurl       = $trimmed_url['scheme']."://".$trimmed_url['host']."/".$path1[1];
    if($path1[2] == 'dev')
     $ciurl .=   "/".$path1[2];
?>

	</div><!-- #content -->
         <!--<div class="green-banner"> -->
         <!--   <div class="container">-->
         <!--       <?php if(is_page(array('rate-calculator', 'faq'))){ ?>-->
         <!--           <div class="banner-title"> Post a new question to the forums </div>    -->
         <!--       <?php }else { ?>-->
         <!--           <div class="banner-title"> Join our community now </div>    -->
         <!--       <?php }?>-->
         <!--       <a href="javascript:void(0);" class="ask"> Ask our community </a>-->
         <!--   </div>-->
         <!--</div>-->
	<footer id="colophon" class="site-footer footer" role="contentinfo">
			<div class="container">
                    <div class="row navigation-row">
                        <div class="col-one-fourth">
                            <div class="footer-navigation">
                                <nav>
                                    <p class="nav-title">Navigation</p>
                                    <?php //wp_nav_menu( array( 'theme_location' => 'footer-menu1' ) ); ?>
                                    <ul>
                                        <li><a href="<?php echo $ciurl;?>/about-us">About Us</a></li>
                                        <li><a href="<?php echo $ciurl;?>/help">Contact Us</a></li>
                                        
                                        <li><a href="<?php echo $ciurl;?>/blog">Blog</a></li>
                                        
                                    </ul>
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
                                    <p class="nav-title">NEWSLETTER SIGNUP</p>
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

<!-- modal popup starts -->
    <div class="modal fade help-page" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Submit a Ticket <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>
                <div class="modal-body">
                    <form class="ticket" enctype="multipart/form-data" method="post">   
                        <label>Ticket Title</label>
                        <input type="text" name="ticket_title" class="title">
                        <br/>
                        <label>Ticket Description</label>
                        <textarea name="ticket_description" class="desc"></textarea>
                        <br/>
                        <label>File</label>
                        <input type="hidden" id="file-name" name="file">
                        <button class="btn btn-default" id="select_file">Select File</button>
                        <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
                        <div id="output" class="loader"></div>
                        <br/>
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" class="email">
                        <br/>
                        <label>Contact Number(Optional)</label>
                        <input type="text" name="contact_number">
                        <input type="hidden" name="date" value="<?php echo time();?>">
                        <div class="modal-footer">
                         <button class="btn closeform" data-dismiss="modal" aria-hidden="true">Close</button>
                         <input type="submit" class="btn btn-primary save_ticket" value="Save Changes" />
                        </div>
                    </form>
                    <div id="success"></div>
                </div>
            </div>
        </div>
    </div>
<!-- modal popup ends -->

<script src="<?php echo $ciurl;?>/js/jquery.validate.js"></script>
<script src="<?php echo $ciurl;?>/js/vendor/bootstrap.min.js"></script>
<script>
    $(function(){
        var url = "<?php echo site_url();?>";
        var trimmed_url = url.replace(url.substr(url.lastIndexOf('/') + 1), '');

        $(".ticket").validate({
            // Specify the validation rules
            rules: {
                ticket_title: "required",
                contact_email: {
                    required: true,
                    email: true
                },
            },
            // Specify the validation error messages
            messages: {
                ticket_title: "Please enter ticket title",
                contact_email: "Please enter a valid email address",
            },
            submitHandler: function(form) {
                     $.ajax({
                        type: "POST",
                        url: trimmed_url+"help/submit_ticket",
                        data: $('form.ticket').serializeArray(),
                        success: function(data){
                            $("form.ticket").get(0).reset();
                            jQuery('#success').show().html('<p class="success">Ticket has been submitted.</p>');
                            jQuery('.ticket').hide();
                            $('#output').text('');
                        },
                    error: function(){
                        alert("failure");
                        }
                    });
              return true;
            }
        });



        // modal box section goes here 
        $('#ticketModal').click(function(e){
            e.preventDefault();
            var current_user = "<?php if(isset($_SESSION['userid'])) echo $_SESSION['userid'];?>";
            if(current_user!=''){
                $('#success').hide();
                $('.ticket').show();
                $('#reportModal').modal();
                $('#output').text('');
            }else{
                window.location.href=trimmed_url+'login';
            }
                
        });


        $('.ask').click(function(){
            var current_user = "<?php if(isset($_SESSION['userid'])) echo $_SESSION['userid'];?>";
            if(current_user!= ''){
                $('#success').hide();
                $('.ticket').show();
                $('#reportModal').modal();
                $('#output').text('');
            }else{
                window.location.href=trimmed_url+'login';
            }

        });

        $('#reportModal').modal({
            backdrop: 'static',
            show: false
        });


        
        $(".close").click(function(){
            $('.modal-backdrop').hide();
            $('.title error').removeClass('.title error');
            $('.output').text('');
            var validator = $('.ticket').validate();
            validator.resetForm();
        });

        $(".closeform").click(function(){
            $('.modal-backdrop').hide();
            $('.output').text('');
            var validator = $('.ticket').validate();
            validator.resetForm();
        });


        // subscription starts from here
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
                var url = "<?php echo site_url();?>";
                var trimmed_url = url.replace(url.substr(url.lastIndexOf('/') + 1), '');
                $.ajax({
                    'url' : trimmed_url+"/welcome/subscribe",
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
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader  = "<img src='<?php echo $ciurl;?>/images/loader.gif'";
    var link    = "<?php echo $ciurl;?>/help/uploadfile?files";
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });
</script>

<script type="text/javascript" src="<?php echo $ciurl;?>/js/fileuploader.js"></script>
<!-- FILE UPLOAD -->

</html>
