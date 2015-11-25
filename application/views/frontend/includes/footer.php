<footer class="footer">
    <div class="container">
        <div class="row navigation-row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Navigation</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>about-us">About Us</a></li>
                            <li><a href="<?php echo site_url();?>help">Contact Us</a></li>
                            <li><a href="<?php echo site_url();?>blog">Blog</a></li>
                            <!--<li><a href="<?php echo site_url();?>terms-of-use">Terms of Use</a></li>-->
                            <!--<li><a href="<?php echo site_url();?>privacy-policy">Privacy Policy</a></li>-->

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">I am looking for</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>caregivers">Find a Caregiver</a></li>
                            <li><a href="<?php echo site_url();?>jobs/all">Find a Job</a></li>
                            <li><a href="<?php echo site_url();?>caregivers/organizations">Find Workers</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-navigation">
                    <nav>
                        <p class="nav-title">Learn More</p>
                        <ul>
                            <li><a href="<?php echo site_url();?>howitworks">How it works</a></li>
                            <li><a href="<?php echo site_url();?>safety-guide/families">Safety Guide</a></li>
                            <li><a href="<?php echo site_url();?>advice-and-tips/families">Advice and Tips</a></li>
                            <li><a href="<?php echo site_url();?>faq">FAQs</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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

<script type="text/javascript">

function removePic(){
        $('#file-name').attr('value','');
        var lodr='<?php echo site_url("images/plus.png")?>';
        $('#output img').attr('src',lodr);
        $('#upload').css({'display':'inline-block'});
        $('#remove').remove();
        return false;

    }


    function removePics(){
        $('#file-name1').attr('value','');
        var lodr='<?php echo site_url("images/plus.png")?>';
        $('#output1 img').attr('src',lodr);
        $('#upload1').css({'display':'inline-block'});
        $('#remove').remove();
        return false;

    }


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

$(function()
{

    function setListeners() {
        $('#locationField #autocomplete').change(function(){
            $('#lat').val('');
            $('#lng').val('');
        });
    
        $('#upload').click(function(){
            $('#ImageFile').trigger('click');
            return false;
    
        });
    
        $('#output').click(function(){
            $('#ImageFile').trigger('click');
    
        });
    
    
        $('#upload1').click(function(){
            //alert('working');
            $('#ImageFile1').trigger('click');
            return false;
    
        });
    
        $('#output1').click(function(){
    
            $('#ImageFile1').trigger('click');
    
        });
    
        // Add events
    
        $('#ImageFile').on('change',prepareUpload1);
    
        $('#ImageFile1').on('change',prepareUpload2);
    }
    
    setListeners();
    //$('form').on('submit', uploadFiles);

    // Grab the files and set them to our variable
    function prepareUpload1(event){

        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';

        var link = '<?php echo site_url("ad/upload_pp?files")?>';
        files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output').html(data.html);
                        $('.loader').addClass('hidden');
                        $('#file-name').val(data.files);
                        $('#upload').css({'display':'none'});
                        $('<a class="buttons btn-default" href="#" id="remove" onclick="return removePic();" style="margin:0 10px;">Remove File</a>').insertAfter('#output');

                            /**************** #file1 upload script *************************/

                            $('#output1').html(data.html);
                            $('.loader1').html('');
                            $('#file-name1').val(data.files);
                            $('#upload1').css({'display':'none'});
                            $('<a class="buttons btn-default" href="#" id="remove" onclick="return removePics();" style="margin:10px 10px;">Remove File</a>').insertAfter('#output1');

                            //$this->session->set_userdata('newupload',1);

                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                                            }


                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
                
                setListeners();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                setListeners();
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }


    ////////////////// second image upload ////////////////////////////////


    // Grab the files and set them to our variable
    function prepareUpload2(event){

        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';

        var link = '<?php echo site_url("ad/upload_pp?files")?>';
        files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });

        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader1').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){

                        $('#output1').html(data.html);
                        $('.loader1').html('');
                        $('#file-name1').val(data.files);
                        $('#upload1').css({'display':'none'});
                        $('<a class="buttons btn-default" href="#" id="remove" onclick="return removePics();" style="margin:10px 10px;">Remove File</a>').insertAfter('#output1');

                        //$this->session->set_userdata('newupload',1);

                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                    }


                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
                
                setListeners();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                setListeners();
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }


});

<!-- FILE UPLOAD -->


</script>
<script>
    // form validation
$('#login-form').validate();
$('#sign-up').validate({
		 rules:{
		 	agree:"required",
		 	org_password:{
		 		required:true,
		 		minlenght:5
		 	},
		 	  confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#org_password"

                },
		 },
		 messages:{
		 	agree:"Please accept your terms & condtions to continue.",
		 	 org_password: {
                    required: "Please enter password",
                },
                confirm_password: {
                    required: "Please enter confirm password",
                    equalTo: "Please enter the same password as above"
                },
		 }
});
$('#forgot-form').validate();
$('#personal-details-form').validate();
$('#verification').validate();
$('#addrefrences').validate();
$('#payment_form').validate();
//$('#left-nav').validate();

jQuery(document).ready(function($){
   	$('.toggle-menu').click(function(){
		$('.primary-nav').slideToggle('slow');
    });


    $('.form-field select').customStyle();
    $('.care-type select').customStyle();
    $('.search select').customStyle();
       
});

</script>
</body>
</html>